<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="show-item?id=<?php echo e($entry->id); ?>" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Bearbeiten</h1>
</div>
<div class="container under">

  <?php if(!empty($saved)): ?>
    <div class="alert alert-success" role="alert">
    Das Item wurde erfolgreich gespeichert!
  </div>
  <?php endif; ?>
  <form method="Post" action="posts-edit?id=<?php echo e($entry->id); ?>">
    @csrf
    @method('PUT')
    <label for="exampleFormControlTextarea1">Itemnummer</label>
    <input type="text" value=" <?php echo e($entry->partnumber); ?>" name="partnumber" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Gruppe</label>
    <input type="text" value="<?php echo e($entry->groupname); ?>" name="group" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Name der Ware</label>
    <input type="text" value="<?php echo e($entry->title); ?>" name="title" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Hersteller</label>
    <input type="text" value="<?php echo e($entry->manufacturer);?>" name="manufacturer" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Lieferant</label>
    <input type="text" value="<?php echo e($entry->supplier); ?>" name="supplier" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Lagerbestand</label>
    <input type="text" value="<?php echo e($entry->storage); ?>" name="storage" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Zolltarifnummer</label>
    <input type="text" value="<?php echo e($entry->hscode); ?>" name="customnummer" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Gewicht</label>
    <input type="text" value="<?php echo e($entry->weight); ?>" name="weight" class="form-control" >
    <br>
    <h4><b>Technische Informationen</b></h4>
    <label for="exampleFormControlTextarea1">Material</label>
    <input type="text" value="<?php echo e($entry->material); ?>" name="material" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Type</label>
    <input type="text" value="<?php echo e($entry->type); ?>" name="type" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">DN</label>
    <input type="text" value="<?php echo e($entry->dn); ?>" name="dn" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">PN</label>
    <input type="text" value="<?php echo e($entry->pn) ?>" name="pn" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Einkaufspreis</label>
    <input type="text" value="<?php echo e($entry->price) ?>" name="price" class="form-control" >
    <br>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Beschreibung</label>
      <textarea name="content" class="form-control" rows="5"><?php echo e($entry->content) ?></textarea>
    </div>
    <input class="btn btn-success" type="submit" name"submit" value="Speichern">
    <br>
  </form>

</div>

<?php require __DIR__ . "/../layout/footer.php"; ?>
