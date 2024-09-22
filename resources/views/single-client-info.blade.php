@extends('layout.master')

@section('single-client-information')
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ ('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Client's Profile</li>
        </ol>
    </nav>



    <div class="row">
        <div class="col-md-3">
            <img src="/images/{{ $singleClientInfo->client_photo }}" alt="{{ $singleClientInfo->name }}" class="img-fluid" onerror="this.onerror=null;this.src='https://picsum.photos/id/5/550/550';">
        </div>
        <div class="col-md-9">

            <div class="d-flex flex-column">

                <p class="pb-2 border-bottom border-grey"> Name : <span class="fw-bold text-uppercase"> {{ $singleClientInfo->name }} </span>
                </p>
                <p class="pb-2 border-bottom border-grey"> Phone : <span> <a href="tel:01915344418">{{ $singleClientInfo->phone }}</a> </span>
                </p>
                <p class="pb-2 border-bottom border-grey"> Email : <span> <a href="mailto:{{ $singleClientInfo->email }}">
                    {{ $singleClientInfo->email }} </a> </span> </p>
                <p class="pb-2 border-bottom border-grey"> Gender : <span>  @if ($singleClientInfo->gender == 1) Male @else Female @endif  </span> </p>
                <p class="pb-2 border-bottom border-grey"> Address : <span> {{ $singleClientInfo->address}} </span> </p>
                <p class="pb-2 border-bottom border-grey"> Facebook Review : <span> @if ($singleClientInfo->facebook_review == 1) Yes @else No @endif </span> </p>
                <p class="pb-2 border-bottom border-grey"> Google Review : <span>  @if ($singleClientInfo->google_review == 1) Yes @else No @endif </span> </p>
                <p class="pb-2 border-bottom border-grey"> Services : <span> {{ $singleClientInfo->service }} </span> </p>
                <p class="pb-2 border-bottom border-grey"> Page Number : <span> {{ $singleClientInfo->page_number }} </span> </p>

                <div class="border-bottom border-grey">
                    <div class="dropdown">
                        Action :
                        <button class="btn" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item" href="{{ route('edit-single-data',  $singleClientInfo->id) }}">Edit</a></li>
                            <li><a onclick="return confirm('Are you sure you want to delete this item?')" class="dropdown-item" href="{{ route('delete-single-data', $singleClientInfo->id) }}">Delete</a></li>
                        </ul>
                    </div>
                </div>




            </div>
        </div>
    </div>
@endsection
