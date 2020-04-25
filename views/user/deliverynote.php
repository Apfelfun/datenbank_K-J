<?php require __DIR__ . "/../layout/header.php"; ?>

<h2>Lieferschein</h2>
<br>
<div class="container">

  <form method="Post" action="lieferschein">
    <div class="row">
      <div class="col-sm">
        <label for="exampleFormControlTextarea1">Projektnummer</label>
        <input type="text" name="projectnumber" class="form-control" >
        <br>
        <h5>Lieferanschrift</h5>
        <label for="exampleFormControlTextarea1">Firmname</label>
        <input type="text" name="companyname" class="form-control" >
        <label for="exampleFormControlTextarea1">Adresse</label>
        <input type="text" name="companyadress" class="form-control" >
        <label for="exampleFormControlTextarea1">Postleitzahl + Stadt</label>
        <input type="text" name="zipcode" class="form-control" >
        <br>
        <label for="exampleFormControlTextarea1">Refernz vom Kunden</label>
        <input type="text" name="reference" class="form-control" >
        <br>
        <h5>Produkte</h5>
        <select class="form-control" id="select_1" name="thenumbers">
          <?php foreach ($all as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
            <option value="<?php echo e($row->id) ?>"><?php echo e($row->partnumber); ?>: <?php echo e($row->title);?></option>
          <?php endforeach; ?>
        </select>
        <br>
        <input type="submit" name="insert" value="Hinzufügen">
        <br>
        <br>
        <label for="exampleFormControlTextarea1">Produktname</label>
        <input type="text" name="productname" value="<?php echo e($select->title);
        ?>" class="form-control" >


      </div>

      <div class="col-sm">
        <label for="exampleFormControlTextarea1">Lieferscheinnummer</label>
        <input type="text" name="deliveryno" value="001/2020" class="form-control" >
        <br>

        <h5>Rechnungsanschrift</h5>
        <label for="exampleFormControlTextarea1">Firmname</label>
        <input type="text" name="companynameinvoice" class="form-control" >
        <label for="exampleFormControlTextarea1">Adresse</label>
        <input type="text" name="companyadressinvoice" class="form-control" >
        <label for="exampleFormControlTextarea1">Postleitzahl + Stadt</label>
        <input type="text" name="zipcodeinvoice" class="form-control" >
        <br>
        <label for="exampleFormControlTextarea1">Schiffsname</label>
        <input type="text" name="vessel" class="form-control" >
        <br>
        <br>
        <br>
        <label for="exampleFormControlTextarea1">Anzahl</label>
        <input type="text" name="productname" value="<?php echo e($select->hscode);
        ?>" class="form-control" >
        <br>
        <label for="exampleFormControlTextarea1">Zolltarifnummer</label>
        <input type="text" name="productname" value="<?php echo e($select->hscode);
        ?>" class="form-control" >
      </div>

    </div>
    <input type="submit" name="pdf" value="PDF">
  </form>
</div>

<?php require __DIR__ . "/../layout/footer.php"; ?>
