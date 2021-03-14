<div class="d-flex" id="wrapper">
    <div class="bg-light border-right" id="sidebar-wrapper">
        <img class="sidebar-heading" src="{{asset('images/logobilanz.svg')}}">
        <div class="list-group list-group-flush">
            <a href="url({{}})" class="list-group-item list-group-item-action">Administrácia</a>
            <a href="url({{}})" class="list-group-item list-group-item-action">Domovská stránka</a>
            <a href="url({{}})" class="list-group-item list-group-item-action">Služby</a>
            <a href="url({{}})" class="list-group-item list-group-item-action">Stránky</a>
            <a href="url({{}})" class="list-group-item list-group-item-action">Menu</a>
            <a href="url({{}})" class="list-group-item list-group-item-action">Kontakt</a>
        </div>
    </div>
    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" >
            <button class="navbar-toggler" type="button">
                <div class="hamburger">
                    <div class="navbar-toggler-inner"></div>
                </div>
            </button>
            <div class="ms-auto">
                <a class="nav-link text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Odhlásiť sa</a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
        </nav>

        <div class="container-fluid dashboard">
            @include('dashboard.includes.error')
