document.querySelectorAll('.delBtn').forEach((btn) => {

    $(btn).click( () => {

        $.ajax({

            url : "/admin/payment-methods/delete/"+ btn.dataset.paymentMtdId,
            method : "GET",
            beforeSend : () => {

                btn.innerHTML = '<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span> Deleting...'
                
            },
            success      : (response) => {

                btn.innerHTML = 'Delete'

                if(response.success) {

                    fetchPaymentMethods()

                }

            },

            error        : (error) => {

                console.log(error);

            }

        })

    } )

})
