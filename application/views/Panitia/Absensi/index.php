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
                        <h3 class="card-title">Data Absensi</h3>
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
                    <th>Waktu Absen</th>
                    <th>Link Bukti Absensi</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($absensi as $absensi) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $absensi['tema']; ?></td>
                            <td><?= $absensi['name']; ?></td>
                            <td><?= $absensi['waktu_absen']; ?></td>
                            <td>
                                <a href="<?= $absensi['bukti']; ?>" class="btn btn-outline-primary btn-sm" target="_blank">Link</a>
                            </td>
                            <td>
                                <?php
                                if ($absensi['status'] == "review") { ?>
                                    <span class="badge badge-pill badge-warning "><?= $absensi['status']; ?></span>
                                <?php } else if ($absensi['status'] == "approved") { ?>
                                    <span class="badge badge-pill badge-success "><?= $absensi['status']; ?></span>
                                <?php } else { ?>
                                    <span class="badge badge-pill badge-danger "><?= $absensi['status']; ?></span>
                                <?php } ?>
                            </td>
                            <td>
                                <?php if($absensi['status'] == 'review') { ?>
                                    <a href="<?= base_url(); ?>index.php/panabsensi/approved/<?= $absensi['id_absensi']; ?>" class="btn btn-outline-success btn-sm" onclick="return confirm('yakin?');">Approved</a>
                                    <a href="<?= base_url(); ?>index.php/panabsensi/rejected/<?= $absensi['id_absensi']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('yakin?');">Rejected</a>
                                <?php } ?>  
                              <?php if($absensi['status'] == 'approved'):?>
                                <a href="<?php echo base_url()?>index.php/panabsensi/generator/<?= $absensi['id_absensi']; ?>" class="btn btn-outline-primary btn-sm" type="button">Sertifikat</a>
                              <?php endif;?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Webinar</th>
                    <th>Nama Peserta</th>
                    <th>Waktu Absen</th>
                    <th>Link Bukti Absensi</th>
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
