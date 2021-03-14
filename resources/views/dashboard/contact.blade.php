@extends('admin')
@section('title','Administrácia | Kontakt')

@section('content')
    @include('dashboard.includes.menu')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <div class="contact">
                <h1 class="mt-4">Kontakt</h1>
                <div class="item-normal mt-2">
                    {!!  \Collective\Html\FormFacade::open(['action' => ['ContactController@update', $contact->id ] , 'method' => 'PUT'])  !!}
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('title', $contact->title, ['class' => 'form-control', 'required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label mb-3']) }}
                                {{ \Collective\Html\FormFacade::file('img') }}
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('address', 'Adresa' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('address', $contact->address, ['class' => 'form-control description mt-2', 'required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('bank', 'IBAN' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('bank', $contact->bank, ['class' => 'form-control description mt-2', 'required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('phone', 'Telefónne číslo', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('phone', $contact->phone, ['class' => 'form-control', 'required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('mail', 'E-mail', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('mail', $contact->mail, ['class' => 'form-control', 'required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('info', 'Fakturačné údaje' , ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::textarea('info', $contact->info, ['class' => 'form-control description mt-2', 'required' => 'true']) }}
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="form-group">
                                {{ \Collective\Html\FormFacade::label('map', 'Mapa', ['class' => 'form-control-label']) }}
                                {{ \Collective\Html\FormFacade::text('map', $contact->map, ['class' => 'form-control']) }}
                            </div>
                        </div>

                        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť užívatela</button>
                        {!! \Collective\Html\FormFacade::close() !!}
                    </div>
                </div>
            </div>

            <div class="faq mt-5">
                <h1 class="mt-4">Často kladené otázky</h1>
                <div class="item-normal mt-2">
                    <div class="table-responsive mt-3">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Otázka</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody class="bg-white">
                            @foreach($contact->faqs as $faq)
                                <tr>
                                    <td>{{$faq->title}}</td>
                                    <td></td>
                                    <td><button class="btn btn-danger">Vymazať</button></td>
                                </tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordion-body collapse p-4" id="{{'toggle'.$faq->id}}">

                                        {!!  \Collective\Html\FormFacade::open(['action' =>['SectionController@update', $faq->id ],'method' => 'PUT', 'enctype' => "multipart/form-data"])  !!}
                                        @csrf
                                        <div class="form-group">
                                            {{ \Collective\Html\FormFacade::label('title', 'Otázka', ['class' => 'form-control-label']) }}
                                            {{ \Collective\Html\FormFacade::text('title', $faq->title, ['id' => 'title', 'class' => 'form-control mt-2', 'required' => 'true']) }}
                                        </div>

                                        <div class="form-group">
                                            {{ \Collective\Html\FormFacade::label('text', 'Odpoveď' , ['class' => 'form-control-label']) }}
                                            {{ \Collective\Html\FormFacade::textarea('text', $faq->text, ['class' => 'form-control description mt-2']) }}
                                        </div>

                                        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť otázku</button>
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
    </div>
    @include('dashboard.includes.end')
@endsection
