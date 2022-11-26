<?php
/*
Template Name: Шаблон Проекта
Template Post Type: post, page, product, projects
*/
set_query_var('title', 'Project page');
get_header();

$arResult = getProjectPosts();
$posts = $arResult['posts'];
$postCount = $arResult['count'];

// $postid = url_to_postid( $url );
// $postId = get_query_var('postId');

$postId = ($_GET['postId']);

$isEnglish = $_GET['lang'] === 'en';


// die;

// global $cur_post_id;
// $cp_id = $cur_post_id;
// echo $cp_id;

// global $global_test_var;
// echo $global_test_var;
// echo $postId;
?>


<!------------------------------------ ЗАГОЛОВОК И ПОДЗАГОЛОВОК ПРОЕКТА --------------------->
<?
$postTitle = $post->post_title;
$postType = get_post_meta($postId, 'proj_type', true);
?>

<div class="title_subtitle_container">
  <div class="project_title_and_subtitle">
    <h2 class="project_title project_page_title">
      <!-- В объятиях минотавра Пикассо -->
      <? echo get_post_title($postId); ?>
    </h2>

    <p class="project_genre">
      <!-- Синтез хореографии, драмы и инструментальной музыки -->
      <? echo get_post_short_description($postId); ?>
    </p>
  </div>
</div>

<img class="project_main_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/main_project_img.jpg" alt="" />

