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
                    <input type="hidden" name="id" value="<?= $useri['id']; ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="input nama" value="<?php echo $useri['name'];?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="input email" value="<?php echo $useri['email'];?>">
                            <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="3"><?php echo $useri['alamat'];?></textarea>
                            <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="hp">Nomor Telepon</label>
                            <input type="text" class="form-control" id="hp" name="hp" placeholder="input Nomor Telepon" value="<?php echo $useri['hp'];?>">
                            <?= form_error('hp', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Profesi</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="input Profesi" value="<?php echo $useri['pekerjaan'];?>">
                            <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select class="form-control" name="role_id">
                                <option value="">Select Role</option>
                                <?php foreach ($role as $rol) : ?>
                                    <!-- <option value="<?= $rol['id']; ?>"><?= $rol['role']; ?></option> -->
                                    <option value="<?= $rol['id']; ?>" <?= $rol['id'] == $useri['role_id'] ? "selected" : null ?>><?= $rol['role']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="password">Password (jika tidak ada perubahan biarkan kosong)</label>
                            <input type="password" class="form-control" id="password" name="new_password" placeholder="input password">
                            <?= form_error('new_password', '<small class="text-danger pl-3">', '</small>'); ?>
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

