<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $data['title']; ?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= BASEURL; ?>/assets/img/bfi-logo.png" rel="icon">
  <link href="<?= BASEURL; ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= BASEURL; ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= BASEURL; ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- Datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

  <!-- Template Main CSS File -->
  <link href="<?= BASEURL; ?>/assets/css/style.css" rel="stylesheet">

  <!-- Jquery -->
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

  <!-- Vendor JS Files -->
  <script src="<?= BASEURL; ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?= BASEURL; ?>/dashboard" class="logo d-flex align-items-center">
        <img src="<?= BASEURL; ?>/assets/img/bfi-logo.png" alt="">
        <span class="d-none d-lg-block">HRIS</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="<?= BASEURL; ?>/assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="<?= BASEURL; ?>/assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="<?= BASEURL; ?>/assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?= BASEURL; ?>/assets/img/profile-img.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Dzikri N. A</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Dzikri N. A</h6>
              <span>Web Developer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?= BASEURL; ?>/auth/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?= BASEURL; ?>/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#recruitment-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-fingerprint"></i><span>Recruitment</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="recruitment-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASEURL; ?>/manpowerRequest">
              <i class="bi bi-circle"></i><span>Permintaan Tenaga Kerja</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/calonKaryawan">
              <i class="bi bi-circle"></i><span>Calon Karyawan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#development-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-arrows-fullscreen"></i><span>Developement</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="development-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASEURL; ?>/training">
              <i class="bi bi-circle"></i><span>Training</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/matrixSkill">
              <i class="bi bi-circle"></i><span>Matrix Skill</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#utility-forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-card-list"></i><span>Utility Forms</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="utility-forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASEURL; ?>/kaizen">
              <i class="bi bi-circle"></i><span>Kaizen</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/appraisal">
              <i class="bi bi-circle"></i><span>Appraisal</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/transition"> <!-- Untuk promosi, mutasi dan demosi -->
              <i class="bi bi-circle"></i><span>Transition</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/sp">
              <i class="bi bi-circle"></i><span>Warning Letter</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <!-- <li class="nav-heading">Pages</li> -->
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav-master" data-bs-toggle="collapse" href="#">
          <i class="bi bi-list-ul"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav-master" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?= BASEURL; ?>/roles">
              <i class="bi bi-circle"></i><span>Roles</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/dept">
              <i class="bi bi-circle"></i><span>Department</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/jabatan">
              <i class="bi bi-circle"></i><span>Jabatan</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/transisi">
              <i class="bi bi-circle"></i><span>Transisi</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/soal">
              <i class="bi bi-circle"></i><span>Soal</span>
            </a>
          </li>
          <li>
            <a href="<?= BASEURL; ?>/users">
              <i class="bi bi-circle"></i><span>Users</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle" id="top">
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/<?= $data['href']; ?>" class="text-primary"><?= $data['breadcrumb']; ?></a></li>
          <li class="breadcrumb-item active"><?= $data['breadcrumb_active']; ?></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <hr>
    <?php if(isset($_SESSION['flash'])) : ?>
        <?php Flasher::flash(); ?>
    <?php endif;?>