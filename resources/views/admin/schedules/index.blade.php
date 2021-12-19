@extends('admin.template.layout')
@push('css')
<style>
    .form-check.form-switch {
    font-size: 25px;
}
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.css"
    integrity="sha256-zsz1FbyNCtIE2gIB+IyWV7GbCLyKJDTBRz0qQaBSLxM=" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"
    integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.0/main.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $.ajax({
            type: "get",
            url: "/getSchedule",
            success: function (response) {
                console.log(response);
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    initialView: 'timeGridWeek',
                    locale: 'vi',
                    selectable: true,
                    dropAccept: '.cool-event',
                    dateClick: function (info) {
                        $('#btnModal').click();
                        $("#ngay_ma").val(info.dateStr);
                        info.dayEl.style.backgroundColor = 'background';
                    },
                    eventDidMount: function(info) {
                        $(info.el).tooltip({
                            title: info.event.extendedProps.description,
                            placement: "top",
                            trigger: "hover",
                            container: "body"
                        });
                    },
                    events: response,


                    eventClick: function (info) {
                        info.jsEvent.preventDefault(); // don't let the browser navigate
                        let check=$('#checkbox:checked').val()?true:false;
                        if(check){
                            $.ajax({
                                /* the route pointing to the post function */
                                url: "{{route('schedules.check')}}",
                                type: 'GET',
                                /* send the csrf-token and the input to the controller */
                                data: {
                                    id: info.event.id
                                },
                                dataType: 'JSON',
                                /* remind that 'data' is the response of the AjaxController */
                                success: function (data) {
                                    location.reload();
                                    info.backgroundColor = 'green';
                                }

                            });
                        }else{

                        if (confirm("Bạn muốn xoá lịch trực này?")) {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                        .attr('content')
                                }
                            });
                            $.ajax({
                                /* the route pointing to the post function */
                                url: "{{route('schedules.destroy')}}",
                                type: 'POST',
                                /* send the csrf-token and the input to the controller */
                                data: {
                                    id: info.event.id
                                },
                                dataType: 'JSON',
                                /* remind that 'data' is the response of the AjaxController */
                                success: function (data) {
                                    data = "success" && info.event.remove()
                                }

                            });
                        }
                        }
                    }
                });
                calendar.render();
            }
        });
    });

</script>
<style>
    .hide {
        display: none;
    }

</style>
@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <br>
    <div class="form-check form-switch">

        <input class="form-check-input" type="checkbox" id="checkbox" checked>
        <label class="form-check-label" for="checkbox">Xoá - Chấm công</label>
      </div>

    <div id='calendar'></div>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary hide" data-toggle="modal" data-target="#exampleModalLong"
        id="btnModal">
        Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Lịch trực</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('schedules.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="my-input">Nhân viên</label>
                            <select name="nv_ma" class="form-control">
                                @foreach($nhanvien as $item)
                                <option value="{{$item->nv_ma}}">{{$item->chucvu->cv_ten}} - {{$item->nv_ten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Ca</label>
                            <select name="ca_ma" class="form-control">
                                @foreach($ca as $item)
                                <option value="{{$item->ca_ma}}">{{$item->ca_giobatdau}} - {{$item->ca_gioketthuc}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" name="ngay_ma" value="" id="ngay_ma">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Huỷ</button>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $(document).ready(function () {
        $(".fc-daygrid-event-harness").click(function (e) {
            e.preventDefault();

        });
    });

</script>


@endpush
