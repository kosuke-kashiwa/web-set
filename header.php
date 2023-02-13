<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gross_yui
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<meta name="keywords" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta http-equiv="X-UA-Compatible" content="chrome=1">
	<?php
	wp_head();
	?>
	<!-- googleフォント -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header">
		<div class="site-header-bland-wrapper">
			<div class="header_inner">
				<div class="site-header-bland">
					<a class="site-header-bland_heading" href="<?= home_url() ?>">
						<img src="<?= get_template_directory_uri() ?>/dist/img/front/header_logo.png" alt="">
						<p class="f-g">
							在宅看護センターグロース唯
						</p>
					</a>
				</div>
				<nav id="site-navigation" class="main-navigation">
					<div class="main-navigation-submenu">
						<div class="open_day_time">
							<p class="day">受付時間　月〜土曜日<span class="time">9:00-18:00</span></p>
							<p class="">緊急時は24時間365日訪問します</p>
						</div>
						<div class="tel">
							<img src="<?= get_template_directory_uri() ?>/img/" alt="電話のアイコン">
							<a href="tel:+"></a>
						</div>
						<div class="header_recruit_btn">
							<a href="<?=home_url('/'); ?>">
								<img src="<?= get_template_directory_uri() ?>/img/" alt="">
								採用情報
							</a>
						</div>
						<div class="header_contact_btn">
							<a href="<?=home_url('/'); ?>">
								<img src="<?= get_template_directory_uri() ?>/img/" alt="">
								お問い合わせ
							</a>
						</div>
					</div>
					<ul class="main-navigation-menu">
						<li><a href="<?=home_url('/'); ?>">ホーム</a></li>
						<li><a href="<?=home_url('/about/') ?>">グロース唯について</a></li>
						<li><a href="<?=home_url('/service/') ?>">サービス案内</a></li>
						<li><a href="<?=home_url('/company/') ?>">会社案内</a></li>
						<li><a href="<?=home_url('/news/') ?>">お知らせ</a></li>
						<li><a href="<?=home_url('/access/') ?>">アクセス</a></li>
					</ul>
				<a class="main-navigation-tell" href="tel:<?= get_option('tell_option') ?>"><i class="fas fa-phone-alt"></i>TEL<?= get_option('tell_option')?></a>
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->