@extends('layouts.default')
@section('content')

<div class="col-sm-5">

{{ Form::open([
        "route"        => "users/login",
        "autocomplete" => "off"
    ]) }}
    <ul class="list-unstyled">
        <li class="form-group">
        {{ Form::label("username", "Username") }}
        {{ Form::text("username", Input::old("username"), array("class" => "form-control", "placeholder" => "john.smith")) }}
        </li>
        <li class="form-group">
        {{ Form::label("password", "Password") }}
        {{ Form::password("password", array("placeholder" => "●●●●●●●●●●", "class" =>"form-control")) }}
        </li>

        @if ($error = $errors->first("password"))
            <div class="error">
                {{ $error }}
            </div>
        @endif
        
        <li class="form-group">
        {{ Form::submit("Login", array("class" => "btn btn-info")) }}
{{ Form::close() }}
        </li>

</div><!-- .col-sm-5 -->

@stop