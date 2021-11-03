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
            <form action="{{route('thuoc.update',$thuoc)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">Tên thuốc</div>
                    <div class="col-md-9"><input type="text" value="{{$thuoc->t_ten}}" name="t_ten" class="form-control" required></div>
                    <div class="col-md-3">Hóa chất</div>
                    <div class="col-md-9"><input type="text" value="{{$thuoc->t_hoachat}}" name="t_hoachat" class="form-control" required></div>
                    <div class="col-md-3">Giá</div>
                    <div class="col-md-9"><input type="number" min="0" value="{{$thuoc->gia->gt_gia}}" name="gt_gia" class="form-control" required></div>
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
