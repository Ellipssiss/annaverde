<?php
/*
Template Name: Шаблон Афиши
Template Post Type: post, page, product
*/
set_query_var('title', 'Afisha page');
get_header();

$arResult = getProjectPosts();
$posts = $arResult['posts'];
$postCount = $arResult['count'];

// Afisha test content
// Afisha step1
// Afisha test branch check

$arAfishaPosts = getAfishaPosts(MAX_AFISHA_POSTS);

$isEnglish = $_GET['lang'] === 'en';

if ($isEnglish) {
  $afishaTitle = "Afisha";
} else {
  $afishaTitle = "Афиша";
}
?>

<!-- Блок афишы -->
<div class="afisha_block afisha_page">
  <!-- Контейнер афишы -->
  <div class="afisha_container">
    <!-- столбец контента в блоке афиши -->
    <div class="afisha_column">
      <!-- Название блока афиши и меню выюора месяца -->
      <div class="title_and_dropdown">
        <!-- Название блока -->
        <h2 class="afisha_title_on_main afisha_title_on_afisha">
          <? echo $afishaTitle; ?>
        </h2>

        <div id="dropdown" class="dropdown">
          <button class="dropdown_toggle">
            Все месяцы
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/dropdown_up_pointer.svg" alt="" />
          </button>

          <div id="dropdown_menu" class="dropdown_menu">
            <div id="dropdown_menu_wrapper">
              <a href="#" class="dropdown_link">Январь</a>
              <a href="#" class="dropdown_link">Февраль</a>
              <a href="#" class="dropdown_link">Март</a>
              <a href="#" class="dropdown_link">Апрель</a>
              <a href="#" class="dropdown_link">Февраль</a>
              <a href="#" class="dropdown_link">Март</a>
              <a href="#" class="dropdown_link">Апрель</a>
            </div>
          </div>
        </div>
      </div>
      <!------------------------------------- Первый день ------------------------------------------------->
      <div class="afisha_perfomance_day_wrapper">
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
                    <span class="buy_ticket <? echo $classNoTicket; ?>"?><? echo $valueTicket; ?></span>
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

      <!------------------------------------- Конец списка дней ------------------------------>

      <!-- Ещё проекты -> -->
      <a class="go_to_in_middle_afisha show" href="#">
        <span class="go_to_text">Ещё проекты</span>
        <img class="go_to_pointer pointer_down" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer_down.svg" alt="" />
      </a>
      <div class="pretty_loader_wrapper pretty_loader_wrapper_press_page">
        <div class="pretty_loader">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <!-- /.afisha_column -->
    </div>
    <!-- /.afisha_container -->
  </div>
  <!-- /.afisha_block -->
</div>

<? get_footer(); ?>