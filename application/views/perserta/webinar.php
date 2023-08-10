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
                <h3 class="card-title">Data Webinar</h3>
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
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($webinar as $webinar) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $webinar['tema']; ?></td>
                            <td><?= $webinar['pembicara_id']; ?></td>
                            <td><?= $webinar['tipe']; ?></td>
                            <td><?= $webinar['waktu']; ?></td>
                            <td><?= $webinar['lokasi']; ?></td>
                            <td>
                              <button class="btn btn-block btn-outline-primary btn-sm" type="button">Daftar</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Tema</th>
                    <th>Pembicara</th>
                    <th>Tipe</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
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
