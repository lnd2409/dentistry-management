 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index3.html" class="brand-link">
         <img src="{{asset('template/admin/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">AdminLTE 3</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{asset('template/admin/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">Alexander Pierce</a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-item has-treeview menu-open">
                     <a href="#" class="nav-link active">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('admin.lichhen') }}"
                                 class="nav-link @if(Request::segment(2)=='lich-hen' ) active @endif">
                                 <i class="fas fa-th-list"></i>
                                 <p>
                                     Lịch hẹn
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('thuoc.index')}}"
                                 class="nav-link @if(Request::segment(1)=='thuoc' ) active @endif">
                                 <i class="fas fa-capsules"></i>
                                 <p>
                                     Thuốc
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('loaidichvu.index')}}"
                                 class="nav-link @if(Request::segment(1)=='loai-dich-vu' ) active @endif">
                                 <i class="fas fa-prescription-bottle-alt"></i>
                                 <p>
                                     Loai dịch vụ
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('dichvu.index')}}"
                                 class="nav-link @if(Request::segment(1)=='dich-vu' ) active @endif">
                                 <i class="fas fa-prescription-bottle-alt"></i>
                                 <p>
                                     Dịch vụ
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('loaixetnghiem.index')}}"
                                 class="nav-link @if(Request::segment(1)=='loai-xet-nghiem' ) active @endif">
                                 <i class="fas fa-stethoscope"></i>
                                 <p>
                                     Loại xét nghiệm
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('xetnghiem.index')}}"
                                 class="nav-link @if(Request::segment(1)=='xet-nghiem' ) active @endif">
                                 <i class="fas fa-stethoscope"></i>
                                 <p>
                                     Xét nghiệm
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('staffs.index')}}"
                                 class="nav-link @if(Request::segment(1)=='quan-tri' ) active @endif">
                                 <i class="fas fa-users"></i>
                                 <p>
                                     Nhân viên
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('schedules.index')}}"
                                 class="nav-link @if(Request::segment(1)=='lich-truc' ) active @endif">
                                 <i class="far fa-calendar-alt"></i>
                                 <p>
                                     Lịch trực
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('expertises.index')}}"
                                 class="nav-link @if(Request::segment(1)=='chuyen-mon' ) active @endif">
                                 <i class="fas fa-id-card"></i>
                                 <p>
                                     Chuyên môn
                                 </p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{route('staff.logout')}}"
                                 class="nav-link @if(Request::segment(2)=='dang-xuat' ) active @endif">
                                 <i class="fas fa-sign-out-alt"></i>
                                 <p>
                                     Đăng xuất
                                 </p>
                             </a>
                         </li>


                     </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
