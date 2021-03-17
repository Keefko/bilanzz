@extends('master')
@section('title', $page->title)


@section('content')
@include('includes/menu')
<header id="page-hero" style="background-image:linear-gradient(180deg, rgba(0, 149, 218, 0.8) 70%, rgba(0, 57, 116, 0.8) 100%),url({{asset('images/'.$page->img)}});
         background-position: center center; background-size: cover; height: 50vh">

    <div class="masthead">
        <h1>{{$page->title}}</h1>
    </div>
</header>


<section id="page" class="mt-5 mb-5">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-9">
                <p>
                    {!! $page->text !!}
                </p>
            </div>
        </div>
    </div>
</section>
@include('includes/footer')
@endsection
