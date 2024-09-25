@extends('layout.master')

@section('add-new-post')
    @if (session('success'))
        <h2 class="text-success mb-md-3 mb-1"> {{ session('success') }} </h2>
    @endif

    <form action="{{ route('store-new-post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-9">
                {{-- News Title --}}
                <label for="news-title" class="form-label"> Title </label>
                <input type="text" name="news_title" id="news-title" value="{{ old('news_title') }}"
                    class="form-control mb-md-3 mb-1 @if ($errors->has('news_title')) {{ 'border-danger' }} @endif">


                @if ($errors->has('news_title'))
                    <p class="text-danger d-block mb-md-4 mb-1"> {{ $errors->first('news_title') }} </p>
                @endif

                {{-- Reporter's Name --}}
                <label for="reporter-name" class="form-label"> Reporter's Name </label>
                <input type="text" value="{{ old('reporter_name') }}" name="reporter_name"  id="reporter-name" class="form-control mb-md-3 mb-1">

                {{-- News Body --}}
                <label for="news-body" class="form-label"> Reporter's Name </label>
                <textarea name="news_body" id="news_body" cols="30" rows="10" class="form-control mb-md-3 mb-1">
{{ old('news_body') }}
                </textarea>
            </div>

            <div class="col-md-3">

                <label for="image" class="form-label"> Upload Photo </label>
                <input type="file" name="image" id="image" class="form-control mb-md-3 mb-1">

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-dark me-md-2"> Publish </button>
                    <button type="submit" class="btn btn-danger"> Reset </button>
                </div>

            </div>
        </div>
    </form>
@endsection
