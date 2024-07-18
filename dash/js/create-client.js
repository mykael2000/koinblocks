$('.create-client').on('submit', (e)=>{

    e.preventDefault();

    let form = document.querySelector('.create-client');

    let formData = new FormData(form);

    $.ajax({
          url : '/admin/clients', // route to your controller
          method : 'POST',
          processData : false,
          contentType : false,
          data : formData,
          beforeSend : () => {

            $('.submit').html('Saving...')

          },
          success : (response) => {
              $('.submit').html('Submit')
              handleError(response)
              if(response.success) {

                toastr.success('Client added successfully!');

                form.reset()

              }
          },
        error  : (error) => {
              // handle error on requests exceptions 
              console.log(error)
        }
    });

  })