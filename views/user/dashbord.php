<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <h1>Übersicht</h2>
  <br>
    <div class="row">
      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light btn-sq-lg" href="material"><br><i class="fas fa-list fa-5x"></i><br><br>Material</a>
      </div>
      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light btn-sq-lg" href="shipping"><br><i class="fas fa-warehouse fa-5x"></i><br><br>Warenversand</a>
      </div>
    </div>
    <br>
    <a type="button" class="btn btn-danger" href="logout">Logout</a>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
