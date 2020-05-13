<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <form class="" action="shipping" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <h1 class="h2">Lieferstatus</h1>
</div>

<ul class="list-group">
  <?php for ($i=0; $i <= $countOrder-1; $i++):?>
    <h3><b><?php echo e($removeOrder[$i]); ?></b></h3>
    <br>
    <?php foreach ($complete[$i] as $row): ?>
      <div class="card">
        <div class="card-header"><b> <a class="stretched-link text-dark" href="status-show?id=<?php echo e($row->id); ?>"><?php echo e($row->projectnumber); ?> : <?php echo e($row->deliverynumber) ?></a></b></div>
        <div class="card-body">
          <h5 class="card-title"><?php echo e($row->deliverycompanyname); ?></h5>
          <?php if($row->progress): ?>
            <p class="card-text">Das Paket wird vorbereitet</p>
            <p class="text-muted">
              Wird verpackt
            </p>
            <div class="progress">
              <div class="progress-bar bg-success " role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          <?php endif; ?>
        </div>
        <div class="card-footer text-muted">
          Erstellt am <?php echo e($row->date); ?>
        </div>
      </div>
      <br>
    <?php endforeach; ?>
    <br>
  <?php endfor; ?>
</ul>

<?php require __DIR__ . "/../layout/footer.php"; ?>
