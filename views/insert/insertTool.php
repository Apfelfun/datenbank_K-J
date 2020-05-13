<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <form class="" action="material-decision" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <br>
  <h2>Werkzeug hinzufügen</h2>
  <br>
  <form method="Post" action="insert-add-tool">
    <label for="exampleFormControlTextarea1">Seriennummer</label>
    <input type="text" name="serialnumber" placeholder="Seriennummer" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Gruppe</label>
    <input type="text" name="group" placeholder="Gruppenname" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Artikelname</label>
    <input type="text" name="title" placeholder="Name der Ware" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Gewicht</label>
    <input type="text" name="weight" placeholder="Gewicht" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Hersteller</label>
    <input type="text" name="manufacturer" placeholder="Hersteller" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Lieferant</label>
    <input type="text" name="supplier" placeholder="Lieferant" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Lagerbestand</label>
    <input type="text" name="storage" placeholder="Lagerbestand" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Zolltarifnummer</label>
    <input type="text" name="customnummer" placeholder="Zolltarifnummer" class="form-control" >
    <br>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Beschreibung</label>
      <textarea name="content" class="form-control" rows="5"></textarea>
    </div>
    <input class="btn btn-success" type="submit" name"submit" value="Speichern">
    <br>
  </form>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
