<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <form class="" action="dashbord" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <br>
  <h1>Material</h2>
  <br>
    <div class="row">
      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light  btn-sq-lg" href="material-decision"><br><i class="fas fa-plus fa-5x"></i><br><br>Hinzufügen</a>
      </div>
      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light  btn-sq-lg" href="itemliste"><br><i class="fas fa-fire-extinguisher fa-5x"></i><br><br>Itemlist</a>
      </div>
      <div class="col-lg-3">
        <a type="button" class="btn btn btn-light  btn-sq-lg" href=""><br><i class="fas fa-tools fa-5x"></i><br><br>Werkzeug</a>
      </div>

    </div>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
