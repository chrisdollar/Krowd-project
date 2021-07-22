<div class="col-xs-12 col-sm-6 col-md-3 col-thumb">
	<?php 

	$settings = App\Models\AdminSettings::first();

	if( str_slug( $campaign->title ) == '' ) {
		$slugUrl  = '';
	} else {
		$slugUrl  = '/'.str_slug( $campaign->title );
	}

	$url = url('campaign',$campaign->id).$slugUrl;
	$percentage = round($campaign->donations()->sum('donation') / $campaign->goal * 100);

	if( $percentage > 100 ) {
		$percentage = 100;
	} else {
		$percentage = $percentage;
	}	   
	?>
	<div class="thumbnail padding-top-zero">

		<a class="position-relative btn-block img-grid" href="{{$url}}">
			<img title="{{ e($campaign->title) }}" src="{{ asset('campaigns/small').'/'.$campaign->small_image }}" class="image-url img-responsive btn-block radius-image" />
		</a>

		<div class="caption">
			<h1 class="title-campaigns font-default">
				<a title="{{ e($campaign->title) }}" class="item-link" href="{{$url}}">
					{{ e($campaign->title) }}
				</a>
				<a href="/{{ $campaign->category->slug }}/campaigns"><span class="label label-default">{{ $campaign->category->name }}</span></a>
			</h1>

			<p class="desc-campaigns">
				@if( isset($campaign->user()->id) )
				<img src="{{ asset('avatar').'/'.$campaign->user()->avatar }}" width="20" height="20" class="img-circle avatar-campaign" /> {{ $campaign->user()->name}}
				@else
				<img src="{{ asset('avatar/default.jpg') }}" width="20" height="20" class="img-circle avatar-campaign" /> {{ trans('misc.user_not_available') }}
				@endif
			</p>

			<p class="desc-campaigns text-overflow">
				{{ str_limit(strip_tags($campaign->description),80,'...') }}
			</p>

			<p class="desc-campaigns">
				<span class="stats-campaigns">
					<span class="pull-left">
						<strong>{{$settings->currency_symbol.number_format($campaign->donations()->sum('donation'))}}</strong> 
						{{trans('misc.raised')}}
					</span> 
					<span class="pull-right"><strong>{{$percentage }}%</strong></span> 
				</span>

				<span class="progress">
					<span class="percentage" style="width: {{$percentage }}%" aria-valuemin="0" aria-valuemax="100" role="progressbar"></span>
				</span>
			</p>

			<h6 class="margin-bottom-zero">
				<em><strong>{{ trans('misc.goal') }} {{$settings->currency_symbol.number_format($campaign->goal)}}</strong></em>
			</h6>

		</div><!-- /caption -->
	</div><!-- /thumbnail -->
</div><!-- /col-sm-6 col-md-4 -->