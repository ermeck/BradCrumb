<?php
/**
 * Plugin Name: Хлебные крошки в title
 * Description: Добавляем полный путь в title страниц. Для корректной работы плагина, тег title шаблона header.php должен выглядеть так: &lt;title&gt;&lt;?php wp_title(); ?&gt;&lt;/title&gt;
 * Plugin URI: http://ermeck.com
 * Author: i2gun
 * Author URI: http://ermeck.com
 */



// это второй хук с функцией 'wp_title', первый в файле functions.php поэтому,
// ..чтобы он выполнился позже - задаем ему приоритет 20
add_filter( 'wp_title', 'i2g_title', 20 );  

function i2g_title ($title) {
    // обнуляем заголовок
    $title = null;
    // разделитель
    $sep = ' - ';
    // получаем название сайта
    $site = get_bloginfo( 'name' );

    /**
     * ГЛАВНАЯ СТРАНИЦА
     */
    // is_home() функция, true - если на главной странице лента последних записей
    // is_front_page() - true - если на главной странице - статичная страница
    if ( is_home() || is_front_page() ) {
        // В тайтле - массив, чтобы проще было оперировать
        $title = array($site);
    }


    return $title;
}