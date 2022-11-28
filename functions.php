<?

// based on original work from the PHP Laravel framework
if (!function_exists('str_contains')) {
    function str_contains($haystack, $needle)
    {
        return $needle !== '' && mb_strpos($haystack, $needle) !== false;
    }
}

// функция возвращает заголовок поста по заданному post id
function get_post_title($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';

    if ($isEnglish) {
        return get_post_meta($post_id, 'en_post_title_filed_name', true);
    } else {
        $post = get_post($post_id);
        return $post->post_title;
    }
}

// функция возвращает описание поста по заданному post id
function get_post_content($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';

    if ($isEnglish) {
        return get_post_meta($post_id, 'en_editor_filed_name', true);
    } else {
        $post = get_post($post_id);
        return $post->post_content;
    }
}

// функция возвращает значение пареметра director(режисер) поста по заданному post id
function get_post_director($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';

    if ($isEnglish) {
        return get_post_meta($post_id, 'en_director', true);
    } else {
        return get_post_meta($post_id, 'ru_director', true);
    }
}

// функция возвращает данные из параметра premiere(Премьера) поста по заданному post id
function get_post_premiere($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';

    if ($isEnglish) {
        return get_post_meta($post_id, 'en_premiere', true);
    } else {
        return get_post_meta($post_id, 'ru_premiere', true);
    }
}

// функция возвращает данные из параметра short_description(Короткое описание) поста по заданному post id
function get_post_short_description($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';

    if ($isEnglish) {
        return get_post_meta($post_id, 'en_short_description', true);
    } else {
        return get_post_meta($post_id, 'ru_short_description', true);
    }
}

// функция возвращает данные из параметра duration(Продолжительность) поста по заданному post id
function get_post_duration($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';

    if ($isEnglish) {
        return get_post_meta($post_id, 'en_duration', true);
    } else {
        return get_post_meta($post_id, 'ru_duration', true);
    }
}

// функция возвращает данные из параметра creator(Создатели) поста по заданному post id в виде массива 
function get_post_creators($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';
    // $isEnglish = $lang === 'en';
    if ($isEnglish) {
        // return get_post_meta($post_id, 'creator_en', true);
        return  json_decode(get_post_meta($post_id, 'creator_en', true), JSON_UNESCAPED_UNICODE);
    } else {
        // return get_post_meta($post_id, 'creator_ru', true);
        return json_decode(get_post_meta($post_id, 'creator_ru', true), JSON_UNESCAPED_UNICODE);
    }
}

// функция возвращает данные из параметра artists(Артисты) поста по заданному post id в виде массива 
function get_post_artists($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';
    // $isEnglish = $lang === 'en';
    if ($isEnglish) {
        // return get_post_meta($post_id, 'artist_en', true);
        return  json_decode(get_post_meta($post_id, 'artist_en', true), JSON_UNESCAPED_UNICODE);
    } else {
        // return get_post_meta($post_id, 'artist_ru', true);
        return json_decode(get_post_meta($post_id, 'artist_ru', true), JSON_UNESCAPED_UNICODE);
    }
}

// функция возвращает данные из параметра musicians(Музыканты) поста по заданному post id в виде массива 
function get_post_musicians($post_id)
{
    $isEnglish = $_GET['lang'] === 'en';
    // $isEnglish = $lang === 'en';
    if ($isEnglish) {
        // return get_post_meta($post_id, 'musician_en', true);
        return  json_decode(get_post_meta($post_id, 'musician_en', true), JSON_UNESCAPED_UNICODE);
    } else {
        // return get_post_meta($post_id, 'musician_ru', true);
        return json_decode(get_post_meta($post_id, 'musician_ru', true), JSON_UNESCAPED_UNICODE);
    }
}

/*
* функция добавления редактора
*/
function true_double_editor()
{
    global $post;

    echo '<h2>Английский заголовок</h2>'; // заголовок ко второму редактору
    echo '
    <div id="titlediv">
        <div id="titlewrap">
            <label class="screen-reader-text" id="title-prompt-text" for="title">Добавить заголовок</label>
            <input type="text" name="en_post_title" size="30" value="' . get_post_meta($post->ID, 'en_post_title_filed_name', true) . '" id="title" spellcheck="true" autocomplete="off">
        </div>
    </div>';

    echo '<h2>Английское описание</h2>'; // заголовок ко второму редактору
    wp_editor(get_post_meta($post->ID, 'en_editor_filed_name', true), 'en_editor');
}

