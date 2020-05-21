<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="material" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">In welche Liste möchtest du etwas eintragen?</h1>
</div>
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
<a type="button" class="btn btn btn-light btn-sq-lg" href="insert-item"><br><i class="fas fa-fire-extinguisher fa-5x"></i><br><br>Item (Brandschutz)</a>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
<a type="button" class="btn btn btn-light btn-sq-lg" href="insert-tool"><br><i class="fas fa-tools fa-5x"></i><br><br>Werkzeug</a>
  </div>
</div>

<?php require __DIR__ . "/../layout/footer.php"; ?>
