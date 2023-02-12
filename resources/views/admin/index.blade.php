@extends('layouts.app')

@section('styles')

<style>
body{
    background-color: rgb(55, 55, 94);
}
</style>
@endsection


@section('content')


<div class="container">

    <div class="row mt-5">

        <div class="col-sm-6 mt-5">

            <div class="list-group">
                <p class=" list-group-item list-group-item-action text-white" style="background-color: rgb(47, 125, 235)"><b>Manage Articles</b></p>
                <a href="{{ route('admin.show_categories', ['type' => 'accepted']) }}"style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                    Accepted articles
                    <span class="badge bg-primary rounded-pill">{{$accepted_articles}}</span>
                </a>

                <a href="{{ route('admin.show_categories', ['type' => 'unaccepted']) }}"style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                    Unaccepted articles
                    <span class="badge bg-primary rounded-pill">{{$unaccepted_articles}}</span>
                </a>
                <a href="{{route('admin.show_list_articles', ['type' => 'all' , 'category' => 'all']) }}"style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                    Newest articles
                    <span class="badge bg-primary rounded-pill">{{$unaccepted_articles + $accepted_articles}}</span>
                </a>
                <a href="{{route('admin.show_comments') }}"style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-info d-flex justify-content-between align-items-center">
                    Manage comments
                    <span class="badge bg-primary rounded-pill">{{$comments}}</span>
                </a>
            </div>
        </div>
        <div class="col-sm-6 mt-5">

            <div class="list-group">
                <p class=" list-group-item list-group-item-action text-white" style="background-color: rgb(228, 205, 31)"><b>Manage Writers</b></p>
                <a href="{{route('admin.show_users_list', ['status'=>'active'])}}" style="border:none; font-size: 18px"class="list-group-item list-group-item-action list-group-item-warning d-flex justify-content-between align-items-center">
                    Active writers
                    <span class="badge bg-secondary rounded-pill">{{$active_users}}</span>

                </a>
                <a href="{{route('admin.show_users_list', ['status'=>'inactive'])}}" style="border:none; font-size: 18px" class="list-group-item list-group-item-action list-group-item-warning d-flex justify-content-between align-items-center">
                    Inactive writers
                    <span class="badge bg-secondary rounded-pill">{{$inactive_users}}</span>

                </a>

            </div>
        </div>
    </div>


</div>
@endsection
