@extends('admin')
@section('title','Administrácia')

@section('content')
    @include('dashboard.includes.menu')
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <h1 class="mt-4">Dashboard</h1>

            <h1 class="mt-4">Užívatelia</h1>

            <button class="btn btn-custom btn-custom-blue-border mt-3" id="new">
                    Pridať užívatela
            </button>



            <div class="item-normal mt-2" id="item">
                {!!  \Collective\Html\FormFacade::open(['action' => 'UserController@store' , 'method' => 'POST'])  !!}
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('login', 'Užívateľské meno', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('login',null, ['class' => 'form-control', 'required' => 'true']) }}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('password', 'Heslo', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::password('password',['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            {{ \Collective\Html\FormFacade::label('email', 'Email', ['class' => 'form-control-label']) }}
                            {{ \Collective\Html\FormFacade::text('email', null, ['class' => 'form-control','required' => 'true']) }}
                        </div>
                    </div>
                    <button type="submit" class="btn btn-custom btn-custom-blue-border mt-2 mb-2">Pridať užívatela</button>
                {!! \Collective\Html\FormFacade::close() !!}


            </div>
            <div class="item-normal mt-2">
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Login</th>
                            <th scope="col">Email</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        @foreach($users as $user)
                            <tr data-bs-toggle="collapse" data-bs-target="{{'#toggle'.$user->id}}" class="accordion-toggle">
                                <td class="font-weight-bold">{{$user->name}}</td>
                                <td class="font-weight-bold">{{$user->email}}</td>
                                <td>
                                    @csrf()
                                    {!! \Collective\Html\FormFacade::open(['action' => ['UserController@destroy', $user->id], 'method' => 'DELETE', 'class' => 'form-inline' ]) !!}
                                    {{\Collective\Html\FormFacade::submit('Vymazať', ['class' => 'btn btn-custom btn-custom-delete'])}}
                                    {!! \Collective\Html\FormFacade::close() !!}
                                </td>
                            </tr>

                            <tr>
                                <td colspan="6" class="hiddenRow">
                                    <div class="accordion-body collapse p-4" id="{{'toggle'.$user->id}}">
                                        {!!  \Collective\Html\FormFacade::open(['action' =>['UserController@update', $user->id], 'method' => 'PUT'])  !!}
                                        @csrf


                                        <div class="form-group">
                                            {{ \Collective\Html\FormFacade::label('login', 'Užívateľské meno', ['class' => 'form-control-label']) }}
                                            {{ \Collective\Html\FormFacade::text('login', $user->name, ['class' => 'form-control', 'required' => 'true']) }}
                                        </div>

                                        <div class="form-group">
                                            {{ \Collective\Html\FormFacade::label('email', 'Email', ['class' => 'form-control-label']) }}
                                            {{ \Collective\Html\FormFacade::text('email', $user->email, ['class' => 'form-control','required' => 'true']) }}
                                        </div>

                                        <div class="form-group">
                                            {{ \Collective\Html\FormFacade::label('password', 'Heslo', ['class' => 'form-control-label']) }}
                                            {{ \Collective\Html\FormFacade::password('password',['class' => 'form-control']) }}
                                        </div>

                                        <button type="submit" class="btn btn-custom btn-custom-grey-full mt-2 mb-2">Upraviť užívatela</button>
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
    @include('dashboard.includes.end')
@endsection
