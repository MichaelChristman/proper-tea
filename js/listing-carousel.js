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

/*
 * Add Carousel functinality to listing featured galleries
 */
( function( $ ){
   
    var featured_gallery = $('figure.the-featured-gallery');
    var featured_image = $('figure#the-featured-image');
    
    var inital_featured_image = featured_image.find('img');
    

    
    //add spans on either side of the Carousel
    featured_gallery.prepend('<div class="listing-carousel-nav listing-carousel-backward"><span class="nav-icon"><</span></div>');
    featured_gallery.append('<div class="listing-carousel-nav listing-carousel-forward"><span class="nav-icon">></span></div>');
    

    var featured_gallery_forward = $('.listing-carousel-forward');
    var featured_gallery_backward = $('.listing-carousel-backward');
    var featured_gallery_wrap = $('.the-featured-gallery-carousel-wrap');
    var featured_gallery_item = $('.featured-gallery-item');


    /*
     * Scroll the carousel when arrow is clicked
     */
    featured_gallery_forward.on('click', function(e){
        //get the width of the featured gallery wrap
        var fgw_width = featured_gallery_wrap.width();
        var scroll_position = featured_gallery_wrap.scrollLeft();
        var scroll_adjust = scroll_position + (fgw_width * 0.4);
        
        featured_gallery_wrap.animate({
          scrollLeft: scroll_adjust
        }, 500, function() {});
        
    });
    
    featured_gallery_backward.on('click', function(e){
        //get the width of the featured gallery wrap
        var fgw_width = featured_gallery_wrap.width();
        var scroll_position = featured_gallery_wrap.scrollLeft();
        var scroll_adjust = scroll_position - (fgw_width * 0.4);
        
        featured_gallery_wrap.animate({
          scrollLeft: scroll_adjust
        }, 500, function() {});
        
    });
    
    
    featured_gallery_item.on('click', function(e){
        
        //turn off any previous featured elements and empty the featured image
        featured_gallery_item.removeClass('featured');
        featured_image.empty();
        
        //add featured class to target image
        var _this = $( this );
        _this.addClass('featured');
        
        
        
        //if the featured image is present as the first item in the carousel & is the target image
        if( _this.is( ":first-child" ) ){
            //use the original element attributes to retrieve the approriate image
            featured_image.append(inital_featured_image);
        }else{
            //call the appropriate image
           
            //get target image data
            var target_src = _this.find('img').prop('src');

            
            //replace the featured image with the target image
            featured_image.append('<img src="'+target_src+'"/>');
        }
           
    });
    
} )( jQuery );


