<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultaApiAssinantes extends Controller
{
    private $server_url = 'http://www.agenciadiario.com.br/wsassinantes/Assinante.asmx?WSDL';
    private $client_soap 	 = null;
    private $request_result	 = null;

    public function requestAssinante(array $params=array() )
    {

        if( $this->client_soap == null )
            $this->client_soap = new \SoapClient( $this->server_url );

        //$this->request_result = $this->client_soap->DNDeg( $this->getParamsRequest() );
        $this->request_result = $this->client_soap->AssinanteDN( $params );

        if( !$this->request_result || $this->request_result == null )
            throw new Exception("Desculpe, ocorreu um erro na consulta ao webservice.");

        return $this->request_result;
    }
}
