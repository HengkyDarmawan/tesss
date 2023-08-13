<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1><?php echo $title?></h1>
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
                    <th>Perserta</th>
                    <th>Waktu Daftar</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($daftar_webinar as $dafwebinar) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $dafwebinar['tema']; ?></td>
                            <td><?= $dafwebinar['name']; ?></td>
                            <td><?= $dafwebinar['waktu_daftar']; ?></td>
                            <td><?= $dafwebinar['lokasi']; ?></td>
                            <td>
                                <?php
                                if ($dafwebinar['status'] == "review") { ?>
                                    <span class="badge badge-pill badge-warning "><?= $dafwebinar['status']; ?></span>
                                <?php } else if ($dafwebinar['status'] == "terdaftar") { ?>
                                    <span class="badge badge-pill badge-success "><?= $dafwebinar['status']; ?></span>
                                <?php } else { ?>
                                    <span class="badge badge-pill badge-danger "><?= $dafwebinar['status']; ?></span>
                                <?php } ?>
                            </td>
                            <td>
                              <button class="btn btn-block btn-outline-primary btn-sm" type="button">Absen</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Tema</th>
                    <th>Perserta</th>
                    <th>Waktu Daftar</th>
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
