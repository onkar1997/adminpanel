@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container text-center my-5">
    <div class="row">
        <div class="col-lg">
            @if (Route::has('login'))
            @auth
            <h1><em>Welcome {{ Auth::user()->name }} !</em></h1>
            @else
            <h1><em>Hello &#58;&#41;</em></h1>
            <h2><em>Please Login In Order To Continue</em></h2>
            @endauth
            @endif
        </div>
    </div>
</div>