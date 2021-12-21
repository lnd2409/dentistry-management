@extends('admin.template.layout')
@push('css')
<style>
    .green{
        background-color: green;
    }
</style>
@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="container-fluid">
    <form action="" method="get">

        <input type="month" id="date" name="date" value="{{$request->date}}">
        <button type="submit" class="btn btn-primary">Xem</button>
    </form>
<br>
    @php
    $today = today();
    $year=(int)date('Y',strtotime($request->date));
    $month=(int)date('m',strtotime($request->date));
    $dates = [];
    for($i=1; $i < (int)date('t',strtotime($request->date)) + 1; ++$i) {
        $dates[] = \Carbon\Carbon::createFromDate($year, $month, $i)->format('d-m-Y');
        }
        @endphp

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ngày</th>
                    <th>Ca</th>
                    @foreach ($nv as $item)
                    <th>{{$item->nv_ten}}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($dates as $date)
                <tr>
                    <td>{{ $date }}</td>
                    {{-- ca --}}
                    <td>
                        @foreach ($ca as $ca2)
                    {{$ca2->ca_giobatdau}} - {{$ca2->ca_gioketthuc}} <br>
                    @endforeach
                    </td>
                    {{-- ca --}}
                    @foreach ($nv as $item)
                    <td>
                        @foreach ($ca as $ca2)
                        @if ($item->chamcong($date,$ca2->ca_ma))
                        {{$ca2->ca_ma==3?2:1}}
                        @endif <br>
                        @endforeach
                    </td>
                    @endforeach

                </tr>
                @endforeach
                <tr>
                    <td colspan="2"><b>Tổng</b></td>
                    @foreach ($nv as $item)
                        <td><b>{{$sum[$item->nv_ma]??0}}</b></td>
                    @endforeach
                </tr>
            </tbody>
        </table>

</div>
@endsection
@push('script')

@endpush
