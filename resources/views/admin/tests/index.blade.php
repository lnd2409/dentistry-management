@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('xetnghiem.create') }}">
                Thêm mới
            </a>
        </div>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Tên cận lâm sàn</th>
                <th>Mô tả</th>
                <th>Giá</th>
                <th>Loại cận lâm sàn</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($canlamsan as $item)
            <tr>
                <td>{{$item->cls_ten}}</td>
                <td>{{$item->cls_mota}}</td>
                <td>{{number_format($item->dongia->gdvcls_gia)??''}}</td>
                <td>{{$item->loaicanlamsan->lcls_ten}}</td>
                <td>
                    <form action="{{route('xetnghiem.destroy',$item)}}" method="post">
                        @csrf
                        <a href="{{route('xetnghiem.edit',$item)}}" class="btn btn-warning">sửa</a>
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
