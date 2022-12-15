$(document).ready(function () {
	const owl = $('.owl-carousel');

	const creators = $('.creators');
	creators.click(function () {
		$(this).toggleClass('show');
		$(".creators .item_content").stop().slideUp();
        $(".creators.show .item_content").stop().slideDown();
	})

	$('.artists').click(function () {
		$('.artists').toggleClass('show');
	})

	$('.musicians').click(function () {
		$('.musicians').toggleClass('show');
	})

	$('.burger_btn').click(function () {
		$('.burger_menu_bg').addClass('show');
	})

	$('.exit_burger_menu_btn').click(function () {
		$('.burger_menu_bg').removeClass('show');
	});

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

	$('.go_to_in_middle_afisha').click(function (event) {
		event.preventDefault();

		console.log(FromBackend.templateUrl);

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
					<div class="afisha_perfomance_day">
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

		});
	})

	// $( "#add_musician" ).on('click',function() {
	// 	// alert( "Handler for .click() called." );
	// 	console.log('1');
	//   });

	$('#dropdown').click(function() {
		$(this).toggleClass('show');
	});

	function addRemoveBorder() {
		
		const windowWidth = this.outerWidth
	    const wrapperWidth = $('.article_wraper').width();
	
	    const countElements = $('.articles_container').children('.article_wraper').length;
	    const avSpace = $('.articles_container').width(); 
	    const countColumns = parseInt((avSpace / wrapperWidth));
	    // let i = countColumns;
	    let j = countElements - countColumns;
		
        console.log('windowWidth ', windowWidth, 'avSpace', avSpace, 'wrapperWidth ', wrapperWidth, 'countColumns ', countColumns);
		
        // while (i > 0) { // убирает нижнюю границу у последних i элементов
		// 	$('.articles_container > .article_wraper:nth-last-child(' + i + ')').addClass('no_border_bottom');
		//   i--;
		// }

		// while (j > 0) { // добавляет нижнюю границу первым j элементам
		// 	$('.articles_container > .article_wraper:nth-child(' + j + ')').removeClass('no_border_bottom');
		//   j--;
		// }

		$('.articles_container > .article_wraper').removeClass('no_border_bottom');

		for (let k = countElements; k > j; k--) { 
			$('.articles_container > .article_wraper:nth-child(' + k + ')').addClass('no_border_bottom');
		}
	}
	

	addRemoveBorder();

	$( window ).resize(function() {
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