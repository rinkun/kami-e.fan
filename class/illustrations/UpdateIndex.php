<?php

// ▼ classファイルを読み込む
require_once(doc_root('/class/IllustrationsModel.php'));
require_once(doc_root('/class/Image.php'));

class UpdateIndex
{
	private $model = null;
	
	public function __construct($dsn, $db_user, $db_password)
	{
		$this->model = new IllustrationsModel($dsn, $db_user, $db_password);
	}
	
	public function execute()
	{
		// ▼ セッションからユーザー情報を取得
		$user = set_user();
		
		// ▼ ログインしていなければログインページへリダイレクト
		is_authenticated($user);
		
		// ▼ URLパラメータをチェック
		if (! isset($_GET['id']) || ! ctype_digit($_GET['id'])) {
			throw new IllegalAccessException('申し訳ありません。指定されたイラストが見つかりません。');
		}
		$id = (int)$_GET['id'];
	
		// ▼ イラストIDをキーにイラストを絞り込む
		$rec = $this->model->findById($id);
		
		// ▼ 絞り込んだuser_idとセッションのuser_idが一致しなければエラー
		if ($rec['user_id'] !== $user['id']) {
			throw new IllegalUserException('エラーが発生しました。もう一度やり直して下さい。');
		}
		
		// ▼ imageオブジェクトを生成
		$image = new Image($rec);
		list($w, $h) = $image->getImageSize($image->getFilenameThumb());
		$max_w = 450;
		$max_h = 450;
		list($new_w, $new_h) = $image->getNewImageSize($w, $h, $max_w, $max_h);
		
		// ▼ 変数初期化
		$input_title = (isset($_SESSION['update_illust']['input_title'])) ? $_SESSION['update_illust']['input_title'] : $rec['title'];
		$input_price = (isset($_SESSION['update_illust']['input_price'])) ? $_SESSION['update_illust']['input_price'] : $rec['price'];
		$err_msg = (isset($_SESSION['update_illust']['err_msg'])) ? $_SESSION['update_illust']['err_msg'] : array();
		unset($_SESSION['update_illust']);

		// ▼ 現日時を取得
		$date = new DateTime();
		
		// ▼ CSRF対策　tokenをセット
		$token = set_token();

		// ▼ ページタイトルは必ず定義
		$page_title = "編集ページ | イラストID: {$rec['id']}"; 

		// ▼ viewファイル呼び出し
		require_once (doc_root('/view/illustrations/admin/update_index_view.php'));
	}
}