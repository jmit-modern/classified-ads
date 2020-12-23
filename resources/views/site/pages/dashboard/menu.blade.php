<div class="ad-profile section">	
    <div class="user-profile">
        <div class="user-images">
            <img src="https://demo.themeregion.com/trade/images/user.jpg" alt="User Images" class="img-responsive">
        </div>
        <div class="user">
            <h2>@lang('Hello'), <a href="#">{{ Auth::user()->name }}</a></h2>
            <h5>@lang('You joined at'): {{ formatDateLocalized(Auth::user()->created_at) }}</h5>
        </div>

        <div class="favorites-user">            
            <div class="favorites">
                <a href="#"><?php
                echo number(\App\Models\Post::where('user_id',Auth::user()->id)
                        ->count());
                ?><small>@lang('Ads')</small></a>
            </div>
        </div>								
    </div><!-- user-profile -->

    <ul class="user-menu">        
        <li class="{{ Request::is('*/dashboard') || Request::is('*/edit-ad/*') ? 'active' : '' }}"><a href="{{url('/dashboard')}}">@lang('My Ads')</a></li>        
        <li class="{{ Request::is('*/favourites') ? 'active' : '' }}"><a href="{{url('/favourites')}}">@lang('Favourites')</a></li>
        <li class="{{ Request::is('*/messages') ? 'active' : '' }}"><a href="{{url('/messages')}}">@lang('Messages')<?php
        $notif = Auth::user()->countNotification();
        if($notif != 0){
            echo "<span class='badge badge-light'>".number($notif)."</span>";
        }        
        ?></a></li>        
        <!-- <li class="{{ Request::is('*/balance') ? 'active' : '' }}"><a href="{{url('/balance')}}">@lang('Balance') ({{ number(Auth::user()->user_balance) }})</a></li> -->
        <li class="{{ Request::is('*/account') ? 'active' : '' }}"><a href="{{url('/account')}}">@lang('Account Settings')</a></li>        
<!--        <li><a href="pending-ads.html">@lang('Pending Approval')</a></li>        -->
    </ul>

</div><!-- ad-profile -->