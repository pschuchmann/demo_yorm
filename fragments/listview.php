<?php if ($this->product) : ?>
<div class="container">
    <div class="row">
        <div class="col-4">
            <?php if ($this->product && !empty($this->product->media)) : ?>
            <a href="#" title="<?=$this->product->getName(); ?>"><?= rex_media::get($this->product->media)->toImage(['style' => 'width: 100%; max-width: 100%; height: auto;', 'alt' => $this->product->getName()]); ?></a>
            <?php endif; ?>
        </div>
        <div class="col-8">
            <?php if (!empty($this->product->getName())) : ?>
            <a href="#" title="<?=$this->product->getName(); ?>"><h2><?=$this->product->getName(); ?>
            </h2></a>
            <?php if ($this->product_category && !empty($this->product_category->getName())) : ?>
            <h4><?= $this->product_category->getName(); ?>
            </h4>
            <?php endif; ?>
            <?= $this->product->getTeaser(); ?>
            <?php endif; ?>
            <a class="float-right" href="#" title="<?=$this->product->getName(); ?> ansehen"><?=$this->product->getName(); ?> ansehen</a>
        </div>
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

        .float-right {
            float: right;
        }
    </style>