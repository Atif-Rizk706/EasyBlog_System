@extends('frontend.layouts.master')
@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert" type="button" aria-hidden="true">
                x
            </button>
            {{session()->get('message')}}
        </div>
    @endif
    <div class="form-container">
        <h1>Edit a Post</h1>
        <form id="postForm" action="{{url('updateMy_post',$post->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{$post->title}}" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required>{{$post->description}}</textarea>
            <label for="category">Category:</label>
            <select id="category" name="category" required>
                <option value="">Select a Category</option>
                <option value="Technology">Technology</option>
                <option value="Health">Health</option>
                <option value="Education">Education</option>
                <option value="Sports events">Sports events</option>
                <option value="Society events">Society events</option>
            </select>
            <div>
                Old image:
                <img src="/postimage/{{$post->image}}" class="img">
            </div>
            <label for="photo">Update old photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" >

            <button type="submit">Update</button>
        </form>
    </div>

@endsection
@section('spasific_style')
    <style>


        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: none;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

       form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }
        .img{
            width: 190px;
            height: 190px;
            padding: 0px;
            margin: 10px 80px;
        }
    </style>
@endsection
