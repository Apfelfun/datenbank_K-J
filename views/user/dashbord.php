<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <h1>Übersicht</h2>
  <br>
    <div class="row">
      <div class="col-lg-3">
        <a type="button" class="btn btn-outline-secondary  btn-sq-lg" href="itemliste"><i class="fas fa-list fa-5x"></i><br><br>Itemliste</a>
      </div>

      <div class="col-lg-3">
        <a type="button" class="btn btn-outline-secondary btn-sq-lg" href="lieferschein"><i class="fas fa-box-open fa-5x"></i><br><br>Lieferschein</a>
      </div>
    </div>
    <br>
    <a type="button" class="btn btn-danger" href="logout">Logout</a>
  </div>
<br>

<?php require __DIR__ . "/../layout/footer.php"; ?>
