
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('admin/admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{route('dashboard')}}">
            <i class="fa fa-bar-chart"></i> <span>Thống kê</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-calendar-check-o"></i> <span>Quản lý đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{route('admin.order')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          </ul>
        </li>
        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-calendar-o"></i> <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{route('admin.product')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          </ul>
        </li>
        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-user"></i> <span>Quản lý khách hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{route('admin.customer')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          </ul>
        </li>
        <li class="active treeview menu-open">
          <a href="#">
            <i class="fa fa-sticky-note-o"></i> <span>Quản lý danh mục</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('auth.category')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          </ul>
        </li>
        <li class=" treeview menu-open">
          <a href="#">
            <i class="fa fa-expeditedssl"></i> <span>Quản lý tài khoản</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li ><a href="{{route('admin.user')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  