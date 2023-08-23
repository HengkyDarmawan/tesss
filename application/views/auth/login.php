<div class="login-box">
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h4 class="login-box-msg text-bold">Universitas xyz</h4>
      <hr>
      <h4 class="login-box-msg text-bold">Login Webinar</h4>
      <?php echo $this->session->flashdata('message'); ?>
      <form action="<?php echo base_url()?>index.php/auth" method="post">
        <div class="mb-3">
          <div class="input-group">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo set_value('email')?>">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="mb-3">
          <div class="input-group">
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col">
            <button type="submit" class="btn btn-outline-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="<?php echo base_url()?>index.php/auth/registration" class="btn btn-block btn-primary">
           Creat an account
        </a>
      </div>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->


