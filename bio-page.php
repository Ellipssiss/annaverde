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
?>



       <!------------------------------ BIO info --------------------------------->

       <div class="bio_container">
          <div class="content_in_bio">
            <div class="about_person">
              <h2 class="title_on_bio_page">Анна Верде</h2>
              <p class="bio_description">
                Российский хореограф лауреат международных конкурсов,
                режиссер-постановщик художественных и арт-проектов, продюсер
                театральных проектов. Основатель и руководитель танцевальной
                компании Averdera.
              </p>
            </div>

            <div class="education_block">
              <h3 class="education_title">Образование</h3>
              <div class="institute_and_faculty">
                <p class="bio_description">
                  Российский институт театрального искусства — ГИТИС
                </p>
                <p class="bio_description faculty">Продюсерский факультет</p>
              </div>

              <div class="institute_and_faculty">
                <p class="bio_description">
                  Театральный институт имени Бориса Щукина
                </p>
                <p class="bio_description faculty">Театральный менеджмент</p>
              </div>

              <div class="institute_and_faculty">
                <p class="bio_description">Академия Натальи Нестеровой</p>
                <p class="bio_description faculty">
                  Хореографическое искусство
                </p>
              </div>

              <div class="institute_and_faculty">
                <p class="bio_description">
                  Московская государственная академия хореографии - МГАХ
                </p>
                <p class="bio_description faculty">Повышение квалификации</p>
              </div>
            </div>
          </div>
        </div>
        <img class="anna_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/anna_foto.png" alt="" />

<? get_footer(); ?>