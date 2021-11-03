@if (session()->has('success'))
<div class="container">
    <div class="alert alert-dismissable alert-success text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('success') !!}
        </strong>
    </div>
</div>
@endif

