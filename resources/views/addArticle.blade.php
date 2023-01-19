@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">
            <div class="card-header">{{ __('AddArticle') }}</div>
            <div class="card-body">
                <form>
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Désigniation</label>
                    <div class="col-md-10">
                    <input type="text" class="form-control" id="exampleFormControlInput1" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Price</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Quantity</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Fournisseur</label>
                        <select class="form-control" id="exampleFormControlSelect1" >
                                <option>Select</option>
                                <option>hp</option>
                                <option>mac</option>
                                <option>del</option>   
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">minimal quantity</label>
                    <input type="text" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">image</label>
                    <input type="file" class="form-control" id="exampleFormControlInput1" >
                </div>
                <div class="rom-mb-0">
                    <div class="col-md-8 offset-md-4">
                    <button type="button" class="btn btn-primary">valider</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>   
</div>
@endsection