<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Connection -Inscription</h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row post">
        <div class="col-lg-offset-2 col-lg-6">
          <?php //echo validations_errors(); ?>
          <?php //echo $post ?>
          <?php echo form_open('user/createUser') ?>
              <div class="form-group">
								<fieldset >
									<legend>Register</legend>
									<input type='hidden' name='submitted' id='submitted' value='1'/>
									<label for='nickname' >UserName*:</label>
									<input type='text' name='nickname' id='nickname' maxlength="50" />
									<label for='email' >Email Address*:</label>
									<input type='text' name='email' id='email' maxlength="50" />
									<label for='password' >Password*:</label>
									<input type='password' name='password' id='password' maxlength="50" />
									<input type='submit' name='Submit' value='Submit' />
								</fieldset>
            </div> 
          
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


<form id='register' action='register.php' method='post'accept-charset='UTF-8'>
	
</form>
