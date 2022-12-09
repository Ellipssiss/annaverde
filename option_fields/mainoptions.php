<?
add_action( 'admin_init',  'main_options' );
add_action( 'admin_init',  'contacts_options' );
add_action( 'admin_init',  'social_options' );
add_action( 'admin_init',  'support_options' );

// Настройки главной страницы
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
		'Главная страница', // заголовок (не обязательно)
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

// Настройки страницы контактов
function contacts_options() {
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'contacts_phone', // ярлык опции
		// 'absint' // функция очистки
	);

	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'contacts_email', // ярлык опции
		// 'absint' // функция очистки
	);


	// добавляем секцию страницы контактов
	add_settings_section(
		'contacts_page_section_id', // ID секции, пригодится ниже
		'Страница контактов', // заголовок (не обязательно)
		'', // функция для вывода HTML секции (необязательно)
		'main_page_link' // ярлык страницы
	);

	add_settings_field(
		'contacts_phone',
		'Телефон',
		'contacts_page_phone', // название функции для вывода
		'main_page_link', // ярлык страницы
		'contacts_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'contacts_phone',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'contacts_phone', // любые доп параметры в колбэк функцию
		)
	);
	
	add_settings_field(
		'contacts_email',
		'Email',
		'email_page_phone', // название функции для вывода
		'main_page_link', // ярлык страницы
		'contacts_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'contacts_email',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'contacts_email', // любые доп параметры в колбэк функцию
		)
	);
}

function contacts_page_phone( $args ){
	// получаем значение из базы данных
	$value = get_option('contacts_phone');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function email_page_phone( $args ){
	// получаем значение из базы данных
	$value = get_option('contacts_email');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

// Настройки социальных сетей
function social_options() {
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'social_youtube', // ярлык опции
		// 'absint' // функция очистки
	);

	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'social_instagram', // ярлык опции
		// 'absint' // функция очистки
	);

	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'social_facebook', // ярлык опции
		// 'absint' // функция очистки
	);

	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'social_vk', // ярлык опции
		// 'absint' // функция очистки
	);


	// добавляем секцию страницы контактов
	add_settings_section(
		'social_page_section_id', // ID секции, пригодится ниже
		'Ссылки на социальные сети', // заголовок (не обязательно)
		'', // функция для вывода HTML секции (необязательно)
		'main_page_link' // ярлык страницы
	);

	add_settings_field(
		'social_youtube',
		'Ссылка на Youtube',
		'social_page_youtube', // название функции для вывода
		'main_page_link', // ярлык страницы
		'social_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'social_youtube',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'social_youtube', // любые доп параметры в колбэк функцию
		)
	);
	
	add_settings_field(
		'social_instagram',
		'Ссылка на Instagram',
		'social_page_instagram', // название функции для вывода
		'main_page_link', // ярлык страницы
		'social_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'social_instagram',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'social_instagram', // любые доп параметры в колбэк функцию
		)
	);
	
	add_settings_field(
		'social_facebook',
		'Ссылка на Facebook',
		'social_page_facebook', // название функции для вывода
		'main_page_link', // ярлык страницы
		'social_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'social_facebook',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'social_facebook', // любые доп параметры в колбэк функцию
		)
	);
	
	add_settings_field(
		'social_vk',
		'Ссылка на VK',
		'social_page_vk', // название функции для вывода
		'main_page_link', // ярлык страницы
		'social_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'social_vk',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'social_vk', // любые доп параметры в колбэк функцию
		)
	);
}

function social_page_youtube( $args ){
	// получаем значение из базы данных
	$value = get_option('social_youtube');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function social_page_instagram( $args ){
	// получаем значение из базы данных
	$value = get_option('social_instagram');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function social_page_facebook( $args ){
	// получаем значение из базы данных
	$value = get_option('social_facebook');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function social_page_vk( $args ){
	// получаем значение из базы данных
	$value = get_option('social_vk');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

// Страница "Поддержать нас"
function support_options() {
	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'support_donate', // ярлык опции
		// 'absint' // функция очистки
	);

	register_setting(
		'main_settings', // название настроек из предыдущего шага
		'support_qr', // ярлык опции
		// 'absint' // функция очистки
	);

	// добавляем секцию страницы контактов
	add_settings_section(
		'support_page_section_id', // ID секции, пригодится ниже
		'Страница "Поддержать нас"', // заголовок (не обязательно)
		'', // функция для вывода HTML секции (необязательно)
		'main_page_link' // ярлык страницы
	);

	add_settings_field(
		'support_donate',
		'Ссылка копки "Донатить"',
		'support_page_donate', // название функции для вывода
		'main_page_link', // ярлык страницы
		'support_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'support_donate',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'support_donate', // любые доп параметры в колбэк функцию
		)
	);

	add_settings_field(
		'support_qr',
		'Изображение QR-кода',
		'support_page_qr', // название функции для вывода
		'main_page_link', // ярлык страницы
		'support_page_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'support_qr',
			'class' => 'main_class', // для элемента <tr>
			'name' => 'support_qr', // любые доп параметры в колбэк функцию
		)
	);
}

function support_page_donate( $args ){
	// получаем значение из базы данных
	$value = get_option('support_donate');

	?>
		<input class="<? echo $args['class']; ?>" type="text" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
	<?
}

function support_page_qr( $args ){
	// получаем значение из базы данных
	$value = get_option('support_qr');

	$afishaCoverImgId = $value;
	$afishaImageAttr = wp_get_attachment_image_src($afishaCoverImgId, 'thumbnail');
	$afishaImageSrc = $afishaImageAttr[0];

	?>
		<img class="support_qr_image" alt="" src="<? echo $afishaImageSrc; ?>" /><br />
		<input class="support_qr_input" type="hidden" id="<? echo $args['name']; ?>" name="<? echo $args['name']; ?>" value="<? echo $value; ?>" />
		<button class="support_qr_add">Выбрать картику QR-кода</button>
		<button class="support_qr_clear">Очистить картинку</button>
	<?
}
?>