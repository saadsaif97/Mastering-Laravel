@extends('layouts.app')


@section('content')
<div class="jumbotron jumbotron-fluid" style="margin-top: -2rem;">
    <div class="container">
        <h1 class="display-3" style="font-weight: 400;">Mastering Laravel</h1>
        <p class="lead">Create enough routing and CRUD again and againg with different angles to make muscle memory.</p>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8">
            <h2>Modules</h2>
            <ul>
                <li> <a href="/post"> In posts page, you can see CRUD of titles using bootstrap modals </a> </li>
                <li> <a href="/todo"> In todos page, you can see CRUD of todos using all of all routes for todo resource
                    </a> </li>
            </ul>
        </div>
        <div class="col-12 col-lg-4"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(15rem,1fr)); grid-gap: 20px;">

            <div class="card" style="width: 15rem;">
                <div class="card-header">
                    Latest todos
                </div>
                <ul class="list-group list-group-flush">
                    @forelse($todos as $todo)
                    <li class="list-group-item"><a href="/todo/{{ $todo->id }}">{{ $todo->title }}</a></li>
                    @empty
                    <li>No todo in list</li>
                    @endforelse

                </ul>
            </div>

            <div>
                <h3>Laravel is fantastic</h3>
                <p class="mt-3">But don't put all of your eggs in one basket
                </p>
            </div>
        </div>
    </div>
</div>

@stop
