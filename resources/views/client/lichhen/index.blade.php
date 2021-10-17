@extends('aesthetic.layout')
@section('content')
@include('sweetalert::alert')

    <!-- Services Section Begin -->
    <section class="services spad set-bg" data-setbg="{{asset('template/aesthetic/img/services-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="section-title">
                        <span>Our services</span>
                        <h2>Lịch hẹn của bạn</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($lichHen as $val)
                    <div class="col-lg-6 col-md-6">
                        <div class="services__item">
                            <div class="services__item__icon">
                                <span class="flaticon-027-beauty"></span>
                            </div>
                            <div class="services__item__text">
                                <h5>{{$val->ph_yeucau}}</h5>
                                <p>
                                    Ngày hẹn: <strong>{{date('d-m-Y',strtotime($val->ph_ngayhen))}}</strong>
                                </p>
                                <p>
                                    Giờ hẹn: <strong>{{$val->ph_giohen}}</strong> 
                                </p>
                                <p>
                                    Trạng thái: @if ($val->ph_trangthai == 0) <span style="color: red">Chưa tiếp nhận</span>
                                    @else
                                    <span style="color: green">Đã tiếp nhận</span>   
                                    @endif
                                </p>
                                <p>Ngày lập phiếu hẹn: <small>{{date('d-m-Y',strtotime($val->created_at))}} </small></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Services Section End -->

    
@endsection
@push('scripts')
  
@endpush

