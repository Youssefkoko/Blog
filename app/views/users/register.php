<?php require_once APPROOT . '/views/inc/header.php' ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="card card-body bg-light mt-5">
      <h2>Create an Account</h2>
      <p>Please fill the form to register with us.</p>
      <form action="<?php echo URLROOT ?>. '/users/register' " method="post">
        <div class="form-group">
          <label for="name">Name:
            <sup>*</sup>
          </label>
          <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? is - invalid : ''; ?>" value="<?php echo $data['name']; ?>">
          <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          <label for="name">Email:
            <sup>*</sup>
          </label>
          <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? is - invalid : ''; ?>" value="<?php echo $data['email']; ?>">
          <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          <label for="name">Password:
            <sup>*</sup>
          </label>
          <input type="passowrd" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
          <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once APPROOT . '/views/inc/footer.php' ?>