<!-- admin created successfully -->



@if(session()->has('successadmin'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('successadmin') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('failadmin'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('failadmin') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('successdriver'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('successdriver') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session()->has('faildriver'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ session()->get('faildriver') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif