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
            <div class="card-header">{{ __('AddArticle') }}</div>
            <div class="card-body">
            <form name="addArticle" id="addArticle" method="post" action="{{url('addArticle')}}">
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
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Fournisseur</label>
                    <div class="col-md-10">
                        <select class="form-control" id="exampleFormControlSelect1" >
                                <option>Select</option>
                                <option>hp</option>
                                <option>mac</option>
                                <option>del</option>   
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">minimal quantity</label>
                    <div class="col-md-10">
                    <input id="minimal_quantity" name="minimal_quantity" type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">image</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" >
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>   
</div>
@endsection