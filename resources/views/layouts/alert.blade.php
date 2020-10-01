@if($flash = session('success'))
<div class="alert alert-primary text-center alert-dismissible fade show" role="alert">
    {{ $flash }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($flash = session('alert'))
<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">
    {{ $flash }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif