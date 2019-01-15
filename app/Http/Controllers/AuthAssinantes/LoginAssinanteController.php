<?php

namespace App\Http\Controllers\AuthAssinantes;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use App\User;
use App\Role;

use App\Http\Controllers\ConsultaApiAssinantes;

class LoginAssinanteController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/assinante';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function isAssinante($cpfcnpj)
    {
        $assinante = new ConsultaApiAssinantes();
        $token = 'a5f9e056-ce4f-491e-9003-b28354e5c2b2';//diario ipad

        $params_request = array('cpfcnpj'=>$cpfcnpj,'token'=>$token);
        $responseXML = $assinante->requestAssinante($params_request);
        $dados = simplexml_load_string($responseXML->AssinanteDNResult);

        //echo "isAssinante: ". $dados->Dados->Assinante;

        return $dados->Dados->Assinante;

    }

    public function showLoginForm()
    {
        return view('authfront.login');
    }

    public function login(Request $request)
    {

       $cpf = $request->input('cpf');

       $apiResponse = $this->isAssinante($cpf);

       $request->request->add(['password' => 'svmdes9605']);

       $userExist = User::where('name', $cpf)-> first();

       if ($apiResponse == 'False') {

        if ($userExist){

            $user = User::findOrFail($userExist->id);

            $user->status_assinante = "false";

            $user->update();
        }
           return "usuário não possui assinatura";
       }


       if (($apiResponse == 'True') && ($userExist === null)) {
            $user = User::create([
                'name' => $cpf,
                'email' => $cpf.'@verdesmares.com.br',
                'cpf' => $cpf,
                'password' => bcrypt('svmdes9605'),
                'status_assinante' => 'true',
                'type' => 'assinante',
            ]);
    
            $findRole = Role::where('name','assinante')->first();
            
            $user->roles()->attach($findRole);
       
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    else if (($apiResponse == 'True') && ($userExist)) {
        $user = User::findOrFail($userExist->id);
        $user->status_assinante = "true";

        $user->update();

        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);

    }
    
    }

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',

        ]);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }


    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->has('remember')
        );
    }
 
    public function username()
    {
        return 'cpf';
    }

}
