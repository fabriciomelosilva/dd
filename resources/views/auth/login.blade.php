@extends('layouts.app')

@section('content')
<div class="container">

        <div class="section"></div>
        <main>
          <center>
            <div class="section"></div>
      
            <h5 class="indigo-text">Login</h5>
            <div class="section"></div>
      
            <div class="container">
              <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">
      

                <form class="col s12" method="POST" action="{{ route('login') }}">

                        {{ csrf_field() }}
                  <div class='row'>
                    <div class='col s12'>
                    </div>
                  </div>
      
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input class='validate' type='email' name='email' value="{{ old('email') }}" id='email' />
                      @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                      <label for='email'>Digite seu email</label>
                    </div>
                  </div>
      
                  <div class='row'>
                    <div class='input-field col s12'>
                      <input class='validate' type='password' name='password' id='password' />
                      <label for='password'>Digite sua senha</label>
                    </div>
                    <label style='float: right;'>
                                      <a class='pink-text' href="{{ route('password.request') }}"><b>Esqueceu sua senha?</b></a>
                    </label>
                  </div>
      
                  <br />
                  <center>
                    <div class='row'>
                      <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect'>Login</button>
                    </div>
                  </center>
                </form>
              </div>
            </div>
          </center>
      
          <div class="section"></div>
          <div class="section"></div>
        </main>
      


@endsection