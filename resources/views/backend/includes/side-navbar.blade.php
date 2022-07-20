<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
      <img src="{{asset('assets/backend/dist/img/avatar5.png')}}" alt="Ecommerce" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Ecommerce</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name ?? 'Admin'}}</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item menu-open">
                <a href="{{route('backend.dashboard')}}" class="nav-link {{'admin'==request()->path()?'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                   Dashboard
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>

              <li class="nav-item menu-open">
                <a href="{{route('user.index')}}" class="nav-link {{'user'==request()->path()?'active':''}}">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                   User Registered
                    <span class="right badge badge-danger">New</span>
                  </p>
                </a>
              </li>

          <li class="nav-item {{request()->is('category*')?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('category*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category.index')}}" class="nav-link {{request()->is('category')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.create')}}" class="nav-link {{request()->is('category/create')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item {{request()->is('subcategory*')?'menu-open':''}}">
            <a href="#" class="nav-link {{request()->is('subcategory*') ? 'active' :""}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sub Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('subcategory.index')}}" class="nav-link {{request()->is('subcategory')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('subcategory.create')}}" class="nav-link {{request()->is('subcategory/create')?'active':''}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
