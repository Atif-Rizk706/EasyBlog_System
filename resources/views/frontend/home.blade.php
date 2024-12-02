@extends('frontend.layouts.master')
@section('content')
    <div class="row tm-row">
        <div class="col-12">
            <form method="get" action="{{url('search_post')}}" class="form-inline tm-mb-80 tm-search-form">
                @csrf
                <input class="form-control tm-search-input" name="query" type="text" placeholder="Search..."
                       aria-label="Search">
                <button class="tm-search-button" type="submit">
                    <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>
    <div class="row tm-row">
        @if (isset($message))
            <p>{{ $message }}</p>
        @endif
    @foreach($posts as $post)
        <article class="col-12 col-md-6 tm-post art_contain">
            <hr class="tm-hr-primary">
            <a href="{{url("single_post",$post->id)}}" class="effect-lily tm-post-link tm-pt-60">
                <div class="tm-post-link-inner post_img">
                    <img src="/postimage/{{$post->image}}" alt="Image" class="img-fluid">
                </div>
                <span class="position-absolute tm-new-badge">New</span>
                <h2 class="tm-pt-20 tm-color-primary tm-post-title">{{$post->title}}</h2>
            </a>
            <p class="tm-pt-20 lim_des">
                {{ Str::limit($post->description,60,'...') }}
            </p>
            <div class="full-description" id="description-{{ $post->id }}" style="display: none;">
                <p>{{ substr($post->description, 60) }}</p>
            </div>
            <a href="#" class="read-more" data-id="{{ $post->id }}">Read more</a>
            <div class="detail1_post">
                  <div class="d-flex justify-content-between">
                      <span class="tm-color-primary">{{$post->category}}</span>
                      <span class="tm-color-primary">{{ \Carbon\Carbon::parse($post->created_at)->format('F j, Y') }}</span>
                  </div>
                  <hr>
                  <div class="d-flex justify-content-between">
                      <span></span>
                      <span>by {{$post->user_type}} {{$post->name}}</span>
                      <!-- Like Button -->
                      <button class="btn btn-primary like-button" data-post-id="{{ $post->id }}">
                          Like <span class="like-count">{{ $post->likes_count }}</span>
                      </button>
                  </div>
            </div>
        </article>
    @endforeach
    </div>
    <div class="row tm-row tm-mt-100 tm-mb-75">
        <div class="tm-prev-next-wrapper">
            @if ($posts->currentPage() > 1)
                <a href="{{ $posts->previousPageUrl() }}" class="mb-2 tm-btn tm-btn-primary tm-prev-next tm-mr-20">Prev</a>
            @else
                <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled tm-mr-20">Prev</a>
            @endif

            @if ($posts->hasMorePages())
                <a href="{{ $posts->nextPageUrl() }}" class="mb-2 tm-btn tm-btn-primary tm-prev-next">Next</a>
            @else
                <a href="#" class="mb-2 tm-btn tm-btn-primary tm-prev-next disabled">Next</a>
            @endif
        </div>
        <div class="tm-paging-wrapper">
            <span class="d-inline-block mr-3">Page</span>
            <nav class="tm-paging-nav d-inline-block">
                <ul>
                    @foreach ($posts->links() as $link)
                        <li class="tm-paging-item {{ $link->active ? 'active' : '' }}">
                            <a href="{{ $link->url }}" class="mb-2 tm-btn tm-paging-link">{{ $link->label }}</a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>

@endsection
@section('spasific_style')
    <style>

        .read-more {
            color: #626567; /* Bootstrap primary color */
            cursor: pointer;
            text-decoration: underline;
            display: inline;
        }
        .full-description {
            margin-top: 7px; /* Space between the short and full description */
            color: black;
            display: inline;

        }
        .lim_des{
            color: black;
            display: inline;

        }
        .full-description p{
            color: black;
            display: inline;

        }
        .detail1_post{
            margin-top: 20px;
            font-size: 18px;
            padding: 0; /* Remove any default padding */

        }

        .detail1_post hr {
            margin: 1px 0; /* Adjust the top and bottom margins of the <hr> */
        }

        .detail1_post .d-flex {
            margin: 0; /* Remove margins between flex items if any */
        }
        .art_contain{
            margin-bottom: 5px;
        }
        .post_img{
            width: 330px;
            height: 400px;
            border-radius: 15px;
        }


    </style>
@endsection
@section('spasific_js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const readMoreLinks = document.querySelectorAll('.read-more');

            readMoreLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent default anchor click behavior
                    const postId = this.dataset.id;
                    const fullDescription = document.getElementById('description-' + postId);

                    if (fullDescription.style.display === 'none' || fullDescription.style.display === '') {
                        fullDescription.style.display = 'block'; // Show full description
                        this.textContent = 'Read less'; // Change link text
                    } else {
                        fullDescription.style.display = 'none'; // Hide full description
                        this.textContent = 'Read more'; // Change link text back
                    }
                });
            });
        });




    </script>

@endsection
