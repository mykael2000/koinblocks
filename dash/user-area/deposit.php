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
                    <h4 class="page-title">Deposit List</h4>
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
                                    <th>Tranx ID</th>
                                    <th>Paid via</th>
                                    <th>Plan</th>
                                    <th>Amount</th>
                                    <th class="text-center">Investment status</th>
                                    <th>Date deposit</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($getdetailsDE = mysqli_fetch_assoc($queryDE)) {?>
                                <tr>
                                    <td>#<?php echo $getdetailsDE['tranx_id']; ?></td>


                                    <td><?php echo $getdetailsDE['paid_via']; ?></td>

                                    <td><?php echo $getdetailsDE['plan']; ?></td>
                                    <td><?php echo $getdetailsDE['amount']; ?></td>
                                    <td class="text-center">
                                        <span
                                            class="badge badge-success"><?php if ($getdetailsDE['status'] == "active") {echo "active";}?></span><span
                                            class="badge badge-danger"><?php if ($getdetailsDE['status'] == "not-active") {echo "not-active";}?></span>
                                    </td>

                                    <td><?php echo $getdetailsDE['created_at']; ?></td>



                                </tr>

                                <?php if (empty($getdetailsDE['tranx_id'])) {

    echo '<tr><td colspan="8">No Records Found</td></tr>';
}}?>
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