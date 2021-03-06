<!DOCTYPE html>
<html lang="ja">

<?php require_once (doc_root('/view/layout/head.php')); ?>

<body>
	<?php require_once (doc_root('/view/layout/header.php')); ?>

	<div class="container">
		<div class="row">
			<div class="col col-md-12">
				<div class="jumbotron">
					<h1 class="text-center">ようこそ！<?php echo h(BRAND_NAME); ?>へ！</h1>
					<p class="text-center"><?php echo h(BRAND_NAME); ?>はアナログイラストファンのための売買サービスです。</p>
					<?php if (! $user): ?>
					<p class="text-center"><a href="<?php echo h(root_url('/auth/signup_index.php')); ?>">新規登録はこちら</a></p>
					<?php endif; ?>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">New Arrival</div>
					<div class="panel-body">
						<ul class="list-inline">
							<?php for ($i=0; $i<$list; $i++): ?>
							<li class="li-padding">
								<div class="thumb-box">
									<div class="thumb">
										<a href="<?php echo h(root_url("/illustrations/display/display.php?id={$image[$i]->getId()}")); ?>">
											<img src="<?php echo h(root_url("/illustrations/display/image_view.php?filename={$image[$i]->getFilenameThumb()}&mime={$image[$i]->getMime()}&user_id={$image[$i]->getUserId()}")); ?>" width="<?php echo h($new_w[$i]); ?>" height="<?php echo h($new_h[$i]); ?>">
										</a>
									</div>
									<div class="thumb-name">
										<p><?php echo h($image[$i]->getName()); ?></p>
									</div>
								</div>
							</li>
							<?php endfor; ?>
						</ul>
						
						<?php if ($count === $limit): ?>
						<div class="pull-right">
							<a href="<?php echo h(root_url('/illustrations/display/new_arrival.php')); ?>">もっと見る</a>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once (doc_root('/view/layout/footer.php')); ?>

</body>
</html>