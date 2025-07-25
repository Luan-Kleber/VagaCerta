<?php

namespace App\Entity;

use App\DB\Database;
use PDO;

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
        $this->data = date("Y-m-d H:i:s");

        //Inserir a vaga no banco
        $objDatabase = new Database("tbl_vagas");

        $this->id = $objDatabase->insert([
            "titulo"    => $this->titulo,
            "descricao" => $this->descricao,
            "status"    => $this->status,
            "data"      => $this->data
        ]);

        //Retornar Sucesso
        return true;
    }

    /**
     * Método responsável por atualizar a vaga no banco
     * @return boolean
     */
    public function atualizar() {
        return (new Database('tbl_vagas'))->update('id = '.$this->id, [
            "titulo"    => $this->titulo,
            "descricao" => $this->descricao,
            "status"    => $this->status,
            "data"      => $this->data
        ]);
    }

    /**
     * Método responsável por excluir a vaga no banco
     * @return boolean
     */
    public function excluir() {
        return (new Database('tbl_vagas'))->delete('id = '.$this->id);
    }

    /**
     * Método responsável por obter as vagas dentro do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function getVagas($where = null, $order = null, $limit = null) {
        return (new Database('tbl_vagas'))->select($where,$order,$limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por buscar uma vaga com base em seu ID
     * @param integer $id
     * @return Vaga
     */
    public static function getVaga($id) {
        return (new Database('tbl_vagas'))->select('id = '.$id)->fetchObject(self::class);
    }
}