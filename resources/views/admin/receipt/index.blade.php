@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Phiếu thu</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Phiếu thu</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('content')

<div class="container-fluid">
    <table class="table">
        <thead>
            <tr>
                <th>Mã số</th>
                <th>Ngày lập</th>
                <th>Tổng tiền</th>
                <th>Khách hàng</th>
                <th>Trạng thái</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @if ($data->count() > 0)
                @foreach ($data as $item)
                <tr>
                    <td>{{ $item->pt_ma }}</td>
                    <td>{{ $item->pt_ngaylap }}</td>
                    <td>{{ $item->pt_tongtien }}</td>
                    <td></td>
                    <td></td>
                    <td>
                        {{-- <form action="{{route('loaidichvu.destroy',$item)}}" method="post"> --}}
                            {{-- @csrf --}}
                            <a href="" class="btn btn-default">Chi tiết</a>
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
