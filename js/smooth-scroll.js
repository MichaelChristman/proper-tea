/* 
 * Copyright (C) 2017 ChristmanMichael
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
//jQuery Smooth Page Scrolling
//jQuery(function($) {
// 
//    jQuery('a.scrollToTop, a[href=#top]').click(function(){
// 
//        jQuery('html,body').animate({scrollTop:0}, 1500);
// 
//        return false;
// 
//    });
//});

jQuery(function() {
  jQuery('a[href*="#"]:not([href="#"])').on('click keyup', function(event) {
    if( event.which === 13 || event.type === 'click' ){
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

            var target = jQuery(this.hash);
            target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');

            if (target.length) {

                jQuery('html, body').animate({
                    scrollTop: target.offset().top
                }, 750);

                return false;
            }
        }
    }else{
        return;
    }
  });
});

//jQuery(function() {
////jQuery(button).on('click keyup', function(event){
//  jQuery('a[href*="#"]:not([href="#"])').click(function() {
//    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
//      
//        var target = jQuery(this.hash);
//        target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
//        
//        if (target.length) {
//            
//            jQuery('html, body').animate({
//                scrollTop: target.offset().top
//            }, 1000);
//            
//            return false;
//        }
//    }
//  });
//});