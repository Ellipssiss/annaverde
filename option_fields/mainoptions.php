<?
add_action( 'admin_init',  'main_options' );

function main_options(){

	// регистрируем опции для заголовка хеадера
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'ru_main_text', // ярлык опции
		// 'absint' // функция очистки
	);
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'en_main_text', // ярлык опции
		// 'absint' // функция очистки
	);

	// регистрируем опции для анотации хеадера
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'ru_main_anotation', // ярлык опции
		// 'absint' // функция очистки
	);
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'en_main_anotation', // ярлык опции
		// 'absint' // функция очистки
	);

	// регистрируем опции для анотации фото
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'ru_main_photoanotation', // ярлык опции
		// 'absint' // функция очистки
	);
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'en_main_photoanotation', // ярлык опции
		// 'absint' // функция очистки
	);


	// добавляем секцию без заголовка
	add_settings_section(
		'main_page_section_id', // ID секции, пригодится ниже
		'', // заголовок (не обязательно)
		'', // функция для вывода HTML секции (необязательно)
		'main_page_link' // ярлык страницы
	);

	
	// Добавление полей для заголовка хеадера	
	add_settings_field(
		'ru_main_text',
		'Русский заголовок сайта',
		'main_page_options_ru', // название функции для вывода
		'main_page_link', // ярлык страницы
		'main_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'ru_main_text',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'ru_main_text', // любые доп параметры в колбэк функцию
		)
	);
	add_settings_field(
		'en_main_text',
		'Английский заголовок сайта',
		'main_page_options_en', // название функции для вывода
		'main_page_link', // ярлык страницы
		'main_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'en_main_text',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'en_main_text', // любые доп параметры в колбэк функцию
		)
	);

	// Добавление поля для анотации хеадера
	add_settings_field(
		'ru_main_anotation',
		'Русская анотация сайта',
		'main_page_anotation_ru', // название функции для вывода
		'main_page_link', // ярлык страницы
		'main_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'ru_main_anotation',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'ru_main_anotation', // любые доп параметры в колбэк функцию
		)
	);
	add_settings_field(
		'en_main_anotation',
		'Английская анотация сайта',
		'main_page_anotation_en', // название функции для вывода
		'main_page_link', // ярлык страницы
		'main_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'en_main_anotation',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'en_main_anotation', // любые доп параметры в колбэк функцию
		)
	);
	
	// Добавление полей для анотации фото
	add_settings_field(
		'ru_main_photoanotation',
		'Русская анотация фото',
		'main_page_foto_anotation_ru', // название функции для вывода
		'main_page_link', // ярлык страницы
		'main_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'ru_main_photoanotation',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'ru_main_photoanotation', // любые доп параметры в колбэк функцию
		)
	);
	add_settings_field(
		'en_main_photoanotation',
		'Английская анотация фото',
		'main_page_foto_anotation_en', // название функции для вывода
		'main_page_link', // ярлык страницы
		'main_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'en_main_photoanotation',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'en_main_photoanotation', // любые доп параметры в колбэк функцию
		)
	);

}

function main_page_options_ru( $args ){
	// получаем значение из базы данных
	$value = get_option('ru_main_text');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function main_page_options_en( $args ){
	// получаем значение из базы данных
	$value = get_option('en_main_text');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function main_page_anotation_ru( $args ){
	// получаем значение из базы данных
	$value = get_option('ru_main_anotation');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function main_page_anotation_en( $args ){
	// получаем значение из базы данных
	$value = get_option('en_main_anotation');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function main_page_foto_anotation_ru( $args ){
	// получаем значение из базы данных
	$value = get_option('ru_main_photoanotation');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function main_page_foto_anotation_en( $args ){
	// получаем значение из базы данных
	$value = get_option('en_main_photoanotation');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

?>