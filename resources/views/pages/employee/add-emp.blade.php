@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">
    @include('layouts.messages')
    <h3 class="text-center">ADD EMPLOYEE</h3>
    <hr>
    <a href="{{ url('employee') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ url('employee') }}" method="POST">
                @csrf
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="First Name" name="firstname">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Last Name" name="lastname">
                        </div>

                        <div class="form-group">
                            <select name="company" class="form-control">
                                <option value="">Select Company</option>
                                @foreach ($companies as $company)
                                <option value="{{ $company->id }}">
                                    {{ $company->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" name="email">
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </div>
                            <input type="text" class="form-control" name="phone">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>