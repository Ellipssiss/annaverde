<?php
/*
Template Name: Шаблон 404
Template Post Type: post, page, product
*/
set_query_var( 'title', 'Error 404' );
get_header();

$arResult = getProjectPosts();
$posts = $arResult['posts'];
$postCount = $arResult['count'];
?>



            <!-------------------------------------------------- MAIN content -------------------------------------------------------------------->
			<div class="bad_getaway_bg_wrapper"> 
				<div class="content_in_bad_getaway">
					<h2 class="title_on_bad_gateway_page">Страница не загрузилась</h2>
					<p class="bad_gateway_description">
						Перезагрузите страницу или вернитесь на главную, нажав на логотип
					</p>
				</div>

				<img
					class="bad_getaway_bg_img"
					src="/wp-content/themes/my_theme/assets/img/bad_getawey_bg_img.jpeg"
					alt=""
				/>
			</div>
	

<? get_footer(); ?>



