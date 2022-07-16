
@extends('layouts.app')

@section('additional_styles')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Datatable Ajax with Server Side Rendering.</div>

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
                            <th scope="col">Profile</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#datatable').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "{{ route('api.users.index') }}",
                "columns": [
                    { data: "id", name: 'id'},
                    { data: 'image', name: 'profiles.image',render: function( data, type, full, meta ) {
                        return "<img style='max-width: 70px;' class='rounded-circle' src=\"/storage/" + data + "\" />";
                        }
                    },
                    { data: "name", name: 'users.name'},
                    { data: "email", name: 'users.email'},
                    { data: "title", name: 'profiles.title'},
                    { data: "description", name: 'profiles.description'},
                    { data: "id", name: 'id',render: function( data, type, full, meta ) {
                        return "<a class='btn btn-primary' href=\"/profile/" + data + "\" />Profile</a>";
                        }
                    },
                ]
            });

             //to increase search performance we may use only one column (name) filtering
            /*
            var table = $('#datatable').DataTable(); 
            $('.dataTables_filter input')
                .off()
                .on( 'keyup', function () {
                    table.column(2).search( this.value ).draw();
            } );
            */


        });
    </script>
@endsection