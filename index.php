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



//Download files using Javascript
<script>
var isLoggedIn = <?php echo json_encode(is_user_logged_in()) ?>;
// console.log(document.url)
if (isLoggedIn) {
    //// Button for Window Download
    const btnn = document.getElementById('windowdownload');
	const urll = '<?php echo do_shortcode("[windowsDownload]")?>';

	btnn.addEventListener('click', (event) => {
		event.preventDefault();
		console.log('ABC')
		windowdownload(urll);
	})
	function windowdownload(urll) {
		fetch(urll, {
				mode: 'no-cors',
			})
			.then(response => response.blob())
			.then(blob => {
				let blobUrl = window.URL.createObjectURL(blob);
				let a = document.createElement('a');
				a.download = urll.replace(/^.*[\\\/]/, '');
				a.href = blobUrl;
				document.body.appendChild(a);
				a.click();
				a.remove();
			})
	}
    // Button for Mac Download
    const btn2 = document.getElementById('macdownload');
	const url2 ='<?php echo do_shortcode("[MacDownload]")?>';
	// const url2 = "https://s3-ap-southeast-1.amazonaws.com/tksproduction/bmtimages/pY3BnhPQYpTxasKfx.jpeg";
	btn2.addEventListener('click', (event) => {
		event.preventDefault();
		console.log('ABC')
		windowdownload(url2);
	})
	function windowdownload(url2) {
		fetch(url2, {
				mode: 'no-cors',
			})
			.then(response => response.blob())
			.then(blob => {
				let blobUrl = window.URL.createObjectURL(blob);
				let a = document.createElement('a');
				a.download = url2.replace(/^.*[\\\/]/, '');
				a.href = blobUrl;
				document.body.appendChild(a);
				a.click();
				a.remove();
			})
	}
}

else {
   
    const btn = document.getElementById('windowdownload');
    const btnn2 = document.getElementById('macdownload');
    function redirectlink()
    {
       //console.log("no") 
	   localStorage.clear();
	   localStorage.setItem("windowdownload", "window");
		// alert(window.location.href = "<?php echo get_site_url()?>/my-account/");
		// window.location.href = "<?php echo get_site_url()?>/my-account/"
		window.location.replace("<?php echo get_site_url()?>/my-account/");
	
    //    alert("Please Log in first")
    }
	function redirectlink2()
    {
       //console.log("no") 
	   localStorage.clear();
	   localStorage.setItem("macdownload", "mac");
	//    alert(window.location.href = "<?php echo get_site_url()?>/my-account/");
		//    window.location.href = "<?php echo get_site_url()?>/my-account/"
		window.location.replace("<?php echo get_site_url()?>/my-account/");
	  
    //    alert("Please Log in first")
    }
     
    btn.addEventListener("click",redirectlink)
    btnn2.addEventListener("click",redirectlink2)
    
   
}
	
</script>








