
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('dashboard')}}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.products.list')}}" class="nav-link">products</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.categories.list')}}" class="nav-link">Categories</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.collections.list')}}" class="nav-link">Collections</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{route('admin.collections.list')}}" class="nav-link">Commandes</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    
    
    </ul>
</nav>
<!-- /.navbar -->

  
  
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


<!-- Brand Logo -->
<a href="{{route('dashboard')}}" class="brand-link">
    <span class="brand-text font-weight-light">Espace de controle</span>
</a>



<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
    </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item menu-open">
                <a href="{{route('dashboard')}}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Panneau de controle
                    </p>
                </a>
            </li>



            <li class="nav-header">PRODUITS</li>
            <li class="nav-item">
                <a href="{{route('admin.products.list')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Liste des produits
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.products.create')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        creation d'un produits
                    </p>
                </a>
            </li>


            <li class="nav-header">CATEGORIES</li>
            <li class="nav-item">
                <a href="{{route('admin.categories.list')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Liste des categories
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.categories.create')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        creation d'une categorie
                    </p>
                </a>
            </li>


            <li class="nav-header">COLLECTIONS</li>
            <li class="nav-item">
                <a href="{{route('admin.collections.list')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Liste des collections
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.collections.create')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        creation d'une collection
                    </p>
                </a>
            </li>


            <li class="nav-header">CLIENTS</li>
            <li class="nav-item">
                <a href="{{route('admin.clients.list')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Liste des clients
                    </p>
                </a>
            </li>



            <li class="nav-header">COMMANDE</li>
            <li class="nav-item">
                <a href="{{route('admin.orders.list')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Liste des commandes
                    </p>
                </a>
            </li>

            <li class="nav-header">CONTACT</li>
            <li class="nav-item">
                <a href="{{route('admin.contacts.list')}}" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>
                        Liste des contacts
                    </p>
                </a>
            </li>

        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->




</aside>
