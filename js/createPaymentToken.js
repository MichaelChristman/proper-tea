( function( $ ) {
    $('#submitPayment').click(function (e) {
        // Prevent the user from double-clicking
        $(this).prop('disabled', true);
        
        e.preventDefault();
        
        //verify amount
        var rentAmount = $("input[name='formtransamount'").val();
        
        if(isCurrency(rentAmount)){
            console.log('Valid Rent Amount'); 
            var isValidAmount = true;
        }else{
            alert('Invalid rent amount');
        }
        
        
        setToken(makeAJAXcall);
        
        function setToken(callback){
            // Create the payment token
            CayanCheckout.createPaymentToken({
                success: function(response) {
                callback(successCallback(response));
            },
                error: failureCallback
            });
        }
        
        function makeAJAXcall(tokenStatus) {
//            console.log(result);
            if(tokenStatus === true){
                console.log('Token Status is true, make AJAX SOAP CALL'); 
                
                var soapMessage = buildSOAPEnvelope();
                var serviceURL = "https://ps1.merchantware.net/Merchantware/ws/RetailTransaction/v45/Credit.asmx";
//                var originDomain = "http://localhost";
                
                $.ajax({
                    url:serviceURL,
                    type:'POST',
                    dataType: "xml",
                    data:{
                        envelope:soapMessage
                    },
                    contentType: "text/xml; charset=\"utf-8\"",
                    
                    success: function ( response ) {
                        console.log(response);
                    },

                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        console.log(errorThrown);
                    }

                });
            }else{
                console.log('The token status is not true, something unexpected happened');
            }
        }

        
//        if(isValidAmount){
//            //create a promise
//            const promise = new Promise(function(resolve, reject){
//                
//                console.log('This is what the inside of a promise looks like.');
//                
//                // do a thing, possibly async, then…
//                var isTokenSet = $("input[name='paymentToken'").val();
//                
//                if(isTokenSet){
//                  resolve("Stuff worked!");
//                }else {
//                  reject(Error("It broke"));
//                }
//               
//            });
//            
//            promise.then(function(result) {
//                console.log(result); // "Stuff worked!"
//            },function(err) {
//                console.log(err); // Error: "It broke"
//            });
//        }
//        
        
        
        //test that the token has been set
//        var isTokenSet = $("input[name='paymentToken'").val();
//        
//        if(isTokenSet){
//            console.log('Token Value is set');
//        }else{
//            console.log('The token is not yet set');
//        }
        
                    // AJAX SOAP request here
//            $.ajax({
//                type:POST,
//                url:serviceURL,
//                data:{
//                    envelope:buildSOAPEnvelope();
//                },
//                
//                success: function ( response ) {
//                    
//                },
//                
//                error: function (XMLHttpRequest, textStatus, errorThrown) {
//                    alert(errorThrown);
//                }
//                
//            });
        
    });
    
    function successCallback(tokenResponse) {
        console.log('SUCCESSCALLBACK');
//        console.log(tokenResponse);
        // Populate a hidden field with the single-use token
        $("input[name='paymentToken'").val(tokenResponse.token);

        // Submit the form
        $('#paymentForm').submit();
        
        var isTokenSet = false;
        
        if($("input[name='paymentToken'").val() !== ''){
            console.log('the token is set');
            isTokenSet = true;
        }else{
            console.log('the token was not set');
        }
        
        return isTokenSet;
        
        //build SOAP envelope
//        buildSOAPEnvelope();
    }

    function failureCallback(errorResponses) {
        var errorText = "";
        for (var key in errorResponses) {
             errorText += " Error Code: " + errorResponses[key].error_code + " Reason: " + errorResponses[key].reason + "\n";
        }
        alert(errorText);

    }
    
    function buildSOAPEnvelope(){
//        alert("Building envelope");
        cardHolder = $("input[name='formcardholder'").val();
        cardNumber = $("input[name='formcardnumber'").val();
        cardVerificationValue = $("input[name='formcvv'").val();
        
        expirationMonth = $("input[name='formexpiremonth'").val();
        expirationYearFull = $("input[name='formexpireyear'").val();
        expirationYear = expirationYearFull.substr(expirationYearFull.length - 2);
        expirationDate = ""+expirationMonth+""+expirationYear;
        
        streetAddress = $("input[name='formstreetaddress'").val();
        zipCode = $("input[name='formzipcode'").val();
        
        tokenValue =  $("input[name='paymentToken'").val();
        
        amount = $("input[name='formtransamount'").val();
        typedAmount = +amount
        formattedAmount = typedAmount.toFixed(2).toString();
        
        soapMessage = 
            '<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope">\
                <soap:Body>\
                   <Sale xmlns="http://schemas.merchantwarehouse.com/merchantware/v45/">\
                      <Credentials>\
                         <MerchantName>Test bzrezcom</MerchantName>\
                         <MerchantSiteId>YM1J7IQT</MerchantSiteId>\
                         <MerchantKey>W3862-R4YA1-D01SV-JPP6U-31EVU</MerchantKey>\
                      </Credentials>\
                      <PaymentData>\
                         <Source>Keyed</Source>\
                         <!--Keyed Fields-->\
                         <CardNumber>'+cardNumber+'</CardNumber>\
                         <ExpirationDate>'+expirationDate+'</ExpirationDate>\
                         <CardHolder>'+cardHolder+'</CardHolder>\
                         <AvsStreetAddress>'+streetAddress+'</AvsStreetAddress>\
                         <AvsZipCode>'+zipCode+'</AvsZipCode>\
                         <CardVerificationValue>'+cardVerificationValue+'</CardVerificationValue>\\n\
                         <Token>'+tokenValue+'</Token>\
                       </PaymentData>\
                      <Request>\
                         <Amount>'+formattedAmount+'</Amount>\
                      </Request>\
                   </Sale>\
                </soap:Body>\
             </soap:Envelope>';
        console.log(soapMessage);
        return soapMessage;
    }
    
    function isCurrency($number){
      var regularExpression = /^\d+(?:\.\d{0,2})$/;
      var toNumber = +$number;
      
      if (isNaN(toNumber)){
          alert("This is not a number");
          return false;
      }
      
      var currencyFormat = toNumber.toFixed(2);
      
    
      if(regularExpression.test(currencyFormat)){
          console.log("valid input");
      }else{
          alert("invalid input");
          return false;
      }
      
      return true;
    }
} )( jQuery );





