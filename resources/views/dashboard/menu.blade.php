@extends('admin')
@section('title','Administrácia | Menu')

@section('content')
    @include('dashboard.includes.menu')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <h1 class="mt-4">Menu</h1>
            <button class="btn-custom btn-custom-blue-admin mt-3" id="new">
                Pridať novú položku
            </button>
            <div class="item-normal display-none mt-2" id="hidden">

                {!!  \Collective\Html\FormFacade::open(['action' => 'MenuController@store', 'method' => 'POST','enctype' => "multipart/form-data"])  !!}
                @csrf

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('title', '', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('link', 'Link', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('link', '', ['class' => 'form-control', 'required' => 'true']) }}
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="form-group">
                        {{ \Collective\Html\FormFacade::label('link', 'Link', ['class' => 'form-control-label']) }}
                        {{ \Collective\Html\FormFacade::text('link', '', ['class' => 'form-control', 'required' => 'true']) }}
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
                        @foreach($menus as $menu)
                            <tr data-bs-toggle="collapse" data-bs-target="{{'#toggle'.$menu->id}}" class="accordion-toggle">
                                <td class="font-weight-bold">{{$menu->title}}</td>
                                <td><a href="{{url($menu->link)}}">{{$menu->link}}</a></td>
                                <td>@csrf()
                                    {!! \Collective\Html\FormFacade::open(['action' => ['MenuController@destroy', $menu->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                                    {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn-custom btn-custom-delete'])}}
                                    {!! \Collective\Html\FormFacade::close() !!}</td>
                            </tr>

                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordion-body collapse p-4" id="{{'toggle'.$menu->id}}">
                                        {!!  \Collective\Html\FormFacade::open(['action' =>['MenuController@update',$menu->id], 'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
                                        @csrf
                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                                                {{ \Collective\Html\FormFacade::text('title', $menu->title, ['class' => 'form-control', 'required' => 'true']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                {{ \Collective\Html\FormFacade::label('link', 'Link', ['class' => 'form-control-label']) }}
                                                {{ \Collective\Html\FormFacade::text('link', $menu->link, ['class' => 'form-control', 'required' => 'true']) }}
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-12">
                                            <div class="form-group">
                                                {{ \Collective\Html\FormFacade::label('link', 'Link', ['class' => 'form-control-label']) }}
                                                {{ \Collective\Html\FormFacade::text('link', $menu->parent_id, ['class' => 'form-control', 'required' => 'true']) }}
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
