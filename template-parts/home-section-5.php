<?php
    $heading = get_field('section_5_heading');
    $text = get_field('section_5_text');
    $form = get_field('section_5_contact_form');
    $details = get_field('section_5_contact_details');
    $x = 1;
?>

<section class="section section--5" name="contact" id="contact">
    <div class="section__content">
        <h2><?php echo $heading; ?></h2> 
        <p><?php echo $text; ?></p>
        <aside class="section--5__form" name="contact" id="contact">
            <?php echo do_shortcode( $form ); ?>
        </aside>
        <aside class="section--5__cta">
            <?php if (have_rows('section_5_contact_details')) :
                while (have_rows('section_5_contact_details')) : the_row();

                echo '<div class="section--5__cta__' . $x . '">' .
                        get_sub_field('section_5_contact_details_content') .
                    '</div>';

                $x++;

            endwhile; endif;?>
        </aside>
        
    </div>
</section>
