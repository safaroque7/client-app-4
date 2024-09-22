@extends('layout.master')
@section('add-new-client')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add New Client</li>
        </ol>
    </nav>

    @if (session('success'))
         <h1 class="text-success pb-md-3 pb-1"> {{ session('success') }} </h1>
    @endif

    <form action="{{ route('update-single-data', $editSingleData->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row mb-md-3 mb-2">
            <div class="col-md-6">
                <label for="name" class="form-label"> Name </label>
                <input type="text" name="name" value="{{ $editSingleData->name }}" class="form-control border-@if($errors->has('name')){{'danger'}}@endif" id ="name">

                @if ($errors->has('name'))
                    <span class="text-danger"> {{ $errors->first('name') }} </span>
                @endif

            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label"> Phone </label>
                <input type="text" name="phone" value="{{ $editSingleData->phone }}" class="form-control border-@if($errors->has('phone')){{'danger'}}@endif" id="phone" />

                @if ($errors->has('phone'))
                    <span class="text-danger"> {{ $errors->first('phone') }} </span>
                @endif

            </div>
        </div>

        <div class="row mb-md-3 mb-2">
            <div class="col-md-4">
                <label for="email" class="form-label"> Email </label>
                <input type="email" name="email" value="{{ $editSingleData->email }}" class="form-control border-@if($errors->has('email')){{'danger'}}@endif" id="email"/>
                @if ($errors->has('email'))
                <span class="text-danger"> {{ $errors->first('email') }} </span>
            @endif
            </div>

            <div class="col-md-2">
                <label class="form-label border-bottom-custom-color-1 d-block"> Gender </label>

                <input class="form-check-input" type="radio" name="gender" id="male" value="1" @if($editSingleData->gender == 1) checked @endif />
                <label class="form-check-label me-md-2 me-1" for="male"> Male </label>

                <input class="form-check-input" type="radio" name="gender" id="female" value="0" @if($editSingleData->gender == 0) checked @endif/>
                <label class="form-check-label" for="female" > Female </label>
            </div>

            <div class="col-md-6">
                <label for="address" class="form-label"> Address </label>
                <input type="text" name="address" value="{{ $editSingleData->address }}" class="form-control" id="address"/>
            </div>
        </div>

        <div class="row mb-md-4 mb-3">
            <div class="col-md-2">
                <label for="facebook-review" class="form-label"> Facebook Review </label>
                <select name="facebook_review" class="form-select">
                    <option @if($editSingleData->facebook_review == 1) Selected @endif value="1">Yes</option>
                    <option @if($editSingleData->facebook_review == 0) Selected @endif value="0">No</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="google-review" class="form-label"> Gogole Review </label>
                <select name="google_review" class="form-select">
                    <option @if($editSingleData->google_review == 1) Selected @endif value="1">Yes</option>
                    <option  @if($editSingleData->google_review == 0) Selected @endif value="0">No</option>
                </select>
            </div>

            <div class="col-md-2">
                <label for="pageNumber" class="form-label"> Page Number </label>
                <input type="text" name="page_number" value="{{ $editSingleData->page_number }}" class="form-control" id="pageNumber"/>
            </div>

            <div class="col-md-6">
                <label for="selectPhoto" class="form-label border-secondary d-block"> Upload Photo </label>
                <input type="file" name="client_photo" id="selectPhoto" class="form-control mb-md-3 mb-1" />
                @if(!empty($editSingleData->client_photo)) 
                    <img src="/images/{{ $editSingleData->client_photo }}" alt="{{ $editSingleData->name }}" class="img-fluid">
                @endif
            </div>
        </div>

        <div class="row mb-md-4 mb-3">
            <div class="col-md-4">
                <label for="select-service"
                    class="form-label border-secondary d-block pb-md-2 pb-1 border-bottom-custom-color-1">
                    Select Services
                </label>

                <!-- checkbox item -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="service[]" id="checkbox1" value="Online News Portal" />
                    <label class="form-check-label" for="checkbox1">
                        Online News Portal
                    </label>
                </div>

                <!-- checkbox item -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="service[]" id="checkbox2" value="Official website" />
                    <label class="form-check-label" for="checkbox2">
                        Official website
                    </label>
                </div>

                <!-- checkbox item -->
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="service[]" id="checkbox3" value="Scholl/College/University website" />
                    <label class="form-check-label" for="checkbox3">
                        Scholl/College/University website
                    </label>
                </div>

                <!-- checkbox item -->
                <div class="form-check mb-md-3 mb-2">
                    <input type="checkbox" class="form-check-input" name="service[]" id="checkbox4" value="Personal Website" />
                    <label class="form-check-label" for="checkbox3">
                        Personal Website
                    </label>
                </div>
            </div>

            <div class="col-md-2">
                <label for="status" class="form-label"> Status </label>
                <select name="status" id="" class="form-select d-inline" value="#">
                    <option  @if($editSingleData->status == 1) Selected @endif value="1">Active</option>
                    <option @if($editSingleData->status == 0) Selected @endif value="0">Inactive</option>
                </select>
            </div>

            <div class="col-md-6">
                <!-- Facebook Profile Link Start -->
                <label for="facebookProfileLink" class="form-label border-secondary d-block"> Facebook Profile Link </label>
                <input type="url" name="facebook_profile_link" value="{{ $editSingleData->facebook_profile_link }}" id="facebookProfileLink" class="form-control mb-md-3 mb-2" />

                <!-- Date of Birth start -->
                <label for="dateOfBirth" class="form-label border-secondary d-block"> Date of Birth </label>
                <input type="date" name="dob" value="{{ $editSingleData->dob }}" id="dateOfBirth" class="form-control" />
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-danger">Reset</button>
    </form>
@endsection
