$(".personalInfoForm").submit( (e)=>{

    e.preventDefault()

    const form = document.querySelector('.personalInfoForm');

    const formData = new FormData(form)

    $.ajax({

        url : '/admin/account/personal-info/setting',
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
        url : '/admin/account/password/setting',
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
                url : '/admin/account/avatar/setting',
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
