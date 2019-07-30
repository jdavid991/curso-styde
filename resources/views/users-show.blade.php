@include('head');
    <div class="row mt-3">
        <div class="col-8">
             <h1>usuario #{{ $id }}</h1>
    
             Mostrando detelle de usuario: {{ $id }}

        </div>
        <div class="col-4">
            @include('sidebar')
        </div>
    </div>
@include('footer');
