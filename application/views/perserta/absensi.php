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
                  <div class="row">
                      <div class="col-8">
                        <h3 class="card-title">Data Absensi</h3>
                      </div>
                      <div class="col-4 text-right">
                        <button class="btn btn-outline-primary btn-sm" type="button">Tambah</button>
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
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Email</th>
                    <th>Hp</th>
                    <th>Link Materi</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($pembicara as $pembicara) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $pembicara['webinar_id']; ?></td>
                            <td><?= $pembicara['nama_pembicara']; ?></td>
                            <td><?= $pembicara['pekerjaan']; ?></td>
                            <td><?= $pembicara['email']; ?></td>
                            <td><?= $pembicara['hp']; ?></td>
                            <td><?= $pembicara['link']; ?></td>
                            <td><?= $pembicara['alamat']; ?></td>
                            <td>
                              <button class="btn btn-block btn-outline-success btn-sm" type="button">Update</button>
                              <button class="btn btn-block btn-outline-danger btn-sm" type="button">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Webinar</th>
                    <th>Nama</th>
                    <th>Pekerjaan</th>
                    <th>Email</th>
                    <th>Hp</th>
                    <th>Link Materi</th>
                    <th>Alamat</th>
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
