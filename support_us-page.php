<?php
/*
Template Name: Шаблон Поддержи нас
Template Post Type: post, page, product
*/
set_query_var( 'title', 'Support us page' );
get_header();

$isEnglish = $_GET['lang'] === 'en';

if ($isEnglish) {
  $pageTitle = 'Support us';
  $pageDescription = 'Your support will help the development of our projects. We will be grateful for any amount, and every ruble will go to the great theatrical art.';
  $donation = 'Donate';
} else {
  $pageTitle = 'Поддержать нас';
  $pageDescription = 'Ваша поддержка поможет развитию наших проектов. Мы будем благодарны любой сумме, и каждый рубль пойдет на великое театральное искусство.';
  $donation = 'Донатить';
}

$donateLink = get_option('support_donate');

$donateId = get_option('support_qr');

$donateImgId = $donateId;
$donateImageAttr = wp_get_attachment_image_src($donateImgId, 'full');
$donateImageSrc = $donateImageAttr[0];

?>


 <!----------------------------------------------------------- SUPPORT-US MAIN BLOCK ---------------------------------------------------------------------------------------->

 <div class="support_us_container">
          <div class="content_in_support_us">
            <div class="about_support">
              <h2 class="title_on_support_us_page"><? echo $pageTitle; ?></h2>
              <p class="support_us_description"><? echo $pageDescription; ?></p>
            </div>

            <a target="_blank" href="<? echo $donateLink; ?>" class="buy_ticket donate_btn"><? echo $donation; ?></a>

            <img class="qr_code" src="<?php echo $donateImageSrc; ?>" alt="" />
          </div>
        </div>
        <img
        class="support_us_bg_img"
        src="<?php echo get_template_directory_uri(); ?>/assets/img/support_us_img.png"
        alt=""
      />

<? get_footer(); ?>