@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>

                <div class="card-body">
                    @if ( filled(session('success'))||filled(session('fail')))
                    <div id="edit-alert"
                        class="alert alert-{{session('success')? 'success' : 'danger'}} alert-dismissible fade show"
                        role="alert">
                        <strong class="text-primary">{{ session('fail')}}</strong>
                        <strong class="text-primary">{{ session('success')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    <form action="{{ route('users.update',$user->id) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{$user->first_name}}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{$user->last_name}}"
                                required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                        </div>
                        <button type="submit" class="btn btn-primary" href="">Update</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
