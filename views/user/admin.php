<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="material" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Itemlist</h1>
</div>
<form class="" action="item-result" method="POST">
  <input class="form-control form-control-lg" type="text" name="search" placeholder="Suche">
  <br>
  <button class="btn btn-dark" type="submit" name="submit-search">Suchen</button>
</form>
<br>
<h3>Übersicht</h3>
<ul class="list-group">
  <?php foreach ($all as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
    <a type="button" href="show-item?id=<?php echo e($row->id); ?>" class="list-group-item list-group-item-action"><?php echo e($row->partnumber); ?> <?php echo e($row->title);?></a>
<?php endforeach; ?>
</ul>
<?php require __DIR__ . "/../layout/footer.php"; ?>
