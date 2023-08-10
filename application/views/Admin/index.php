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
                    <th>Nama Perserta</th>
                    <th>Waktu Daftar</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                      <td>1</td>
                      <td>Frontend</td>
                      <td>Amin User</td>
                      <td>19 Juli 2023 17.00</td>
                      <td>
                        <span class="badge badge-pill badge-warning ">review</span>
                      </td>
                      <td>
                        <button class="btn btn-block btn-outline-success btn-sm" type="button">approved</button>
                        <button class="btn btn-block btn-outline-danger btn-sm" type="button">Rejected</button>
                      </td>
                  <!-- <?php $i = 1; ?>
                    <?php foreach ($daftar_webinar as $dafwebinar) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $dafwebinar['webinar_id']; ?></td>
                            <td><?= $dafwebinar['user_id']; ?></td>
                            <td><?= $dafwebinar['tema']; ?></td>
                            <td><?= $dafwebinar['bukti']; ?></td>
                            <td><?= $dafwebinar['sesi']; ?></td>
                            <td>
                                <?php
                                if ($dafwebinar['status'] == "review") { ?>
                                    <span class="badge badge-pill badge-warning "><?= $dafwebinar['status']; ?></span>
                                <?php } else if ($dafwebinar['status'] == "approved") { ?>
                                    <span class="badge badge-pill badge-success "><?= $dafwebinar['status']; ?></span>
                                <?php } else { ?>
                                    <span class="badge badge-pill badge-danger "><?= $dafwebinar['status']; ?></span>
                                <?php } ?>
                            </td>
                            <td>
                              <button class="btn btn-block btn-outline-success btn-sm" type="button">Update</button>
                            </td>
                        </tr>
                    <?php endforeach; ?> -->
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Webinar</th>
                    <th>Nama Perserta</th>
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
