<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Banner
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- Nav Item - Charts -->


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-image"></i>
            <span>Banners</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Banner Options:</h6>
                <a class="collapse-item" href="{{ route('banner.index') }}">Banners</a>
                <a class="collapse-item" href="{{ route('banner.create') }}">Add Banners</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Shop
    </div>

    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoryCollapse"
            aria-expanded="true" aria-controls="categoryCollapse">
            <i class="fas fa-sitemap"></i>
            <span>Category</span>
        </a>
        <div id="categoryCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Category Options:</h6>
                <a class="collapse-item" href="{{ route('category.index') }}">Category</a>
                <a class="collapse-item" href="{{ route('category.create') }}">Add Category</a>
            </div>
        </div>
    </li>
    {{-- Products --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productCollapse"
            aria-expanded="true" aria-controls="productCollapse">
            <i class="fas fa-cubes"></i>
            <span>Products</span>
        </a>
        <div id="productCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Product Options:</h6>
                <a class="collapse-item" href="{{ route('product.index') }}">Products</a>
                <a class="collapse-item" href="{{ route('product.create') }}">Add Product</a>
                <a class="collapse-item" href="{{ route('SearchByStockId') }}">Search By Stock Number</a>
            </div>
        </div>
    </li>

    {{-- Brands --}}
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Brands</span>
        </a>
        <div id="brandCollapse" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Brand Options:</h6>
                <a class="collapse-item" href="{{ route('brand.index') }}">Brands</a>
                <a class="collapse-item" href="{{ route('brand.create') }}">Add Brand</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#typeCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Types</span>
        </a>
        <div id="typeCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Brand Options:</h6>
                <a class="collapse-item" href="{{ route('type.index') }}">Types</a>
                <a class="collapse-item" href="{{ route('type.create') }}">Add Type</a>
            </div>
        </div>
    </li>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#engineCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Engines</span>
        </a>
        <div id="engineCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Engines Options:</h6>
                <a class="collapse-item" href="{{ route('engine.index') }}">Engine</a>
                <a class="collapse-item" href="{{ route('engine.create') }}">Add Engine</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#fuelCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Fuel types</span>
        </a>
        <div id="fuelCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Fuel Type Options:</h6>
                <a class="collapse-item" href="{{ route('fueltype.index') }}">Fuel Type</a>
                <a class="collapse-item" href="{{ route('fueltype.create') }}">Add Fuel Type</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gradeCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>grade types</span>
        </a>
        <div id="gradeCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">grade Type Options:</h6>
                <a class="collapse-item" href="{{ route('grade.index') }}">grade Type</a>
                <a class="collapse-item" href="{{ route('grade.create') }}">Add grade Type</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transmissionCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>TransMission</span>
        </a>
        <div id="transmissionCollapse" class="collapse" aria-labelledby="headingFour"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">TransMission Options:</h6>
                <a class="collapse-item" href="{{ route('transmission.index') }}">TransMission </a>
                <a class="collapse-item" href="{{ route('transmission.create') }}">Add TransMission </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#colorCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Colours</span>
        </a>
        <div id="colorCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Colours Options:</h6>
                <a class="collapse-item" href="{{ route('color.index') }}">Colours </a>
                <a class="collapse-item" href="{{ route('color.create') }}">Add Colours </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#accessrioesCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Accessories</span>
        </a>
        <div id="accessrioesCollapse" class="collapse" aria-labelledby="headingFour"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Accessories Options:</h6>
                <a class="collapse-item" href="{{ route('accessories.index') }}">Accessories </a>
                <a class="collapse-item" href="{{ route('accessories.create') }}">Add Accessory </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#countriesCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Countries</span>
        </a>
        <div id="countriesCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Countries Options:</h6>
                <a class="collapse-item" href="{{ route('countries.index') }}">Countries </a>
                <a class="collapse-item" href="{{ route('countries.create') }}">Add Countries </a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#freightsCollapse"
            aria-expanded="true" aria-controls="brandCollapse">
            <i class="fas fa-table"></i>
            <span>Freights</span>
        </a>
        <div id="freightsCollapse" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Freights:</h6>
                <a class="collapse-item" href="{{ route('freights.index') }}">Freights </a>
                <a class="collapse-item" href="{{ route('freights.create') }}">Add Freights </a>
            </div>
        </div>
    </li>
    {{-- Shipping --}}


    <!--Orders -->


    <!-- Reviews -->


    <!-- Divider -->


    <!-- Posts -->




    <!-- Tags -->


    <!-- Comments -->



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Heading -->
    <div class="sidebar-heading">
        General Settings
    </div>

    <!-- Users -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('users.index') }}">
            <i class="fas fa-users"></i>
            <span>Users</span></a>
    </li>
    <!-- General settings -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('settings') }}">
            <i class="fas fa-cog"></i>
            <span>Settings</span></a>
    </li>
  
    <li class="nav-item">
        <a class="nav-link" href="{{ route('backups.index') }}">
            <i class="fas fa-cog"></i>
            <span>Backups</span></a>
    </li>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
