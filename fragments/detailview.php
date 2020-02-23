<?php if ($this->product) : ?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <?php if ($this->product && !empty($this->product->media)) : ?>
            <?=rex_media::get($this->product->media)->toImage(['style' => 'width: 100%; max-width: 100%; height: auto;', 'alt' => $this->product->getName()]); ?>
            <?php endif; ?>
        </div>
        <div class="col-8">
            <?php if (!empty($this->product->getName())) : ?>
            <h1><?=$this->product->getName(); ?>
            </h1>
            <?php if (!empty($this->product_category->getName())) : ?>
            <h3><?=$this->product_category->getName(); ?>
            </h3>
            <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <div class="row">
                <?php if (!empty($this->product->gallery)) : ?>
                <?php foreach (explode(',', $this->product->gallery) as $gallery_item) : ?>
                <div class="col-6">
                    <?=rex_media::get($gallery_item)->toImage(['style' => 'width: 100%; max-width: 100%; height: auto;', 'alt' => $this->product->getName()]); ?>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
        <?php if (!empty($this->product->getDescription())) : ?>
        <div class="col-8">
            <?=$this->product->getDescription(); ?>
        </div>
        <?php endif; ?>
        <div class="row">
            <?php if ($this->product_ratings) : ?>
            <?php foreach ($this->product_ratings as $product_rating) : ?>
            <?php if ($product_rating) : ?>
            <div class="col-12">
                <p><?= $product_rating->getRating()?> Stern/-e</p>
                <?= $product_rating->getRatingText()?>
                <p><small><?= $product_rating->getBuyer()?></small>
                </p>
                <hr />
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .container {
            max-width: 1200px;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin-right: -15px;
            margin-left: -15px;
        }

        .vertical-align-center {

            align-items: center;
        }

        .col-3 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            flex: 0 0 25%;
            max-width: 25%;
        }

        .col-4 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            flex: 0 0 33.3333333%;
            max-width: 33.3333333%;
        }

        .col-6 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            flex: 0 0 50%;
            max-width: 50%;
        }

        .col-8 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            flex: 0 0 66.6666667%;
            max-width: 66.6666667%;
        }

        .col-9 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            flex: 0 0 75%;
            max-width: 75%;
        }

        .col-12 {
            position: relative;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            flex: 0 0 100%;
            max-width: 100%;
        }

        .row img {
            margin-bottom: 15px;
        }
    </style>