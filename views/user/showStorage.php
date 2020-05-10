<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <h5>Lagerbestand anpassen</h5>
      <form class="form-group" action="storage-edit?id=<?php echo e($entry->id); ?>" method="POST">
        <input class="form-control" type="text" name="stoargeChange" value="<?php echo e($entry->storage) ?>">
        <br>
        <button class="btn btn-secondary" type="submit" name="storageSave">Speichern</button>
      </form>
      <br>
      <?php if ($saved): ?>
      <b>Lagerbestand wurde erfolgreich gespeichert</b>
    <?php endif; ?>
    </div>
  </div>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
