<ul class="sidebar-menu" data-widget="tree">
   <li>
      <a href='{{ url('dashboard') }}'>
      <img src="{{ asset('public/icons/dashboard1.png') }}" class="icon" alt="dashboard">
      <span>Dashboard</span>
      </a>
   </li>
   <li>
      <a href='{{ route('genealogy.tree') }}'>
      <img src="{{ asset('public/icons/tree.png') }}" class="icon" alt="dashboard">
      <span>Genealogy</span>
      </a>
   </li> 
  {{--   <li>
      <a href='{{ route('additionalMatrix.index') }}'>
      <img src="{{ asset('public/icons/tree.png') }}" class="icon" alt="dashboard">
      <span>Additional Matrix</span>
      </a>
   </li>  --}}
   <li>
      <a href='{{ route('position.create') }}'>
      <img src="{{ asset('public/icons/buy.png') }}" class="icon" alt="dashboard">
      <span>Buying Position</span>
      </a>
   </li>
   <li>
      <a href='{{ route('addFunds.create') }}'>
      <img src="{{ asset('public/icons/add_funds.png') }}" class="icon" alt="dashboard">
      <span>Add Funds</span>
      </a>
   </li>  
   <li>
      <a href='{{ route('fundsTransfer.create') }}'>
      <img src="{{ asset('public/icons/transfer.png') }}" class="icon" alt="dashboard">
      <span>Funds Transfer</span>
      </a>
   </li> 
   <li>
      <a href='{{ route('user.discount') }}'>
      <img src="{{ asset('public/icons/promotion.png') }}" class="icon" alt="dashboard">
      <span>Purchase</span>
      </a>
   </li>
   <li>
      <a href='{{ route('ebook') }}'>
      <img src="{{ asset('public/icons/ebook.png') }}" class="icon" alt="dashboard">
      <span>Ebooks</span>
      </a>
   </li>
     <li>
      <a href="{{ route('withdrawals.create') }}">
      <img src="{{ asset('public/icons/withdrawal.png') }}" class="icon" alt="dashboard">
      <span>Withdrawal</span>
      </a>
   </li>
    <li class="treeview" id="menu_3">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
      <img src="{{ asset('public/icons/business.png') }}" class="icon" alt="dashboard">
      <span>History</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i></span>
      </a>
      <ul class="treeview-menu">
         <li><a href='{{ route('user.transaction') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Transaction History</span></a></li>
         <li><a href='{{ route('user.fundsHistory') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Funds History</span></a></li>
         <li><a href='{{ route('withdrawals.index') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Withdrawal History</span></a></li>
         <li><a href='{{ route('fundsTransfer.index') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Funds Transfer History</span></a></li>
          <li><a href='{{ route('earning.index') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Earning commission History</span></a></li>  
          <li><a href='{{ route('dashboard.coinpayment') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Coinpayment History </span></a></li>
      </ul>
   </li>
  
   <li class="treeview" id="menu_2">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
      <img src="{{ asset('public/icons/setting.png') }}" class="icon" alt="dashboard">
      <span>Settings</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i></span>
      </a>
      <ul class="treeview-menu">
        
         <li><a href='{{ route('user.profile') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_2">Profile Settings</span></a></li>
         <li><a href='{{ route('user.password') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_2">Password Change</span></a></li>
      </ul>
   </li>

      <li class="treeview" id="menu_11">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
      <img src="{{ asset('public/icons/mail.png') }}" class="icon" alt="dashboard">
      <span>Supports</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i></span>
      </a>
      <ul class="treeview-menu">
        
         <li><a href='{{ route('support.compose') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_11">Compose</span></a></li>
         <li><a href='{{ route('support.inbox') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_11">Inbox</span></a></li>
      </ul>
   </li>
  
    <li>
      <a href='{{ route('login.logout') }}'>
      <img src="{{ asset('public/icons/signout.svg') }}">
      <span>Logout</span>
      </a>
   </li>  
    <li>
      <a target="_blank" href='{{ url('/') }}/affiliate/{{ Auth::user()->user_name }}'>
      <img src="{{ asset('public/icons/affiliate.png') }}">
      <span>Affiliate Links</span>
      </a>
   </li>  

   <li>
      <a  href='{{ route('donation.create') }}'>
    
      <span class="btn btn-success"  style="font-weight: bold;font-size: 20px;width: 100%;margin-left: -10px;">$ Donation</span>
      </a>
   </li>
</ul>