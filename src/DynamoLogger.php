<?php

namespace TFCLog;

use Monolog\Logger;
use Monolog\Handler\DynamoDbHandler;

class DynamoLogger extends TFCLogger
{

    private $conn;

    const TABLENAME = 'logs';

    /**
     * Create a new Skeleton Instance
     */
    public function __construct(string $loggerName, DynamoDbClient $client)
    {
        parent::__construct($loggerName);
        $this->logger->pushHandler(
            new DynamoDbHandler(
                $client,
                self::TABLENAME,
                env('TFCLOGGER.LEVEL', Logger::DEBUG)
            )
        );
    }

}
