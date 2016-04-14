@extends('admin.template.main')

@section('title', 'Editar Articulo - '. $article->title)
@section('content')
{!! Form::open(['route'=> ['admin.articles.update',$article],'method' => 'PUT']) !!}

	<div class ="form-group">
		{!! Form::label('title','Titulo') !!}
		{!! Form::text('title',$article->title,['class'=> ' form-control','placeholder' => 'Titulo del articulo','required']) !!}
	</div>


	<div class ="form-group">
		{!! Form::label('category_id','Categoria') !!}
		{!! Form::select('category_id', $categories,$article->category->id,['class'=>'form-control','placeholder'=>'Seleccione una opcion','required']) !!}
	</div>



	<div class ="form-group">
		{!! Form::label('content','Contenido') !!}
		{!! Form::textarea('content',$article->content,['class'=> ' form-control textarea-content']) !!}
	</div>

	<div class ="form-group">
		{!! Form::label('tags','Tags') !!}
		{!! Form::select('tags[]', $tags,$my_tags,['class'=>'form-control','multiple','required']) !!}
	</div>

	<div class ="form-group">
		{!! Form::submit('Editar Articulo',['class'=> 'btn btn-primary']) !!}
		
	</div>


{!! Form::close() !!}

@endsection
@section('js')

<script>
$(".select-tag").chosen({
	placeholder_text_multiple: 'Seleccione un maximo de 3 tags', 
	max:selected_options: 3,
	search_contains:true,
	no_results_text: 'No se encontraron tags'
});

$(".select-category").chosen({
	placeholder_text_multiple: 'Seleccione una categoria', 


$('.textarea-content').trumbowyg();
</script>

@endsection