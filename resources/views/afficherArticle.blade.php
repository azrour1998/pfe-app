@extends('layouts.app')
@section('content')
<div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Page Articles</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">  Articles</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">image</th>
                        <th scope="col">Désigniation</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Fournisseur</th>
                        <th scope="col">Minimal quantity</th>
                        
                    </tr>
                </thead>
               
                <tbody>
                    @foreach($articles as $article)
                    <tr>
              
                        <td>  <img height="100px" src="{{'/storage/images/articles/'.$article['image']}}" /></td>
                        <td>{{$article['designation']}}</td>
                        <td>{{$article['quantity']}}</td>
                        <td>{{$article['price']}}</td>
                        <td>{{$article['fournisseur_id']}}</td>
                        <td>{{$article['minimal_quantity']}}</td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>































@endsection