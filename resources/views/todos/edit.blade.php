@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Edit Task</h2>
            <div class="card">
                <div class="card-body">
                    <form id="edit-form" action="{{ route('todos.update', $todo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $todo->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required>{{ $todo->description }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#edit-form').submit(function (e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function (response) {
                    // Handle success response, e.g., show success message or redirect
                    console.log(response);
                    // Redirect to the todos list page
                    window.location.href = "{{ route('todos.index') }}";
                },
                error: function (xhr) {
                    // Handle error response, e.g., show error message
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
