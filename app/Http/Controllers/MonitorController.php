<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utils\ReplicadoTemp;
use Uspdev\Replicado\Pessoa;

class MonitorController extends Controller
{
    public function index()
    {
        $bolsistas = ReplicadoTemp::listarMonitores(config('ponto.codslamon'));
        foreach ($bolsistas as $bolsista) {
            $monitores[$bolsista] = Pessoa::obterNome($bolsista);
        }
        return view('monitores.index',[
            'monitores' => $monitores
        ]);
    }
}
