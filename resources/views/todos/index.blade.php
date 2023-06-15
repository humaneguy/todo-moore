@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Tasks</h2>
            <a href="{{ route('todos.create') }}" class="btn btn-primary mb-3">Add Task</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                    <tr id="todo-{{ $todo->id }}">
                        <td>{{ $todo->title }}</td>
                        <td>{{ $todo->description }}</td>
                        <td>
                            <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-sm btn-primary">Edit</a>
                            <button class="btn btn-sm btn-danger delete-todo" data-id="{{ $todo->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('.delete-todo').click(function () {
            var todoId = $(this).data('id');
            $.ajax({
                url: '/todos/' + todoId,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (response) {
                    // Handle success response, e.g., remove the todo row from the table
                    console.log(response);
                    $('#todo-' + todoId).remove();
                },
                error: function (xhr) {
                    // Handle error response, e.g., show error message
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>