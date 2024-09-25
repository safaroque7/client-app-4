@extends('layout.master')

@section('all-post-for-design')
    <div class="row">

        <div class="col-md-8 col-12 col-2 mb-md-4 mb-3 position-relative image-and-title-hover">
            <div class="overflow-hidden">
                <img src="/images/{{ $singlePost->image }}" alt="{{ $singlePost->news_title }}"
                    class="img-fluid mb-md-2 mb-1 overflow-hidden transition"
                    onerror="this.onerror=null;this.src='https://picsum.photos/id/{{ $singlePost->id + 10 }}/500/350';">
            </div>
            <h1> {{ $singlePost->news_title }} </h1>
            <p class="text-justify"> {{ $singlePost->news_body }} </p>
        </div>

        <div class="col-md-4 col-12">
            <h4 class="border-bottom border-secondary"> আরও খবর </h4>

            @foreach ($allPostForCollectionMore as $allPostForMoreitem)

                <div class="row d-flex align-items-center pb-md-4 pb-1 mb-md-4 mb-1 border-bottom border-secondary">
                    <div class="col-4">
                        <img src="/images/{{ $allPostForMoreitem->image }}" alt="{{ $allPostForMoreitem->news_title }}" class="img-fluid" onerror="this.onerror=null;this.src='/images/">
                    </div>
                    <div class="col-8">
                        <h5> <a href="{{ route('single-post',  $allPostForMoreitem->id) }}"> {{ $allPostForMoreitem->news_title }} </a> </h5>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
@endsection
