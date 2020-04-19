<?php require __DIR__ . "/../layout/header.php"; ?>
<h1>Itemlist</h1>
<p>Partnumber: Product name </p>
<ul class="list-group">
  <?php foreach ($all as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
    <a type="button" href="posts-edit?id=<?php echo e($row->id); ?>" class="list-group-item list-group-item-action"><?php echo e($row->partnumber); ?>: <?php echo e($row->title);?></a>
<?php endforeach; ?>
</ul>
<?php require __DIR__ . "/../layout/footer.php"; ?>
