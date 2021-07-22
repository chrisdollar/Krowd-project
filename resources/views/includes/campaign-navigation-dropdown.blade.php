<li class="dropdown">
	<a href="/" class="dropdown-toggle text-uppercase font-default" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-search"></i>&nbsp;{{ trans('misc.browse_campaign') }}<span class="caret"></span></a>
	<ul class="dropdown-menu font-default" role="menu">
		@if(!empty($categories))
		@foreach($categories as $category)
		<li><a href="/{{ $category->slug }}/campaigns/">{{ $category->name }}</a>
		@endforeach
		@endif
	</ul>
</li>