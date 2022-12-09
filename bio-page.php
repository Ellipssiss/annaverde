<?php
/*
Template Name: Шаблон Биографии
Template Post Type: post, page, product
*/
set_query_var( 'title', 'Biography page' );
get_header();

$arResult = getProjectPosts();
$posts = $arResult['posts'];
$postCount = $arResult['count'];

$isEnglish = $_GET['lang'] === 'en';

$postId = $post -> ID;

if ($isEnglish) {
  $postContent = get_post_meta($postId, 'en_editor_filed_name', true);
} else {
  $postContent = $post -> post_content;
}


?>



       <!------------------------------ BIO info --------------------------------->

       <div class="bio_container">
          <div class="content_in_bio">
            <? echo $postContent; ?>
          </div>
        </div>
        <img class="anna_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/anna_foto.png" alt="" />

<? get_footer(); ?>