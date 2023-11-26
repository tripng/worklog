<header>
    <nav class="navbar navbar-expand-lg bg-transparent border-bottom">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold ms-3" href="#">WORKLOG</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a @class([ 'nav-link' , 'active'=>request()->is('dashboard')]) aria-current="page"
                            href="{{url('dashboard')}}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a @class([ 'nav-link' , 'active'=>request()->is('worklogs')])
                            href="{{url('worklogs')}}">Worklogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>