add_action('edit_form_advanced', 'true_double_editor');
add_action('edit_page_form', 'true_double_editor');

/*
* функция сохранения данных
*/
function double_editor($post_id)
{
    update_post_meta($post_id, 'en_editor_filed_name', $_POST['en_editor']);
    update_post_meta($post_id, 'en_post_title_filed_name', $_POST['en_post_title']);
}

add_action('save_post', 'double_editor');

class True_Walker_Nav_Menu extends Walker_Nav_Menu
{
    /*
	 * Позволяет перезаписать <ul class="sub-menu">
	 */
    function start_lvl(&$output, $depth = 0, $args = NULL)
    {
        // для WordPress 5.3+
        // function start_lvl( &$output, $depth = 0, $args = NULL ) {
        /*
		 * $depth – уровень вложенности, например 2,3 и т д
		 */
        $output .= '<ul class="menu_sublist">';
    }
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output
     * @param object $item Объект элемента меню, подробнее ниже.
     * @param int $depth Уровень вложенности элемента меню.
     * @param object $args Параметры функции wp_nav_menu
     */
    function start_el(&$output, $data_object, $depth = 0, $args = NULL, $current_object_id = 0)
    {
        // для WordPress 5.3+
        // function start_el( &$output, $item, $depth = 0, $args = NULL, $id = 0 ) {
        global $wp_query;
        /*
		 * Некоторые из параметров объекта $item
		 * ID - ID самого элемента меню, а не объекта на который он ссылается
		 * menu_item_parent - ID родительского элемента меню
		 * classes - массив классов элемента меню
		 * post_date - дата добавления
		 * post_modified - дата последнего изменения
		 * post_author - ID пользователя, добавившего этот элемент меню
		 * title - заголовок элемента меню
		 * url - ссылка
		 * attr_title - HTML-атрибут title ссылки
		 * xfn - атрибут rel
		 * target - атрибут target
		 * current - равен 1, если является текущим элементом
		 * current_item_ancestor - равен 1, если текущим (открытым на сайте) является вложенный элемент данного
		 * current_item_parent - равен 1, если текущим (открытым на сайте) является родительский элемент данного
		 * menu_order - порядок в меню
		 * object_id - ID объекта меню
		 * type - тип объекта меню (таксономия, пост, произвольно)
		 * object - какая это таксономия / какой тип поста (page /category / post_tag и т д)
		 * type_label - название данного типа с локализацией (Рубрика, Страница)
		 * post_parent - ID родительского поста / категории
		 * post_title - заголовок, который был у поста, когда он был добавлен в меню
		 * post_name - ярлык, который был у поста при его добавлении в меню
		 */
        $indent = ($depth) ? str_repeat("\t", $depth) : '';
        $menu_item = $data_object;
        $title = apply_filters('the_title', $menu_item->title, $menu_item->ID);
        $title = apply_filters('nav_menu_item_title', $title, $menu_item, $args, $depth);

        /*
		 * Генерируем строку с CSS-классами элемента меню
		 */
        $class_names = $value = '';
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        // функция join превращает массив в строку
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        get_page_link($post = false, $leavename = false, $sample = false);
        /*
		 * Генерируем ID элемента
		 */
        $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
        $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

        /*
		 * Генерируем элемент меню
		 */
        $output .= $indent . '<li' . $id . $value . $class_names . '>';

        $item_href = $menu_item->url;
        // ссылка и околоссылочный текст
        $item_output = $args->before;
        $item_output .= '<a href="' . $item_href . '"' . $pageId . $attributes . '>';
        // $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= $item_output;
    }
}

// функция определения модификитора класса для хэдера
function get_modificator_header_class()
{
    $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $urlMainPage = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';

    $url = explode('?', $url);

    $url = $url[0];
    $output .= null;

    if (str_contains($url, $urlMainPage)) {
        $output .= 'header_main';
    } elseif (str_contains($url, '404')) {
        $output .= 'black_header';
    } else {
        $output .= 'white_header';
    }

    echo $output;
}



