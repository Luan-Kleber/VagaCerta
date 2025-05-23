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
     * Método responsável por executar querys dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []) {

        try {

            $statement = $this->connection->prepare($query);
            $statement->execute($params);

            return $statement;

        } catch (PDOException $e) {
            die("ERROR :".$e->getMessage());
        }

    }

    /**
     * Método responsável por inserir dados no banco
     * @param array $values [ filed => value ]
     * @return interger ID inserido
     */
    public function insert($values) {

        //DADOS DA QUERY
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        $query = "INSERT INTO $this->table (".implode(',', $fields).") VALUES (".implode(',', $binds).")";

        $this->execute($query, array_values($values));

        return $this->connection->lastInsertID();
    }

    /**
     * Método responsável por execeutar uma consulta no banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*') {

        //DADOS DA QUERY
        $where = strlen($where) > 0 ? "WHERE ".$where : '';
        $order = strlen($order) > 0 ? "ORDER BY ".$order : '';
        $limit = strlen($limit) > 0 ? "LIMIT ".$limit : '';

        //MONTA QUERY
        $query = "SELECT $fields FROM $this->table $where $order $limit";

        return $this->execute($query);
    }

    /**
     * Método responsável por execeutar atualizações no banco de dados
     * @param string $where
     * @param array $values [ field => $value ]
     * @return boolean
     */
    public function update($where, $values) {

        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA QUERY
        $query = "UPDATE $this->table SET ".implode('=?,',$fields)."=? WHERE $where";

        //EXECUTAR A QUERY
        $this->execute($query, array_values($values));

        return true;
    }

    /**
     * Método responsável por excluir dados do banco de dados
     * @param string $where
     * @return boolean
     */
    public function delete($where) {

        //MONTA QUERY
        $query = "DELETE FROM $this->table WHERE $where";

        //EXECUTAR A QUERY
        $this->execute($query);

        return true;
    }
}