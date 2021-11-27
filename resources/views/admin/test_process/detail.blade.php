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
                    <h1>Thông tin cận lâm sàn</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Thông tin cận lâm sàn</li>
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

                            <h3 class="profile-username text-center">{{ $detail->hsb_hotenkhachhang }}</h3>

                            {{-- <p class="text-muted text-center">{{ $info->hsb_sdt }}</p> --}}

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Giới tính</b> <a class="float-right">{{ $detail->hsb_gioitinh == 1 ? 'Nam' : 'Nữ' }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Năm sinh</b> <a class="float-right">{{ $detail->hsb_namsinh }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Số điện thoại</b> <a class="float-right">{{ $detail->hsb_sdt }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Địa chỉ</b> <a class="float-right">{{ $detail->hsb_diachi }}</a>
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

                            <h3 class="profile-username text-center">Chi tiết</h3>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Kết quả</b> <a class="float-right">{{ $detail->pxn_ketqua }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ghi chú</b> <a class="float-right">{{ $detail->pxn_ghichu }}</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <form method="post" enctype="multipart/form-data" action="{{ route('test.process.update', ['id'=>$detail->pxn_ma]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="ketQua">Kết quả</label>
                            <textarea class="form-control" name="ketQua" id="ketQua" cols="30" rows="5">{{ $detail->pxn_ketqua }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="hinhAnh">Hình ảnh</label>
                            <input id="hinhAnh" class="form-control-file" type="file" name="hinhAnh">
                        </div>
                        <div class="form-group">
                            <label for="ghiChu">Ghi chú</label>
                            <textarea class="form-control" name="ghiChu" id="ghiChu" cols="30" rows="5">{{ $detail->pxn_ghichu }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="trangThai">Trạng thái</label>
                            <select id="trangThai" class="form-control" name="trangThai">
                                <option value="1" @if ($detail->pxn_trangthai == 1)
                                    selected
                                @endif>Đang thực hiện</option>
                                <option value="2" @if ($detail->pxn_trangthai == 2)
                                    selected
                                @endif>Hoàn thành</option>
                                <option value="3" @if ($detail->pxn_trangthai == 3)
                                    selected
                                @endif>Đã hủy</option>
                            </select>
                        </div>
                        <button class="btn btn-success" type="submit">Cập nhật</button>
                    </form>
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

</script>
@endpush
