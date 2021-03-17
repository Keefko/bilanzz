@extends('admin')
@section('title','Administrácia | Kalkulačka')

@section('content')
    @include('dashboard.includes.menu')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <h1 class="mt-4">Úvodná stránka</h1>
            <div class="item-normal mt-2">
                <div class="table-responsive mt-3">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Nadpis</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($sections as $section)
                            <tr data-bs-toggle="collapse" data-bs-target="{{'#toggle'.$section->id}}" class="accordion-toggle">
                                <td class="font-weight-bold">{{$section->title}}</td>
                            </tr>

                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordion-body collapse p-4" id="{{'toggle'.$section->id}}">
                                        {!!  \Collective\Html\FormFacade::open(['action' =>['SectionController@update',$section->id], 'method' => 'PUT'])  !!}
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('title', 'Nadpis', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::text('title', $section->title, ['class' => 'form-control', 'required' => 'true']) }}
                                                </div>
                                            </div>


                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('img', 'Obrázok' , ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::file('img') }}
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('text', 'Text', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::textarea('text', $section->text, ['class' => 'form-control']) }}
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-12">
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('button_one_text', '1. Tlačitko text', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::text('button_one_text', $section->button_one_text, ['class' => 'form-control mt-3']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('button_one_url', '1. Tlačitko url', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::text('button_one_url', $section->button_one_url, ['class' => 'form-control mt-3']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('button_two_text', '2. Tlačitko text', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::text('button_two_text', $section->button_two_text, ['class' => 'form-control mt-3']) }}
                                                </div>
                                                <div class="form-group">
                                                    {{ \Collective\Html\FormFacade::label('button_two_url', '2. Tlačitko url', ['class' => 'form-control-label']) }}
                                                    {{ \Collective\Html\FormFacade::text('button_two_url', $section->button_two_url, ['class' => 'form-control mt-3']) }}
                                                </div>
                                            </div>


                                            <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť sekciu</button>
                                        </div>
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
