<?php include __DIR__ . "/../layout/header.php" ?>
<br />
<br />
<ul>
  <?php foreach ($posts as $row): // In jedes Objekt und holt die entsprechenden Dinge heraus ?>
    <a href="post?id=<?php echo $row -> id; ?>">
      <li><?php echo e($row -> title);?></li>
    </a>
  <?php endforeach; ?>
</ul>
<?php include __DIR__ . "/../layout/footer.php" ?>
