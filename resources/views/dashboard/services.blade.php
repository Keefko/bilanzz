@extends('admin')
@section('title','Administrácia |Služby')

@section('content')
    @include('dashboard.includes.menu')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <h1 class="mt-4">Služby</h1>


            <button class="btn-custom btn-custom-blue-admin mt-3" id="new">
                Pridať službu
            </button>

            <div class="item-normal display-none mt-2" id="hidden">
                {!!  \Collective\Html\FormFacade::open(['action' =>'ServiceController@store', 'method' => 'POST', 'enctype' => "multipart/form-data"])  !!}
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('title', '', ['class' => 'form-control', 'required' => 'true']) }}
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('icon', 'Ikonka', ['class' => 'form-control-label']) }}
                            <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Vyber ikonky
                            </button>
                            {{ \Collective\Html\FormFacade::text('icon', '', ['class' => 'form-control', 'required' => 'true']) }}
                        </div>
                    </div>


                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::file('img') }}
                        </div>

                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('button_text', 'Text tlačitka', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('button_text', '', ['class' => 'form-control mt-3']) }}
                        </div>
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('button_url', 'Url tlačitka ', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('button_url', '', ['class' => 'form-control mt-3']) }}
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'description form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('others', 'Povolit ostatne sluzby', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::checkbox('others', '', ['class' => 'form-control mt-3']) }}
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <script>
                        let value = document.getElementById('title');
                        value.onkeyup = function () {
                            document.getElementById('url').innerHTML = value.value.replace(/\s/g, '-').toLowerCase();
                        }
                    </script>

                    <p class="font-italic">URL : https://www.bilanz.sk/sluzby/<span id="url"></span></p>
                </div>
                <button type="submit" class="btn-custom btn-custom-blue-admin mx-auto mt-2 mb-2">Pridať službu</button>
                {!! \Collective\Html\FormFacade::close() !!}

            </div>

            @include('dashboard.services.icon')

            <div class="item-normal mt-2">
                <div class="table-responsive mt-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nadpis</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($services as $service)
                            <tr data-bs-toggle="collapse" data-bs-target="{{'#toggle'.$service->id}}" class="accordion-toggle">
                                <td class="font-weight-bold">{{$service->title}}</td>
                            </tr>

                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordion-body collapse p-4" id="{{'toggle'.$service->id}}">
                                        {!!  \Collective\Html\FormFacade::open(['action' =>['ServiceController@update',$service->id], 'method' => 'PUT','enctype' => "multipart/form-data"])  !!}
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::text('title', $service->title, ['class' => 'form-control', 'required' => 'true']) }}
                                                </div>
                                            </div>
                                           <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('icon', 'Ikonka', ['class' => 'form-control-label']) }}
                                                    <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Vyber ikonky
                                                    </button>
                                                    {{ \Collective\Html\FormFacade::text('icon', $service->icon, ['class' => 'form-control', 'required' => 'true']) }}
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::file('img') }}
                                                </div>
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('button_text', 'Text tlačitka', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::text('button_text', $service->button_text, ['class' => 'form-control mt-3']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('button_url', 'Url tlačitka ', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::text('button_url', $service->button_url, ['class' => 'form-control mt-3']) }}
                                                </div>

                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::textarea('text', $service->text, ['class' => 'description form-control']) }}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('others', 'Povolit ostatne sluzby', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::checkbox('others', $service->others, ['class' => 'form-control mt-3']) }}
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-12">
                                                <script>
                                                    let update = document.getElementById('title');
                                                    update.onkeyup = function () {
                                                        document.getElementById('url').innerHTML = update.value.replace(/\s/g, '-').toLowerCase();
                                                    }
                                                </script>

                                                <p class="font-italic">URL : https://www.bilanz.sk/sluzby/<span id="url">{{$service->slug}}</span></p>
                                            </div>
                                        </div>
                                            <button type="submit" class="btn-custom btn-custom-blue-admin mt-2 mb-2">Upraviť službu</button>

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
