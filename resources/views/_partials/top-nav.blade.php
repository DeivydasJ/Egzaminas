<nav class="navbar navbar-light bg-light border-bottom">
                    <div class="container" style="display: flex; flex-direction:row;" >
                    <a class="btn btn-success" href="/">Home</a>
                    <a class="btn btn-success" href="/add-movie">Add Movie</a>
                    <a class="btn btn-success" href="/add-category">Add Category</a>
                    </div>
                    @if(Auth::check())   
                 <div class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Hello,{{Auth::user()->name}}
                </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/logout">Logout</a>
                </div>
                @else
                <div class="row mx-md-n5">
                    <div class="col px-md-2"><a class="btn btn-primary " href="/login">Login</a></div>
                    <div class="col px-md-2"><a class="btn btn-success" href="/register">Register</a></div>
                </div>
                @endif
                </nav>