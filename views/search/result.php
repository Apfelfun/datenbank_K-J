<?php require __DIR__ . "/../layout/header.php"; ?>
<ul class="list-group">
  <?php if (count($entry) > 0): ?>
    <?php foreach ($entry as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
      <a type="button" href="show-result?id=<?php echo e($row->id); ?>" class="list-group-item list-group-item-action"><?php echo e($row->projectnumber); ?></a>
  <?php endforeach; ?>
<?php else:?>
  <h4>Suchbegriff nicht gefunden</h4>
<?php endif; ?>
</ul>

<?php require __DIR__ . "/../layout/footer.php"; ?>
