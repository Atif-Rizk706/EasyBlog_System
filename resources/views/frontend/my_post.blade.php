@extends('frontend.layouts.master')
@section('content')
    <div class="row tm-row">
        <div >
            <figure class="tm-comment-figure align-content-center">
                <img src="/postimage/user.png"
                     alt="User icon"
                     style="width: 110px ; height: 110px;background-color: #54acb9"
                     class="mb-2 rounded-circle img-thumbnail text-center">
                <figcaption class="tm-color-primary text-center">Atif rik</figcaption>
                <span>My posts</span>
            </figure>
            @foreach($posts as $post)
            <div class="mb-4">
                <div class="col-12">
                    <hr class="tm-hr-primary tm-mb-55">
                    <!-- -->
                    <img  class="tm-mb-40 post_img" src="/postimage/{{$post->image}}">

                </div>
                <h2 class="pt-2 tm-color-primary tm-post-title">{{$post->title}}</h2>
                <p class="tm-mb-40">{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }} posted by {{$post->name}}</p>
                <p>
                    {{$post->description}}
                </p>
                <span class="d-block text-right tm-color-primary">
                    <a class="btn btn-danger" href="{{url("remove_post",$post->id)}}">Delete</a>
                    <a class="btn btn-primary" href="{{url('edit_post',$post->id)}}">Edit</a>
                </span>
            </div>
            @endforeach
        </div>
    </div>

@endsection
@section('spasific_style')
    <style>

        h1 {
            text-align: center;
        }
        .post_img{
            width: 330px;
            height: 400px;
            border-radius: 15px;
        }
        figure img{
            margin: auto;
        }
        figure span{
            text-align: left;
            font-size: 30px;
        }



    </style>
@endsection
