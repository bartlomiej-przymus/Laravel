<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <style type="text/css">body { padding-top: 40px;} .is-complete{text-decoration: line-through;}</style>
</head>
<body>
    <div class="container">
            <nav class="navbar is-black" role="navigation" aria-label="main navigation">
                    <div class="navbar-brand">
                         <a class="navbar-item" href="#">
                        <!--<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">-->
                        </a>
                    </div>
                    <div id="navbarBasicExample" class="navbar-menu">
                        <div class="navbar-start">
                            <a class="navbar-item" href="/projects">
                                Projects
                            </a>
                            <a class="navbar-item" href="/projects/create">
                                Create Project
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="box">
        @yield('content')
    </div>
    </div>
</body>
</html>