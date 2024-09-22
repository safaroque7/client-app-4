@extends('layout.master')
@section('welcome')
    <div class="row">

        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light rounded-3 border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> Total Clients </h4>
                <h1> <a href="{{ ('all-clients') }}" class="text-decoration-none text-dark"> {{ $totalClient }} </a> </h1>

            </div>
        </div>


        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light rounded-3 border border-success">
                <h4 class="text-white bg-success py-2 rounded-top"> Active Clients </h4>
                <h1> <a href="#" class="text-decoration-none text-dark"> 100 </a> </h1>

            </div>
        </div>


        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light rounded-3 border border-danger">
                <h4 class="text-white bg-danger py-2 rounded-top"> Inactive Clients </h4>
                <h1> <a href="#" class="text-decoration-none text-dark"> 00 </a> </h1>

            </div>
        </div>


        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> Linkon Domains </h4>
                <h1> <a href="#" class="text-decoration-none text-dark">00</a>
                </h1>
            </div>
        </div>


        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> Linkon Hosting </h4>
                <h1> <a href="#" class="text-decoration-none text-dark">
                        00 GB </a>
                </h1>
            </div>
        </div>


        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> Linkon Hosting BDiX </h4>
                <h1> <a href="#" class="text-decoration-none text-dark"> 00GB </a>
                </h1>
            </div>
        </div>


        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> Adil Domains </h4>
                <h1> <a href="#" class="text-decoration-none text-dark"> 00 </a>
                </h1>
            </div>
        </div>


        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> Adil Hostings </h4>
                <h1> <a href="#" class="text-decoration-none text-dark"> 00GB </a>
                </h1>
            </div>
        </div>


        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light rounded-3 border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> All Emails </h4>
                <h1> <a href="#" class="text-decoration-none text-dark"> 00 </a>
                </h1>
            </div>
        </div>



        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light rounded-3 border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> All Phone Numbers </h4>
                <h1> <a href="#" class="text-decoration-none text-dark"> 00 </a>
                </h1>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-md-4 mb-2 text-center">
            <div class="bg-light border border-secondary">
                <h4 class="text-white bg-secondary py-2 rounded-top"> Total Hosting Size </h4>
                <h1> <a href="#" class="text-decoration-none text-dark">00GB </a>
                </h1>
            </div>
        </div>

    </div>
@endsection
