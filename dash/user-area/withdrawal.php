<?php

include("includes/header.php");

?>
<div class="wrapper">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Withdrawals</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Withdrawals</h4>
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
                        <th>Payment Method</th>
                        <th>Wallet Address</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Request date</th>
                    </tr>
                </thead>
                <tbody>

                            <?php  while($getdetailsWi = mysqli_fetch_assoc($queryWi)){ ?>
                    <tr>
                        <td>#<?php echo $getdetailsWi['tranx_id']; ?></td>

                      
                        <td><?php echo $getdetailsWi['payvia']; ?></td>

                        <td><?php echo $getdetailsWi['address']; ?></td>
                        <td><?php echo $getdetailsWi['amount']; ?></td>
                        <td class="text-center">
                            <span class="badge badge-success"><?php if($getdetailsWi['status'] == "completed"){echo "Completed";} ?></span><span class="badge badge-danger"><?php if($getdetailsWi['status'] == "pending"){echo "Pending";}elseif($getdetailsWi['status'] == "failed"){echo "Failed";} ?></span> 
                        </td>

                        <td><?php echo $getdetailsWi['created_at']; ?></td>
                    </tr>
                  
                    <?php if(empty($getdetailsWi['tranx_id'])){
                        
                        echo '<tr><td colspan="8">No Records Found</td></tr>';
                         } } ?>
                </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
            </div>
        </div>

        </div>

    </div>
</div>
<?php

include("includes/footer.php");

?>