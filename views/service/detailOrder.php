<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="service" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2"> <?php echo e($find->ordernumber) ?></h1>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <b>Kunde:</b> <?php echo e($find->customername); ?>
      <br>
      <b>Adresse:</b> <?php echo e($find->customeraddress); ?>
      <br>
      <b>Postleitzahl + Stadt:</b> <?php echo e($find->customerzipcode); ?>
      <br>
      <b>Land:</b> <?php echo e($find->customercountry); ?>
      <br>
      <b>E-Mail vom Kunden:</b> <?php echo e($find->email); ?>
    </div>

    <div class="col-sm">
      <b>Verkaufspreis:</b> <?php echo e($find->sellingprice); ?>
      <br>
      <b>Einkaufspreis:</b> <?php echo e($find->purchasingprice); ?>
      <br>
      <b>Bestellt am:</b> <?php echo e($find->orderdate); ?>
      <br>
      <b>Lieferung erfolgt am:</b> <?php echo e($find->deliverydate); ?>
      <br>
    </div>
  </div>
  <b>Bestellt:</b>
  <br>
  <?php echo e($find->orderProduct); ?>
  <br>
  <h5>Erzeugten Lieferscheine</h5>
  <ul class="list-group">
  <?php if (!empty($searchdelivery)): ?>
    <?php foreach ($searchdelivery as $row): ?>
      <?php
      $number = $row->deliverynumber;

      if (strlen($number) == 1){
        $deliverynoName = '00'.$row->deliverynumber.'/'.'2020';
      } else {
        $deliverynoName = '0'.$row->deliverynumber.'/'.'2020';
      }
      ?>
      <a type="button" class="list-group-item list-group-item-action"><?php echo $deliverynoName; ?></a>
    <?php endforeach; ?>
    <br>
  <?php else: ?>
    <div class="alert alert-dark" role="alert">
      Es liegen keine Lieferscheine vor
    </div>
    <br>
  <?php endif; ?>
  </ul>
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
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
