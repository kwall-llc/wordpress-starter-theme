<?php

/**
 * Hero Banner Block Template.
 *
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'hero-banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'hero-banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
if( $is_preview ) {
    $className .= ' is-admin';
}

?>
<?php $img = get_field('hero_banner');
?>

<div class="hero-banner-block hero-section">

    <div class="image p-0" style="background: url('<?= $img['url']?>');">
        <div class="hero-banner-captions">
            <div class="container">
                <div class="row mx-0 align-items-end caption">
                <div class="col-12 caption-inner">
                    <h1><?php echo get_the_title(); ?></h1>
                    </div>
                </div>

            </div>
        </div>

    </div>

</div>
