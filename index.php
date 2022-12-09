<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package My_theme
 */
set_query_var('title', 'Главная страница');

get_header();

$arProjects = getProjectPosts(3);
$arAfishaPosts = getAfishaPosts(3);
$arPressPosts = getPressPosts(3);

$isEnglish = $_GET['lang'] === 'en';

if ($isEnglish) {
  $afishaTitle = "Afisha";
  $projectsTitle = "Projects";
  $pressTitle = "Press";
} else {
  $afishaTitle = "Афиша";
  $projectsTitle = "Проекты";
  $pressTitle = "Пресса";
}

?>

<!------------------------------------------------------------------------------------- AFISHA ON MAIN --------------------------------------------------------------->
<div class="afisha_block">
  <div class="afisha_container">
    <div class="afisha_column">
      <h2 class="afisha_title_on_main"><? echo $afishaTitle; ?></h2>

      <? foreach($arAfishaPosts as $key => $arEvents){ 
        if ($isEnglish) {
          $afishaPost = $arEvents[0]['en'];
        } else {
          $afishaPost = $arEvents[0]['ru'];
        }
        ?>
        <!-- Один день в афише -->
        <div class="afisha_perfomance_day">
          <!-- Блок с датой -->
          <div class="date">
            <div class="month_day_of_month">
              <span class="day_of_month"><? echo $afishaPost['ar_date'][0]; ?></span>
              <span class="month"><? echo $afishaPost['month']; ?></span>
            </div>
            <span class="day_of_week"><? echo $afishaPost['day']; ?></span>
          </div>
          <!-- Список всех представлений в этот день -->
          <div class="afisha_events_list">
            <!-- Информаци о конкретном представлении в этот день -->
            <? foreach($arEvents as $eventKey => $eventValue ) {
              if ($isEnglish) {
                $event = $eventValue['en'];
              } else {
                $event = $eventValue['ru'];
              }

              if ($eventValue['sold_out'] === 'true') {
                $classNoTicket = 'no_ticket';
                if ($isEnglish) {
                  $valueTicket = 'Sold out';
                } else {
                  $valueTicket = 'Билеты проданы';
                }
              } else {
                $classNoTicket = '';
                if ($isEnglish) {
                  $valueTicket = 'Buy tickets';
                } else {
                  $valueTicket = 'Купить билеты';
                }
              }
            ?>
              <div class="afisha_perfomance_event">
                <img class="event_photo_mobile" src="<?php echo $eventValue['mobile_image']; ?>" alt="" />
                <img class="event_photo_desktop" src="<?php echo $eventValue['desktop_image']; ?>" alt="" />
                <div class="name_date_location_wrapper">
                  <div class="name_date_location">
                    <p class="performance_name">
                      <? echo $event['title']; ?>
                    </p>
                    <div class="perfomrmance_time_and_location">
                      <div class="performance_time"><? echo $event['time']; ?></div>
                      <p class="performance_location">
                        <? echo $event['place']; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <? if ($eventValue['sold_out'] === 'true') { ?>
                  <span class="buy_ticket <? echo $classNoTicket; ?>"><? echo $valueTicket; ?></span>
                <? } else { ?>
                  <a class="buy_ticket" target="_blanck" href="<? echo $eventValue['ticket_link']; ?>"><? echo $valueTicket; ?></a>
                <? } ?>                
              </div>
            <? } ?>
            <!-- /.afisha_events_list -->
          </div>
          <!-- /.afisha_perfomance_day -->
        </div>
      <? } ?>
    </div>
    <!-- /.afisha-container -->
  </div>
  <!-- /.afisha-blok -->
</div>
<!----------------------------------------------------------------- PROJECTS ON MAIN --------------------------------------------------------------------->

<div class="projects_block">
  <div class="projects_container">
    <div class="projects_column">
      <h2 class="projects_block_title"><? echo $projectsTitle; ?></h2>
      <div class="projects_list_project_page">
      <? foreach ($arProjects['posts'] as $post) {
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

      <!-- Перейти в проекты -> -->
      <a class="go_to_block" href="<? echo getProjectPageURL(); ?>">
        <span class="go_to_text" >
          <? if ($isEnglish) { ?> 
            Go to projects
          <? } else { ?>
            Перейти в проекты
          <? } ?>
        </span>
        <img class="go_to_pointer" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer.svg" alt="" />
        <!-- ./go_to_block -->
      </a>

      <!-- ./projects-column -->
    </div>
    <!-- ./projects-container -->
  </div>
  <!-- ./projects-block -->
</div>
<!---------------------------------------------------------------------- Press block -------------------------------------------------------------------------------->
<div class="press_block">
  <div class="press_container">
    <h2 class="press_block_title"><? echo $pressTitle; ?></h2>
    <div class="articles_container">
    <? foreach ($arPressPosts as $key => $value) {
      if ($isEnglish) {
        $itemContent = $value['en'];
      } else {
        $itemContent = $value['ru'];
      }
    ?>
      <div class="article_wraper">
        <div class="article">
          <img class="press_img" src="<? echo $value['image']; ?>" alt="" />
          <div class="article_name_and_pointer">
            <p class="article_name"><? echo $itemContent['content']; ?></p>
            <div class="press_pointer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source">
            <p class="article_source"><? echo $itemContent['owner']; ?></p>
            <p class="article_date"><? echo $value['date']; ?></p>
          </div>
        </div>
      </div>
      <? } ?>
      <!-- /.articles_container -->
    </div>

    <!-- Перейти в прессу -> -->
    <a class="go_to_press" href="<? echo getPressPageURL(); ?>">
      <span class="go_to_text">
        <? if ($isEnglish) { ?> 
          Go to press
        <? } else { ?>
          Перейти в прессу
        <? } ?>
      </span>
      <img class="go_to_pointer" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer.svg" alt="" />
    </a>
    <!-- /.press_container -->
  </div>
  <!-- /.press-blok -->
</div>
<div class="clear"></div>


<?php

get_footer();

?>