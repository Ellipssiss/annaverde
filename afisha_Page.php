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
          Афиша
        </h2>

        <div id="dropdown" class="dropdown" easy-toggle="#dropdown" easy-class="show">
          <button class="dropdown_toggle">
            Все месяцы
            <img src="/wp-content/themes/my_theme/assets/img/dropdown_up_pointer.svg" alt="" />
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
      <!-- Один день в афише -->
      <div class="afisha_perfomance_day">
        <!-- Блок с датой -->
        <div class="date">
          <div class="month_day_of_month">
            <span class="day_of_month">28</span>
            <span class="month">Сентября</span>
          </div>
          <span class="day_of_week">Воскресенье</span>
        </div>
        <!-- Список всех представлений в этот день -->
        <div class="afisha_events_list">
          <!-- Информаци о конкретном представлении в этот день -->
          <div class="afisha_perfomance_event">
            <img class="event_photo_mobile" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <div class="name_date_location_wrapper">
              <div class="name_date_location">
                <p class="performance_name">
                  В объятиях минотавра Пикассо В объятиях минотавра
                  Пикассо
                </p>
                <div class="perfomrmance_time_and_location">
                  <div class="performance_time">20:00</div>
                  <p class="performance_location">
                    Москва, Яровит Холл
                  </p>
                </div>
              </div>
            </div>
            <a class="buy_ticket" href="afisha.html">Купить билет</a>
          </div>
          <!-- /.afisha_events_list -->
        </div>
        <!-- /.afisha_perfomance_day -->
      </div>
      <!------------------------------------- Второй день ------------------------------------------------->
      <!-- Один день в афише -->
      <div class="afisha_perfomance_day">
        <!-- Блок с датой -->
        <div class="date">
          <div class="month_day_of_month">
            <span class="day_of_month">28</span>
            <span class="month">Сентября</span>
          </div>
          <span class="day_of_week">Воскресенье</span>
        </div>
        <!-- Список всех представлений в этот день -->
        <div class="afisha_events_list">
          <!-- Информаци о конкретном представлении в этот день -->
          <div class="afisha_perfomance_event">
            <img class="event_photo_mobile" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <div class="name_date_location_wrapper">
              <div class="name_date_location">
                <p class="performance_name">
                  В объятиях минотавра Пикассо В объятиях минотавра
                  Пикассо
                </p>
                <div class="perfomrmance_time_and_location">
                  <div class="performance_time">20:00</div>
                  <p class="performance_location">
                    Москва, Яровит Холл
                  </p>
                </div>
              </div>
            </div>
            <a class="buy_ticket no_ticket">Купить билет</a>
          </div>
          <!-- /.afisha_events_list -->
        </div>
        <!-- /.afisha_perfomance_day -->
      </div>
      <!------------------------------------- Третий день ------------------------------------------------->
      <!-- Один день в афише -->
      <div class="afisha_perfomance_day">
        <!-- Блок с датой -->
        <div class="date">
          <div class="month_day_of_month">
            <span class="day_of_month">28</span>
            <span class="month">Сентября</span>
          </div>
          <span class="day_of_week">Воскресенье</span>
        </div>
        <!-- Список всех представлений в этот день -->
        <div class="afisha_events_list">
          <!-- Информаци о конкретном представлении в этот день -->
          <div class="afisha_perfomance_event">
            <img class="event_photo_mobile" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <div class="name_date_location_wrapper">
              <div class="name_date_location">
                <p class="performance_name">
                  В объятиях минотавра Пикассо В объятиях минотавра
                  Пикассо
                </p>
                <div class="perfomrmance_time_and_location">
                  <div class="performance_time">20:00</div>
                  <p class="performance_location">
                    Москва, Яровит Холл
                  </p>
                </div>
              </div>
            </div>
            <a class="buy_ticket no_ticket">Купить билет</a>
          </div>
          <!-- /.afisha_events_list -->
        </div>
        <!-- /.afisha_perfomance_day -->
      </div>
      <!------------------------------------- Четвертый день ------------------------------------------------->
      <!-- Один день в афише -->
      <div class="afisha_perfomance_day">
        <!-- Блок с датой -->
        <div class="date">
          <div class="month_day_of_month">
            <span class="day_of_month">28</span>
            <span class="month">Сентября</span>
          </div>
          <span class="day_of_week">Воскресенье</span>
        </div>
        <!-- Список всех представлений в этот день -->
        <div class="afisha_events_list">
          <!-- Информаци о конкретном представлении в этот день -->
          <div class="afisha_perfomance_event">
            <img class="event_photo_mobile" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <div class="name_date_location_wrapper">
              <div class="name_date_location">
                <p class="performance_name">
                  В объятиях минотавра Пикассо В объятиях минотавра
                  Пикассо
                </p>
                <div class="perfomrmance_time_and_location">
                  <div class="performance_time">20:00</div>
                  <p class="performance_location">
                    Москва, Яровит Холл
                  </p>
                </div>
              </div>
            </div>
            <a class="buy_ticket no_ticket">Купить билет</a>
          </div>
          <!-- /.afisha_events_list -->
        </div>
        <!-- /.afisha_perfomance_day -->
      </div>
      <!------------------------------------- Пятый день ------------------------------------------------->
      <!-- Один день в афише -->
      <div class="afisha_perfomance_day">
        <!-- Блок с датой -->
        <div class="date">
          <div class="month_day_of_month">
            <span class="day_of_month">28</span>
            <span class="month">Мая</span>
          </div>
          <span class="day_of_week">Cуббота</span>
        </div>
        <!-- Список всех представлений в этот день -->
        <div class="afisha_events_list">
          <!-- Информаци о конкретном представлении в этот день -->
          <div class="afisha_perfomance_event">
            <img class="event_photo_mobile" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <div class="name_date_location_wrapper">
              <div class="name_date_location">
                <p class="performance_name">
                  В объятиях минотавра Пикассо В объятиях минотавра
                  Пикассо
                </p>
                <div class="perfomrmance_time_and_location">
                  <div class="performance_time">19:00</div>
                  <p class="performance_location">
                    Москва, Яровит Холл Москва, Яровит Холл Москва,
                    Яровит Холл
                  </p>
                </div>
              </div>
            </div>
            <a class="buy_ticket no_ticket">Билетов нет</a>
          </div>

          <!-- Информаци о конкретном представлении в этот день -->
          <div class="afisha_perfomance_event">
            <img class="event_photo_mobile" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="/wp-content/themes/my_theme/assets/img/afishaInMain.png" alt="" />
            <div class="name_date_location_wrapper">
              <div class="name_date_location">
                <p class="performance_name">
                  В объятиях минотавра Пикассо
                </p>
                <div class="perfomrmance_time_and_location">
                  <div class="performance_time">19:00</div>
                  <p class="performance_location">
                    Москва, Яровит Холл
                  </p>
                </div>
              </div>
            </div>
            <a class="buy_ticket">Купить билет</a>
          </div>

          <!-- /.afisha_events_list -->
        </div>
        <!-- /.afisha_perfomance_day -->
      </div>

      <!------------------------------------- Конец списка дней ------------------------------>

      <!-- Ещё проекты -> -->
      <a class="go_to_in_middle_afisha show" href="#">
        <span class="go_to_text">Ещё проекты</span>
        <img class="go_to_pointer pointer_down" src="/wp-content/themes/my_theme/assets/img/go_to_pointer_down.svg" alt="" />
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