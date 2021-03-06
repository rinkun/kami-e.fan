<!DOCTYPE html>
<html lang="ja">

<?php require_once (doc_root('/view/layout/head.php')); ?>

<body>
	<?php require_once (doc_root('/view/layout/header.php')); ?>

	<div class="container">
		<div class="row">
			<div class="col col-md-3">
				<?php require_once (doc_root('/view/layout/left_nav.php')); ?>
			</div>
			<div class="col col-md-9">
				<?php if ($count > 0): ?>
				
				<h2><?php echo h($user['name']); ?>さんのイラスト一覧</h2>
				<hr>
				<div class="list-group">
					<?php for ($i=0; $i<$count; $i++): ?>
					<div class="list-group-item">
						<div class="admin-list-box">
							<div class="admin-list-image thumb">
								<a href="<?php echo h(root_url("/illustrations/display/display.php?id={$image[$i]->getId()}")); ?>">
									<img src="<?php echo h(root_url("/illustrations/display/image_view.php?filename={$image[$i]->getFilenameThumb()}&mime={$image[$i]->getMime()}&user_id={$image[$i]->getUserId()}")); ?>" width="<?php echo h($new_w[$i]); ?>" height="<?php echo h($new_h[$i]); ?>">
								</a>
							</div>
							<div class="admin-list-text">
								<ul class="list-unstyled">
									<li>ID: <?php echo h($image[$i]->getId()); ?></li>
									<li>タイトル: <a href="<?php echo h(root_url("/illustrations/display/display.php?id={$image[$i]->getId()}")); ?>"><?php echo h($image[$i]->getTitle()); ?></a></li>
									<li>価格: <?php echo h($image[$i]->getPrice()); ?>円</li>
									<li>登録日: <?php echo h($image[$i]->getCreatedAt()); ?></li>
									<li><a href="<?php echo h(root_url('/illustrations/admin/update_index.php?id=' . $image[$i]->getId())); ?>">【編集】</a></li>
									<li><a href="<?php echo h(root_url('/illustrations/admin/delete_action.php?id=' . $image[$i]->getId())); ?>">【削除】</a></li>
								</ul>
							</div>
						</div>
					</div>
					<?php endfor; ?>
				</div>
				
				<?php else: ?>
				
				<p>イラストはまだ投稿されておりません。</p>
				
				<?php endif; ?>
			</div>
		</div>
	</div>

	<?php require_once (doc_root('/view/layout/footer.php')); ?>

</body>
</html>