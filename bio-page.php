<?php
/*
Template Name: Шаблон Биографии
Template Post Type: post, page, product
*/
set_query_var( 'title', 'Biography page' );
get_header();

$isEnglish = $_GET['lang'] === 'en';
?>


       <!------------------------------ BIO info --------------------------------->

       <div class="bio_container">
          <div class="content_in_bio">
            <? if ($isEnglish) { ?>
              <!-- !!! Английский контент -->
              <div class="about_person">
                <h2 class="title_on_bio_page">Anna Verde</h2>
                <p class="bio_description">
                Choreographer, laureate of international competitions, director of art and art projects, producer of theater projects. Founder and head of the Averdera dance theater.
                </p>
              </div>

              <div class="education_block">
                <h3 class="education_title">Education</h3>
                <div class="institute_and_faculty">
                  <p class="bio_description">
                    Russian Institute of Theatrical Art — GITIS
                  </p>
                  <p class="bio_description faculty">Production Faculty</p>
                </div>

                <div class="institute_and_faculty">
                  <p class="bio_description">
                    Boris Shchukin Theatre Institute
                  </p>
                  <p class="bio_description faculty">Theatre management</p>
                </div>

                <div class="institute_and_faculty">
                  <p class="bio_description">
                    Moscow State Academy of Choreography - MGAKH
                  </p>
                  <p class="bio_description faculty">Professional development</p>
                </div>

                <div class="institute_and_faculty">
                  <p class="bio_description">Natalia Nesterova Academy</p>
                  <p class="bio_description faculty">
                    Ballet Master 's Faculty
                  </p>
                </div>
              </div>
            <? } else { ?>
              <!-- Русский контент -->
              <div class="about_person">
                <h2 class="title_on_bio_page">Анна Верде</h2>
                <p class="bio_description">
                Хореограф, лауреат международных конкурсов, режиссер-постановщик художественных и арт-проектов, продюсер театральных проектов. Основатель и руководитель танцевальной компании Averdera 
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
                  <p class="bio_description">
                    Московская государственная академия хореографии - МГАХ
                  </p>
                  <p class="bio_description faculty">Повышение квалификации</p>
                </div>

                <div class="institute_and_faculty">
                  <p class="bio_description">Академия Натальи Нестеровой</p>
                  <p class="bio_description faculty">
                    Балетмейстерский факультет
                  </p>
                </div>
              </div>
            <? } ?> 
          </div>
        </div>
        <img class="anna_bg" src="<?php echo get_template_directory_uri(); ?>/assets/img/anna_foto.png" alt="" />

<? get_footer(); ?>