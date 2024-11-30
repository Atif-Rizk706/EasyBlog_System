@extends('frontend.layouts.master')
@section('content')

    @if(session()->has('message'))
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert" type="button">
                x
            </button>
            {{session()->get('message')}}
        </div>
    @endif
    <div class="row tm-row">
         <div class="form-container">
            <h1>Create a Post</h1>
            <form id="postForm" action="{{url('save_post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" required></textarea>

                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="">Select a Category</option>
                    <option value="Technology">Technology</option>
                    <option value="Health">Health</option>
                    <option value="Education">Education</option>
                    <option value="Sports events">Sports events</option>
                    <option value="Society events">Society events</option>

                </select>

                <label for="photo">Add Photo:</label>
                <input type="file" id="photo" name="photo" accept="image/*" >

                <button type="submit">Save</button>
            </form>
         </div>
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.49);
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

       .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-container button:hover {
            background-color: #218838;
        }
    </style>
@endsection
