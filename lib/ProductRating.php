<?php

class ProductRating extends \rex_yform_manager_dataset
{
    public function getBuyer()
    {
        return $this->getValue('buyer');
    }

    public function getRating()
    {
        return $this->getValue('rating');
    }

    public function getRatingText()
    {
        return $this->getValue('rating_text');
    }

}
