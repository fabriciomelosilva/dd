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
        //$this->middleware('guest', ['except' => 'logout']);
    }

    public function connectWS($cpfcnpj)
    {          
        $token = 'a5f9e056-ce4f-491e-9003-b28354e5c2b2';//diario ipad
        $assinante = new ConsultaApiAssinantes();
        $params_request = array('cpfcnpj'=>$cpfcnpj,'token'=>$token);
        $responseXML = $assinante->requestAssinante($params_request);

        return $responseXML;
    }

    public function isAssinante($cpfcnpj)
    {
        $responseXML = $this->connectWS($cpfcnpj);

        $dados = simplexml_load_string($responseXML->AssinanteDNResult);

        if ($dados->Dados->Assinante == "True"){
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');

            $dia_atual = strtoupper(strftime('%a', strtotime('today')));

            if ($dia_atual == "SáB"){
                $dia_atual = "SAB";
            }

            $dias_assinante = explode(";", $dados->Dados->DiasSemana);
    
            foreach ($dias_assinante as $dia_assinante) { //Verifica se o assinante possui assinatura para o dia atual.
                if ($dia_atual == $dia_assinante){
                    return "True";
                }
            }
            return "False";
        }else {
            return "False";
        }

    }

    public function showLoginForm()
    {
        if(\Auth::check()) {
            return redirect('assinante');
        }
        return view('authfront.login');
    }

    public function login(Request $request)
    {
       $cpf = $request->input('cpf');

       try{
            $apiResponse = $this->isAssinante($cpf);
        }catch(\Exception $e){
            return redirect()->route('loginAssinante')->with('flash.message', 'Estamos com problemas técnicos. Tente novamente em alguns instantes. Caso não consiga, entre em contato no e-mail: desenvolvimento@verdesmares.com.br')->with('flash.class', 'danger');
       }

       $request->request->add(['password' => 'svmdes9605']);
       $userExist = User::where('name', $cpf)-> first();

       if ($apiResponse == 'False') {

        if ($userExist){

            $user = User::findOrFail($userExist->id);

            $user->status_assinante = "false";

            $user->update();
        }
           return redirect()->route('loginAssinante')->with('flash.message', 'Usuário não possui assinatura.')->with('flash.class', 'danger');
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

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('loginAssinante');
    }

}
