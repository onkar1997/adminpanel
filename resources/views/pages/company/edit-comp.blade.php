@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <h3 class="text-center">EDIT Company</h3>
    <hr>
    <a href="{{ url('company') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ url('company/'.$company->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                {{ method_field('PUT') }}
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $company->name }}" name="name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $company->email }}" name="email">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $company->website }}" name="website">
                        </div>

                        <div class="form-group">
                            <label>Logo : </label>
                            <img src="/storage/logos/{{ $company->logo }}" alt="{{ $company->logo }}" height="20">
                            <br>
                            <input type="file" name="logo">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>