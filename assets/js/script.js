$(document).ready(function () {

	console.log('1');
	
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

	$('.go_to_in_middle_projects').click(function () {
		$('.go_to_in_middle_projects').removeClass('show');
		$('.pretty_loader_wrapper').addClass('show');
	})

	$('.go_to_in_middle_press').click(function () {
		$('.go_to_in_middle_press').removeClass('show');
		$('.pretty_loader_wrapper').addClass('show');
	})
	
	$('.gallery_video').click(function () {
		$('.player_interface_bg').addClass('show');

		owl.owlCarousel({
			margin: 0,
			loop: false,
			items: 1,
			nav: true,
			autoWidth: true,
			margin: 500,
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
	})

	$('.go_to_in_middle_afisha').click(function () {
		$('.go_to_in_middle_afisha').removeClass('show');
		$('.pretty_loader_wrapper').addClass('show');
	})

	// $( "#add_musician" ).on('click',function() {
	// 	// alert( "Handler for .click() called." );
	// 	console.log('1');
	//   });

	


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