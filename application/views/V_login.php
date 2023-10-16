<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
      rel="stylesheet"
    />

    <!-- css -->
    <!-- bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
		<script
      src="https://code.jquery.com/jquery-3.7.1.js"
      integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href=" <?= base_url('assets/src/style.css') ?>" />
  </head>
  <body>
 
    <!-- container login -->
    <section class="section rounded-circle" style="padding-bottom: 50px">
    
      <div class="container mt-3"> 
        <div class="row mx-lg-auto" style="padding-top: 92px">
          <div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-5 mx-auto">
            <div class="login-brand" style="text-align: center">
              <img
                src="<?php echo base_url(); ?>assets/img/logo_.svg"
                style="width: 105px; height: 125px"
                class=""
                alt=""
              />
						<div class="pt-4">
							<span class="" id="hide">
								<?= $this->session->flashdata('pesan'); ?>
							</span>
						</div>
            </div>
            <div style="padding-top: 26px">
              <div
                class="card card-login card-primary container-login"
                style="background-color: #f8f8f8; height: 380px"
              >
                <div class="card-title">
              
                  <p
                    class="fw-semibold text-center pt-3"
                    style="font-size: 15px; letter-spacing: 1px"
                  >
                    Selamat Datang
                  </p>
                  <p class="text-center fw-medium" style="font-size: 12px">
                    Silahkan Login dengan <br />
                    Username dan Password Anda
                  </p>
                </div>
                <div class="card-body" style="padding-top: 22px">
                  <form method="POST" action="<?php echo base_url('C_login/login')?>">
                    <div class="form-group">
                      <label
                        for="username"
                        class="fw-semibold"
                        style="font-size: 15px; letter-spacing: 1.5px"
                        >Username</label
                      >
                      <input type="text" class="form-control" id="username" name="username" required/>
                    </div>
                    <div class="form-group" style="padding-top: 20px">
                      <label
                      
                        for="Password"
                        class="fw-semibold"
                        style="font-size: 15px; letter-spacing: 1.5px"
                        >Password</label
                      >
                      <input type="password" class="form-control" name="password"
                      id="password" placeholder="Password" required/>
                    </div>
                    <div
                      class="form-group text-center"
                      style="padding-top: 28px"
                    >
                      <button
                      type="submit"
                        class="button-login btn btn-lg btn-block fw-semibold text-white"
                        style="
                          padding-right: 40px;
                          padding-left: 40px;
                          font-size: 15px;
                          background-color: #0000ff;
                          box-shadow: 0 4px 2px -2px gray;
                          letter-spacing: 1.5px;
                        "
                      >
                        Login
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br />
		
    <!-- Js -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

		<!-- hide alert -->
		 <script>
      $("#hide").show();
      setTimeout(function () {
        $("#hide").hide();
      }, 3000);
    </script>
    <!-- <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
  </body>
</html>
