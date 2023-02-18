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

$phone = get_option('contacts_phone');
$phoneLink = preg_replace("/[^,.0-9]/", '', $phone);

$email = get_option('contacts_email');

$youtube = get_option('social_youtube');
$instagram = get_option('social_instagram');
$facebook = get_option('social_facebook');
$vk = get_option('social_vk');

?>

<!---------------------------------------------- CONTACTS info --------------------------------------------------->
  
    <div class="contacts_container">
      <div class="content_in_contacts">
            <h2 class="contacts_title"><? echo $pageTitle; ?></h2>
            <p class="contacts_description">
              <? echo $pageDescription; ?>
            </p>
            <p class="contacts_name">
              Анна Верде:
            </p>
            <a class="phone_contacts" href="tel:+<? echo $phoneLink; ?>">
              <? echo $phone; ?>
            </a>
            <a class="email_contacts" href="mailto:<? echo $email; ?>">
              <? echo $email; ?>
            </a>
            <div class="socialLinks_contacts_page">
              <a target="_blank" href="<? echo $youtube; ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/yt_black.svg" alt="" />
              </a>
              <a target="_blank" class="hidden_link" href="<? echo $instagram; ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/inst_black.svg" alt="" />
              </a>
              <a target="_blank" class="hidden_link" href="<? echo $facebook; ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fb_black.svg" alt="" />
              </a>
              <a target="_blank" href="<? echo $vk; ?>">
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