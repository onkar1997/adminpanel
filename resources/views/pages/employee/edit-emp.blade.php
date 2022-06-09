@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">
    <h3 class="text-center">EDIT EMPLOYEE</h3>
    <hr>
    <a href="{{ url('employee') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body">
            <form action="{{ url('employee/'.$employee->id) }}" method="POST">
                @csrf
                {{ method_field('PUT') }}
                <div class="row my-4">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $employee->firstname }}" name="firstname">
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $employee->lastname }}" name="lastname">
                        </div>

                        <div class="form-group">
                            <select name="company" class="form-control">
                                <option value="{{ $employee->company }}" selected>
                                    {{ $employee->companies->name }}
                                </option>
                                @foreach ($companies as $company)
                                @if($company->name != $employee->companies->name)
                                <option value="{{ $company->id }}">
                                    {{ $company->name }}
                                </option>
                                @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" value="{{ $employee->email }}" name="email">
                        </div>

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">+91</span>
                            </div>
                            <input type="text" class="form-control" name="phone" value="{{ $employee->phone }}">
                        </div>

                        <button type="submit" class="btn btn-primary btn-block mt-5">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>