$('.company-info').on('submit', (e)=>{

    e.preventDefault();

    let form = document.querySelector('.company-info');

    let formData = new FormData(form);

    $.ajax({
          url : '/admin/general-settings/company-info', // route to your controller
          method : 'POST',
          processData : false,
          contentType : false,
          data : formData,
          beforeSend : () => {

            $('.save').html('Saving...')

          },
          success : (response) => {
              $('.save').html('Save')
              handleError(response)
              if(response.success) {

                toastr.success('Your changes has been saved successfully!');

              }
          },
        error  : (error) => {
              // handle error on requests exceptions 
              console.log(error)
        }
    });

})


$('.website-setting').on('submit', (e)=>{

    e.preventDefault();

    let form = document.querySelector('.website-setting');

    let formData = new FormData(form);

    $.ajax({
          url : '/admin/general-settings/website-setting', // route to your controller
          method : 'POST',
          processData : false,
          contentType : false,
          data : formData,
          beforeSend : () => {

            $('.save').html('Saving...')

          },
          success : (response) => {
              $('.save').html('Save')
              handleError(response)
              if(response.success) {

                toastr.success('Your changes has been saved successfully!');

              }
          },
        error  : (error) => {
              // handle error on requests exceptions 
              console.log(error)
        }
    });

})

$('.referral-setting').on('submit', (e)=>{

    e.preventDefault();

    let form = document.querySelector('.referral-setting');

    let formData = new FormData(form);

    $.ajax({
          url : '/admin/general-settings/referral-setting', // route to your controller
          method : 'POST',
          processData : false,
          contentType : false,
          data : formData,
          beforeSend : () => {

            $('.save').html('Saving...')

          },
          success : (response) => {
              $('.save').html('Save')
              handleError(response)
              if(response.success) {

                toastr.success('Your changes has been saved successfully!');

              }
          },
        error  : (error) => {
              // handle error on requests exceptions 
              console.log(error)
        }
    });

})