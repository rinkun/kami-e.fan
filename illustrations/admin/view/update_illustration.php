<!DOCTYPE html>
<html lang="ja">

<?php require ($_SERVER['DOCUMENT_ROOT'] . '/common_html/head.php'); ?>

<body>
	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/common_html/header.php'); ?>

	<div class="container">
		<div class="row">
			<div class="col col-md-2">
				<span>メニュー</span>
			</div>
			<div class="col col-md-10">
				<div>
					<form action="./update/update_illustration.php" method="post" class="form-horizontal">
						<fieldset>
							<legend>編集</legend>
							<div class="form-group">
								<label for="title">タイトル</label>
								<input id="title" type="text" name="title" value="<?php echo h($input_title); ?>" class="form-control required-check">
								<span class="required-msg"></span>
								<span id="title_conut" class="pull-right"></span>
							</div>
							<div class="form-group">
								<label for="price">販売価格</label>
								<div class="input-group">
									<input id="price" type="text" name="price" value="<?php echo h($input_price); ?>" class="form-control required-check">
									<span class="input-group-addon">円</span>
								</div>
								<span class="required-msg"></span>
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

	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/common_html/footer.php'); ?>

</body>
</html>
