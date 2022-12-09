<?php
/*
Template Name: Шаблон Контактов
Template Post Type: post, page, product
*/
set_query_var( 'title', 'Contacts page' );
get_header();

$isEnglish = $_GET['lang'] === 'en';

if ($isEnglish) {
  $pageTitle = 'Contacts';
  $pageDescription = 'If you have any questions about cooperation, write or call';
} else {
  $pageTitle = 'Контакты';
  $pageDescription = 'По вопросам сотрудничества пишите или звоните';
}

?>

<!---------------------------------------------- CONTACTS info --------------------------------------------------->
  
    <div class="contacts_container">
      <div class="content_in_contacts">
            <h2 class="contacts_title"><? echo $pageTitle; ?></h2>
            <p class="contacts_description">
              <? echo $pageDescription; ?>
            </p>
            <a class="phone_contacts" href="tel:+79161377108">
              +7 (916) 137-71-08
            </a>
            <a class="email_contacts" href="mailto:info@annaverde.ru">
              info@annaverde.ru
            </a>
            <div class="socialLinks_contacts_page">
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/yt_black.svg" alt="" />
              </a>
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/inst_black.svg" alt="" />
              </a>
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb_black.svg" alt="" />
              </a>
              <a href="">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/vk_black.svg" alt="" />
              </a>
            </div>
      </div>
    </div>
    <img
        class="contacts_bg_img"
        src="<?php echo get_template_directory_uri(); ?>/assets/img/contacts_bg_img_cut_bottom1.png"
        alt=""
      />
<? get_footer(); ?>