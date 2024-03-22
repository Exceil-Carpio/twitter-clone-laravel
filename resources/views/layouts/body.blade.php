<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="col-6">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <h4> Share yours ideas </h4>
        <div class="row">
            <form action="/create" method="POST">
                @csrf
                <div class="mb-3">
                    <textarea class="form-control" name="content" id="idea" rows="3"></textarea>
                </div>
                @error('content')
                    <span class="d-block fs-8 text-danger">{{ $message }}</span>
                @enderror
                <input type="hidden" name="user_id" value="{{Auth::id()}}"/>
                <input type=submit class="btn btn-dark" name="submit" value="Share"/>
            </form>
        </div>
        <hr>
        @include('layouts.posts')
    </div>
</body>
</html>
