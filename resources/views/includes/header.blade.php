@include('includes/menu')
<header id="hero" style="background-image:linear-gradient(180deg, rgba(0, 149, 218, 0.8) 70%, rgba(0, 57, 116, 0.8) 100%),url({{asset('images/'.$section->img)}}); background-position: center center; background-size: cover; height: 70vh;">

    <div class="masthead container">
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <h1>{{$section->title}}</h1>
                @if(!empty($section->text))
                    <p class="mt-4">{{$section->text}}</p>
                @endif
                <div class="mt-4">
                    @if($section->button_one_text || $section->button_one_text !=='')
                        <a href="{{url($section->button_one_url)}}" class="btn btn-custom btn-custom-blue">{{$section->button_one_text}}</a>
                    @endif
                    @if($section->button_two_text || $section->button_two_text !=='')
                        <a href="{{url($section->button_two_url)}}"  class="btn btn-custom btn-custom-transparent">{{$section->button_two_text}}<img class="p-2" src="{{asset('images/Arrow%201.svg')}}"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</header>
