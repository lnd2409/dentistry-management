@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('thuoc.create') }}">
                Thêm mới
            </a>
        </div>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Mã thuốc</th>
                <th>Tên thuốc</th>
                <th>Hóa chất</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($thuoc as $item)
            <tr>
                <td>{{$item->thuoc_ma}}</td>
                <td>{{$item->thuoc_ten}}</td>
                <td>{{$item->thuoc_hoachat}}</td>
                <td>{{number_format($item->thuoc_soluong)}}</td>
                <td>{{number_format($item->gia->gt_gia)??''}}</td>
                <td>
                    <form action="{{route('thuoc.destroy',$item)}}" method="post">
                        @csrf
                        <a href="{{route('thuoc.edit',$item)}}" class="btn btn-warning">sửa</a>
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
