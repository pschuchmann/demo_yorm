<?php

class ProductCategory extends \rex_yform_manager_dataset
{
    public function getName()
    {
        return $this->getValue('name_' . rex_clang::getCurrentId());
    }

    public function getDescription()
    {
        return $this->getValue('description_' . rex_clang::getCurrentId());
    }
}
