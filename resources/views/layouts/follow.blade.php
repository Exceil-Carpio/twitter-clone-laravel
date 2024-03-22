<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="card mt-3">
        <div class="card-header pb-0 border-0">
            <h5 class="">Who to follow</h5>
        </div>
        <div class="card-body">
            @foreach ($users as $user)
            <div class="hstack gap-2 mb-3">
                <div class="avatar">
                    <a href="#!"><img class="avatar-img rounded-circle"
                            src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt=""></a>
                </div>
                <div class="overflow-hidden">
                    <a class="h6 mb-0" href="/view-posts/{{$user->id}}">{{$user->name}}</a>
                    <p class="mb-0 small text-truncate">{{'@'.$user->username}}</p>
                </div>
                <a class="btn btn-primary-soft rounded-circle icon-md ms-auto" href="#"><i
                        class="fa-solid fa-plus"> </i></a>
            </div>
            @endforeach

        </div>
    </div>
</body>
</html>
