<div class="articDiv" >
  <img src="<?php echo $image; ?>" height="420px" width="632px" alt="Article_Image" class="img-thumbnail">
  <div class="alert alert-danger" style="margin-top:2em;" role="alert" >
  <p class=" font-weight-bold" style="font-size:120%"><?php echo $topic; ?> </p>
</div>

<div  class="font-weight-normal"  >
<?php echo $content; ?>
</div>
  <div class="newsHeader">Posted on: <em><?php echo $date; ?></em>, By <em><?php echo $author; ?></em></div>
<button onclick="window.location.href = 'view.php';" type="button" class="btn btn-warning">Back</button>
</div>
<br />
