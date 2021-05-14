<?php  if (count($fail) > 0) : ?>
	<div class="failure">
		<?php foreach ($fail as $fail) : ?>
			<p><?php echo $fail ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
