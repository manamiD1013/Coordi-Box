@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>
    
    <div class="row">
        <div class="col-lg-6 col-xs-10  mx-auto">
            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::text('uid', old('uid'), ['class' => 'form-control' , 'placeholder' => 'ユーザーID(半角英数のみ)']) !!}
                </div>

                <div class="form-group">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'パスワード']) !!}
                </div>
                <div class="submit-button">
                    {!! Form::submit('ログイン', ['class' => 'btn btn-block contribute-button col-4 mx-auto']) !!}
                </div>
                
            {!! Form::close() !!}

            <p class="mt-2 col-lg-12 mx-auto" style="text-align:center">アカウントをお持ちでない方はこちらから {!! link_to_route('signup.get', '新規登録',[],['class' => 'link']) !!}してください</p>
        </div>
    </div>
@endsection