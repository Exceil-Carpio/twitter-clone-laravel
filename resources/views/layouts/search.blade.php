<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <div class="card">
        <div class="card-header pb-0 border-0">
            <h5 class="">Search</h5>
        </div>
        <div class="card-body">
            <form action="{{route('user.search')}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{isset($id)? $id : Auth::id()}}"/>
                <input placeholder="..." class="form-control w-100" type="text" id="search" name="search">
                <input type="submit" value="Search" class="btn btn-dark mt-2"/>
            </form>
        </div>
    </div>
</body>
</html>
