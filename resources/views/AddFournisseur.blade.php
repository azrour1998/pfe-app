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
            <div class="card-header">{{ __('AddFournisseur') }}</div>
            <div class="card-body">
            <form name="addFournisseur" id="addFournisseur" method="post" action="{{url('addFournisseur')}}">
            @csrf
                <div class="row mb-3">
                    <label for="exampleFormControlInput1" class="col-md-2 col-form-label text-start">Name</label>
                    <div class="col-md-10">
                    <input id="name" name="name" type="text" class="form-control" >
                    </div>
                </div>
               
             
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>   
</div>
@endsection