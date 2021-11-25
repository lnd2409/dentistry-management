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
            <form action="{{route('thuoc.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="my-input">Tên thuốc</label>
                    <input type="text" name="thuoc_ten" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Hóa chất</label>
                    <input type="text" name="thuoc_hoachat" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Số lượng</label>
                    <input type="number" name="thuoc_soluong" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="my-input">Giá</label>
                    <input type="number" min="0" name="gt_gia" class="form-control" required>
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
