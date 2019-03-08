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


                <form class="col s12" method="POST" action="{{ route('loginAssinante') }}">

                {{ csrf_field() }}

                <div class='row'>
                    <div class='col s12'>
                    </div>
                  </div>

                  <div class='row'>
                    <div class='input-field col s12'>
                      <input class='validate' type='text' name='cpf' value="{{ old('cpf') }}" id='cpf' />
                      @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                      <label for='cpf'>Digite seu cpf</label>
                    </div>
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
