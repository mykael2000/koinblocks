<?php

include("includes/header.php");
$username = $getdetails['username'];
$client_id = $getdetails['id'];
$tranx_id = rand(0000,9999);
$plan = "";
$paid_via = "";
$amount = "";
$status = "pending";


$Desql = "INSERT into deposits (client_id, username, tranx_id, plan, paid_via, amount, status) VALUES ('$client_id','$username','$tranx_id','$plan','$paid_via','$amount','$status')";
$Dequery = mysqli_query($con,$Desql);

echo "<script>alert('Please always reconfirm the deposit wallet address on your account before every deposit. To do this, kindly contact the support team via the live chat')</script>";
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
                            <li class="breadcrumb-item active">Deposits</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Payment Verification</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row mb-3">

            <!-- Invoice Example -->
            <div class="col-xl-7 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-section d-flex">
                            <div class="profile-img w-25">
                                <img src="payment_logo/Bitcoin.svg.png" id="avatar_preview" class="w-100 img-thumbnail">
                            </div>
                            <div class="personal-details w-50 pl-3">
                                <h3 class="d-full_name">BTC Payment</h3>
                            </div>
                        </div>



                        <div class="payment-instructions mt-5">
                            <h4 class="text-white border-bottom pb-2">Payment Instructions</h4>

                            <p><strong>DEPOSIT WALLET QR CODE & ID:</strong></p>

                            <div class="row wallet-address">
                                <div class="col-md-8">
                                    <p>Note that you must confirm address from support.</p>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="bc1qe8xpd9h8mup9r8texrwezw7yr7jdwqxkvfvpgx" id="myInput">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-primary" onclick="myFunction()">COPY</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img style="position: relative; bottom: 310px; right:50px;" height="270px"
                                        width="270px;" src="address/payxbtc.jpeg">
                                </div>
                            </div>
                        </div>





                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <!-- Invoice Example -->
            <div class="col-xl-7 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-section d-flex">
                            <div class="profile-img w-25">
                                <img src="payment_logo/ethereum-logo-portrait-black-gray.png" id="avatar_preview"
                                    class="w-100 img-thumbnail">
                            </div>
                            <div class="personal-details w-50 pl-3">
                                <h3 class="d-full_name">ETH Payment</h3>
                            </div>
                        </div>


                        <div class="payment-instructions mt-5">
                            <h4 class="text-white border-bottom pb-2">Payment Instructions</h4>

                            <p><strong>DEPOSIT WALLET QR CODE & ID:</strong></p>

                            <div class="row wallet-address">
                                <div class="col-md-8">
                                    <p>Note that you must confirm address from support.</p>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="0x8FaCc2Ed16db406201A2Ca803F89767f848C573d" id="myInputeth">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-primary" onclick="myFunctioneth()">COPY</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img style="position: relative; bottom: 250px; right:50px;" height="230px"
                                        width="230px;" src="address/payxeth.jpeg">
                                </div>
                            </div>
                        </div>





                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-section d-flex">
                            <div class="profile-img w-25">
                                <img src="payment_logo/ethereum-logo-portrait-black-gray.png" id="avatar_preview"
                                    class="w-100 img-thumbnail">
                            </div>
                            <div class="personal-details w-50 pl-3">
                                <h3 class="d-full_name">USDT Payment</h3>
                            </div>
                        </div>


                        <div class="payment-instructions mt-5">
                            <h4 class="text-white border-bottom pb-2">Payment Instructions</h4>

                            <p><strong>DEPOSIT WALLET QR CODE & ID:</strong></p>

                            <div class="row wallet-address">
                                <div class="col-md-8">
                                    <p>Note that you must confirm address from support.</p>
                                    <div class="input-group">
                                        <input type="text" class="form-control"
                                            value="0x8FaCc2Ed16db406201A2Ca803F89767f848C573d" id="myInputUsdt">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-primary" onclick="myFunctionUsdt()">COPY</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img style="position: relative; bottom: 250px; right:50px;" height="230px"
                                        width="230px;" src="address/payxusdt.jpeg">
                                </div>
                            </div>
                        </div>





                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Total Deposits</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    $<?php echo $getdetails['total_deposits']; ?></div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span>Since last time</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-wallet fa-2x text-primary"></i>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12 ds-card">

                                <form method="post" enctype="multipart/form-data" id="uploadForm">
                                    <div class="form-group">
                                        <label for="receipt">Upload Bitcoin/Ethereum Receipt for payment
                                            verification</label>
                                        <input type="file" name="receipt" id="receipt" class="form-control el">
                                        <span class="receipt" style="color:red;font-size:12px;"></span>
                                    </div>
                                    <div class="form-group text-right">
                                        <input type="hidden" name="deposit_id" value="{{ $deposit->id }}">
                                        <button type="submit" class="btn btn-primary btn-sm"
                                            id="uploadBtn">Upload</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
<script>
function myFunction() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    toastr.success("Wallet address Copied: " + copyText.value);

}

function myFunctioneth() {
    /* Get the text field */
    var copyText = document.getElementById("myInputeth");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    toastr.success("Wallet address Copied: " + copyText.value);

}

function myFunctionUsdt() {
    /* Get the text field */
    var copyText = document.getElementById("myInputUsdt");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    toastr.success("Wallet address Copied: " + copyText.value);

}
var qrcode = new QRCode(document.getElementById("qrcode-2"), {
    text: document.getElementById("myInput").value,
    width: 150,
    height: 130,
    colorDark: "#000",
    colorLight: "#fff",
    correctLevel: QRCode.CorrectLevel.H
});
</script>
<script>
$("#uploadForm").submit((e) => {
    e.preventDefault()

    let form = document.querySelector('#uploadForm')

    let formData = new FormData(form)

    $.ajax({

        url: "/deposits/verify/manual",
        method: "POST",
        data: formData,
        processData: false,
        contentType: false,
        beforeSend: () => {
            $("#uploadBtn").html('Uploading...')
        },
        success: (response) => {

            handleError(response)

            $("#uploadBtn").html('Upload')

            if (response.success == true) {

                toastr.success('Your receipt has been uploaded successfully!');

                $("#uploadForm").hide()
                $(".ds-card").html('<div id="verification_status">' +
                    '<div class="text-xs font-weight-bold text-uppercase mb-1">Payment status</div>' +
                    '<p>Currently <span class="text-warning">processing verification</span></p>' +
                    '</div>')

            }

        },
        error: (error) => {
            console.log(error)
        }

    })

})
</script>
<?php

include("includes/footer.php");

?>