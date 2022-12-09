<?php
/*
Template Name: Шаблон Проектов
Template Post Type: post, page, product
*/
set_query_var('title', 'Projects page');
get_header();

$arResult = getProjectPosts();
$posts_list = $arResult['posts'];

$isEnglish = $_GET['lang'] === 'en';

if ($isEnglish) {
  $projectsTitle = "Projects";
} else {
  $projectsTitle = "Проекты";
}


?>

<!--------------------------------------- PROJECTS main content ------------------------------------------------->

<div class="projects_container">
  <div class="projects_content">
    <h2 class="title_on_projects_page"><? echo $projectsTitle; ?></h2>
    <div class="projects_list_project_page">
      <? foreach ($posts_list as $post) {
        $postTitle = $post->post_title;
        $postId = $post->ID;

        $allProjCoverImgId = get_post_meta($postId, 'all_proj_label', true);
        $allProjImageAttr = wp_get_attachment_image_src($allProjCoverImgId, 'full');
        $allProjImageSrc = $allProjImageAttr[0];
      ?>
        <a class="performance_in_projects" href="<? echo $post -> guid; ?>">
          <div class="performance_in_projects_wpapper">
            <div class="all_except_pointer">
              <img class="small_project_photo" src="<? echo $allProjImageSrc ?>" alt="" />
              <div class="project_info_block">
                <p class="gray_small_text">
                  <? echo get_post_premiere($postId); ?>
                </p>

                <h3 class="project_name"><? echo get_post_title($postId); ?></h3>
                <p class="project_performance_location">
                  <? echo get_post_short_description($postId); ?>
                </p>
              </div>
            </div>
            <div class="projects_pointer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
        </a>
      <? } ?>

    </div>

    <!-- Ещё проекты -> -->

    <a class="go_to_in_middle_projects show" href="#">
      <span class="go_to_text">Ещё проекты</span>
      <img class="go_to_pointer pointer_down" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer_down.svg" alt="" />
    </a>
    <div class="loader"></div>
    <div class="pretty_loader_wrapper">
      <div class="pretty_loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- /.content-in-projects -->
</div>
<?
echo $cur_post_id;
global $global_test_var;
$global_test_var = 1024;
// echo $global_test_var;
?>


<? get_footer(); ?>