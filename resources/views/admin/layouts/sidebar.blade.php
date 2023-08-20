<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">

        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                <div class="info">
                    <a href="#" class="d-block"></a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{ route('admin.') }}" class="nav-link ">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>پنل مدیریت</p>
                        </a>
                    </li>
                       @can('show-users')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link ">
                                <i class="nav-icon fa fa-users"></i>
                                <p>
                                    کاربران
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.users.index') }}" class="nav-link">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>لیست کاربران</p>
                                        </a>
                                    </li>
                                </ul>
                        </li>
                    @endcan

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                بخش اجازه دستسی
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        @can('show-permissions')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.permissions.index')}}" class="nav-link ">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>همه دسترسی ها</p>
                                </a>
                            </li>
                        </ul>
                        @endcan
                        @can('show-roles')
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('admin.roles.index')}}" class="nav-link ">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>همه مقام ها</p>
                                </a>
                            </li>
                        </ul>
                        @endcan
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fa fa-product-hunt"></i>
                            <p>
                                محصولات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.products.index') }}" class="nav-link">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>لیست محصولات</p>
                                </a>
                            </li>
                        </ul>
                    </li>






                    <li class="nav-item has-treeview">
                        <a href="{{route('admin.products.comments')}}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                              مدیریت نظرات
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

                    </li>



                    <li class="nav-item has-treeview">
                        <a href="{{route('admin.categories.index')}}" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>
                                مدیریت دسته بندی ها
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>

                    </li>




                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
