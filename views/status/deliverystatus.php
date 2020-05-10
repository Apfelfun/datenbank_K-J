<?php require __DIR__ . "/../layout/header.php"; ?>
<div class="container">
  <form class="" action="shipping" method="post">
    <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
  </form>
  <br>
  <h1>Lieferstatus</h1>
  <br>
  <ul class="list-group">
    <?php for ($i=0; $i <= $countOrder-1; $i++):?>
      <h3><b><?php echo e($removeOrder[$i]); ?></b></h3>
      <br>
      <?php foreach ($complete[$i] as $row): ?>
        <p><?php echo e($row->projectnumber); ?></p>
      <?php endforeach; ?>
      <br>
  <?php endfor; ?>
  </ul>
</div>
<?php require __DIR__ . "/../layout/footer.php"; ?>
