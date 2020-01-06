/* 
 * Copyright (C) 2019 ChristmanMichael
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
//var ajaxURL = window.location.protocol + "//" + window.location.host + '/wp-admin/admin-ajax.php';
//            alert(ajaxURL);
//alert('Infinite Scrolling');


( function( $ ){
    
    $('#more-listings-button').click( function( e ) {
        e.preventDefault;
//        alert('do some ajax');
        more_listings();
    });
    
    var ajaxLock = false;

    if( ! ajaxLock ) {

        function more_listings() {

            ajaxLock = true;

            //How many posts there's total
            var totalPosts =  proper_tea_listing_load_posts_data.total_listings;
    //            alert('There are '+totalPosts+' total posts');

            //How many have been loaded
            var postOffset = $( '.type-listing' ).length;
    //            alert(postOffset + ' are showing');
            //How many do you want to load in single patch
            var postsPerPage = 10;
    //
    //            //Hide button if all posts are loaded
            if( totalPosts <= postOffset + ( 1 * postsPerPage ) ) {

                $( '#more-listings-button' ).fadeOut();
            }

            //listing sort filter
            var listingSortFilter = $('#listing-filter option:selected').val();
    //        alert(listingSortFilter);

            // site ajax url 
            var ajaxURL = proper_tea_listing_load_posts_data.ajax_url;

            //page navigation text
            var page = 1 + postOffset/postsPerPage; 
            var pageNavHTML = '<nav  id="listing-page-break-'+page+'" class="listing-page-break">'+
                    '<a href="#listing-page-break-'+(page - 1)+'">'+
                    'Page '+page+
                    '</a>'+
                    '</nav>';


            //Ajax call itself
            $.ajax({

                type: 'POST',
                url:  ajaxURL,
                data:{
                    action: 'morelistings',
                    offset:postOffset ,
                    query: proper_tea_listing_load_posts_data.query,
                    value:listingSortFilter
                },


                //Ajax call is successful
                success: function ( response ) {
                    response = JSON.parse(response);

                    //Add new posts
                    $( '#listing-results' ).append(response[0]);
                    $( '#listing-results' ).append(pageNavHTML);
                    //Update the count of total posts
                    $( '#total-listings-count' ).text( 'Showing '+ $( '.type-listing' ).length +' of ' + response[1] + ' Listings');

                    //add smooth scroll to new anchor elements
                    $('.listing-page-break:not(#listing-page-break-1) a[href*="#"]:not([href="#"])').on('click keyup', function(event) {
                        if( event.which === 13 || event.type === 'click' ){
                            if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

                                var target = $(this.hash);
                                target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

                                if (target.length) {

                                    $('html, body').animate({
                                        scrollTop: target.offset().top
                                    }, 750);

                                    return false;
                                }
                            }
                        }
                    });
    //                    var globalQuery = proper_tea_listing_load_posts_data.query;
    //                    alert( listingSortFilter);
                    ajaxLock = false;
                },

                //Ajax call is not successful, still remove lock in order to try again
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                    ajaxLock = false;
                }
            });
        }
    }
    
    
} )( jQuery );

