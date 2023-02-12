@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-sm-8 mt-5">
            <p id="div-articles" class="text-primary"><b>{{$type}}</b></p>
            <br>
            <br>
            @foreach ($articles as $article)
            <a style="text-decoration: none;color:black" href="{{ route('user.show_article', ['article'=> $article->id]) }}">
                <div class="card" style="border: none">
                    <div class="card-header" style="background-color:rgb(47, 125, 235);color:white" >
                        <h6 style="text-align: left">{{ $article->title }}</h6>
                    </div>
                    <div class="card-body mt-4 mb-5">
                        <p style="text-align: left">{{ $article->introduction}}</p>
                        <br>
                        <p class="opacity-50">created at :{{$article->created_at}}</p>

                    </div>
                </div>
            </a>

            @endforeach

            {{$articles->fragment('div-articles')->onEachSide(2)->links('vendor.pagination.bootstrap-5')}}

        </div>

    </div>
</div>
@endsection
