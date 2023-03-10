@extends('layouts.app')
@section('content')
<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                              Historique</div>
                                              <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countHistoric}}</div> 
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Articles En stock</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countArticles}}</div>
                                            
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-poll fa-2x text-gray-300"></i>
                                        </div>
                                        
                                      
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Utilisateurs
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countUsers}}</div>
                                                </div>
                                                <div class="col">
                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class='fa fa-info-circle fa-2x text-gray-300' ></i>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                               En Alerte stock</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$alert}}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa fa-cogs fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-12 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Catégories</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">catégorie beauté <span
                                            class="float-right">{{$pourcentageA}}%  </span></h4>
                                         
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$pourcentageA}}%"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Article de sport <span
                                            class="float-right"> {{$pourcentageB}}%</span></h4>
                                          
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$pourcentageB}}%"
                                          aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Article pour bébés et enfants <span
                                            class="float-right">{{$pourcentageC}}%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$pourcentageC}}%"
                                           aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Produit artisanaux <span
                                            class="float-right">{{$pourcentageD}}%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$pourcentageD}}%"
                                            aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    
                                    <h4 class="small font-weight-bold">Cuisine et maison <span
                                            class="float-right">{{$pourcentageG}}%  </span></h4>
                                         
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$pourcentageG}}%"
                                           aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                  
                                    <h4 class="small font-weight-bold"> Bricolage, Jardin & animalerie <span
                                            class="float-right">{{$pourcentageH}}%  </span></h4>
                                         
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$pourcentageH}}%"
                                           aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h4 class="small font-weight-bold"> Alimentation et boissons <span
                                            class="float-right">{{$pourcentageE}}%  </span></h4>
                                         
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$pourcentageE}}%"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <h4 class="small font-weight-bold"> informatique et bureau <span
                                            class="float-right">{{$pourcentageF}}%  </span></h4>
                                         
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width:{{$pourcentageF}}%"
                                             aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                            </div>

                            <!-- Color System -->
                           

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informations</h6>
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 22rem;"
                                            src="https://img.freepik.com/free-vector/share-business-dividend-calculation-percentage-ratio-contribution-size-deposit-amount-accounting-audit-shareholders-cartoon-characters_335657-2986.jpg?t=st=1675877235~exp=1675877835~hmac=3022e22d88c837fd85f82022b35ff965d4ccdc3b3241aaecc448e194dfd76f36" alt="...">
                                        </div>
                                    <p> G-stock est conçue pour être facile à utiliser et intuitive, de manière à permettre aux utilisateurs de gérer rapidement et efficacement leurs stocks, d'optimiser leurs niveaux de stock et d'améliorer la satisfaction des clients.</p>
</p>
                                  
                                </div>
                            </div>

                      

                
@endsection