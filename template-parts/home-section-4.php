<?php
    $heading = get_field('section_4_heading');
    $text = get_field('section_4_text');
    $links = get_field('section_4_links');
?>

<section class="section section--4">
    <div class="section__content">
        <h2><?php echo $heading; ?></h2> 
        <p><?php echo $text; ?></p>
        <div class="section--4__links">
            <?php echo $links; ?>
        </div> 
        
    </div>
</section>