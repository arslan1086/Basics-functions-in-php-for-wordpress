<!-- Access the line of code in wordpress and for adding attribute  -->
<script>
    jQuery(document).ready(function(  ){
        jQuery('body.page-id-6 .product-quantity').remove();

        $('body.page-id-7 #billing_email').attr('disabled','');
    });
</script>






// Create shortcode for product id 375 details:-

function actual_product_price(){
    ob_start();
    $product = wc_get_product( 375 );
    echo $product->get_regular_price();
    return ob_get_clean();

}function actual_sale_price(){
    ob_start();
    $product = wc_get_product( 375 );
    echo $product->get_sale_price();
    return ob_get_clean();
    
}function DiscountCalculated(){
    ob_start();
    $product = wc_get_product( 375 );
    $sale_price=  $product->get_sale_price();
    $actual_price= $product->get_regular_price();
    $discountcal=($sale_price-$actual_price)/$actual_price*100;
    echo(round(abs($discountcal) ));
    return ob_get_clean();

}
add_shortcode('productPrice', 'actual_product_price');
add_shortcode('ActualProductPrice', 'actual_sale_price');
add_shortcode('DiscountCalculated', 'DiscountCalculated');
add_action('wp_footer', 'ds_remove_cart_button');
function ds_remove_cart_button(){
?>
<style>
<?php
foreach ( WC()->cart->get_cart() as $cart_item ) :
    $product_id = $cart_item['data']->get_id();
?>

    .add_to_cart_button[data-product_id|="<?php echo $product_id ?>"], .single_add_to_cart_button[value|="<?php echo $product_id ?>"] {
        display: none !important;
    }
<?php
endforeach;

?>
</style>
<?php
}

function windowsDownload(){
    ob_start();
    $product = wc_get_product( 375 );
    $downloads=  $product->get_downloads();
    echo $downloads['8e8b64ff-7f3f-43a9-882c-78fe0141f564']['file'];

    return ob_get_clean();
}
function MacDownload(){
    ob_start();
    $product = wc_get_product( 375 );
    $downloads=  $product->get_downloads();
    echo $downloads['22d3babc-a733-4542-aa02-4607216eeda2']['file'];

    return ob_get_clean();
}

add_shortcode('windowsDownload', 'windowsDownload');
add_shortcode('MacDownload', 'MacDownload');








