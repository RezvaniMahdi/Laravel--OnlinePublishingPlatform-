@extends('layouts.app')

@section('scripts')
<script>
$(document).ready(function(){
    var second_g = "";
    var third_g = "";
    switch("{{ $user->gender }}") {
        case "other":
            second_g = "male";
            third_g = "female";
            break;
        case "male":
          second_g = "female";
          third_g = "other";
          break;
        case "female":
          second_g = "male";
          third_g = "other";
          break;
      }
    $("#first_gender").text("{{ $user->gender }}");
    $("#first_gender").val("{{ $user->gender }}");
    $("#second_gender").text(second_g);
    $("#second_gender").val(second_g);
    $("#third_gender").text(third_g);
    $("#third_gender").val(third_g);

    var user_status = "";
    switch("{{ $user->active }}") {
        case "yes":
            user_status = "no";
            break;
        case "no":
          user_status = "yes";
          break;
    }
    $("#first_option").text("{{ $user->active }}");
    $("#first_option").val("{{ $user->active }}");
    $("#second_option").text(user_status);
    $("#second_option").val(user_status);


    var user_type = "";
    switch("{{ $user->type }}") {
        case "user":
            user_type = "admin";
            break;
        case "admin":
          user_type = "user";
          break;
    }
    $("#first_chose").text("{{ $user->type }}");
    $("#first_chose").val("{{ $user->type }}");
    $("#second_chose").text(user_type);
    $("#second_chose").val(user_type);
});
</script>

@endsection

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center" style="background-color:rgb(47, 125, 235);color:white">
            <div class="col-sm-8">
                @include('sections.error')
                <div class="card" style="background-color:rgb(47, 125, 235);border:none;margin:10% 0% 0% 0%">
                    <div class="card-header" style="border:none"><h5>Edit Profile of {{$user->name}}</h5></div>
                    <div class="card-body">
                        <form action="{{ route('admin.store_profile', ['user' => $user->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group mt-3">
                                <label for="gender"><b>Active</b></label>
                                <select class="form-select" style="color:white;background-color:rgb(123, 146, 252)" id="active" name="active">
                                    <option id="first_option" value="" selected></option>
                                    <option id="second_option" value=""></option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="gender"><b>type</b></label>
                                <select class="form-select" style="color:white;background-color:rgb(123, 146, 252)" id="type" name="type">
                                    <option id="first_chose" value="" selected></option>
                                    <option id="second_chose" value=""></option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="name"><b>Name</b></label>
                                <input type="text" style="color:white;background-color:rgb(123, 146, 252)" id="name" name="name" class="form-control mt-3" value="{{ $user->name }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="biography"><b>Biography</b></label>
                                <textarea style="color:white;background-color:rgb(123, 146, 252)" id="biography" name="biography" placeholder="Introduce your self" class="form-control mt-3" value="{{ $user->biography }}"></textarea>
                            </div>
                            <div class="form-group mt-3">
                                <label for="email"><b>Email</b></label>
                                <input type="email" style="color:white;background-color:rgb(123, 146, 252)" id="email" name="email"  class="form-control mt-3" value="{{ $user->email }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="phone"><b>Phone Number</b></label>
                                <input type="tel" style="color:white;background-color:rgb(123, 146, 252)" id="phone" name="phone" placeholder="09******351" pattern="[0-9]{11}" class="form-control mt-3" value="{{ $user->phone_number }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="birth"><b>Birth Date</b></label>
                                <input type="date" style="color:white;background-color:rgb(123, 146, 252)" id="birth" name="birth" class="form-control mt-3" value="{{ $user->birth_date }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="gender"><b>Gender</b></label>
                                <select class="form-select" style="color:white;background-color:rgb(123, 146, 252)" id="gender" name="gender">
                                    <option id="first_gender" value=""></option>
                                    <option id="second_gender" value=""></option>
                                    <option id="third_gender" value=""></option>
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="facebook"><b>FaceBook ID</b></label>
                                <input type="text" style="color:white;background-color:rgb(123, 146, 252)" id="facebook" name="facebook" class="form-control mt-3" value="{{ $user->facebook }}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="linkdin"><b>Linkedin ID</b></label>
                                <input type="text" style="color:white;background-color:rgb(123, 146, 252)" id="linkdin" name="linkdin" class="form-control mt-3" value="{{ $user->linkdin }}">
                            </div>
                            <button type="submit" class="btn btn-warning mt-3" style="color: rgb(63, 60, 60);width:20%;margin-left:37%">Save</button>
                        </form>
                    </div>
              </div>
            </div>

        </div>

    </div>

@endsection
