<?php
/**
 * Template part for displaying resident portal.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Proper_Tea
 */

?>

<div class="resident-header-wrap" style="background-image: url(<?php echo get_template_directory_uri().'/bg-images/current_residents_light.png'?>)">

    <header class="page-header">


            <div class="resident-info-archive-title">
                <h1 class="page-title screen-reader-text">Current Residents</h1>

                <div>Current</div>
                <div>Residents</div>

            </div>
    </header><!-- .page-header -->


    <div class="resident-info-archive-forward">
        <p>
            Your lease is the most reliable source for answers to questions regarding the property you are leasing. 
            It includes both Lessor and Lessee responsibilities for maintenance, repairs and utilities. 
        </p>
    </div><!--.resident-info-archive-forward-->

</div><!--.resident-header-wrap-->

<div class="resident-action-wrap">
    <div class="resident-action">
        <h2>Pay Rent</h2>
        <p>Pay your rent online, no pesky humans.</p>
        <button>Pay Rent</button>
    </div>
    
    <div class="resident-action">
        <h2>Maintenance</h2>
        <p>Having issue's? We can send someone to check it out .</p>
        <a href="<?php echo site_url();?>/maintenace" >Maintenance Request</a>
    </div>
    
     <div class="resident-action">
        <h2>FAQ's</h2>
        <p>Have a question? These are the ones we get asked a lot.</p>
        <a href="<?php echo site_url();?>/faq" >FAQs</a>
     </div>
</div><!--.resident-action-wrap-->