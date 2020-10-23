<!-- admin created successfully -->
@if(session()->has('successadmin'))
<div class="alert alert-success">
    {{ session()->get('successadmin') }}
</div>
@endif

@if(session()->has('failadmin'))
<div class="alert alert-danger">
    {{ session()->get('failadmin') }}
</div>
@endif

@if(session()->has('successdriver'))
<div class="alert alert-success">
    {{ session()->get('successdriver') }}
</div>
@endif

@if(session()->has('faildriver'))
<div class="alert alert-danger">
    {{ session()->get('faildriver') }}
</div>
@endif
