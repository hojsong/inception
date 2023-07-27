<?php
// 워드프레스 데이터베이스 연결 정보
define( 'DB_NAME', getenv("WP_DB_NAME") );        // 데이터베이스 이름
define( 'DB_USER', getenv("MARIADB_USER") );      // 데이터베이스 사용자 이름
define( 'DB_PASSWORD', getenv("MARIADB_PWD") );   // 데이터베이스 사용자 비밀번호
define( 'DB_HOST', getenv("DB_HOST") );           // 데이터베이스 호스트 주소
define( 'DB_CHARSET', 'utf8' );                   // 데이터베이스 문자셋
define( 'DB_COLLATE', '' );                       // 데이터베이스 정렬

// 보안 키
define( 'AUTH_KEY',         'put your unique phrase here' );        // 인증 키
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );        // 보안 인증 키
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );        // 로그인 키
define( 'NONCE_KEY',        'put your unique phrase here' );        // 무작위 키
define( 'AUTH_SALT',        'put your unique phrase here' );        // 인증 솔트
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );        // 보안 인증 솔트
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );        // 로그인 솔트
define( 'NONCE_SALT',       'put your unique phrase here' );        // 무작위 솔트

$table_prefix = 'wp_';           // 워드프레스 데이터베이스 테이블 접두사

define( 'WP_DEBUG', true );       // 디버그 모드 활성화

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );   // 워드프레스 파일 디렉토리 절대 경로 설정
}

require_once ABSPATH . 'wp-settings.php';   // 워드프레스 설정 로드

// 이것을 사용하면 wordpress에서 이상이 생겨서인지 nginx에서도 error가 나온다.
// // 댓글을 자동으로 승인
// define('WP_POST_REVISIONS', false); // 이 줄은 이미 파일에 존재하는 경우 무시해도 됩니다.
// define('AUTOMATIC_UPDATER_DISABLED', true); // 이 줄은 이미 파일에 존재하는 경우 무시해도 됩니다.
// define('DISALLOW_FILE_EDIT', true); // 이 줄은 이미 파일에 존재하는 경우 무시해도 됩니다.

// // 아래 코드를 추가하여 댓글을 자동으로 승인합니다.
// function auto_approve_comments( $data ) {
//     $data['comment_approved'] = 1;
//     return $data;
// }
// add_filter( 'preprocess_comment', 'auto_approve_comments' );