@extends('layouts.app')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Users</h1>
<p class="mb-4"> <a target="_blank"
        href="https://datatables.net"></a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Email</th>
                        <th scope="col">telephone</th>
                        <th scope="col">date de naissance</th>
                        <th scope="col">role</th>
                        <th scope="col">company</th>


              
                    </tr>
                </thead>
               
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['telephone']}}</td>
                        <td>{{$user['dob']}}</td>
                        <td>{{$user['role']}}</td>
                        <td>{{$user['company']}}</td>



                     
                    </tr>
              
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

























      
@endsection