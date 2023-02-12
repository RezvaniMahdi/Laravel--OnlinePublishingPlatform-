@extends('layouts.app')

@section('scripts')
<script>
function auto_grow(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight)+"px";
}
</script>

@endsection

@section('content')

    <div class="container">
        @include('sections.error')
        <button class="btn btn-primary mt-5" href="{{ route('user.store_myarticle') }}"
            onclick="event.preventDefault();
                            document.getElementById('article-form').submit();">
             Publish article
        </button>


        <form id="article-form" action="{{ route('user.store_myarticle')}}" method="POST">
            @csrf
            <label class="mt-5" for="category">Category</label>
            <select class="form-select mt-3" id="category" name="category">
                <option id="science" value="science">science</option>
                <option id="history" value="history">history</option>
                <option id="technology" value="technology">technology</option>
                <option id="physics" value="physics">physics</option>
                <option id="sport" value="sport">sport</option>
                <option id="other" value="other" selected>other</option>

            </select>
            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="title" name="title" placeholder="Title of article" class="form-control mt-5">{{ old('title') }}</textarea>
            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)"  id="introducton" name="introduction" placeholder="Introduction of article" class="form-control mt-5" >{{ old('introduction') }}</textarea>
            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="body" name="body" placeholder="Body of article" class="form-control mt-5">{{ old('body') }}</textarea>
            <textarea style="border:none;overflow:hidden;resize:none" oninput="auto_grow(this)" id="result" name="result" placeholder="Result of article" class="form-control mt-5">{{ old('result') }}</textarea>
        </form>
    </div>
@endsection
