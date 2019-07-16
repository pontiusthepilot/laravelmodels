@extends('layout')

@section('content')

	<h1 class="title">Edit project</h1>

	<form method="POST" action="/projects/{{ $project->id }}">
		@method('PATCH')   	<!-- Equivalent to {{ method_field('PATCH') }} guards against Cross Site Request Forgery attacks -->
		@csrf 				<!-- Equivalent to {{ csrf_field() }} guards against Cross Site Request Forgery attacks -->
		
		<div class="field">

			<label class="label" for="title">Title</label>

			<div class="control">
				
				<input type="text" name="title" class="input" placeholder="Title" value="{{ $project->title }}">

			</div>

		</div>

		<div class="field">
			
			<label class="label" for="description">Description</label>

			<div class="control">
				
				<textarea name="description" class="textarea">{{ $project->description }}</textarea>

			</div>

		</div>

		<div class="field">
			
			<button type="submit" class="button is-link">Update Project</button>

		</div>

	</form>

	<form method="POST" action="/projects/{{ $project->id }}">
		@method('DELETE')	<!-- Equivalent to {{ method_field('PATCH') }} guards against Cross Site Request Forgery attacks -->
		@csrf				<!-- Equivalent to {{ csrf_field() }} guards against Cross Site Request Forgery attacks -->
		
		<div class="field">
			
			<button type="submit" class="button">Delete Project</button>

		</div>

	</form>

@endsection