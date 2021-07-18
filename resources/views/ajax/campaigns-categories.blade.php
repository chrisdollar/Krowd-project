@if( $data->count() != 0 )
	@foreach ($campaigns as $campaign )
	    @include('includes.list-campaigns-categories')
	@endforeach
	@if( $data->hasMorePages() )
		<div class="col-md-12 loadMoreSpin">
			{{ $data->links('vendor.pagination.loadmore') }}
		</div>
	@endif
@endif
