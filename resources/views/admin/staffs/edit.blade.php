@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form action="{{route('staffs.update',$nhanvien)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">Tên</div>
                    <div class="col-md-9"><input type="text" name="nv_ten" class="form-control"
                            value="{{$nhanvien->nv_ten}}"></div>
                    <div class="col-md-3">Giới tính</div>
                    <div class="col-md-9">
                        <input type="radio" name="nv_gioitinh" value="nam" id="nam" @if($nhanvien->nv_gioitinh=="nam")
                        checked @endif><label for="nam">Nam</label>
                        <input type="radio" name="nv_gioitinh" value="nữ" id="nữ" @if($nhanvien->nv_gioitinh=="nữ")
                        checked @endif><label for="nữ">Nữ</label>
                    </div>
                    <div class="col-md-3">Địa chỉ</div>
                    <div class="col-md-9"><input type="text" name="nv_diachi" class="form-control"
                            value="{{$nhanvien->nv_diachi}}"></div>
                    <div class="col-md-3">CMND</div>
                    <div class="col-md-9"><input type="text" name="nv_cmnd" class="form-control"
                            value="{{$nhanvien->nv_cmnd}}"> </div>
                    <div class="col-md-3">SDT</div>
                    <div class="col-md-9"><input type="text" name="nv_sdt" class="form-control"
                            value="{{$nhanvien->nv_sdt}}"></div>
                    <div class="col-md-3">Username</div>
                    <div class="col-md-9"><input type="text" class="form-control" readonly
                            value="{{$nhanvien->username}}"></div>
                    <div class="col-md-3">Password</div>
                    <div class="col-md-9"><input type="text" name="password" class="form-control"></div>
                    <div class="col-md-3">Chức vụ</div>
                    <div class="col-md-9">
                        <select name="cv_ma" id="" class="form-control" required>
                            @foreach ($chucvu as $item)
                            <option value="{{$item->cv_ma}}" @if($nhanvien->cv_ma==$item->cv_ma) selected
                                @endif>{{$item->cv_ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">Chuyên môn</div>
                    <div class="col-md-9">
                        <select name="cm_ma" id="" class="form-control" required>
                            @foreach ($chuyenmon as $item)
                            <option value="{{$item->cm_ma}}" @if($nhanvien->cm_ma==$item->cm_ma) selected
                                @endif>{{$item->cm_ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-info"
                            onclick="window.history.go(-1); return false;">Hủy</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
@push('script')

@endpush
