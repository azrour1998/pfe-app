@extends('layouts.app')
@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="container mt-4">
    @if(session('status') && session('status')===200)
        <div class="alert alert-success">
            l'article a été ajouter 
        </div>
    @elseif(session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
    @endif
         <div class="card">
            <div class="card-header">{{ __('AddArticle') }}</div>
            <div class="card-body">
            <form name="addArticle" id="addArticle" method="post" enctype="multipart/form-data" action="{{url('addArticle')}}">
            @csrf
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Désigniation</label>
                    <div class="col-md-10">
                    <input id="designation" name="designation" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Price</label>
                    <div class="col-md-10">
                    <input id="price" name="price" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Quantity</label>
                    <div class="col-md-10">
                    <input id="quantity" name="quantity" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">fournisseur</label>
                    <div class="col-md-10">
                        <select class="form-control" id="exampleFormControlSelect1" id="fournisseur" name="fournisseur" required >
                            
                                <option>Select</option>
                                @foreach($fournisseurs as $fournisseur)
                                <option value="{{$fournisseur->id}}" >{{$fournisseur->name}}</option>
                                @endforeach

                        </select>
               
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">minimal quantity</label>
                    <div class="col-md-10">
                    <input id="minimal_quantity" name="minimal_quantity" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>

                <div class="row mb-3">
                <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Categorie</label>
                    <div class="col-md-10">
                        <select class="custom-select"  id="categorie" name="categorie" required>
                             @foreach($categories as $categorie)
                             
                            <option value="{{$categorie->categorie}}">{{$categorie->categorie}}</option>
                            
                            @endforeach
                            
                        </select>
                    </div>
                <div class="invalid-feedback">Example invalid custom select feedback</div>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>   
</div>
@endsection