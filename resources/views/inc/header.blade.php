 <!-- fixed-top-->
 <nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-static-top navbar-dark bg-blue-grey bg-lighten-1 navbar-border navbar-brand-center">
    <div class="navbar-wrapper">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item"><a class="navbar-brand" href="html/ltr/horizontal-top-icon-menu-template/index.html">
              <h3 class="brand-text">Tickits</h3></a></li>
          <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i class="fa fa-ellipsis-v"></i></a></li>
        </ul>
      </div>
      <div class="navbar-container content">
        <div class="collapse navbar-collapse" id="navbar-mobile">
          <ul class="nav navbar-nav mr-auto float-left">
            {{-- <li class="nav-item d-none d-md-block"><a class="nav-link nav-link-expand" href="#"><i class="ficon ft-maximize"></i></a></li>
            <li class="nav-item nav-search"><a class="nav-link nav-link-search" href="#"><i class="ficon ft-search"></i></a>
              <div class="search-input">
                <input class="input" type="text" placeholder="Explore Robust...">
              </div>
            </li> --}}
          </ul>
          <ul class="nav navbar-nav float-right">


                <li class=" nav-item">
                    @if(auth::user()->lang == 'ar')
                    <a class="nav-link"  href="{{asset('/change-lang')}}" >
                        <i class="flag-icon flag-icon-gb"></i>
                        <span>{{__('en')}}</span>
                        <span class="selected-language"></span>
                    </a>
                    @else
                    <a class="nav-link"  href="{{asset('/change-lang')}}">
                        <i class="flag-icon flag-icon-eg"></i>
                        <span>{{__('ar')}}</span>
                        <span class="selected-language"></span>
                    </a>
                    @endif
                </li>

            <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown"><span class="avatar avatar-online"></span><span class="user-name">{{Auth::user()->name}}</span></a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-divider"></div><a class="dropdown-item" href="{{asset('/logout')}}"><i class="ft-power"></i> {{__('Logout')}}</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div id="lang" data-lang="{{Auth::user()->lang}}"></div>
  </nav>

  <!-- ////////////////////////////////////////////////////////////////////////////-->


  <!-- Horizontal navigation-->
  <div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-bordered navbar-shadow" role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
      <!-- include includes/mixins-->
         <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="nav-item">
          <a class="nav-link" href="{{asset('home')}}">
              <i class="icon-home"></i>{{__('Dashboard')}}
          </a>
        </li>
         @if(Permission::check('view','users') == True)
        <li class="nav-item">
        <a class="nav-link" href="{{asset('stuffs')}}">
              <i class="icon-user"></i>{{__('Admin')}}
          </a>
        </li>
        @endif
         @if(Permission::check('view','tickets') == True)
        <li class="nav-item">
         <a class="nav-link" href="{{asset('tickets')}}">
              <i class="icon-pin"></i>{{__('Tickets')}}
          </a>
        </li>
         @endif
       
      </ul>

    </div>
    <!-- /horizontal menu content-->
  </div>
  <!-- Horizontal navigation-->
