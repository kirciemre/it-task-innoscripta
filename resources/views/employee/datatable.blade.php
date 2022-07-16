
@extends('layouts.app')

@section('additional_styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">DATATABLE: Hi {{ Auth::user()->name }} Here is our employees!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table" id="datatable">
                        <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Profile Picture</th>
                            <th scope="col">Name</th>
                            <th scope="col">E-Mail</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                          <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>
                                <a href="{{ url('/') }}/profile/{{ $user->id }}" >
                                    <div>
                                        <img src="/storage/{{ $user->image }}" style="max-width: 70px;" class="rounded-circle">
                                    </div>
                                </a>
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->title }}</td>
                            <td>{{ $user->description }}</td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    <p>That is our all employee CRM table consists of #{{ count($users) }} people.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('additional_js')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#datatable').DataTable();
        });
    </script>
@endsection