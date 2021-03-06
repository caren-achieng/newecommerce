<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="assets/images/logo.png" alt="Just Black and White Logo" class="rounded-circle" width="70" height="70px" style="opacity: .8">
        <span class="brand-text ml-2 font-weight-light">Just|Black$White</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <li>
                    <a class="nav-link link-secondary" href="
                        <?php
                            if (session()->has('id')) {
                                echo "#";
                            } else {
                                echo "/login";
                            }
                        ?>">
                        <?php
                        if (session()->has('id')) {
                            echo "Welcome " . session()->get('name');
                        } else {
                            echo "Login";
                        }
                        ?>
                    </a>
                </li>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/clients" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admins" class="nav-link">
                        <i class="fas fa-users-cog"></i>
                        <p>
                            Admins
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/categories" class="nav-link">
                        <i class="fas fa-shopping-bag"></i>                        <p>
                            Products
                            <i class="right fas fa-angle-down"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/categories" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/subcategories" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Subcategories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/product" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>Add Products</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/viewallproducts" class="nav-link">
                                <i class="fas fa-plus"></i>
                                <p>View All Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                        <i class="fas fa-id-card-alt"></i>
                        <p>Profile</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
