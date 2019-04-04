<?php

namespace TFCLog;

use Monolog\Logger;
use MySQLHandler\MySQLHandler;

class PDOLogger extends TFCLogger
{


    const TABLE = "tfclogger";

    /**
     * Create a new Skeleton Instance
     */
    public function __construct(string $loggerName, \PDO $logpdo)
    {
        parent::__construct($loggerName);
        $this->logger->pushHandler(
            new MySQLHandler(
                $logpdo, 
                self::TABLE, 
                [
                    'log_type', 
                    'log_err',
                    'log_content', 
                    'log_user', 
                    'log_time'
                ],
                getenv('TFCLOGGER_LEVEL', Logger::DEBUG)
            )
        );
    }

}
