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
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                {{-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg"
                                    alt="User profile picture"> --}}
                            </div>

                            <h3 class="profile-username text-center">Ghi chú</h3>

                            {{-- <p class="text-muted text-center">{{ $info->hsb_sdt }}</p> --}}
                            <form action="{{ route('medical.appointment.update', ['idRecord'=>$detail->pk_ma]) }}" method="post">
                                @csrf
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label for="my-textarea">Nội dung ghi chú</label>
                                            <textarea id="my-textarea" class="form-control" name="pk_ghichu" rows="3">{{ $detail->pk_ghichu }}</textarea>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group">
                                            <label for="my-input">Ngày tái khám:
                                                @if ($detail->pk_ngaytaikham == null)
                                                    <b style="color: red;">Chưa chỉ định ngày tái khám</b>
                                                @else
                                                    <b>{{ $detail->pk_ngaytaikham->format('d-m-Y') }}</b>
                                                @endif
                                            </label>
                                            @if ($detail->pk_ngaytaikham == null)
                                                <input id="my-input" class="form-control" value="{{$detail->pk_ngaytaikham}}" type="date" name="pk_ngaytaikham">
                                            @else
                                                <input id="my-input" class="form-control" value="{{$detail->pk_ngaytaikham}}" type="date" name="pk_ngaytaikham">
                                            @endif

                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        @php
                                            $tongTienCanLamSanEnd = 0;
                                            $tongTienThuocEnd = 0;
                                        @endphp
                                        @foreach ($appointmentTest as $item)
                                                @php
                                                    $giaCanLamSan = DB::table('giadichvucanlamsan')->where('cls_ma', $item->cls_ma)->orderBy('ngay_ma','desc')
                                                    ->first();
                                                @endphp
                                                @php
                                                    $tongTienCanLamSanEnd = $tongTienCanLamSanEnd + ($giaCanLamSan->gdvcls_gia);
                                                @endphp
                                        @endforeach
                                        @foreach ($medical as $item)
                                            @php
                                                $giaThuoc = DB::table('giathuoc')->where('thuoc_ma', $item->thuoc_ma)
                                                                                ->orderBy('gt_ngay','desc')->first();
                                                $tongTienThuocEnd = $tongTienThuocEnd + ($giaThuoc->gt_gia * $item->ctt_soluong);
                                            @endphp
                                        @endforeach

                                    </li>
                                    <input class="form-control btn btn-primary" type="submit" value="Cập nhật" name="">
                                </ul>
                            </form>
                            <form action="{{ route('receipt.create', ['idMedicalRecord'=>$detail->pk_ma]) }}" method="get">
                                @php
                                    $tongTienDichVuEnd = 0;
                                @endphp
                                @foreach ($service as $item)
                                @php
                                    $tongTienDichVuEnd = $tongTienDichVuEnd + $item->ctpkdv_gia;
                                @endphp
                                @endforeach
                                <input type="text" hidden value="{{ $tongTienThuocEnd + $tongTienCanLamSanEnd + $tongTienDichVuEnd}}" name="tongTien">
                                <b>TỔNG TIỀN: </b><span>{{ number_format($tongTienThuocEnd + $tongTienCanLamSanEnd + $tongTienDichVuEnd) }} VND</span>
                                <button type="submit" class="btn btn-success col-md-12">Thanh toán</button>
                            </form>
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
                                        @foreach ($history as $item)
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-danger">
                                                {{ $item->pk_ngaykham->format('d-m-Y') }}
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>

                                            <div class="timeline-item">
                                                {{-- <span class="time"><i class="far fa-clock"></i> 12:05</span> --}}

                                                <h3 class="timeline-header"><a href="#">Nha sĩ: </a> {{ $item->nv_ten }}
                                                </h3>

                                                <div class="timeline-body">
                                                    {{ $item->pk_ghichu }}
                                                </div>
                                                <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Thông tin chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->
                                        @endforeach

                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane active" id="activity">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="serviceType">Loại dịch vụ</label>
                                            <select id="serviceType" class="form-control" name="">
                                                <option value="">Chọn loại dịch vụ</option>
                                                @foreach ($serviceType as $item)
                                                    <option value="{{ $item->ldv_ma }}">{{ $item->ldv_ten }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="serviceType">Dịch vụ</label>
                                            <select id="service" class="form-control service" name="service">

                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <a href="#" id="addService" class="btn btn-success">Thêm</a>
                                        </div>
                                        @php
                                            $tongTienDichVu = 0;
                                        @endphp
                                        <form action="{{ route('medical.appointment.add.service', ['idPhieuKham'=>$detail->pk_ma]) }}" method="POST">
                                            @csrf
                                            <table class="table table-bordered">
                                                <thead >
                                                    <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Tên dịch vụ</th>
                                                    <th>Giá tiền</th>
                                                    <th>Thao tác</th>
                                                    </tr>
                                                </thead>
                                                    <tbody class="serviceAppend">
                                                        @foreach ($service as $item)
                                                        @php
                                                            $tongTienDichVu = $tongTienDichVu + $item->ctpkdv_gia;
                                                        @endphp
                                                        <tr>
                                                            <td></td>
                                                            <td>
                                                            <input value="" hidden name="dichVu[]" />
                                                            <input value="{{ $item->dv_ten }}" class="form-control" readonly />
                                                            </td>
                                                            <td>
                                                            <input value="{{ $item->ctpkdv_gia }}" class="form-control" readonly />
                                                            </td>
                                                            <td>
                                                                <a href="#" class="btn btn-sm btn-danger removeService">Xóa</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" class="text-center">
                                                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3" class="text-center">
                                                                <b>Tổng tiền: </b><span>{{ number_format($tongTienDichVu) }} VND</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="timeline">
                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#my-modal">Chỉ định</button>
                                    <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="my-modal-title">Chỉ định cận lâm sàn</h5>
                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="post" action="{{ route('medical.appointment.handle.test', ['idPhieuKham'=>$detail->pk_ma]) }}">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="testType">Loại cận lâm sàn</label>
                                                            <select id="testType" class="form-control " name="">
                                                                <option value="">Chọn</option>
                                                                @foreach ($testType as $item)
                                                                    <option value="{{ $item->lcls_ma }}">{{ $item->lcls_ten }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Cận lâm sàn</label>
                                                            <select class="form-control test" name="cls_ma">
                                                            </select>
                                                        </div>
                                                        <input type="submit" value="Xác nhận" class="btn btn-success">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-light">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Tên</th>
                                                <th>Ngày thực hiện</th>
                                                <th>Giá tiền</th>
                                                <th>Trạng thái</th>
                                                <th>Thao tác</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $tongTienCanLamSan = 0;
                                            @endphp
                                            @foreach ($appointmentTest as $item)
                                                <tr>
                                                    <td>{{ $item->cls_ten }}</td>
                                                    <td>{{ $item->pxn_ngaylap }}</td>
                                                    <td>
                                                        @php
                                                            $giaCanLamSan = DB::table('giadichvucanlamsan')->where('cls_ma', $item->cls_ma)->orderBy('ngay_ma','desc')
                                                            ->first();
                                                            print_r(number_format($giaCanLamSan->gdvcls_gia));
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @if ($item->pxn_trangthai == 1)
                                                            <span class="btn btn-sm btn-warning">Đang thực hiện</span>
                                                        @elseif ($item->pxn_trangthai == 2)
                                                            <span class="btn btn-sm btn-success">Đã hoàn thành</span>
                                                        @elseif ($item->pxn_trangthai == 3)
                                                            <span class="btn btn-sm btn-danger">Đã hủy</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="#" class="btn btn-default detail-test" data-toggle="modal" data-target="#detail-test" data-id="{{ $item->pxn_ma }}">Chi tiết</a>
                                                        <a href="#" class="btn btn-danger">X</a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $tongTienCanLamSan = $tongTienCanLamSan + ($giaCanLamSan->gdvcls_gia);
                                                @endphp
                                            @endforeach
                                            <div id="detail-test" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="my-modal-title">Thông tin chi tiết</h5>
                                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body content-result">

                                                        </div>
                                                        {{-- <div class="modal-footer">
                                                            Footer
                                                        </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th><b>Tổng tiền:</b> <span>{{ number_format($tongTienCanLamSan) }}VND</span></th>
                                            </tr>
                                        </tfoot>
                                    </table>
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
                                                            <th>Liều dùng</th>
                                                            <th>Cách dùng</th>
                                                            <th>Đơn giá</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody class="medical">
                                                                @php
                                                                    $tongTienThuoc = 0;
                                                                @endphp
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
                                                                        <input class="form-control" value="{{ $item->ctt_lieudung }}" name="lieuDung[]" />
                                                                    </td>
                                                                    <td>
                                                                        <input class="form-control" value="{{ $item->ctt_cachdung }}" name="cachDung[]" />
                                                                    </td>
                                                                    <td>
                                                                        @php
                                                                            $giaThuoc = DB::table('giathuoc')->where('thuoc_ma', $item->thuoc_ma)
                                                                            ->orderBy('gt_ngay','desc')->first();
                                                                        @endphp
                                                                        {{-- {{ $giaThuoc->gt_gia }} --}}
                                                                        <input type="text" name="" readonly value="{{ number_format($giaThuoc->gt_gia) }} VND" id="">
                                                                    </td>
                                                                    @php
                                                                        $tongTienThuoc = $tongTienThuoc + ($giaThuoc->gt_gia * $item->ctt_soluong);
                                                                    @endphp
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="6">
                                                                        <b>Tổng tiền:</b> {{ number_format($tongTienThuoc) }} VND
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="6" class="text-center">
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
        const arrService = [];
        const medicalAppointment = {{ $detail->pk_ma }};
        // console.log(medicalAppointment);
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
                        content += '<td>';
                        content += '<input class="form-control" name="lieuDung[]" />';
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

        $('select#testType').change(function (e) {
            e.preventDefault();
            $('.itemTest').remove();
            var idTestType = $(this).children("option:selected").val();
            console.log(idTestType);
            $.ajax({
                type: "GET",
                url: base_url+"/"+idTestType+"/can-lam-san",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    for (let l = 0; l < response.length; l++) {
                        $('.test').append('<option value="'+response[l].cls_ma+'" class="itemTest">'+response[l].cls_ten+'</option>');
                    }
                }
            });
        });

        $('select#serviceType').change(function (e) {
            e.preventDefault();
            $('.itemService').remove();

            var idServiceType = $(this).children("option:selected").val();
            // console.log(idServiceType);
            $.ajax({
                type: "GET",
                url: base_url+"/dich-vu/"+idServiceType+"/"+medicalAppointment,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    for (let l = 0; l < response.length; l++) {
                        $('.service').append('<option value="'+response[l].dv_ma+'" class="itemService">'+response[l].dv_ten+'</option>');
                    }
                }
            });

        });
        $('#addService').click(function (e) {
            // let result = text.replace(/^\s+|\s+$/gm,'');
            e.preventDefault();
            // console.log("clicked service");
            var idService = $('.service').val();
            var nameService = $('.service').text();
            console.log(idService);
            // console.log(nameService);
            if(idService == null) {
                alert("Không được để trống dịch vụ");
            }else {
                if(arrService.includes(idService)) {
                    alert("Đã thêm dịch vụ này !");
                }else {
                    arrService.push(idService);
                    console.log(arrService);
                    var content = '';
                    $.ajax({
                        type: "GET",
                        url: base_url+"/chi-tiet-dich-vu/"+idService,
                        // data: "data",
                        dataType: "json",
                        success: function (response) {
                            console.log(response);
                            content += '<tr class="itemServiceChose'+ idService +'">';
                            content += '<td></td>';
                            content += '<td>';
                            content += '<input value="'+ idService +'" hidden name="dichVu[]" />';
                            content += '<input value="'+ response.service.dv_ten +'" class="form-control" readonly />';
                            content += '</td>';
                            content += '<td>';
                            content += '<input value="'+ response.price.gdv_gia +'" name="gia[]" class="form-control" readonly />';
                            content += '</td>';
                            // data-id-service="'+ idService +'"
                            content += '<td>' + '<a href="#" data-id-service="'+ idService +'" class="btn btn-sm btn-danger removeService">Xóa</a>'+'</td>';
                            content += '</tr>';
                            $('.serviceAppend').append(content);
                            $('.removeService').click(function (e) {
                                e.preventDefault();
                                var idSer = $('.removeService').data('id-service');
                                $('.itemServiceChose'+idSer).remove();
                                arrService.splice(arrService.indexOf(idSer),1);
                                console.log(arrService);
                            });
                        }
                    });
                }
            }
        });



        $('.detail-test').click(function (e) {
            e.preventDefault();
            console.log("clicked");
            $('#ketQua').remove();
            $('#ghiChu').remove();
            var idTest = $('.detail-test').data('id');
            $.ajax({
                type: "get",
                url: base_url+"/chi-tiet-xet-nghiem/"+idTest,
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    var contentResult = '<p id="ketQua"><b>Kết quả</b>: <span >'+response.pxn_ketqua+'</span></p>';
                        contentResult += '<p id="ghiChu"><b>Ghi chú</b>: <span >'+ response.pxn_ghichu +'</span></p>';

                    $('.content-result').append(contentResult);
                }
            });
        });
    });
</script>
@endpush
