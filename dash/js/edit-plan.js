$('.formSubmit').on('submit', (e)=>{

    e.preventDefault();

    let form = document.querySelector('.formSubmit');

    let formData = new FormData(form);

    $.ajax({
          url : '/admin/investment-plans/update', // route to your controller
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

                toastr.success('Successfully updated investment plan');


              }

          },
        error  : (error) => {
              // handle error on requests exceptions 
              console.log(error)
        }
    });

  })