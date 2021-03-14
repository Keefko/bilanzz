<section id="prices">
    <div class="container">
        <div class="heading">
            <h1> {{$section->title}}</h1>
        </div>
        @if($section->text || $section->text !== '')
            <p>{{$section->text}}</p>
       @endif
        <div class="prices-features">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="card-body h-100 blue">
                        <h2>Cenník podvojného účtovníctva</h2>
                        <h3 class="mt-4">Platiteľ DPH</h3>
                        <div class="d-flex justify-content-between">
                            <div class="text">
                                Účtovná položka <br/>
                                Paušál formou balíka
                            </div>
                            <div class="ss">
                                0,90 EUR* <br/>
                                150 EUR/mesiac
                            </div>
                        </div>

                        <h3 class="mt-4">Neplatca DPH</h3>
                        <div class="d-flex justify-content-between">
                            <div class="text">
                                Účtovná položka <br/>
                                Paušál formou balíka
                            </div>
                            <div class="ss">
                                0,90 EUR* <br/>
                                150 EUR/mesiac
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card-body h-100  blue">
                        <h2>Cenník podvojného účtovníctva</h2>
                        <h3 class="mt-4">Platiteľ DPH</h3>
                        <div class="d-flex justify-content-between">
                            <div class="text">
                                Účtovná položka <br/>
                                Paušál formou balíka
                            </div>
                            <div class="ss">
                                0,90 EUR* <br/>
                                150 EUR/mesiac
                            </div>
                        </div>

                        <h3 class="mt-4">Neplatca DPH</h3>
                        <div class="d-flex justify-content-between">
                            <div class="text">
                                Účtovná položka <br/>
                                Paušál formou balíka
                            </div>
                            <div class="ss">
                                0,90 EUR* <br/>
                                150 EUR/mesiac
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card-body h-100 darkblue">
                        <h1>Vyžiadajte si kompletnú
                            cenovú ponuku</h1>
                        <p class="mt-4">Nestrácajte čas s manuálnym počítaním ceny za položku, spravíme to za vás. Vypracujeme vám bezplatne nezáväznú cenovú ponuku na mieru.</p>
                        <a href="" class="btn btn-custom btn-custom-blue mt-3">Kontaktujte nás</a>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                @if($section->button_one_text || $section->button_one_text !=='')
                    <a href="{{$section->button_one_url}}" class="btn btn-custom btn-custom-blue-border">{{$section->button_one_text}}</a>
                @endif
                @if($section->button_two_text || $section->button_two_text !=='')
                    <a href="{{$section->button_two_url}}" class="btn btn-custom btn-custom-blue">{{$section->button_two_text}}</a>
                @endif
            </div>

        </div>
    </div>
</section>
