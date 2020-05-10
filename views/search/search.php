<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <form class="" action="shipping" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <br>
  <h1>Suche</h1>
    <form class="" action="search-result" method="POST">
      <input class="form-control form-control-lg" type="text" name="search" placeholder="Suche">
      <br>
      <button class="btn btn-dark" type="submit" name="submit-search">Suchen</button>
    </form>
    <br>
    <br>
    <h4>Die letzten Einträge</h4>
    <ul class="list-group">
      <?php foreach ($all as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
        <a type="button" href="" class="list-group-item list-group-item-action"><?php echo e($row->projectnumber);?></a>
    <?php endforeach; ?>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>