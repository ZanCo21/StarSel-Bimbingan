<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Siswa Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/assets/css/admin/flag-icon.min.css">
    <link rel="stylesheet" href="/assets/css/admin/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="/assets/css/admin/css-stars.css" />
    <link rel="stylesheet" href="/assets/css/admin/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="/assets/css/admin/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
    {{-- jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile border-bottom">
                    <a href="#" class="nav-link flex-column">
                        <div class="nav-profile-image">
                            <img src="{{url('assets/images/logo/profileavatar.png')}}" />
                            <!--change to offline or busy as needed-->
                        </div>
                        <div class="nav-profile-text d-flex ml-0 mb-3 flex-column">
                            <span class="font-weight-semibold mb-1 mt-2 text-center">Siswa</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item pt-3">
                    <form class="d-flex align-items-center" action="#">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <i class="input-group-text border-0 mdi mdi-magnify"></i>
                            </div>
                            <input type="text" class="form-control border-0" placeholder="Search" />
                        </div>
                    </form>
                </li>
                <li class="pt-2 pb-1">
                    <span class="nav-item-head">Menu</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('murid_dashboard')}}">
                        <i class="mdi mdi-compass-outline menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                {{-- <div class="select-menu">
                    <div class="select-btn">
                        <i class="mdi mdi-compass-outline menu-icon" style="font-size: 22px; pa"></i>
                        <span class="sBtn-text menu-title">Bimbingan</span>
                        <i class="bx bx-chevron-down "></i>
                    </div>
                    <ul class="options">
                        <li class="option">
                            <i class="bx bxl-github" style="color: #171515;"></i>
                            <a href="{{url('/murid/konseling/bimbinganpribadi')}}">
                                <span class="option-text">Bimbingan pribadi</span>
                            </a>
                        </li>
                        <li class="option">
                            <i class="bx bxl-instagram-alt" style="color: #E1306C;"></i>
                            <a href="/murid/konseling/bimbingansosial">
                                <span class="option-text">Bimbingan Sosial</span>
                            </a>
                        </li>
                        <li class="option">
                            <i class="bx bxl-linkedin-square" style="color: #0E76A8;"></i>
                            <a href="/murid/konseling/bimbingankarir">
                                <span class="option-text">Bimbingan Karir</span>
                            </a>
                        </li>
                        <li class="option">
                            <i class="bx bxl-facebook-circle" style="color: #4267B2;"></i>
                            <span class="option-text">Bimbingan Belajar</span>
                        </li>
                    </ul>
                </div> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link collapsed" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                      <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                      <span class="menu-title">Bimbingan</span>
                      <i class="menu-arrow" style="color: black"></i>
                    </a>
                    <div class="collapse" id="ui-basic" style="">
                      <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                          <a class="nav-link" href="{{url('/siswa/konseling/bimbingan-pribadi')}}">Bimbingan Pribadi</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{url('/siswa/konseling/bimbingan-sosial')}}">Bimbingan Sosial</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{url('/siswa/konseling/bimbingan-karir')}}">Bimbingan Karir</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/siswa/konseling/bimbingan-belajar')}}">Bimbingan Belajar</a>
                          </li>
                      </ul>
                    </div>
                  </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/murid/konseling')}}">
                        <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                        <span class="menu-title">Konsultasi</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{Route('logout')}}">
                        <i class="mdi mdi-logout menu-icon"></i>
                        <span class="menu-title">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_settings-panel.html -->
            <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles default primary"></div>
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles light"></div>
                </div>
            </div>
            <!-- partial -->
            <!-- partial:partials/_navbar.html -->
            <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
                <div class="navbar-menu-wrapper d-flex align-items-stretch">
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="mdi mdi-chevron-double-left"></span>
                    </button>
                    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                        <a class="navbar-brand brand-logo-mini" href="index.html"><img
                                src="../assets/images/logo-mini.svg" alt="logo" /></a>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" id="messageDropdown" href="#" data-toggle="dropdown"
                                aria-expanded="false">
                                <i class="mdi mdi-email-outline"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list"
                                aria-labelledby="messageDropdown">
                                <h6 class="p-3 mb-0 font-weight-semibold">Messages</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="../assets/images/faces/face1.jpg" alt="image"
                                            class="profile-pic">
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Mark send you a
                                            message</h6>
                                        <p class="text-gray mb-0"> 1 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="../assets/images/faces/face6.jpg" alt="image"
                                            class="profile-pic">
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Cregh send you a
                                            message</h6>
                                        <p class="text-gray mb-0"> 15 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <img src="../assets/images/faces/face7.jpg" alt="image"
                                            class="profile-pic">
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject ellipsis mb-1 font-weight-normal">Profile picture
                                            updated</h6>
                                        <p class="text-gray mb-0"> 18 Minutes ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 mb-0 text-center text-primary font-13">4 new messages</h6>
                            </div>
                        </li>
                        <li class="nav-item dropdown ml-3">
                            <a class="nav-link" id="notificationDropdown" href="#" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left navbar-dropdown preview-list"
                                aria-labelledby="notificationDropdown">
                                <h6 class="px-3 py-3 font-weight-semibold mb-0">Notifications</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="mdi mdi-calendar"></i>
                                        </div>
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-0">New order recieved</h6>
                                        <p class="text-gray ellipsis mb-0"> 45 sec ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-warning">
                                            <i class="mdi mdi-settings"></i>
                                        </div>
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-0">Server limit reached</h6>
                                        <p class="text-gray ellipsis mb-0"> 55 sec ago </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-info">
                                            <i class="mdi mdi-link-variant"></i>
                                        </div>
                                    </div>
                                    <div
                                        class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                                        <h6 class="preview-subject font-weight-normal mb-0">Kevin karvelle</h6>
                                        <p class="text-gray ellipsis mb-0"> 11:09 PM </p>
                                    </div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <h6 class="p-3 font-13 mb-0 text-primary text-center">View all notifications</h6>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav navbar-nav-right">
                        <li class="nav-item nav-profile dropdown d-none d-md-block">
                            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#"
                                data-toggle="dropdown" aria-expanded="false">
                                <div class="nav-profile-text">English </div>
                            </a>
                            <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-bl mr-3"></i> French </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-cn mr-3"></i> Chinese </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-de mr-3"></i> German </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
                                    <i class="flag-icon flag-icon-ru mr-3"></i>Russian </a>
                            </div>
                        </li>
                        <li class="nav-item nav-logout d-none d-lg-block">
                            <a class="nav-link" href="/">
                                <i class="mdi mdi-home-circle"></i>
                            </a>
                        </li>
                    </ul>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                        data-toggle="offcanvas">
                        <span class="mdi mdi-menu"></span>
                    </button>
                </div>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper pb-0">
                    
                    <!-- first row starts here -->
                    <div>
                        @yield('konten')
                    </div>
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- SELECT DROPDOWN -->
        
        <script>
            // select menu di guru master
        const optionMenu = document.querySelector(".select-menu"),
               selectBtn = optionMenu.querySelector(".select-btn"),
               options = optionMenu.querySelectorAll(".option"),
               sBtn_text = optionMenu.querySelector(".sBtn-text");
        
        selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));       
        
        options.forEach(option =>{
            option.addEventListener("click", ()=>{
                let selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;
        
                optionMenu.classList.remove("active");
            });
        });
        </script>
        <!-- plugins:js -->
        <script src="/assets/js/dashboard/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <script src="../assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
        <script src="../assets/vendors/chart.js/Chart.min.js"></script>
        <script src="../assets/vendors/flot/jquery.flot.js"></script>
        <script src="../assets/vendors/flot/jquery.flot.resize.js"></script>
        <script src="../assets/vendors/flot/jquery.flot.categories.js"></script>
        <script src="../assets/vendors/flot/jquery.flot.fillbetween.js"></script>
        <script src="../assets/vendors/flot/jquery.flot.stack.js"></script>
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="/assets/js/dashboard/off-canvas.js"></script>
        <script src="/assets/js/dashboard/hoverable-collapse.js"></script>
        <script src="/assets/js/dashboard/misc.js"></script>
        <script src="/assets/js/dashboard/settings.js"></script>
        <script src="/assets/js/dashboard/todolist.js"></script>
        <!-- endinject -->
        <!-- Custom js for this page -->
        <script src="/assets/js/dashboard/dashboard.js"></script>
        <!-- End custom js for this page -->
</body>

</html>
