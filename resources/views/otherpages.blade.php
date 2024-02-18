<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=!, initial-scale=1.0">
    <title>  </title>
    
    <!-- Inclure Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    <!-- Autres styles personnalisés -->
    <link href="{{ asset('css/monstyle.css') }}" rel="stylesheet">
    <!-- insertion polices pour les titres h1 -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap">
    <!-- insertion police pour les titres h2 et h3 -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:wght@400;700&display=swap">
    <!-- insertion police pour les paragraphees -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap">

    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
  
        .b-example-divider {
          width: 100%;
          height: 3rem;
          background-color: rgba(0, 0, 0, .1);
          border: solid rgba(0, 0, 0, .15);
          border-width: 1px 0;
          box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }
  
        .b-example-vr {
          flex-shrink: 0;
          width: 1.5rem;
          height: 100vh;
        }
  
        .bi {
          vertical-align: -.125em;
          fill: currentColor;
        }
  
        .nav-scroller {
          position: relative;
          z-index: 2;
          height: 2.75rem;
          overflow-y: hidden;
        }
  
        .nav-scroller .nav {
          display: flex;
          flex-wrap: nowrap;
          padding-bottom: 1rem;
          margin-top: -1px;
          overflow-x: auto;
          text-align: center;
          white-space: nowrap;
          -webkit-overflow-scrolling: touch;
        }
  
        .btn-bd-primary {
          --bd-violet-bg: #712cf9;
          --bd-violet-rgb: 112.520718, 44.062154, 249.437846;
  
          --bs-btn-font-weight: 600;
          --bs-btn-color: var(--bs-white);
          --bs-btn-bg: var(--bd-violet-bg);
          --bs-btn-border-color: var(--bd-violet-bg);
          --bs-btn-hover-color: var(--bs-white);
          --bs-btn-hover-bg: #6528e0;
          --bs-btn-hover-border-color: #6528e0;
          --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
          --bs-btn-active-color: var(--bs-btn-hover-color);
          --bs-btn-active-bg: #5a23c8;
          --bs-btn-active-border-color: #5a23c8;
        }
        .bd-mode-toggle {
          z-index: 1500;
        }
      </style>

<script src="{{asset('js/jquery-3.7.1.slim.js')}}"></script>
<script>
    $(document).ready(function() {
        $('table').DataTable();
    });
</script>
</head>

<body>
   
    @include('layouts.header')

    <div class="container-fluid mb-4  mt-4 py-4 px-2">
        @yield('registerpage')
        @yield('loginpage')
        @yield('forgotpasswordpage')
        @yield('confirmpasswordpage')
        @yield('verifyemailpage')
        @yield('dashboarduserpage')
        @yield('displayuserprofil')
        @yield('displaydemandespage')
        @yield('displaylocations') 
        @yield('displaydemandes')       
        @yield('displaypayements')
        @yield('displayuserprofil')
        @yield('displaydeleteuserprofil')
        @yield('displaydemandesform')
        @yield('displaynotifications')
        @yield('displaygains')
        <!-- tous les fichiers de vues  admin -->
        @yield('content')
        
    </div>


 
  

   @include('layouts.footer')
  
  




    
    <!-- Inclure Bootstrap JS et Popper.js -->
    <script src="{{ asset('js/jquery-3.7.1.slim.js') }}"></script>    
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('js/datatables.js')}}" ></script>
    <!-- Autres scripts personnalisés -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://kit.fontawesome.com/8a80e8bd24.js" crossorigin="anonymous"></script>
</body>

</html>