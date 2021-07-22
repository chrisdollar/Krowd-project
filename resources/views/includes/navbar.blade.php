<?php $userAuth = Auth::user(); ?>
<div class="navbar navbar-inverse navbar-px padding-top-10 padding-bottom-10">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

        <?php if( isset( $totalNotify ) ) : ?>
          <span class="notify"><?php echo $totalNotify; ?></span>
        <?php endif; ?>

        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{ asset('img/logo.png') }}" class="logo" />
      </a>
    </div><!-- navbar-header --> 

    <div class="navbar-collapse collapse">

      <ul class="nav navbar-nav navbar-right">

        <li @if(Request::is('/')) class="active-navbar" @endif>
          <a class="text-uppercase font-default" href="{{ url('/') }}">{{ trans('misc.campaigns') }}</a>
        </li>

        @foreach( \App\Models\Pages::where('show_navbar', '1')->get() as $_page )
        <li @if(Request::is("page/$_page->slug")) class="active-navbar" @endif>
          <a class="text-uppercase font-default" href="{{ url('page',$_page->slug) }}">{{ $_page->title }}</a>
        </li>
        @endforeach

        @if( Auth::check() )

        <li class="dropdown">
          <a href="javascript:void(0);" data-toggle="dropdown" class="userAvatar myprofile dropdown-toggle">
            <img src="{{ asset('avatar').'/'.$userAuth->avatar }}" alt="User" class="img-circle avatarUser" width="21" height="21" />
            <span class="title-dropdown font-default">{{ trans('users.my_profile') }}</span> 
            <i class="ion-chevron-down margin-lft5"></i>
          </a>

          <!-- DROPDOWN MENU -->
          <ul class="dropdown-menu arrow-up nav-session" role="menu" aria-labelledby="dropdownMenu4">
            @if( $userAuth->role == 'admin' )		 	
            <li>
              <a href="{{ url('panel/admin') }}" class="text-overflow">
                <i class="icon-cogs myicon-right"></i> {{ trans('admin.admin') }}</a>
              </li>
              @endif

              <li>
                <a href="{{ url('account/campaigns') }}" class="text-overflow">
                  <i class="ion ion-speakerphone myicon-right"></i> {{ trans('misc.campaigns') }}
                </a>
              </li>

              <li>
                <a href="{{ url('account') }}" class="text-overflow">
                  <i class="glyphicon glyphicon-cog myicon-right"></i> {{ trans('users.account_settings') }}
                </a>
              </li>

              <li> 
                <a href="{{ url('logout') }}" class="logout text-overflow">
                  <i class="glyphicon glyphicon-log-out myicon-right"></i> {{ trans('users.logout') }}
                </a>
              </li>
            </ul><!-- DROPDOWN MENU -->
          </li>
          @endif
          <!-- <li>
            <form class="form-horizontal margin-top-10 margin-lft10" method="POST" action="/search" role="search">
              {{ csrf_field() }}
              <div class="row">
                <div class="col-md-10 padding-right-zero">
                  <input type="text" name="q" class="form-control border-lft2r" placeholder="{{ trans('misc.search') }}..." value="{{ old('search') }}">
                </div>
                <div class="col-md-2 padding-left-zero">
                  <button type="submit" class="btn btn-primary border-2r" ><i class="fa fa-search"></i></button>
                </div>	
              </div>
            </form>
          </li> -->

          <li><a class="log-in custom-rounded btn-create-pos margin-lft25" href="{{url('create/campaign')}}" title="{{trans('misc.create_campaign')}}">
            <i class="glyphicon glyphicon-edit"></i> <span class="text-uppercase font-default">{{trans('misc.create_campaign')}}</span></a>
          </li>
          <li><span class="fa fa-language locale-nav"><a href="{{ url('locale/fr') }}">&nbsp;&nbsp; FR &nbsp;</a>|<a href="{{ url('locale/en') }}">&nbsp; ENG &nbsp;</a></span></li>

        </ul>

      </div><!--/.navbar-collapse -->
  </div>
</div>