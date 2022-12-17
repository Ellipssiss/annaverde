<?
    require_once('../../../wp-load.php');

    $arItems = [];
    $postType = $_POST['post_type'];

    // создаем экземпляр
    $WPQuery = new WP_Query;

    if($postType == 'afisha'){
        $afishaPosts = $WPQuery -> query([
            'post_type' => 'afisha_perfomance',
            'order' => 'DESC',
            'orderby' => 'meta_value_num',
            'meta_key' => 'afisha_sort',
        ]);

        // обрабатываем результат
        foreach($afishaPosts as $key => $value){
            $afishaPostDate = get_post_meta($value -> ID, 'afisha_date', true);
            $afishaResult[$afishaPostDate][] = getAfishaPostInfo($value -> ID);
        }

        $arItems = $afishaResult;
    }

    if($postType == 'press'){
        $pressPosts = $WPQuery -> query([
            'post_type' => 'press_article',
            'order' => 'DESC',
            'orderby' => 'meta_value_num',
            'meta_key' => 'press_sort',
        ]);

        // обрабатываем результат
        foreach($pressPosts as $key => $value){
            $pressResult[] = getPressPostInfo($value -> ID);
        }

        $arItems = $pressResult;
    }

    if($postType == 'projects'){
        $projectPosts = $WPQuery -> query([
            'post_type' => 'projects',
            'order' => 'DESC',
            'orderby' => 'meta_value_num',
            'meta_key' => 'proj_sort'
        ]);

        // обрабатываем результат
        foreach($projectPosts as $key => $value){
            $pressResult[] = getProjectPostInfo($value -> ID);
        }

        $arItems = $pressResult;
    }
  
    echo json_encode($arItems);
?>