@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div style="text-align: center" class = "alert alert-success">
        {{session('success')}}
    </div>
@elseif(session('warning'))
    <div style="text-align: center" class = "alert alert-warning align-middle">
        {{session('warning')}}
    </div>
@endif
