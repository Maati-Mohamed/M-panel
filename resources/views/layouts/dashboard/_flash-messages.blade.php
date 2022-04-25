@if(session()->has('success'))
    <div class="alert alert-success text-center">
         {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger text-center">
         {{ session()->get('error') }}
    </div>
@endif
