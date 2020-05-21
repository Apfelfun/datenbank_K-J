<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="itemliste" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Item</h1>
</div>
<div class="container">
  <br>
  <div class="row">
    <div class="col-sm">
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
      <b>Preis:</b> <?php echo e($entry->price); ?>
      <br>
      <b>Gewicht:</b> <?php echo e($entry->weight); ?> kg
      <br>
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
</div>
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group mr-2" role="group" aria-label="First group">
    <form action="posts-edit?id=<?php echo e($entry->id); ?>" method="POST">
      <button type="submit" name="infoChange" class="btn btn-secondary">Informationen ändern</button>
    </form>
  </div>
  <div class="btn-group mr-2" role="group" aria-label="Second group">
    <form action="storage-edit?id=<?php echo e($entry->id); ?>" method="POST">
      <button type="submit" name="storageChange" class="btn btn-danger" >Lagerbestand bearbeiten</button>
    </form>
  </div>
  <div class="btn-group" role="group" aria-label="Third group">
    <form action="delete?id=<?php echo e($entry->id); ?>" method="POST">
      <button type="submit" name="storageChange" class="btn btn-danger" >Löschen</button>
    </form>
  </div>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
