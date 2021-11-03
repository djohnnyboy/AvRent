@if($errors->any())
<div class="container">
    <div class="alert alert-danger text-center">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            @foreach($errors->all() as $error)
            <ul style="margin:0 auto;list-style-type: none;">
                <li>{{ $error }}</li>
            </ul>    
            @endforeach
        </strong>
    </div>
</div>
@endif