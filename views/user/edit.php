<?php require __DIR__ . "/../layout/header.php"; ?>

<p>Partnummer: <?php echo e($entry->partnumber); ?></p>
<p>Name: <?php echo e($entry->title); ?></p>

<form method="Post" action="posts-edit?id=<?php echo e($entry->id); ?>">
<label for="exampleFormControlTextarea1">Zolltarifnummer</label>
<input type="text" name="hscode" value="<?php echo e($entry->hscode); ?>" class="form-control" >
<br>
<label for="exampleFormControlTextarea1">Hersteller/Lieferrant</label>
<input type="text" name="manufacturer" value="<?php echo e($entry->manufacturer); ?>" class="form-control" >
<br>
<label for="exampleFormControlTextarea1">Lagerbestand</label>
<input type="text" name="storage" value="<?php echo e($entry->storage); ?>" class="form-control" >
<br>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Beschreibung</label>
    <textarea name="content" class="form-control" rows="10"><?php echo e($entry->content); ?></textarea>
  </div>

  <input type="submit" name="Senden">
  <input type="submit" name="pdf" value="PDF">
</form>

<?php if(!empty($saved)): ?>
<p>Item wurde erfolgreich gespeichert</p>
<?php endif; ?>

<?php require __DIR__ . "/../layout/footer.php"; ?>
