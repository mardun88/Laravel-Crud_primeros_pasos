@csrf

<label for="">Titulo</label>
<input type="text" name="tittle" id=""  value="{{old("tittle",$category->tittle)}}">

<label for="">Slug</label>
<input type="text" name="slug" id="" value="{{old("slug", $category->slug)}}">


<button type="submit">Enviar</button>