<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <h1>sso register page</h1>
    <form action="{{route('register')}}" method="post">
    @csrf
    <input type="email" name="email" vlaue="" placeholder="Email">
    <input type="password" name="password" value="" placeholder="Password">
    <button type="submit">register</button>
</form>
</body>
</html>