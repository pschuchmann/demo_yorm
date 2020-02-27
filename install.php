<?php

/** @var rex_addon $this */

//Install tables via table manager api
$table_definitions = $this->getPath('install/tables.json');
if (file_exists($table_definitions)) {
    $table_data = file_get_contents($table_definitions);
    rex_yform_manager_table_api::importTablesets($table_data);
}

//Add Mediapool Files
$zipArchive = new ZipArchive();
try {
    if (true === $zipArchive->open($this->getPath('install/media.zip')) &&
        true === $zipArchive->extractTo(rex_path::media())) {
        for ($i = 0; $i < $zipArchive->numFiles; ++$i) {
            $name = $zipArchive->statIndex($i)['name'];

            if (rex_media::get($name)) {
                continue;
            }
            rex_mediapool_syncFile($name, 0, '');
        }

        $zipArchive->close();
    } else {
        $message = rex_i18n::msg('error_copy_media');
    }
} catch (Exception $e) {
    $message = rex_i18n::msg('error_copy_media');
    $message .= '<br>' . $e->getMessage();
}

// Insert demo data
if (0 === Product::getAll()->count() && 0 === ProductCategory::getAll()->count() && 0 === ProductRating::getAll()->count()) {
    for ($i = 12; $i <= 16; ++$i) {
        $items = rex_sql::factory();
        $items->setTable('rex_product_category');
        $items->setValue('id', ($i - 11));
        $items->setValue('name_1', 'Kategoriename '. ($i - 11));
        $items->setValue('description_1', file_get_contents('https://loripsum.net/api/3/short'));
        $items->setValue('media', $i. '.jpg');
        $items->insertOrUpdate();
    }

    for ($i = 1; $i <= 12; ++$i) {
        $array = preg_filter('/$/', '.jpg', range(1, 12));
        shuffle($array);
        $array = array_slice($array, random_int(2, 4), random_int(4, 8));
        $array = implode(',', $array);

        $items = rex_sql::factory();
        $items->setTable('rex_product');
        $items->setValue('id', $i);
        $items->setValue('name_1', 'Produktname '.$i);
        $items->setValue('teaser_1', file_get_contents('https://loripsum.net/api/2/short'));
        $items->setValue('description_1', file_get_contents('https://loripsum.net/api/6/medium/headers'));
        $items->setValue('media', $i. '.jpg');
        $items->setValue('gallery', $array);
        $items->setValue('price', random_int(50, 200));
        $items->setValue('category', random_int(1, 4));
        $items->insertOrUpdate();
    }

    $url = 'https://uinames.com/api/?amount=30&region=germany';
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
    ]);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $result = curl_exec($curl);
    $result = json_decode($result, TRUE);

    for ($i = 1; $i <= 30; ++$i) {
        $items = rex_sql::factory();
        $items->setTable('rex_product_rating');
        $items->setValue('id', $i);
        $items->setValue('buyer', $result[$i]['name'] . ' ' . $result[$i]['surname']);
        $items->setValue('rating', random_int(1, 5));
        $items->setValue('rating_text', file_get_contents('https://loripsum.net/api/4/short'));
        $items->setValue('product_id', random_int(1, 12));
        $items->insertOrUpdate();
    }
}

// clear table cache
rex_yform_manager_table::deleteCache();
