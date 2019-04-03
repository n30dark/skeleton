<?php

namespace TFCLog;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Marshaler;

class DynamoLogger
{

    private $conn;
    private $marshaler;

    const TABLENAME = 'logs';

    /**
     * Create a new Skeleton Instance
     */
    public function __construct(DynamoDbClient $conn)
    {
        $this->conn = $conn;
        $this->marshaler = new Marshaler();
    }

    /**
     * Log a successful action
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return boolean          True if log save was successful
     */
    public function logSuccess(string $content, string $apiUser) : boolean
    {
        try {

            $params = [
                'TableName' => self::TABLENAME,
                'Item'      => $this->marshaler->marshalJson(
                    json_encode([
                        'log_type'      => 'SUCCESS',
                        'log_err'       => 'E000',
                        'log_content'   => json_decode($content),
                        'log_user'      => $apiUser,
                        'log_time'      => date()
                    ])
                )
            ];
            
            $this->conn->putItem($params);
            return true;
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * Log an Error
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return boolean          True if log save was successful
     */
    public function logInfo(string $content, string $apiUser) : boolean
    {
        try {

            $params = [
                'TableName' => self::TABLENAME,
                'Item'      => $this->marshaler->marshalJson(
                    json_encode([
                        'log_type'      => 'INFO',
                        'log_err'       => 'E000',
                        'log_content'   => json_decode($content),
                        'log_user'      => $apiUser,
                        'log_time'      => date()
                    ])
                )
            ];
            
            $this->conn->putItem($params);
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Log an Alert action
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return boolean          True if log save was successful
     */
    public function logAlert(string $err, string $content, string $apiUser) : boolean
    {
        try {

            $params = [
                'TableName' => self::TABLENAME,
                'Item'      => $this->marshaler->marshalJson(
                    json_encode([
                        'log_type'      => 'ALERT',
                        'log_err'       => $err,
                        'log_content'   => json_decode($content),
                        'log_user'      => $apiUser,
                        'log_time'      => date()
                    ])
                )
            ];
            
            $this->conn->putItem($params);
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Log an Error
     * @param  string  $err     Json Error data to be logged
     * @param  string  $content content to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return boolean          True if log save was successful
     */
    public function logError(string $err, string $content, string $apiUser) : boolean
    {
        try {

            $params = [
                'TableName' => self::TABLENAME,
                'Item'      => $this->marshaler->marshalJson(
                    json_encode([
                        'log_type'      => 'ERROR',
                        'log_err'       => $err,
                        'log_content'   => json_decode($content),
                        'log_user'      => $apiUser,
                        'log_time'      => date()
                    ])
                )
            ];
            
            $this->conn->putItem($params);
            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

}
