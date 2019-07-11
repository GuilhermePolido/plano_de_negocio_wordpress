<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package VW Corporate Business
 */
?>
<div   class="footer copyright-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-3">
                <?php dynamic_sidebar('footer-1');?>
            </div>
            <div class="col-md-3 col-lg-3">
                <?php dynamic_sidebar('footer-2');?>
            </div>
            <div class="col-md-3 col-lg-3">
                <?php dynamic_sidebar('footer-3');?>
            </div>
            <div class="col-md-3 col-lg-3">
                <?php dynamic_sidebar('footer-4');?>
            </div>
        </div>
    </div>
</div>

<div  class="footer-2 inner">
  	<div class="copyright">
        <p><?php echo esc_html(get_theme_mod('vw_corporate_business_footer_text',__('Copyright 2018 -','vw-corporate-business'))); ?> <?php vw_corporate_business_credit(); ?></p>
  	</div>
  	<div class="clear"></div>
</div>

<?php wp_footer(); ?>
</body>
</html>