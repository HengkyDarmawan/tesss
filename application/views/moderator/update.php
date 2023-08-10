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

    <!-- left column -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-success">
                    <div class="card-header">
                    <h3 class="card-title"><?php echo $title?></h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                    <input type="hidden" name="id" value="<?= $moderator['id']; ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Moderator</label>
                            <input type="text" class="form-control" id="name" name="nama_moderator" placeholder="input nama" value="<?php echo $moderator['nama_moderator'];?>">
                            <?= form_error('nama_moderator', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="input email" value="<?php echo $moderator['email'];?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?php echo $moderator['alamat'];?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="hp">Hp</label>
                            <input type="text" class="form-control" id="hp" name="hp" placeholder="input hp" value="<?php echo $moderator['hp'];?>">
                            <?= form_error('hp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="input pekerjaan" value="<?php echo $moderator['pekerjaan'];?>">
                            <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
  </div>
  <!-- /.content-wrapper -->

