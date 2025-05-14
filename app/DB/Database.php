<?php

namespace App\DB;

use \PDO;
use PDOException;

class Database {

    /**
     * Host da conexão com o banco de dados
     * @var string
     */
    const HOST = '127.0.0.1';

    /**
     * Nome do banco de dados
     * @var string
     */
    const NAME = 'db_vagacerta';

    /**
     * Usuário do banco de dados
     * @var string
     */
    const USER = 'luan';

    /**
     * Senha de acesso ao banco de dados
     * @var string
     */
    const PASS = '1234';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * Instancia de conexão com o baco de dados
     * @var PDO
     */
    private $connection;

    /**
     * Define a tabela e instania a conexão
     * @param string $table
     */
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }

    /**
     * Método responsável por criar uma conexão com o banco de dados
     * @param string $table
     */
    private function setConnection() {

        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("ERROR :".$e->getMessage()); // nunca mostre essa mensagem em produção
        }

    }

    /**
     * Método responsável por inserir dados no banco
     * @param array $values [ filed => value ]
     * @return interger
     */
    public function insert($values) {

    }
}