@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('loaidichvu.create') }}">
                Thêm mới
            </a>
        </div>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Mã loại</th>
                <th>Tên</th>
                <th>Mô tả</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($loaidv as $item)
            <tr>
                <td>{{$item->ldv_ma}}</td>
                <td>{{$item->ldv_ten}}</td>
                <td>{{$item->ldv_mota}}</td>
                <td>
                    <form action="{{route('loaidichvu.destroy',$item)}}" method="post">
                        @csrf
                        <a href="{{route('loaidichvu.edit',$item)}}" class="btn btn-warning">sửa</a>
                        <button type="submit" class="btn btn-danger">xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>
@endsection
@push('script')
@endpush
