<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <form class="" action="material" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <br>
  <h2>Material hinzufügen</h2>
  <br>
  <form method="Post" action="insert-add">
    <p>Auswahl für die entsprechende Datenbank folgt</p>
    <label for="exampleFormControlTextarea1">Itemnummer (Nur wenn vorhanden!)</label>
    <input type="text" name="partnumber" placeholder="Item" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Gruppe</label>
    <input type="text" name="group" placeholder="Gruppenname" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Ware</label>
    <input type="text" name="title" placeholder="Name der Ware" class="form-control" >
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
    <h4><b>Technische Informationen</b></h4>
    <label for="exampleFormControlTextarea1">Material</label>
    <input type="text" name="material" placeholder="Material" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">Type</label>
    <input type="text" name="type" placeholder="Typ" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">DN</label>
    <input type="text" name="dn" placeholder="DN" class="form-control" >
    <br>
    <label for="exampleFormControlTextarea1">PN</label>
    <input type="text" name="pn" placeholder="PN" class="form-control" >
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
