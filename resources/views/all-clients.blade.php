@extends('layout.master')

@section('all-clients')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ '/' }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">All Clients</li>
        </ol>
    </nav>


    <table id="table_id" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>FB Review</th>
                <th>Google Review</th>
                <th>Services</th>
                <th>Page No.</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($allClientsCollection as $allClientsItem)
                <tr>
                    <td> {{ $allClientsItem->id }} </td>
                    <td class="d-flex justify-content-between client-photo">
                        <img src="/images/{{ $allClientsItem->client_photo }}" alt="{{ $allClientsItem->name }}"
                            class="rounded-circle me-md-2 me-1 img-fluid" onerror="this.onerror=null;this.src='https://picsum.photos/id/5/50/50';"/>
                        {{ $allClientsItem->name }}
                    </td>
                    <td>{{ $allClientsItem->phone }}</td>
                    <td> {{ $allClientsItem->email }} </td>
                    <td>
                        @if ($allClientsItem->gender == 1) Male @else Female @endif
                    </td>
                    <td>
                        {{ $allClientsItem->address }}
                    </td>
                    <td>
                        @if ($allClientsItem->facebook_review == 1)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    <td>
                        @if ($allClientsItem->google_review == 1)
                            Yes
                        @else
                            No
                        @endif
                    </td>
                    <td> {{ $allClientsItem->service }} </td>
                    <td> <a href="{{ route('show-single-data', $allClientsItem->id ) }}" class="text-dark"> {{ $allClientsItem->page_number }} </a> </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="{{ route('show-single-data', $allClientsItem->id ) }}">View</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>

        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Address</th>
                <th>FB Review</th>
                <th>G Review</th>
                <th>Services</th>
                <th>Page No.</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
@endsection
