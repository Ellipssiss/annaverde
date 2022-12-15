<?php
/*
Template Name: Шаблон Проектов
Template Post Type: post, page, product
*/
set_query_var('title', 'Projects page');
get_header();

$postsList = getProjectPosts(MAX_PROJECT_POSTS);

$isEnglish = $_GET['lang'] === 'en';

if ($isEnglish) {
  $projectsTitle = "Projects";
  $more = 'More projects';
} else {
  $projectsTitle = "Проекты";
  $more = 'Еще проекты';
}
?>

<!--------------------------------------- PROJECTS main content ------------------------------------------------->

<div class="projects_container">
  <div class="projects_content">
    <h2 class="title_on_projects_page"><? echo $projectsTitle; ?></h2>
    <div class="projects_list_project_page">
      <? foreach ($postsList as $post) { 
        if($isEnglish) {
          $itemContent = $post['en'];
        } else {
          $itemContent = $post['ru'];
        }
      ?>
        <a class="performance_in_projects" href="<? echo $post['link']; ?>">
          <div class="performance_in_projects_wpapper">
            <div class="all_except_pointer">
              <img class="small_project_photo" src="<? echo $post['image'] ?>" alt="" />
              <div class="project_info_block">
                <p class="gray_small_text">
                  <? echo $itemContent['premiere']; ?>
                </p>

                <h3 class="project_name"><? echo $itemContent['title']; ?></h3>
                <p class="project_performance_location">
                  <? echo $itemContent['short_desc']; ?>
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
      <span class="go_to_text"><? echo $more; ?></span>
      <img class="go_to_pointer pointer_down" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer_down.svg" alt="" />
    </a>
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