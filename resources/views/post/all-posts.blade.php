@extends('layout.master')

@section('all-posts')
    <table class="table">
        <thead>
            <th> SL </th>
            <th> Image </th>
            <th> News Title </th>
        </thead>
        <tbody>
            @foreach ($allPostCollection as $allPostItem)
                <tr>
                    <td style=width:80px;> {{ $allPostItem->id }} </td>
                    <td style=width:100px;> <img class="img-fluid" src="images/{{ $allPostItem->image }}" alt="{{ $allPostItem->news_title }}" onerror="this.onerror=null;this.src='https://picsum.photos/id/{{ $allPostItem->id + 10 }}/100/75';"> </td>
                    <td> {{ $allPostItem->news_title }} </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
