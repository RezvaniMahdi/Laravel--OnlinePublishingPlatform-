@extends('layouts.app')

@section('styles')
<style>
#flo{
    text-align: center;
}
@media screen and (max-width: 576px) {
        #flo{
            text-align: left;
        }

}
</style>
@endsection
@section('content')


<div class="container">

    <div class="row justify-content-center mt-5">

        <div class="col-sm-8 mt-5">
            <p id="div-bestWriters" class="text-primary"><b>{{$type}}</b></p>
            <br>
            <br>
            @foreach ($bestWriters as $writer)
            <a style="text-decoration: none;color:black" href="{{ route('user.dashbord', ['user'=> $writer->id]) }}">
                <div class="card" style="border: none">
                    <div class="card-header" style="background-color:rgb(47, 125, 235);color:white" >
                        <div class="row">
                            <div class="col-sm-6">
                                <h6 style="text-align: left">{{ $writer->name }}</h6>

                            </div>
                            <div class="col-sm-6">
                                <h6 id="flo">Followers : {{$writer->num_followers}}</h6>

                            </div>
                        </div>

                    </div>
                    <div class="card-body mt-4 mb-5">
                        <p style="text-align: left">email address :{{ $writer->email}}</p>
                        <br>
                        <p style="text-align: left">{{ $writer->biography}}</p>

                    </div>
                </div>
            </a>

            @endforeach

            {{$bestWriters->fragment('div-bestWriters')->onEachSide(2)->links('vendor.pagination.bootstrap-5')}}

        </div>

    </div>
</div>
@endsection
