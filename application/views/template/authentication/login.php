<div class="login-box">
  <div class="login-logo">
    <a href="<?php echo base_url() ?>"><b>Visage</b>Livre</a>
  </div>

  <div class="login-box-body">
    <p class="login-box-msg">Connectez-vous pour démarrer votre session</p>

    <p id="error_message" style="color: #ff0033;">
      <?php
        if (isset($error_message)) {
            echo $error_message;
        }
      ?>
    </p>

    <?php echo form_open('authentication/login') ?>
      <div class="form-group has-feedback">
        <input class="form-control" name="email" placeholder="Email" type="email" required="true">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input class="form-control" name="password" placeholder="Mot de passe" type="password" required="true">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-7">
          <div class="checkbox">
            <label><input type="checkbox" value="remember">Se souvenir de moi</label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Se connecter</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <!--<a href="#">J'ai oublié mon mot de passe</a><br>-->
    <a href="<?php echo base_url()."index.php/authentication/register" ?>" class="text-center">S'inscrire</a>

  </div>
  <!-- /.login-box-body -->
