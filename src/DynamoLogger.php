<?php

namespace TFCLog;

use Monolog\Logger;
use Monolog\Handler\DynamoDbHandler;
use Aws\DynamoDb\DynamoDbClient;

class DynamoLogger extends TFCLogger
{

    private $conn;

    const TABLENAME = 'tfclogs';

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
