<section id="services">
    <div class="container">
        <div class="heading">
            <h1> {{$section->title}}</h1>
        </div>
        @if($section->text || $section->text !== '')
            <p>{!! $section->text !!}</p>
        @endif

        <div class="services">
            <div class="row">
                @foreach($services as $service)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-4 mb-4">
                    <div class="card-body">
                        <i class="{{$service->icon}}"></i>
                        <h5 class="card-title text-uppercase mt-4">{{$service->title}}</h5>
                        <p class="card-text">{!! \Illuminate\Support\Str::limit($service->text, 150)!!}</p>
                        <a href="{{url($service->button_url)}}" class="mt-4">{{$service->button_text}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
