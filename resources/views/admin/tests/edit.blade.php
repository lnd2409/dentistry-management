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
            <form action="{{route('xetnghiem.update',$canlamsan)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="my-input">Tên cận lâm sàn</label>
                    <input type="text" value="{{$canlamsan->cls_ten}}" name="cls_ten" class="form-control">
                </div>
                <div class="form-group">
                    <label for="my-input">Mô tả</label>
                    <input type="text" value="{{$canlamsan->cls_mota}}" name="cls_mota" class="form-control">
                </div>
                <div class="form-group">
                    <label for="my-input">Giá</label>
                    <input type="number" min="0" value="{{$canlamsan->dongia->gdvcls_gia}}" name="dongia"
                        class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Loại cận lâm sàn</label>
                    <select name="lcls_ma" id="" class="form-control">
                        @foreach ($lcls as $item)
                        <option value="{{$item->lcls_ma}}" @if($item->lcls_ma==$canlamsan->lcls_ma) selected
                            @endif>{{$item->lcls_ten}}</option>
                        @endforeach
                    </select>
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
