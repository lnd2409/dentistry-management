@extends('aesthetic.layout')
@section('content')
@include('sweetalert::alert')

    <!-- Services Section Begin -->
    <section class="services spad set-bg" data-setbg="{{asset('/template/aesthetic/img/services-bg.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-6">
                    <div class="section-title">
                        <span>Tra cứu</span>
                        <h2>Lịch hẹn</h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="services__btn">
                    <form action="{{ route('customer.tracuulichhen') }} " method="post" enctype="multipart/form-data" id="findData">
                        @csrf
                        <input type="text" class="form-control" placeholder="Nhập mã lịch hẹn..." name="findData" >
                    </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="services__item">
                        <div class="services__item__text">
                           @if (!empty($data))
                                <h5><strong> {{$data->ph_maso}} </strong></h5>
                                <p>
                                  Tên khách hàng: <i> <strong>{{$data->ph_hoten}}</strong> </i>
                                </p>
                                <p>
                                    Số điện thoại: {{$data->ph_sdt}}
                                </p>
                                <p>
                                   Email:  {{$data->ph_email}}
                                </p>
                                <p>
                                    Ngày hẹn: {{ date('d-m-Y',strtotime($data->ph_ngayhen)) }} - {{$data->ph_giohen}}
                                </p>
                                <p> Trạng thái: 
                                 @if ($data->ph_trangthai == 1)
                                 <span class="badge bg-success">Đã xác nhận</span>
                                 @elseif($$data->ph_trangthai == 0)
                                 <span class="badge bg-warning">Đang xử lý</span>
                                 @elseif($$data->ph_trangthai == 2)
                                 <span class="badge bg-info">Đã đến khám</span>
                                 @elseif($$data->ph_trangthai == 3)
                                 <span class="badge bg-danger">Đã hủy</span>
                             @endif
                                </p>
                               
                           @else
                               <p><span style="color: red">Không tìm thấy kết quả!!!!!</span></p>
                           @endif
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Services Section End -->
@endsection
@push('scripts')
  <script>
      $('.input').keypress(function (e) {
        if (e.which == 13) {
            $("#findData").submit();
            return false;    //<---- Add this line
        }
     });
     
  </script>
@endpush

