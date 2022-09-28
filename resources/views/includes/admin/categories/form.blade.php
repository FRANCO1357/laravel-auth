@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
@endif


@if ($category->exists )
<form action="{{route('admin.categories.update', $category)}}" method="POST">
    @method('PUT')
@else
<form action="{{route('admin.categories.store')}}" method="POST">
@endif



    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="title">Label</label>
                <input type="text" class="form-control" id="label" name="label" value="{{old('label', $category->label)}}" required minlength="3" maxlength="50">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <label for="title">Color</label>
                <input type="text" class="form-control" id="color" name="color" value="{{old('label', $category->color)}}" required minlength="3" maxlength="50">
            </div>
        </div>
    </div>
<hr>
<footer class="d-flex justify-content-between">
    <a class="btn btn-secondary" href="{{route('admin.categories.index')}}">
        <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
    </a>
    <button class="btn btn-success" type="submit">
        <i class="fa-solid fa-floppy-disk mr-2"></i>Salva
    </button>
</footer>
</form> 