<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package My_theme
 */

$args = array(
	'theme_location' => 'footer_menu',
  'walker' => new True_Walker_Nav_Menu(), // этот параметр нужно добавить
  // 'menu' => 'main',
  'menu_class' => 'footer_nav',
  'container' => false,
  // 'item_class' => 'header_nav_link',
  'menu-item' => 'footer_nav_link',
  'items_wrap' => '<div class="footer_nav">%3$s</div>',
  'item_wrap' => '<a class="footer_nav_link>%3$s</a>',
);

$phone = get_option('contacts_phone');
$phoneLink = preg_replace("/[^,.0-9]/", '', $phone);

$email = get_option('contacts_email');

$youtube = get_option('social_youtube');
$instagram = get_option('social_instagram');
$facebook = get_option('social_facebook');
$vk = get_option('social_vk');

?>
        <!-- /.page -->
        </div>
      <!-- /.page-wrapper -->
    </div>
<!-- ========================================================================= FOOTER =============================================================================================== -->
<footer class="footer">
      <div class="footer_container">
        <div class="support_and_menu">
          <a class="support_us_btn" href="<? echo getSupportUsPageURL(); ?>">Поддержать нас</a>
          <? wp_nav_menu($args) ?>
        </div>

        <div class="phone_and_email">
          <a class="phone" href="tel:+<? echo $phoneLink; ?>"><? echo $phone; ?></a>
          <a class="email" href="mailto:<? echo $email; ?>"><? echo $email; ?></a>
        </div>

        <div class="copy_and_socialLinks">
          <p class="copy">© Anna Verde 2022</p>
          <div class="socialLinks">
            <a target="_blank" href="<? echo $youtube; ?>">
              <img class="social_icon_footer" src="<?php echo get_template_directory_uri(); ?>/assets/img/youtb.svg" alt="" />
            </a>
            <a target="_blank" href="<? echo $instagram; ?>">
              <img class="social_icon_footer" src="<?php echo get_template_directory_uri(); ?>/assets/img/inst.svg" alt="" />
            </a>
            <a target="_blank" href="<? echo $facebook; ?>">
              <img class="social_icon_footer" src="<?php echo get_template_directory_uri(); ?>/assets/img/fb.svg" alt="" />
            </a>
            <a target="_blank" href="<? echo $vk; ?>">
              <img class="social_icon_footer" src="<?php echo get_template_directory_uri(); ?>/assets/img/vk.svg" alt="" />
            </a>
          </div>
        </div>
      </div>
    </footer>

    </body>
</html>


