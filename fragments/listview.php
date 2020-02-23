<div style="max-width: 1200px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
    <div style="display: flex; flex-wrap: wrap; margin-right: -15px; margin-left: -15px; align-items:center;">
        <div style="position: relative; width: 100%; padding-right: 15px; padding-left: 15px; flex: 0 0 25%; max-width: 25%;">
            <?=rex_media::get($this->product->media)->toImage(['style' => 'width: 100%; max-width: 100%; height: auto;', 'alt' => $this->product->getName()]); ?>
        </div>
        <div style="position: relative; width: 100%; padding-right: 15px; padding-left: 15px; flex: 0 0 75%; max-width: 75%;">
            <h2><?=$this->product->getName(); ?></h2>
            <h4><?=$this->product_category->getName(); ?></h4>
            <?=$this->product->getTeaser(); ?>
        </div>
    </div>
</div>

<style>
    *,
    *::before,
    *::after {
        box-sizing: border-box;
    }
</style>