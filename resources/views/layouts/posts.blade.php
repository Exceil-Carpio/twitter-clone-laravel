<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="mt-3">
        @foreach ($ideas as $idea)
            <div class="card">
                <div class="px-3 pt-4 pb-2">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                                src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                            <div>
                                <h5 class="card-title mb-0"><a href="/view-record/{{$idea->id}}">{{$idea->user['name']}}
                                </a></h5>
                                <p class="mb-0 small text-truncate">{{'@'.$idea->user['username']}}</p>
                            </div>
                        </div>
                        @if (Auth::id() == $idea->user['id'])
                            <form action="{{route('idea.destroy', $idea->id)}}" method='POST'>
                                @csrf
                                @method('DELETE')
                                <div>
                                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <p class="fs-6 fw-light text-muted">
                       {{$idea['content']}}
                    </p>
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
                    @include('layouts.comments')
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
