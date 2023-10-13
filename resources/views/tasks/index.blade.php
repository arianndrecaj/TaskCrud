<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
@foreach($tasks as $key=>$task)

<div class="modal fade" id="deleteModal-{{$task->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this task?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a id="deleteTaskButton" href={{route('task.delete', $task->id)}} class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<div class="container mt-5">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Priority</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody class="table-group-divider">
        @foreach($tasks as $key=>$task)

            <tr>
                <th scope="row">{{$key+1}}</th>
                <td>{{$task->Name}}</td>
                <td>{{$task->Description}}</td>
                <td>{{$task->Priority}}</td>
                <td><a href={{route('task.edit', $task->id)}}>Edit</a> </td>
                <td><a class="delete-task-link" data-bs-toggle="modal" data-bs-target="#deleteModal-{{$task->id}}" data-taskid="{{$task->id}}" href="#">Delete</a></td>
            </tr>
        @endforeach


        </tbody>
    </table>
    <a class="icon-link icon-link-hover" style="--bs-link-hover-color-rgb: 25, 135, 84;" href={{route('create.task')}}>
        Add Task
        <svg class="bi" aria-hidden="true"><use xlink:href="#arrow-right"></use></svg>
    </a>
{{--    <h1>Edit Task</h1>--}}
{{--    <form action="{{ route('tasks.update') }}" method="POST">--}}
{{--        @csrf--}}
{{--        @method('PUT')--}}
{{--        <div class="mb-3">--}}
{{--            <label for="name" class="form-label">Task Name:</label>--}}
{{--            <input type="text" class="form-control" id="name" name="name" value="{{ $task->name }}" required>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <label for="description" class="form-label">Description:</label>--}}
{{--            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $task->description }}</textarea>--}}
{{--        </div>--}}
{{--        <div class="mb-3">--}}
{{--            <label for="priority" class="form-label">Priority:</label>--}}
{{--            <select class="form-select" id="priority" name="priority" required>--}}
{{--                <option value="low" {{ $task->priority == 'low' ? 'selected' : '' }}>Low</option>--}}
{{--                <option value="medium" {{ $task->priority == 'medium' ? 'selected' : '' }}>Medium</option>--}}
{{--                <option value="high" {{ $task->priority == 'high' ? 'selected' : '' }}>High</option>--}}
{{--            </select>--}}
{{--        </div>--}}
{{--        <button type="submit" class="btn btn-primary">Update Task</button>--}}
{{--        <a href="{{ route('tasks.destroy', $task->id) }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">Delete Task</a>--}}
{{--    </form>--}}

{{--    <!-- Delete Form (hidden) -->--}}
{{--    <form id="delete-form" action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: none;">--}}
{{--        @csrf--}}
{{--        @method('DELETE')--}}
{{--    </form>--}}
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>



</html>
