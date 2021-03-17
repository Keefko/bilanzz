@extends('admin')
@section('title','Administrácia | Kroky')

@section('content')
    @include('dashboard.includes.menu')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <h1 class="mt-4">Ako postupovať </h1>
            <button class="btn-custom btn-custom-blue-admin mt-3" id="new">
                Pridať nový krok
            </button>
            <div class="item-normal display-none mt-2" id="hidden">

                {!!  \Collective\Html\FormFacade::open(['action' => 'JourneyController@store', 'method' => 'POST','enctype' => "multipart/form-data"])  !!}
                @csrf

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('title', '', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::textarea('text', '', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>
                </div>

                <button type="submit" class=" btn-custom btn-custom-blue-admin mt-2 mb-2">Pridať krok</button>
                {!! \Collective\Html\FormFacade::close() !!}
            </div>
            <div class="item-normal mt-2">
                <div class="table-responsive mt-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nadpis</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($journeys as $journey)
                            <tr data-bs-toggle="collapse" data-bs-target="{{'#toggle'.$journey->id}}" class="accordion-toggle">
                                <td class="font-weight-bold">{{$journey->title}}</td>
                                <td>@csrf()
                                    {!! \Collective\Html\FormFacade::open(['action' => ['JourneyController@destroy', $journey->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                                    {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn-custom btn-custom-delete'])}}
                                    {!! \Collective\Html\FormFacade::close() !!}</td>
                            </tr>

                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordion-body collapse p-4" id="{{'toggle'.$journey->id}}">
                                        {!!  \Collective\Html\FormFacade::open(['action' =>['JourneyController@update',$journey->id], 'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
                                        @csrf

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                                                {{ \Collective\Html\FormFacade::text('title', $journey->title, ['class' => 'form-control', 'required' => 'true']) }}
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
                                                {{ \Collective\Html\FormFacade::textarea('text', $journey->text, ['class' => 'description form-control', 'required' => 'true']) }}
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
