
{{--we can add All massage in file one ..--}}
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

@if (session('errors'))
    <div class="alert alert-danger" role="alert">
        {{ session('errors') }}
    </div>
@endif
