( function( $ ) {
    
    function toggleForm() {
        $("#rentPaymentForm").toggle();
        $("#LoadingImage").toggle();
    }
    
    // client defined callback to handle the successful token response
    function HandleTokenResponse(tokenResponse) {
//        console.log('SUCCESSCALLBACK');
        var tokenHolder = $("#paymentToken");
        if (tokenResponse.token !== "") {
            tokenHolder.val(tokenResponse.token);
        }else{
            toggleForm();
            return;
        }

        // Show "waiting" gif
        $("#rentPaymentForm").submit();
    }
    
     // client-defined callback to handle error responses
    function HandleErrorResponse(errorResponses) {
        toggleForm();
        var errorText = "";
        for (var key in errorResponses) {
            errorText += " Error Code: " + errorResponses[key].error_code + " Reason: " + errorResponses[key].reason + "\n";
        }
        alert(errorText);
    }
    
    // create a submit action handler on the payment form, which calls CreateToken
    $("#SubmitButton").click(function (ev) {
//        toggleForm();
        CayanCheckout.createPaymentToken({ success: HandleTokenResponse, error: HandleErrorResponse });

        // AJAX SOAP request here

        ev.preventDefault();
    });
} )( jQuery );





