 <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
				@if (Auth::guest())
					 <li><a href="{{ url('/login') }}">Login</a></li>
                        <!--<li><a href="{{ url('/register') }}">Register</a></li> -->
                       @else
                           <img src="{{asset('uploads/avatar/default.jpg')}}" class="thumb-md img-circle">
                             
              
                    
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ URL::to('/profile') }}"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                                    
                                    <li><a href="{{ url('/logout') }}"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            @foreach(Auth::user()->roles as $v)
                            <p class="text-muted m-0">

                                {{ $v->display_name }}
                        
                            </p>
                             @endforeach
                        </div>
                       
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">

                        <ul>
                        @if (auth()->check())    
    @if (auth()->user()->hasRole('SuperAdmin'))

                            <li>
                                <a href="{{ url('/home') }}" class="waves-effect active">
                                <i class="md md-home">
                                    
                                </i>
                                <span> Dashboard </span>
                                </a>
                            </li>

                         

                            <li>
                                <a href="{{ route('categories.index') }}" class="waves-effect"><i class="md md-palette"></i> <span> Categories </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                            </li>
                

                             <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-redeem"></i> <span> Food </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('item.index') }}">Food Item</a></li>
                                    <li><a href="{{ url('menu') }}">Food Menu</a></li>
                                    
                                </ul>
                            </li>


                              <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Restaurant </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="{{ url('/restaurant') }}"> All Restaurant</a></li>
                                    <li><a href="{{ url('address') }}">Address</a></li>
                                    
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="#" class="waves-effect"><i class="md md-poll"></i><span> Users Management </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                <ul class="list-unstyled">
                                    <li>
                                    <a href="{{ route('roles.index') }}">Role Management </a>
                                    </li>
                                    <li>
                                    <a href="{{ route('users.index') }}">Users</a>
                                    </li> 
                                </ul>
                            </li>

        @elseif (auth()->user()->hasRole('ShopAdmin'))                    
<!-- shop menu start -->
                            <li>
                                <a href="{{ route('categories.index') }}" class="waves-effect"><i class="md md-place"></i><span> Categories </span><span class="pull-right"><i class="md md-add"></i></span></a>
                                
                            </li>

                            <li>
                                <a href="{{ route('item.index') }}" class="waves-effect"><i class="md md-pages"></i><span> Food Items </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            </li>

                   @endif    
@else  
                            <li>
                                <a href="{{ route('/login') }}" class="waves-effect"><i class="md md-pages"></i><span> login </span><span class="pull-right"><i class="md md-add"></i></span></a>
                            </li>
                            @endif
       
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
 @endif