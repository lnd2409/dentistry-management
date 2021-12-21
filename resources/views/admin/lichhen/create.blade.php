 @extends('admin.template.layout')
 @push('css')
 @endpush
 @section('breadcrumb')

 @endsection
 @section('content')
      <div class="container">
           <div class="row">
                <div class="col-md-8 m-auto">
                     <!-- general form elements -->
                     <div class="card card-primary">
                          <div class="card-header">
                               <h3 class="card-title  text-uppercase">Thêm phiếu hẹn</h3>
                          </div>
                          <!-- /.card-header -->
                          <!-- form start -->
                          <form role="form" action="{{ route('customer.datlichhen') }}" method="POST" enctype="multipart/form-data" >
                            @csrf
                               <div class="card-body">
                                    {{-- <div class="form-group">
                                         <label for="exampleInputEmail1">Mã phiếu hẹn</label>
                                         <input type="text" class="form-control" id="exampleInputEmail1"
                                            name="ph_maso" disabled value="{{}}">
                                    </div> --}}
                                    <div class="form-group">
                                         <label for="exampleInputEmail1">Họ tên khách hàng</label>
                                         <input type="text" class="form-control" id="exampleInputEmail1"
                                             name="hoten" placeholder="Họ tên">
                                    </div>
                                    <div class="form-group">
                                         <label for="exampleInputPassword1">Email</label>
                                         <input  class="form-control" id="exampleInputPassword1"
                                              type="email"  name="email"  placeholder="Email" >
                                    </div>
                                    <div class="form-group">
                                         <label for="exampleInputPassword1">Số Điện thoại</label>
                                         <input  class="form-control" id="exampleInputPassword1"
                                              type="number"  name="sdt" placeholder="Số điện thoại"  >
                                    </div>
                                    <div class="form-group">
                                         <label for="exampleInputPassword1">Ngày hẹn</label>
                                        <input type="datetime-local" name="ngayhen" placeholder="Ngày hẹn" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Dịch vụ</label>
                                        <select name="noidung" class="form-control">
                                             <option value="">---Chọn dịch vụ---</option>
                                             <option value="Chỉnh hình">Chỉnh hình</option>
                                             <option value="Nội nha">Nội nha</option>
                                             <option value="Tái khám">Tái khám</option>
                                             <option value="Dịch vụ khác">Dịch vụ khác...</option>
                                        </select>
                                    </div>
                                    <input type="hidden" name="typeAdmin" value="admin">
                               </div>
                               <!-- /.card-body -->

                               <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Thêm</button>
                               </div>
                          </form>
                     </div>
                </div>
           </div>
      </div>
 @endsection
 @push('script')
      <script>

      </script>
 @endpush
