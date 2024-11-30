@extends('admin.layouts.master')
@section('content')

    <div class="container">
        <h1>All Posts</h1>
        <table class="ta_st">
            <tr class="tr_1">
                <th>Post title</th>
                <th>Description</th>
                <th>Post by</th>
                <th>Post stats</th>
                <th>User type</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Edite</th>
            </tr>
            @foreach($post as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->post_status}}</td>
                    <td>{{$post->user_type}}</td>
                    <td>
                        <img src="/postimage/{{$post->image}}" class="img_dg">
                    </td>
                    <td>
                        <a class="btn btn-danger" href="{{url("delete_post",$post->id)}}" onclick="confimation(event)">Delete</a>
                    </td>
                    <td>
                        <a class="btn btn-success" href="{{url("edit_page",$post->id)}}" >Edite</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
@section('spasific_style')
    <style>

        .container {
            max-width:100%;

            padding: 20px;
            background: none;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }
        .ta_st{
            width: 80%;
            border: 1px solid white;
            text-align: center;
            margin-left: 70px;

        }
        .tr_1{
            background-color: skyblue;
        }
        .img_dg{
            height: 80px;
            width:90px;
            border-radius: 50%;
            padding: 10px;
        }

        </style>
@endsection
@section('spasific_js')
    <script>
        function confimation(ev){
            ev.preventDefault();
            var urltoredi=ev.currentTarget.getAttribute('href');
            console.log(urltoredi);
            Swal.fire({
                title: 'Are you sure to delete this post?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
            }).then((result) => {
                if (result.isConfirmed) {
                    // User clicked "Yes"
                    window.location.href=urltoredi;
                    Swal.fire(
                        'Deleted!',
                        'Your post has been deleted.',
                        'success'
                    );
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    // User clicked "No" (cancel)
                    Swal.fire(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
