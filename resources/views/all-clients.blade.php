@extends('layout.master')

@section('all-clients')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Clients</li>
        </ol>
    </nav>


    @if (session('success'))
        <h1 class="text-danger pb-md-3 pb-1"> {{ session('success') }} </h1>
    @endif


    <table id="table_id" class="display table table-striped" style="width: 100%">

        <thead>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>FB Review</th>
                <th>Google Review</th>
                <th>Page No.</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($allClientsCollection as $allClientsItem)
                <tr>
                    <td> {{ $allClientsItem->id }} </td>
                    <td class="client-photo">
                        <img src="/images/{{ $allClientsItem->client_photo }}" alt="{{ $allClientsItem->name }}"
                            class="rounded-circle me-md-2 me-1 img-fluid"
                            onerror="this.onerror=null;this.src='https://picsum.photos/id/5/50/50';" />
                    </td>
                    <td>
                        {{ $allClientsItem->name }}
                    </td>
                    <td>{{ $allClientsItem->phone }}</td>
                    <td> {{ $allClientsItem->email }} </td>

                    <td>
                        @if ($allClientsItem->facebook_review == 1)
                            Yes
                        @else
                            <span class="text-danger fw-bold"> No </span>
                        @endif
                    </td>
                    <td>
                        @if ($allClientsItem->google_review == 1)
                            Yes
                        @else
                            <span class="text-danger fw-bold"> No </span>
                        @endif
                    </td>
                    <td> <a href="{{ route('show-single-data', $allClientsItem->id) }}" class="text-dark">
                            {{ $allClientsItem->page_number }} </a> </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item"
                                        href="{{ route('show-single-data', $allClientsItem->id) }}">View</a>
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ route('edit-single-data', $allClientsItem->id) }}">Edit</a></li>
                                <li><a onclick="return confirm('Are you sure you want to delete this item?')"
                                        class="dropdown-item"
                                        href="{{ route('delete-single-data', $allClientsItem->id) }}">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>

        <tfoot>
            <tr>
                <th>#</th>
                <th>Photo</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>


                <th>FB Review</th>
                <th>G Review</th>

                <th>Page No.</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
@endsection