// Добавляем новый тип постов
add_action('init', 'true_register_post_type_init');
function true_register_post_type_init()
{
    // Добавляем новый тип постов (Проекты)
    $labels_proj = array(
        'name' => 'Проекты',
        'singular_name' => 'проекты',
        'add_new' => 'Добавить проект',
        'add_new_item' => 'Добавить новый проект',
        'edit_item' => 'Редактировать проект',
        'new_item' => 'Новый проект',
        'all_items' => 'Все проекты',
        'view_item' => 'Просмотр проекта на сайте',
        'search_items' => 'Искать проект',
        'not_found' =>  'Проекты не найдены',
        'not_found_in_trash' => 'В корзине нет проектов',
        'menu_name' => 'Проекты'
    );
    $args_proj = array(
        'labels' => $labels_proj,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        'menu_icon' => 'dashicons-superhero-alt', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'editor', 'comments', 'author', 'thumbnail')
    );


    // Добавляем новый тип постов (Афиша - выступления)
    $labels_perf = array(
        'name' => 'Выступления',
        'singular_name' => 'Выступления в афише',
        'add_new' => 'Добавить выступление',
        'add_new_item' => 'Добавить новое выступление',
        'edit_item' => 'Редактировать выступление',
        'new_item' => 'Новое выступление',
        'all_items' => 'Все выступления',
        'view_item' => 'Просмотр выступления на сайте',
        'search_items' => 'Искать выступления',
        'not_found' =>  'выступления не найдены',
        'not_found_in_trash' => 'В корзине нет выступлений',
        'menu_name' => 'Афиша'
    );
    $args_perf = array(
        'labels' => $labels_perf,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        'menu_icon' => 'dashicons-tickets', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'comments', 'author', 'editor', 'thumbnail')  //'custom-fields', ,
    );

    // Добавляем новый тип постов (Пресса - статьи)
    $labels_press = array(
        'name' => 'Статьи',
        'singular_name' => 'Статьи в прессе',
        'add_new' => 'Добавить статью',
        'add_new_item' => 'Добавить новую статью',
        'edit_item' => 'Редактировать статью',
        'new_item' => 'Новая статья',
        'all_items' => 'Все статьи',
        'view_item' => 'Просмотр статей на сайте',
        'search_items' => 'Искать статьи',
        'not_found' =>  'статьи не найдены',
        'not_found_in_trash' => 'В корзине нет статей',
        'menu_name' => 'Пресса'
    );
    $args_press = array(
        'labels' => $labels_press,
        'public' => true,
        'show_ui' => true, // показывать интерфейс в админке
        'has_archive' => true,
        'menu_icon' => 'dashicons-book-alt', // иконка в меню
        'menu_position' => 20, // порядок в меню
        'supports' => array('title', 'editor', 'comments', 'author', 'thumbnail')
    );
    register_post_type('projects', $args_proj);
    register_post_type('afisha_perfomance', $args_perf);
    register_post_type('press_article', $args_press);
}

// Добавляем новый метабокс 
add_action('add_meta_boxes', 'add_media_metabox');
function add_media_metabox()
{
    // Создание метабоксов в админке для типа постов "Проект"
    add_meta_box('creators', 'Создатели', 'create_creators_layout', 'projects', 'normal', 'low');
    add_meta_box('artists', 'Артисты', 'create_artists_layout', 'projects', 'normal', 'low');
    add_meta_box('musicians', 'Музыканты', 'create_musicians_layout', 'projects', 'normal', 'low');
    add_meta_box('premiere', 'Премьера', 'create_premiere_layout', 'projects', 'normal', 'low');
    add_meta_box('short_description', 'Кртакое описание', 'create_short_description_layout', 'projects', 'normal', 'low');
    add_meta_box('duration', 'Продолжительность', 'create_duration_layout', 'projects', 'normal', 'low');
    add_meta_box('proj_media', 'Изображения', 'func_proj_mediabox', 'projects', 'normal', 'low');

    add_meta_box('afisha_project_selector', 'Выбор проекта', 'create_selector_of_project_layout', 'afisha_perfomance', 'normal', 'low');



    // add_meta_box('proj_media', 'Изображения', 'func_proj_mediabox', 'projects', 'normal', 'low');
}

