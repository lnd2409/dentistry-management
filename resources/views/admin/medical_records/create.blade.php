@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        {{-- <div class="col-md-2"></div> --}}
        <div class="col-md-12">
            <form action="{{route('medical.record.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="hsb_maso">Mã hồ sơ</label>
                    <input id="hsb_maso" class="form-control" type="text" readonly name="hsb_maso" value="{{ $randCode }}">
                </div>
                <div class="form-group">
                    <label for="hsb_hotenkhachhang">Họ tên</label>
                    <input id="hsb_hotenkhachhang" class="form-control" type="text" name="hsb_hotenkhachhang">
                </div>
                <div class="form-group">
                    <label for="hsb_gioitinh">Giới tính</label>
                    <select name="hsb_gioitinh" id="hsb_gioitinh" class="form-control">
                        <option value="1">Nam</option>
                        <option value="0">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="hsb_namsinh">Năm sinh</label>
                    <input id="hsb_namsinh" class="form-control" type="number" name="hsb_namsinh">
                </div>
                <div class="form-group">
                    <label for="hsb_sdt">Số điện thoại</label>
                    <input id="hsb_sdt" class="form-control" type="number" name="hsb_sdt">
                </div>
                <div class="form-group">
                    <label for="hsb_diachi">Địa chỉ</label>
                    <input id="hsb_diachi" class="form-control" type="text" name="hsb_diachi">
                </div>
                <div class="form-group">
                    <a href="{{ route('medical.record.index') }}" class="btn btn-default">Quay về</a>
                    <button class="btn btn-primary" type="submit">Lưu</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')

@endpush
