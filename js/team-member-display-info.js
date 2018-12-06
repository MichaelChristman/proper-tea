/* 
 * Copyright (C) 2017 ChristmanMichael
 * 
 * Used to Display Team Member Information 
 */


( function( $ ) {
    
     /*
      * Declare component variables
      */
     var team_member = $('.rpm-team-member-archive-wrap article.type-team-member');
     var learn_more_button = $('.rpm-team-member-archive-wrap .team-member-learn-more-wrap button');
     var learn_less_button = $('.rpm-team-member-archive-wrap .team-member-learn-less-wrap button');
     var body = $('body');
     /*
      * Add Default Class states
      */
     team_member.addClass('toggled-off');
//     learn_more_button.addClass('bordello');
     /*
      *  When more info button gets clicked
      */
     learn_more_button.on('click', function(){
         
        /*
         * Get the content relative to the button pressed
         */
        var relativeContainer = $(this).closest('.team-member');
        var relativeTeamContent = $(this).closest('.team-member-content-wrap');
//        var relativeEntryContent = $(this).closest('.team-member').children('.entry-content');
//         

        /*
        * Toggle the class for the entry-content
        */
       if (relativeContainer.hasClass('toggled-off')){
            
            relativeContainer.addClass('toggled-on');
            relativeContainer.removeClass('toggled-off'); 

            body.addClass('noscroll');
             //           relativeContainer.scrollTop = 0;

            relativeTeamContent.animate({scrollTop: 0}, 100);
       }
       
     });
     
     /*
      *  When less info button gets clicked
      */
     learn_less_button.on('click', function(){
         
        /*
         * Get the content relative to the button pressed
         */
        var relativeContainer = $(this).closest('.team-member');
        var relativeTeamContent = $(this).closest('.team-member-content-wrap');
//        var relativeEntryContent = $(this).closest('.property').children('.entry-content');
//         

        /*
        * Toggle the class for the entry-content
        */
       if (relativeContainer.hasClass('toggled-on')){
           relativeContainer.addClass('toggled-off');
           relativeContainer.removeClass('toggled-on'); 
           body.removeClass('noscroll');
           body.animate({scrollTop: 0}, 100);
           relativeTeamContent.animate({scrollTop: 0}, 0);
       }
       
     });
            
            
            
    
//    var team_member = jQuery('div.rpm-team-member-archive-wrap article');
//    var member_bio = team_member.children('.entry-content');
//    var bio_toggled_on = false;
//    
//    
//    team_member.off('click').on('click', function(event){
//      
//        event.preventDefault();
//      
//      
//        var target = jQuery(event.target);
//      
//      
//      
//        if(bio_toggled_on === false){
//
//            target.find('div.archive-team-position').stop(true, false).animate({
//              marginTop: "-13rem"
//            },400,function(){
//              target.children('div.entry-content').removeClass('screen-reader-text');
//              bio_toggled_on = true;
//
//            });
//
//        }else{
//
//          target.children('div.entry-content').addClass('screen-reader-text');
//
//          target.find('div.archive-team-position').stop(true, false).animate({
//              marginTop: "-3.3rem"
//           },400,function(){
//              bio_toggled_on = false;
//
//           });
//
//        }//endif
//        
//      
//      
//    });
    
    
    
} )( jQuery );

