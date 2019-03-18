@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>会員登録</h1>
    </div>
    
    <div class="row">
        <div class="col-lg-6 col-xs-6 mx-auto">
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'ユーザー名']) !!}
                </div>
                <div class="form-group">
                    {!! Form::text('uid', old('uid'), ['class' => 'form-control' , 'placeholder' => 'ユーザーID(半角英数のみ)']) !!}
                </div>
                <div class="form-group">
                    {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'メールアドレス']) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'パスワード']) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'パスワード(確認用)']) !!}
                </div>
                
                <div class="submit-button">
                    {!! Form::submit('会員登録', ['class' => 'btn btn-block contribute-button col-4 mx-auto']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection