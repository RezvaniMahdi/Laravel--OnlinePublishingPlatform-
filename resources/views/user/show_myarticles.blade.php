@extends('layouts.app')

@section('scripts')
<script>

</script>

@endsection

@section('content')
    <div class="container">

        <div class="row justify-content-center ">
            <div class="col-sm-8 mt-5" >
                <div class="row mb-2">
                    <div class="col-sm-9">
                        <h4>My Articles</h4>
                    </div>
                    <div class="col-sm-3">
                        <a href="{{ route('user.create_article') }}" class="btn btn-primary">Create New Article</a>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" style="background-color:rgb(47, 125, 235);color:white">Articles</div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($articles as $article)

                                <li class="list-group-item">
                                    {{$article->title}}
                                    <form action=" {{ route('user.delete_myarticle', ['id' => $article->id]) }} " method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger float-end"><i class="fa fa-trash"></i> Trash</button>
                                    </form>
                                    <a class="btn btn-primary float-end" href="{{ route('user.edit_myarticle', ['article'=> $article->id]) }}" style="margin-right: 2%"><i class="fa fa-edit"></i>edit</a>

                                </li>



                            @endforeach
                        </ul>
                        {{$articles->onEachSide(2)->links('vendor.pagination.bootstrap-5')}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
