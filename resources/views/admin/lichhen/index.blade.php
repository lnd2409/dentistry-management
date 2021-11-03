@extends('admin.template.layout')
@push('css')
@endpush
@section('breadcrumb')

@endsection
@section('content')
<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách đặt lịch hẹn</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Khách hàng</th>
                      <th>Số điện thoại</th>
                      {{-- <th>Email</th> --}}
                      <th>Ngày hẹn | Giờ hẹn</th>
                      <th>Nội dung yêu cầu</th>
                      <th>Trạng Thái</th>
                      <th>Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($lichhen as $item)
                         <tr>
                             <td> {{$item->ph_hoten}} </td>
                             <td> {{$item->ph_sdt}} </td>
                             {{-- <td> {{$item->ph_email}} </td> --}}
                             <td> {{$item->ph_ngayhen}}, {{$item->ph_giohen}} </td>
                             <td> {{$item->ph_yeucau}} </td>
                             <td>@if ($item->ph_trangthai == 1)
                                 <span class="badge bg-success">Đã xác nhận</span>
                                 @elseif($item->ph_trangthai == 0)
                                 <span class="badge bg-warning">Đang xử lý</span>
                                 @elseif($item->ph_trangthai == 2)
                                 <span class="badge bg-info">Đã đến khám</span>
                                 @elseif($item->ph_trangthai == 3)
                                 <span class="badge bg-danger">Đã hủy</span>
                             @endif</td>
                             <td>
                               @if ($item->ph_trangthai != 3)
                                  <form action="{{ route('admin.capnhatlichhen') }}" method="post" id="submitForm">  
                                    @csrf
                                    <input type="hidden" name="ph_ma" value=" {{$item->ph_ma}} ">
                                    <select name="trangthai" id="clickStatus" class="form-control">
                                        <option value="" selected disabled>---Trạng thái---</option>
                                        <option value="3" > Hủy</option>
                                        <option value="2" > Đã đến khám</option>
                                        <option value="1" > Đã xác nhận</option>
                                        <option value="0" > Đang xử lý</option>
                                    </select>
                                  </form>
                                @else
                                ----
                               @endif
                             </td>
                         </tr>
                     @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
@endsection
@push('script')
<script>
    $('#clickStatus').change(function (e) { 
        e.preventDefault();
        $('#submitForm').submit();
    });
</script>
@endpush
