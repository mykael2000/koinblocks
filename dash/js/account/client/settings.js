$(".personalInfoForm").submit( (e)=>{

    e.preventDefault()

    const form = document.querySelector('.personalInfoForm');

    const formData = new FormData(form)

    $.ajax({

        url : '/account/personal-info/setting',
        method : "POST",
        data   : formData,
        processData : false,
        contentType : false,
        beforeSend : () => {
            $(".saveBtn").html('Saving...')
        },
        success :(response) => {

            $(".saveBtn").html("Save changes")

            handleError(response)

            if(response.success) {

                $(".d-full_name").html(formData.get('full_name'))
                $(".d-email").html(formData.get('email'))
                toastr.success('Changes saved successfully!');

            }

        },
        error : (error) => {

            console.log(error)

        }

    })
   
} )


$(".accountSecurityForm").submit( (e) => {

    e.preventDefault();

    const form = document.querySelector('.accountSecurityForm');

    const formData = new FormData(form)

    $.ajax({
        url : '/account/password/setting',
        method : 'POST',
        data: formData,
        processData: false,
        contentType: false,
        beforeSend : () => {
            $(".saveBtn").html('Saving...')
        },
        success :(response) => {

            $(".saveBtn").html("Save changes")

            handleError(response)

            if(response.success) {

                toastr.success('Changes saved successfully!');

            }

            form.reset()

        },
        error : (error) => {

            console.log(error)

        }
    })

} )

$('#change_avatar').change(()=>{
    let img = document.querySelector('#change_avatar')
    if (img.files && img.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {

            $('#avatar_preview').attr('src', e.target.result);

            const form = document.querySelector('.avatarForm');
            const formData = new FormData(form)

            $.ajax({
                url : '/account/avatar/setting',
                method : 'POST',
                data : formData,
                processData : false,
                contentType : false,
                beforeSend  : () => {
                    $('.chng-btn').html('Saving...')
                },
                success     : (response) => {

                    $(".chng-btn").html("Change avatar")

                    handleError(response)
                    if(response.success) {

                        toastr.success('Your avatar has been saved successfully!');
        
                    }
                    form.reset()
                },
                error : (error) => {
                    console.log(error)
                }
            })


        }
        reader.readAsDataURL(img.files[0]); // convert to base64 string
    }
})


// handle payment information settings

$("#payment_method").on('change', ()=>{

    let payment_method_id = $("#payment_method").val();

    if(payment_method_id !='') {

        $.ajax({
          url : '/account/payment-info/payment-method/'+payment_method_id,
          method : 'GET',
          success: (response)=>{

            if(response.payment_method == 'manual') {
                $(".manual-method").removeClass('d-none')
            } else {
              $(".manual-method").addClass('d-none')
            }
            
            if(response.payment_method == 'bank') {
              $(".bank-method").removeClass('d-none')
            } else {
              $(".bank-method").addClass('d-none')
            }
            
            if(response.payment_method == 'automated') {

              if(response.payment_data.payment_api == 'paypal') {
                $(".paypal-method").removeClass('d-none')
              } else {
                $(".paypal-method").addClass('d-none')
              }

            } else{
              $(".auto-method").addClass('d-none')
            }
            
          },
          error : (error) => {
            console.log(error)
          }
      })

    } else {
      $(".method").addClass('d-none')
    }

  })

  $(".paymentForm").on('submit', (e)=>{
    e.preventDefault()

    let form = document.querySelector('.paymentForm');
    let formData = new FormData(form);

    $.ajax({

      url : '/account/payment-info',
      method: 'POST',
      processData : false,
      contentType : false,
      data : formData,
      beforeSend : () => {
        $(".saveBtn").html('Saving...')
      },
      success : (response) => {

        $(".saveBtn").html('Save changes')

        handleError(response)

        if(response.success) {

            toastr.success('Your payment information has been saved successfully!');

        }

        
      },
      error : (error) => {

        console.log(error)

      }

    })

  })