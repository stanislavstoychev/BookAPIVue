<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
<link href="{{ asset('backend/img/logo/book.png') }}" rel="icon">
  <title>Библиотека</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css">
    <!-- Custom fonts for this template-->
    
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
    <!-- <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"> 
    -->
        <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css"
      integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK"
      crossorigin="anonymous"
    />


</head>

<body id="page-top">
    <div id="app">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Nav Item - Dashboard -->

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <img class="w-100" src="{{ asset('backend/img/logo/bookw.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">Библиотека</div>
      </a>
      

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="/employees">
                    <span>Employee Management</span></a>
            </li> -->



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fas fa-book"></i>
          <span>Книги</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="store-book">Добави книга</router-link>
            <router-link class="collapse-item" to="book">Списък с книгите</router-link>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap1"
          aria-expanded="true" aria-controls="collapseBootstrap1">
          <i class="fas fa-book-reader"></i>
          <span>Наемане</span>
        </a>
        <div id="collapseBootstrap1" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <router-link class="collapse-item" to="store-rent">Наемаене на книга</router-link>
            <router-link class="collapse-item" to="rent">Книги в клиентите</router-link>
          </div>
        </div>
      </li>
            <hr class="sidebar-divider">
      <div class="version" >v1.0</div>

            
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid " id="container-wrapper">
          
                    <router-view></router-view>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

</div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> -->
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"
      integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin.min.js') }}"></script>
</body>

</html>
