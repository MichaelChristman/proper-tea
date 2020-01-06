/* global proper_tea_price_sort_data */

( function( $ ) {
    
    
        $('#listing-filter').submit(function(){
            var filter = $('#listing-filter');
            
            var filterString = filter.serialize();//form data
            
            //extract the value
            var filterRegex = /listing-filter=(.*)\&action/;
            var filterValue = filterString.match(filterRegex);
            
            //clear existing select attributes
            filter.find('option').removeAttr("selected");
            
            //replace the page navigation
            var pageNavHTML =   '<nav  id="listing-page-break-1" class="listing-page-break">'+
                                    '<a href="#listing-results">'+
                                        'Page 1'+
                                    '</a>'+
                                '</nav>';
            
         
            
            //redisplay the more listings button
            $( '#more-listings-button' ).fadeIn();
            
          
            
            $.ajax({
                type: filter.attr('method'), //POST
                url: filter.attr('action'),
                data:{
                    action: 'myfilter',
                    query: proper_tea_price_sort_data.query, 
                    value: filterValue[1] //filter value
                },
                
                beforeSend:function(xhr){
                    filter.find('button').text('Processing...'); //changing the button label
                },
                success:function(data){
                    response = JSON.parse(data);
                    filter.find('button').text('Sort');//changing the button label back
                    $('#listing-results').html(response[0]); //insert data
                    $('#listing-results').append(pageNavHTML);
                    //set new selected attribute
                    filter.find('option[value="'+filterValue[1]+'"]').attr("selected","selected");
                    $( '#total-listings-count' ).text( 'Showing '+ $( '.type-listing' ).length +' of ' + response[1] + ' Listings');
                },
                error: function(XMLHttpRequest, textStatus, errorThrown){
                    alert(errorThrown);
                }
            });
            
            return false;
        });
} )( jQuery );