<div class="description_and_authors_container">
  <div class="description_and_authors">
    <div class="project_description">
      <h3 class="project_description_title">
        <!-- Описание -->
        <?
        if ($isEnglish) {
          echo 'Description';
        } else {
          echo 'Описание';
        }
        ?>
      </h3>
      <p class="project_description_text">
        <!-- «Минотавр Пикассо, который то забавляется, то предается любви,
        то вступает в отчаянную борьбу — это сам
        Пикассо» (Даниэль-Анри Канвейлер) -->
        <?
        echo get_post_content($postId);
        ?>
      </p>
      <p class="project_description_text">
        <!-- Непревзойденный художник, самый популярный в ХХ веке,
        уникальный, опасный и жестокий в своей любви неизбежно соединяет
        творчество и личную жизнь. В спектакле совмещены несколько
        жанров: драматическое искусство, современный танец
        и инструментальная музыка, что делает постановку захватывающей
        и эстетически красивой, как и творчество самого художника. Здесь
        вся история отношений Ольги Хохловой и Пабло Пикассо
        от знакомства в Риме, свадьбы, рождения сына до разрыва
        и отчаянных попыток все вернуть. История, которым многим знакома
        и многим отзывается. -->
      </p>
      <p class="project_time_length">
        <!-- Продолжительность: 1 час, 30 минут -->
        <?
        echo get_post_duration($postId);
        ?>
      </p>
    </div>
    <div class="authors_desktop">
      <div class="creators">
        <p class="authors_title">
          <!-- Создатели -->
          <?
          if ($isEnglish) {
            echo 'Creators';
          } else {
            echo 'Создатели';
          }
          ?>
        </p>
        <?
        $creators = get_post_creators($postId);
        // print_r($creators);
        // echo gettype($creators);

        if ($creators) {
          foreach ($creators as $key => $value) {
        ?>
            <div class="authors_role_and_name">
              <p class="authors_role">
                <!-- Автор идеи и хореограф -->
                <? echo $creators[$key]['role']; ?>
              </p>
              <p class="authors_name">
                <!-- Анна Верде -->
                <? echo $creators[$key]['name']; ?>
              </p>
            </div>

        <?
          }
        } else {
          echo 'Данные не найдены';
        }
        ?>

      </div>
      <div class="artists">
        <p class="authors_title">
          <!-- Артисты -->
          <?
          if ($isEnglish) {
            echo 'Artists';
          } else {
            echo 'Артисты';
          }
          ?>
        </p>

        <?
        $artists = get_post_artists($postId);
        // print_r($artists);
        // echo gettype($artists);

        if ($artists) {
          foreach ($artists as $key => $value) {
        ?>
            <div class="authors_role_and_name">
              <p class="authors_role">
                <!-- Автор идеи и хореограф -->
                <? echo $artists[$key]['role']; ?>
              </p>
              <p class="authors_name">
                <!-- Анна Верде -->
                <? echo $artists[$key]['name']; ?>
              </p>
            </div>

        <?
          }
        } else {
          echo 'Данные не найдены';
        }
        ?>


      </div>
      <div class="musicians">
        <p class="authors_title">
          <!-- Музыканты -->
          <?
          if ($isEnglish) {
            echo 'Musicians';
          } else {
            echo 'Музыканты';
          }
          ?>
        </p>

        <?
        $musicians = get_post_musicians($postId);
        // print_r($musicians);
        // echo gettype($musicians);

        if ($musicians) {
          foreach ($musicians as $key => $value) {
        ?>
            <div class="authors_role_and_name">
              <p class="authors_role">
                <!-- Автор идеи и хореограф -->
                <? echo $musicians[$key]['role']; ?>
              </p>
              <p class="authors_name">
                <!-- Анна Верде -->
                <? echo $musicians[$key]['name']; ?>
              </p>
            </div>

        <?
          }
        } else {
          echo 'Данные не найдены';
        }
        ?>

      </div>
    </div>
    <div class="authors_mobile">
      <div class="creators">
        <div class="authors_title_and_sign">
          <p class="authors_title">
            <!-- Создатели -->
            <?
            if ($isEnglish) {
              echo 'Creators';
            } else {
              echo 'Создатели';
            }
            ?>
          </p>
          <img class="sign_img minus" src="<?php echo get_template_directory_uri(); ?>/assets/img/sign_minus.svg" alt="" />
          <img class="sign_img plus" src="<?php echo get_template_directory_uri(); ?>/assets/img/sign_plus.svg" alt="" />
        </div>
        <div class="item_content">
          <?
          $creators = get_post_creators($postId);
          // print_r($creators);
          // echo gettype($creators);

          if ($creators) {
            foreach ($creators as $key => $value) {
          ?>
              <div class="authors_role_and_name">
                <p class="authors_role">
                  <!-- Автор идеи и хореограф -->
                  <? echo $creators[$key]['role']; ?>
                </p>
                <p class="authors_name">
                  <!-- Анна Верде -->
                  <? echo $creators[$key]['name']; ?>
                </p>
              </div>

          <?
            }
          } else {
            echo 'Данные не найдены';
          }
          ?>


        </div>
      </div>
      <div class="creators">
        <div class="authors_title_and_sign">
          <p class="authors_title">
            <!-- Артисты -->
            <?
            if ($isEnglish) {
              echo 'Artists';
            } else {
              echo 'Артисты';
            }
            ?>
          </p>
          <img class="sign_img minus" src="<?php echo get_template_directory_uri(); ?>/assets/img/sign_minus.svg" alt="" />
          <img class="sign_img plus" src="<?php echo get_template_directory_uri(); ?>/assets/img/sign_plus.svg" alt="" />
        </div>
        <div class="item_content">

          <?
          $artists = get_post_artists($postId);
          // print_r($artists);
          // echo gettype($artists);

          if ($artists) {
            foreach ($artists as $key => $value) {
          ?>
              <div class="authors_role_and_name">
                <p class="authors_role">
                  <!-- Автор идеи и хореограф -->
                  <? echo $artists[$key]['role']; ?>
                </p>
                <p class="authors_name">
                  <!-- Анна Верде -->
                  <? echo $artists[$key]['name']; ?>
                </p>
              </div>

          <?
            }
          } else {
            echo 'Данные не найдены';
          }
          ?>

        </div>
      </div>
      <div class="creators">
        <div class="authors_title_and_sign">
          <p class="authors_title">
            <!-- Музыканты -->
            <?
            if ($isEnglish) {
              echo 'Musicians';
            } else {
              echo 'Музыканты';
            }
            ?>
          </p>
          <img class="sign_img minus" src="<?php echo get_template_directory_uri(); ?>/assets/img/sign_minus.svg" alt="" />
          <img class="sign_img plus" src="<?php echo get_template_directory_uri(); ?>/assets/img/sign_plus.svg" alt="" />
        </div>
        <div class="item_content">
          <?
          $musicians = get_post_musicians($postId);
          // print_r($musicians);
          // echo gettype($musicians);

          if ($musicians) {
            foreach ($musicians as $key => $value) {
          ?>
              <div class="authors_role_and_name">
                <p class="authors_role">
                  <!-- Автор идеи и хореограф -->
                  <? echo $musicians[$key]['role']; ?>
                </p>
                <p class="authors_name">
                  <!-- Анна Верде -->
                  <? echo $musicians[$key]['name']; ?>
                </p>
              </div>

          <?
            }
          } else {
            echo 'Данные не найдены';
          }
          ?>

        </div>
      </div>
      <!-- authors_mobile -->
    </div>
  </div>
