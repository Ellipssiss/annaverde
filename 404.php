<?php
/*
Template Name: Шаблон 404
*/
set_query_var('title', 'Error 404');

$args = array(
	'theme_location' => 'header_menu',
	'walker' => new True_Walker_Nav_Menu(), // этот параметр нужно добавить
	// 'menu' => 'main',
	'menu_class' => 'header_nav',
	'container' => false,
	// 'item_class' => 'header_nav_link',
	'menu-item' => 'header_nav_link',
	'items_wrap' => '<div class="header_nav">%3$s</div>',
	'item_wrap' => '<a class="header_nav_link>%3$s</a>',
  );
  $args_b = array(
	'theme_location' => 'burger_menu',
	'walker' => new True_Walker_Nav_Menu(), // этот параметр нужно добавить
	// 'menu' => 'main',
	'menu_class' => 'burger_nav',
	'container' => false,
	// 'item_class' => 'burger_nav_link',
	'menu-item' => 'burger_nav_link',
	'items_wrap' => '<div class="burger_nav">%3$s</div>',
	'item_wrap' => '<a class="burger_nav_link>%3$s</a>',
  );
  
  $isEnglish = $_GET['lang'] === 'en';
  $langBtnName = '';
  $parseUrl = parse_url($_SERVER["REQUEST_URI"]);
  parse_str($parseUrl['query'], $output);
  
  if (!array_key_exists('lang', $output)) {
	$switchLang = 'ENG';
  
	$output['lang'] = 'en';
  } else {
	$switchLang = 'RU';
	unset($output['lang']);
  }
  $langUrl = '?' . http_build_query($output);

// get_header();
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.carousel.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/owl.theme.default.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><? echo $title; ?></title>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/owl.carousel.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/script.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/assets/js/easy-toggler.min.js"></script>

  <?php wp_head(); ?>
</head>

<body>
  <?php wp_body_open(); ?>
  <!----------------------------- BURGER MENU ---------------------------------------------------->
  <div class="burger_menu_bg">
    <div class="item_bg_burger_menu"></div>
    <div class="burger_menu_container">
      <div class="burger_menu_wrapper">
        <div class="lang_and_exit_btns">
          <a class="language_btn burger_menu" href="<? echo $langUrl ?>"><? echo $switchLang ?></a>
          <img class="exit_burger_menu_btn small" src="<?php echo get_template_directory_uri(); ?>/assets/img/Burger_menu_exit_btn_small.svg" alt="" />
          <img class="exit_burger_menu_btn average" src="<?php echo get_template_directory_uri(); ?>/assets/img/Burger_menu_exit_btn_average.svg" alt="" />
          <img class="exit_burger_menu_btn big" src="<?php echo get_template_directory_uri(); ?>/assets/img/Burger_menu_exit_btn_big.svg" alt="" />
        </div>
        <? wp_nav_menu($args_b) ?>
        </nav>
      </div>
    </div>
  </div>
  <div class="page_wrapper">
    <div class="page">
      <!----------------------------- HEADER --------------------------------------------------------->
            
      <header class="header black_header">
        <div class="header_container">
          <div class="header_inner">
            <a href="/">
              <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_on_black.png" alt="" />
              <img class="logo" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_on_white.png" alt="" />
            </a>
            <div class="menu_and_language">
              <? wp_nav_menu($args) ?>
              <a class="language_btn" href="<? echo $langUrl ?>"><? echo $switchLang ?></a>
            </div>
            <img class="burger_btn" src="<?php echo get_template_directory_uri(); ?>/assets/img/burger_btn_white.svg" alt="burger" style="vertical-align: middle" />
            <img class="burger_btn" src="<?php echo get_template_directory_uri(); ?>/assets/img/burger_btn_black.svg" alt="burger" style="vertical-align: middle" />
          </div>
          <div class="name_and_about_on_main_photo">
            <p class="name_on_main_photo">Анна Верде</p>
            <p class="about_person_on_main_photo">
              Хореограф, режиссер, продюсер независимых театральных проектов.
              Основатель и руководитель театра танца Averdera.
            </p>
          </div>
          <blockquote class="blockquote_on_main_photo">
            «Мыслю образами, вкладываю многослойные смыслы, ищу новые формы»
          </blockquote>
        </div>
        <!-- /.header_container -->
        <img class="main_photo" src="<?php echo get_template_directory_uri(); ?>/assets/img/kluchitsi.png" align="top" alt="" />
        <!-- NEW -->
      </header>


            <!-------------------------------------------------- MAIN content -------------------------------------------------------------------->
			<div class="bad_getaway_bg_wrapper"> 
				<div class="content_in_bad_getaway">
					<h2 class="title_on_bad_gateway_page">Страница не загрузилась</h2>
					<p class="bad_gateway_description">
						Перезагрузите страницу или вернитесь на главную, нажав на логотип
					</p>
				</div>

				<img
					class="bad_getaway_bg_img"
					src="<?php echo get_template_directory_uri(); ?>/assets/img/bad_getawey_bg_img.jpeg"
					alt=""
				/>
			</div>
	

<? get_footer(); ?>



