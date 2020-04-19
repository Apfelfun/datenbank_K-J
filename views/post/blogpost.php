<?php include __DIR__ . "/../layout/header.php"; ?>
<br />
<br/>

<h1><?php echo $post["title"];?></h1>
<p><?php echo nl2br($post["content"]); ?></p>
<ul>
  <?php foreach ($comments as $comment) {
    echo e($comment -> content);
  } ?>
</ul>

<form action="post?id=<?php echo $post['id']; ?>" method="post">
  <textarea name="content" class="form-control"></textarea>
  <br />
  <input type="submit" class="btn btn-primary" value="Kommentar hinzufügen">
</form>
