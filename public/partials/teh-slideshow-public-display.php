<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://frontend-architect.com/
 * @since      1.0.0
 *
 * @package    Teh_Slideshow
 * @subpackage Teh_Slideshow/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="slide" style="background-image: url('<?php echo $url; ?>');">
  <div class="hero-overlay"></div>
  <div class="container">
    <div class="copy">
      <?php the_content(); ?>
    </div>
  </div>
</div>
