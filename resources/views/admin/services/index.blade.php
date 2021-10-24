@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('dichvu.create') }}">
                Thêm mới
            </a>
        </div>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Tên dịch vụ</th>
                <th>Mô tả dịch vụ</th>
                <th>Thời gian dự kiến</th>
                <th>Đơn giá</th>
                <th>Loại DV</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dichvu as $item)
            <tr>
                <td>{{$item->dv_ten}}</td>
                <td>{{$item->dv_mota}}</td>
                <td>{{$item->dv_tgdukien}}</td>
                <td>{{number_format($item->giadv->dongia)}}</td>
                <td>{{$item->loaidv->ldv_ten}}</td>
                <td>
                    <form action="{{route('dichvu.destroy',$item)}}" method="post">
                        @csrf
                        <a href="{{route('dichvu.edit',$item)}}" class="btn btn-warning">sửa</a>
                        <button type="submit" class="btn btn-danger">xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@push('script')

@endpush
