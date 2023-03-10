@extends('layouts.app')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Historiquesuser</h1>
@if (Session::has('status'))
       <div class="alert alert-success" role="alert">
            <p>{{ Session::get('status') }}</p>
       </div>
 @endif
<p class="mb-4"><a target="_blank"
        href="https://datatables.net"></a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Historiques user</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        
                        <th scope="col">title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Date</th>
                        <th scope="col">Actions</th>
                            
                    </tr>
                </thead>
               
                <tbody>
                    
                    @foreach($historiqueuser as $historiqueu)
                  
                    @if($historiqueu['seen'])
                    <tr style="background-color:#D1D8DF">
                    @else
                    <tr >
                    @endif
                   
                  
                        <td style="text-align: center; vertical-align: middle;">{{$historiqueu['title']}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$historiqueu['description']}}</td>
                        <td style="text-align: center; vertical-align: middle;">{{$historiqueu['created_at']}}</td>
                        <td style="padding: 15px;">
                            <a type="button"  href="{{ url('/historiqueUser/' . '/markAsSeen') }}" class="btn btn-outline-success px-3" data-toggle="tooltip" data-placement="top" title="Marquer comme lu"><i class=" fa-solid fa-eye" aria-hidden="true"></i></a>
                            <a type="button" class="btn btn-outline-info px-3" data-toggle="tooltip" data-placement="top" title="Afficher l'article"><i class=" fa-solid fa-box" aria-hidden="true"></i></a>
                            <a type="button" class="btn btn-outline-dark px-3" data-toggle="tooltip" data-placement="top" title="Afficher l'utilisateur"><i class=" fa-solid fa-user" aria-hidden="true"></i></a>
                            <a type="button"  href="{{ url('/historiqueUser/' . '/deleteItem') }}"  class="btn btn-outline-danger px-3" data-toggle="tooltip" data-placement="top" title="Supprimer cette alert"><i class=" fa-solid fa-trash" aria-hidden="true"></i></a>

                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>





@endsection