</div>
<!-- /.container (width) -->
<div class="nearest_performances_in_project_wrapper">
  <div class="nearest_performances_in_project">
    <h3 class="nearest_performance_title">
      <!-- Ближайшие спектакли -->
      <?
      if ($isEnglish) {
        echo 'Upcoming performances';
      } else {
        echo 'Ближайшие спектакли';
      }
      ?>
    </h3>

    <!-- 1-ый ближайший спектакль -->
    <div class="nearest_performance">
      <div class="nearest_performance_all_except_btn">
        <div class="date_in_project">
          <div class="day_of_month_nearest_project">
            <h2 class="day_of_month">28</h2>
          </div>
          <div class="month_and_day_of_weak_nearest">
            <span class="month">Сентября</span>
            <span class="day_of_week">Воскресенье</span>
          </div>
        </div>
        <div class="time_and_location_nearest_project">
          <div class="time_nearest_project">19:00</div>

          <p class="location_nearest_project">
            Москва. Яровит Холл Москва.
          </p>
        </div>
      </div>
      <a class="buy_ticket nearest">Купить билет</a>
    </div>

    <!-- 2-ой блидайший спектакль -->
    <div class="nearest_performance">
      <div class="nearest_performance_all_except_btn">
        <div class="date_in_project">
          <div class="day_of_month_nearest_project">
            <h2 class="day_of_month">28</h2>
          </div>
          <div class="month_and_day_of_weak_nearest">
            <span class="month">Мая</span>
            <span class="day_of_week">Cуббота</span>
          </div>
        </div>
        <div class="time_and_location_nearest_project">
          <div class="time_nearest_project">19:00</div>

          <p class="location_nearest_project">
            Москва. Яровит Холл Москва. Яровит Холл Москва. Яровит Холл
          </p>
        </div>
      </div>
      <a class="buy_ticket nearest">Купить билет</a>
    </div>
  </div>
</div>
<!-- /.nearest_performances_in_project -->

<!------------------------------------ Gallery ---------------------------------------------->
<div class="gallery_wrapper">
  <div class="gallery_container">
    <div class="gallery">
      <div class="gallery_video">
        <img class="focused_preview_img" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/toreodor.jpg" alt="" />
        <div class="play_button">
          <img class="play_simbol" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/play_button.svg" alt="" />
          <img class="play_simbol_white" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/play_button_white.svg" alt="" />
          <p class="watch_teaser_text">Смотреть тизер</p>
        </div>
        <div class="item_bg"></div>
      </div>
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/toreodor.jpg" alt="" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/khokhlova.jpg" alt="" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/propellers.jpg" alt="" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/girl_gimnast.jpg" alt="" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/alter_ego.jpg" alt="" />
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/girls.jpg" alt="" />
    </div>
  </div>
</div>

<!------------------------------------ Partners --------------------------------------------->

