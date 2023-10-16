<!-- Header -->
  	<div class="card-header px-3">
		<!-- alert session -->
		<div class="px-5 w-50 mx-auto" id="hide">
			 <?php
        if ($this->session->flashdata('pesan')) {
            echo '   <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Ditambahkan!</strong>Data Penggunaan Kendaraan Berhasil Ditambahkan
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>
			 <?php
        if ($this->session->flashdata('ubah')) {
            echo '   <div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Berhasil Diubah!</strong> Data Penggunaan Kendaraan Berhasil Diubah
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>
			 <?php
        if ($this->session->flashdata('hapus')) {
            echo '   <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Berhasil Dihapus!</strong> Data Penggunaan Kendaraan Berhasil Dihapus
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>
			 <?php
        if ($this->session->flashdata('catatan_ubah')) {
            echo '   <div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Catatan Berhasil Ditambahkan</strong> Data Penggunaan Kendaraan Berhasil Dikonfirmasi
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
        }
        ?>

		</div>
      <!-- header -->
      <h1 class="header-container fw-semibold">Dashboard <?= $title ?></h1>

      <div class="d-flex justify-content-between">
				<div class="d-flex justify-content-between px-2 py-2">
                <button
                  class="btn btn-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#tambahPenggunaanArmada"
									class="px-5"
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
							Penggunaan Armada
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
                    Tanggal
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Lokasi
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Acara / Kegiatan
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Waktu
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Jumlah Personil
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Armada
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Driver
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Konfirmasi
                  </th>
                  <th scope="col" class="table-th text-center fw-semibold">
                    Keterangan
                  </th>
                </tr>
              </thead>
              <tbody class="align-middle">
                <?php foreach($booking_kendaraan as $bk) : ?>
                <tr>
                  <td class="table-td text-center fw-medium"><?= $bk->tanggal; ?></td>
                  <td class="table-td text-center fw-medium"><?= $bk->lokasi; ?></td>
                  <td class="table-td text-center fw-medium"><?= $bk->acara; ?></td>
                  <td class="table-td text-center fw-medium"><?= $bk->waktu_berangkat; ?> - <?= $bk->waktu_pulang; ?></td>
                  <td class="table-td text-center fw-medium"><?= $bk->jumlah_personil; ?></td>
                  <td class="table-td text-center fw-medium">
                    <?= $bk->no_kendaraan; ?> /<?= $bk->jenis_kendaraan; ?>
                  </td>
                  <td class="table-td text-center fw-medium"><?= $bk->driver; ?></td>
                  <td class="table-td text-center">
                    <?php if($bk->status_booking== "1"){?>
                    <button
                      class="btn btn-primary shadow"
                      data-bs-toggle="modal"
                      data-bs-target="#selesaiModal<?= $bk->id ?>"
                    >
                      selesai
                    </button>
                  </td>
                  <td class="table-td text-center">
                    <div class="d-flex gap-2">
                      <button
                        type="button"
                        class="btn btn-warning shadow text-white"
                        style="font-size: 12px"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal<?= $bk->id ?>"
                      >
                        Ubah
                      </button>
                      <button
                        type="button"
                        class="btn btn-danger shadow"
                        style="font-size: 12px"
                        data-bs-toggle="modal"
                        data-bs-target="#HapusModal<?= $bk->id ?>"
                      >
                        Hapus
                      </button>
                      <?php }
                      else{?>
                       
                    <td class="table-td text-center">
                    
                    <button
                        type="button"
                        class="btn btn-danger shadow"
                        
                        data-bs-toggle="modal"
                        data-bs-target="#HapusModal<?= $bk->id ?>"
                      >
                        Hapus
                      </button>
                      <?php }?>
                   
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>

    <!-- footer -->
    <div class="footer-container">
      <footer class="px-3">
        <p class="fw-medium text-center">
          COPYRIGHT © 2023 SATUAN POLISI PAMONG PRAJA DAERAH ISTIMEWA YOGYAKARTA
        </p>
      </footer>
    </div>
    <!-- END -->

    <!-- modal tambah penggunaan kendaraan -->
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
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            
            <form action="<?= base_url('C_booking/aksi_tambah_booking') ?>" method="post">
            <div class="mb-3">
              <label for="" class="form-label">Tanggal Kegiatan</label>
              <input type="date" name="tanggal" class="form-control" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Lokasi Kegiatan</label>
              <input type="text" name="lokasi" class="form-control" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Acara Kegiataan</label>
              <textarea name="acara" class="form-control"></textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Waktu Berangkat</label>
              <input type="time" name="waktu_berangkat" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Waktu Pulang</label>
              <input type="time" name="waktu_pulang" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah Personil</label>
              <input type="number" name="jumlah_personil" class="form-control" />
            </div>
            <div class="mb-3">
              <label class="form-label">Armada</label>
              <select id="normalize" name="id_kendaraan">
                <option selected disabled>Pilih Armada...</option>
                <?php foreach($kendaraan as $bk) : ?>
                  <?php
                  if($bk->status_kendaraan== "1"){?>
                  <option value="<?= $bk->id_kendaraan; ?>"><?= $bk->no_kendaraan; ?> <?= $bk->jenis_kendaraan; ?></option>
                  <?php }
                  else{?>
                  <option disabled value="<?= $bk->id_kendaraan; ?>"><?= $bk->no_kendaraan; ?> <?= $bk->jenis_kendaraan; ?></option>                      
                  <?php }?>
                <?php endforeach;?>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Pengemudi</label>
              <input type="text" name="driver" class="form-control" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <!-- modal Hapus -->
    <?php foreach($booking_kendaraan as $bk =>$value ){ ?>
    <div
      class="modal fade"
      id="HapusModal<?= $value->id ?>"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <p class="text-center">Apakah Ingin Menghapus?</p> 
            <div class="d-flex justify-content-evenly">
              <a href="<?= base_url('C_booking/delete_booking/' .$value->id) ?>" class="btn btn-danger px-3 shadow-lg">Ya</a>
              <button
                class="btn btn-warning px-3 shadow-lg text-white"
                aria-label="Close"
                data-bs-dismiss="modal"
              >
                Tidak
              </button>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php }?>
    <!-- modal edit -->
    <?php 
    foreach ($booking_kendaraan as $bk){ ?>
    <div
      class="modal fade"
      id="editModal<?= $bk->id?>"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form action="<?= base_url('C_booking/aksi_edit_booking') ?>" method="post">
            <div class="mb-3">
              <label for="" class="form-label">Tanggal Kegiatan</label>
              <input type="hidden" name="id" value="<?= $bk->id; ?>">
              <input type="date" name="tanggal" class="form-control" value="<?= $bk->tanggal; ?>" />
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Lokasi Kegiatan</label>
              <input type="text" name="lokasi" class="form-control" value="<?= $bk->lokasi; ?>" />
            </div>
            <div class="mb-3">
              <label for=""  class="form-label">Acara Kegiataan</label>
              <textarea name="acara" class="form-control"><?php echo "$bk->acara"?></textarea>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Waktu Berangkat</label>
              <input type="time" name="waktu_berangkat" class="form-control" value="<?= $bk->waktu_berangkat; ?>"/>
            </div>
            <div class="mb-3">
              <label class="form-label">Waktu Pulang</label>
              <input type="time" name="waktu_pulang" class="form-control" value="<?= $bk->waktu_pulang; ?>"/>
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah Personil</label>
              <input type="number" name="jumlah_personil" class="form-control" value="<?= $bk->jumlah_personil; ?>"/>
            </div>
            <div class="mb-3">
              <label class="form-label">Armada</label>
              <select id="normalizer-<?= $bk->id_kendaraan; ?>" name="id_kendaraan">
                <option disabled selected value="<?= $bk->id_kendaraan; ?>"><?= $bk->no_kendaraan; ?> <?= $bk->jenis_kendaraan;?></option>
                <?php foreach($kendaraan as $k) : ?>
                  <?php
                  if($k->status_kendaraan== "1"){?>
                  <option value="<?= $k->id_kendaraan; ?>"><?= $k->no_kendaraan;?> <?= $k->jenis_kendaraan; ?></option>
                  <?php }
                  else{?>
                  <option disabled value="<?= $k->id_kendaraan; ?>"><?= $k->no_kendaraan; ?> <?= $k->jenis_kendaraan; ?></option>                      
                  <?php }?>
                <?php endforeach;?>
              </select>
            </div>
            <div class="mb-3">
              <label for=""  class="form-label">Pengemudi</label>
              <input type="text" name="driver" class="form-control" value="<?= $bk->driver; ?>"/>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
    
    <!-- modal Selesai -->
    <?php 
    foreach ($booking_kendaraan as $bk => $value){ ?>
    <div
      class="modal fade"
      id="selesaiModal<?= $value->id ?>"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
    
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
          <form action="<?= base_url('C_booking/aksi_edit_catatan') ?>" method="post">
          
          <input type="hidden" name="id" value="<?= $value->id; ?>">
          <input type="hidden"  name="id_kendaraan" value="<?= $value->id_kendaraan; ?>">
            <h4 class="text-center">Catatan Keluhan Armada</h4>
            <textarea
              name="catatan_keluhan"
              id="catatan_keluhan"
              cols="10"
              rows="5"
              class="form-control border border-black"
            ><?php  echo"$value->catatan_keluhan" ?></textarea>
            <div class="d-flex justify-content-evenly pt-3">
            <button type="submit" class="btn btn-danger px-3 shadow-lg">Ya</button>
              
              <button
                class="btn  btn-warning px-3 shadow-lg text-white"
                aria-label="Close"
                data-bs-dismiss="modal"
								type="button"
              >
                Tidak
              </button>
            </div>  
          </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>

