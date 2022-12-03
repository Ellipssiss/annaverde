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
$postId = ($_GET['p']);

$arGallery = get_project_gallery($postId);
$arPartners = get_project_partners($postId);

$isEnglish = $_GET['lang'] === 'en';

?>


<!------------------------------------ ЗАГОЛОВОК И ПОДЗАГОЛОВОК ПРОЕКТА --------------------->
<?
$postTitle = $post->post_title;
$postType = get_post_meta($postId, 'proj_type', true);

$projCoverImgId = get_post_meta($postId, 'proj_label', true);
$projImageAttr = wp_get_attachment_image_src($projCoverImgId, 'full');
$projImageSrc = $projImageAttr[0];

?>


<!----------------------------- VIDEO PLAYER --------------------------------------------------->

<? if (!empty($arGallery)) { ?>
  <div class="player_interface_bg">
    <div class="item_bg_player"></div>
    <div class="player_and_interface">
      <div class="owl-nav">
        <img class="prev_video_btn big owl-prev" src="<?php echo get_template_directory_uri(); ?>/assets/img/prev_video_btn_big.svg" alt="" />
        <img class="prev_video_btn average owl-prev" src="<?php echo get_template_directory_uri(); ?>/assets/img/prev_video_btn_average.svg" alt="" />
        <img class="prev_video_btn small owl-prev" src="<?php echo get_template_directory_uri(); ?>/assets/img/prev_video_btn_small.svg" alt="" />
      </div>
      <div class="owl-carousel owl-theme">
      <? foreach($arGallery as $key => $value) { 
          if($value['type'] == 'video'){ ?>          
            <div class="item">
              <iframe width="560" height="315" src="https://www.youtube.com/embed/<? echo $value['id']; ?>" title="<? echo $value['name']; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          <? } elseif ($value['type'] == 'image') { ?>
            <div class="item">
              <img alt="" src="<? echo $value['url']; ?>" />
            </div>
          <? } ?>
        <? } ?>
      </div>
      <div class="next_and_exit_btn">
        <img class="next_video_btn big" src="<?php echo get_template_directory_uri(); ?>/assets/img/next_video_btn_big.svg" alt="" />
        <img class="next_video_btn average" src="<?php echo get_template_directory_uri(); ?>/assets/img/next_video_btn_average.svg" alt="" />
        <img class="next_video_btn small" src="<?php echo get_template_directory_uri(); ?>/assets/img/next_video_btn_small.svg" alt="" />
        <img class="exit_video_btn" src="<?php echo get_template_directory_uri(); ?>/assets/img/exit_video_btn.svg" alt="" />
      </div>
    </div>
  </div>
<?}?>


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

<img class="project_main_img" src="<? echo $projImageSrc; ?>" alt="" />

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
        <?
        echo get_post_content($postId);
        ?>
      </p>
      <p class="project_description_text">
      </p>
      <p class="project_time_length">
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

<? if (!empty($arGallery)) { ?>
  <div class="gallery_wrapper">
    <div class="gallery_container">
      <div class="gallery">
        <? foreach($arGallery as $key => $value) { 
          if($value['type'] == 'video'){ ?>
            <div class="gallery_video">
              <img class="focused_preview_img" src="https://img.youtube.com/vi/<? echo $value['id']; ?>/mqdefault.jpg" alt="" />
              <div class="play_button">
                <img class="play_simbol" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/play_button.svg" alt="" />
                <img class="play_simbol_white" src="<?php echo get_template_directory_uri(); ?>/assets/img/gallery_project/play_button_white.svg" alt="" />
                <p class="watch_teaser_text">Смотреть тизер</p>
              </div>
              <div class="item_bg"></div>
            </div>
          <? } elseif ($value['type'] == 'image') { ?>
            <img class="image_regular" src="<? echo $value['url']; ?>" alt="" />
          <? } ?>
        <? } ?>
      </div>
    </div>
  </div>
<?}?>

<!------------------------------------ Partners --------------------------------------------->
<? if(!empty($arPartners)) { ?>
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
          <? foreach($arPartners as $key => $value) { ?>
            <img class="partner_img first_partner" src="<?php echo $value; ?>" alt="" />
          <? } ?>
        </div>
      </div>
    </div>
  </div>
<? } ?>
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