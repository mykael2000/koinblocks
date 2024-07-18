<?php

include("includes/header.php");
header("location: manual-method.php");
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
                    <h4 class="page-title">Deposit</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

          <div class="row mb-3">

            <div class="col-xl-8 col-lg-7 mb-4">
              <div class="card">
                <div class="card-body">
                  <form method="post" action="{{ route('client.deposits.store') }}">
                  @csrf
                    <div class="form-group">
                      <label>Enter amount</label>
                      <input type="text" name="amount" placeholder="Enter amount" class="form-control">
                      @error('amount')
                        <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label>Select Payment Method</label>
                        <div class="row">
                            @for($i=0; $i < count($payment_methods); $i++)
                            <div class="col-2">
                                @php 
                                    $payment = json_decode($payment_methods[$i]->data);
                                    $payment_method_name = empty($payment->method_name) ? 'Bank Transfer': $payment->method_name;
                                @endphp
                                <label class="payment_method_btn" for="payment_method-{{ $i }}" style="cursor:pointer;width:100%;display:block;" title="{{ ucwords($payment_method_name) }}">
                                    
                                    <img src="{{ asset(str_replace('public', 'storage', $payment_methods[$i]->logo) )}}" class="img-thumbnail w-100" style="height:50px;object-fit:cover;" alt="{{ ucwords($payment_method_name) }}">
                                    <p style="font-size:10px;text-align:center;">{{ ucwords($payment_method_name) }}</p>
                                </label>
                                <input type="radio" name="payment_method" id="payment_method-{{ $i }}" class="d-none" value="{{ $payment_methods[$i]->id }}">
                                
                            </div>
                            @endfor
                        </div>
                        @error('payment_method')
                        <span class="text-danger" style="font-size:12px">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mt-5">
                        <input type="hidden" name="plan_id" value="{{ $plan_id }}">
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>


            <div class="col-xl-4 col-lg-5 mb-4">
              <div class="card">
                  <div class="card-body">
                      <div class="row align-items-center">
                      <div class="col mr-2">
                          <div class="text-xs font-weight-bold text-uppercase mb-1">Total Deposits</div>
                          <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $company->currency.$totalDeposit }}</div>
                          <div class="mt-2 mb-0 text-muted text-xs">
                          <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                          <span>Since last time</span>
                          </div>
                      </div>
                      <div class="col-auto">
                          <i class="fas fa-wallet fa-2x text-primary"></i>
                      </div>
                      </div>
                  </div>
              </div>
            </div>


          </div>
          
        </div>
</div>
@endsection
@section('js')

<script>
    let payment_method_btn = document.querySelectorAll('.payment_method_btn');

    payment_method_btn.forEach( (btn) => {

        btn.addEventListener('click', ()=>{

            document.querySelectorAll('.active').forEach( (activeBtn) => {

                activeBtn.classList.remove('active')
                activeBtn.style.outline = 'none'

            } )

            if(btn.classList.contains('active') == false) {
                btn.classList.add('active')
                btn.style.outline = '1px solid #6777ef'
            }

        })

    } )
</script>

<?php

include("includes/footer.php");

?>