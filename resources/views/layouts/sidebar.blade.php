 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="{{asset('AdminLTE')}}/dist/img/cc.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">NAVIGATION</li>
          <li class="nav-item menu-open">
            <a href="/admin/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/profile" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                Profile
              </p>
            </a>
          </li>
        @if (auth()->user()->type == 'Admin')
          <li class="nav-item">
            <a href="/admin/user" class="nav-link">
              <i class="nav-icon far fa-user"></i>
              <p>
                User Management
              </p>
            </a>
          </li>
        @endif
          <li class="nav-item">
            <a href="/admin/services" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>Concord Services</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/prospective" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Prospective Clients</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/admin/clients" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Clients</p>
            </a>
          </li>
        @if (auth()->user()->type == 'Admin' or auth()->user()->type == 'HR')
          <li class="nav-item">
            <a href="/admin/export" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>Export CSV NPT</p>
            </a>
          </li>
        @endif
        @if (auth()->user()->type == 'Admin' or auth()->user()->type == 'HR')
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                Document
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/invoice" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/contract" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contract</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/prop" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proposal</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/alldoc" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Documents</p>
                </a>
              </li>
            </ul>
          </li>
        @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>