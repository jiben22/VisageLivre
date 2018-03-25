<div class="register-box">
  <div class="register-logo">
    <a href="<?php echo base_url() ?>"><b>Visage</b>Livre</a>
  </div>
  <div class="register-box-body">
    <p class="login-box-msg">Inscription</p>

    <p id="error_message" style="color: #ff0033;">
      <?php
        if (isset($error_message)) {
            echo $error_message;
        }
      ?>
    </p>

    <?php echo form_open('authentication/register') ?>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Pseudonyme" name="nickname" type="text" required="true">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Email" name="email" type="email" required="true">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Mot de passe" name="password" type="password" required="true">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" placeholder="Confirmation du mot de passe" name="passconf" type="password" required="true">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="row">
        <a href="<?php echo base_url(); ?>" class="col-xs-6 text-center" style="margin-left: -5px; margin-top: 5px;">J'ai déjà un compte</a>
        <!-- /.col -->
        <div class="col-xs-offset-1 col-xs-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" style="width: 115px;">S'inscrire</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.form-box -->
</div>
