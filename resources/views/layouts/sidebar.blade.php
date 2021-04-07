<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('post.index')}}" class="nav-link">
            <i class="nav-icon far fa-newspaper"></i>
              <p>Posts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('my.posts')}}" class="nav-link">
            <i class="nav-icon far fa-newspaper"></i>
              <p>My posts</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-cog"></i>
              <p>Profile</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>