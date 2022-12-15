<?
    require_once('../../../wp-load.php');

    $arItems = [];
    $postType = $_POST['post_type'];

    // создаем экземпляр
    $WPQuery = new WP_Query;

    if($postType == 'afisha'){
        $afishaPosts = $WPQuery -> query([
            'post_type' => 'afisha_perfomance',
        ]);

        // обрабатываем результат
        foreach($afishaPosts as $key => $value){
            $afishaPostDate = get_post_meta($value -> ID, 'afisha_date', true);
            $afishaResult[$afishaPostDate][] = getAfishaPostInfo($value -> ID);
        }

        $arItems = $afishaResult;
    }
  
    echo json_encode($arItems);
?>