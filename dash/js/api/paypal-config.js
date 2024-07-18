$('.paypal-form').on('submit', (e)=>{

    e.preventDefault()

    let form = document.querySelector('.paypal-form');

    let formData = new FormData(form)

    $.ajax({
        method : "POST",
        url : '/admin/api-integrations/paypal',
        data : formData,
        processData : false,
        contentType : false,
        beforeSend  : () => {

            $('.save').html('Saving...')

        },
        success     : (response) => {

            $('.save').html('Save changes')

            handleError(response)

            if(response.success) {

                toastr.success('Changes saved successfully');

            }

        },
        error       : (err) => {

        }
    })

})