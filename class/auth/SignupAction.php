<?php

// ▼ classファイルを読み込む
require_once(doc_root('/class/UsersModel.php'));

class SignupAction
{
	private $model = null;
	
	public function __construct($dsn, $db_user, $db_password)
	{
		$this->model = new UsersModel($dsn, $db_user, $db_password);
	}
	
	public function execute()
	{
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	
			// ▼ $_POSTをエスケープ処理
			$posts = h_array($_POST);
	
			// ▼ Tokenをチェック
			check_token($posts['token']);
			
			$_SESSION['signup']['flg'] = true;
			$_SESSION['signup']['err_msg'] = array();
			$_SESSION['signup']['input_name'] = '';
			$_SESSION['signup']['input_email'] = '';
			
			// ▼ 入力値チェック　Name
			$posts['name'] = mb_ereg_replace('\A(\s)+|(\s)+\z', '', $posts['name']); // 前後のスペースは削除
			$name_max_len = 30;
			$len = mb_strlen($posts['name']); // 文字数取得
			if (! $len) {
				throw new InvalidValueException('名前を入力して下さい！');
			}
			
			if ($len > $name_max_len) {
				throw new InvalidValueException('名前は{$name_max_len}文字までです。');
			}
			
			// ▼ 入力値チェック　Email
			$posts['email'] = mb_ereg_replace('\A(\s)+|(\s)+\z', '', $posts['email']); // 前後のスペースは削除
			$email_max_len = 50;
			$len = mb_strlen($posts['email']); // 文字数取得
			if (! filter_var($posts['email'], FILTER_VALIDATE_EMAIL) || ! $len)
			{
				throw new InvalidValueException('メールアドレスを入力して下さい！');
			}
			
			if ($len > $email_max_len) {
				throw new InvalidValueException('メールアドレスが長すぎます。');
			}
			
			// ▼ POSTで渡されたEmailが登録済みか確認
			$res = $this->model->exsistEmail($posts['email']);
			if (! $res) {
				throw new AlreadyExistsException('このメールアドレスはすでに登録されています。');
			}
			
			// ▼ 入力値チェック　Password
			$posts['password'] = mb_ereg_replace('\A(\s)+|(\s)+\z', '', $posts['password']); // 前後のスペースは削除
			if (! is_match_pattern_password($posts['password'])) {
				throw new InvalidValueException('もう一度パスワードを設定して下さい。');
			}
			
			// ▼ POSTで渡されたパスワードをハッシュ化
			$hash_password = crypt_password($posts['password']);
			$regist_flg = 0;
			$activation_key = md5(uniqid(mt_rand(), true));
			
			// ▼ ユーザーを登録
			$this->model->registUser($posts['name'], $posts['email'], $hash_password, $regist_flg, $activation_key);

			// ▼ ログイン画面へリダイレクト
			redirect('/auth/login_index.php?');
		} else {
			throw new IllegalPostAccessException('不正なアクセスが行われました。');
		}
	}
}