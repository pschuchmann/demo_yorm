<?php

/** @var rex_addon $this */

// Yorm ORM Klasse registrieren
rex_yform_manager_dataset::setModelClass(rex::getTable('product'), Product::class);
rex_yform_manager_dataset::setModelClass(rex::getTable('product_category'), ProductCategory::class);
rex_yform_manager_dataset::setModelClass(rex::getTable('product_rating'), ProductRating::class);

// Addonrechte (permissions) registieren
if (rex::isBackend() && is_object(rex::getUser())) {
    rex_perm::register('demo_yorm[]');
    rex_perm::register('demo_yorm[Product]');
    rex_perm::register('demo_yorm[ProductCategory]');
    rex_perm::register('demo_yorm[ProductRating]');
    rex_perm::register('demo_yorm[config]');
}

// Assets werden bei der Installation des Addons in den assets-Ordner kopiert und stehen damit
// öffentlich zur Verfügung. Sie müssen dann allerdings noch eingebunden werden:

// Assets im Backend einbinden
if (rex::isBackend() && rex::getUser()) {
    // Die style.css nur auf Addon Seiten einbinden
    if ('demo_yorm' === rex_be_controller::getCurrentPagePart(1)) {
        rex_view::addCssFile($this->getAssetsUrl('css/style.css'));
    }
}
