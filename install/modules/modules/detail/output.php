<?php

// Die gesamte Ausgabe von Listen- und Detailansicht kann auch innerhalb eines Moduls stattfinden.

// Hole Produkt mit der Id 5
// Die Id des Datensatzes kann beispielsweise mit dem URL Addon geholt werden und an die Query des Produkts übergeben werden.

$product = Product::query()
    ->findId(5);

if ($product) {
    $product_category = $product->getRelatedDataset('category');
    $product_ratings = $product->getRelatedCollection('ratings');

    $fragment = new rex_fragment();
    $fragment->setVar('product', $product);
    $fragment->setVar('product_category', ($product_category) ?? $product_category);
    $fragment->setVar('product_ratings', ($product_ratings) ?? $product_ratings);
    echo $fragment->parse('detailview.php');
}
