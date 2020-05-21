<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="shipping" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Lieferschein</h1>
</div>

<form method="Post" action="lieferschein">
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <label for="exampleFormControlTextarea1">Auftragsnummer</label>
        <select class="form-control"  name="projectnumber">
          <option value="">-</option>
          <?php foreach ($removeOrder as $row): ?>
            <option value="<?php echo e($row) ?>"><?php echo e($row);?></option>
          <?php endforeach; ?>
        </select>
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
        <label for="exampleFormControlTextarea1">Ansprechperson (Kunde)</label>
        <input type="text" name="personcustomer" class="form-control" >
        <br>
      </div>

      <div class="col-sm">
        <br><br><br><br>
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
        <label for="exampleFormControlTextarea1">Abmaße (L x W x H)</label>
        <input type="text" name="dimension" class="form-control" >
        <br>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <h4><u>Waren</u></h4>
        <button class="btn btn-light" type="button" id="add">Produkt hinzufügen</button>
        <button type="button" class=" btn btn-light btn_remove hidden">Letzten entfernen</button>
        <div id="dynamic_field"></div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm">
        <br>

        <label for="exampleFormControlTextarea1">Auswahlliste</label>

        <select class="form-control"  name="thenumbers">
          <option value="">-</option>
          <?php foreach ($all as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
            <option value="<?php echo e($row->id) ?>"><?php echo e($row->partnumber); ?>: <?php echo e($row->title);?></option>
          <?php endforeach; ?>
        </select>
        <br>
        <select class="form-control" id="select_1" name="thenumbers2">
          <option value="">-</option>
          <?php foreach ($all as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
            <option value="<?php echo e($row->id) ?>"><?php echo e($row->partnumber); ?>: <?php echo e($row->title);?></option>
          <?php endforeach; ?>
        </select>

      </div>

      <div class="col-sm">
        <br>
        <label></label>
        <label for="exampleFormControlTextarea1">Anzahl</label>
        <input type="text" name="productcountdropdown" value="" class="form-control" >
        <label for="exampleFormControlTextarea1">Anzahl</label>
        <input type="text" name="productcountdropdown2" value="" class="form-control" >
      </div>
    </div>
  </div>
  <br>
  <div class="container under">
    <button type="submit" name="pdf" class="btn btn-lg btn-info btn-block">Lieferschein erzeugen</button>
  </div>
</form>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>

<script>
$(document).ready(function() {
  var i = 1;
  $('#add').click(function() {
    if (i <= 7) {
      $('#dynamic_field').append('<br><div id="row' + i + '"><label" for="member_' + i + '">Produktname</label><br><input class="form-control" type="text" name="productname[' + i + ']" value=""> <br><label" for="member_' + i + '">Anzahl</label> <input class="form-control" type="text" name="productcount[' + i + ']" value=""><br><label" for="member_' + i + '">Zolltarifnummer</label> <input class="form-control" type="text" name="productcostum[' + i + ']" value=""><br><label" for="member_' + i + '">Gewicht</label> <input class="form-control" type="text" name="weight[' + i + ']" value=""><br><p>---------------------</p></div>')
      i++;
      $('.btn_remove').removeClass('hidden');
    }
  });
  $(document).on('click', '.btn_remove', function() {
    var button_id = $(this).attr("id");
    i--;
    $('#row' + $('#dynamic_field div').length).remove();
    if (i<=1) {
      $('.btn_remove').addClass('hidden');
    }
  });
});
</script>