<div class="partners_wrapper">
  <div class="partners_container">
    <div class="partners">
      <h3 class="partners_title">
        <!-- Партнеры -->
        <?
        if ($isEnglish) {
          echo 'Partners';
        } else {
          echo 'Партнеры';
        }
        ?>
      </h3>
      <div class="project_partners">
        <img class="partner_img first_partner" src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/snob.svg" alt="" />
        <img class="partner_img second_partner" src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/balzi_rossi.svg" alt="" />
        <img class="partner_img third_partner" src="<?php echo get_template_directory_uri(); ?>/assets/img/partners/molecule.svg" alt="" />
      </div>
    </div>
  </div>
</div>
<!------------------------------------ Press block ------------------------------------------>
<div class="press_block project_page">
  <div class="press_container project_page">
    <h2 class="press_block_title project_page">
      <!-- Пресса -->
      <?
      if ($isEnglish) {
        echo 'Press';
      } else {
        echo 'Пресса';
      }
      ?>
    </h2>
    <div class="articles_container project_page">
      <div class="article_wraper project_page">
        <div class="article project_page">
          <img class="press_img project_page" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer project_page">
            <p class="article_name project_page">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer show">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source project_page">
            <p class="article_source project_page">Культура. РФ</p>
            <p class="article_date project_page">01.02.21</p>
          </div>
        </div>
      </div>
      <div class="article_wraper project_page">
        <div class="article project_page">
          <img class="press_img project_page" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer project_page">
            <p class="article_name project_page">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer show">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source project_page">
            <p class="article_source project_page">Культура. РФ</p>
            <p class="article_date project_page">01.02.21</p>
          </div>
        </div>
      </div>
      <div class="article_wraper project_page">
        <div class="article project_page">
          <img class="press_img project_page" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer project_page">
            <p class="article_name project_page">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer show">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source project_page">
            <p class="article_source project_page">Культура. РФ</p>
            <p class="article_date project_page">01.02.21</p>
          </div>
        </div>
      </div>

      <div class="article_wraper project_page">
        <div class="article project_page">
          <img class="press_img project_page" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer project_page">
            <p class="article_name project_page">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer show">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source project_page">
            <p class="article_source project_page">Культура. РФ</p>
            <p class="article_date project_page">01.02.21</p>
          </div>
        </div>
      </div>

      <div class="article_wraper project_page">
        <div class="article project_page">
          <img class="press_img project_page" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer project_page">
            <p class="article_name project_page">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer show">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source project_page">
            <p class="article_source project_page">Культура. РФ</p>
            <p class="article_date project_page">01.02.21</p>
          </div>
        </div>
      </div>

      <div class="article_wraper project_page">
        <div class="article project_page">
          <img class="press_img project_page" src="<?php echo get_template_directory_uri(); ?>/assets/img/press_photo.png" alt="" />
          <div class="article_name_and_pointer project_page">
            <p class="article_name project_page">
              Пластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              ПикассоПластический спектакль «В объятиях минотавра
              Пикассо
            </p>
            <div class="press_pointer show">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/pointer.svg" alt="" />
            </div>
          </div>
          <div class="article_date_and_source project_page">
            <p class="article_source project_page">Культура. РФ</p>
            <p class="article_date project_page">01.02.21</p>
          </div>
        </div>
      </div>
      <!-- /.articles_container -->
    </div>

    <!-- Перейти в прессу -> -->
    <div class="go_to_press">
      <a class="go_to_text" href="#">
        <?
        if ($isEnglish) {
          echo 'Go to press';
        } else {
          echo 'Перейти в прессу';
        }
        ?>
      </a>
      <img class="go_to_pointer" src="<?php echo get_template_directory_uri(); ?>/assets/img/go_to_pointer.svg" alt="" />
    </div>
    <!-- /.press_container -->
  </div>
  <!-- /.press-blok -->
</div>
<div class="clear"></div>


<? get_footer(); ?>