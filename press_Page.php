<?php
/*
Template Name: Шаблон Прессы
Template Post Type: post, page, product
*/
set_query_var( 'title', 'Press page' );
set_query_var( 'isMenuWhite', true );
get_header();

$arResult = getPressPosts();

$isEnglish = $_GET['lang'] === 'en';

if($isEnglish) {
  $pageTitle = 'PRESS';
} else {
  $pageTitle = 'Пресса';
}

?>


      <!---------------------------------------------------------------------- Press block -------------------------------------------------------------------------------->
      <div class="press_block press_block_press_page">
            <div class="press_container press_container_press_page">
              <h2 class="press_block_title press_block_title_press_page"><? echo $pageTitle; ?></h2>
              <div class="articles_container articles_container_press_page">
                <? foreach ($arResult as $key => $value) {
                  if ($isEnglish) {
                    $itemContent = $value['en'];
                  } else {
                    $itemContent = $value['ru'];
                  }
                ?>
                  <div class="article_wraper article_wraper_press_page">
                  <div class="article article_press_page">
                    <img
                      class="press_img press_img_press_page"
                      src="<? echo $value['image']; ?>"
                      alt=""
                    />
                    <div class="article_name_and_pointer article_name_and_pointer_press_page">
                      <p class="article_name article_name_press_page"><? echo $itemContent['content']; ?></p>
                      <div class="press_pointer">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
                      </div>
                    </div>
                    <div class="article_date_and_source article_date_and_source_press_page">
                      <p class="article_source article_source_press_page"><? echo $itemContent['owner']; ?></p>
                      <p class="article_date article_date_press_page"><? echo $value['date']; ?></p>
                    </div>
                  </div>
                </div>
                <? } ?>
                
                <!-- /.articles_container -->
              </div>
              <!-- Ещё пресса -> -->
              <a class="go_to_in_middle_press show" href="#">
                <span class="go_to_text">Ещё пресса</span>
                <img class="go_to_pointer pointer_down" src="/wp-content/themes/my_theme/assets/img/go_to_pointer_down.svg" alt="">
            </a>
            <div class="pretty_loader_wrapper pretty_loader_wrapper_press_page">
              <div class="pretty_loader show">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
              </div>
            </div>
            
              <!-- /.press_container -->
            </div>
            <!-- /.press-blok -->
          </div>
          

<? get_footer(); ?>