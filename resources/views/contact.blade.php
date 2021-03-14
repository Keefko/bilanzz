@extends('master')
@section('title', 'Kontakt')


@section('content')
    @include('includes/menu')
    <header id="page-hero" style="background-image:linear-gradient(180deg, rgba(0, 149, 218, 0.8) 70%, rgba(0, 57, 116, 0.8) 100%),url({{asset('images/'.$contact->img)}});
        background-position: center center; background-size: cover; height: 70vh">

        <div class="masthead">
            <h1>{{$contact->title}}</h1>
        </div>
    </header>

    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 mx-md-auto">
                            <div class="contact-box">
                                <i class="fas fa-map-marker-alt"></i>
                                <h3 class="mt-3">Adresa</h3>
                                <p>{!! $contact->address !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mx-md-auto">
                            <div class="contact-box">
                                <i class="fas fa-phone"></i>
                                <h3 class="mt-3">Telefón</h3>
                                <p>{!! $contact->phone !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mx-md-auto">
                            <div class="contact-box">
                                <i class="fas fa-envelope"></i>
                                <h3 class="mt-3">E-mail</h3>
                                <p>{!! $contact->mail !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-6 mx-md-auto">
                            <div class="contact-box">
                                <i class="fas fa-wallet"></i>
                                <h3 class="mt-3">Fakturačné údaje</h3>
                                <p>{!! $contact->info !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 mx-md-auto">
                            <div class="contact-box">
                                <i class="fas fa-credit-card"></i>
                                <h3 class="mt-3">IBAN</h3>
                                <p>{!! $contact->bank !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="heading mb-5">
                        <h1>Často kladené otázky</h1>
                    </div>
                    <div id="accordionExample">
                        @foreach($contact->faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="head{{$faq->id}}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#item{{$faq->id}}" aria-expanded="false" aria-controls="item{{$faq->id}}">
                                    {{$faq->title}}
                                </button>
                            </h2>
                            <div id="item{{$faq->id}}" class="accordion-collapse collapse" aria-labelledby="head{{$faq->id}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {!! $faq->text !!}
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>



                </div>
            </div>
        </div>
    </section>




    <section>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622.913491698186!2d18.0818078159158!3d48.89798580587157!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4714a26bac88237d%3A0x16995d43183d1c8c!2zSsOhbmEgRGVya3UgNzg1LCA5MTEgMDEgVHJlbsSNw61uLUt1YnLDoQ!5e0!3m2!1ssk!2ssk!4v1615449537304!5m2!1ssk!2ssk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </section>

   @include('includes/footer')
@endsection
