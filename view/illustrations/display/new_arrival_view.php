<!DOCTYPE html>
<html lang="ja">

<?php require_once (doc_root('/view/layout/head.php')); ?>

<body>
	<?php require_once (doc_root('/view/layout/header.php')); ?>

	<div class="container">
		<div class="row">
			<div class="col col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">New Arrival</div>
					<div class="panel-body">
						<ul class="list-inline">
							<?php for ($i=0; $i<$count; $i++): ?>
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
						<div>
							<ul class="pagination pagination-sm image-list-padding">
								<li>
									<a href="<?php echo h(root_url('/illustrations/display/new_arrival.php?page=' . $pager->getPrev())); ?>">&laquo;</a>
								</li>
								<?php for ($i=$pager->getFirstPage(); $i<=$pager->getLastPage(); $i++): ?>
									<li class="<?php echo ($pager->getCurrentPage() === $i) ? h($pager->getActive()) : ''; ?>">
										<a href="<?php echo h(root_url('/illustrations/display/new_arrival.php?page=' . $i)); ?>"><?php echo h($i); ?></a>
									</li>
								<?php endfor; ?>
								<li>
									<a href="<?php echo h(root_url('/illustrations/display/new_arrival.php?page=' . $pager->getNext())); ?>">&raquo;</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once (doc_root('/view/layout/footer.php')); ?>

</body>
</html>