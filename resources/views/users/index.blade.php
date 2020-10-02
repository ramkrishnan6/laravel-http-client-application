@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('layouts.alert')

            <div class="card">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body">

                    <a href="{{ route('users.create') }}" class="btn btn-success">New User</a>

                    <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" colspan=2>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users->data as $user)
                                <tr>
                                    <td>
                                        <img style="height: 100px" src={{$user->avatar}}>
                                    </td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ route('users.show', $user->id) }}">Show</a>
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ route('users.edit', $user->id) }}">Edit</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <ul class="pagination">
                        <li class="page-item {{$users->page == 1 ? 'disabled' : ''}}">
                            <a class="page-link"
                                href="{{route('users.index', 'page=' . ($users->page - 1))}}">Previous</a>
                        </li>

                        @if ($users->page > 0)
                        @for($page = 0; $page < $users->total_pages; $page++)
                            <li class="page-item {{$users->page == ($page + 1) ? 'disabled' : ''}}">
                                <a class="page-link"
                                    href="{{route('users.index', 'page=' . ($page + 1))}}">{{$page + 1}}</a>
                            </li>
                            @endfor
                            @endif

                            <li class="page-item {{$users->page == $users->total_pages ? 'disabled' : ''}}">
                                <a class="page-link"
                                    href="{{route('users.index', 'page=' . ($users->page + 1))}}">Next</a>
                            </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
