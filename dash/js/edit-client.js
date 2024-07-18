$('.edit-client').on('submit', (e)=>{

    e.preventDefault();

    let form = document.querySelector('.edit-client');

    let formData = new FormData(form);

    $.ajax({
          url : '/admin/clients/update', // route to your controller
          method : 'POST',
          processData : false,
          contentType : false,
          data : formData,
          beforeSend : () => {

            $('.submit').html('Saving...')

          },
          success : (response) => {
              $('.submit').html('Save')
              handleError(response)
              if(response.success) {

                toastr.success("Client's details updated successfully!");


              }
          },
        error  : (error) => {
              // handle error on requests exceptions 
              console.log(error)
        }
    });

  })