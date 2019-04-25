<ul class="sidebar-menu" data-widget="tree">
   <li>
      <a href='{{url('admin')}}'>
      <img src="{{ asset('public/icons/dashboard1.png') }}" class="icon" alt="dashboard">
      <span>Dashboard</span>
      </a>
   </li>
   <li class="treeview" id="menu_1">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
      <img src="{{ asset('public/icons/users.png') }}" class="icon">
      <span>Members</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i></span>
      </a>
      <ul class="treeview-menu">
         <li><a href='{{ route('members.index') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_1">Active Members</span></a></li>
         <li><a href='{{ route('members.inactive') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_1">Inactive Members</span></a></li>
      </ul>
   </li>
    <li>
      <a href='{{ route('register.requestList') }}'>
      <img src="{{ asset('public/icons/programming.png') }}" class="icon" alt="dashboard">
      <span>Request List</span>
      </a>
   </li>   
   <li>
      <a href='{{ route('register.indexReg') }}'>
      <img src="{{ asset('public/icons/promotion.png') }}" class="icon" alt="dashboard">
      <span>Discounts</span>
      </a>
   </li>    
   <li>
      <a href='{{ route('ebooks.index') }}'>
      <img src="{{ asset('public/icons/ebook.png') }}" class="icon" alt="dashboard">
      <span>Ebooks</span>
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
         <li><a href='{{ route('admin.transaction') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Transaction History</span></a></li>
         <li><a href='{{ route('admin.fundHistory') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Funds History</span></a></li>
         <li><a href='{{ route('admin.withdrawalHistory') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Withdrawal History</span></a></li>
         <li><a href='{{ route('admin.fundsTransfer') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Transfer History</span></a></li>
         <li><a href='{{ route('admin.earningHistory') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_3">Commission History</span></a></li>
      </ul>
   </li>
    <li class="treeview" id="menu_4">
      <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
      <img src="{{ asset('public/icons/withdrawal.png') }}" class="icon" alt="dashboard">
      <span>Withdrawal</span>
      <span class="pull-right-container">
      <i class="fa fa-angle-left pull-right"></i></span>
      </a>
      <ul class="treeview-menu">
         <li><a href='{{ route('withdrawals.active') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_4">Active Withdrawal</span></a></li>
         <li><a href='{{ route('withdrawals.inactive') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_4">Inactive Withdrawal</span></a></li>
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
         <li><a href='{{ route('commission.index') }}'><i class="fa fa-circle-o"></i> <span parent-id="menu_2">Commission Setting</span></a></li>
         <li><a href='#'><i class="fa fa-circle-o"></i> <span parent-id="menu_2">Website Settings</span></a></li>
      </ul>
   </li>
    <li>
      <a href='{{ route('admin.profile') }}'>
      <img src="{{ asset('public/icons/profile.png') }}" class="icon" alt="dashboard">
      <span>Profile</span>
      </a>
   </li>   
   <li>
      <a href='{{ route('admin.passwordChange') }}'>
      <img src="{{ asset('public/icons/permission.png') }}" class="icon" alt="dashboard">
      <span>Password Change</span>
      </a>
   </li>
    <li>
      <a href='{{ route('login.logout') }}'>
      <img src="{{ asset('public/icons/signout.svg') }}">
      <span>Logout</span>
      </a>
   </li>
</ul>