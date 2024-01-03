@if(!empty(session('success')))
    <div class="alert alert-success mt-4 mb-0" role="alert">
        {{session('success')}}
    </div>
@endif

@if(!empty(session('error')))
    <div class="alert alert-danger mt-4 mb-0" role="alert">
        {{session('error')}}
    </div>
@endif
