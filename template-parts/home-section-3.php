<?php
    $heading = get_field('section_3_heading');
    $text = get_field('section_3_text');
    $image = get_field('section_3_image');
?>

<section class="section section--3">
    <div class="section__content">
        <div class="section--3__text">
            <h2><?php echo $heading; ?></h2> 
            <p><?php echo $text; ?></p>  
        </div>
          
        <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>" class="section--3__image">
    </div>
</section>