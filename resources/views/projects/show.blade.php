@extends('layout')

@section('content')

	<h1 class="title">{{ $project->title }}</h1>

	<div class="content">{{ $project->description }}
		<p>

			<a href="/projects/{{ $project->id }}/edit">Edit</a>

		</p>
	</div>

	@if ($project->tasks->count())
		<div class="box">

			<label class="label">Tasks</label>

			@foreach ($project->tasks as $task)

				<form method="POST" action='/tasks/{{ $task->id }}'>
					@method('PATCH')
					@csrf

					<label class="checkbox {{ $task->completed ? 'is-complete' : '' }}" for="completed">

							<input 	type="checkbox"
									name="completed"
									onchange="this.form.submit()" {{ $task->completed ? 'checked' : '' }}
							>

							{{ $task->description }}

					</label>

				</form>

			@endforeach
		</div>
	@endif

	<form method="POST" action="/projects/{{ $project->id }}/tasks" class="box">
		@csrf

		<div class="field">

			<label class="label" for="description">New Task</label>

			<div class="control">

				<input 	type="text"
						class="input"
						name="description"
						placeholder="New Task"
						required
				>

			</div>

		</div>

		<button type="submit" class="button is-link">Add Task</button>

		@include('errors')

	</form>

@endsection
