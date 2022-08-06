<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="#"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.dash.main">Dashboard</span><span class="badge badge badge-info badge-pill float-right mr-2">3</span></a>
          <ul class="menu-content">
            <li><a class="menu-item" href="{{ route('register-user') }}" data-i18n="nav.dash.ecommerce">Add New User</a>
            </li>
            <li><a class="menu-item" href="{{route('user-show')}}" data-i18n="nav.dash.crypto">User management</a>
            </li>
            <li><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">Trip Management</a>
            </li>
            <li><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">Point Management</a>
            </li>
            <li><a class="menu-item" href="dashboard-sales.html" data-i18n="nav.dash.sales">Activity Management</a>
            </li>
          </ul>
        </li>



      </ul>
    </div>
  </div>
  @yield('sitebar')
</body>
