@extends('master')
@section('title', $service->title)


@section('content')
    @include('includes/menu')
    <header id="page-hero" style="background-image:linear-gradient(180deg, rgba(0, 149, 218, 0.8) 70%, rgba(0, 57, 116, 0.8) 100%),url({{$service->img}});
        background-position: center center; background-size: cover; height: 70vh">

        <div class="masthead">
            <h1>{{$service->title}}</h1>
        </div>
    </header>

<section class="mt-5 mb-5">
    @if($service->journey == true)
        <section id="journey" class="mt-4">
            <div class="container">
                <div class="heading">
                    <h1>Ako postupovať?</h1>
                </div>

                <div class="row mt-5">
                    @foreach($journeys as $key => $journey)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="journey-box">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="journey-number">
                                            <h1>{{$key + 1}}</h1>
                                        </div>
                                    </div>
                                    <div class="col-10">
                                        <div class="journey-text">
                                            <h3>{{$journeys[$key]->title}}</h3>
                                            <p>{!! $journeys[$key]->text !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section id="service">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9">
                    <p class="text-center">
                        {!! $service->text !!}
                    </p>
                </div>
            </div>
        </div>
    </section>



    @if($service->calc == true)
        <section id="calc">
            <div class="container">
                <div class="row calc-section">
                    <div class="col-lg-6 col-md-12 calc-blue">
                        <h1>Zaujíma vás, akú sumu môžete získať
                            pri vrátení dane?</h1>
                        <div class="form-group mt-3">
                            <label for="country">KRAJINA PRE REFUNDÁCIU</label>
                            <br/>
                            <select name="countries" class="form-control" id="country">
                                <option value="cz">Česko</option>
                                <option value="uk">Ukrajina</option>
                                <option value="pl">Poľsko</option>
                                <option value="de">Nemecko</option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <label>ČISTÁ ČIASTKA ZA PALIVO:</label>
                            <input type="number" class="form-control" placeholder="0">
                        </div>

                        <div class="form-group mt-4">
                            <label>ČISTÁ ČIASTKA MÝTNEHO:</label>
                            <input type="number" class="form-control" placeholder="0">
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-12 calc-text">
                        <h2>REFUNDOVANÁ ČIASTKA:</h2>
                        <h3 class="mt-5">1200 €</h3>
                        <div class="form-group mt-4">
                            <select name="currencies" id="currencies">
                                <option value="none" selected>Prevod na inu menu</option>
                                <option value="kc">Česká koruna</option>
                                <option value="dkk">Dánska koruna</option>
                                <option value="gbd">libra</option>
                            </select>
                        </div>
                        <ul class="mt-5">
                            <li>Minimálna čiastka pre podanie žiadosti: kvartálna žiadosť 400 EUR DPH / ročná žiadosť 50 EUR DPH (alebo ekvivalent lokálnej meny)</li>
                            <li>Minimálna čiastka pre podanie žiadosti: kvartálna žiadosť 400 EUR DPH / ročná žiadosť 50 EUR DPH (alebo ekvivalent lokálnej meny)</li>
                            <li>Minimálna čiastka pre podanie žiadosti: kvartálna žiadosť 400 EUR DPH / ročná žiadosť 50 EUR DPH (alebo ekvivalent lokálnej meny)</li>
                        </ul>
                        <div class="mx-auto mt-2">
                            <button class="btn btn-custom btn-custom-blue-border">Kontaktujte nás</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if($service->others == true)
        <section id="others">
            <div class="container">
                <div class="heading mb-5">
                    <h1>Ostatné služby</h1>
                </div>
                <div id="multi-item-example" class="carousel slide carousel-multi-item mt-4" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">

                        @foreach($others->chunk(4) as $other )
                            <div class="carousel-item @if($loop->first) active @endif">
                                <div class="row">
                                    @foreach($other as $serv)
                                        <div class="col-lg-3 col-md-6 col-sm-6 col-xs-4 mb-4">
                                            <div class="card-body">
                                                <i class="{{$serv->icon}}"></i>
                                                <h5 class="card-title text-uppercase mt-4">{{$serv->title}}</h5>
                                                <p class="card-text">{!! \Illuminate\Support\Str::limit($serv->text, 150)!!}</p>
                                                <a href="{{url($serv->button_url)}}" class="mt-4">{{$serv->button_text}}</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <!--/.Slides-->

                    <!--Indicators-->
                    <ol class="carousel-indicators">
                        @for($i = 0; $i < count($others) / 4; $i++)
                            <li data-bs-target="#multi-item-example" data-bs-slide-to="{{$i}}" class="@if($i == 0) active @endif"></li>
                        @endfor
                    </ol>
                    <!--/.Indicators-->
                </div>
            </div>
        </section>
        @endif
</section>
@include('includes/footer')
@endsection
