@csrf
<label for="">Titulo</label>
<input type="text" name="tittle" id=""  value="{{old("tittle",$post->tittle)}}">

<label for="">Slug</label>
<input type="text" name="slug" id="" value="{{old("slug", $post->slug)}}">

<label for="">Categoria</label>
<select name="category_id">
    @foreach ($categories as $tittle => $id)
        <option {{ old("category_id", $post->category_id) == $id ? "selected" : "" }} value="{{$id}}" >{{$tittle}} </option>
    @endforeach
</select>

<label for="">Posteado</label>
<select name="posted">
    <option {{old( "posted", $post->posted) == "not" ? "selected" : ""  }} value="yes">Si</option>
    <option {{old( "posted", $post->posted) == "yes" ? "selected" : ""  }} value="not">No</option>
</select>

<label for="">Contenido</label>
<textarea name="content" id="" cols="5" rows="5">{{old("content", $post->content)}}</textarea>

<label for="">descripcion</label>
<textarea name="description" id="" cols="5" rows="5">{{old("description", $post->description)}}</textarea>

@if (isset($task)  && $task == "image")
    <label for="">Imagen</label>
    <input type="file" name="image">
@endif

<button type="submit">Enviar</button>