<?php
namespace Pico\Api;
class PicoApi
{
    /**
     * Database
     *
     * @var \Pico\Database\PicoDatabase $database
     */
    private $database = null;

    /**
     * Constructor
     *
     * @param \Pico\Database\PicoDatabase $database
     */
    public function __construct($database)
    {
        $this->database = $database;
    }

    /**
     * Undocumented function
     *
     * @param string $table
     * @param string $aggregate
     * @param array $filter
     * @param callback $callback
     * @param array $sort
     * @return array
     */
    public function listOf($table, $aggregate, $filter, $callback, $sort = null)
    {
        $filterQuery = $this->createFilterQuery($filter, $callback);
        $sql = "SELECT $aggregate FROM $table WHERE (1=1) ".$filterQuery;
        if($sort != null)
        {
            $sql .= " ORDER BY ".$this->createSortOrder($sort);
        }
        return $this->database->executeQuery($sql)->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function createSortOrder($sortOrder)
    {
        $arr = array();
        foreach($sortOrder as $val)
        {
            $arr[] = (new \Pico\Database\PicoSort($val[0], $val[1]))->__toString();
        }
        return implode(", ", $arr);
    }

    public function createFilterQuery($filter, $callback)
    {
        $filterQuery = "";
        if($callback != null)
        {
            $filterQuery = call_user_func($callback, $filter);
        }
        return $filterQuery;
    }

    /**
     * Get $database
     *
     * @return  \Pico\Database\PicoDatabase
     */ 
    public function getDatabase()
    {
        return $this->database;
    }
}