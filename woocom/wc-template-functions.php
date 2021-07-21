<?php 

if ( ! function_exists( 'woocommerce_content_custom' ) ) {

    /**
     * Output WooCommerce content.
     *
     * This function is only used in the optional 'woocommerce.php' template.
     * which people can add to their themes to add basic woocommerce support.
     * without hooks or modifying core templates.
     */
    function woocommerce_content_custom() {
    
        if ( is_singular( 'product' ) ) {
    
            while ( have_posts() ) :
                the_post();
                wc_get_template_part( 'content', 'single-product-custom' );
            endwhile;
    
        } else {
            wc_get_template_part( 'content', 'product-custom' );
        }
    }
    }
 