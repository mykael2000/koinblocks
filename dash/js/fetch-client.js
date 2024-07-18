
function fetchClients() {

    $.ajax({
        url : '/admin/fetch/clients', // route to your controller
        method : 'GET',
        success : (response) => {

            $(".clients").html(response)
            
        },
      error  : (error) => {
    
            console.log(error)
      }
    });

}

