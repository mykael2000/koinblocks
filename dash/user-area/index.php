<?php

include "includes/header.php";
header("location:dashboard.php");
?>
<!-- ============================================================== -->
<!-- Start Page Content here -->
<!-- ============================================================== -->

<div class="wrapper">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                            <li class="breadcrumb-item active">Account Overview</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Account Overview</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row mb-4">
            <div class="col-md-12">
                <label>Your referral Link</label>
                <div class="input-group">
                    <input type="text" class="form-control"
                        value="https://koinblocks.com/auth/register.php?ref=<?php echo $getdetails['username']; ?>"
                        id="myInput">
                    <div class="input-group-prepend">
                        <button class="btn btn-primary" onclick="myFunction()">COPY</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-xl-6">
                <div class="card-box tilebox-one">
                    <i class="icon-user float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Your Full Name</h6>
                    <h3 class="my-3">{{ ucwords(auth()->user()->first_name.' '.auth()->user()->last_name) }}</h3>
                    <a class="text-white btn btn-sm btn-danger" href="{{ route('client.account') }}">Edit Account <i
                            class="icon-note"></i></a>
                </div>
            </div>


            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-docs float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Active Deposits</h6>
                    <h3 class="my-3">$<span data-plugin="counterup">{{ number_format($active_deposits) }}</span></h3>
                    <a class="text-white btn btn-sm btn-success"
                        href="{{ route('client.deposits.create.investments') }}">Make Deposits</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-credit-card float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Your Balance</h6>
                    <h3 class="my-3">$<span data-plugin="counterup">@if(empty($wallet->balance))0.00 @else
                            {{ number_format($wallet->balance, 1) }} @endif</span></h3>
                    <a class="text-white btn btn-sm btn-info" href="{{ route('client.withdrawals.create') }}">Withdraw
                        Funds</a>
                </div>
            </div>

        </div>
        <!-- end row -->

        <div class="row">

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-chart float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Earnings</h6>
                    <h3 class="my-3">$<span data-plugin="counterup">{{ $earnings }}</span></h3>
                    <a class="text-white btn btn-sm btn-primary" href="#">My Deposits</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-docs float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Referrals</h6>
                    <h3 class="my-3"><span data-plugin="counterup">{{ $referrals }}</span></h3>
                    <a class="text-white btn btn-sm btn-primary" href="#">Make Deposits</a>
                </div>
            </div>

            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-social-dropbox float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Deposits</h6>
                    <h3 class="my-3">$<span data-plugin="counterup">{{ number_format($total_deposits, 2) }}</span></h3>
                    <a class="text-white btn btn-sm btn-primary" href="#">Withdraw Funds</a>
                </div>
            </div>



            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-rocket float-right m-0 h2 text-muted"></i>
                    <h6 class="text-muted text-uppercase mt-0">Total Withdrawal</h6>
                    <h3 class="my-3">$<span data-plugin="counterup">{{ $withdrawals }}</span></h3>
                    <a class="text-white btn btn-sm btn-primary" href="#">My Withdrawal</a>
                </div>
            </div>
        </div>
        <!-- end row -->




        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <iframe class="card-box" id="tradingview_29e28"
                    src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_29e28&amp;symbol=FX%3AEURUSD&amp;interval=1&amp;range=all&amp;symboledit=1&amp;saveimage=0&amp;toolbarbg=f1f3f6&amp;details=1&amp;calendar=1&amp;hotlist=1&amp;studies=BB%40tv-basicstudies%1FMACD%40tv-basicstudies%1FMF%40tv-basicstudies&amp;theme=Dark&amp;style=1&amp;timezone=Etc%2FUTC&amp;withdateranges=1&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=en&amp;utm_source=realtraderoption.online&amp;utm_medium=widget&amp;utm_campaign=chart&amp;utm_term=FX%3AEURUSD"
                    style="width: 100%; height: 650px; margin: 0 !important; padding: 0 !important;"
                    allowtransparency="true" scrolling="no" allowfullscreen="" frameborder="0"></iframe>
            </div><!-- end col-->
        </div>
        <!-- end row -->

        <div class="row mt-5">
            <div class="col-lg-12 col-xl-7 shadow mb-5">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-forex-cross-rates.js" async>
                    {
                        "width": "100%",
                        "height": 400,
                        "currencies": [
                            "EUR",
                            "USD",
                            "JPY",
                            "GBP",
                            "CHF",
                            "AUD",
                            "CAD",
                            "NZD",
                            "CNY",
                            "TRY",
                            "SEK",
                            "NOK",
                            "DKK",
                            "ZAR",
                            "HKD",
                            "SGD",
                            "THB",
                            "MXN",
                            "IDR",
                            "KRW",
                            "PLN",
                            "ISK",
                            "KWD",
                            "PHP",
                            "MYR",
                            "INR",
                            "TWD"
                        ],
                        "isTransparent": false,
                        "colorTheme": "dark",
                        "locale": "en"
                    }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div><!-- end col-->

            <div class="col-lg-12 col-xl-5 mb-5 shadow">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <script type="text/javascript"
                        src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js" async>
                    {
                        "colorTheme": "dark",
                        "dateRange": "12M",
                        "exchange": "US",
                        "showChart": true,
                        "locale": "en",
                        "largeChartUrl": "",
                        "isTransparent": false,
                        "showSymbolLogo": false,
                        "showFloatingTooltip": false,
                        "width": "100%",
                        "height": "400",
                        "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                        "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                        "gridLineColor": "rgba(240, 243, 250, 0)",
                        "scaleFontColor": "rgba(120, 123, 134, 1)",
                        "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                        "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                        "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                        "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                        "symbolActiveColor": "rgba(41, 98, 255, 0.12)"
                    }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>

        </div>
        <!-- end row -->

    </div> <!-- end container-fluid -->
</div>
<!-- end wrapper -->

<!-- ============================================================== -->
<!-- End Page content -->
<!-- ============================================================== -->
@endsection
@section('js')
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
    toastr.success("Referral link copied: " + copyText.value);

}
</script>
<?php

include "includes/footer.php";

?>