@extends('layout.master')

@section('single-client-information')
    <nav aria-label="breadcrumb">

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Client's Profile</li>
        </ol>
    </nav>


    <div class="row mb-md-4 mb-2">
        <div class="col-md-3">
            <img src="/images/{{ $singleClientInfo->client_photo }}" alt="{{ $singleClientInfo->name }}" class="img-fluid"
                onerror="this.onerror=null;this.src='https://picsum.photos/id/5/550/550';">
        </div>
        <div class="col-md-3 border-end border-wnd">

            <div class="d-flex flex-column">

                <p class="pb-2 border-bottom border-grey"> Name : <span class="fw-bold text-uppercase">
                        {{ $singleClientInfo->name }} </span>
                </p>
                <p class="pb-2 border-bottom border-grey"> Phone : <span> <a
                            href="tel:01915344418">{{ $singleClientInfo->phone }}</a> </span>
                </p>
                <p class="pb-2 border-bottom border-grey"> Email : <span> <a href="mailto:{{ $singleClientInfo->email }}">
                            {{ $singleClientInfo->email }} </a> </span> </p>
                <p class="pb-2 border-bottom border-grey"> Gender : <span>
                        @if ($singleClientInfo->gender == 1)
                            Male
                        @else
                            Female
                        @endif
                    </span> </p>
                <p class="pb-2 border-bottom border-grey"> Address : <span> {{ $singleClientInfo->address }} </span> </p>
                <p class="pb-2 border-bottom border-grey"> Facebook Review : <span>
                        @if ($singleClientInfo->facebook_review == 1)
                            Yes
                        @else
                            No
                        @endif
                    </span> </p>
                <p class="pb-2 border-bottom border-grey"> Google Review : <span>
                        @if ($singleClientInfo->google_review == 1)
                            Yes
                        @else
                            No
                        @endif
                    </span> </p>
                <p class="pb-2 border-bottom border-grey"> Services : <span> {{ $singleClientInfo->service }} </span> </p>
                <p class="pb-2 border-bottom border-grey"> Page Number : <span> {{ $singleClientInfo->page_number }} </span>
                </p>

                <div class="border-bottom border-grey">
                    <div class="dropdown">
                        Action :
                        <button class="btn" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <li><a class="dropdown-item"
                                    href="{{ route('edit-single-data', $singleClientInfo->id) }}">Edit</a></li>
                            <li><a onclick="return confirm('Are you sure you want to delete this item?')"
                                    class="dropdown-item"
                                    href="{{ route('delete-single-data', $singleClientInfo->id) }}">Delete</a></li>
                        </ul>
                    </div>
                </div>




            </div>
        </div>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <th> Service's Name </th>
                    <th> Domain Provider </th>
                    <th> Date </th>
                    <th class="text-end"> Hosting Size </th>
                    <th> Hosting Provider </th>
                    <th> Reg. Date </th>
                    <th> Remark </th>
                    
                </thead>

                <tbody>
                    @foreach ($singleClientInfo->services as $serviceItem)
                        <tr>
                            <td>{{ $serviceItem->service_name }}</td>
                            <td>{{ $serviceItem->domain_provider }}</td>
                            <td>{{ $serviceItem->domain_registration_date }}</td>
                            <td>{{ $serviceItem->hosting_provider }}</td>
                            <td>{{ $serviceItem->hosting_registration_date }}</td>
                            <td>{{ $serviceItem->hosting_size }} GB</td>
                            <td>{{ $serviceItem->remark }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <form action="{{ route('service') }}" method="POST">
                @csrf


                <div class="row bg-light p-2">

                    <input type="hidden" name="client_id" value="{{ $singleClientInfo->id }}">
                    <div class="col-md-4 col-6">
                        <label for="serviceName" class="mb-md-2 mb-1"> Service's Name </label>
                        <input type="text" class="form-control mb-md-3 mb-2" name="service_name" id="serviceName"
                            value="{{ old('service_name') }}">

                        @if ($errors->has('service_name'))
                            <span class="text-danger"> {{ $errors->first('service_name') }} </span>
                        @endif

                    </div>


                    <div class="col-md-4 col-6">
                        <label for="domainProvider" class="mb-md-2 mb-1"> Domain Provider </label>
                        <input type="text" class="form-control mb-md-3 mb-2" name="domain_provider" id="domainProvider"
                            value="{{ old('domain_provider') }}">
                    </div>

                    <div class="col-md-4 col-6">

                        <label for="domainRegistrationDate" class="mb-md-2 mb-1"> Domain Registration Date </label>
                        <input type="date" class="form-control mb-md-3 mb-2" name="domain_registration_date"
                            id="domainRegistrationDate" value="{{ old('domain_registration_date') }}">
                    </div>

                    <div class="col-md-4 col-6">

                        <label for="hostingProvider" class="mb-md-2 mb-1"> hosting Provider </label>
                        <input type="text" class="form-control mb-md-3 mb-2" name="hosting_provider" id="hostingProvider"
                            value="{{ old('hosting_provider') }}">
                    </div>

                    <div class="col-md-4 col-6">

                        <label for="hostingRegistrationDate" class="mb-md-2 mb-1"> Hosting Registration Date </label>
                        <input type="date" class="form-control mb-md-3 mb-2" name="hosting_registration_date"
                            id="hostingRegistrationDate" value="{{ old('hosting_registration_date') }}">
                    </div>

                    <div class="col-md-4 col-6">
                        <label for="hostingsize" class="mb-md-2 mb-1"> hosting size </label>
                        <input type="number" class="form-control mb-md-3 mb-2" name="hosting_size" id="hostingsize"
                            value="{{ old('hosting_size') }}">
                    </div>


                    <div class="col-md-4 col-6">

                        <label for="remark" class="mb-md-2 mb-1"> Remark </label>
                        <input type="text" class="form-control mb-md-3 mb-2" name="remark" id="remark"
                            value="{{ old('remark') }}">

                    </div>
                    <div class="col-md-4 col-6 d-flex align-items-center">
                        <button type="submit" class="btn btn-success"> Submit </button>
                    </div>

                </div>

            </form>
        </div>
    </div>
@endsection
