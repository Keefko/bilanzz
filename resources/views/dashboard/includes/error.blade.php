@if(count($errors) > 0)
    <ul class="alert alert-danger mt-2">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

@if($message = \Illuminate\Support\Facades\Session::get('success'))
    <div class="alert alert-success mt-2">
        {{ $message}}
    </div>
@endif
