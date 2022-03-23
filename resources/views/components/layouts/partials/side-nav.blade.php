<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{ route('categories.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Categories
            </a>
            <a class="nav-link" href="{{ route('products.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Products
            </a>
            <a class="nav-link" href="{{ route('sizes.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Sizes
            </a>
            <a class="nav-link" href="{{ route('colors.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Colors
            </a>
            <a class="nav-link" href="{{ route('tags.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Tags
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ auth()->user()->usertype }}</a>
    </div>
</nav>
