<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="show-tool?id=<?php echo e($entry->id); ?>" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Werkzeug bearbeiten</h1>
</div>
<div class="container under">
  <?php if ($save): ?>
    <h4>Werkzeug wurde erfolgreich abgespeichert</h4>
    <br>
  <?php endif; ?>
  <form method="Post" action="tool-edit?id=<?php echo e($entry->id); ?>">
    <label for="exampleFormControlTextarea1">Seriennummer</label>
    <input type="text" name="serialnumber" value="<?php echo e($entry->serialnumber); ?>" placeholder="Seriennummer" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Gruppe</label>
    <input type="text" name="group" placeholder="Gruppenname" class="form-control" value="<?php //echo e($entry->serialnumber); ?>">
    <br>
    <label for="exampleFormControlTextarea1">Artikelname</label>
    <input type="text" name="title" placeholder="Name der Ware" class="form-control" value="<?php echo e($entry->name); ?>" >
    <br>
    <label for="exampleFormControlTextarea1">Gewicht</label>
    <input type="text" name="weight" placeholder="Gewicht" class="form-control" value="<?php echo e($entry->weight); ?>">
    <br>
    <label for="exampleFormControlTextarea1">Hersteller</label>
    <input type="text" name="manufacturer" placeholder="Hersteller" class="form-control" value="<?php echo e($entry->manufacturer); ?>" >
    <br>
    <label for="exampleFormControlTextarea1">Lieferant</label>
    <input type="text" name="supplier" placeholder="Lieferant" class="form-control" value="<?php echo e($entry->supplier); ?>">
    <br>
    <label for="exampleFormControlTextarea1">Lagerbestand</label>
    <input type="text" name="storage" placeholder="Lagerbestand" class="form-control" value="<?php echo e($entry->storage); ?>" >
    <br>
    <label for="exampleFormControlTextarea1">Zolltarifnummer</label>
    <input type="text" name="customnummer" placeholder="Zolltarifnummer" class="form-control" value="<?php echo e($entry->hscode); ?>">
    <br>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Beschreibung</label>
      <textarea name="content" class="form-control" rows="5"><?php echo e($entry->description); ?></textarea>
    </div>
    <input class="btn btn-success" type="submit" name"submit" value="Speichern">
  </form>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
