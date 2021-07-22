<?php $settings = App\Models\AdminSettings::first(); ?>
@extends('layouts/app')

@section('title'){{ trans('misc.create_campaign').' - ' }}@endsection

@section('css')@endsection

@section('content')

<div class="jumbotron md index-header jumbotron_set jumbotron-cover">
	<div class="container wrap-jumbotron position-relative">
		<h2 class="title-site">{{ trans('misc.create_campaign') }}</h2>
	</div>
</div>

<div class="container margin-bottom-40 padding-top-40">
	<div class="row">

		<!-- col-md-8 -->
		<div class="col-md-12">
			<div class="wrap-center center-block">
				@include('errors.errors-forms')

				<!-- form start -->
				<form method="POST" action="{{ url('store/campaign') }}" enctype="multipart/form-data" id="formUpload">

					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="filer-input-dragDrop position-relative" id="draggable">
						<input type="file" accept="image/*" name="photo" id="filePhoto">

						<!-- previewPhoto -->
						<div class="previewPhoto">

							<div class="btn btn-danger btn-sm btn-remove-photo" id="removePhoto">
								<i class="fa fa-trash myicon-right"></i> {{trans('misc.delete')}}
							</div>

						</div><!-- previewPhoto -->

						<div class="filer-input-inner">
							<div class="filer-input-icon">
								<i class="fa fa-cloud-upload"></i>
							</div>
							<div class="filer-input-text">
								<h3 class="margin-bottom-10">{{ trans('misc.click_select_image') }}</h3>
								<h3>{{ trans('misc.max_size') }}: {{App\Helper::formatBytes($settings->file_size_allowed * 1024) .' - '.$settings->min_width_height_image}} </h3>
							</div>
						</div>
					</div>

					<!-- Start Form Group -->
					<div class="form-group">
						<label>{{ trans('misc.campaign_title') }}</label>
						<input type="text" value="{{ old('title') }}" name="title" id="title" class="form-control" placeholder="{{ trans('misc.campaign_title') }}">
					</div><!-- /.form-group-->

					<div class="form-group">
						<label>Category</label>
						<select name="category"  class="form-control">
							@foreach($categories as $category)
							<option value="{{$category->id}}"> {{$category->name}}</option>
							@endforeach
						</select>

					</div><!-- /.form-group-->

					<div class="form-group">
						<label>{{ trans('misc.campaign_goal') }}</label>
						<div class="input-group">
							<div class="input-group-addon addon-dollar">{{$settings->currency_symbol}}</div>
							<input type="number" min="{{$settings->min_campaign_amount}}" class="form-control" name="goal" id="onlyNumber" value="{{ old('goal') }}" placeholder="10000">
						</div>
					</div>

					<!-- Start Form Group -->
					<div class="form-group">
						<label>{{ trans('misc.location') }}</label>
						<input type="text" value="{{ old('location') }}" name="location" class="form-control" placeholder="{{ trans('misc.location') }}">
					</div><!-- /.form-group-->


					<div class="form-group">
						<label>{{ trans('misc.campaign_description') }}</label>
						<textarea name="description" rows="4" id="description" class="form-control" placeholder="{{ trans('misc.campaign_description_placeholder') }}">{{ old('description') }}</textarea>
					</div>

					<!-- Alert -->
					<div class="alert alert-danger display-none" id="dangerAlert">
						<ul class="list-unstyled" id="showErrors"></ul>
					</div><!-- Alert -->

					<div class="box-footer">
						<hr />
						<button type="submit" id="buttonFormSubmit" class="btn btn-block btn-lg btn-main custom-rounded">{{ trans('misc.create_campaign') }}</button>
					</div><!-- /.box-footer -->

				</form>

			</div><!-- wrap-center -->
		</div><!-- col-md-12-->

	</div><!-- row -->
</div><!-- container -->
@endsection

@section('javascript')
<script src="{{ asset('plugins/iCheck/icheck.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">

	$(document).ready(function() {

		$("#onlyNumber").keypress(function(event) {
			return /\d/.test(String.fromCharCode(event.keyCode));
		});

		$('input').iCheck({
			checkboxClass: 'icheckbox_square-red',
			radioClass: 'iradio_square-red',
increaseArea: '20%' // optional
});

	});

//Flat red color scheme for iCheck
$('input[type="radio"]').iCheck({
	radioClass: 'iradio_flat-red'
});

$('#removePhoto').click(function(){
	$('#filePhoto').val('');
	$('.previewPhoto').css({backgroundImage: 'none'}).hide();
	$('.filer-input-dragDrop').removeClass('hoverClass');
});

//================== START FILE IMAGE FILE READER
$("#filePhoto").on('change', function(){

	var loaded = false;
	if(window.File && window.FileReader && window.FileList && window.Blob){
if($(this).val()){ //check empty input filed
	oFReader = new FileReader(), rFilter = /^(?:image\/gif|image\/ief|image\/jpeg|image\/jpeg|image\/jpeg|image\/png|image)$/i;
	if($(this)[0].files.length === 0){return}


		var oFile = $(this)[0].files[0];
var fsize = $(this)[0].files[0].size; //get file size
var ftype = $(this)[0].files[0].type; // get file type


if(!rFilter.test(oFile.type)) {
	$('#filePhoto').val('');
	$('.popout').addClass('popout-error').html("{{ trans('misc.formats_available') }}").fadeIn(500).delay(5000).fadeOut();
	return false;
}

var allowed_file_size = {{$settings->file_size_allowed * 1024}};	

if(fsize>allowed_file_size){
	$('#filePhoto').val('');
	$('.popout').addClass('popout-error').html("{{trans('misc.max_size').': '.App\Helper::formatBytes($settings->file_size_allowed * 1024)}}").fadeIn(500).delay(5000).fadeOut();
	return false;
}
<?php $dimensions = explode('x',$settings->min_width_height_image); ?>

oFReader.onload = function (e) {

	var image = new Image();
	image.src = oFReader.result;

	image.onload = function() {

		if( image.width < {{ $dimensions[0] }}) {
			$('#filePhoto').val('');
			$('.popout').addClass('popout-error').html("{{trans('misc.width_min',['data' => $dimensions[0]])}}").fadeIn(500).delay(5000).fadeOut();
			return false;
		} 

		if( image.height < {{ $dimensions[1] }} ) {
			$('#filePhoto').val('');
			$('.popout').addClass('popout-error').html("{{trans('misc.height_min',['data' => $dimensions[1]])}}").fadeIn(500).delay(5000).fadeOut();
			return false;
		} 

		$('.previewPhoto').css({backgroundImage: 'url('+e.target.result+')'}).show();
		$('.filer-input-dragDrop').addClass('hoverClass');
		var _filname =  oFile.name;
		var fileName = _filname.substr(0, _filname.lastIndexOf('.'));
};// <<--- image.onload


}

oFReader.readAsDataURL($(this)[0].files[0]);

}
} else{
	$('.popout').html('Can\'t upload! Your browser does not support File API! Try again with modern browsers like Chrome or Firefox.').fadeIn(500).delay(5000).fadeOut();
	return false;
}
});

$('input[type="file"]').attr('title', window.URL ? ' ' : '');

</script>


@endsection
