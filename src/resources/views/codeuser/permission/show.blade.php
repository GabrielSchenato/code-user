@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <h4>Permission - {{ $permission->name }}</h4>

                    <ul class="list-unstyled">
                        <li>
                            <strong>Name:</strong> {{ $permission->name }}
                        </li>
                        <li>
                            <strong>Description:</strong> {{ $permission->description }}
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
