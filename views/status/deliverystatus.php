<?php require __DIR__ . "/../layout/header.php"; ?>
<h1>Lieferstatus</h1>
<p>Auftragsnummer: Kunde </p>
<ul class="list-group">
  <?php foreach ($all as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
    <?php if ($row->progress == 1): ?>
    <a type="button" href="posts-edit?id=<?php echo e($row->id); ?>" class="list-group-item list-group-item-action"><?php echo e($row->projectnumber); ?>&nbsp;&nbsp;<?php echo e($row->deliverycompanyname);?>&nbsp;&nbsp;&nbsp;&nbsp;<b>Status:&nbsp;<?php echo "Lieferschein wurde erzeugt"; ?></b></a>
  <?php endif; ?>
<?php endforeach; ?>
</ul>
<?php require __DIR__ . "/../layout/footer.php"; ?>
