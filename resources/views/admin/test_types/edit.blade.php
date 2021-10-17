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
            <form action="{{route('loaixetnghiem.update',$loaicl)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">Tên loại xét nghiệm</div>
                    <div class="col-md-9"><input type="text" value="{{$loaicl->lcls_ten}}" name="lcls_ten" class="form-control"></div>
                    <div class="col-md-3">Mô tả</div>
                    <div class="col-md-9"><input type="text" value="{{$loaicl->lcls_mota}}" name="lcls_mota" class="form-control"></div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-info" onclick="window.history.go(-1); return false;">Hủy</button>
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
