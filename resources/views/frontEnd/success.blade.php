<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="content mt-5">





        @if (request('danger') && $errors->count() == 0)
            <div class="alert alert-danger">
                {{ request('danger') }}
            </div>
        @endif

        @if (request('success') && $errors->count() == 0)
            <div class="alert alert-success">
                {{ request('success') }}
            </div>
        @endif


    </div>
</body>

</html>
