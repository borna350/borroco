<nav class="navigation">
    
    <ul class="ml-menu">
        <li class="{{ Request::is('user/account') ? 'active':'' }}"> <a href="{{route('user.accounts.dashboard')}}">Dashboard</a></li>
        <li class="{{ Request::is('user/order') ? 'active':'' }}"><a href="{{route('user.accounts.order')}}">Orders</a></li>
        <li class="{{ Request::is('user/address') ? 'active':'' }}"><a href="{{route('user.accounts.address')}}">Addresses</a></li>
        <li class="{{ Request::is('user/accounts-detail') ? 'active':'' }}"><a href="{{route('user.accounts.details')}}">Account details</a></li>
    </ul>
    
    
</nav>