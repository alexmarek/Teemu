<?php
    $heading = get_field('section_6_heading');
    $instagram = get_field('section_6_instagram_feed');
?>

<section class="section section--6">
    <div class="section__content">
        <h2><?php echo $heading; ?></h2> 
        <?php echo do_shortcode( $instagram ); ?>
    </div>
</section>