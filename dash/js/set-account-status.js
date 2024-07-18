  document.querySelectorAll('.ac_statusBtn').forEach((btn) => {

    $(btn).click( () => {

        let status  = btn.dataset.accountStatus;

        $.ajax({

            url : "/admin/clients/account/status/"+ btn.dataset.clientId + '?s='+status,
            method : "GET",
            
            success      : (response) => {


                if(response.success) {

                    fetchClients()

                    if(status == 'active') {

                        toastr.success('Account activated successfully!');
                    } else if(status == 'inactive') {
                        toastr.success('Account deactivated successfully!');
                    }

                }

            },

            error        : (error) => {

                console.log(error);

            }

        })

    } )

})
