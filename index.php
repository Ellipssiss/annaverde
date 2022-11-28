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
?>

<!------------------------------------------------------------------------------------- AFISHA ON MAIN --------------------------------------------------------------->
<div class="afisha_block">
  <div class="afisha_container">
    <div class="afisha_column">
      <h2 class="afisha_title_on_main">Афиша</h2>

      <!-- 1-ый день афиши на главной -->
      <div class="afisha_perfomance_day">
        <div class="date">
          <div class="month_day_of_month">
            <span class="day_of_month">28</span>
            <span class="month">Сентября</span>
          </div>
          <span class="day_of_week">Воскресенье</span>
        </div>
        <div class="afisha_events_list">
          <div class="afisha_perfomance_event">
            <img class="event_photo_mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
            <div class="name_date_location_wrapper">
              <div class="name_date_location">
                <p class="performance_name">
                  В объятиях минотавра Пикассо
                </p>
                <div class="perfomrmance_time_and_location">
                  <div class="performance_time">20:00</div>
                  <p class="performance_location">
                    Москва, Тетриум на Серпуховке
                  </p>
                </div>
              </div>
            </div>
            <a class="buy_ticket" href="afisha.html">Купить билет</a>
          </div>
          <!-- afisha_perfomance_event -->
        </div>
        <!-- afisha_events_list-->
      </div>
      <!-- afisha_perfomance_day -->

      <!-- 2-ой (два в день) спектакль афиши на главной -->

      <div class="afisha_perfomance_day">
        <div class="date">
          <div class="month_day_of_month">
            <span class="day_of_month">28</span>
            <span class="month">Мая</span>
          </div>
          <span class="day_of_week">Cуббота</span>
        </div>
        <div class="afisha_events_list">
          <div class="afisha_perfomance_event">
            <!-- Начало первого эвента второго дня -->
            <img class="event_photo_mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
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
            <a class="buy_ticket" href="afisha.html">Купить билет</a>
          </div>
          <!-- конец первого эвента второго дня -->

          <div class="afisha_perfomance_event">
            <img class="event_photo_mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
            <img class="event_photo_desktop" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
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
            <!--name_date_location_wrapper -->
            <a class="buy_ticket" href="afisha.html">Купить билет</a>
            <!-- afisha_perfomance_event -->
          </div>
          <!-- afisha_events_list -->
        </div>
        <!-- afisha_perfomance_day -->
      </div>
      <!-- Перейти в афишу -> -->
      <a class="go_to_block" href="afisha.html">
        <span class="go_to_text">Перейти в афишу</span>
        <img class="go_to_pointer" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer.svg" alt="" />
      </a>
      <!-- /.afisha-column -->
    </div>
    <!-- /.afisha-container -->
  </div>
  <!-- /.afisha-blok -->
</div>
<!----------------------------------------------------------------- PROJECTS ON MAIN --------------------------------------------------------------------->

<div class="projects_block">
  <div class="projects_container">
    <div class="projects_column">
      <h2 class="projects_block_title">Проекты</h2>
      <div class="projects_list">
        <a class="project" href="projeCT.html">
          <img class="project_photo_desktop" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
          <img class="project_photo_mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
          <div class="project_info">
            <p class="project_premiere">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_title">В объятиях минотавра Пикассо</h3>
            <p class="project_subtitle">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>

          <div class="project_pointer">
            <img src="img/pointer.svg" alt="" />
          </div>
        </a>

        <a class="project" href="projeCT.html">
          <img class="project_photo_desktop" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
          <img class="project_photo_mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
          <div class="project_info">
            <p class="project_premiere">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_title">В объятиях минотавра Пикассо</h3>
            <p class="project_subtitle">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>
          <div class="project_pointer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
          </div>
        </a>

        <a class="project" href="projeCT.html">
          <img class="project_photo_desktop" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
          <img class="project_photo_mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
          <div class="project_info">
            <p class="project_premiere">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_title">В объятиях минотавра Пикассо</h3>
            <p class="project_subtitle">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>
          <div class="project_pointer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
          </div>
        </a>

        <a class="project" href="projeCT.html">
          <img class="project_photo_desktop" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
          <img class="project_photo_mobile" src="<?php echo get_template_directory_uri(); ?>/assets/img/afishaInMain.png" alt="" />
          <div class="project_info">
            <p class="project_premiere">
              Премьера 29 апреля 2022 года в Москве
            </p>
            <h3 class="project_title">В объятиях минотавра Пикассо</h3>
            <p class="project_subtitle">
              Синтез хореографии, драмы и инструментальной музыки
            </p>
          </div>

          <div class="project_pointer">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
          </div>
        </a>
        <!-- ./projects-list -->
      </div>

      <!-- Перейти в проекты -> -->
      <div class="go_to_block">
        <a class="go_to_text" href="projects.html">Перейти в проекты</a>
        <img class="go_to_pointer" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer.svg" alt="" />
        <!-- ./go_to_block -->
      </div>

      <!-- ./projects-column -->
    </div>
    <!-- ./projects-container -->
  </div>
  <!-- ./projects-block -->
</div>
<!---------------------------------------------------------------------- Press block -------------------------------------------------------------------------------->
<div class="press_block">
  <div class="press_container">
    <h2 class="press_block_title">Пресса</h2>
    <div class="articles_container">
      <div class="article_wraper">
        <div class="article">
          <img class="press_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer">
            <p class="article_name">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source">
            <p class="article_source">Культура. РФ</p>
            <p class="article_date">01.02.21</p>
          </div>
        </div>
      </div>
      <div class="article_wraper">
        <div class="article">
          <img class="press_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer">
            <p class="article_name">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source">
            <p class="article_source">Культура. РФ</p>
            <p class="article_date">01.02.21</p>
          </div>
        </div>
      </div>
      <div class="article_wraper">
        <div class="article">
          <img class="press_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer">
            <p class="article_name">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source">
            <p class="article_source">Культура. РФ</p>
            <p class="article_date">01.02.21</p>
          </div>
        </div>
      </div>

      <div class="article_wraper">
        <div class="article">
          <img class="press_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer">
            <p class="article_name">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source">
            <p class="article_source">Культура. РФ</p>
            <p class="article_date">01.02.21</p>
          </div>
        </div>
      </div>

      <div class="article_wraper">
        <div class="article">
          <img class="press_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer">
            <p class="article_name">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source">
            <p class="article_source">Культура. РФ</p>
            <p class="article_date">01.02.21</p>
          </div>
        </div>
      </div>

      <div class="article_wraper">
        <div class="article">
          <img class="press_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer">
            <p class="article_name">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source">
            <p class="article_source">Культура. РФ</p>
            <p class="article_date">01.02.21</p>
          </div>
        </div>
      </div>
      <!-- /.articles_container -->
    </div>

    <!-- Перейти в прессу -> -->
    <div class="go_to_press">
      <a class="go_to_text" href="press.html">Перейти в прессу</a>
      <img class="go_to_pointer" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer.svg" alt="" />
    </div>
    <!-- /.press_container -->
  </div>
  <!-- /.press-blok -->
</div>
<div class="clear"></div>


<?php

get_footer();

?>