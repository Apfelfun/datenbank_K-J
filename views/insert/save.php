<?php require __DIR__ . "/../layout/header.php"; ?>
<form class="" action="dashbord" method="post">
  <button type="submit" class="btn btn-outline-secondary" name="button"><i class="fas fa-arrow-left"></i></button>
</form>
<br>
<?php if($save): ?>
  <p>Gespeichert</p>
<?php endif;  ?>

<?php require __DIR__ . "/../layout/footer.php"; ?>
