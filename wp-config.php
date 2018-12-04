<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define('DB_NAME', 'wonder');

/** Username của database */
define('DB_USER', 'root');

/** Mật khẩu của database */
define('DB_PASSWORD', '');

/** Hostname của database */
define('DB_HOST', 'localhost');

/** Database charset sử dụng để tạo bảng database. */
define('DB_CHARSET', 'utf8mb4');

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'e{yjWzI7;@S Od#[<_2?Qa(b)j*-`D9cb:Qq tl&2xi~9q^H;m8lDiOLyN*dW&fK');
define('SECURE_AUTH_KEY',  '^PBgPe6ytQtI54o=06kXk=!9@S%##uM~j;#6}Xsh,Q+bPkVu!4Y~hL )MO=2AAcW');
define('LOGGED_IN_KEY',    'sA>,,_e;>XSz/c~)@|!bg!?cpOp~uC~sQdp5*a<(B1M1eYqZx(#Vx`(uYzg1$^.9');
define('NONCE_KEY',        'CVZ?+.]Qfns=2w*oYyO4oG$_ugA@FX1E?y!%,}Aj67?IiSVfPLP$uuq9.yOj@qk{');
define('AUTH_SALT',        'T2i=KQjyGr& vqRu:>a,1hRTPC!<ZkZIIk9nq&Zo}p=8u!ab5P.hBpn/PZ7F4+6/');
define('SECURE_AUTH_SALT', '4{-v/F1Y=jh{X-iLy~{0-9nIK:HPXRx+87tz]hfb$!,%H@nqs{*_A*MjqId8/};{');
define('LOGGED_IN_SALT',   '3dt.,3N#6qT2Hn(cMORU/Cl^Z%n7%Gs~H!y>IydRKb3Ro{&W]?#})1mXV;}${A,g');
define('NONCE_SALT',       'OHix&/^>7koi(QDW]/l>:9eZI%YM^)Gm/oCkv%A5g~u}N;${W+1|`(bok$N;PL<l');

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wd_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
