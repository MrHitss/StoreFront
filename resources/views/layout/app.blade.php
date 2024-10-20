<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Dynamic Page Builder</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.21.13/css/grapes.min.css" integrity="sha512-wt37la6ckobkyOM0BBkCvrv+ozN/tGRe5BtR8DtGuxZ+m9kIy8B9hb8iLpzdrdssK2N07EMG7Tsw+/6uulUeyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    @yield('styles')
    
</head>

<body>
    @include('layout.navbar')

    <div class="container mt-5">
        @yield('content')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.21.13/grapes.min.js" integrity="sha512-vnAsqCtkvU3XqbVNK0pQQ6F8Q98PDpGMpts9I4AJdauEZQVbqZGvJdXfvdKEnLC4o7Z1YfnNzsx+V/+NXo/08g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    @yield('scripts')
</body>

</html>
