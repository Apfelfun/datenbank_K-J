<?php require __DIR__ . "/../layout/header.php"; ?>
<br />
<?php if (!empty($error)): ?>
<?php echo $error; ?>
<?php endif; ?>
<form method="Post" method="login">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name="username" class="form-control" >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="password">
  </div>
  <input type="submit" name="Einloggen" class="btn btn-primary">
</form>


<?php require __DIR__ . "/../layout/footer.php"; ?>
