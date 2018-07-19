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

                    <h4>Edit Role {{ $role->name }}</h4>
                    {!! Form::model($role, ['route' => ['admin.roles.update', $role->id], 'method' => 'put']) !!}

                    @include('codeuser::admin.role._form')

                    <div class="form-group">
                        {!! Form::submit('Edit Role', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
