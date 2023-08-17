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
                    <input type="hidden" name="id" value="<?= $webinar['id_webinar']; ?>">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Pembicara</label>
                            <select class="form-control" name="pembicara_id">
                                <option value="">Select Pembicara</option>
                                <?php foreach ($pembicara as $pembicara) : ?>
                                    <option value="<?= $pembicara['id_pembicara']; ?>" <?= $pembicara['id_pembicara'] == $webinar['pembicara_id'] ? "selected" : null ?>><?= $pembicara['nama_pembicara']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Moderator</label>
                            <select class="form-control" name="moderator_id">
                                <option value="">Select moderator</option>
                                <?php foreach ($moderator as $moderator) : ?>
                                    <!-- <option value="<?= $moderator['id_moderator']; ?>"><?= $moderator['nama_moderator']; ?></option> -->
                                    <option value="<?= $moderator['id_moderator']; ?>" <?= $moderator['id_moderator'] == $webinar['moderator_id'] ? "selected" : null ?>><?= $moderator['nama_moderator']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tema">Tema</label>
                            <input type="text" class="form-control" id="tema" name="tema" placeholder="input nama" value="<?php echo $webinar['tema'];?>">
                            <?= form_error('tema', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <select required name="tipe" class="form-control">
                                <?php
                                if ($webinar['tipe'] == "webinar") { ?>
                                    <option value="">- Pilih tipe-</option>
                                    <option value="webinar" selected>Webinar</option>
                                    <option value="seminar">Seminar</option>
                                <?php } else { ?>
                                    <option value="">- Pilih tipe-</option>
                                    <option value="webinar">Webinar</option>
                                    <option value="seminar" selected>Seminar</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <textarea class="form-control" name="lokasi" id="lokasi" cols="30" rows="3"><?php echo $webinar['lokasi'];?></textarea>
                            <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="input tanggal" value="<?php echo $webinar['tanggal'];?>">
                            <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="waktu">waktu</label>
                            <input type="text" class="form-control" id="waktu" name="waktu" placeholder="input waktu" value="<?php echo $webinar['waktu'];?>">
                            <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
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

