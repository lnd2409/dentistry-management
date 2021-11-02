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
            <form action="{{route('expertises.store')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-3">Tên</div>
                    <div class="col-md-9"><input type="text" name="cm_ten" class="form-control" required></div>

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
