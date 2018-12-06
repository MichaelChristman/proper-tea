/* global proper_tea_price_sort_data */

( function( $ ) {
        $('#listing-filter').submit(function(){
            var filter = $('#listing-filter');
            
            $.ajax({
                type: filter.attr('method'), //POST
                url: filter.attr('action'),
                data:{
                    action: 'myfilter',
                    query: proper_tea_price_sort_data.query, 
                    value:filter.serialize() //form data
                },
                //data:filter.serialize(),
                beforeSend:function(xhr){
                    filter.find('button').text('Processing...'); //changing the button label
                },
                success:function(data){
                    filter.find('button').text('Sort');//changing the button label back
                    $('#listing-results').html(data); //insert data
                    //var serlializedData = filter.serialize();
                    //var globalQuery = proper_tea_price_sort_data.query;
                    //alert( globalQuery);
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    alert(errorThrown);
                }
            });
            
            return false;
        });
} )( jQuery );


