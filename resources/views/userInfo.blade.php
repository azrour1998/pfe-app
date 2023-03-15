@extends('layouts.app')

@section('content')
<link rel="website icon" type="png" href="https://cdn.onlinewebfonts.com/svg/img_379156.png">

<div class="container">
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach($errors->all() as $error)
      <li>
        {{$error}}
      </li>
      @endforeach
    </ul>
   </div>
  @endif
  <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="{{ asset('img/undraw_profile.svg') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                <div class="mt-3">
                                    <h4>{{Auth::user()->name}}</h4>
                                    <p class="text-secondary mb-1">{{Auth::user()->email}}</p>
                                  </div>
                            </div>
                            <hr class="my-4">
                            
                        </div>
                    </div>
                </div>

  @if(session()->get('message'))
  <div class="alert alert-success" role="alert">
    <strong>Success: </strong>{{session()->get('message')}}
  </div>
  @endif
    
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">{{Auth::user()->name}}'s Profile</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if($message = Session::get('success'))
                      <div class="alert alert-success">
                   <p>{{$message}}</p>
                      </div>
                   @endif
                    
           
          
          
                      <form action="{{('/userInfo/{id}/update')}}" method="post">
                        @csrf
                       <div class="form-group">
                           <label for="name"><strong>Name:</strong></label>
                           <input type="text" class="form-control" id ="name" name="name" value="{{Auth::user()->name}}">
                       </div>
                        <div class="form-group">
                           <label for="email"><strong>Email:</strong></label>
                           <input type="text" class="form-control" id ="email" value="{{Auth::user()->email}}" name="email">
                       </div>
                       <div class="form-group">
                           <label for="telephone"><strong>Phone:</strong></label>
                           <input type="text" class="form-control" id ="telephone" value="{{Auth::user()->telephone}}" name="telephone">
                       </div>
                       <div class="form-group">
                           <label for="company"><strong>Company:</strong></label>
                           <input type="text" class="form-control" id ="company" value="{{Auth::user()->company}}" name="company">
                       </div>
                       
                        <button class="btn btn-primary" type="submit">Save Change</button>
                      </form>
                </div>
                <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="d-flex align-items-center mb-3">Project Status</h5>
                                    <p>Contribution à l'alimentation du stock :  {{$contribution}}%</p>
                                    <div class="progress mb-3" style="height: 15px">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: {{$contribution}}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                       
                                    </div>
                                   
                                    
                                </div>
                              </div>
                          </div>
                 </div>
              </div>
           </div>


</div>

@endsection