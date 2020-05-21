<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="dashbord" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Service</h1>
</div>
<div class="container">
  <form class="" action="service-result" method="POST">
    <input class="form-control form-control-lg" type="text" name="search" placeholder="Suche">
    <br>
    <button class="btn btn-dark" type="submit" name="submit-search">Suchen</button>
  </form>
  <br>
  <a type="button" class="btn btn-outline-secondary btn-block" href="service-insert">Auftrag anlegen</a>
  <br>
  <div class="row">
    <div class="col">
      <h1 class="h3">Nächster Service</h1>
      <br>
      <?php foreach ($all as $row):
        $nowCalc = strtotime(date("Y-m-d"));
        $startdateCalc = strtotime($row->startdate);
        $dif = ($startdateCalc - $nowCalc)/(60*60*24);
        ?>
        <?php if ($dif < 30): ?>
          <div class="alert alert-warning" role="alert">
            <h6><?php echo e($row->vessel); ?></h6>
            <hr>
            <p>Startdatum: <?php echo e($row->startdate); ?></p>
          </div>
        <?php else: ?>
          <p><?php echo e($row->startdate) ?> - <?php echo e($row->vessel); ?></p>
        <?php endif; ?>
      <?php endforeach; ?>
      <br>
      <button type="button" class="btn btn-outline-secondary btn-block">Alle anzeigen</button>
    </div>
    <div class="col">
      <h1 class="h3">Aufträge</h1>
      <br>
      <?php for ($i=0; $i < $max ; $i++):?>
        <?php if (!empty($allOrder[$i]->ordernumber)): ?>
          <div class="list-group">
            <a type="button" href="service-show-order?id=<?php echo e($allOrder[$i]->id); ?>" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1"><?php echo e($allOrder[$i]->ordernumber) ?> / <?php echo e($allOrder[$i]->customername) ?></h5>
                <small>Bestellt am <?php echo e($allOrder[$i]->orderdate); ?></small>
              </div>
              <p class="mb-1"><?php echo e($allOrder[$i]->orderProduct); ?></p>
              <small>Anlegt von <?php echo e($allOrder[$i]->user); ?> </small>
              </a>
            </div>
          <?php endif; ?>
        <?php endfor; ?>
        <br>
        <button type="button" class="btn btn-outline-secondary btn-block">Alle anzeigen</button>
      </div>
    </div>
  </div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
