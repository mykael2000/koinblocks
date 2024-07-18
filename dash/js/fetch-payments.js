
function fetchPaymentMethods() {

    $.ajax({
        url : '/admin/fetch/payment-methods', // route to your controller
        method : 'GET',
        success : (response) => {

            $(".data").html(response)
            
        },
      error  : (error) => {
    
            console.log(error)
      }
    });

}

