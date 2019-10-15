<?php
/**
 * class Connection
 */

class Connection extends PDO
{
    protected static $instance;
    protected static $config = [];

    protected function __construct($dsn, $dbname, $dbpass, $errmode) {
        parent::__construct($dsn, $dbname, $dbpass);
        $this->setAttribute(PDO::ATTR_ERRMODE, $errmode);
    }
    
    /**
     * Private clone method to prevent cloning of the instance of the
     * *Singleton* instance.
     *
     * @return void
     */
    private function __clone()
    {
    }
    
    /**
     * Get instance of the PDO
     * @return PDO
     */
    public static function connect()
    {
        self::$config = require_once DB_CONFIG_FILE;
        if(!self::$instance){
            $dsn = self::makeDsn(self::$config['db']);
            self::$instance = new Connection($dsn, self::$config['user'], self::$config['password'], self::$config['errmode']);
        }
        return self::$instance;
    }
    
    public function getPreparedStatment($query)
    {
        return $this->prepare($query);
    }

    private static function makeDsn($config)
    {
        $dsn = $config['driver'] . ':';
        unset($config['driver']);
        foreach ($config as $key => $value) {
                $dsn .= $key . '=' . $value . ';';
        }
        return substr($dsn, 0, -1);
    }
}
