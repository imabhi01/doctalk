<!DOCTYPE html>
<html>
<head>
    <title>Awe component 3</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"> -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,800;1,500&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>    
    <style>
        .col-sm-8, .col-sm-4, .box{
            border: 1px solid #f5f5f5;
            margin: 0px;
            padding: 50px;
        }
        li.breadcrumb-item a {
            color: #000;
            text-decoration: none;
        }
        svg {
            vertical-align: middle;
            width: 20px;
        }
        nav.flex.items-center.justify-between {
            text-align: right;
            margin-right: 11.5%;
        }
        p.text-sm.text-gray-700.leading-5 {
            margin-top: 12px;
        }

        .add-button{
            text-align: right;
            margin-bottom: 10px;
        }
        
        img.img-thumbnail {
            height: 200px;
            width: 150px;
        }
    </style>
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-item nav-link @if(request()->route()->getName() == '/') active @endif" href="{{ url('product/index') }}">Dashboard</a>
                <a class="nav-item nav-link @if(in_array(request()->route()->getName(), ['product.index', 'product.show'])) active @endif" href="{{ url('product/index') }}">Manage Products</a>
                @if(auth()->user()->role == 'admin')
                <a class="nav-item nav-link @if(in_array(request()->route()->getName(), ['user.index', 'user.show'])) active @endif" href="{{ route('user.index') }}">Manage Customers</a>
                @endif
                <a class="nav-item nav-link @if(request()->route()->getName() == 'orders') active @endif" href="{{ route('all.orders') }}">All Orders</a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <button class="btn btn-secondary" type="button"  href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </nav>
    
    <div>
        <div>
            @yield("product-content") <!-- Card template to display products -->
        </div>
        <div>
            @yield("product-item")  <!-- Form to Add products -->
        </div>
    </div>
    <!-- Footer -->
    <footer class="page-footer font-small blue">

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© {{ date('Y') }} Copyright:
    <a href="#"> Pandemic Store </a>
    </div>
    <!-- Copyright -->

    </footer>
    <!-- Footer -->
    <script src="{{asset('js/main.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script> 
    <!-- <script src="http://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    @yield('scripts')
</body>
</html>
