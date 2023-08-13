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
      <?= $this->session->flashdata('message'); ?>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                  <div class="row">
                      <div class="col-8">
                        <h3 class="card-title"><?php echo $title?></h3>
                      </div>
                      <div class="col-4 text-right">
                      <a href="<?php echo base_url()?>index.php/panmoderator/tambah" class="btn btn-outline-primary btn-sm">Tambah</a>
                      </div>
                  </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Moderator</th>
                    <th>Pekerjaan</th>
                    <th>Email</th>
                    <th>Hp</th>
                    <th>Alamat</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $i = 1; ?>
                    <?php foreach ($moderator as $moderator) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $moderator['nama_moderator']; ?></td>
                            <td><?= $moderator['pekerjaan']; ?></td>
                            <td><?= $moderator['email']; ?></td>
                            <td><?= $moderator['hp']; ?></td>
                            <td><?= $moderator['alamat']; ?></td>
                            <td>
                            <a href="<?= base_url(); ?>index.php/panmoderator/update/<?= $moderator['id_moderator']; ?>" class="btn btn-block btn-outline-success btn-sm">Update</a>
                              <a href="<?= base_url(); ?>index.php/panmoderator/hapus/<?= $moderator['id_moderator']; ?>" class="btn btn-block btn-outline-danger btn-sm" onclick="return confirm('yakin?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Nama Moderator</th>
                    <th>Pekerjaan</th>
                    <th>Email</th>
                    <th>Hp</th>
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
