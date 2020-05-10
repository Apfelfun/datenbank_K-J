<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <h2>Item</h2>
      <br>
      <b>Item:</b> <?php echo e($entry->partnumber); ?>
      <br>
      <b>Ware:</b> <?php echo e($entry->title); ?>
      <br>
      <b>Warengruppe:</b> <?php echo e($entry->groupname); ?>
      <br>
      <b>Hersteller:</b> <?php echo e($entry->manufacturer); ?>
      <br>
      <b>Lieferant:</b> <?php echo e($entry->supplier); ?>
      <br>
      <b>Lagerbestand:</b> <?php echo e($entry->storage); ?>
      <br>
      <b>Zolltarifnummer:</b> <?php echo e($entry->hscode); ?>
    </div>

    <div class="col-sm">
      <br><br><br>
      <b>Material:</b> <?php echo e($entry->material); ?>
      <br>
      <b>Typ:</b> <?php echo e($entry->type); ?>
      <br>
      <b>DN:</b> <?php echo e($entry->dn); ?>
      <br>
      <b>PN:</b> <?php echo e($entry->pn); ?>
      <br>
      <b>Beschreibung:</b> <?php echo e($entry->content); ?>
    </div>
  </div>
  <br>
  <form action="posts-edit?id=<?php echo e($entry->id); ?>" method="POST">
    <button type="submit" name="infoChange" class="btn btn-secondary">Informationen ändern</button>
  </form>
  <br>
  <form action="storage-edit?id=<?php echo e($entry->id); ?>" method="POST">
    <button type="submit" name="storageChange" class="btn btn-danger" >Lagerbestand bearbeiten</button>
  </form>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
