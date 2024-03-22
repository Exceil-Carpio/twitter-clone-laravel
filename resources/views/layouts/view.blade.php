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

        <div class="card">
            <div class="px-3 pt-4 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                        <div>
                            <h5 class="card-title mb-0"><a href="#">{{$idea->user['name']}}
                                </a></h5>
                                <p class="mb-0 small text-truncate">{{'@'.$idea->user['username']}}</p>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between" style="width: 15%;">
                        <p><a href="{{route('idea.editMode', [$idea, true])}}" style="text-decoration: none;">Edit</a></p>
                        <form action="{{route('idea.destroy', $idea)}}" method='POST'>
                            @csrf
                            @method('DELETE')
                            <div>
                                <button type="submit" class="btn btn-danger btn-sm">X</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($edit ?? false)
                <form action="/update/{{$idea->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <textarea class="form-control" name="content" id="idea" rows="3">{{$idea['content']}}</textarea>
                    </div>
                    @error('content')
                        <span class="d-block fs-8 text-danger">{{ $message }}</span>
                    @enderror
                    <input type=submit class="btn btn-dark" name="submit" value="Share"/>
                </form>
                @else
                <p class="fs-6 fw-light text-muted">
                    {{$idea['content']}}
                </p>
                @endif
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                            </span> {{$idea['likes']}} </a>
                    </div>
                    <div>
                        <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                            {{$idea['updated_at']}} </span>
                    </div>
                </div>
                <div>
                    <hr>
                    @include('layouts.comments')
                </div>
            </div>
        </div>
    </div>
</body>
</html>
