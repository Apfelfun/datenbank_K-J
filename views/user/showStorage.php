<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="show-item?id=<?php echo e($entry->id); ?>" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Lagerbestand anpassen</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <?php if ($saved): ?>
        <div class="alert alert-success" role="alert">
        Lagerbestand wurde erfolgreich gespeichert!
      </div>
    <?php endif; ?>
      <form class="form-group" action="storage-edit?id=<?php echo e($entry->id); ?>" method="POST">
        <input class="form-control" type="text" name="stoargeChange" value="<?php echo e($entry->storage) ?>">
        <br>
        <button class="btn btn-secondary" type="submit" name="storageSave">Speichern</button>
      </form>
      <br>
    </div>
  </div>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
