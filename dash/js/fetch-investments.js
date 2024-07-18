
function fetchInvestments() {

    $.ajax({
        url : '/admin/fetch/investment-plans', // route to your controller
        method : 'GET',
        success : (response) => {

            $(".data").html(response)
            
        },
      error  : (error) => {
    
            console.log(error)
      }
    });

}

