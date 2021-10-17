@extends('admin.template.layout')
@push('css')
    
@endpush
@section('breadcrumb')
    
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('loaixetnghiem.create') }}">
                Thêm mới
              </a>
        </div>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Tên loại xét nghiệm</th>
                <th>Mô tả</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($loaicls as $item)
            <tr>
                <td>{{$item->lcls_ten}}</td>
                <td>{{$item->lcls_mota}}</td>
                <td>
                    <form action="{{route('loaixetnghiem.destroy',$item)}}" method="post">
                        @csrf
                        <a href="{{route('loaixetnghiem.edit',$item)}}">sửa</a>
                        <button type="submit">xóa</button>
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
