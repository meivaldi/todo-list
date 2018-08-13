@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card task">
                <div class="card-header">Add New Task</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @endif

                    <form method="POST" action="{{ route('tasks.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="title">Task</label>
                            <input id="title" name="title" type="text" maxlength="255" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" autocomplete="off" />
                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>Error: {{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card task">
                <div class="card-header">My Todo List</div>

                <div class="card-body">
                    @if (session('updated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('updated') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    @endif

                    <table class="table table-striped">
                        @foreach($tasks as $task)
                            <tr>
                                <td>
                                    {{ $task->title }}
                                </td>
                                <td class="text-right">
                                    <form method="post" action="{{ route('tasks.update', $task->id) }}">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Complete Task</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $tasks->links() }}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card task-completed">
                <div class="card-header">Completed Task</div>

                <div class="card-body">

                    <table class="table table-striped">
                        @foreach($tasks_completed as $completed)
                            <tr>
                                <td>
                                    <s>{{ $completed->title }}</s>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                    {{ $tasks_completed->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
