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
              <svg class="svg_logo_white logo logo_on_black" width="78" height="75" viewBox="0 0 432 412" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1510_4239)">
                  <path d="M1.00148 2.42476L1.00156 2.42473L1.00459 2.43329C2.86629 7.68594 22.9258 57.4353 42.5966 105.896C52.4298 130.12 62.1629 154.016 69.471 171.855C73.1251 180.774 76.1726 188.179 78.3232 193.353C79.3985 195.941 80.2491 197.97 80.8388 199.351C81.0613 199.872 81.246 200.299 81.3914 200.629C81.406 200.6 81.421 200.57 81.4363 200.54C81.7262 199.96 82.1239 199.104 82.6153 198.004C83.5973 195.806 84.9434 192.66 86.5305 188.874C89.7042 181.302 93.8365 171.179 97.9361 160.981C102.036 150.782 106.101 140.509 109.142 132.637C110.662 128.7 111.926 125.366 112.808 122.943C113.25 121.73 113.595 120.75 113.829 120.036C113.946 119.679 114.034 119.394 114.092 119.183C114.146 118.986 114.162 118.895 114.166 118.872C114.164 118.862 114.16 118.837 114.15 118.793C114.133 118.721 114.106 118.621 114.068 118.492C113.993 118.236 113.879 117.883 113.728 117.437C113.425 116.546 112.976 115.3 112.398 113.736C111.241 110.611 109.567 106.231 107.501 100.915C103.368 90.284 97.6691 75.9193 91.403 60.3874C84.4185 43.0748 78.0572 27.2581 73.724 16.4839C70.3249 8.03247 68.1737 2.68372 67.9484 2.14948C67.9416 2.14465 67.8795 2.07832 67.6428 1.98651C67.3656 1.87897 66.9416 1.77162 66.3328 1.67067C65.1194 1.46945 63.2645 1.30792 60.5933 1.18311C55.2566 0.933716 46.7342 0.833649 33.7333 0.833649C17.7895 0.833649 9.31225 0.867294 4.9172 1.16583C3.82078 1.24031 2.99118 1.33054 2.36948 1.43828C1.74005 1.54738 1.3594 1.66879 1.13752 1.78723C0.932855 1.8965 0.916966 1.97192 0.912456 1.99335L0.912312 1.99402C0.899651 2.0538 0.907346 2.17372 1.00148 2.42476Z" stroke="white"/>
                  <path d="M241.132 106.283L248.573 124.572L250.217 121.182L250.219 121.177C251.408 118.8 259.13 100.029 267.403 79.4801L282.262 42.3317L274.068 21.4505L274.068 21.4495L265.927 0.833466H232.133H198.337L117.13 200.788C96.3354 252.061 77.0452 299.543 62.2443 335.976C45.2503 377.807 34.1745 405.07 33.5348 406.776L33.5315 406.785L33.5278 406.793L31.418 411.833H65.0666L98.9961 411.701L164.87 249.479C183.003 204.745 199.57 164.078 211.654 134.594C217.696 119.852 222.617 107.905 226.053 99.6436C227.771 95.513 229.118 92.3024 230.048 90.1238C230.513 89.035 230.875 88.2016 231.128 87.6393C231.254 87.3589 231.354 87.1414 231.428 86.9919C231.444 86.9587 231.46 86.9272 231.475 86.898C231.494 86.8625 231.511 86.8303 231.527 86.8026C231.541 86.7793 231.561 86.7454 231.586 86.7122C231.598 86.6971 231.622 86.6655 231.658 86.6328C231.677 86.6164 231.725 86.5817 231.755 86.5637C231.802 86.5407 231.924 86.5059 232 86.5002C232.208 86.5002 232.345 86.6216 232.374 86.6464C232.428 86.693 232.474 86.7459 232.508 86.7899C232.58 86.8806 232.658 87 232.74 87.135C232.906 87.409 233.118 87.8027 233.369 88.2968C233.872 89.288 234.546 90.7167 235.339 92.4782C236.926 96.0024 238.995 100.876 241.131 106.282C241.131 106.282 241.131 106.283 241.132 106.283Z" stroke="white"/>
                  <path d="M199.893 326.436C199.739 326.442 199.602 326.379 199.508 326.282C199.429 326.201 199.357 326.089 199.3 325.995C199.234 325.885 199.158 325.747 199.073 325.584C198.903 325.259 198.689 324.817 198.436 324.276C197.931 323.192 197.266 321.691 196.49 319.88C194.939 316.259 192.937 311.389 190.869 306.12C188.737 300.923 186.772 296.227 185.324 292.847C184.599 291.156 184.005 289.798 183.584 288.871C183.503 288.693 183.429 288.532 183.362 288.388C183.359 288.394 183.356 288.401 183.353 288.407C183.1 288.989 182.741 289.832 182.288 290.91C181.383 293.067 180.104 296.157 178.546 299.957C175.43 307.555 171.197 317.987 166.597 329.453L166.597 329.454L149.872 370.868L158.064 391.481L158.065 391.482L166.205 411.833H200.133H234.061L237.269 403.749L237.271 403.743C237.871 402.287 242.147 391.756 249.139 374.537C263.906 338.173 290.786 271.978 320.737 198.412C342.804 144.145 362.837 94.7788 377.353 58.9457C384.612 41.0291 390.491 26.4961 394.555 16.4255C396.587 11.3902 398.166 7.47079 399.236 4.80203C399.771 3.46756 400.179 2.44632 400.453 1.75479C400.527 1.56866 400.591 1.40674 400.645 1.2692C400.631 1.26816 400.617 1.26712 400.602 1.26605C400.156 1.23389 399.491 1.20184 398.628 1.17065C396.904 1.10834 394.407 1.05005 391.325 1.00006C385.162 0.900116 376.665 0.833466 367.333 0.833466H333.67L332.066 4.78137C332.066 4.78232 332.065 4.78329 332.065 4.78427C331.107 7.24445 301.247 80.694 265.663 168.121C247.93 211.856 231.696 251.49 219.845 280.125C213.92 294.442 209.09 306.01 205.717 313.966C204.03 317.944 202.706 321.021 201.791 323.087C201.334 324.12 200.977 324.905 200.727 325.425C200.603 325.683 200.501 325.885 200.424 326.021C200.388 326.085 200.346 326.155 200.303 326.211C200.287 326.232 200.239 326.294 200.163 326.346C200.128 326.37 200.032 326.43 199.893 326.436Z" stroke="white"/>
                  <path d="M431.12 410.075L431.119 410.071C431.12 410.074 431.117 410.062 431.104 410.026C431.092 409.993 431.076 409.949 431.055 409.893C431.013 409.782 430.954 409.628 430.879 409.433C430.727 409.042 430.51 408.489 430.231 407.783C429.673 406.372 428.87 404.355 427.854 401.814C425.822 396.733 422.942 389.559 419.482 380.955C412.561 363.75 403.32 340.829 393.903 317.504C375.073 270.863 355.546 222.611 352.474 215.197C352.473 215.195 352.472 215.193 352.471 215.192L350.936 211.712L349.128 215.86C349.128 215.861 349.127 215.862 349.127 215.863C338.461 241.395 330.528 260.459 325.263 273.29C322.629 279.706 320.664 284.562 319.357 287.887C318.703 289.55 318.216 290.828 317.892 291.725C317.73 292.174 317.611 292.522 317.533 292.775C317.494 292.901 317.467 292.998 317.45 293.068C317.444 293.091 317.441 293.108 317.438 293.121C317.44 293.13 317.443 293.141 317.447 293.154C317.464 293.219 317.492 293.311 317.532 293.434C317.611 293.677 317.73 294.021 317.888 294.461C318.203 295.34 318.67 296.591 319.272 298.175C320.475 301.341 322.216 305.826 324.365 311.301C328.665 322.249 334.597 337.148 341.13 353.346L364.87 411.833H398.4C414.211 411.833 422.654 411.8 427.064 411.485C428.165 411.406 429.001 411.311 429.631 411.197C430.269 411.082 430.663 410.953 430.9 410.825C431.123 410.704 431.164 410.609 431.178 410.556C431.201 410.474 431.197 410.336 431.12 410.075Z" stroke="white"/>
                </g>
                <defs>
                  <clipPath id="clip0_1510_4239">
                    <rect width="432" height="412" fill="white"/>
                  </clipPath>
                </defs>
              </svg>

              <svg class="svg_logo_black logo logo_on_white" width="78" height="75" viewBox="0 0 432 412" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g clip-path="url(#clip0_1510_4233)">
                  <path d="M1.00148 2.42476L1.00156 2.42473L1.00459 2.43329C2.86629 7.68594 22.9258 57.4353 42.5966 105.896C52.4298 130.12 62.1629 154.016 69.471 171.855C73.1251 180.774 76.1726 188.179 78.3232 193.353C79.3985 195.941 80.2491 197.97 80.8388 199.351C81.0613 199.872 81.246 200.299 81.3914 200.629C81.406 200.6 81.421 200.57 81.4363 200.54C81.7262 199.96 82.1239 199.104 82.6153 198.004C83.5973 195.806 84.9434 192.66 86.5305 188.874C89.7042 181.302 93.8365 171.179 97.9361 160.981C102.036 150.782 106.101 140.509 109.142 132.637C110.662 128.7 111.926 125.366 112.808 122.943C113.25 121.73 113.595 120.75 113.829 120.036C113.946 119.679 114.034 119.394 114.092 119.183C114.146 118.986 114.162 118.895 114.166 118.872C114.164 118.862 114.16 118.837 114.15 118.793C114.133 118.721 114.106 118.621 114.068 118.492C113.993 118.236 113.879 117.883 113.728 117.437C113.425 116.546 112.976 115.3 112.398 113.736C111.241 110.611 109.567 106.231 107.501 100.915C103.368 90.284 97.6691 75.9193 91.403 60.3874C84.4185 43.0748 78.0572 27.2581 73.724 16.4839C70.3249 8.03247 68.1737 2.68372 67.9484 2.14948C67.9416 2.14465 67.8795 2.07832 67.6428 1.98651C67.3656 1.87897 66.9416 1.77162 66.3328 1.67067C65.1194 1.46945 63.2645 1.30792 60.5933 1.18311C55.2566 0.933716 46.7342 0.833649 33.7333 0.833649C17.7895 0.833649 9.31225 0.867294 4.9172 1.16583C3.82078 1.24031 2.99118 1.33054 2.36948 1.43828C1.74005 1.54738 1.3594 1.66879 1.13752 1.78723C0.932855 1.8965 0.916966 1.97192 0.912456 1.99335L0.912312 1.99402C0.899651 2.0538 0.907346 2.17372 1.00148 2.42476Z" stroke="black"/>
                  <path d="M241.132 106.283L248.573 124.572L250.217 121.182L250.219 121.177C251.408 118.8 259.13 100.029 267.403 79.4801L282.262 42.3317L274.068 21.4505L274.068 21.4495L265.927 0.833466H232.133H198.337L117.13 200.788C96.3354 252.061 77.0452 299.543 62.2443 335.976C45.2503 377.807 34.1745 405.07 33.5348 406.776L33.5315 406.785L33.5278 406.793L31.418 411.833H65.0666L98.9961 411.701L164.87 249.479C183.003 204.745 199.57 164.078 211.654 134.594C217.696 119.852 222.617 107.905 226.053 99.6436C227.771 95.513 229.118 92.3024 230.048 90.1238C230.513 89.035 230.875 88.2016 231.128 87.6393C231.254 87.3589 231.354 87.1414 231.428 86.9919C231.444 86.9587 231.46 86.9272 231.475 86.898C231.494 86.8625 231.511 86.8303 231.527 86.8026C231.541 86.7793 231.561 86.7454 231.586 86.7122C231.598 86.6971 231.622 86.6655 231.658 86.6328C231.677 86.6164 231.725 86.5817 231.755 86.5637C231.802 86.5407 231.924 86.5059 232 86.5002C232.208 86.5002 232.345 86.6216 232.374 86.6464C232.428 86.693 232.474 86.7459 232.508 86.7899C232.58 86.8806 232.658 87 232.74 87.135C232.906 87.409 233.118 87.8027 233.369 88.2968C233.872 89.288 234.546 90.7167 235.339 92.4782C236.926 96.0024 238.995 100.876 241.131 106.282C241.131 106.282 241.131 106.283 241.132 106.283Z" stroke="black"/>
                  <path d="M199.893 326.436C199.739 326.442 199.602 326.379 199.508 326.282C199.429 326.201 199.357 326.089 199.3 325.995C199.234 325.885 199.158 325.747 199.073 325.584C198.903 325.259 198.689 324.817 198.436 324.276C197.931 323.192 197.266 321.691 196.49 319.88C194.939 316.259 192.937 311.389 190.869 306.12C188.737 300.923 186.772 296.227 185.324 292.847C184.599 291.156 184.005 289.798 183.584 288.871C183.503 288.693 183.429 288.532 183.362 288.388C183.359 288.394 183.356 288.401 183.353 288.407C183.1 288.989 182.741 289.832 182.288 290.91C181.383 293.067 180.104 296.157 178.546 299.957C175.43 307.555 171.197 317.987 166.597 329.453L166.597 329.454L149.872 370.868L158.064 391.481L158.065 391.482L166.205 411.833H200.133H234.061L237.269 403.749L237.271 403.743C237.871 402.287 242.147 391.756 249.139 374.537C263.906 338.173 290.786 271.978 320.737 198.412C342.804 144.145 362.837 94.7788 377.353 58.9457C384.612 41.0291 390.491 26.4961 394.555 16.4255C396.587 11.3902 398.166 7.47079 399.236 4.80203C399.771 3.46756 400.179 2.44632 400.453 1.75479C400.527 1.56866 400.591 1.40674 400.645 1.2692C400.631 1.26816 400.617 1.26712 400.602 1.26605C400.156 1.23389 399.491 1.20184 398.628 1.17065C396.904 1.10834 394.407 1.05005 391.325 1.00006C385.162 0.900116 376.665 0.833466 367.333 0.833466H333.67L332.066 4.78137C332.066 4.78232 332.065 4.78329 332.065 4.78427C331.107 7.24445 301.247 80.694 265.663 168.121C247.93 211.856 231.696 251.49 219.845 280.125C213.92 294.442 209.09 306.01 205.717 313.966C204.03 317.944 202.706 321.021 201.791 323.087C201.334 324.12 200.977 324.905 200.727 325.425C200.603 325.683 200.501 325.885 200.424 326.021C200.388 326.085 200.346 326.155 200.303 326.211C200.287 326.232 200.239 326.294 200.163 326.346C200.128 326.37 200.032 326.43 199.893 326.436Z" stroke="black"/>
                  <path d="M431.12 410.075L431.119 410.071C431.12 410.074 431.117 410.062 431.104 410.026C431.092 409.993 431.076 409.949 431.055 409.893C431.013 409.782 430.954 409.628 430.879 409.433C430.727 409.042 430.51 408.489 430.231 407.783C429.673 406.372 428.87 404.355 427.854 401.814C425.822 396.733 422.942 389.559 419.482 380.955C412.561 363.75 403.32 340.829 393.903 317.504C375.073 270.863 355.546 222.611 352.474 215.197C352.473 215.195 352.472 215.193 352.471 215.192L350.936 211.712L349.128 215.86C349.128 215.861 349.127 215.862 349.127 215.863C338.461 241.395 330.528 260.459 325.263 273.29C322.629 279.706 320.664 284.562 319.357 287.887C318.703 289.55 318.216 290.828 317.892 291.725C317.73 292.174 317.611 292.522 317.533 292.775C317.494 292.901 317.467 292.998 317.45 293.068C317.444 293.091 317.441 293.108 317.438 293.121C317.44 293.13 317.443 293.141 317.447 293.154C317.464 293.219 317.492 293.311 317.532 293.434C317.611 293.677 317.73 294.021 317.888 294.461C318.203 295.34 318.67 296.591 319.272 298.175C320.475 301.341 322.216 305.826 324.365 311.301C328.665 322.249 334.597 337.148 341.13 353.346L364.87 411.833H398.4C414.211 411.833 422.654 411.8 427.064 411.485C428.165 411.406 429.001 411.311 429.631 411.197C430.269 411.082 430.663 410.953 430.9 410.825C431.123 410.704 431.164 410.609 431.178 410.556C431.201 410.474 431.197 410.336 431.12 410.075Z" stroke="black"/>
                </g>
                <defs>
                  <clipPath id="clip0_1510_4233">
                    <rect width="432" height="412" fill="white"/>
                  </clipPath>
                </defs>
              </svg>


              <!-- <img class="logo logo_on_black" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_on_black.png" alt="" />
              <img class="logo logo_on_white" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo_on_white.png" alt="" /> -->
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



