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
?>
        <!-- /.page -->
        </div>
      <!-- /.page-wrapper -->
    </div>
<!-- ========================================================================= FOOTER =============================================================================================== -->
<footer class="footer">
      <div class="footer_container">
        <div class="support_and_menu">
          <a class="support_us_btn" href="support_us.html">Поддержать нас</a>
          <? wp_nav_menu($args) ?>
          <!-- <nav class="header-nav in_footer">
            <a class="header_nav_link in_footer bio" href="bio.html"
              >Биография</a
            >
            <a class="header_nav_link in_footer afisha" href="afisha.html"
              >Афиша</a
            >
            <a class="header_nav_link in_footer projects" href="projects.html"
              >Проекты</a
            >
            <a class="header_nav_link in_footer press" href="press.html"
              >Пресса</a
            >
            <a class="header_nav_link in_footer contacts" href="contacts.html"
              >Контакты</a
            >
          </nav> -->
        </div>

        <div class="phone_and_email">
          <a class="phone" href="tel:+79161377108">+7 (916) 137-71-08</a>
          <a class="email" href="mailto:info@annaverde.ru">info@annaverde.ru</a>
        </div>

        <div class="copy_and_socialLinks">
          <p class="copy">© Anna Verde 2022</p>
          <div class="socialLinks">
            <a href="">
              <img class="social_icon_footer" src="img/youtb.svg" alt="" />
            </a>
            <a href="">
              <img class="social_icon_footer" src="img/inst.svg" alt="" />
            </a>
            <a href="">
              <img class="social_icon_footer" src="img/fb.svg" alt="" />
            </a>
            <a href="">
              <img class="social_icon_footer" src="img/vk.svg" alt="" />
            </a>
          </div>
        </div>
      </div>
    </footer>

    </body>
</html>


