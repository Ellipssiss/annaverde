$(document).ready(function () {
    // Функция добавления новой пустой строчки при нажатии на кнопку "добавить создателя"
    $('#add_creator').click(function () {
        const lastElementCount = $('.input_grid_creator').attr('lastKeyCreator');
        const nextElementIndex = parseInt(lastElementCount) + 1;
        const nextElementCount = parseInt(lastElementCount) + 2;
        
        $('.input_column_creator_en').append('<div class="input_row"><p class="creators_count">' + nextElementCount + '</p><input class="input_string_field" type="text" name="creator_en[' + nextElementIndex + '][role]" value="" /><input class="input_string_field" type="text" name="creator_en[' + nextElementIndex + '][name]" value="" /></div>')
        $('.input_column_creator_ru').append('<div class="input_row"><input class="input_string_field" type="text" name="creator_ru[' + nextElementIndex + '][role]" value="" /><input class="input_string_field" type="text" name="creator_ru[' + nextElementIndex + '][name]" value="" /></div>');
        $('.input_grid_creator').attr('lastKeyCreator', +lastElementCount + 1 );
    });

    // Функция удаления последнего создателя при нажатии на кнопку "удалить создателя"
    $('#del_creator').click(function () {
        $('.input_column_creator_en').find('.input_row:last-child').remove();
        $('.input_column_creator_ru').find('.input_row:last-child').remove();
    })

    // Функция добавления новой пустой строчки при нажатии на кнопку "добавить артиста"
    $('#add_artist').click(function () {
        const lastElementCount = $('.input_grid_artists').attr('lastKeyCreator');
        const nextElementIndex = parseInt(lastElementCount) + 1;
        const nextElementCount = parseInt(lastElementCount) + 2;
        
        $('.input_column_artist_en').append('<div class="input_row"><p class="creators_count">' + nextElementCount + '</p><input class="input_string_field" type="text" name="artist_en[' + nextElementIndex + '][role]" value="" /><input class="input_string_field" type="text" name="artist_en[' + nextElementIndex + '][name]" value="" /></div>')
        $('.input_column_artist_ru').append('<div class="input_row"><input class="input_string_field" type="text" name="artist_ru[' + nextElementIndex + '][role]" value="" /><input class="input_string_field" type="text" name="artist_ru[' + nextElementIndex + '][name]" value="" /></div>');
        $('.input_grid_artists').attr('lastKeyCreator', +lastElementCount + 1 );
    });

    // Функция удаления последнего артиста при нажатии на кнопку "удалить артиста"
    $('#del_artist').click(function () {
        $('.input_column_artist_en').find('.input_row:last-child').remove();
        $('.input_column_artist_ru').find('.input_row:last-child').remove();
    })

     // Функция добавления новой пустой строчки при нажатии на кнопку "добавить музыканта"
     $('#add_musician').click(function () {
        const lastElementCount = $('.input_grid_musician').attr('lastKeyCreator');
        const nextElementIndex = parseInt(lastElementCount) + 1;
         const nextElementCount = parseInt(lastElementCount) + 2;
         console.log(lastElementCount);
        
        $('.input_column_musician_en').append('<div class="input_row"><p class="creators_count">' + nextElementCount + '</p><input class="input_string_field" type="text" name="musician_en[' + nextElementIndex + '][role]" value="" /><input class="input_string_field" type="text" name="musician_en[' + nextElementIndex + '][name]" value="" /></div>')
         $('.input_column_musician_ru').append('<div class="input_row"><input class="input_string_field" type="text" name="musician_ru[' + nextElementIndex + '][role]" value="" /><input class="input_string_field" type="text" name="musician_ru[' + nextElementIndex + '][name]" value="" /></div>');
         $('.input_grid_musician').attr('lastKeyCreator', +lastElementCount + 1 );
    });

    // Функция удаления последнего музыканта при нажатии на кнопку "удалить музыканта"
    $('#del_musician').click(function () {
        $('.input_column_musician_en').find('.input_row:last-child').remove();
        $('.input_column_musician_ru').find('.input_row:last-child').remove();
    })

    // $('.proj_add_cover').click(function (event) {
    //     event.preventDefault();

    //     alert('add');
    // });
    
    $('.proj_add_cover').click(function (event) {
        event.preventDefault(); 
		const customUploader = wp.media({
			title: 'Выберите изображение плз',
			library : {
				// uploadedTo : wp.media.view.settings.post.id, // если для метобокса и хотим прилепить к текущему посту
				type : 'image'
			},
			button: {
				text: 'Выбрать изображение' // текст кнопки, по умолчанию "Вставить в запись"
			},
			multiple: false
		});
 
		// добавляем событие выбора изображения
		customUploader.on('select', function() {
			const image = customUploader.state().get('selection').first().toJSON();

            $('.proj_labelimg').attr('src', image.sizes.thumbnail.url);
			$('.proj_labelinput').val(image.id);
		});
 
		// и открываем модальное окно с выбором изображения
		customUploader.open();
    });

    $('.proj_clear_cover').click(function(event) {
        event.preventDefault();

        $('.proj_labelimg').attr('src', '');
		$('.proj_labelinput').val('');
    });

    
    
    $('.all_proj_add_cover').click(function (event) {
        event.preventDefault(); 
		const customUploader = wp.media({
			title: 'Выберите изображение плз',
			library : {
				// uploadedTo : wp.media.view.settings.post.id, // если для метобокса и хотим прилепить к текущему посту
				type : 'image'
			},
			button: {
				text: 'Выбрать изображение' // текст кнопки, по умолчанию "Вставить в запись"
			},
			multiple: false
		});
 
		// добавляем событие выбора изображения
		customUploader.on('select', function() {
			const image = customUploader.state().get('selection').first().toJSON();

            $('.all_proj_labelimg').attr('src', image.sizes.thumbnail.url);
			$('.all_proj_labelinput').val(image.id);
		});
 
		// и открываем модальное окно с выбором изображения
		customUploader.open();
    });

    $('.all_proj_clear_cover').click(function(event) {
        event.preventDefault();

        $('.all_proj_labelimg').attr('src', '');
		$('.all_proj_labelinput').val('');
    });

    $('.proj_images_buttons_add_button').click(function(event){
        event.preventDefault(); 
		const customUploader = wp.media({
			title: 'Выберите изображение плз',
			library : {
				// uploadedTo : wp.media.view.settings.post.id, // если для метобокса и хотим прилепить к текущему посту
				type : 'image'
			},
			button: {
				text: 'Выбрать изображение' // текст кнопки, по умолчанию "Вставить в запись"
			},
			multiple: false
		});
 
		// добавляем событие выбора изображения
		customUploader.on('select', function() {
			const image = customUploader.state().get('selection').first().toJSON();
            const imageId = image.id;

            $('.proj_images_box').append(`
                <span class="proj_images_item" data-id="${imageId}">
                    <span class="close proj_images_item_close"><img alt="" src="${FromBackend.templateUrl}/assets/img/admin_close.svg" /></span>
                    <img alt="" src="${image.sizes.thumbnail.url}" />
                </span>
            `);

            const imagesJSON = $('.proj_images_input').val();
            let imagesIdsArr = JSON.parse(imagesJSON);

            const imageHasInArr = imagesIdsArr.some((id) => id === imageId);

            if(!imageHasInArr) imagesIdsArr.push(imageId);

            $('.proj_images_input').val(JSON.stringify(imagesIdsArr));
		});
 
		// и открываем модальное окно с выбором изображения
		customUploader.open();
    });

    $('.proj_images_box').on('click', function(event) {
        pictureId = $(event.target).parent().parent().data('id');

        const imagesJSON = $('.proj_images_input').val();
        let imagesIdsArr = JSON.parse(imagesJSON);

        const clearImagesIdsArr = imagesIdsArr.filter((id) => id !== pictureId);

        $('.proj_images_input').val(JSON.stringify(clearImagesIdsArr));

        $(this).find('span[data-id=' + pictureId + ']').remove();
    });

    $('#add_perfomance').click(function (event) {
        event.preventDefault();

        const perfomanceId = $('.event_projects').val();
        const time = $('.event_time').val();
        const place = $('.event_place').val();

        const projectPosts = FromBackend.projectPosts;
        const perfomancePost = projectPosts.filter((post) => post.ID === parseInt(perfomanceId, 10));

        const addItem = {
            id: perfomanceId,
            name: perfomancePost[0].post_title,
            time: time,
            place: place,
        }
        
        const fieldArr = JSON.parse($('.field_day_events').val()); 
        const hasElementInArr = fieldArr.some((item) => item.id === perfomanceId);

        if (!hasElementInArr) {
            fieldArr.push(addItem);            
            $('.day_events').find('tbody').append(`
                <tr>
                    <td>${perfomancePost[0].post_title}</td>
                    <td>${time}</td>
                    <td>${place}</td>
                    <td><a class="day_events_delete" href="javascript:void(0)" data-id="${perfomanceId}">Удалить</a></td>
                </tr>
            `);
        }

        $('.field_day_events').val(JSON.stringify(fieldArr));        
    });

    $('.day_events').on('click', '.day_events_delete', function(){
        const thisElem = $(this);
        const itemId = thisElem.data('id');

        thisElem.parent().parent().remove();

        const fieldDayJSON = $('.field_day_events').val();
        const fieldDayArr = JSON.parse(fieldDayJSON);

        const fieldResult = fieldDayArr.filter((item) => parseInt(item.id, 10) !== parseInt(itemId, 10));

        $('.field_day_events').val(JSON.stringify(fieldResult));
    });

});
