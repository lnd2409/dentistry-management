@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('expertises.create') }}">
                Thêm mới
            </a>
        </div>
    </div>
    <br>

    <table class="table">
        <thead>
            <tr>
                <th>Tên chuyên môn</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($chuyenmon as $item)
            <tr>
                <td>{{$item->cm_ten}}</td>
                <td>
                    <form action="{{route('expertises.destroy',$item)}}" method="post">
                        @csrf
                        <a href="{{route('expertises.edit',$item)}}" class="btn btn-warning">sửa</a>
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
