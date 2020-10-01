@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User</div>

                <div class="card-body">

                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name')}}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name')}}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email')}}" required>
                        </div>

                        <button type="submit" class="btn btn-success">Save</button>
                    </form>

                    <a class="btn btn-primary mt-3" href="{{ route('users.index') }}">Return</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection