<?php $settings = App\Models\AdminSettings::first(); ?>
@extends('app')

@section('content')
<div class="jumbotron index-header jumbotron_set jumbotron-cover @if( Auth::check() ) session-active-cover @endif">
      <div class="container wrap-jumbotron position-relative">
        <h1 class="title-site txt-left" id="titleSite">{{$settings->welcome_text}}</h1>
        <p class="subtitle-site txt-left"><strong>{{$settings->welcome_subtitle}}</strong></p>


       	<div class="searchBar">
       		<form class="form-group has-feedback has-search margin-top-20" method="POST" action="/search" role="search">
	    		{{ csrf_field() }}
			    <span class="fa fa-search fa-2x form-control-feedback"></span>
			    <input type="text" name="q"class="form-control" placeholder="{{ trans('misc.search') }}...">
		    </form>
       	</div><!-- searchBar -->
    	
		
      </div><!-- container wrap-jumbotron -->
</div><!-- jumbotron -->

	<div class="container margin-bottom-40">
		<div class="col-md-12 btn-block margin-bottom-40 head-home">
			<h1 class="btn-block text-center class-montserrat margin-bottom-zero none-overflow">{{trans('misc.campaigns')}}</h1>
			<h5 class="btn-block text-center class-montserrat subtitle-color">{{trans('misc.recent_campaigns')}}</h5>
		</div>
		
		<div class="margin-bottom-30">
			@include('includes.campaigns')
		</div>			
	</div><!-- container wrap-ui -->
	
	<div class="jumbotron jumbotron-bottom margin-bottom-zero jumbotron-cover">
      <div class="container wrap-jumbotron position-relative">
        <h1 class="title-site">{{trans('misc.title_cover_bottom')}}</h1>
        <p class="subtitle-site txt-center"><strong>{{$settings->welcome_subtitle}}</strong></p>

      </div><!-- container wrap-jumbotron -->

</div><!-- jumbotron -->
@endsection

@section('javascript')
	<script src="{{ asset('plugins/jquery.counterup/jquery.counterup.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery.counterup/waypoints.min.js') }}"></script>
	
		<script type="text/javascript">
		
		$(document).on('click','#campaigns .loadPaginator', function(r){
			r.preventDefault();
			 $(this).remove();
			 $('.loadMoreSpin').remove();
					$('<div class="col-md-12 loadMoreSpin"><a class="list-group-item text-center"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i></a></div>').appendTo( "#campaigns" );
					
					var page = $(this).attr('href').split('page=')[1];
					$.ajax({
						url: '{{ url("ajax/campaigns") }}?page=' + page
					}).done(function(data){
						if( data ) {
							$('.loadMoreSpin').remove();
							
							$( data ).appendTo( "#campaigns" );
						} else {
							bootbox.alert( "{{trans('misc.error')}}" );
						}
						//<**** - Tooltip
					});
			});
	
		jQuery(document).ready(function( $ ) {
			$('.counter').counterUp({
			delay: 10, // the delay time in ms
			time: 1000 // the speed time in ms
			});
		});
		
		 @if (session('success_verify'))
    		swal({   
    			title: "{{ trans('misc.welcome') }}",   
    			text: "{{ trans('users.account_validated') }}",   
    			type: "success",   
    			confirmButtonText: "{{ trans('users.ok') }}" 
    			});
   		 @endif
   		 
   		 @if (session('error_verify'))
    		swal({   
    			title: "{{ trans('misc.error_oops') }}",   
    			text: "{{ trans('users.code_not_valid') }}",   
    			type: "error",   
    			confirmButtonText: "{{ trans('users.ok') }}" 
    			});
   		 @endif
		
		</script>

@endsection