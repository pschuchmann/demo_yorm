<?php

// Die gesamte Ausgabe von Listen- und Detailansicht kann auch innerhalb eines Moduls stattfinden.

// Hole Produkte
// Optional: Anwenden verschiedener Filter oder Sortierungen
$products = Product::query()
    // ->where('category', 4) // Filter nach Kategorie
    // ->orderBy('category') // Sortierung nach Kategorie
    ->find()
;

// Relationsfelder vorbelegen, hilfreich um die Anzahl der nötigen Sql Queries zu minimieren
Product::populateCategories($products);
Product::populateRatings($products);

// Existieren Produkte zur Anfrage
if ($products) {
    
    // Durchlaufe alle Produkte
    foreach ($products as $product) {

        // Existiert das Produkt als Objekt
        if ($product) {
            
            // Lese Daten der Produktkategorie und Produktbewertungen
            // $product_category = $product->getRelatedDataset('category');
            $product_ratings = $product->getRelatedCollection('ratings');

            // Ausgabe
            // Optional Ausgabe direkt im Modu oder über rex_fragment mit Übergabe der jeweiligen Objekte
            // Innerhalb des Fragments kann/sollte der Link mittels URL Addon und der Produkt Id auf die zugehörige Detailseite generiert werden.
            $fragment = new rex_fragment();
            $fragment->setVar('product', $product); // Übergabe Produkt
            $fragment->setVar('product_category', ($product_category) ?? $product_category);  // Übergabe Produktkategorie, falls gesetzt, andernfalls null
            $fragment->setVar('product_ratings', ($product_ratings) ?? $product_ratings); // Übergabe der Produktbewertungen, falls gesetzt, andernfalls null
            echo $fragment->parse('listview.php'); //Verwende das "listview" Fragment des Addons (redaxo/src/addons/demo_yorm/fragments/)
            
        }
    }
}
