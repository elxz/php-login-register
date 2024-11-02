<?php
namespace App\Classes;

require_once __DIR__ . "/../autoloader.php";

use App\Classes\DBConnection;

class DB extends DBConnection
{
    /**
     * Метод для селекта одной записи из БД
     * 
     * @param string $sql
     * @param array $params
     * @return array|bool
     */
    public function get($sql, $params = []): array|bool 
    {
        $result = $this->_db->prepare($sql);

        try 
        {
            $result->execute($params);
        } 
        catch (\PDOException $err) 
        {
            die($err);
        }

        return $result->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * Метод для селекта нескольких записей из БД
     * 
     * @param string $sql
     * @param array $params
     * @return array|bool
     */
    public function getAll($sql, $params = []): array|bool 
    {
        $result = $this->_db->prepare($sql);

        try 
        {
            $result->execute($params);
        } 
        catch (\PDOException $err) 
        {
            die($err);
        }

        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Метод для инсерта записи в БД
     * 
     * @param string $sql
     * @param array $params
     * @return void
     */
    public function set($sql, $params = []): void 
    {
        $result = $this->_db->prepare($sql);

        try 
        {
            $result->execute($params);
        } 
        catch (\PDOException $err) 
        {
            die($err);
        }
    }
}