// Создание верстки метабокса для заполнения информации о времени проведения выступления
function create_selector_of_project_layout($post)
{
    $value = get_post_meta($post->ID, 'field_day_events', true);
    $arValue = json_decode($value, JSON_UNESCAPED_UNICODE);
    $projectsList = getProjectPosts('all');

    if ($value === '') $value = '[]';
    if ($arValue === null) $arValue = [];
?>
    <input class="field_day_events" type="hidden" name="field_day_events" value='<? echo $value; ?>' />
    <table class="day_events" border="1">
        <thead>
            <tr>
                <th>Спектакль</th>
                <th>Время</th>
                <th>Место</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($arValue as $key => $val) { ?>
                <tr>
                    <td><? echo $arValue[$key]['name']; ?></td>
                    <td><? echo $arValue[$key]['time']; ?></td>
                    <td><? echo $arValue[$key]['place']; ?></td>
                    <td><a class="day_events_delete" href="javascript:void(0)" data-id="<? echo $arValue[$key]['id']; ?>">Удалить</a></td>
                </tr>
            <? } ?>
        </tbody>
    </table>

    <div>
        <p>Проект:</p>
        <select class="event_projects" name="event_projects">
            <? foreach ($projectsList['posts'] as $key => $value) { ?>
                <? $projectId = $projectsList['posts'][$key]->ID; ?>
                <option value="<? echo $projectId; ?>"><? echo get_post_title($projectId) ?></option>

            <? } ?>
        </select>
        <p>Время:</p>
        <input class="event_time" type="text" name="event_time" />
        <p>Место:</p>
        <input class="event_place" type="text" name="event_place" /><br /><br />
        <button type="button" name="add_perfomance" id="add_perfomance" class="button button-primary button-large flex_button">Добавить выступление</button>
    </div>

<?
}




// Создание верстки метабокса для заполнения информации о создателях проекта
function create_creators_layout($post)
{
    $value = get_post_meta($post->ID, 'proj_type', true);
    $creator_en = json_decode(get_post_meta($post->ID, 'creator_en', true), JSON_UNESCAPED_UNICODE);
    $creator_ru = json_decode(get_post_meta($post->ID, 'creator_ru', true), JSON_UNESCAPED_UNICODE);
?>
    <div class="titles_roles_header">
        <p class="creators_count_title">№</p>
        <div class="role_input">
            <h4 class="input_category_title">On English</h4>
            <div class="lang_select_title">
                <p>Role</p>
                <p>Name</p>
            </div>
        </div>
        <div class="name_input">
            <h4 class="input_category_title">На русском</h4>
            <div class="lang_select_title">
                <p>Роль</p>
                <p>Имя</p>
            </div>
        </div>
    </div>

    <?
    if ($creator_ru == null) {
        $creator_ru = array();
        $creator_ru[0] = array(
            'role' => 'пожалуйста введите роль',
            'name' => 'пожалуйста введите имя',
        );
    };
    if ($creator_en == null) {
        $creator_en = array();
        $creator_en[0] = array(
            'role' => 'Please insert role',
            'name' => 'Please insert name',
        );
    }
    ?>

    <div class="input_grid input_grid_creator" lastKeyCreator="<? echo array_key_last($creator_en); ?>">
        <div class="input_column input_column_creator_en"><? foreach ($creator_en as $key => $value) { ?>
                <div class="input_row">
                    <p class="creators_count"><? echo $i = $key + 1 ?></p>
                    <input class="input_string_field" type="text" name="creator_en[<? echo $key; ?>][role]" value="<? echo $value['role']; ?>" />
                    <input class="input_string_field" type="text" name="creator_en[<? echo $key; ?>][name]" value="<? echo $value['name']; ?>" />
                </div>
            <? } ?>
        </div>
        <div class="input_column input_column_creator_ru"><? foreach ($creator_ru as $key => $value) { ?>
                <div class="input_row">
                    <input class="input_string_field" type="text" name="creator_ru[<? echo $key; ?>][role]" value="<? echo $value['role']; ?>" />
                    <input class="input_string_field" type="text" name="creator_ru[<? echo $key; ?>][name]" value="<? echo $value['name']; ?>" />
                </div>
            <? } ?>
        </div>
    </div>
    <div class="button_wrapper">
        <button type="button" name="add_creator" id="add_creator" class="button button-primary button-large flex_button">Добавить создателя</button>
        <button type="button" name="del_creator" id="del_creator" class="red_button flex_button">Удалить создателя</button>
    </div>

<?
}



