<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <form class="" action="dashbord" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <br>
  <h1>Warenversand</h2>
  <br>
    <div class="row">

      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light btn-sq-lg" href="search"><br><i class="fas fa-search fa-5x"></i><br><br>Suche</a>
      </div>

      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light btn-sq-lg" href="lieferschein"><br><i class="fas fa-box-open fa-5x"></i><br><br>Lieferschein</a>
      </div>

      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light btn-sq-lg" href="status"><br><i class="fas fa-file-alt fa-5x"></i><br><br>Lieferschein<br>Status</a>
      </div>
    </div>
    <br>
    <a type="button" class="btn btn-danger" href="logout">Logout</a>
  </div>
<br>
<?php require __DIR__ . "/../layout/footer.php"; ?>
