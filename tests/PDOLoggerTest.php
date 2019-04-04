<?php

namespace TFCLog;

use PHPUnit\DbUnit\TestCaseTrait;

class PDOLoggerTest extends \PHPUnit\PHPUnit_Extensions_Database_TestCase
{

    protected $logger;
    protected $pdo;

    use TestCaseTrait;

    public function setUp()
    {
        $this->pdo = new \PDO(
            'mysql:dbname=tfcapidb;host=localhost;port=3306',
            'root',
            'root',
            null
        );

        $this->logger = new PDOLogger('foo', $this->pdo);
    }

    /**
     * Test Get Name
     */
    public function testGetName()
    {
        $this->assertEquals('foo', $this->logger->logger->getName());
    }

    public function testDatabaseExists()
    {
        return $this->createDefaultDbConnection($this->pdo, 'tfcapidb');
    }

    public function testLogSuccess()
    {        
        $this->assertTrue($this->logger->logSuccess('test', 'phpunit'));
    }

    public function testLogInfo()
    {
        $this->assertTrue($this->logger->logInfo('test', 'phpunit'));
    }

    public function testLogNotice()
    {        
        $this->assertTrue($this->logger->logNotice('test', 'phpunit'));
    }
    
    public function testLogWarning()
    {        
        $this->assertTrue($this->logger->logWarning('000', 'test', 'phpunit'));
    }
    
    public function testLogAlert()
    {        
        $this->assertTrue($this->logger->logAlert('000', 'test', 'phpunit'));
    }
    
    public function testLogError()
    {        
        $this->assertTrue($this->logger->logError('000', 'test', 'phpunit'));
    }
    
    public function testLogCritical()
    {        
        $this->assertTrue($this->logger->logCritical('000', 'test', 'phpunit'));
    }
    
    public function testLogEmergency()
    {        
        $this->assertTrue($this->logger->logEmergency('000', 'test', 'phpunit'));
    }

}
