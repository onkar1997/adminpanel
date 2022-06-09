@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">
    @include('layouts.messages')
    <h3 class="text-center">EMPLOYEES</h3>
    <hr>

    <div class="container my-5">
        @if(count($employees) > 0)
        <a href="{{ url('/dashboard') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
        <a href="{{ url('employee/create') }}" class="btn btn-primary btn-sm mb-3">
            <i class="fas fa-plus"></i> Add Employee
        </a>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Company</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach($employees as $key => $employee)
                <tr onclick="window.location='employee/{{ $employee->id }}';" style="cursor: pointer">
                    <th scope="row">{{ $employees->firstItem() + $key }}</th>
                    <td>{{$employee->firstname}}</td>
                    <td>{{$employee->lastname}}</td>
                    <td>{{$employee->companies->name}}</td>
                    <td>
                        <a href="{{ url('employee/'.$employee->id.'/edit') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ url('employee/'.$employee->id) }}">
                            {{ method_field('DELETE') }}
                            @csrf

                            <button onclick="return confirm('Are you sure you want to delete ?')"
                                class="btn btn-sm btn-danger" type="submit">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="text-center">
            <h4 class="my-5 text-danger">No Employees Listed ! ! !</h4>
            <a href="{{ url('dashboard') }}" class="btn btn-dark btn-sm mr-2">Back</a>
            <a href="{{ url('employee/create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Employee
            </a>
        </div>
        @endif
    </div>
    <div class="container">
        {{ $employees->links('pagination::bootstrap-4') }}
    </div>
</div>