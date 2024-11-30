@extends('frontend.layouts.master')
@section('content')

    <div class="row tm-row">
        <div class="col-12">
            <hr class="tm-hr-primary tm-mb-55">
            <!-- -->
            <img width="400" height="300"  class="tm-mb-40" src="/postimage/{{$post->image}}">

        </div>
    </div>
    <div class="row tm-row">
        <div class="col-lg-8 tm-post-col">
            <div class="tm-post-full">
                <div class="mb-4">
                    <h2 class="pt-2 tm-color-primary tm-post-title">{{$post->title}}</h2>
                    <p class="tm-mb-40">June 16, 2020 posted by {{$post->name}}</p>
                    <p>
                        {{$post->description}}
                    </p>
                    <span class="d-block text-right tm-color-primary">Creative . Design . Business</span>
                </div>

                <!-- Comments -->
                <div>
                    <h2 class="tm-color-primary tm-post-title">Comments</h2>
                    <hr class="tm-hr-primary tm-mb-45">
                    @foreach($comments as $comment)
                    <div class="tm-comment tm-mb-45">
                        <figure class="tm-comment-figure">
                            <img src="/postimage/user.png"
                                 alt="User icon"
                                 style="width: 80px ; height: 80px;background-color: #54acb9"
                                 class="mb-2 rounded-circle img-thumbnail"
                                 onerror="this.onerror=null; this.src='https://cdn-icons-png.flaticon.com/512/1946/1946429.png';">                            <figcaption class="tm-color-primary text-center">{{$comment->user_name}}</figcaption>
                        </figure>
                        <div>
                            <p>
                                {{$comment->description}}
                            </p>
                            <div class="d-flex justify-content-between">
                                <a href="#" class="tm-color-primary">REPLY</a>
                                <span class="tm-color-primary">June 14, 2020</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <form action="{{url('add_comment',$post->id)}}" method="post" enctype="multipart/form-data" class="mb-5 tm-comment-form">
                        @csrf
                        <h2 class="tm-color-primary tm-post-title mb-4">Your comment</h2>
                        <div class="mb-4">
                            <input class="form-control" name="name" type="text">
                        </div>
                        <div class="mb-4">
                            <input class="form-control" name="email" type="text">
                        </div>
                        <div class="mb-4">
                            <textarea class="form-control" name="message" rows="6"></textarea>
                        </div>
                        <div class="text-right">
                            <button class="tm-btn tm-btn-primary tm-btn-small" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <aside class="col-lg-4 tm-aside-col">
            <div class="tm-post-sidebar">
                <hr class="mb-3 tm-hr-primary">
                <h2 class="mb-4 tm-post-title tm-color-primary">Categories</h2>
                <ul class="tm-mb-75 pl-5 tm-category-list">
                    <li><a href="#" class="tm-color-primary">Visual Designs</a></li>
                    <li><a href="#" class="tm-color-primary">Travel Events</a></li>
                    <li><a href="#" class="tm-color-primary">Web Development</a></li>
                    <li><a href="#" class="tm-color-primary">Video and Audio</a></li>
                    <li><a href="#" class="tm-color-primary">Etiam auctor ac arcu</a></li>
                    <li><a href="#" class="tm-color-primary">Sed im justo diam</a></li>
                </ul>
                <hr class="mb-3 tm-hr-primary">
                <h2 class="tm-mb-40 tm-post-title tm-color-primary">Related Posts</h2>
                @foreach($relatedPosts as $relatedPost)
                <a href="{{url("single_post",$relatedPost->id)}}" class="d-block tm-mb-40">
                    <figure>
                        <img src="/postimage/{{$relatedPost->image}}" alt="Image" class="mb-3 img-fluid" style="width: 300px; height: 300px; border-radius: 30px">
                        <figcaption class="tm-color-primary"> {{$relatedPost->title}}</figcaption>
                    </figure>
                </a>
                @endforeach
            </div>
        </aside>
    </div>
@endsection
