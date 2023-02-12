@extends('layouts.app')

@section('scripts')
<script>
    function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight)+"px";
    }

    $(document).ready(function(){
    var second = "";
    var third = "";
    var furth = "";
    var fifth = "";
    var sixth = "";
    switch("{{ $article->category }}") {
        case "science":
            second = "history";
            third = "technology";
            furth = "physics";
            fifth = "sport";
            sixth = "other";
            break;
        case "history":
            second = "science";
            third = "technology";
            furth = "physics";
            fifth = "sport";
            sixth = "other";
          break;
        case "technology":
            second = "science";
            third = "history";
            furth = "physics";
            fifth = "sport";
            sixth = "other";
          break;
          case "physics":
            second = "science";
            third = "history";
            furth = "technology";
            fifth = "sport";
            sixth = "other";
            break;
        case "sport":
            second = "science";
            third = "history";
            furth = "technology";
            fifth = "physics";
            sixth = "other";
          break;
        case "other":
            second = "science";
            third = "history";
            furth = "technology";
            fifth = "physics";
            sixth = "sport";
          break;
      }
    $("#first_option").text("{{ $article->category }}");
    $("#first_option").val("{{ $article->category }}");
    $("#second_option").text(second);
    $("#second_option").val(second);
    $("#third_option").text(third);
    $("#third_option").val(third);
    $("#furth_option").text(furth);
    $("#furth_option").val(furth);
    $("#fifth_option").text(fifth);
    $("#fifth_option").val(fifth);
    $("#sixth_option").text(sixth);
    $("#sixth_option").val(sixth);
});
    </script>

@endsection

@section('content')

<div class="container">
    @include('sections.error')
    <button class="btn btn-primary mt-5" href="{{ route('user.update_myarticle', ['article'=> $article->id]) }}"
        onclick="event.preventDefault();
                        document.getElementById('article-form').submit();">
         Publish
    </button>


    <form id="article-form" action="{{ route('user.update_myarticle', ['article' => $article->id])}}" method="POST">
        @csrf
        @method('put')
        <label class="mt-3" for="category"><b>Category</b></label>
        <select class="form-select mt-3" style="color:white;background-color:rgb(123, 146, 252)" id="category" name="category">
            <option id="first_option" value="" selected></option>
            <option id="second_option" value=""></option>
            <option id="third_option" value=""></option>
            <option id="furth_option" value=""></option>
            <option id="fifth_option" value=""></option>
            <option id="sixth_option" value="" ></option>

        </select>
        <label class="mt-3" for="title"><b>Title</b></label>
        <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="title" name="title" placeholder="Title of article" class="form-control mt-2">{{ $article->title }}</textarea>
        <label class="mt-3" for="introduction"><b>introduction</b></label>
        <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)"  id="introducton" name="introduction" placeholder="Introduction of article" class="form-control mt-2" >{{ $article->introduction }}</textarea>
        <label class="mt-3" for="body"><b>Body</b></label>
        <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="body" name="body" placeholder="Body of article" class="form-control mt-2">{{ $article->body }}</textarea>
        <label class="mt-3" for="result"><b>Result</b></label>
        <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="result" name="result" placeholder="Result of article" class="form-control mt-2">{{ $article->result }}</textarea>
    </form>
</div>
@endsection
