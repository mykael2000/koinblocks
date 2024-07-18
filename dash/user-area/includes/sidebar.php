<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('client.home') }}">
        <div class="sidebar-brand-icon">
          <img src="{{ asset('storage/'.str_replace('public/', '', $company->logo))}}">
        </div>
        <div class="sidebar-brand-text mx-3">&nbsp;</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('client.home') }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Investment Management
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-fw fa-wallet"></i>
          <span>Deposits Management</span>
        </a>
        <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Deposits</h6>
            <a class="collapse-item" href="{{ route('client.deposits.create.investments') }}">Deposit Funds</a>
            <a class="collapse-item" href="{{ route('client.deposits') }}">View Deposits</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInv"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-fw fa-dollar-sign"></i>
          <span>Funds Withdrawal</span>
        </a>
        <div id="collapseInv" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Withdrawal</h6>
            <a class="collapse-item" href="{{ route('client.withdrawals.create') }}">Withdraw Funds</a>
            <a class="collapse-item" href="{{ route('client.withdrawals.index') }}">View History</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('client.earnings') }}">
          <i class="fa fa-fw fa-credit-card"></i>
          <span>Earnings</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{ route('client.referrals') }}">
          <i class="fa fa-fw fa-users"></i>
          <span>My Referrals</span>
        </a>
      </li>

      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Account Management
      </div>

      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('client.account') }}">
          <i class="fa fa-fw fa-user"></i>
          <span>Account Settings</span>
        </a>
      </li>

      <li class="nav-item">
        <form method="POST" action="{{ route('client.logout') }}">
          @csrf
          <a class="nav-link collapsed" href="{{route('client.logout')}}"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
            <i class="fa fa-fw fa-sign-out-alt"></i>
            Logout
          </a>
        </form>
      </li>

      
      
</ul>