// Создание верстки метабокса для заполнения информации об артистах проекта
function create_artists_layout($post)
{
    // $value = get_post_meta($post->ID, 'proj_type', true);

    // $ru_director = get_post_meta($post->ID, 'ru_director', true);
    // $en_director = get_post_meta($post->ID, 'en_director', true);
    $artist_en = json_decode(get_post_meta($post->ID, 'artist_en', true), JSON_UNESCAPED_UNICODE);
    $artist_ru = json_decode(get_post_meta($post->ID, 'artist_ru', true), JSON_UNESCAPED_UNICODE);
?>
    <!-- <select class="proj_type" name="proj_type">
        <option value="arh" <? echo $value === 'arh' ? 'selected' : '' ?>>Архитектура</option>
        <option value="int" <? echo $value === 'int' ? 'selected' : '' ?>>Интерьеры</option>
    </select> -->

    <!-- <h2>Режиссеры</h2>
    <div><span>Русское название</span><input type="text" name="ru_director" value="<? echo $ru_director; ?>" /></div>
    <div><span>Английское название</span><input type="text" name="en_director" value="<? echo $en_director; ?>" /></div> -->

    <div class="titles_roles_header">
        <p class="creators_count_title">№</p>
        <div class="role_input">
            <h4 class="input_category_title">On English</h4>
            <div class="lang_select_title">
                <p>Role</p>
                <p>Name</p>
            </div>
        </div>
        <div class="name_input">
            <h4 class="input_category_title">На русском</h4>
            <div class="lang_select_title">
                <p>Роль</p>
                <p>Имя</p>
            </div>
        </div>
    </div>

    <?
    if ($artist_ru == null) {
        $artist_ru = array();
        $artist_ru[0] = array(
            'role' => 'пожалуйста введите роль',
            'name' => 'пожалуйста введите имя',
        );
    };
    if ($artist_en == null) {
        $artist_en = array();
        $artist_en[0] = array(
            'role' => 'Please insert role',
            'name' => 'Please insert name',
        );
        foreach ($artist_en as $key => $value) {
        };
    }


    ?>

    <div class="input_grid input_grid_artists" lastKeyCreator="<? echo array_key_last($artist_en); ?>">
        <div class="input_column input_column_artist_en"><? foreach ($artist_en as $key => $value) { ?>
                <div class="input_row">
                    <p class="creators_count"><? echo $i = $key + 1 ?></p>
                    <input class="input_string_field" type="text" name="artist_en[<? echo $key; ?>][role]" value="<? echo $value['role']; ?>" />
                    <input class="input_string_field" type="text" name="artist_en[<? echo $key; ?>][name]" value="<? echo $value['name']; ?>" />
                </div>
            <? } ?>
        </div>
        <div class="input_column input_column_artist_ru"><? foreach ($artist_ru as $key => $value) { ?>
                <div class="input_row">
                    <input class="input_string_field" type="text" name="artist_ru[<? echo $key; ?>][role]" value="<? echo $value['role']; ?>" />
                    <input class="input_string_field" type="text" name="artist_ru[<? echo $key; ?>][name]" value="<? echo $value['name']; ?>" />
                </div>
            <? } ?>
        </div>
    </div>
    <div class="button_wrapper">
        <button type="button" name="add_artist" id="add_artist" class="button button-primary button-large flex_button">Добавить Артиста</button>
        <button type="button" name="del_artist" id="del_artist" class="red_button flex_button">Удалить Артиста</button>
    </div>

<?
}

