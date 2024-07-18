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
                            <li class="breadcrumb-item active">Referrals</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Referrals</h4>
                </div>
            </div>
        </div>
        <!-- end page title --> 

        <!-- Row -->
        <div class="row">
          <!-- Datatables -->
          <div class="col-lg-12">
            <div class="card mb-4">
              <div class="table-responsive p-3">

              <table class="table align-items-center table-flush" id="dataTable">
                    <thead class="thead-light">
                        <tr>
                            <th>S/n</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th class="text-center">Date registered</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    @php
                     $i=0;
                    @endphp
                    @forelse($referrals as $referral)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $referral->first_name }}</td>
                            <td>{{ $referral->last_name }}</td>
                            <td>{{ $referral->email }}</td>
                            <td class="text-center">{{ date('Y/m/d', strtotime($referral->created_at)) }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center">No records found</td></tr>
                    @endforelse
                    </tbody>
                </table>
                                
              </div>
            </div>
          </div>
          
        </div>
        <!--Row-->

</div>
<!---Container Fluid-->
</div>
<?php

include("includes/footer.php");

?>