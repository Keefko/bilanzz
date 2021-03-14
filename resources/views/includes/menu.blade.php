<nav class="navbar sticky-top navbar-expand-lg bg-white" id="navbar">
    <div class="container">
        <img src="{{asset('images/logobilanz.svg')}}">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <div class="navbar-toggler-inner"></div>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @foreach($menus as $menu)
                    @if(!empty($menu->children) &&  count($menu->children) > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{$menu->title}}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach($menu->children as $child)
                                    <li>
                                        <a class="dropdown-item" href="{{url($child->link)}}">{{$child->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif

                    @if(count($menu->children) == 0 && $menu->parent_id == 0)
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{$menu->link}}">{{$menu->title}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</nav>
