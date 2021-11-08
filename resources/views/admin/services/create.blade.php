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
            <form action="{{route('dichvu.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="my-input">Tên dịch vụ</label>
                    <input type="text" name="dv_ten" class="form-control">
                </div>
                <div class="form-group">
                    <label for="my-input">Mô tả</label>
                    <input type="text" name="dv_mota" class="form-control">
                </div>
                <div class="form-group">
                    <label for="my-input">Thời gian dự kiến</label>
                    <input type="text" name="dv_thoigiandukien" class="form-control">
                </div>
                <div class="form-group">
                    <label for="my-input">Giá</label>
                    <input type="number" min="0" name="dongia" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Loại dịch vụ</label>
                    <select name="ldv_ma" id="" class="form-control" required>
                        @foreach ($ldv as $item)
                        <option value="{{$item->ldv_ma}}">{{$item->ldv_ten}}</option>
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
