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

// clear table cache
rex_yform_manager_table::deleteCache();
