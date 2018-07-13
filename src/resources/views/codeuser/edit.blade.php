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

                    <h4>Edit User {{ $user->name }}</h4>
                    {!! Form::model($user, ['route' => ['admin.users.update', $user->id], 'method' => 'put']) !!}

                    @include('codeuser::_form')

                    <div class="form-group">
                        {!! Form::submit('Edit User', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
