<?php
/*
Template Name: Шаблон Проектов
Template Post Type: post, page, product
*/
set_query_var('title', 'Projects page');
get_header();

$arResult = getProjectPosts();
$posts_list = $arResult['posts'];
// $postCount = $arResult['count'];

// global $post;
// echo $post->ID;
?>

<!--------------------------------------- PROJECTS main content ------------------------------------------------->

<div class="projects_container">
  <div class="projects_content">
    <h2 class="title_on_projects_page">Проекты</h2>
    <div class="projects_list_project_page">

      <? foreach ($posts_list as $post) {
        $postTitle = $post->post_title;
        $postId = $post->ID;
        $postType = get_post_meta($postId, 'proj_type', true);
      ?>
        <a href="/project/?postId=<? echo $postId; ?>">

          <div class=" performance_in_projects">
            <div class="all_except_pointer">
              <img class="small_project_photo" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
              <div class="project_info_block">
                <p class="gray_small_text">
                  <!-- Премьера 29 апреля 2022 года в Москве -->
                  <? echo get_post_premiere($postId); ?>
                </p>

                <!-- //<php global $post;
                // global $cur_post_id;
                // $cur_post_id = $post->ID;
                // echo $cur_post_id;
               // > -->

                <h3 class="project_name"><? echo get_post_title($postId); ?></h3>
                <p class="project_performance_location">
                  <? echo get_post_short_description($postId);
                  get_post_meta($post->ID, 'en_short_description', true);
                  get_post_meta($post->ID, 'ru_short_description', true);

                  ?>
                  <? echo get_post_premiere($postId); ?>
                  <? echo get_post_duration($postId); ?>

                </p>
              </div>
            </div>
            <div class="projects_pointer">
              <img src="/wp-content/themes/my_theme/assets/img/pointer.svg" alt="" />
            </div>
          </div>

        </a>
      <? } ?>

      <div class="performance_in_projects">
        <div class="all_except_pointer">
          <img class="small_project_photo" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
          <div class="project_info_block">
            <p class="gray_small_text">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_name">В объятиях минотавра Пикассо</h3>
            <p class="project_performance_location">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>
        </div>
        <div class="projects_pointer">
          <img src="/wp-content/themes/my_theme/assets/img/pointer.svg" alt="" />
        </div>
      </div>

      <div class="performance_in_projects">
        <div class="all_except_pointer">
          <img class="small_project_photo" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
          <div class="project_info_block">
            <p class="gray_small_text">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_name">В объятиях минотавра Пикассо</h3>
            <p class="project_performance_location">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>
        </div>
        <div class="projects_pointer">
          <img src="/wp-content/themes/my_theme/assets/img/pointer.svg" alt="" />
        </div>
      </div>

      <div class="performance_in_projects">
        <div class="all_except_pointer">
          <img class="small_project_photo" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
          <div class="project_info_block">
            <p class="gray_small_text">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_name">В объятиях минотавра Пикассо</h3>
            <p class="project_performance_location">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>
        </div>
        <div class="projects_pointer">
          <img src="/wp-content/themes/my_theme/assets/img/pointer.svg" alt="" />
        </div>
      </div>

      <div class="performance_in_projects">
        <div class="all_except_pointer">
          <img class="small_project_photo" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
          <div class="project_info_block">
            <p class="gray_small_text">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_name">В объятиях минотавра Пикассо</h3>
            <p class="project_performance_location">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>
        </div>
        <div class="projects_pointer">
          <img src="/wp-content/themes/my_theme/assets/img/pointer.svg" alt="" />
        </div>
      </div>

      <div class="performance_in_projects">
        <div class="all_except_pointer">
          <img class="small_project_photo" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
          <div class="project_info_block">
            <p class="gray_small_text">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_name">В объятиях минотавра Пикассо</h3>
            <p class="project_performance_location">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>
        </div>
        <div class="projects_pointer">
          <img src="/wp-content/themes/my_theme/assets/img/pointer.svg" alt="" />
        </div>
      </div>
    </div>

    <!-- Ещё проекты -> -->

    <a class="go_to_in_middle_projects show" href="#">
      <span class="go_to_text">Ещё проекты</span>
      <img class="go_to_pointer pointer_down" src="/wp-content/themes/my_theme/assets/img/go_to_pointer_down.svg" alt="" />
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