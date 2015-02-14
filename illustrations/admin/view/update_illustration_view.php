<!DOCTYPE html>
<html lang="ja">

<?php require (doc_root('/common_html/head.php')); ?>

<body>
	<?php require (doc_root('/common_html/header.php')); ?>

	<div class="container">
		<div class="row">
			<div class="col col-md-2">
				<?php require_once (doc_root('/common_html/left_nav.php')); ?>
			</div>
			<div class="col col-md-10">
				<div>
					<form action="<?php echo h(root_url('/illustrations/admin/update/update_illustration.php')); ?>" method="post" class="form-horizontal">
						<fieldset>
							<legend>編集</legend>
							<img src="<?php echo h($image[0]); ?>" width="<?php echo h($image[1]); ?>" height="<?php echo h($image[2]); ?>">
							<div class="form-group">
								<label for="title">タイトル</label>
								<input id="title" type="text" name="title" value="<?php echo h($input_title); ?>" class="form-control">
								<span id="title_conut" class="pull-right"></span>
							</div>
							<div class="form-group">
								<label for="price">販売価格</label>
								<div class="input-group">
									<input id="price" type="text" name="price" value="<?php echo h($input_price); ?>" class="form-control">
									<span class="input-group-addon">円</span>
								</div>
							</div>
							<ul>
								<?php foreach ($err_msg as $msg): ?>
									<li><?php echo h($msg); ?></li>
								<?php endforeach; ?>
							</ul>
							<input type="hidden" value="<?php echo h($token); ?>" name="token">
							<input type="hidden" value="<?php echo h($id); ?>" name="id">
							<button type="submit" class="btn btn-primary btn-block">更新</button>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php require (doc_root('/common_html/footer.php')); ?>

</body>
</html>