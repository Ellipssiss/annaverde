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

    const jsonInput = $('.proj_images_input');
    
    $('.proj_add_cover').click(function (event) {
        event.preventDefault();
 
		const button = $(this);
 
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

});
