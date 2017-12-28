<?PHP
function getKintoneRecode ( $API_TOKEN,$SUB_DOMAIN,$APP_NO){
	// 自分のkintoneの設定
	define("API_TOKEN", $API_TOKEN); 
	define("SUB_DOMAIN",$SUB_DOMAIN); 
	define("APP_NO", $APP_NO); 
	//サーバ送信するHTTPヘッダを設定
	$options = array(
	    'http'=>array(
	        'method'=>'GET',
	        'header'=> "X-Cybozu-API-Token:". API_TOKEN ."\r\n"
	    )
	);
	//コンテキストを生成
	$context = stream_context_create( $options );
	// サーバに接続してデータを貰う
	$contents = file_get_contents( 'https://'. SUB_DOMAIN .'.cybozu.com/k/v1/records.json?app='. APP_NO , FALSE, $context );
	return $contents;
}
?>