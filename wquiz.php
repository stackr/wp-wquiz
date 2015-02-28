<?php
/*
 * Plugin Name: 떠블유퀴즈 플러그인
 * Plugin URI: http://wordpress.org/extend/plugins/hotpack/
 * Description: 떠블유퀴즈(wquiz.com) 서비스를 지원하는 플러그인입니다. 위젯과 쇼트코드를 사용하여 퀴즈를 사이트에 적용할 수 있습니다.
 * Author: Stackr Inc.
 * Version: 1.0
 * Author URI: http://stackr.co.kr
 * License: GPL2+
 * Text Domain: hotpack
 * Domain Path: /languages/
 */
require_once(dirname(__FILE__).'/includes/class.wquiz_widget.php');

if(class_exists('WQuiz_Widget')){
	add_action('widgets_init', 'wquiz_widget_init');
}


function wquiz_widget_init() {
	register_widget('WQuiz_Widget');
}
?>
