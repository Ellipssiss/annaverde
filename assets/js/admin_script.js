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

// 			const image = customUploader.state().get('selection').first().toJSON();
//
// 			button.parent().prev().attr( 'src', image.url );
// 			button.prev().val( image.id );
            
            console.log('select');
//  
		});
 
		// и открываем модальное окно с выбором изображения
		customUploader.open();
    });

    // jQuery('.proj_add_cover').click(function(){
    //     var send_attachment_bkp = wp.media.editor.send.attachment;
    //     var button = jQuery(this);
    //     var arrInput = [];
        
    //     if(jsonInput.val() === '') jsonInput.val('[]');
        
    //     wp.media.editor.send.attachment = function (props, attachment) {
    //         console.log('attachment', attachment);

    //         arrInput = JSON.parse(jsonInput.val());

    //         if(!arrInput.includes(attachment.id)){    
    //             arrInput.push(attachment.id);
    //             button.before(
    //                 '<span class="proj_images_item" data-id="' + attachment.id + '">' +
    //                     '<span class="close"><img alt="" src="/wp-content/themes/kisina/images/admin_close.svg" /></span>' +
    //                     '<img alt="" src="' + attachment.sizes.thumbnail.url + '" />' +
    //                 '</span>'
    //             );
    //             jsonInput.val(JSON.stringify(arrInput));
    //         }
            
	// 		wp.media.editor.send.attachment = send_attachment_bkp;
	// 	}
	// 	wp.media.editor.open(button);
	// 	return false;
    // });


});