// Создание верстки метабокса для заполнения информации о музыкантах проекта
function create_musicians_layout($post)
{
    $value = get_post_meta($post->ID, 'proj_type', true);
    $musician_en = json_decode(get_post_meta($post->ID, 'musician_en', true), JSON_UNESCAPED_UNICODE);
    $musician_ru = json_decode(get_post_meta($post->ID, 'musician_ru', true), JSON_UNESCAPED_UNICODE);
?>

    <div class="titles_roles_header">
        <p class="creators_count_title">№</p>
        <div class="role_input">
            <h4 class="input_category_title">On English</h4>
            <div class="lang_select_title">
                <p>Role</p>
                <p>Name</p>
            </div>
        </div>
        <div class="name_input">
            <h4 class="input_category_title">На русском</h4>
            <div class="lang_select_title">
                <p>Роль</p>
                <p>Имя</p>
            </div>
        </div>
    </div>

    <?
    if ($musician_ru == null) {
        $musician_ru = array();
        $musician_ru[0] = array(
            'role' => 'пожалуйста введите роль',
            'name' => 'пожалуйста введите имя',
        );
    };
    if ($musician_en == null) {
        $musician_en = array();
        $musician_en[0] = array(
            'role' => 'Please insert role',
            'name' => 'Please insert name',
        );
    }
    ?>

    <div class="input_grid input_grid_musician" lastKeyCreator="<? echo array_key_last($musician_en); ?>">
        <div class="input_column input_column_musician_en"><? foreach ($musician_en as $key => $value) { ?>
                <div class="input_row">

                    <p class="creators_count"><? echo $i = $key + 1 ?></p>
                    <input class="input_string_field" type="text" name="musician_en[<? echo $key; ?>][role]" value="<? echo $value['role']; ?>" />
                    <input class="input_string_field" type="text" name="musician_en[<? echo $key; ?>][name]" value="<? echo $value['name']; ?>" />
                </div>
            <? } ?>

        </div>
        <div class="input_column input_column_musician_ru"><? foreach ($musician_ru as $key => $value) { ?>
                <div class="input_row">
                    <input class="input_string_field" type="text" name="musician_ru[<? echo $key; ?>][role]" value="<? echo $value['role']; ?>" />
                    <input class="input_string_field" type="text" name="musician_ru[<? echo $key; ?>][name]" value="<? echo $value['name']; ?>" />
                </div>
            <? } ?>
        </div>
    </div>

    <div class="button_wrapper">
        <button type="button" name="add_misician" id="add_musician" class="button button-primary button-large flex_button">Добавить Музыканта</button>
        <button type="button" name="del_misician" id="del_musician" class="red_button flex_button">Удалить Музыканта</button>
    </div>
<?
}


// Создание верстки метабокса для заполнения информации о премьере проекта
function create_premiere_layout($post)
{

    $ru_premiere = get_post_meta($post->ID, 'ru_premiere', true);
    $en_premiere = get_post_meta($post->ID, 'en_premiere', true);

?>

    <h4>
        Пожалуйста, введите краткую информацию о меcте и дате премьеры ниже. Например, "Премьера 29 апреля 2022 года в Москве"
    </h4>

    <textarea class="input_text_area" name="ru_premiere" id="ru_premiere_textarea" cols="30" rows="10"><? echo $ru_premiere; ?></textarea>

    <h4>
        Please enter a summary of the premiere location and date below. For example, "Premier April 29, 2022 in Moscow"
    </h4>

    <textarea class="input_text_area" name="en_premiere" id="en_premiere_textarea" cols="30" rows="10"><? echo $en_premiere; ?></textarea>


<?
}

// Создание верстки метабокса для заполнения краткой информации о премьере проекта
function create_short_description_layout($post)
{
    $ru_short_description = get_post_meta($post->ID, 'ru_short_description', true);
    $en_short_description = get_post_meta($post->ID, 'en_short_description', true);
?>

    <h4>
        Пожалуйста, введите краткое описание проекта. Например, "Синтез хореографии, драмы и инструментальной музыки"
    </h4>

    <textarea class="input_text_area" name="ru_short_description" id="ru_short_description_textarea" cols="30" rows="10"><? echo $ru_short_description; ?></textarea>

    <h4>
        Please enter a short description of the project. For example, "Synthesis of choreography, drama and instrumental music"
    </h4>

    <textarea class="input_text_area" name="en_short_description" id="en_short_description_textarea" cols="30" rows="10"><? echo $en_short_description; ?></textarea>


<?
}

