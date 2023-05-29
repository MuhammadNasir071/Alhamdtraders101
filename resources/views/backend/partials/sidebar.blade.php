<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{route('admin.dashboard')}}">
            <img src="{{asset('frontend/assets/img/alhamd_logo.svg')}}" alt="Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class=" {{Route::currentRouteName() == 'admin.dashboard' ? 'active' : ''}}">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard
                    </a>
                </li>
                <li class="{{Route::currentRouteName() == 'admin.categories.index' ? 'active' : ''}}">
                    <a href="{{route('admin.categories.index')}}">
                        <i class="fas fa-copy"></i>Categories
                    </a>
                </li>
                <li class="{{Route::currentRouteName() == 'admin.shippingtype.index' ? 'active' : (Route::currentRouteName() == 'admin.shippingtype.create' ? 'active' : (Route::currentRouteName() == 'admin.shippingtype.show' ? 'active' : (Route::currentRouteName() == 'admin.shippingtype.edit' ? 'active' : '')))}}">
                    <a class="js-arrow" href="#">
                        <i class="fas fa-map-marker-alt"></i>Shipping Type</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('admin.shippingtype.index')}}"> <i class="fas fa-chart-bar"></i>All Shipping Type</a>
                        </li>
                        <li>
                            <a href="{{route('admin.shippingtype.create')}}"> <i class="fas fa-chart-bar"></i>Add Shipping Type</a>
                        </li>
                    </ul>
                </li>
                <li class="{{Route::currentRouteName() == 'admin.product.index' ? 'active' : (Route::currentRouteName() == 'admin.product.add' ? 'active' : (Route::currentRouteName() == 'admin.products.show' ? 'active' : (Route::currentRouteName() == 'admin.products.edit' ? 'active' : '')))}}">
                    <a class="js-arrow" href="#">
                    <i class="fas fa-copy"></i>Products</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{route('admin.product.index')}}"> <i class="fas fa-chart-bar"></i>All Products</a>
                        </li>
                        <li>
                            <a href="{{route('admin.product.add')}}"> <i class="fas fa-chart-bar"></i>Add Product</a>
                        </li>
                    </ul>
                </li>

                <li class="{{Route::currentRouteName() == 'admin.orders.index' ? 'active' : (Route::currentRouteName() == 'admin.orders.show' ? 'active' : (Route::currentRouteName() == 'admin.orders.edit' ? 'active' : ''))}}">
                    <a href="{{route('admin.orders.index')}}">
                        <i class="fas fa-shopping-basket"></i>Orders
                    </a>
                </li>

                <li class="{{Route::currentRouteName() == 'admin.queries.index' ? 'active' : (Route::currentRouteName() == 'admin.queries.show' ? 'active' : '')}}">
                    <a href="{{route('admin.queries.index')}}">
                        <i class="fas fa-comment"></i>Queries
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<!-- END MENU SIDEBAR-->
