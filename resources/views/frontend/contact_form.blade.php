@extends('frontend.layouts.master')
@section('content')
    <p class="form_hed">Contact us !</p>
    <form method="POST" action="{{url('send_mes')}}">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>


@endsection
@section('spasific_style')

<style>
    .form_hed{
        margin:20px auto;
        font-size: 60px;
        color: #00acee;
        text-align: center;
    }

</style>

@endsection
