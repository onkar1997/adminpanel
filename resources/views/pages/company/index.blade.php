@extends('layouts.app')

@include('layouts.adminnavbar')

<div class="container my-5">
    @include('layouts.messages')
    <h3 class="text-center">COMPANYS</h3>
    <hr>

    <div class="container my-5">
        @if(count($companies) > 0)
        <a href="{{ url('/dashboard') }}" class="btn btn-dark btn-sm float-left mr-2">Back</a>
        <a href="{{ url('company/create') }}" class="btn btn-primary btn-sm mb-3">
            <i class="fas fa-plus"></i> Add Company
        </a>
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach($companies as $key => $company)
                <tr>
                    <th scope="row">{{ $companies->firstItem() + $key }}</th>
                    <td>
                        <img src="/storage/logos/{{ $company->logo }}" alt="{{$company->logo}}" height="40" width="70px"
                            style="border-radius: 5px;">
                    </td>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->website}}</td>
                    <td>
                        <a href="{{ url('company/'.$company->id.'/edit') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <form method="POST" action="{{ url('company/'.$company->id) }}">
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
            <h4 class="my-5 text-danger">No Companies Listed ! ! !</h4>
            <a href="{{ url('dashboard') }}" class="btn btn-dark btn-sm mr-2">Back</a>
            <a href="{{ url('company/create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add Company
            </a>
        </div>
        @endif
    </div>
    <div class="container">
        {{ $companies->links('pagination::bootstrap-4') }}
    </div>
</div>