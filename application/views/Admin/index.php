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
                  <div class="row">
                      <div class="col-8">
                        <h3 class="card-title">Data Daftar Webinar</h3>
                      </div>
                      <div class="col-4 text-right">
                        
                      </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Webinar</th>
                    <th>Nama Peserta</th>
                    <th>Waktu Daftar</th>
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
                                <?php if($dafwebinar['status'] == 'review') { ?>
                                    <a href="<?= base_url(); ?>index.php/admin/approved/<?= $dafwebinar['id_daftar_webinar']; ?>" class="btn btn-outline-success btn-sm" onclick="return confirm('yakin?');">terdaftar</a>
                                    <a href="<?= base_url(); ?>index.php/admin/rejected/<?= $dafwebinar['id_daftar_webinar']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('yakin?');">ditolak</a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Webinar</th>
                    <th>Nama Peserta</th>
                    <th>Waktu Daftar</th>
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
