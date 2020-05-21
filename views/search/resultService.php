<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="service" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Suche - Service</h1>
</div>
<ul class="list-group">
  <?php if (!empty($find)): ?>
    <?php foreach ($find as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
      <a type="button" href="show-item?id=<?php echo e($row->id); ?>" class="list-group-item list-group-item-action"><?php echo e($row->ordernumber); ?> / <?php echo e($row->customername); ?></a>
  <?php endforeach; ?>
<?php else:?>
  <h4>Suchbegriff nicht gefunden</h4>
<?php endif; ?>
</ul>

<?php require __DIR__ . "/../layout/footer.php"; ?>
