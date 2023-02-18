$(document).ready(function () {
	const owl = $('.owl-carousel');

	const creators = $('.creators');
	creators.click(function () {
		$(this).toggleClass('show');
		$(".creators .item_content").stop().slideUp();
        $(".creators.show .item_content").stop().slideDown();
	})

	$('.burger_btn').click(function () {
		$('.burger_menu_bg').addClass('show');
		setTimeout(function(){
			$('.burger_menu_container').addClass('show');
		}, 50);		
	})

	$('.exit_burger_menu_btn').click(function () {
		$('.burger_menu_container').removeClass('show');
		setTimeout(function(){
			$('.burger_menu_bg').removeClass('show');
		}, 80);
	});

	$('.artists').click(function () {
		$('.artists').toggleClass('show');
	})

	$('.musicians').click(function () {
		$('.musicians').toggleClass('show');
	})

	// $('.burger_btn').click(function () {
	// 	$('.burger_menu_bg').addClass('show');
	// })

	// $('.exit_burger_menu_btn').click(function () {
	// 	$('.burger_menu_bg').removeClass('show');
	// });

	$('.go_to_in_middle_projects').click(function (event) {
		event.preventDefault();

		$('.go_to_in_middle_projects').removeClass('show');
		$('.pretty_loader_wrapper').addClass('show');
	})

	$('.go_to_in_middle_press').click(function () {
		$('.go_to_in_middle_press').removeClass('show');
		$('.pretty_loader_wrapper').addClass('show');
	})
	
	$('.gallery_video, .image_regular').click(function () {
		const itemIndex = $(this).index();

		$('.player_interface_bg').addClass('show');

		owl.owlCarousel({
			margin: 0,
			loop: false,
			items: 1,
			nav: true,
			autoWidth: true,
			margin: 500,
			startPosition: itemIndex,
		});
	});

	$('.prev_video_btn').click(function () {
		owl.trigger('prev.owl.carousel');
	})

	$('.next_video_btn').click(function () {
		owl.trigger('next.owl.carousel');
	})

	$('.exit_video_btn').click(function () {
		$('.player_interface_bg').removeClass('show');
		owl.trigger('destroy.owl.carousel');
	})

	$('.exit_video_bg').click(function () {
		$('.player_interface_bg').removeClass('show');
		owl.trigger('destroy.owl.carousel');
	})

	$('.go_to_in_middle_afisha').click(function (event) {
		event.preventDefault();

		$.ajax({
			method: "POST",
			url: `${FromBackend.templateUrl}/ajax.php`,
			data: { post_type: "afisha", },
			beforeSend: function() {
				$('.go_to_in_middle_afisha').removeClass('show');
				$('.pretty_loader_wrapper').addClass('show');
			}
		})
		.done(function( msg ) {
			const arItems = JSON.parse(msg);
			const isEnglish = $.query.get('lang') === 'en';
			const arMonthes = [];
			const allMonthesItem = isEnglish ? 'All monthes' : 'Все месяцы';

			$('.go_to_in_middle_afisha').removeClass('show');
			$('.pretty_loader_wrapper').removeClass('show');

			$('.afisha_perfomance_day_wrapper').empty();

			Object.entries(arItems).forEach(([key, value]) => {
				let afishaPost = [];

				if (isEnglish) {
					afishaPost = value[0]['en'];
				} else {
					afishaPost = value[0]['ru'];
				}

				let ItemContent = `
					<div class="afisha_perfomance_day" data-month="${afishaPost['month_main']}">
						<!-- Блок с датой -->
						<div class="date">
							<div class="month_day_of_month">
								<span class="day_of_month">${afishaPost['ar_date'][0]}</span>
								<span class="month">${afishaPost['month']}</span>
							</div>
							<span class="day_of_week">${afishaPost['day']}
							</span>
						</div>
						<div class="afisha_events_list">
				`;
				
				value.forEach((item) => {
					let event = [];
					let valueTicket = '';
					let classNoTicket = '';
					let buyButton = '';

					if (isEnglish) {
						event = item['en'];
					} else {
						event = item['ru'];
					}

					arMonthes.push(event['month_main']);

					if (item['sold_out'] === 'true') {
						classNoTicket = 'no_ticket';
						if (isEnglish) {
							valueTicket = 'Sold out';
						} else {
							valueTicket = 'Билеты проданы';
						}

						buyButton = `<span class="buy_ticket ${classNoTicket}">${valueTicket}</span>`;
					} else {
						classNoTicket = '';
						if (isEnglish) {
							valueTicket = 'Buy tickets';
						} else {
							valueTicket = 'Купить билеты';
						}

						buyButton = `<a class="buy_ticket" target="_blanck" href="${item['ticket_link']}">${valueTicket}</a>`;
					}

					ItemContent += `
						<div class="afisha_perfomance_event">
							<img class="event_photo_mobile" src="${item['mobile_image']}" alt="" />
							<img class="event_photo_desktop" src="${item['desktop_image']}" alt="" />
							<div class="name_date_location_wrapper">
								<div class="name_date_location">
									<p class="performance_name">${event['title']}</p>
									<div class="perfomrmance_time_and_location">
									<div class="performance_time">${event['time']}</div>
									<p class="performance_location">
										${event['place']}
									</p>
									</div>
								</div>
							</div>
							${buyButton}           
						</div>
					`;
				});

				ItemContent += `
							<!-- /.afisha_events_list -->
					  	</div>
						<!-- /.afisha_perfomance_day -->
					</div>`;


				$('.afisha_perfomance_day_wrapper').append(ItemContent);
			});

			const uniqueArMonthes = arMonthes.filter(function(itm, i, a) {
				return i == a.indexOf(itm);
			});

			$('#dropdown_menu_wrapper').empty();
			$('#dropdown_menu_wrapper').append(`<span class="dropdown_link">${allMonthesItem}</span>`);
			uniqueArMonthes.forEach((month) => {
				$('#dropdown_menu_wrapper').append(`<span class="dropdown_link">${month}</span>`);
			});

		});
	})

	$('#dropdown_menu_wrapper').on('click', '.dropdown_link', function (){
		const value = $(this).html()

		$(this).parent().parent().parent().find('.dropdown_mainbox').html(value);

		if(value === 'Все месяцы' || value === 'All monthes') {
			$('.afisha_perfomance_day_wrapper').removeClass('filter');
			$('.afisha_perfomance_day_wrapper').find('.afisha_perfomance_day').removeClass('show');
		} else {
			$('.afisha_perfomance_day_wrapper').addClass('filter');
			$('.afisha_perfomance_day_wrapper').find('.afisha_perfomance_day').removeClass('show');
			$('.afisha_perfomance_day_wrapper').find('.afisha_perfomance_day[data-month="' + value + '"]').addClass('show');
		}
	});

	$('#dropdown').click(function() {
		$(this).toggleClass('show');
	});

	// Пресса
	$('.go_to_in_middle_press').click(function(event){
		event.preventDefault();

		$.ajax({
			method: "POST",
			url: `${FromBackend.templateUrl}/ajax.php`,
			data: { post_type: "press", },
			beforeSend: function() {
				$('.go_to_in_middle_press').removeClass('show');
				$('.pretty_loader_wrapper').addClass('show');
			}
		})
		.done(function( msg ) {
			const arItems = JSON.parse(msg);
			const isEnglish = $.query.get('lang') === 'en';

			$('.articles_container_press_page').empty();

			arItems.forEach((item) => {
				let itemContent = [];
				if (isEnglish) {
					itemContent = item['en'];
				} else {
					itemContent = item['ru'];
				}

				$('.articles_container_press_page').append(`
					<a class="article_wraper article_wraper_press_page" target="_blank" href="${item.link}">
						<div class="article article_press_page">
							<img
								class="press_img press_img_press_page"
								src="${item['image']}"
								alt=""
							/>
							<div class="article_name_and_pointer article_name_and_pointer_press_page">
								<p class="article_name article_name_press_page">${itemContent['content']}</p>
								<div class="press_pointer">
									<img src="${FromBackend.templateUrl}/assets/img/pointer.svg" alt="" />
								</div>
							</div>
							<div class="article_date_and_source article_date_and_source_press_page">
								<p class="article_source article_source_press_page">${itemContent['owner']}</p>
								<p class="article_date article_date_press_page">${item['date']}</p>
							</div>
						</div>
					</a>
				`);
			});

			addRemoveBorder();

			$('.go_to_in_middle_press').removeClass('show');
			$('.pretty_loader_wrapper').removeClass('show');
		});
	});

	// Проекты
	$('.go_to_in_middle_projects').click(function(event){
		event.preventDefault();

		$.ajax({
			method: "POST",
			url: `${FromBackend.templateUrl}/ajax.php`,
			data: { post_type: "projects", },
			beforeSend: function() {
				$('.go_to_in_middle_projects').removeClass('show');
				$('.pretty_loader_wrapper').addClass('show');
			}
		})
		.done(function( msg ) {
			const arItems = JSON.parse(msg);
			const isEnglish = $.query.get('lang') === 'en';
			
			$('.projects_list_project_page').empty();

			arItems.forEach((item) => {
				let itemContent = [];
				if(isEnglish){
					itemContent = item['en'];
				} else {
					itemContent = item['ru'];
				}

				$('.projects_list_project_page').append(`
					<a class="performance_in_projects" href="${item['link']}">
						<div class="performance_in_projects_wpapper">
							<div class="all_except_pointer">
								<img class="small_project_photo" src="${item['image']}" alt="" />
								<div class="project_info_block">
									<p class="gray_small_text">
										${itemContent['premiere']}
									</p>

									<h3 class="project_name">${itemContent['title']}</h3>
									<p class="project_performance_location">
										${itemContent['short_desc']}
									</p>
								</div>
							</div>
							<div class="projects_pointer">
								<img src="${FromBackend.templateUrl}/assets/img/pointer.svg" alt="" />
							</div>
						</div>
					</a>
				`);
			})

			$('.go_to_in_middle_projects').removeClass('show');
			$('.pretty_loader_wrapper').removeClass('show');
		});
	});

	function addRemoveBorder() {
		
		const windowWidth = this.outerWidth
	    const wrapperWidth = $('.article_wraper').width();
	
	    const countElements = $('.articles_container').children('.article_wraper').length;
	    const avSpace = $('.articles_container').width(); 
	    const countColumns = parseInt((avSpace / wrapperWidth));
	    let j = countElements - countColumns;

		$('.articles_container > .article_wraper').removeClass('no_border_bottom');

		for (let k = countElements; k > j; k--) { 
			$('.articles_container > .article_wraper:nth-child(' + k + ')').addClass('no_border_bottom');
		}
	}	

	addRemoveBorder();

	$(window).resize(function() {
		addRemoveBorder();
	});
	
	function preload(imgs, func_before, func_after){

		var load;
		var images = [];
		var prevCount;
		var countImages = document.images.length + imgs.length;

		var pre = setInterval(function(){

			load = true;
			prevCount = 0

			for(var i = 0; i < document.images.length; i++){

				if(document.images[i].complete == false){

					load = false;

				} else if(document.images[i].complete == true){

					prevCount++;

				}

			}

			if(imgs.length != 0){

				for(var i = 0; i < imgs.length; i++){

					if(images.length < imgs.length){

						var image = new Image;

						image.src = imgs[i];

						images.push(image);

					}

					if(i == imgs.length - 1){

						for(var j = 0; j < images.length; j++){

							if(images[j].complete == false){

								load = false;

							} else if(images[j].complete == true){

								prevCount++;

							}

							persent = Math.floor((100 * prevCount) / countImages);

							func_before(persent);
							
							if(j == images.length - 1){

								if(load == true){


									clearInterval(pre);

									func_after();

								}

							} 

						}

					}

				} 
				
			} else {

				persent = Math.floor((100 * prevCount) / countImages);

				func_before(persent);

				if(load == true){

					clearInterval(pre);

					func_after();

				}

			}
		

		}, 100);


	}

	// preload([], function(persent){
	// 	console.log(persent);
	// 	$('body').addClass('load');
	// }, function () {
	// 	alert('loaded');
	// });
});