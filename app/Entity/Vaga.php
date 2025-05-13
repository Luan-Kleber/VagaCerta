<?php

namespace App\Entity;

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

        //Inserir a vaga no banco

        //Atribuir O ID da vaga na instancia

    }
}