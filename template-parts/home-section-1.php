<?php
    $logo = get_field('logo');
    $image = get_field('section_1_image');
?>

<section class="section section--1">
    
    <div class="section__content">
        <img src="<?php echo $logo['url']?>" alt="<?php echo $logo['alt']?>" class="section--1__logo">
        <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>" class="section--1__image">
    </div>
   
</section>
