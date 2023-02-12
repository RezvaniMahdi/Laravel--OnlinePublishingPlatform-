@extends('layouts.app')

@section('scripts')
<script>

    $(document).ready(function(){

    $(".delete-button-comment").click(function(){
        var id = $(this).attr("data-id");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = {
                         content: id,
                          };
        $.ajax({
            url: "{{route('admin.delete_comment')}}",
            type: "POST",
            data: formData,
            dataType: 'json',
            success: function(response) {

                var card_id = "#" + id;
                $(card_id).remove();
            }
        });
    });
});
</script>

@endsection







@section('styles')
<style>
.delete-button-comment{
    width: 80px;
}

</style>
@endsection




@section('content')


<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-sm-8 mt-5">
            <p class="text-primary"><b>Newest Comments</b> <span class="badge bg-primary">{{ count($comments) }}</span></p>
            <br>
            <br>
            @foreach ($comments as $comment)

                <div class="card" style="border: none" id="{{$comment->id}}">
                    <div class="card-header row text-white" style="background-color:rgb(47, 125, 235);color:white" >
                        <div class="col-sm-10">
                            {{ $comment->user->name }}

                        </div>
                        <div class="col-sm-2">

                            <button data-id="{{$comment->id}}" class="btn btn-danger float-end delete-button-comment">delete</button>


                        </div>                    </div>
                    <div class="card-body mt-4 mb-5">
                        <p style="text-align: left">{{ $comment->body}}</p>
                        <br>
                        <p class="opacity-50">created at :{{$comment->created_at}}</p>
                    </div>

                </div>

            @endforeach

            {{$comments->onEachSide(2)->links('vendor.pagination.bootstrap-5')}}

        </div>

    </div>
</div>
@endsection
