<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="toolliste" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Werkzeug</h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <b>Artikelname:</b> <?php echo e($entry->name); ?>
      <br>
      <b>Gruppe:</b> <?php //echo e($entry->title); ?>
      <br>
      <b>Seriennummer:</b> <?php echo e($entry->serialnumber); ?>
      <br>
      <b>Gewicht:</b> <?php echo e($entry->weight); ?>
      <br>
      <b>Hersteller:</b> <?php echo e($entry->manufacturer); ?>
      <br>
      <b>Lieferant:</b> <?php echo e($entry->supplier); ?>
      <br>
      <b>Lagerbestand:</b> <?php echo e($entry->storage); ?>
    </div>

    <div class="col-sm">
      <b>Zolltarifnummer:</b> <?php echo e($entry->hscode	); ?>
      <br>
      <b>Beschreibung:</b> <?php echo e($entry->description); ?>
    </div>
  </div>
  <br>
  <form action="tool-edit?id=<?php echo e($entry->id); ?>" method="POST">
    <button type="submit" name="infoChange" class="btn btn-secondary">Informationen ändern</button>
  </form>
  <br>
  <form action="tool-storage-edit?id=<?php echo e($entry->id); ?>" method="POST">
    <button type="submit" name="storageChange" class="btn btn-danger" >Lagerbestand bearbeiten</button>
  </form>
  <br>
  <form action="tool-delete?id=<?php echo e($entry->id); ?>" method="POST">
    <button type="submit" name="storageChange" class="btn btn-danger" >Löschen</button>
  </form>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
