
 


    <!-- Header -->
		
    <div class="card-header px-3">

		<div class="px-5 w-50 mx-auto" id="hide">
			 <?php
        if ($this->session->flashdata('pesan')) {
            echo '   <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Ditambahkan!</strong> Kendaraan Berhasil Ditambahkan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>
			 <?php
        if ($this->session->flashdata('ubah')) {
            echo '   <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Diubah!</strong> Kendaraan Berhasil Diubah
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>

		</div>
      <!-- header -->
      <h1 class="header-container fw-semibold">
        Dashboard Pemeliharaan Kendaraan
      </h1>

			<div class="d-flex justify-content-between">
				 <div class="d-flex justify-content-between px-2 py-2">
                <button
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#tambahPenggunaanArmada"
                >
                  <i class="fa-solid fa-plus"></i> Tambah
                </button>
          </div>

					<nav
						aria-label="breadcrumb"
						class="text-center"
						style="padding-top: 24px"
					>
							<ol class="breadcrumb justify-content-end">
							<li class="breadcrumb-item">
								<a href="#" class="breadcrumb-text text-decoration-none fw-medium"
									>Dashboard</a
								>
							</li>
							<li
								class="breadcrumb-text-2 breadcrumb-item active fw-medium"
								aria-current="page"
							>
								Pemeliharaan Kendaraan
							</li>
							</ol>
					</nav>
		</div>
      
    </div>
		

    <!-- Table Pemeliharaan -->
    <div class="ps-3 px-md-3" style="padding-top: 17px">
      <div class="bg-white rounded-3" style="border-radius: 10px">
        <div class="bg-white rounded-3">

          <!-- Table -->
          <div class="table-responsive px-2 py-4" style="padding-top: 10px">
            <table id="dataTable" class="table table-striped table-responsive-sm">
              <thead>
                <tr class="align-middle">
                  <th scope="col" class="table-th text-center fw-semibold">
                    Nomer Kendaraan
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Jenis Kendaraan
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Pajak Tahunan
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Pajak 5 Tahunan
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Jadwal KIR
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Jadwal Service
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Detail
                  </th>
                </tr>
              </thead>
              <tbody class="align-middle">
                <?php 
                   foreach($kendaraan as $k) : ?>
                   <?php 
                    $hari = date('Y-m-d');
                    $h = new DateTime($hari);
                                        $a = new DateTime($k->pajak_tahunan);
                                        $b = new DateTime($k->pajak_lima_tahun);
                                        $c = new DateTime($k->kir);
                                        $d = new DateTime($k->jadwal_service);

                                        $z = $a->diff($h)->days;
                                        $y = $b->diff($h)->days;
                                        $x = $c->diff($h)->days;
                                        $w = $d->diff($h)->days;
                                        ?>
                <tr>
                  <td class="table-td text-center fw-medium"><?= $k->no_kendaraan; ?></td>
                  <td class="table-td text-center fw-medium"><?= $k->merek_kendaraan; ?> / <?= $k->jenis_kendaraan; ?></td>
                  <?php
                   if($z > 90){ ?>
                    <td class="table-td text-center fw-medium"><?= $k->pajak_tahunan ?></td>
                    <?php
                    }elseif($z < 30 ){ ?>
                    <td class="table-td text-center fw-medium bg-danger"><?= $k->pajak_tahunan ?></td>
                    <?php 
                    }elseif($z >= 30 AND $z <=60){ ?>
                    <td class="table-td text-center fw-medium bg-warning"><?= $k->pajak_tahunan ?></td>
                    <?php
                    }elseif($z >= 60 AND $z <=90){ ?>
                    <td class="table-td text-center fw-medium bg-success"><?= $k->pajak_tahunan ?></td>
                    <?php } ?>


                  <?php
                   if($y > 90){ ?>
                    <td class="table-td text-center fw-medium"><?= $k->pajak_lima_tahun ?></td>
                    <?php
                    }elseif($y < 30 ){ ?>
                    <td class="table-td text-center fw-medium bg-danger"><?= $k->pajak_lima_tahun ?></td>
                    <?php 
                    }elseif($y >= 30 AND $y <=60){ ?>
                    <td class="table-td text-center fw-medium bg-warning"><?= $k->pajak_lima_tahun ?></td>
                    <?php
                    }elseif($y >= 60 AND $y <=90){ ?>
                    <td class="table-td text-center fw-medium bg-success"><?= $k->pajak_lima_tahun ?></td>
                    <?php } ?>


                  <?php
                   if($x > 90){ ?>
                    <td class="table-td text-center fw-medium"><?= $k->kir; ?></td>
                    <?php
                    }elseif($x < 30 ){ ?>
                    <td class="table-td text-center fw-medium bg-danger"><?= $k->kir; ?></td>
                    <?php 
                    }elseif($x >= 30 AND $x <=60){ ?>
                    <td class="table-td text-center fw-medium bg-warning"><?= $k->kir; ?></td>
                    <?php
                    }elseif($x >= 60 AND $x <=90){ ?>
                    <td class="table-td text-center fw-medium bg-success"><?= $k->kir; ?></td>
                    <?php } ?>


                    <?php
                    if($w > 90){ ?>
                     <td class="table-td text-center fw-medium"><?= $k->jadwal_service ?></td>
                     <?php
                     }elseif($w < 30 ){ ?>
                     <td class="table-td text-center fw-medium bg-danger"><?= $k->jadwal_service ?></td>
                     <?php 
                     }elseif($w >= 30 AND $w <=60){ ?>
                     <td class="table-td text-center fw-medium bg-warning"><?= $k->jadwal_service ?></td>
                     <?php
                     }elseif($w >= 60 AND $w <=90){ ?>
                     <td class="table-td text-center fw-medium bg-success"><?= $k->jadwal_service ?></td>
                     <?php } ?>

                  <td class="table-td text-center">
                    <button
                      class="btn btn-primary px-4 shadow"
                      style="font-size: 12px"
                      data-bs-toggle="modal"
                      data-bs-target="#Detail<?= $k->id_kendaraan ?>"
                    >
                      Edit
                    </button>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
					<div class="row align-content-center pt-2 pb-3">
						<div class="col-6 col-lg-2">
								<div class="d-flex px-4">
										<span class="badge bg-danger">
										</span>	
										< 1 Bulan
								</div>
						</div>

						<div class="col-6 col-lg-2">
								<div class="d-flex px-4">
										<span class="badge bg-warning">
										</span>	
										< 2 Bulan
								</div>
						</div>

						<div class="col-6 col-lg-2">
								<div class="d-flex px-4">
										<span class="badge bg-success">
										
										</span>	
										< 3 Bulan
								</div>
						</div>

						<div class="col-6 col-lg-2">
								<div class="d-flex px-4">
										<span class="badge bg-white border border-black">
										
										</span>	
										> 4 Bulan
								</div>
						</div>
					</div>

        </div>

        
      </div>
    </div>

    <!-- end Table -->
    <!-- footer -->
    <div class="footer-container">
      <footer class="px-3">
        <p class="fw-medium text-center">
          COPYRIGHT © 2023 SATUAN POLISI PAMONG PRAJA DAERAH ISTIMEWA YOGYAKARTA
        </p>
      </footer>
    </div>

    <!-- Modal edit -->
    <?php 
    foreach ($kendaraan as $k){ ?>
    <div
      class="modal fade"
      id="Detail<?= $k->id_kendaraan?>"
      tabindex="-1"
      aria-labelledby="Detail"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Kelola Kendaraan
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('C_kendaraan/aksi_edit_kendaraan') ?>" method="post">
            <!-- nomer kendaraan -->
            <div class="pt-2">
              <label
                for=""
                class="form-label text-black"
                style="letter-spacing: 1.5px; font-size: 10px"
                ><h6>Nomer Kendaraan</h6></label
              >
              <div class="input-group">
              <input 
              type="hidden" 
              name="id_kendaraan" 
              value="<?= $k->id_kendaraan; ?>">
                <input
                  type="text"
                  id="no_kendaraan"
                  disabled
                  name="no_kendaraan"
                  value="<?= $k->no_kendaraan; ?>"
                  class="form-control shadow-sm border-2"
                />
                <?= form_error('no_kendaraan', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <!-- Jenis kendaraan -->
            <div class="pt-2">
              <label
                for=""
                class="form-label text-black"
                style="letter-spacing: 1.5px; font-size: 10px"
                ><h6>Jenis Kendaraan</h6></label
              >
              <div class="input-group">
                <input
                  type="text"
                  disabled 
                  name="jenis_kendaraan"
                  value="<?= $k->jenis_kendaraan; ?>"
                  class="form-control shadow-sm border-2"
                />
                <?= form_error('jenis_kendaraan', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <!-- Pajak 5 Tahunan -->
            <div class="pt-2">
              <label
                for=""
                class="form-label text-black"
                style="letter-spacing: 1.5px; font-size: 10px"
                ><h6>Pajak 5 Tahunan</h6></label
              >
              <div class="input-group">
                <input
                  type="date"
                  name="pajak_lima_tahun"
                  value="<?= $k->pajak_lima_tahun; ?>"
                  class="form-control shadow-sm border-2"
                />
                <?= form_error('pajak_lima_tahun', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <!-- Pajak Tahunan -->
            <div class="pt-2">
              <label
                for=""
                class="form-label text-black"
                style="letter-spacing: 1.5px; font-size: 10px"
                ><h6>Pajak Tahunan</h6></label
              >
              <div class="input-group">
                <input
                  type="date"
                  name="pajak_tahunan"
                  value="<?= $k->pajak_tahunan; ?>"
                  class="form-control shadow-sm border-2"
                />
                <?= form_error('pajak_tahunan', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <!-- KIR -->
            <div class="pt-2">
              <label
                for=""
                class="form-label text-black"
                style="letter-spacing: 1.5px; font-size: 10px"
                ><h6>KIR</h6></label
              >
              <div class="input-group">
                <input
                  type="date"
                  name="kir"
                  value="<?= $k->kir; ?>"
                  class="form-control shadow-sm border-2"
                />
                <?= form_error('kir', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <!-- Jadwal Service  -->
            <div class="pt-2">
              <label
                for=""
                class="form-label text-black"
                style="letter-spacing: 1.5px; font-size: 10px"
                ><h6>Jadwal Service</h6></label
              >
              <div class="input-group">
                <input
                  type="date"
                  name="jadwal_service"
                  value="<?= $k->jadwal_service; ?>"
                  class="form-control shadow-sm border-2"
                />
                <?= form_error('ajdwal_service', '<div class="text-small text-danger">', '</div>') ?>
              </div>
            </div>
            <!-- Catatan Keluhan -->
            <div class="pt-2">
              <label
                for=""
                class="form-label text-black"
                style="letter-spacing: 1.5px; font-size: 10px"
                ><h6>Catatan Keluhan / Kerusakan</h6></label
              >
              <div class="input-group">
                <textarea
                  name="catatan_keluhan"
                  class="form-control"
                  placeholder="Catatan dan Keluhan Kendaraan"
                  id="floatingTextarea2"
                  style="height: 100px"
                ><?php echo"$k->catatan_keluhan"?></textarea
                >
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button
              type="submit"
              class="btn btn-primary"
              style="font-size: 12px; letter-spacing: 1.5px"
            >
              Simpan
            </button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    <!-- modal tambah -->
    <!-- Modal -->
    <div
      class="modal fade"
      id="tambahPenggunaanArmada"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">
              Tambah Kendaraan
            </h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
          <form action="<?= base_url('C_kendaraan/aksi_tambah_kendaraan') ?>" method="post">
            <div class="row">
              <div class="col-6 mb-3">
                <label for="" class="form-label">Nomor Kendaraan</label>
                <input type="text" required
                name="no_kendaraan" class="form-control" />
                <?= form_error('no kendaraan', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              <div class="col-6 mb-3"></div>
              <div class="col-6 mb-3">
                <label for="" class="form-label">Jenis Kendaraan</label>
                <input type="text" required name="jenis_kendaraan" class="form-control" /><?= form_error('jenis kendaraan', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              <div class="col-6 mb-3">
                <label for="" class="form-label">Nama Kendaraan</label>
                <input type="text" required name="merek_kendaraan" class="form-control" />
                <?= form_error('merek kendaraan', '<div class="text-small text-danger">', '</div>') ?>
              </div>
              <div class="col-6 mb-3">
                <label for="" class="form-label">Pajak 5 Tahunan</label>
                <input type="date" required name="pajak_lima_tahun" class="form-control" />
              </div>
              <div class="col-6 mb-3">
                <label for="" class="form-label">Pajak Kendaraan</label>
                <input type="date" required name="pajak_tahunan" class="form-control" />
              </div>
              <div class="col-6 mb-3">
                <label for="" class="form-label">Jadwal Service</label>
                <input type="date" required name="jadwal_service" class="form-control" />
              </div>
              <div class="col-6 mb-lg-5">
                <label for="" class="form-label">KIR</label>
                <input type="date" required name="kir" class="form-control" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
        </form>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <!-- fontAwesome -->
    <script
      src="https://kit.fontawesome.com/550ef706f2.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
