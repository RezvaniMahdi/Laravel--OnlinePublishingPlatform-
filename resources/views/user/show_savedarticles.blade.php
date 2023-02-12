@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center ">
            <div id="div-articles" class="col-sm-8 mt-5" >
                    <h4 class="mb-5">Saved Articles</h4>

                    @foreach ($articles as $article)
                    <a style="text-decoration: none;color:black" href="{{ route('user.show_article', ['article'=> $article->id]) }}">
                        <div class="card" style="border: none">
                            <div class="card-header" style="background-color:rgb(47, 125, 235);color:white" >
                                <h6>{{ $article->title }}</h6>
                            </div>
                            <div class="card-body mt-4 mb-3">
                                <p>{{ $article->introduction}}</p>
                            </div>
                        </div>
                    </a>
                    <form action=" {{ route('user.delete_savedarticle', ['article' => $article->id]) }} " method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger mb-5"><i class="fa fa-trash"></i> Remove from list</button>
                    </form>
                    @endforeach
                    {{$articles->onEachSide(2)->links('vendor.pagination.bootstrap-5')}}


        </div>
    </div>
@endsection
