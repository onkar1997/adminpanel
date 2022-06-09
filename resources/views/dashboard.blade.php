@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container text-center my-5">
    <div class="row">
        <div class="col-lg">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                <h1><em>Welcome {{ Auth::user()->name }}!</em></h1>
            </div>
            @endif
        </div>
    </div>
</div>