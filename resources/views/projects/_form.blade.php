@csrf
    @if($project->image)
        <img class="card-img-top mb-2" src="/storage/{{ $project->image }}" 
        alt="" 
        style="height: 280px; object-fit: cover">
    @endif
<div class="custom-file mb-2">
    <input name="image" type="file" class="custom-file-input" id="customFile">
    <label class="custom-file-label" for="customFile">Sube imagen</label>
</div>
<div class="form-group">
<label for="category_id">Categoria del proyecto</label>
<select name="category_id" id="category_id" class="form-control border-0 bg-light shadow-sm">

    <option value="">Seleccione</option>
        @foreach($categories as $id => $name)
            <option value="{{ $id }}"
            @if( $id == old('category_id', $project->category_id)) selected @endif
            >
            
            {{ $name }}
                

            </option>
        @endforeach
</select>
</div>

<div class="form-group">
    <label for="title">
        Titulo del proyecto</label>
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="title" value="{{ old('title', $project->title) }}">
</div>
<div class="form-group">
    <label class="description">
        descripcion del proyecto</label> 
        <textarea class="form-control border-0 bg-light shadow-sm" type="text" name="description">{{ old('description', $project->description) }}</textarea>
</div>
<div class="form-group">
    <label for="url">
        url del proyecto</label> 
    <input class="form-control border-0 bg-light shadow-sm" type="text" name="url" value="{{ old('url', $project->url) }}">
</div>
