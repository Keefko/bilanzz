@include('dashboard.includes.error')
<nav class="navbar sticky-top navbar-expand-lg bg-white" id="navbar">
    <div class="container">
        <a href="{{url('/')}}"><img src="{{asset('images/'. $logo->src)}}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <div class="navbar-toggler-inner"></div>
            </div>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="offcanvas-header mt-3">
                <button class="btn  btn-close float-right"></button>
                <h5 class="py-2 text-white">Menu</h5>
            </div>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                @foreach($menus as $menu)
                    @if(!empty($menu->children) &&  count($menu->children) > 0)
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{$menu->title}}
                            </a>
                            <ul class="dropdown-menu fade-up" aria-labelledby="navbarDropdown">
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
            <button class="btn btn-ask" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fas fa-comment me-2"></i>Opýtajte sa
            </button>
    </div>
</nav>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Opýtajte sa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!!  \Collective\Html\FormFacade::open(['action' =>'MailController@sendEmail', 'method' => 'POST'])  !!}
                @csrf
                <div class="form-group">
                    {{ \Collective\Html\FormFacade::label('name', 'Meno', ['class' => 'form-control-label']) }}
                    {{ \Collective\Html\FormFacade::text('name', '', ['class' => 'form-control', 'required' => 'true']) }}
                </div>
                <div class="form-group">
                    {{ \Collective\Html\FormFacade::label('email', 'E-mail', ['class' => 'form-control-label']) }}
                    {{ \Collective\Html\FormFacade::text('email', '', ['class' => 'form-control', 'required' => 'true']) }}
                </div>
                <div class="form-group">
                    {{ \Collective\Html\FormFacade::label('phone', 'Mobilné čislo', ['class' => 'form-control-label']) }}
                    {{ \Collective\Html\FormFacade::text('phone', '', ['class' => 'form-control', 'required' => 'true']) }}
                </div>
                <div class="form-group">
                    {{ \Collective\Html\FormFacade::label('text', 'Správa', ['class' => 'form-control-label']) }}
                    {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'form-control', 'style' => 'max-height:100px', 'required' => 'true']) }}
                </div>
                <button type="submit" class="btn btn-custom-blue-border mt-2 mb-2">Odoslať</button>
                {!! \Collective\Html\FormFacade::close() !!}

            </div>
        </div>
    </div>
</div>
