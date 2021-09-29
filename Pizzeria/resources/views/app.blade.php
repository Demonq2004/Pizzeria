
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Blog Site Template</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="https://youtube.com/FollowAndrew">
    <link rel="shortcut icon" href="images/logo.png">

    <!-- FontAwesome CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>

<body>

<header class="header text-center">
    <a class="site-title pt-lg-4 mb-0" href="index.html">SiteName.dev</a>

    <nav class="navbar navbar-expand-lg navbar-dark" style="z-index: 100">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navigation" class="collapse navbar-collapse flex-column" >
            <img class="mb-3 mx-auto logo" src="images/logo.png" alt="logo" >

            <ul class="navbar-nav flex-column text-sm-center text-md-left">
                <li class="nav-item active">
                    <a class="nav-link" href="/"><i class="fas fa-home fa-fw mr-2"></i>Strona Głowna <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/pizzas"><i class="fas fa-pizza-slice fa-fw mr-2"></i>Pizzy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admin/products"><i class="fas fa-utensils fa-fw mr-2"></i>Produkty</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="archive.html"><i class="fas fa-archive fa-fw mr-2"></i>Blog Archive</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="contact.html"><i class="fas fa-envelope fa-fw mr-2"></i>Contact Us</a>
                </li>
            </ul>
            <hr>
            <ul class="social-list list-inline py-3 mx-auto">
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-github-alt fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-stack-overflow fa-fw"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-codepen fa-fw"></i></a></li>
            </ul>

        </div>
    </nav>
</header>

@yield('content')
    <footer class="footer text-center py-2 theme-bg-dark">

        <p class="copyright"><a href="https://youtube.com/FollowAndrew">FollowAndrew</a></p>

    </footer>

</div>


<!-- Bootstrap Javascript -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>

