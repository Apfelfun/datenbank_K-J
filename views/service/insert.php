<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <form class="" action="service" method="post">
      <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
    </form>
    <h1 class="h2">Auftrag anlegen</h1>
  </div>
  <form method="Post" action="service-insert">
    <div class="container">
      <label for="exampleFormControlTextarea1">Auftragsnummer</label>
      <input type="text" name="ordernumber" placeholder="Auftragsnummer" class="form-control" >
      <br>
      <div class="row">

        <div class="col">
          <label for="exampleFormControlTextarea1">Angebotsnummer</label>
          <input type="text" name="offnumber" placeholder="Angebotsnummer" class="form-control" >
          <br>
          <label for="exampleFormControlTextarea1">Kundenname</label>
          <input type="text" name="customName" placeholder="Kundenname" class="form-control" >
          <br>
          <label for="exampleFormControlTextarea1">Straße</label>
          <input type="text" name="customStreet" placeholder="Straße" class="form-control" >
          <br>
          <label for="exampleFormControlTextarea1">Postleitzahl Stadt</label>
          <input type="text" name="customCity" placeholder="Stadt" class="form-control" >
          <br>
          <label for="exampleFormControlTextarea1">Land</label>
          <input type="text" name="country" placeholder="Land" class="form-control" >
          <br>
          <label for="exampleFormControlTextarea1">Ansprechpartner</label>
          <input type="text" name="customPerson" placeholder="Ansprechpartner" class="form-control" >
          <br>
          <label for="exampleFormControlTextarea1">E-Mail</label>
          <input type="text" name="customEmail" placeholder="E-Mail" class="form-control" >
        </div>

        <div class="col">
          <label for="exampleFormControlTextarea1">Liefertermin</label>
          <br>
          <input type="date" id="start" name="endDate" value="<?php echo date('Y-m-d H:i:s'); ?>" min="<?php echo date('Y-m-d H:i:s'); ?>" max="2050-12-31">
          <br><br><br>
          <label for="exampleFormControlTextarea1">Einkaufspreis</label>
          <input type="text" name="purchasingprice" placeholder="Einkaufspreis" class="form-control" >
          <br>
          <label for="exampleFormControlTextarea1">Verkaufspreis</label>
          <input type="text" name="sellingprice" placeholder="Verkaufspreis" class="form-control" >
          <br>
          <label for="exampleFormControlTextarea1">Schiff</label>
          <input type="text" name="vessel" placeholder="Schiff" class="form-control" >
          <br>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Bestellung</label>
            <textarea name="content" class="form-control" rows="5">Artikelname/Anzahl </textarea>
          </div>
        </div>
      </div>
      <br>
      <input class="btn btn-success" type="submit" name"submit" value="Speichern">
    </div>
    <br>
    <br>
  </form>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