// Создание верстки метабокса для заполнения информации о продолжительности проекта
function create_duration_layout($post)
{
    $ru_duration = get_post_meta($post->ID, 'ru_duration', true);
    $en_duration = get_post_meta($post->ID, 'en_duration', true);
?>

    <h4>
        Пожалуйста, введите описание продолжительности проекта. Например, "Продолжительность: 1 час, 30 минут"
    </h4>

    <textarea class="input_text_area" name="ru_duration" id="ru_duration" cols="30" rows="10"><? echo $ru_duration; ?></textarea>

    <h4>
        Please enter a description of the duration of the project. For example, "Duration: 1 hour, 30 minutes"
    </h4>

    <textarea class="input_text_area" name="en_duration" id="en_duration" cols="30" rows="10"><? echo $en_duration; ?></textarea>


<?
}


function func_proj_mediabox($post)
{
    $postId = $post->ID;

    $projCoverImgId = get_post_meta($postId, 'proj_label', true);
    $projImageAttr = wp_get_attachment_image_src($projCoverImgId, array(115, 90));
    $projImageSrc = $projImageAttr[0];

    $allProjCoverImgId = get_post_meta($postId, 'all_proj_label', true);
    $allProjImageAttr = wp_get_attachment_image_src($allProjCoverImgId, array(115, 90));
    $allProjImageSrc = $allProjImageAttr[0];

    $projImagesJSON = get_post_meta($postId, 'proj_images', true);
    $projImagesArr = json_decode($projImagesJSON);

    if ($projImagesJSON === '') $projImagesJSON = '[]';
    if (empty($projImagesArr)) $projImagesArr = [];
?>
    <div class="proj_labelbox">
        <h4>Добавить обложку на страницу одного проекта</h4>
        <p>Обложка должна быть размером 1920х1015 пикселя</p>
        <img class="proj_labelimg" alt="" src="<? echo $projImageSrc; ?>" />
        <input class="proj_labelinput" type="hidden" name="proj_label" value="<? echo $projCoverImgId; ?>" />
        <div class="proj_button_box">
            <button class="proj_add_cover">Добавить обложку</button>
            <button class="proj_clear_cover">Очистить обложку</button>
        </div>

        <h4>Добавить обложку на страницу всех проектов</h4>
        <p>Обложка должна быть размером 180x120 пикселя</p>
        <img class="all_proj_labelimg" alt="" src="<? echo $allProjImageSrc; ?>" />
        <input class="all_proj_labelinput" type="hidden" name="all_proj_label" value="<? echo $allProjCoverImgId; ?>" />
        <div class="all_proj_button_box">
            <button class="all_proj_add_cover">Добавить обложку</button>
            <button class="all_proj_clear_cover">Очистить обложку</button>
        </div>

        <h4>Добавить картинки в проект</h4>
        <p>Картинки должны быть размером 1920х1015 пикселей</p>
        <input class="proj_images_input" type="hidden" name="proj_images" autocomplete="off" value="<? echo $projImagesJSON; ?>" />
        <div class="proj_images_box">
            <? foreach ($projImagesArr as $item) {
                $itemImage = wp_get_attachment_image_src($item, array(150, 150));
            ?>
                <span class="proj_images_item" data-id="<? echo $item ?>">
                    <span class="close proj_images_item_close"><img alt="" src="<? echo get_template_directory_uri(); ?>/assets/img/admin_close.svg" /></span>
                    <img alt="" src="<? echo $itemImage[0]; ?>" />
                </span>
            <? } ?>
        </div>
        <div class="proj_images_buttons">
            <button class="proj_images_buttons_add_button">Добавить картинку</button>
        </div>
    </div>
<?
}

