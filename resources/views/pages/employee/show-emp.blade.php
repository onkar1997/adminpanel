@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">

    <a href="{{ url('employee') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
    <div class="card shadow my-5 px-4">
        <div class="card-body text-center">
            <h3 class="text-center">{{ $employee->firstname }} {{ $employee->lastname }}</h3>
            <hr>

            <div class="row text-left">
                <div class="col-md-2"></div>

                <div class="col-md-4">
                    <h4>First Name : </h4>
                    <h4>Last Name : </h4>
                    <h4>Email : </h4>
                    <h4>Phone : </h4>
                    <h4>Company Name : </h4>
                </div>

                <div class="col-md-4">
                    <h4>{{ $employee->firstname }}</h4>
                    <h4>{{ $employee->lastname }}</h4>
                    <h4>{{ $employee->email }}</h4>
                    <h4>{{ $employee->phone }}</h4>
                    <h4>{{ $employee->companies->name }}</h4>
                </div>

                <div class="col-md-2"></div>
            </div>

            <div class="row m-3">
                <div class="col-md-5"></div>

                <div class="col-md-1">
                    <a href="{{ url('employee/'.$employee->id.'/edit') }}" class="btn btn-sm btn-secondary">
                        Edit
                    </a>
                </div>

                <div class="col-md-1">
                    <form method="POST" action="{{ url('employee/'.$employee->id) }}">
                        {{ method_field('DELETE') }}
                        @csrf

                        <button onclick="return confirm('Are you sure you want to delete ?')"
                            class="btn btn-sm btn-danger" type="submit">
                            Delete
                        </button>
                    </form>
                </div>

                <div class="col-md-5"></div>
            </div>
        </div>
    </div>
</div>