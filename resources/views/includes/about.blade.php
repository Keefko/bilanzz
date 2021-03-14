
<section id="about">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row about-section">
            <div class="col-lg-6 col-md-12 about-img" style="background-image:linear-gradient(180deg, rgba(0, 149, 218, 0.8) 70%, rgba(0, 57, 116, 0.8) 100%),url( {{asset('images/'. $section->img)}}); background-position: center center; background-size: cover; min-height: 50vh">
            </div>
            <div class="col-lg-6 col-md-12 about-text">
                <div class="about-feature">
                    <h1> {{$section->title}}</h1>
                    <p class="mt-3">{!! $section->text !!}</p>

                    <div class="mt-2">
                        @if($section->button_one_text ||$section->button_one_text !=='')
                            <a href="{{$section->button_one_url}}" class="btn btn-custom btn-custom-blue">{{$section->button_one_text}}</a>
                        @endif
                        @if($section->button_two_text ||$section->button_two_text !=='')
                            <a href="{{url($section->button_two_url)}}" class="btn btn-custom btn-custom-blue">{{$section->button_two_text}}</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
