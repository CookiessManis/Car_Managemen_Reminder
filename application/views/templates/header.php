<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <!-- font awesome -->
    <script
      defer
      src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
      integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
      crossorigin="anonymous"
    ></script>

    <!-- selectize CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
      integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

	<!-- DataTable -->
	<script
      src="https://code.jquery.com/jquery-3.7.1.js"
      integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
      crossorigin="anonymous"
    ></script>
	<link
      href="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.css"
      rel="stylesheet"
    />

    <script src="https://cdn.datatables.net/v/dt/dt-1.13.6/datatables.min.js"></script>


    <!-- css -->
    <link rel="stylesheet" href=" <?= base_url('assets/src/style.css') ?>" />
  </head>


  
  <body class="h-100">
    <!-- Navbar -->
    <div class="px-3 py-3">
      <nav class="navbar">
        <div class="container-fluid">
          <!-- hamburger icons -->
          <a
            data-bs-toggle="offcanvas"
            href="#offcanvasDarkNavbar"
            role="button"
            aria-controls="offcanvasExample"
          >
            <div class="hamburger-icon" onclick="toggleMenu()">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </a>

          <!-- offset -->

          <div
            class="offcanvas offcanvas-start"
            tabindex="-1"
            id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel"
          >
            <div class="offcanvas-header justify-content-between">
              <p
                class="fw-semibold text-white"
                style="font-size: 20px; padding-top: 12px"
              >
                Dashboard Utama
              </p>
              <button
                type="button"
                class="btn-close bg-white"
                data-bs-dismiss="offcanvas"
                aria-label="Close"
              ></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                 <a href="<?php echo base_url(); ?>C_dashboard" <?php if($this->uri->segment(1)=="C_dashboard"){echo 'class="active text-white text-decoration-none"';}?> class="text-decoration-none nav-link"> Dashboard Utama </a> 
                </li>
                <li class="nav-item">
                   <a href="<?php echo base_url(); ?>C_kendaraan" <?php if($this->uri->segment(1)=="C_kendaraan"){echo 'class="active text-white text-decoration-none"';}?> class="text-decoration-none nav-link"> Pemeliharaan Kendaraan </a> 
                </li>

                

								<!-- testing -->
                <li class="nav-item">
                   <a href="<?php echo base_url(); ?>C_booking" <?php if($this->uri->segment(1)=="C_booking"){echo 'class="active text-white text-decoration-none"';}?> class="text-decoration-none nav-link"> Daftar Penggunaan Armada </a> 
                </li>
              </ul>
            </div>
            <div class="offcanvas-bottom">
              <!-- waves -->
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path
                  fill="#E3CE8F"
                  fill-opacity="1"
                  d="M0,32L48,58.7C96,85,192,139,288,149.3C384,160,480,128,576,133.3C672,139,768,181,864,181.3C960,181,1056,139,1152,101.3C1248,64,1344,32,1392,16L1440,0L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"
                ></path>
              </svg>
            </div>
          </div>

          <div class="d-flex justify-content-between">
            <!-- button logout -->
            <div class="px-2">
                <a href="<?php echo base_url('C_login/logout')?>">
                    <button class="button-logout btn btn-warning text-white" >
                        Keluar
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </a>
            </div>
          </div>
        </div>
      </nav>
    </div>
