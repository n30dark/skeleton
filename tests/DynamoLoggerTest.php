<?php

namespace TFCLog;

use Aws\AwsClient;


class DynamoLoggerTest extends \PHPUnit\Framework\TestCase
{

    protected $logger;
    protected $dynamo;

    public function setUp()
    {
        $sdk = new Aws\Sdk([
            
        ]);

        $this->dynamo = 
        $this->logger = new DynamoLogger('foo', $this->dynamo);
    }

    public function testLogSuccess()
    {        
        $this->assertTrue(
            $this->logger->logSuccess(
                json_encode(
                    [
                        'message' => 'testing log Success'
                    ]
                ), 
                'phpunit'
            )
        );
    }

    public function testLogInfo()
    {
        $this->assertTrue(
            $this->logger->logInfo(
                json_encode(
                    [
                        'message' => 'testing log info'
                    ]
                ), 
                'phpunit'
            )
        );
    }

    public function testLogNotice()
    {        
        $this->assertTrue(
            $this->logger->logNotice(
                json_encode([
                    'message' => 'testing log Notice'
                ]), 
                'phpunit'
            )
        );
    }
    
    public function testLogWarning()
    {        
        $this->assertTrue(
            $this->logger->logWarning(
                '001', 
                json_encode([
                    'message' => 'testing log Warning'
                ]),
                'phpunit'
            )
        );
    }
    
    public function testLogAlert()
    {        
        $this->assertTrue(
            $this->logger->logAlert(
                '002', 
                json_encode([
                    'message' => 'testing log Alert'
                ]),
                'phpunit'
            )
        );
    }
    
    public function testLogError()
    {        
        $this->assertTrue(
            $this->logger->logError(
                '003', 
                json_encode([
                    'message' => 'testing log Error'
                ]), 
                'phpunit'
            )
        );
    }
    
    public function testLogCritical()
    {        
        $this->assertTrue(
            $this->logger->logCritical(
                '004', 
                json_encode([
                    'message' => 'testing log Critical'
                ]), 
                'phpunit'
            )
        );
    }
    
    public function testLogEmergency()
    {        
        $this->assertTrue(
            $this->logger->logEmergency(
                '005', 
                json_encode([
                    'message' => 'testing log Emergency'
                ]), 
                'phpunit'
            )
        );
    }

}
