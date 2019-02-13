<?php
/**
 * Mini-cart
 *
 * Contains the markup for the mini-cart, used by the cart widget.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/mini-cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.5.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
 do_action( 'woocommerce_before_mini_cart' ); ?>

<div class="prd-sm">

	<?php if ( ! WC()->cart->is_empty() ) : ?>

		<?php 
		    do_action( 'woocommerce_before_mini_cart_contents' ); 
			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
					?>

                    <div class="prd-sm-item">
                    			<div class="prd-sm-img">
                                    <?php
										if ( ! $product_permalink ) {
											echo str_replace( array( 'http:', 'https:' ), '', $thumbnail );
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail );
										}
									?>
                                </div>
                                <div class="prd-sm-info">
                                    <h3>
									<?php
										if ( ! $product_permalink ) {
											echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
										} else {
											echo apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key );
										}
										// Meta data
										echo wc_get_formatted_cart_item_data( $cart_item );
										// Backorder notification
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'electrician' ) . '</p>';
										}
									?>
                            </h3>
                            <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span  style="display:none; "  class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                                    <div class="price">
									<?php
										echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
									?>
                            	</div>
                                </div>
                    <div class="prd-sm-delete product-remove" data-product_id="<?php echo esc_attr( $product_id ) ?>" data-product_sku="<?php echo esc_attr( $_product->get_sku() ) ?>" data-qty="<?php echo esc_attr($cart_item['quantity']) ?>"><i class="icon-bin-delete"></i>
                    
       
                                </div>
                                </div>

					<?php
				}
			}
		?>

		<?php do_action( 'woocommerce_mini_cart_contents' ); ?>

	<?php else : ?>

		<li class="empty"><?php _e( 'No products in the cart.', 'electrician' ); ?></li>

	<?php endif; ?>

</div>


<?php if ( ! WC()->cart->is_empty() ) : ?>

	<p class="total"><strong><?php _e( 'Total', 'electrician' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>
	<p class="woocommerce-mini-cart__total total"><strong><?php _e( 'Subtotal', 'electrician' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="buttons">
		<?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
	</p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>
