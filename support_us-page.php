<?php
/*
Template Name: Шаблон Поддержи нас
Template Post Type: post, page, product
*/
set_query_var( 'title', 'Support us page' );
get_header();

$arResult = getProjectPosts();
$posts = $arResult['posts'];
$postCount = $arResult['count'];
?>


 <!----------------------------------------------------------- SUPPORT-US MAIN BLOCK ---------------------------------------------------------------------------------------->

 <div class="support_us_container">
          <div class="content_in_support_us">
            <div class="about_support">
              <h2 class="title_on_support_us_page">Поддержать нас</h2>
              <p class="support_us_description">
                Ваша поддержка поможет развитию наших проектов. Мы будем
                благодарны любой сумме, и каждый рубль пойдет на великое
                театральное искусство.
              </p>
            </div>

            <button class="buy_ticket donate_btn">Донатить</button>

            <img class="qr_code" src="/wp-content/themes/my_theme/assets/img/qr_code.png" alt="" />
          </div>
        </div>
        <img
        class="support_us_bg_img"
        src="/wp-content/themes/my_theme/assets/img/support_us_img.png"
        alt=""
      />

<? get_footer(); ?>