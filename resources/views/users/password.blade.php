<?php 
// ** Data User logged ** //
$user = Auth::user();
?>
@extends('layouts/app')

@section('title') {{ trans('auth.password') }} - @endsection

@section('content') 
<div class="jumbotron md index-header jumbotron_set jumbotron-cover">
  <div class="container wrap-jumbotron position-relative">
    <h2 class="title-site">{{ trans('auth.password') }}</h2>
  </div>
</div>

<div class="container margin-bottom-40">

  <!-- Col MD -->
  <div class="col-md-8 margin-bottom-20">
    @if (Session::has('notification'))
    <div class="alert alert-success btn-sm alert-fonts" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('notification') }}
    </div>
    @endif

    @if (Session::has('incorrect_pass'))
    <div class="alert alert-danger btn-sm alert-fonts" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      {{ Session::get('incorrect_pass') }}
    </div>
    @endif

    @include('errors.errors-forms')

    <!-- ***** FORM ***** -->	
    <form action="{{ url('account/password') }}" method="post" name="form">

      <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <!-- ***** Form Group ***** -->
      <div class="form-group has-feedback">
        <label class="font-default">{{ trans('misc.old_password') }}</label>
        <input type="password" class="form-control login-field custom-rounded" name="old_password" placeholder="{{ trans('misc.old_password') }}" title="{{ trans('misc.old_password') }}" autocomplete="off">
      </div><!-- ***** Form Group ***** -->


      <!-- ***** Form Group ***** -->
      <div class="form-group has-feedback">
        <label class="font-default">{{ trans('misc.new_password') }}</label>
        <input type="password" class="form-control login-field custom-rounded" name="password" placeholder="{{ trans('misc.new_password') }}" title="{{ trans('misc.new_password') }}" autocomplete="off">
      </div><!-- ***** Form Group ***** -->


      <button type="submit" id="buttonSubmit" class="btn btn-block btn-lg btn-main custom-rounded">{{ trans('misc.save_changes') }}</button>
    </form><!-- ***** END FORM ***** -->

  </div><!-- /COL MD -->

  <div class="col-md-4">
    @include('users.navbar-edit')
  </div>

</div><!-- container -->

<!-- container wrap-ui -->
@endsection

