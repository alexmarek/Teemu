<?php
    $heading = get_field('section_2_heading');
    $image = get_field('section_2_image');
?>

<section class="section section--2">
    <div class="section__content">
        <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>" class="section--2__image">
        <h2><?php echo $heading; ?></h2>
    </div>
</section>