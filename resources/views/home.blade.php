
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hello {{ Auth::user()->name }}!</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <strong>Solution Step-1 (Fixing image source)</strong>
                    <p>After logging in with Auth, the profile page can be updated and thanks to the developed policy, each user can only update their own profile. But every user can see each other's profile. The Intervention Image library has been added to the project. In this way, a uniform avatar was created for each user.</p><hr/>

                    <strong>Solution Step-2 (Using Ajax Call for Listing)</strong>
                    <p>There are 3 different types of listing in the Employee module. Of course the real solution is Datatable Ajax method. Others have been added to compare speeds. Seeder is ready in the project, 10,000 users can be added with the code below. The profile properties of the users are created automatically with the event developed in the user model.
                    <br><br><code>php artisan db:seed --class=DatabaseSeeder</code></p><hr/>

                    <strong>Solution Step-3 (Make queries faster)</strong>
                    <p>Tabulation and search queries were prepared with Laravel Query Builder instead of Eloquent. Query speed can be optimized according to the number of tables to be JOIN in the project. For Datatable searching with Ajax, filtering feature can be added in only one column (eg employee name) (it stands as a comment line in <code>ajax.blade.php</code>) file.</p>

                </div>
            </div>
            <div class="mt-4" id="example"></div>
        </div>
    </div>
</div>
@endsection
