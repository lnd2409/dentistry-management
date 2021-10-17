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
            <form action="{{route('dichvu.update',$dichvu)}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">Tên dịch vụ</div>
                    <div class="col-md-9"><input type="text" value="{{$dichvu->dv_ten}}" name="dv_ten" class="form-control"></div>
                    <div class="col-md-3">Mô tả</div>
                    <div class="col-md-9"><input type="text" value="{{$dichvu->dv_mota}}" name="dv_mota" class="form-control"></div>
                    <div class="col-md-3">Thời gian dự kiến</div>
                    <div class="col-md-9"><input type="text" value="{{$dichvu->dv_tgdukien}}" name="dv_tgdukien" class="form-control"></div>
                    <div class="col-md-3">Loại dịch vụ</div>
                    <div class="col-md-9">
                        <select name="ldv_ma" id="" class="form-control">
                            @foreach ($ldv as $item)
                                <option value="{{$item->ldv_ma}}" @if($dichvu->ldv_ma==$item->ldv_ma) selected @endif>{{$item->ldv_ten}}</option>                            
                            @endforeach
                        </select>
                    </div>
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
