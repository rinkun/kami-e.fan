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
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>タイトル</th>
						<th>価格</th>
						<th>登録日時</th>
						<th>ユーザー</th>
						<th>編集</th>
						<th>削除</th>
					</thead>
					<tbody>
						<caption>一覧</caption>
						<?php for ($i=0; $i<$count; $i++): ?>
						<tr>
							<td><?php echo h($rec[$i]['id']); ?></td>
							<td><?php echo h($rec[$i]['title']); ?></td>
							<td><?php echo h($rec[$i]['price']); ?></td>
							<td><?php echo h($rec[$i]['created_at']); ?></td>
							<td><?php echo h($rec[$i]['user_id']); ?></td>
							<td><a href="./update_illustration.php?id=<?php echo h($rec[$i]['id']); ?>">編集</a></td>
							<td><a href="./delete/delete_illustration.php?id=<?php echo h($rec[$i]['id']); ?>">削除</a></td>
						</tr>
						<?php endfor; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/common_html/footer.php'); ?>

</body>
</html>