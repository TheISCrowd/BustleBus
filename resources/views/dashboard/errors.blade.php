<!-- admin created successfully -->
@if(session()->has('successadmin'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session()->get('successadmin') }}
</div>
@endif

@if(session()->has('failadmin'))
<div class="alert alert-danger alert-dismissible fade show">
    {{ session()->get('failadmin') }}
</div>
@endif

@if(session()->has('successdriver'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session()->get('successdriver') }}
</div>
@endif

@if(session()->has('faildriver'))
<div class="alert alert-danger alert-dismissible fade show">
    {{ session()->get('faildriver') }}
</div>
@endif
