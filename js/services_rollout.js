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
jQuery(document).ready(function(){
    
    var services_section = jQuery('div.services-sub-section');
    var services = [];
    var articleIDs = jQuery(services_section)
             .find("article") //Find the articles
             .map(function() { return this.id; }) //Project Ids
             .get(); //ToArray
    
    var toggleButton = " .service-thumbnail-wrap";
    var contents = " .entry-content";
    
    //Add id attribute to the services-sub-section
    jQuery( services_section ).attr('id', 'services-sub-section');
    
    /*
     * Loop that will create array of Article Objects
     */
    for (var i = 0; i < articleIDs.length; i++){
        
        services[i] = new Article( articleIDs[i], "#" + articleIDs[i].concat(toggleButton), "#" + articleIDs[i].concat(contents) );    
    
    }
     
    
    
    /*
     * add event listeners to property within array of objects
     */  
    for (var i = 0; i < services.length; i++){
        
        var button = document.querySelector( services[i].buttonSelector );
        var content = document.querySelector( services[i].contentSelector );
        
        //inject HTML inside the button that links to the appropriate entry-content
        jQuery( button ).wrap("<a href='#services-sub-section'></a>");
        
  
        makeButtonAndContent(button,content);
    }
    
    
    /*
     * @param {type} idAtt
     * @param {type} buttonSelector
     * @param {type} contentSelector
     * @returns {services_rolloutL#18.Article}
     */
    function Article(idAtt, buttonSelector, contentSelector){
        this.idAtt = idAtt;
        this.buttonSelector = buttonSelector;
        this.contentSelector = contentSelector;
    }
    
    /*
     * Takes in html nodes and turns them into buttons which toggle 
     * on or off the associated entry-content
     * 
     * needs to be controlled so only one may be open at a time
     */
    function makeButtonAndContent( button, content ){
        
        jQuery(button).on('click keyup', function(event){
            
            if( event.which === 13 || event.type === 'click' ){
                if ( -1 !== content.className.indexOf( 'toggled' ) ) {

                    content.className = content.className.replace( ' toggled', '' );
                    button.setAttribute( 'aria-expanded', 'false' );

                    //jQuery( content ).addClass('screen-reader-text');

                }else{

                    //call function to close open entry-content
                    closeOpenContent();

                    content.className += ' toggled';
                    button.setAttribute( 'aria-expanded', 'true' );

                }
            }else{
                return;
            }
        }); 
    }
    
    function closeOpenContent(){
        
        //alert("CloseOpenContent Has Been invoked");
        
        for (var i = 0; i < services.length; i++){
        
            var button = document.querySelector( services[i].buttonSelector);
            var content = document.querySelector( services[i].contentSelector);
            
            content.className = content.className.replace( ' toggled', '' );
            button.setAttribute( 'aria-expanded', 'false' );
            
        }
    }
    
});



