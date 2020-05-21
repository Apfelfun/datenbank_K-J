<?php require __DIR__ . "/../layout/headerImprove.html"; ?>
<body class="text-center">
  <form method="Post" method="login" class="form-signin">
      <img src="../../data/kj.gif" class="mb-4" alt="" height="150px">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      <input type="text"name="username" class="form-control" placeholder="Nutzername">
      <input type="password" class="form-control" name="password" placeholder="Passwort">
    <button type="submit" name="Einloggen" class="btn btn-lg btn-primary btn-block">Sign in</button>
    <?php if (!empty($error)): ?>
    <?php echo "Nutzername oder Passwort ist falsch"; ?>
    <?php endif; ?>
  </form>
</body>
<br />


<?php require __DIR__ . "/../layout/footer.php"; ?>
