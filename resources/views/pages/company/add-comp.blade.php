@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">
    @include('layouts.messages')
    <h3 class="text-center">ADD COMPANY</h3>
    <hr>
    <a href="{{ url('company') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ url('company') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Company Name" name="name">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Website" name="website">
                        </div>

                        <div class="form-group">
                            <label>Logo : </label>
                            <input type="file" name="logo">
                            <p><small class="text-danger"><em>* Note : Image size should be: 100X100</em></small></p>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
