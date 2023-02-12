@extends('layouts.app')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Fournisseurs</h1>
<p class="mb-4"> <a target="_blank"
        href="https://datatables.net">Fournisseurs</a>.</p>

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
                        <th scope="col">telephone</th>
                        <th scope="col">adresse</th>
                        <th scope="col">ville</th>
                        <th scope="col">pays</th>
              
                    </tr>
                </thead>
               
                <tbody>
                    @foreach($fournisseurs as $fournisseur)
                    <tr>
                        <td>{{$fournisseur['name']}}</td>
                        <td>{{$fournisseur['telephone']}}</td>
                        <td>{{$fournisseur['adresse']}}</td>
                        <td>{{$fournisseur['city']}}</td>
                        <td>{{$fournisseur['pays']}}</td>
                     
              
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>

























      
@endsection