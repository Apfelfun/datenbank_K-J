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
        <h4>Lieferanschrift</h4>
        <label for="exampleFormControlTextarea1">Firmname</label>
        <input type="text" name="companyname" class="form-control" >
        <label for="exampleFormControlTextarea1">Adresse</label>
        <input type="text" name="companyadress" class="form-control" >
        <label for="exampleFormControlTextarea1">Postleitzahl Stadt</label>
        <input type="text" name="zipcode" class="form-control" >
        <br>
        <label for="exampleFormControlTextarea1">Refernz vom Kunden</label>
        <input type="text" name="reference" class="form-control" >
      </div>

      <div class="col-sm">
        <label for="exampleFormControlTextarea1">Lieferscheinnummer</label>
        <input type="text" name="deliveryno" value="001/2020" class="form-control" >
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Rechnungsanschrift</label>
          <textarea name="invoiceadress" class="form-control" rows="5"></textarea>
        </div>
        <label for="exampleFormControlTextarea1">Schiffsname</label>
        <input type="text" name="vessel" class="form-control" >
      </div>

      <div class="col-sm">
        <ul class="list-group">
          <?php foreach ($all as $row): ?>
            <a type="button"  class="list-group-item list-group-item-action"><?php echo e($row->partnumber); ?>: <?php echo e($row->title);?></a>
          <?php endforeach; ?>
        </ul>

      </div>
    </div>
    <input type="submit" name="pdf" value="PDF">
  </form>
</div>

<?php require __DIR__ . "/../layout/footer.php"; ?>
