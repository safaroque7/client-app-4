@extends('layout.master')

@section('all-post-for-design')
    <div class="row">
        @foreach ($allPostForDesignCollection as $allPostForDesignItem)
            <div class="col-md-3 col-2 mb-md-4 mb-3 position-relative image-and-title-hover">
                <div class="overflow-hidden">
                    <img src="images/{{ $allPostForDesignItem->image }}" alt="{{ $allPostForDesignItem->news_title }}"
                        class="img-fluid mb-md-2 mb-1 overflow-hidden transition"
                        onerror="this.onerror=null;this.src='https://picsum.photos/id/{{ $allPostForDesignItem->id + 10 }}/500/350';">
                </div>
                <h4> <a class="text-decoration-none text-dark streached-link" href="{{ route('single-post', $allPostForDesignItem->id ) }}"> {{ $allPostForDesignItem->news_title }} </a>
                </h4>
            </div>
        @endforeach
    </div>
@endsection
