@extends('admin')
@section('title','Administrácia | Stranky')

@section('content')
    @include('dashboard.includes.menu')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <h1 class="mt-4">Stránky</h1>

            <button class="btn-custom btn-custom-blue-admin mt-3" id="new">
                Pridať stránku
            </button>

            <div class="item-normal display-none mt-2" id="hidden">

                    {!!  \Collective\Html\FormFacade::open(['action' => 'PageController@store', 'method' => 'POST','enctype' => "multipart/form-data"])  !!}
                    @csrf

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('title', '', ['class' => 'form-control', 'required' => 'true']) }}
                        </div>
                    </div>
                    <script>
                        let value = document.getElementById('title');
                        value.onkeyup = function () {
                            document.getElementById('url').innerHTML = value.value.replace(/\s/g, '-').toLowerCase();
                        }
                    </script>

                    <p class="font-italic">URL : https://www.bilanz.sk/stranky/<span id="url"></span></p>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label mb-3']) }}
                            {{ \Collective\Html\FormFacade::file('img') }}
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'description form-control', 'required' => 'true']) }}
                        </div>
                    </div>

                    <button type="submit" class=" btn-custom btn-custom-blue-admin mt-2 mb-2">Pridať stránku</button>
                    {!! \Collective\Html\FormFacade::close() !!}
            </div>
            <div class="item-normal mt-2">
                <div class="table-responsive mt-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nadpis</th>
                            <th>Odkaz</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($pages as $page)
                            <tr data-bs-toggle="collapse" data-bs-target="{{'#toggle'.$page->id}}" class="accordion-toggle">
                                <td class="font-weight-bold">{{$page->title}}</td>
                                <td><a href="{{url('/stranky/'. $page->slug)}}">{{'/stranky/' . $page->slug}}</a></td>
                                <td>@csrf()
                                    {!! \Collective\Html\FormFacade::open(['action' => ['PageController@destroy', $page->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                                    {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn-custom btn-custom-delete'])}}
                                    {!! \Collective\Html\FormFacade::close() !!}</td>
                            </tr>

                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordion-body collapse p-4" id="{{'toggle'.$page->id}}">
                                        {!!  \Collective\Html\FormFacade::open(['action' =>['PageController@update',$page->id], 'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
                                        @csrf

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                                                {{ \Collective\Html\FormFacade::text('title', $page->title, ['class' => 'form-control', 'required' => 'true']) }}
                                            </div>
                                        </div>
                                        <script>
                                            let value = document.getElementById('title');
                                            value.onkeyup = function () {
                                                document.getElementById('url').innerHTML = value.value.replace(/\s/g, '-').toLowerCase();
                                            }
                                        </script>

                                        <p class="font-italic">URL : https://www.bilanz.sk/stranky/<span id="url">{{$page->slug}}</span></p>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label mb-3']) }}
                                                {{ \Collective\Html\FormFacade::file('img') }}
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
                                                {{ \Collective\Html\FormFacade::textarea('text', $page->text, ['class' => 'description form-control', 'required' => 'true']) }}
                                            </div>
                                        </div>

                                        <button type="submit" class="btn-custom btn-custom-blue-admin mt-2 mb-2">Upraviť stránku</button>
                                        {!! \Collective\Html\FormFacade::close() !!}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('dashboard.includes.end')
@endsection
