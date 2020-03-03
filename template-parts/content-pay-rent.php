<?php
/**
 * Template part for displaying page content in pay-rent-page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

?>

<?php 
    $amount = 1.65;
    $referenceNumber = 0;
    $responseMessage = "Declined";
    
    function isPost($server){
//        echo "INVOKE isPost";
        return (strtoupper($server['REQUEST_METHOD']) == 'POST');
    }

    function requestSale($token, $amount){
//            echo "REQUEST SALE HAS BEEN INVOKED!";
            global $referenceNumber, $responseMessage;
            $client = new SoapClient('https://ps1.merchantware.net/Merchantware/ws/retailTransaction/v4/credit.asmx?WSDL');
            var_dump($client);
//            $response = $client->SaleVault(
//                    array(
//                            'merchantName'           => 'Test bzrezcom',
//                            'merchantSiteId'         => 'YM1J7IQT',
//                            'merchantKey'            => 'W3862-R4YA1-D01SV-JPP6U-31EVU',
//                            'invoiceNumber'          => '123',
//                            'amount'                 => $amount,
//                            'vaultToken'             => $token,
//                            'forceDuplicate'         => 'true',
//                            'registerNumber'         => '123',
//                            'merchantTransactionId'  => '1234'
//                    )
//            );
//            $result = $response->SaleVaultResult;
//            $responseMessage = $result->ApprovalStatus;
//            $amount = $result->Amount;
//            $referenceNumber = $result->Token;
    }
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
        <?php 
        if(isPost($_SERVER) && $_POST["paymentToken"]){
                echo "conditions met to REQUEST SALE!";
                requestSale($_POST["paymentToken"], $amount);
        }
	?>
    
        <header class="page-header">
            <div class="pay-rent-title">
                <h1 class="page-title screen-reader-text"><?php echo __( 'Pay Rent', 'rpm-custom-post-types' )?></h1>

                <div><?php echo __( 'Pay', 'rpm-custom-post-types' )?></div>
                <div><?php echo __( 'Rent', 'rpm-custom-post-types' )?></div>

            </div>

        </header><!-- .page-header -->
        
	<div class="entry-content">
		<?php
			the_content();
                        
                        /**
                         * @example Safe usage:
                         */
                        $current_user = wp_get_current_user();
                        if ( ! $current_user->exists() ) {
                            return;
                        }
                        $userName = esc_html( $current_user->display_name );
//                        var_dump($userName);
                ?>
                        <div class="account-details">
                            <p><?php echo __( 'Current User:', 'rpm-custom-post-types' ).' '.$userName.'';?></p>
                            <h3><?php echo __( 'Address', 'rpm-custom-post-types' )?></h3>
                            <?php
                            
                        
                            
                            $residentargs = [
                                'post_type' => 'listing',
                                'post_status' => 'any',
                                'meta_query' => [
                                                     ['key' => '_rpmcpt_listing_resident',
                                                      'value' => $userName,
                                                      'compare' => '='
                                                     ]
                                                 ]
                            ];
                          
                            $query = new WP_Query($residentargs);
//                            var_dump($query);
                            // The Loop
                            if ( $query->have_posts() ) {
                                
                                while ( $query->have_posts() ) {
                                    $query->the_post();
                                    echo the_title();
//                                    get_template_part( 'template-parts/content', 'listing-archive' );
                                }
                                
                            } else {
                                // no posts found
                                echo 'No posts found';
                            }

                            /* Restore original Post Data */
                            wp_reset_postdata();
                            
                            ?>
                            
                            <h3>Rent Amount</h3>
                            <p>$700.00</p>
                        </div>
                        <div id="LoadingImage" class="form-loading" style="display:none;">
                            <img src="<?php echo get_template_directory_uri().'/bg-images/wait24.gif'?>"/>
                        </div>
                <?php
                        
                        echo do_shortcode('[mcs_pay_rent_form]');
		?>
                
            
	</div><!-- .entry-content -->

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'proper-tea' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-## -->