// Сохраняем данные из мета-бокса
add_action('save_post', 'func_save_proj_post');
function func_save_proj_post($post_id)
{
    update_post_meta($post_id, 'field_day_events', $_POST['field_day_events']);

    update_post_meta($post_id, 'proj_label', $_POST['proj_label']);
    update_post_meta($post_id, 'all_proj_label', $_POST['all_proj_label']);
    update_post_meta($post_id, 'proj_images', $_POST['proj_images']);
    update_post_meta($post_id, 'en_proj_type', $_POST['proj_type']);

    update_post_meta($post_id, 'ru_director', $_POST['ru_director']);
    update_post_meta($post_id, 'en_director', $_POST['en_director']);

    update_post_meta($post_id, 'creator_en', json_encode($_POST['creator_en'], JSON_UNESCAPED_UNICODE));
    update_post_meta($post_id, 'creator_ru', json_encode($_POST['creator_ru'], JSON_UNESCAPED_UNICODE));
    update_post_meta($post_id, 'artist_en', json_encode($_POST['artist_en'], JSON_UNESCAPED_UNICODE));
    update_post_meta($post_id, 'artist_ru', json_encode($_POST['artist_ru'], JSON_UNESCAPED_UNICODE));
    update_post_meta($post_id, 'musician_en', json_encode($_POST['musician_en'], JSON_UNESCAPED_UNICODE));
    update_post_meta($post_id, 'musician_ru', json_encode($_POST['musician_ru'], JSON_UNESCAPED_UNICODE));

    update_post_meta($post_id, 'ru_premiere', $_POST['ru_premiere']);
    update_post_meta($post_id, 'en_premiere', $_POST['en_premiere']);

    update_post_meta($post_id, 'ru_short_description', $_POST['ru_short_description']);
    update_post_meta($post_id, 'en_short_description', $_POST['en_short_description']);

    update_post_meta($post_id, 'ru_duration', $_POST['ru_duration']);
    update_post_meta($post_id, 'en_duration', $_POST['en_duration']);

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }


    if ($_POST['proj_modify'] === 'true') {
        update_post_meta($post_id, 'proj_label', $_POST['proj_label']);
        update_post_meta($post_id, 'proj_images', $_POST['proj_images']);
        update_post_meta($post_id, 'proj_type', $_POST['proj_type']);
    }


    // echo "<pre>";
    // print_r(json_encode($_POST['creator_en']));
    // echo "</pre>";

    return $post_id;
}

function getProjectPosts()
{
    $args = [
        'post_type' => 'projects',
        'posts_per_page' => 10,
        'paged' => (get_query_var('paged') ? get_query_var('paged') : 1),
    ];

    if ($_GET['filter'] === 'int') {
        $args['meta_query'] = [[
            'key' => 'proj_type',
            'value' => 'int',
        ]];
    }

    if ($_GET['filter'] === 'arh') {
        $args['meta_query'] = [[
            'key' => 'proj_type',
            'value' => 'arh',
        ]];
    }

    if ($_GET['filter'] === 'all') {
        $args['meta_query'] = [];
    }

    $wp_query = new WP_Query($args);

    return [
        'posts' => get_posts($args),
        'count' => $wp_query->found_posts
    ];
}

// Функция для получения названия типа проекта
function getProjectTypeValue($type)
{
    if ($type === 'int') {
        $result = 'Интерьеры';
    }
    if ($type === 'arh') {
        $result = 'Архитектура';
    }

    return $result;
}

// Добавление поддержки кастомного меню в текущую тему
add_theme_support('menus');

// Регистрация возможных областей размещения меню
register_nav_menus(
    array(
        'header_menu' => 'Шапка сайта', // id области => Название области
        'footer_menu' => 'Подвал сайта',
        'burger_menu' => 'Мобильное меню',
    )
);

// Подключаем стили к админке
add_action('admin_head', 'func_admin_style');
function func_admin_style()
{
    wp_enqueue_style('style-main', get_stylesheet_directory_uri() . '/assets/css/style.css');
    wp_enqueue_style('style-admin', get_stylesheet_directory_uri() . '/assets/css/admin_style.css');
}

// Подключаем скрипты в админке
add_action('admin_enqueue_scripts', 'func_admin_scripts');
function func_admin_scripts()
{
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }


    wp_enqueue_script(
        'customjquery',
        get_template_directory_uri() . '/assets/js/jquery-3.6.0.min.js'
    );

    wp_enqueue_script(
        'customadminscript',
        get_template_directory_uri() . '/assets/js/admin_script.js'
    );

    $projectPosts = getProjectPosts('all');

    $translation_array = array(
        'templateUrl' => get_stylesheet_directory_uri(),
        'projectPosts' => $projectPosts['posts'],
    );

    wp_localize_script('customadminscript', 'FromBackend', $translation_array);
}

?>