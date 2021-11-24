@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Thông tin phiếu khám</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thông tin phiếu khám</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                {{-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture"> --}}
                            </div>

                            <h3 class="profile-username text-center">{{ $info->hsb_hotenkhachhang }}</h3>

                            {{-- <p class="text-muted text-center">{{ $info->hsb_sdt }}</p> --}}

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Giới tính</b> <a class="float-right">{{ $info->hsb_gioitinh == 1 ? 'Nam' : 'Nữ' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Năm sinh</b> <a class="float-right">{{ $info->hsb_namsinh }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Số điện thoại</b> <a class="float-right">{{ $info->hsb_sdt }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Địa chỉ</b> <a class="float-right">{{ $info->hsb_diachi }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Dịch vụ</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Cận
                                        lâm sàn</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Toa
                                        thuốc</a></li>
                                <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">Lịch
                                        sử khám</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" id="history">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                10 Feb. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email
                                                </h3>

                                                <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 5 mins
                                                    ago</span>

                                                <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted
                                                    your friend request
                                                </h3>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 27 mins
                                                    ago</span>

                                                <h3 class="timeline-header"><a href="#">Jay White</a> commented on your
                                                    post</h3>

                                                <div class="timeline-body">
                                                    Take me to your leader!
                                                    Switzerland is small and neutral!
                                                    We are more like Germany, ambitious and misunderstood!
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-success">
                                                3 Jan. 2014
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 2 days
                                                    ago</span>

                                                <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos
                                                </h3>

                                                <div class="timeline-body">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                    <img src="http://placehold.it/150x100" alt="...">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="activity">
                                    <form method="get" action="">
                                        <div class="row">
                                            <div class="form-group col-md-6">
                                                <label for="serviceType">Loại dịch vụ</label>
                                                <select id="serviceType" class="form-control" name="">
                                                    @foreach ($serviceType as $item)
                                                        <option value="{{ $item->ldv_ma }}">{{ $item->ldv_ten }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="serviceType">Dịch vụ</label>
                                                <select id="serviceType" class="form-control" name="">
                                                    @foreach ($serviceType as $item)
                                                        <option value="{{ $item->ldv_ma }}">{{ $item->ldv_ten }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    abc
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                              <label>Thuốc</label>
                                              <select class="form-control select2bs4 medicalSelect" style="width: 100%;">
                                                @foreach ($medicalAll as $item)
                                                    <option value="{{ $item->thuoc_ma }}">{{ $item->thuoc_ten }}</option>
                                                @endforeach
                                              </select>
                                              <a href="#" id="addMedical" class="btn btn-sm btn-primary">Thêm</a>
                                            </div>
                                            <!-- /.form-group -->
                                    </form>
                                    <div class="col-md-12">
                                        <div class="card">
                                          <!-- /.card-header -->
                                            <div class="card-body">
                                                <form action="{{ route('medical.appointment.add.medical', ['idPhieuKham'=>$detail->pk_ma]) }}" method="POST">
                                                    @csrf
                                                    <table class="table table-bordered">
                                                        <thead >
                                                            <tr>
                                                            <th style="width: 10px">#</th>
                                                            <th>Tên thuốc</th>
                                                            <th>Số lượng</th>
                                                            <th>Cách dùng</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody class="medical">
                                                                @foreach ($medical as $item)
                                                                <tr>
                                                                    <td></td>
                                                                    <td>
                                                                        <input value="{{ $item->thuoc_ma }}" hidden name="thuoc[]" />
                                                                        <input value="{{ $item->thuoc_ten }}" class="form-control" readonly />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $item->ctt_soluong }}" type="number" name="soLuong[]" />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $item->ctt_cachdung }}" name="cachDung[]" />
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="4" class="text-center">
                                                                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.card -->
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
@push('medical_appointment')
<script>
    $(document).ready(function () {
        var base_url = window.location.origin;
        const arrMedical = [];
        $('#addMedical').click(function (e) {
            e.preventDefault();
            var medicalSelected = $('.medicalSelect').val();

            console.log(medicalSelected);
            if(medicalSelected == null) {
                alert("Vui lòng chọn thuốc");
            }
            else if(arrMedical.includes(medicalSelected)) {
                alert("Đã thêm thuốc này");
            }else {
                arrMedical.push(medicalSelected);
                console.log(medicalSelected);
                $.ajax({
                type: "get",
                url: base_url + "/thuoc/"+medicalSelected,
                dataType: "json",
                success: function (response) {
                        console.log(response);
                        var content = '<tr>';
                        content += '<td>1.</td>';
                        content += '<td>';
                        content += '<input value="'+ response.thuoc_ma +'" hidden name="thuoc[]" />';
                        content += '<input value="'+ response.thuoc_ten +'" class="form-control" readonly />';
                        content += '</td>';
                        content += '<td>';
                        content += '<input class="form-control" type="number" name="soLuong[]" />';
                        content += '</td>';
                        content += '<td>' + '<input class="form-control" name="cachDung[]" />'+'</td>';
                        content += '</tr>';
                        $('.medical').append(content);
                    }
                });
                var values1 = $("input[name='thuoc[]']")
                .map(function(){return $(this).val();}).get();
                console.log(values1);
            }
            console.log("clicked");
        });
        $('').select(function () {

        });
    });
</script>
@endpush
