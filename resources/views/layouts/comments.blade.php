<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="/comments/create" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="idea_id" value="{{$idea->id}}"/>
                <input type="hidden" name="user_id" value="{{Auth::id()}}"/>
                <textarea class="fs-6 form-control" name='comment' rows="1"></textarea>
            </div>
                @error('comment')
                    <span class="fs-8 text-danger">{{ $message }}</span>
                @enderror
            <div>
                @if ($search ?? false)
                    <input type="hidden" id="search" name="search" value="{{$search}}">
                @endif
                <input type="submit" class="btn btn-primary btn-sm" value="Post Comment"/>
            </div>
        </form>

        <hr>

        @foreach($idea->comments as $comment)
            <div class="d-flex align-items-start">
                <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                    src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi"
                    alt="Luigi Avatar">
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <div>
                            <h6 class="">{{$comment->user['name']}}
                            </h6>
                            <p class="mb-0 small text-truncate">{{'@'.$comment->user['username']}}</p>
                        </div>
                        <small class="fs-6 fw-light text-muted">{{$comment['created_at']}}</small>
                    </div>
                    <p class="fs-6 mt-3 fw-light">
                        {{$comment['comment']}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>
