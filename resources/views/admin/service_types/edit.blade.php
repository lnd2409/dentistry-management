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
            <form action="{{route('loaidichvu.update',$loaidv)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="my-input">Tên loại dịch vụ</label>
                    <input type="text" value="{{$loaidv->ldv_ten}}" name="ldv_ten" class="form-control">
                </div>
                <div class="form-group">
                    <label for="my-input">Mô tả</label>
                    <input type="text" value="{{$loaidv->ldv_mota}}" name="ldv_mota" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="button" class="btn btn-info"
                        onclick="window.history.go(-1); return false;">Hủy</button>
                </div>
            </form>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
@push('script')

@endpush
