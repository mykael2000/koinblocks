<?php

include("includes/header.php");

?>

        <!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Earnings</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="./home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Earnings</li>
        </ol>
        </div>

        <div class="row mb-3">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Principal Repayment</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $company->currency.$principal_return }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-credit-card fa-2x text-primary"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Interest Earnings</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $company->currency.$interest_earning }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-credit-card fa-2x text-primary"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-uppercase mb-1">Referral Earnings</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $company->currency.'0.0' }}</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-dollar-sign fa-2x text-primary"></i>
                </div>
                </div>
            </div>
            </div>
        </div>
        
    </div>
    <!--Row-->

    <div class="row mb-3">
        <!-- Invoice Example -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Earning History</h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>Tranx ID</th>
                            <th>Amount</th>
                            <th>Earning type</th>
                            <th>Date earned</th>
                        </tr>
                    </thead>
                    <tbody>

                    @forelse($earnings as $earning)
                        <tr>
                            <td>{{ $earning->tranx_id }}</td>
                            <td>
                                {{ $company->currency.$earning->amount }}
                            </td>
                            <td>
                                {{ $earning->type }}
                            </td>
                            <td>
                                {{ date('d-m-Y H:i a', strtotime($earning->updated_at)) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">No Records Found</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card card-body" style="height:450px;">
                <!-- TradingView Widget BEGIN -->
                <div class="tradingview-widget-container">
                    <div class="tradingview-widget-container__widget"></div>
                    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSD/technicals/" rel="noopener" target="_blank"><span class="blue-text">Technical Analysis for BTCUSD</span></a> by TradingView</div>
                    <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-technical-analysis.js" async>
                    {
                    "interval": "1m",
                    "width": "100%",
                    "isTransparent": false,
                    "height": "100%",
                    "symbol": "BITFINEX:BTCUSD",
                    "showIntervalTabs": true,
                    "locale": "en",
                    "colorTheme": "light"
                }
                    </script>
                </div>
                <!-- TradingView Widget END -->
            </div>
        </div>
    </div>

</div>
<!---Container Fluid-->

<?php

include("includes/footer.php");

?>