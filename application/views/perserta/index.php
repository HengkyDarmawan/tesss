<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1>Dashboard</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Webinar di Daftar</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Tema</th>
                    <th>Pembicara</th>
                    <th>Tipe</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <td>1</td>
                    <td>Ekspor</td>
                    <td>Maya</td>
                    <td>Seminar</td>
                    <td>21 Juli 2023 19.00 - 21.00</td>
                    <td>Jl. Tj. Duren Bar. 2 No.1, RT.1/RW.5, Tj. Duren Utara, Kec. Grogol petamburan, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11470</td>
                    <td>
                      <span class="badge badge-pill badge-warning ">review</span>
                    </td>
                    <td>
                      <button class="btn btn-block btn-outline-primary btn-sm" type="button">Absen</button>
                    </td>
                  <!-- <?php $i = 1; ?>
                    <?php foreach ($daftar_webinar as $dafwebinar) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $dafwebinar['webinar_id']; ?></td>
                            <td><?= $dafwebinar['user_id']; ?></td>
                            <td><?= $dafwebinar['waktu_daftar']; ?></td>
                            <td><?= $dafwebinar['status']; ?></td>
                            <td>
                              <button class="btn btn-block btn-outline-primary btn-sm" type="button">Absen</button>
                            </td>
                        </tr>
                    <?php endforeach; ?> -->
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Tema</th>
                    <th>Pembicara</th>
                    <th>Tipe</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
