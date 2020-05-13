<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="dashbord" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Material</h1>
</div>
<div class="container">
    <div class="row">
      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light  btn-sq-lg" href="material-decision"><br><i class="fas fa-plus fa-5x"></i><br><br>Hinzufügen</a>
      </div>
      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light  btn-sq-lg" href="itemliste"><br><i class="fas fa-fire-extinguisher fa-5x"></i><br><br>Itemlist</a>
      </div>
      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light  btn-sq-lg" href="toolliste"><br><i class="fas fa-tools fa-5x"></i><br><br>Werkzeug</a>
      </div>

    </div>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
