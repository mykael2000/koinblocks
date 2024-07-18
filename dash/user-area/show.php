<?php

include "includes/header.php";

?>
<div class="wrapper">
    <div class="container-fluid" id="container-wrapper">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Deposits</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Investment Plans</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row mb-3">


            <!-- Invoice Example -->
            <div class="col-xl-12 col-lg-12 mb-4">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>PLANS</th>
                                    <th>AMOUNT SPENT ($)</th>
                                    <th>DAILY PROFIT (%)</th>
                                    <th>DURATION</th>


                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>BASIC Plan</td>


                                    <td>$700 - $5,000</td>

                                    <td>24%</td>
                                    <td>10-11days</td>



                                </tr>
                                <tr>


                                    <td>SILVER Plan</td>

                                    <td>$5,000 - $50,000</td>
                                    <td>30%</td>
                                    <td>10-11days</td>


                                </tr>
                                <tr>


                                    <td>GOLD Plan</td>

                                    <td>$50,000 - $100,000</td>
                                    <td>35%</td>
                                    <td>10-11days</td>


                                </tr>
                                <tr>


                                    <td>VIP Plan</td>

                                    <td>$100,000 - $10,000,000</td>
                                    <td>40%</td>
                                    <td>10-11days</td>


                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>

        </div>


        <!-- Modal Center -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Deposit/Investment Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="loadData">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
let detailsBtn = document.querySelectorAll('.detailsBtn');

detailsBtn.forEach((btn) => {

    $(btn).click(() => {

        let deposit_id = btn.dataset.depositId

        $.ajax({
            url: '/deposits/' + deposit_id + '/show',
            method: "GET",
            success: (response) => {

                $("#loadData").html(response)
                $("#exampleModalCenter").modal('show')
            },
            error: (error) => {

                console.log(error)

            }
        })

    })

})
</script>
<?php

include "includes/footer.php";

?>