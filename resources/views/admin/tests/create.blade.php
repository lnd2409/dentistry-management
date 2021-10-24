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
            <form action="{{route('xetnghiem.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">Tên cận lâm sàn</div>
                    <div class="col-md-9"><input type="text" name="cls_ten" class="form-control"></div>
                    <div class="col-md-3">Mô tả</div>
                    <div class="col-md-9"><input type="text" name="cls_mota" class="form-control"></div>
                    <div class="col-md-3">Giá</div>
                    <div class="col-md-9"><input type="number" min="0" name="dongia" class="form-control" required>
                    </div>
                    <div class="col-md-3">Loại cận lâm sàn</div>
                    <div class="col-md-9">
                        <select name="lcls_ma" id="" class="form-control" required>
                            @foreach ($lcls as $item)
                            <option value="{{$item->lcls_ma}}">{{$item->lcls_ten}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button type="button" class="btn btn-info"
                            onclick="window.history.go(-1); return false;">Hủy</button>
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
