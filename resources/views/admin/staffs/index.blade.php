@extends('admin.template.layout')
@push('css')

@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a class="btn btn-primary" href="{{ route('staffs.create') }}">
                Thêm mới
            </a>
        </div>
    </div>
    <br>
    @php
    $today = today(); 
    $dates = []; 

    for($i=1; $i < $today->daysInMonth + 1; ++$i) {
        $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('F-d-Y');
    }
@endphp

<table class="table">
    <thead>
        <tr>
        <th>DATE TODAY</th>
        <th>TIME IN</th>
        <th>TIME OUT</th>
        <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        foreach($dates as $date)
            <tr>
                <td><b>{{ $date }}</b></td>
                <input type="hidden" name="dateToday" value="{{ $date }}">
                <td><input type="time" name="timeIn" class="form-control col-md-10"></td>
                <td><input type="time" name="timeOut" class="form-control col-md-10"></td>
                <td> {{Form::button('<i class="fa fa-clock">&nbsp;&nbsp;SET TIME</i>',['type' => 'submit','class' => 'btn btn-warning btn-sm',  'style'=>"display: inline-block;"])}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
    <table class="table">
        <thead>
            <tr>
                <th>Tên nhân viên</th>
                <th>SDT</th>
                <th>Năm sinh</th>
                <th>Địa chỉ</th>
                <th>Giới tính</th>
                <th>Chức vụ</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nhanvien as $item)
            <tr>
                <td>{{$item->nv_ten}}</td>
                <td>{{$item->nv_sdt}}</td>
                <td>{{$item->nv_cmnd}}</td>
                <td>{{$item->nv_diachi}}</td>
                <td>{{$item->nv_gioitinh}}</td>
                <td>{{$item->chucvu->cv_ten}}</td>
                <td>
                    <form action="{{route('staffs.destroy',$item)}}" method="post">
                        @csrf
                        <a href="{{route('staffs.edit',$item)}}" class="btn btn-warning">sửa</a>
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
