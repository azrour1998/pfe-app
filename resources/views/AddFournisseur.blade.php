@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
         <div class="card">
            <div class="card-header">{{ __('Ajouter un fournisseur') }}</div>
            <div class="card-body">
            <form name="addFournisseur" id="addFournisseur" method="post" action="{{url('addFournisseur')}}">
            @csrf
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Name</label>
                    <div class="col-md-10">
                    <input id="name" name="name" type="text" class="form-control" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">telephone</label>
                    <div class="col-md-10">
                    <input id="telephone" name="telephone" type="tel" class="form-control" placeholder="0666558899" >
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Adresse</label>
                    <div class="col-md-10">
                    <input id="adresse" name="adresse" type="text" class="form-control" placeholder="59 hye Al Amel" >
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Ville</label>
                    <div class="col-md-4">
                    <input id="city" name="city" type="text" class="form-control" placeholder="Dakhla" >
                    </div>
               
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Pays</label>
                    <div class="col-md-4">
                    <input id="pays" name="pays" type="text" class="form-control"  placeholder="Maroc">
                    </div>
                </div>
                
               
             
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>   
</div>
@endsection