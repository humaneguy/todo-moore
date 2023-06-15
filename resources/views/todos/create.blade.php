@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Create Todo</h2>
            <div class="card">
                <div class="card-body">
                    <form id="create-form" action="{{ route('todos.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Todo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#create-form').submit(function (e) {
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
