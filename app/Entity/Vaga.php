<?php

namespace App\Entity;

use App\DB\Database;

class Vaga {

    /**
     * Identificador único da vaga
     * @var integer
     */
    public $id;

    /**
     * Título da vaga
     * @var string
     */
    public $titulo;

    /**
     * Descrição da vaga (pode contar html)
     * @var string
     */
    public $descricao;

    /**
     * Status da vaga
     * @var string(t/f)
     */
    public $status;

    /**
     * Data de criação da vaga
     * @var string
     */
    public $data;


    /**
     * Método responsável por cadastar a nova vaga no banco
     * @return boolean
     */
    public function cadastrar() {

        //Definir data
        $this->data = ("Y-m-d H:i:s");

        //Inserir a vaga no banco
        $objDatabase = new Database("tbl_vagas");

        $objDatabase->insert([
            "titulo"    => $this->titulo,
            "descricao" => $this->descricao,
            "status"    => $this->status,
            "data"      => $this->data
        ]);

        //Atribuir O ID da vaga na instancia

        //Retornar Sucesso

    }
}