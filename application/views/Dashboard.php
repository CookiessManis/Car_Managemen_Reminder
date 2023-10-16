

    <!-- logo -->
    <div class="text-center" style="padding-top: 17px">
      <img src="<?php echo base_url(); ?>assets/img/logo_.svg" alt="" style="width: 105px; height: 134px" />
			<div class="col-12 col-sm-10 col-md-8 col-lg-5 col-xl-5 mx-auto">

				<div class="pt-4">
					<span class="" id="hide">
						<?= $this->session->flashdata('pesan'); ?>
					</span>
				</div>
			</div>
    </div>
    <!-- text -->
    <div class="">
      <h1
        class="text-dashboard fw-bold text-white"
      >
        SATUAN POLISI PAMONG PRAJA
      </h1>
    </div>

    <!-- Cards -->
    
    <div class="px-3 py-3" style="padding-top: 45px">
      <div class="row justify-content-center">
				<div class="col-lg-3 col-md-3 col-sm-6 col-12 gy-4">
          <div class="card">
            <div class="card-body">
							<p class="card-text fw-medium text-center">Kendaraan yang tersedia</p>
							<h1 class="card-text-value fw-medium text-center"><?= $kendaraan_tersedia?></h1>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 gy-4">
          <div class="card">
            <div class="card-body">
							<p class="card-text fw-medium text-center">Kendaraan yang digunakan</p>
							<h1 class="card-text-value fw-medium text-center"><?= $kendaraan_digunakan?></h1>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-6 gy-4">
          <div class="card">
            <div class="card-body">
							<p class="card-text fw-medium text-center">Jumlah Seluruh kendaraan</p>
							<h1 class="card-text-value fw-medium text-center"><?= $total_kendaraan ?></h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- form table -->
  <div
      class="table-responsive ps-3 px-lg-3 ps-sm-3"
      style="padding-top: 10px"
    >
      <table class="table table-striped table-responsive-sm " style="border-radius: 10px">
        <thead class="shadow-lg">
          <tr class="align-middle">
            <th
              class="font-change-th fw-medium text-white"
              scope="col"
              style="background-color: #62a9ee"
            >
              Waktu
            </th>
            <th
              scope="col"
              class="font-change-th fw-medium text-white"
              style="background-color: #62a9ee"
            >
              Armada
            </th>
            <th
              scope="col"
              class="font-change-th fw-medium text-white"
              style="background-color: #62a9ee"
            >
              Pengemudi
            </th>
            <th
              scope="col"
              class="font-change-th fw-medium text-white"
              style="background-color: #62a9ee"
            >
              Kegiatan
            </th>
            <th
              scope="col"
              class="font-change-th fw-medium text-white"
              style="background-color: #62a9ee"
            >
              Lokasi
            </th>
          </tr>
        </thead>
        <tbody class="align-middle">
        <?php  foreach($booking_kendaraan as $bk) : ?>
          
            <?php if($bk->status_booking== "1"){?>
             <tr> 
          <td class="py-3 font-change-td"><?= $bk->tanggal; ?></td>  
          <td class="font-change-td"><?= $bk->no_kendaraan; ?> &<br><?= $bk->jenis_kendaraan; ?></td>
          <td class="font-change-td"><?= $bk->driver; ?></td>
          <td class="font-change-td"><?= $bk->acara; ?></td>
          <td class="font-change-td"><?= $bk->lokasi; ?></td>
           </tr>
           <?php 
          } ?>
            
          
          
          <?php endforeach;?>
        </tbody>
      </table>
  </div>

    <!-- footer -->
    <div class="footer-container">
      <footer class="px-3">
        <p class="fw-medium text-center">
          COPYRIGHT © 2023 SATUAN POLISI PAMONG PRAJA DAERAH ISTIMEWA YOGYAKARTA
        </p>
      </footer>
    </div>

    <!-- Js -->

    <!-- popper min js for dropdown -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
      integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V"
      crossorigin="anonymous"
    ></script>
    <!-- <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- fontAwesome -->
    <script
      src="https://kit.fontawesome.com/550ef706f2.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
