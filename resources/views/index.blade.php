<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PageTurner</title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>

    <!-- Logo -->
    <header>
        <div class="title">
            <h1>PageTurner</h1>
        </div>
    </header>

    <h1>
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
    </h1>

    <!-- Search bar -->
    <div class="search-box">
        <input type="text" placeholder="Search for books..." id="search-bar">
        <img src="magnifying-glass.png" alt="Search" class="search-icon">
    </div>

    <!-- Banner -->
    <div class="navBar">
        <p>PlaceHolder</p>
    </div>

    <div class="navBar">
        <a class="active" href="{{ route('index') }}">Home</a>
        <a href="{{ route('shop') }}">Books</a>
        <a href="{{ route('aboutUs') }}">About us</a>
      </div>
</body>
</html>

