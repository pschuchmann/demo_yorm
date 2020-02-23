<?php

class Product extends \rex_yform_manager_dataset
{

    public static function populateCategories(\rex_yform_manager_collection $products)
    {
        if ($products) {
            return $products->populateRelation('category');
        }
    }

    public static function populateRatings(\rex_yform_manager_collection $products)
    {
        if ($products) {
            return $products->populateRelation('ratings');
        }
    }

    public function getName()
    {
        return $this->getValue('name_' . rex_clang::getCurrentId());
    }

    public function getTeaser()
    {
        return $this->getValue('teaser_' . rex_clang::getCurrentId());
    }

    public function getDescription()
    {
        return $this->getValue('description_' . rex_clang::getCurrentId());
    }
}