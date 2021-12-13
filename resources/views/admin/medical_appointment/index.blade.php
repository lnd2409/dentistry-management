@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{-- <a class="btn btn-primary" href="{{ route('medical.record.add') }}">
                Thêm hồ sơ bệnh mới
            </a>
            <a class="btn btn-primary" href="{{ route('medical.record.add') }}">
                Tạo phiếu khám
            </a> --}}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('medical.record.index') }}" method="get">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="maSo">Mã số</label>
                            <input id="maSo" class="form-control" type="text" name="maSo">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hoTen">Họ tên</label>
                            <input id="hoTen" class="form-control" type="text" name="hoTen">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="soDienThoai">Số điện thoại</label>
                            <input id="soDienThoai" class="form-control" type="text" name="soDienThoai">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="namSinh">Năm sinh</label>
                            <input id="namSinh" class="form-control" type="text" name="namSinh">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group" style="text-align: center;">
                            <button class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Mã hồ sơ</th>
                <th>Họ tên</th>
                <th>Năm sinh</th>
                <th>Ngày khám</th>
                <th>Trạng thái</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->count() > 0)
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->hsb_maso }}</td>
                    <td>{{ $item->hsb_hotenkhachhang }}</td>
                    <td>{{ $item->hsb_namsinh }}</td>
                    <td>{{ $item->pk_ngaykham->format('d-m-Y') }}</td>
                    <td>
                        @if ($item->pk_trangthai == 1)
                            <p class="btn btn-warning">Đang thực hiện</p>
                        @else
                            <p class="btn btn-success">Hoàn thành</p>
                        @endif
                    </td>
                    <td>
                        {{-- <form action="{{route('loaidichvu.destroy',$item)}}" method="post"> --}}
                            {{-- @csrf --}}
                            <a href="{{ route('medical.appointment.detail', ['id'=>$item->pk_ma]) }}" class="btn btn-default">Chi tiết</a>
                            {{-- <a href="{{route('loaidichvu.edit',$item)}}" class="btn btn-warning">sửa</a>
                            <button type="submit" class="btn btn-danger">xóa</button> --}}
                        {{-- </form> --}}
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" style="text-align: center">Không có dữ liệu !</td>
                </tr>
            @endif

        </tbody>
    </table>
</div>
@endsection
@push('script')
@endpush
