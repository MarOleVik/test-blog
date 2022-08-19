<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">{{Auth::user()['name']}}</a>
        </div>
    </div>

        <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('posts.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                        Posts
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('contacts.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Contacts
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
            </li>
            @if ($moderator)
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
