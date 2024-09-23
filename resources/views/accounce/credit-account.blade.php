@extends('layout.master')

@section('credit-account')
    <form action="{{ route('store-credit') }}" method="POST">
        @csrf

        <div class="row mb-md-3 mb-2">
            <div class="col-md-6">
                <!-- Date of Birth start -->
                <label for="creditDate" class="form-label border-secondary d-block"> Credite Date </label>
                <input type="date" name="credit_date" value="{{ old('dob') }}" id="creditDate" class="form-control mb-md-3 mb-1" />

                @if ($errors->has('credit_date'))
                    <span class="text-danger"> {{ $errors->first('credit_date') }} </span>
                @endif


                <label for="credit" class="form-label"> Credit Amount </label>
                <input type="number" name="credit" value="{{ old('phone') }}"
                    class="form-control border-@if ($errors->has('phone')) {{ 'danger' }} @endif"
                    id="credit" />

                @if ($errors->has('credit'))
                    <span class="text-danger"> {{ $errors->first('credit') }} </span>
                @endif

                <div class="d-flex justify-content-end mt-md-3 mt-1">
                    <button type="submit" class="btn btn-primary me-md-2">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>

            </div>
        </div>




    </form>
@endsection
