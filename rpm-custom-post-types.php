<?php

/*
* Description: This file contains all the information for registering custom post 
* types and their associated meta data for the proper-tea theme
* Version: 1.0
* Author: Michael Christman
* Author URI: n/a
* Text Domain: rpm-custom-post-types
* License: GPLv2
 */

/* 
 * Copyright (C) 2016 Michael Christman (email: christman.michaelj@gmail.com)
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */


/**********************************************************************
 *
 * Custom Post Types
 * 
 ***********************************************************************/

//register post types
function rpmcpt_custom_post_types() {
    
    $listingLabels = [
        'name'               => 'Listings',
        'singular_name'      => 'Listing',
        'menu_name'          => 'Listings',
        'name_admin_bar'     => 'Listing',
        'add_new'            => 'Add New Listing',
        'add_new_item'       => 'Add New Listing',
        'new_item'           => 'New Listing',
        'edit_item'          => 'Edit Listing',
        'view_item'          => 'View Listing',
        'all_items'          => 'All Listings',
        'search_items'       => 'Search Listings',
        'not_found'          => 'No Listings found',
        'not_found_in_trash' => 'No Listings found in trash'
    ];

    $listingArgs = [
        'labels'             => $listingLabels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-store',
        'rewrite'            => array('slug'=> 'listing'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt',
                                'page-attributes', 'post-formats')

    ];
    register_post_type('listing',  $listingArgs);

    $serviceLabels = [
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'menu_name'          => 'Services',
        'name_admin_bar'     => 'Service',
        'add_new'            => 'Add New Service',
        'add_new_item'       => 'Add New Service',
        'new_item'           => 'New Service',
        'edit_item'          => 'Edit Service',
        'view_item'          => 'View Service',
        'all_items'          => 'All Services',
        'search_items'       => 'Search Services',
        'not_found'          => 'No Services found',
        'not_found_in_trash' => 'No Services found in trash'
    ];

    $serviceArgs = [
        'labels'             => $serviceLabels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-hammer',
        'rewrite'            => array('slug'=> 'service'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt',
                                'page-attributes')
    ];
    register_post_type('service',  $serviceArgs);

    $teamMemberLabels = [
        'name'               => 'Team Members',
        'singular_name'      => 'Team Member',
        'menu_name'          => 'Team Members',
        'name_admin_bar'     => 'Team Member',
        'add_new'            => 'Add New Team Member',
        'add_new_item'       => 'Add New Team Member',
        'new_item'           => 'New Team Member',
        'edit_item'          => 'Edit Team Member',
        'view_item'          => 'View Team Member',
        'all_items'          => 'All Team Members',
        'search_items'       => 'Search Team Members',
        'not_found'          => 'No Team Members found',
        'not_found_in_trash' => 'No Team Members found in trash'
    ];

    $teamMembersArgs = [
        'labels'             => $teamMemberLabels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-groups',
        'rewrite'            => array('slug' => 'team-member'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail',
                                'page-attributes')
    ];
    register_post_type('team-member', $teamMembersArgs);

     $residentLabels = [
        'name'               => 'Resident Information',
        'singular_name'      => 'Resident Information',
        'menu_name'          => 'Resident Information',
        'name_admin_bar'     => 'Resident Information',
        'add_new'            => 'Add New Resident Information',
        'add_new_item'       => 'Add New Resident Information',
        'new_item'           => 'New Resident Information',
        'edit_item'          => 'Edit Resident Information',
        'view_item'          => 'View Resident Information',
        'all_items'          => 'All Resident Information',
        'search_items'       => 'Search Resident Information',
        'not_found'          => 'No Resident Information found',
        'not_found_in_trash' => 'No Resident Information found in trash'
    ];

    $residentArgs = [
        'labels'             => $residentLabels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'menu_position'      => 4,
        'menu_icon'          => 'dashicons-megaphone',
        'rewrite'            => array('slug'=> 'residentinfo'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes')
    ];
    register_post_type('resident-information', $residentArgs);

}

add_action('init', 'rpmcpt_custom_post_types');

/**********************************************************************
 *
 * Default Title Text
 * 
 ***********************************************************************/
//function to replace default title text on custom post type edit screens
function rpmcpt_change_title_text( $title ){

    $screen = get_current_screen();

    if  ( 'team-member' == $screen->post_type ) {

        $title = 'Enter Team Member';

     }else if('service' == $screen->post_type ){
         
        $title = 'Enter Service Name';
         
     }else if('resident-information' == $screen->post_type ){
         
        $title = 'Enter Resident Service';
         
     }else if('listing' == $screen->post_type ){
         
        $title = 'Enter Listing Name';
         
     }
     
     return $title;

}
add_filter( 'enter_title_here', 'rpmcpt_change_title_text' );



/**********************************************************************
 *
 * Custom Meta box information
 * 
 ***********************************************************************/

//add meta data to team member custom post type for team position
function rpmcpt_meta_box_init($post_type){
    if ( $post_type === 'team-member' ) {
        
        add_meta_box( 
                'rpmcpt_team_position_meta' ,       // HTML 'id' attribute of the edit screen section
                'Team Position' ,                   // Title of the edit screen section, visible to user.
                'rpmcpt_team_position_meta_box' ,   // Function that prints out the HTML for the edit screen section
                $post_type,                         // The type of Write screen on which to show the edit screen section
                'top',                              // The part of the page where the edit screen section should be shown.
                'high'                              // The priority within the context where the boxes should show
        );
        
    }else if($post_type === 'listing'){
        
        
       //Details meta box
        add_meta_box( 
                'rpmcpt_listing_details_meta' ,       // HTML 'id' attribute of the edit screen section
                'Details' ,                           // Title of the edit screen section, visible to user.
                'rpmcpt_listing_details_meta_box' ,   // Function that prints out the HTML for the edit screen section
                $post_type,                           // The type of Write screen on which to show the edit screen section
                'top',                                // The part of the page where the edit screen section should be shown.
                'high'                                // The priority within the context where the boxes should show
        );
        
    }
}
add_action( 'add_meta_boxes' , 'rpmcpt_meta_box_init' );

//function used to sort meta boxes with section set to "top" above editor
function move_to_top() {
        # Get the globals:
        global $post, $wp_meta_boxes;

        # Output the "advanced" meta boxes:
        do_meta_boxes( get_current_screen(), 'top', $post );

        # Remove the initial "advanced" meta boxes:
        unset($wp_meta_boxes['post']['top']);
    }

add_action('edit_form_after_title', 'move_to_top');


/*********************************************************************
 *  
 * Meta Box Contents
 * 
 *********************************************************************/


//create nonce and display custom meta boxes for team-member custom post type
function rpmcpt_team_position_meta_box($post){
    
    //retrieve the custom meta box values
    $rpmcpt_team_position = get_post_meta( $post->ID, '_rpmcpt_team_position', true);
    
   //nonce for security
    wp_nonce_field( plugin_basename(__FILE__), 'rpmcpt_save_meta_boxes');
    
    //Custom meta box form elements
    echo '<p>Team Member Position: <input type="text" name="rpmcpt_team_position" value = "'.esc_attr( $rpmcpt_team_position ).'" size="20" /></p>';
   
}

//create nonce and display custom meta boxes for listing post type 
function rpmcpt_listing_details_meta_box($post){
    
    //retrieve the custom meta box values
    $rpmcpt_listing_price = get_post_meta( $post->ID, '_rpmcpt_listing_price', true);
    $rpmcpt_listing_location = get_post_meta( $post->ID, '_rpmcpt_listing_location', true);
    $rpmcpt_listing_sqft = get_post_meta( $post->ID, '_rpmcpt_listing_sqft', true);
    $rpmcpt_listing_acreage = get_post_meta( $post->ID, '_rpmcpt_listing_acreage', true);
    $rpmcpt_listing_type = get_post_meta( $post->ID, '_rpmcpt_listing_type', true);
    $rpmcpt_listing_availability = get_post_meta( $post->ID, '_rpmcpt_listing_availability', true);
    $rpmcpt_listing_bedrooms = get_post_meta( $post->ID, '_rpmcpt_listing_bedrooms', true);
    $rpmcpt_listing_bathrooms = get_post_meta( $post->ID, '_rpmcpt_listing_bathrooms', true);
    
//    $checkboxMeta = get_post_meta( $post->ID );
   
    
   //nonce for security
    wp_nonce_field( plugin_basename(__FILE__), 'rpmcpt_save_meta_boxes');
    
    //Custom meta box form elements
    echo '<form class="location_meta_box_form" method="post">';
    echo '<p class = "rpmcpt_meta_option rpmcpt_meta_textbox" id ="price_textbox">
            <label for="price"> Price: </label>
            <input id="price" type="text" name="rpmcpt_listing_price" value = "'.esc_attr( $rpmcpt_listing_price ).'"  />
         </p>';
    echo '<p class = "rpmcpt_meta_option rpmcpt_meta_textbox" id ="location_textbox">
            <label for="location"> Location: </label>
            <input id="location" type="text" name="rpmcpt_listing_location" value = "'.esc_attr( $rpmcpt_listing_location ).'"  />
          </p>';
    echo '<p class = "rpmcpt_meta_option rpmcpt_meta_textbox" id ="sqft_textbox">
            <label for="sqft_input" > Square Feet: </label>
            <input id="sqft_input" type="text" name="rpmcpt_listing_sqft" value = "'.esc_attr( $rpmcpt_listing_sqft ).'"  />
          </p>';
    echo '<p class = "rpmcpt_meta_option rpmcpt_meta_textbox" id ="acreage_textbox">
            <label for="acreage_input" > Acreage: </label>
            <input id="acreage_input" type="text" name="rpmcpt_listing_acreage" value = "'.esc_attr( $rpmcpt_listing_acreage ).'"  />
          </p>';
    
    ?>


    
    <!-- Listing Type Radio Buttons -->
    <p class = "rpmcpt_meta_option rpmcpt_meta_radio" id ="type_radio_buttons">
       <label for="listing_type"> Type:</label> </br>
        House      <input id="listing_type" type="radio" name = "listing_type" value = "house" <?php echo ($rpmcpt_listing_type == 'house')? 'checked="checked"':''; ?>/> 
        Apartment  <input id="listing_type" type="radio" name = "listing_type" value = "apartment" <?php echo ($rpmcpt_listing_type == 'apartment')? 'checked="checked"':''; ?>/> 
        Office     <input id="listing_type" type="radio" name = "listing_type" value = "office" <?php echo ($rpmcpt_listing_type == 'office')? 'checked="checked"':''; ?>/>
        Retail     <input id="listing_type" type="radio" name = "listing_type" value = "retail" <?php echo ($rpmcpt_listing_type == 'retail')? 'checked="checked"':''; ?>/> 
        Building   <input id="listing_type" type="radio" name = "listing_type" value = "building" <?php echo ($rpmcpt_listing_type == 'building')? 'checked="checked"':''; ?>/> 
        Land       <input id="listing_type" type="radio" name = "listing_type" value = "land" <?php echo ($rpmcpt_listing_type == 'land')? 'checked="checked"':''; ?>/> 
    </p>
    
    <!-- Avilability Radio Buttons -->
    <p class = "rpmcpt_meta_option rpmcpt_meta_radio" id ="availability_radio_buttons">
       <label for="availability"> Availability:</label> </br>
        For Rent  <input id="availability" type="radio" name = "availability" value = "for rent" <?php echo ($rpmcpt_listing_availability == 'for rent')? 'checked="checked"':''; ?>/> 
        For Sale  <input id="availability" type="radio" name = "availability" value = "for sale" <?php echo ( $rpmcpt_listing_availability == 'for sale')? 'checked="checked"':''; ?>/> 
    </p>
    
    <!-- bedrooms Radio Buttons -->
    <p class = "rpmcpt_meta_option rpmcpt_meta_radio" id ="bedrooms_radio_buttons">
       <label for="bedrooms"> Bedrooms:</label> </br>
        0  <input id="bedrooms" type="radio" name = "bedrooms" value = "0" <?php echo ($rpmcpt_listing_bedrooms == '0')? 'checked="checked"':''; ?>/> 
        1  <input id="bedrooms" type="radio" name = "bedrooms" value = "1" <?php echo ($rpmcpt_listing_bedrooms == '1')? 'checked="checked"':''; ?>/> 
        2  <input id="bedrooms" type="radio" name = "bedrooms" value = "2" <?php echo ($rpmcpt_listing_bedrooms == '2')? 'checked="checked"':''; ?>/> 
        3  <input id="bedrooms" type="radio" name = "bedrooms" value = "3" <?php echo ($rpmcpt_listing_bedrooms == '3')? 'checked="checked"':''; ?>/> 
        4+ <input id="bedrooms" type="radio" name = "bedrooms" value = "4" <?php echo ($rpmcpt_listing_bedrooms == '4')? 'checked="checked"':''; ?>/> 
    </p>
    
    <!-- bathrooms Radio Buttons -->
    <p class = "rpmcpt_meta_option rpmcpt_meta_radio" id ="bathrooms_radio_buttons">
        <label for="bathrooms">Bathrooms:<label> </br>
        1  <input id="bathrooms" type="radio" name = "bathrooms" value = "1" <?php echo ($rpmcpt_listing_bathrooms == '1')? 'checked="checked"':''; ?>/> 
        2  <input id="bathrooms" type="radio" name = "bathrooms" value = "2" <?php echo ($rpmcpt_listing_bathrooms == '2')? 'checked="checked"':''; ?>/> 
        3+ <input id="bathrooms" type="radio" name = "bathrooms" value = "3" <?php echo ($rpmcpt_listing_bathrooms == '3')? 'checked="checked"':''; ?>/> 
    </p>
    
    <?php
    echo '</form>';
}



function rpmcpt_save_meta_boxes($post_id){
    
    /*****************************************
     * Team Member meta info
     ******************************************/
    
    //process form data if $_POST is set
    if(isset($_POST['rpmcpt_team_position'] ) ){
        
        //if auto saving skip saving our meta box data
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        //check nonce for security
        wp_verify_nonce( plugin_basename(__FILE__), 'rpmcpt_save_meta_boxes');
        
        //save the meta box data as post meta using the post ID as a unique prefix
        update_post_meta($post_id,'_rpmcpt_team_position', sanitize_text_field($_POST['rpmcpt_team_position'] ) );
        
    }
    
     /*****************************************
     *  EndTeam Member meta info
     ******************************************/
    
     /*****************************************
     *  Listing meta info
     ******************************************/
    
    //process form data if $_POST is set
    if(isset($_POST['rpmcpt_listing_price'] ) ){
        
        //if auto saving skip saving our meta box data
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        //check nonce for security
        wp_verify_nonce( plugin_basename(__FILE__), 'rpmcpt_save_meta_boxes');
        
        //save the meta box data as post meta using the post ID as a unique prefix
        update_post_meta($post_id,'_rpmcpt_listing_price', sanitize_text_field( floatval( $_POST['rpmcpt_listing_price'] ) ) );

     }
     
    //process form data if $_POST is set
    if(isset($_POST['rpmcpt_listing_location'] ) ){
        
        //if auto saving skip saving our meta box data
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        //check nonce for security
        wp_verify_nonce( plugin_basename(__FILE__), 'rpmcpt_save_meta_boxes');
        
        //save the meta box data as post meta using the post ID as a unique prefix
        update_post_meta($post_id,'_rpmcpt_listing_location', sanitize_text_field($_POST['rpmcpt_listing_location'] ) );
        
    }
    
    //process form data if $_POST is set
    if(isset($_POST['rpmcpt_listing_sqft'] ) ){
        
        //if auto saving skip saving our meta box data
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        //check nonce for security
        wp_verify_nonce( plugin_basename(__FILE__), 'rpmcpt_save_meta_boxes');
        
        //save the meta box data as post meta using the post ID as a unique prefix
        update_post_meta($post_id,'_rpmcpt_listing_sqft', sanitize_text_field($_POST['rpmcpt_listing_sqft'] ) );
        
    }
    
    //process form data if $_POST is set
    if(isset($_POST['rpmcpt_listing_acreage'] ) ){
        
        //if auto saving skip saving our meta box data
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        //check nonce for security
        wp_verify_nonce( plugin_basename(__FILE__), 'rpmcpt_save_meta_boxes');
        
        //save the meta box data as post meta using the post ID as a unique prefix
        update_post_meta($post_id,'_rpmcpt_listing_acreage', sanitize_text_field($_POST['rpmcpt_listing_acreage'] ) );
        
    }
    
    //accepted values whitelist
    $type_allowed = [ 'house', 'apartment' ,'office', 'retail' , 'building' , 'land'];
    $availability_allowed = array('for rent', 'for sale');
    $bed_allowed = array('0','1','2','3','4');
    $bath_allowed = array('1','2','3');
    
    if( isset( $_POST['listing_type'] )  && in_array($_POST['listing_type'],  $type_allowed)){

        update_post_meta( $post_id, '_rpmcpt_listing_type',  $_POST['listing_type'] );

    }
    
    if( isset( $_POST['availability'] )  && in_array($_POST['availability'],  $availability_allowed)){

        update_post_meta( $post_id, '_rpmcpt_listing_availability',  $_POST['availability'] );

    }

    if( isset( $_POST['bedrooms'] )  && in_array($_POST['bedrooms'], $bed_allowed)){

        update_post_meta( $post_id, '_rpmcpt_listing_bedrooms',  $_POST['bedrooms'] );

    }

    if( isset( $_POST['bathrooms'] )  && in_array($_POST['bathrooms'], $bath_allowed)){

        update_post_meta( $post_id, '_rpmcpt_listing_bathrooms',  $_POST['bathrooms'] );

    }

    
    /*****************************************
     *  End Listing meta info
     ******************************************/

}
//hook to save our meta box data when the post is saved
add_action('save_post', 'rpmcpt_save_meta_boxes');


/**********************************************************************
 *
 * End Custom Meta Box information
 * 
 ***********************************************************************/

/**
 * Adds the meta box stylesheet when appropriate
 */
//function rpmcpt_admin_styles(){
//    global $typenow;
//    if( $typenow == 'listing' ) {
//        wp_enqueue_style( 'rpmcpt_meta_box_styles', plugin_dir_url( __FILE__ ) . '/css/meta-box-styles.css' );
//    }
//}
//add_action( 'admin_print_styles', 'rpmcpt_admin_styles' );

/**********************************************************************
 *
 * Create search functionality for listing archive 
 * 
 ***********************************************************************/

/**
 * Register custom query vars 
 * 
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/query_vars
 */
function rpmcpt_register_query_vars( $vars ){
    
    $vars[] = 'city';
    $vars[] = 'type';
    $vars[] = 'price';
    $vars[] = 'availability';
    $vars[] = 'bedrooms';
    $vars[] = 'bathrooms';
    
    
    return $vars;
}
add_filter('query_vars','rpmcpt_register_query_vars');


/**
 * Create Shortcode that allows site admin to include search form in post and pages
 * fired on initialization
 * 
 */
function rpmcpt_setup(){
    add_shortcode('rpmcpt_search_form' , 'rpmcpt_search_form');
    add_shortcode('rpmcpt_listing_filter', 'rpmcpt_listing_filter_form');
}
add_action( 'init', 'rpmcpt_setup' );

function rpmcpt_search_form(){
    
    //Query the database for _rpmcpt_listing_location values
    $listing_location_list = get_meta_values( '_rpmcpt_listing_location', 'listing' );
    
    //If values are returned
    if( count($listing_location_list) != 0 ){
        
        //Save a duplicate array and sort it
        $cities = $listing_location_list;
        asort($cities);
       
    }else{
        echo 'No listings yet!';
        return;
    }
    
    //If not on the front page
//    if(!is_front_page()){
//        //create class for hiding drop downs
//        $more_filters = "more-filters";       
//    }else{
//        $more_filters = "";
//    }

    /*
     * Build the search form
     */
    $select_city = '<select name="city" >';
    $select_city .= '<option value="" selected="selected">' . __( 'Location', 'rpm-custom-post-types' ) . '</option>';
    foreach ($cities as $city ) {
	$select_city .= '<option value="' . $city . '">' . $city . '</option>';
    }
    $select_city .= '</select>' . "\n";

    reset($cities);
    
    $select_availability  = '<div id="availability-container">';
    $select_availability .= '<div class="availability-option"><input type="radio" name="availability" id="availability-1" value ="for rent" /><label for="availability-1"><span class="availability-radio" >For Rent</span></label></div>';
    $select_availability .= '<div class="availability-option"><input type="radio" name="availability" id="availability-2" value ="for sale" /><label for="availability-2"><span class="availability-radio" >For Sale</span></label></div>';
    $select_availability .= '</div>';
    
    $select_price  = '<div class="listing-max-price">';
//    $select_price .= '<label for="price">Max-Price:</label>';
    $select_price .= '<input type="text" name="price" placeholder="Maximum Price">';
    $select_price .= '</div>';
    
    $select_type  = '<select name = "type">';
    $select_type .= '<option value = "" selected = "selected">'.__('Type','rpm-custom-post-types' ).'</option>';
    $select_type .= '<option value = "house">'.__('House','rpm-custom-post-types').'</option>';
    $select_type .= '<option value = "apartment">'.__('Apartment','rpm-custom-post-types').'</option>';
    $select_type .= '<option value = "office">'.__('Office','rpm-custom-post-types').'</option>';
    $select_type .= '<option value = "retail">'.__('Retail','rpm-custom-post-types').'</option>';
    $select_type .= '<option value = "building">'.__('Building','rpm-custom-post-types').'</option>';
    $select_type .= '<option value = "land">'.__('Land','rpm-custom-post-types').'</option>';
    $select_type .= '</select>'."\n";
    
    $select_bedrooms  = '<select name = "bedrooms">';
    $select_bedrooms .= '<option value="" selected = "selected">'.__('Bedrooms','rpm-custom-post-types' ).'</option>';
    $select_bedrooms .= '<option value="1">'.__('1+','rpm-custom-post-types').'</option>';
    $select_bedrooms .= '<option value="2">'.__('2+','rpm-custom-post-types').'</option>';
    $select_bedrooms .= '<option value="3">'.__('3+','rpm-custom-post-types').'</option>';
    $select_bedrooms .= '<option value="4">'.__('4+','rpm-custom-post-types').'</option>';
    $select_bedrooms .= '</select>'."\n";
    
    $select_bathrooms  = '<select name = "bathrooms">';
    $select_bathrooms .= '<option value = "" selected = "selected">'.__( 'Bathrooms' , 'rpm-custom-post-types' ).'</option>';
    $select_bathrooms .= '<option value="1">'.__('1+','rpm-custom-post-types').'</option>';
    $select_bathrooms .= '<option value="2">'.__('2+','rpm-custom-post-types').'</option>';
    $select_bathrooms .= '<option value="3">'.__('3+','rpm-custom-post-types').'</option>';
    $select_bathrooms .= '</select>'."\n";
    
    $output  = '<form action="' . esc_url( home_url() ) . '" method="GET" role="search">';
    $output .= '<div class="rpmcpttextfield"><input type="text" name="s" placeholder="Search key..." value="' . get_search_query() . '" />'. '</div>';
    $output .= '<div class="rpmcptselectbox">' . $select_availability . '</div>';
    $output .= '<div class="rpmcptselectbox">' . $select_price . '</div>';
    $output .=  sprintf(
                        /* translators: %s: More Filters. */
                        wp_kses( __( '%s <span class="meta-nav">More Filters</span>', 'rpm-custom-post-types' ), array( 'span' => array( 'class' => array() ) ) ),
                        '<span class="screen-reader-text ">More Filters</span>'
                ) ;
    $output .= '<div class="more-filters-wrap">';
    $output .= '<div class="rpmcptselectbox more-filters">' . $select_city . '</div>';
    $output .= '<div class="rpmcptselectbox more-filters">' . $select_type . '</div>';
    $output .= '<div class="rpmcptselectbox more-filters">' . $select_bedrooms . '</div>';
    $output .= '<div class="rpmcptselectbox more-filters">' . $select_bathrooms . '</div>';
    $output .= '</div><!--.more-filter-wrap-->';
    $output .= '<div class="rpmcptselectbox">';
    $output .= '<input type="hidden" name="post_type" value="listing" />';
    $output .= '<p><input type="submit" value="Apply Filters" class="button"  /></p></div></form>';

    return $output;

}

function get_meta_values( $key = '', $type = 'post', $status = 'publish' ) {
    global $wpdb;

    if( empty( $key ) )
        return;

    $r = $wpdb->get_col( $wpdb->prepare( "
        SELECT DISTINCT pm.meta_value FROM {$wpdb->postmeta} pm
        LEFT JOIN {$wpdb->posts} p ON p.ID = pm.post_id
        WHERE pm.meta_key = '%s' 
        AND p.post_status = '%s' 
        AND p.post_type = '%s'
    ", $key, $status, $type ) );

    return $r;
}



//add_action('pre_get_posts','rpmcpt_reset_blank_querey',1);


//add_action( 'posts_where_request', 'rpmcpt_fields_search' );    


//function rpmcpt_fields_search($where) {
//      if(is_search()){
//            global $wpdb, $wp;
//           
//            add_filter( 'posts_join_request', 'search_join' );
//            add_filter( 'posts_distinct_request', 'search_distinct' );
//            add_filter( 'posts_request', 'rpmcpt_posts_request_filter' );
//              
//      }
//    return $where;
//}

add_action('pre_get_posts','rpmcpt_filter_mysql',1);

function rpmcpt_filter_mysql($query){
    
    if(is_search() && $query->is_main_query()){
            add_filter( 'posts_join_request', 'search_join' );
            add_filter( 'posts_distinct_request', 'search_distinct' );
            add_filter( 'posts_request', 'rpmcpt_posts_request_filter' );
    }else{
            remove_filter( 'posts_join_request', 'search_join' );
            remove_filter( 'posts_distinct_request', 'search_distinct' );
            remove_filter( 'posts_request', 'rpmcpt_posts_request_filter' );
    }
    
}

//add_filter( 'posts_where', 'rpmcpt_posts_where_filter', 10 , 1 );
//
//function rpmcpt_posts_where_filter($where){
//    
//    
//    if(is_search() && is_main_query()){
//
//           
//            add_filter( 'posts_join_request', 'search_join' );
//            add_filter( 'posts_distinct_request', 'search_distinct' );
//            add_filter( 'posts_request', 'rpmcpt_posts_request_filter' );
//              
//    }
//        
//    
//    return $where;
//}

/*
 * Gives access to the entire query can be used to alter the SELECT clause
 */
function rpmcpt_posts_request_filter($input){
 
    global $wpdb, $wp;
    
    
    /*
     *  Build the where clause based on the given query variables
     */
    $where_meta_string = "";
    
    if( !empty ( get_query_var('s') ) ){
        
        $searchTermArray = explode(' ',$wp->query_vars['s']);
        
        /*
         * For each search term in the query
         */
        for ($i = 0; $i < count( $searchTermArray ); $i++){
            
            /*
             * Replace wp.posttitle LIKE %s%
             * with wp.posttitle LIKE %s% or searchterm.meta value LIKE %s%
             * calling preg_replace_nth for each instance in order to correctly 
             * alias the post_meta table
             */
            
                $input =  preg_replace_nth("/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
                    "(".$wpdb->posts.".post_title LIKE $1) OR (searchterm$i.meta_value LIKE $1)", $input ,$i+1);
            
            

        }
        
        
        
//        var_dump($aliasReplacements);
        
        
        /*
         * Add meta value to keyword search
         */
//        $input = preg_replace(
//            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
//            "(".$wpdb->posts.".post_title LIKE $1) OR (searchterm0.meta_value LIKE $1)", $input );


    }
    
    if( !empty ( get_query_var('availability') ) ){
        
        $query_availability = $wp->query_vars['availability'];
        
        //used to sanitize the user input to prevent injection
        $where_meta_string .= $wpdb->prepare(
                                                " AND (availability.meta_key = '_rpmcpt_listing_availability' AND availability.meta_value = '%s')",
                                                $query_availability
                                            );
    }
    
    if( !empty ( get_query_var('price') ) ){
        
        //set the number to 2 decimal places to test against
        $query_price = floatval($wp->query_vars['price']);
        
        //used to sanitize the user input to prevent injection
        $where_meta_string .= $wpdb->prepare(
                                                " AND (price.meta_key = '_rpmcpt_listing_price' AND price.meta_value <= %f)",
                                                $query_price
                                            );
    }
    
    if( !empty(get_query_var( 'city' ) ) ){
        
        $query_city = $wp->query_vars['city'];
        
        //used to sanitize the user input to prevent injection
        $where_meta_string .= $wpdb->prepare(   
                                                " AND (city.meta_key = '_rpmcpt_listing_location' AND city.meta_value = '%s')",
                                                $query_city
                                            );
    }
    
    if( !empty(get_query_var( 'type' ) ) ){
        
        $query_type = $wp->query_vars['type'];
        
        //used to sanitize the user input to prevent injection
        $where_meta_string .= $wpdb->prepare(   
                                                " AND (type.meta_key = '_rpmcpt_listing_type' AND type.meta_value = '%s')",
                                                $query_type
                                            );
    }
    
    if( !empty(get_query_var( 'bedrooms' ) ) ){
        
        $query_bedrooms = $wp->query_vars['bedrooms'];
        
        //used to sanitize the user input to prevent injection
        $where_meta_string .= $wpdb->prepare(   
                                                " AND (bedrooms.meta_key = '_rpmcpt_listing_bedrooms' AND bedrooms.meta_value >= %d)",
                                                $query_bedrooms
                                            );
        
        
    }
    
    if( !empty(get_query_var( 'bathrooms' ) ) ){
        
        $query_bathrooms = $wp->query_vars['bathrooms'];
        
        //used to sanitize the user input to prevent injection
        $where_meta_string .= $wpdb->prepare(   
                                                " AND (bathrooms.meta_key = '_rpmcpt_listing_bathrooms' AND bathrooms.meta_value >= %d)",
                                                $query_bathrooms
                                            );
    }
    
//    var_dump($input);
    
    if ( strlen($where_meta_string) !== 0  ){
        
        $input = preg_replace(  "/WHERE 1=1 /i",
                                "$0 $where_meta_string",
                                $input);
        
    }
   
    
    return $input;
}


function search_join( $join ) {
        global $wpdb, $wp;
        
        if( is_search() && !is_admin() ) {
            
//                var_dump($wp->query_vars);
                
                /*
                 * 
                 */
                if( !empty ( get_query_var('s') ) ){
//                    var_dump($wp->query_vars['s']);
                    $searchTermArray = explode(' ',$wp->query_vars['s']);
//                    var_dump($searchTermArray);
                    for ($i = 0; $i < count( $searchTermArray ); $i++){
                        $join .= " LEFT JOIN wp_postmeta AS searchterm$i
                                   ON (wp_posts.ID = searchterm$i.post_id)";
                    }
//                    $join .= " LEFT JOIN wp_postmeta AS searchterm
//                               ON (wp_posts.ID = searchterm.post_id)";
                }
                
                if( !empty ( get_query_var('availability') ) ){
                    $join .= " LEFT JOIN wp_postmeta AS availability
                               ON (wp_posts.ID = availability.post_id)";
                }
                
                if( !empty ( get_query_var('price') ) ){
                    $join .= " LEFT JOIN wp_postmeta AS price
                               ON (wp_posts.ID = price.post_id)";
                }
                
                if( !empty( get_query_var( 'city' ) ) ){
                    $join .=  " LEFT JOIN wp_postmeta AS city 
                               ON (wp_posts.ID = city.post_id)";
                }
                
                if( !empty( get_query_var( 'type' ) ) ){
                    $join .=  " LEFT JOIN wp_postmeta AS type 
                               ON (wp_posts.ID = type.post_id)";
                }
                
                if( !empty( get_query_var( 'bedrooms' ) ) ){
                    $join .=  " LEFT JOIN wp_postmeta AS bedrooms 
                               ON (wp_posts.ID = bedrooms.post_id)";
                }
                
                if( !empty( get_query_var( 'bathrooms' ) ) ){
                    $join .=  " LEFT JOIN wp_postmeta AS bathrooms 
                               ON (wp_posts.ID = bathrooms.post_id)";
                }
                
                
                
                  
//                $join .=  "LEFT JOIN wp_postmeta AS type 
//                          ON (wp_posts.ID = type.post_id)
//                          LEFT JOIN wp_postmeta AS availability
//                          ON (wp_posts.ID = availability.post_id)";
//              
        }
        
//        if( is_search() && !is_admin()) {
//                $join .= "INNER JOIN $wpdb->postmeta AS m
//                          ON ($wpdb->posts.ID = m.post_id)";
//        }
        return $join;
}
function search_distinct( $distinct ) {
    
    $distinct = "DISTINCT";
    
    return $distinct;
    
}

function preg_replace_nth($pattern, $replacement, $subject, $nth=1) {
    return preg_replace_callback($pattern,
        function($found) use (&$pattern, &$replacement, &$nth) {
                $nth--;
                if ($nth==0) return preg_replace($pattern, $replacement, reset($found) );
                return reset($found);
        }, $subject,$nth  );
}

add_action('pre_get_posts','rpmcpt_reset_blank_query',1);
function rpmcpt_reset_blank_query($query){
    
    if (is_search()){
        
        /*
         * Reset blank querey
         */
        if (trim($query->query_vars['s']) == ''){
            $query->query_vars['s'] = '';
        }
        
    }
    
}

/**********************************************************************
 *
 * Load template files for custom post types 
 * 
 ***********************************************************************/

add_action( 'template_redirect', 'rpmcpt_team_member_redirect_post' );

function rpmcpt_team_member_redirect_post() {
  $queried_post_type = get_query_var('post_type');
  
  if ( is_single() && 'team-member' ==  $queried_post_type ) {
    wp_safe_redirect(site_url().'/team-member', 301 );
    exit;
  }else if(is_single() && 'service' ==  $queried_post_type){
    wp_safe_redirect(site_url().'/service', 301 );
    exit;
  }else if(is_single() && 'resident-information' == $queried_post_type){
    wp_safe_redirect(site_url().'/residentinfo', 301 );
    exit;
  }
  
}

/**********************************************************************
 *
 * Restrict Searches to Listing Archive
 * 
 ***********************************************************************/
function listing_search_template_override($template){
    
    global $wp_query;
    
    //get the post type of the query object
    $post_type = get_query_var('post_type');
    
    //check if I am doing a search query for the post type 'listing' 
    if( $wp_query->is_search() && $post_type == 'listing' || $wp_query->is_404() ){
        
        //replace the normal results with my custom archive page
        return locate_template('archive-listing.php');
    }
    return $template;
}
add_filter('template_include', 'listing_search_template_override');

/*
 * Add listing filter shordcode
 */
function rpmcpt_listing_filter_form(){
    
    $select_element  = '<select name = "listing-filter">';
    $select_element .= '<option value = "" selected = "selected">'.__( 'Sort By' , 'rpm-custom-post-types' ).'</option>';
    $select_element .= '<option value="ASC">'.__('Price Ascending','rpm-custom-post-types').'</option>';
    $select_element .= '<option value="DESC">'.__('Price Descending','rpm-custom-post-types').'</option>';
    $select_element .= '<option value="newest">'.__('Newest','rpm-custom-post-types').'</option>';
    $select_element .= '</select>';
    
//    
    $filter_form  = '<form action="' .esc_url( home_url() ).'/wp-admin/admin-ajax.php" method="POST" id="listing-filter">';
    $filter_form .= '<div class= "rpmcpt-filter-selectbox">'.$select_element.'</div>';
//    $filter_form .= '<input type="hidden" name="post_type" value="listing" />';
    $filter_form .= '<button>Sort</button>';
    $filter_form .= '<input type="hidden" name="action" value="myfilter">';
    $filter_form .= '</form>';
    $filter_form .= '<div id="response"></div>';
    
    return $filter_form;
}

add_action('wp_ajax_myfilter', 'rpmcpt_listing_sort_function'); 
add_action('wp_ajax_nopriv_myfilter', 'rpmcpt_listing_sort_function');
function rpmcpt_listing_sort_function(){
    global $wpdb;

    $search_params = $_POST;
    
    if( count($search_params['query']) > 1 && !is_search_filter_blank($search_params['query'])){
        
        $ajax_select_clause = "SELECT DISTINCT $wpdb->posts.*
                               FROM $wpdb->posts ";
        $ajax_join_clause .= "LEFT JOIN $wpdb->postmeta AS price
                               ON ($wpdb->posts.ID = price.post_id AND price.meta_key = '_rpmcpt_listing_price') ";
        

        $query_params  = $search_params['query'];
        

        
        if( $query_params['s'] ){
            
            $searchterm_array = explode(" ", $query_params['s']);

            
            for( $i = 0; $i < count($searchterm_array); $i++ ){
                $ajax_join_clause .= "LEFT JOIN $wpdb->postmeta AS ajaxsearchterm$i "
                                  . "ON ($wpdb->posts.ID = ajaxsearchterm$i.post_id) ";
                
                //escape the keyword 
                $clean_search_term = $wpdb->esc_like($searchterm_array[$i]);
                $clean_search_term = "%".$clean_search_term."%";

                
                if($i === 0){
                    
                    $ajax_where_clause .= $wpdb->prepare(
                                                           "(($wpdb->posts.post_title LIKE '%s')
                                                            OR (ajaxsearchterm$i.meta_value LIKE '%s')
                                                            OR ($wpdb->posts.post_excerpt LIKE '%s')
                                                            OR ($wpdb->posts.post_content LIKE '%s')) " ,
                                                            $clean_search_term,
                                                            $clean_search_term,
                                                            $clean_search_term,
                                                            $clean_search_term
                                                        );
                }else{
                    $ajax_where_clause .= $wpdb->prepare(
                                                            "AND (($wpdb->posts.post_title LIKE '%s')
                                                             OR (ajaxsearchterm$i.meta_value LIKE '%s')
                                                             OR ($wpdb->posts.post_excerpt LIKE '%s')
                                                             OR ($wpdb->posts.post_content LIKE '%s')) ",
                                                             $clean_search_term,
                                                             $clean_search_term,
                                                             $clean_search_term,
                                                             $clean_search_term
                                                        );
                    
                }
                
            }
            $ajax_where_clause = "AND(".$ajax_where_clause.") ";
//            echo "<p>$ajax_where_clause</p>";
            
            
//            var_dump($ajax_where_clause);
//            var_dump($ajax_join_clause);
//            $ajax_join_clause = ""
                        //LEFT JOIN wp_postmeta AS searchterm0 
                        //ON (wp_posts.ID = searchterm0.post_id)
                        //LEFT JOIN wp_postmeta AS searchterm1 
                        //ON (wp_posts.ID = searchterm1.post_id)
        }
        
        if( $query_params[ 'availability' ]){

             $ajax_join_clause .= "LEFT JOIN $wpdb->postmeta AS availability
                                   ON ($wpdb->posts.ID = availability.post_id) ";
             
             $query_availability = $query_params[ 'availability' ];
        
             //used to sanitize the user input to prevent injection
            $ajax_where_clause .= $wpdb->prepare(
                                                    " AND (availability.meta_key = '_rpmcpt_listing_availability' AND availability.meta_value = '%s')",
                                                    $query_availability
                                                ); 
        }
         
        if( $query_params[ 'price' ]){
             
            //set the number to 2 decimal places to test against
            $query_price = floatval($query_params[ 'price' ]);

            //used to sanitize the user input to prevent injection
            $ajax_where_clause .= $wpdb->prepare(
                                                    " AND (price.meta_key = '_rpmcpt_listing_price' AND price.meta_value <= %f)",
                                                    $query_price
                                                );
        }
         
        if( $query_params[ 'city' ]  ){
        
            $ajax_join_clause .= "LEFT JOIN $wpdb->postmeta AS city
                                  ON ($wpdb->posts.ID = city.post_id) ";    

            $query_city = $query_params[ 'city' ];

            //used to sanitize the user input to prevent injection
            $ajax_where_clause .= $wpdb->prepare(   
                                                    " AND (city.meta_key = '_rpmcpt_listing_location' AND city.meta_value = '%s')",
                                                    $query_city
                                                );
        }
        
        if( $query_params[ 'type' ]  ){
        
            $ajax_join_clause .= "LEFT JOIN $wpdb->postmeta AS type
                                  ON ($wpdb->posts.ID = type.post_id) ";    

            $query_type = $query_params[ 'type' ];

            //used to sanitize the user input to prevent injection
            $ajax_where_clause .= $wpdb->prepare(   
                                                    " AND (type.meta_key = '_rpmcpt_listing_type' AND type.meta_value = '%s')",
                                                    $query_type
                                                );
        }
        
        if( $query_params[ 'bedrooms' ]  ){
        
            $ajax_join_clause .= "LEFT JOIN $wpdb->postmeta AS bedrooms
                                  ON ($wpdb->posts.ID = bedrooms.post_id) ";    

            $query_bedrooms = $query_params[ 'bedrooms' ];
        
            //used to sanitize the user input to prevent injection
            $ajax_where_clause .= $wpdb->prepare(   
                                                    " AND (bedrooms.meta_key = '_rpmcpt_listing_bedrooms' AND bedrooms.meta_value >= %d)",
                                                    $query_bedrooms
                                                );
        }
        
        if( $query_params[ 'bathrooms' ]  ){
        
            $ajax_join_clause .= "LEFT JOIN $wpdb->postmeta AS bathrooms
                                  ON ($wpdb->posts.ID = bathrooms.post_id) ";    

            $query_bathrooms = $query_params[ 'bathrooms' ];
        
            //used to sanitize the user input to prevent injection
            $ajax_where_clause .= $wpdb->prepare(   
                                                    " AND (bathrooms.meta_key = '_rpmcpt_listing_bathrooms' AND bathrooms.meta_value >= %d)",
                                                    $query_bathrooms
                                                );
        }
        
        
        
        
         
        
        $ajax_where_clause = "WHERE 1=1 "
                            . $ajax_where_clause .
                            "AND $wpdb->posts.post_type = 'listing'
                            AND ($wpdb->posts.post_status = 'publish'
                            OR $wpdb->posts.post_status = 'private') ";
            
            //$str = $filter_type_string ;
        $filter_type_string = $_POST['value'];
        //get the filter type 
        $matches = array();
        preg_match('/listing-filter=(.*)\&action/', $filter_type_string , $matches);
        //var_dump($matches[1]); // $m[1] is your string
        $filter_type = $matches[1];

        switch($filter_type){
            //price ascending
            case 'ASC':
                $ajax_orderby_clause = "ORDER BY 0+TRIM(price.meta_value) ASC";
//                var_dump($args);          
                break;
            //price descending
            case 'DESC' :
                $ajax_orderby_clause = "ORDER BY 0+TRIM(price.meta_value) DESC";
//                var_dump($args);
                break;

            //no sort selected
            default : 
                $ajax_orderby_clause = "ORDER BY ($wpdb->posts.post_date) DESC";

                break;
        }

        $sql_string = $ajax_select_clause . $ajax_join_clause . $ajax_where_clause . $ajax_orderby_clause;
//            echo"<p>$sql_string</p>";
        $ajax_page_posts = $wpdb->get_results($sql_string, OBJECT);

//            var_dump($ajax_page_posts);

        if($ajax_page_posts){
            global $post;

            foreach($ajax_page_posts as $post){

                setup_postdata($post);
                get_template_part( 'template-parts/content', 'listing-archive' );
            }
        }else{
            ?>
            <h2 class="center">Not Found</h2>
            <p class="center">Sorry, but you are looking for something that is not here.</p>
            <?php
        }
        
    }else{
        
        $args = [
                    'post_type' => 'listing',
                    'suppress_filters' => true,
                    'orderby' => 'meta_value_num',
                    'meta_query' => [
                                         ['key' => '_rpmcpt_listing_price',
                                          'type' => 'NUMERIC'
                                         ]
                                     ]
                ];
        
        //$str = $filter_type_string ;
        $filter_type_string = $_POST['value'];
        //get the filter type 
        $matches = array();
        preg_match('/listing-filter=(.*)\&action/', $filter_type_string , $matches);
        //var_dump($matches[1]); // $m[1] is your string
        $filter_type = $matches[1];
        
        switch($filter_type){
            //price ascending
            case 'ASC':
                $args['order']= 'ASC';
//                var_dump($args);          
                break;
            //price descending
            case 'DESC' :
                $args['order']= 'DESC';
//                var_dump($args);
                break;
                
            //no sort selected
            default : 
                $args['orderby']= 'post_date';
                
                break;
        }
        
        $query = new WP_Query($args);
       
        if( $query->have_posts() ) :
                while( $query->have_posts() ): $query->the_post();
                        get_template_part( 'template-parts/content', 'listing-archive' );

                endwhile;

        else :
                echo 'No posts found';
        endif;
        wp_reset_postdata();

    }
    

    die();
        
}


function is_search_filter_blank($query){
    
    $is_the_filter_blank = true;
    
    if($query['s']){
        $is_the_filter_blank = false;
        return $is_the_filter_blank;
    }else if($query['city']){
        $is_the_filter_blank = false;
        return $is_the_filter_blank;
    }else if($query['type']){
        $is_the_filter_blank = false;
        return $is_the_filter_blank;
    }else if($query['price']){
        $is_the_filter_blank = false;
        return $is_the_filter_blank;
    }else if($query['availability']){
        $is_the_filter_blank = false;
        return $is_the_filter_blank;
    }else if($query['bedrooms']){
        $is_the_filter_blank = false;
        return $is_the_filter_blank;
    }else if($query['bathrooms']){
        $is_the_filter_blank = false;
        return $is_the_filter_blank;
    }
    
    return $is_the_filter_blank;
}


//runs only when the theme is set up
function custom_flush_rules(){
	//defines the post type so the rules can be flushed.
	rpmcpt_custom_post_types();

	//and flush the rules.
	flush_rewrite_rules();
}
add_action('after_theme_switch', 'custom_flush_rules');
