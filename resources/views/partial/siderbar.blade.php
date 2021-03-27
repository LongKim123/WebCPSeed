 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       @if(Auth::check())
        <div class="info">
          <a href="{{URL::to('/logout')}}" class="d-block">Đăng xuất</a>
        </div>
      @else
       <div class="info">
          <a href="{{URL::to('/')}}" class="d-block">Đăng nhập</a>
        </div>
      @endif
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
           <li class="nav-item">
            <a href="{{route('dashboard.ỉndex')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                DashBoard
                
              </p>
            </a>
          <li class="nav-item">
            <a href="{{route('categories.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh muc sản phẩm
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('brands.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Thương hiệu
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{route('menus.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Menus
               
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="{{route('customers.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh sách khách hàng
               
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{route('product.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Sản phẩm
                
              </p>
            </a>
          </li>
            <li class="nav-item">
            <a href="{{route('slider.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý Slider
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('orders.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý đơn hàng
                
              </p>
            </a>
          </li>
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Quản lý trang giới thiệu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Nhân sự
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('categories_hr.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Phân loại nhân sự</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="{{route('hr.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách nhân sự chủ chốt</p>
                </a>
              </li>
              
            </ul>
              </li>
              <li class="nav-item">
                <a href="{{route('news_farmer.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Giới thiệu chung</p>
                </a>
              </li>
            </ul>
          </li>
      
              <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-plus-square"></i>
              <p>
                Quản lý trang R&D
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('news_farmer.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bạn nhà nông</p>
                </a>
              </li>
              
              
              <li class="nav-item">
                <a href="{{route('hr.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>....</p>
                </a>
              </li>
              
            </ul>
          </li>
            <li class="nav-item">
            <a href="{{route('settings.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Quản lý Settings
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh sách nhân viên
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Danh sách các vai trò(Roles)
              </p>
            </a>
          </li>
             <li class="nav-item">
            <a href="{{route('permissions.create')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tạo dữ liệu bảng Permissions
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>