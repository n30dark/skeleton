<?php

namespace TFCLog;

class TFCLoggerTest extends \PHPUnit\Framework\TestCase
{

    protected $logger;

    public function setUp()
    {
        $this->logger = new TFCLogger('foo');
    }

    /**
     * Test Get Name
     */
    public function testGetName()
    {
        $this->assertEquals('foo', $this->logger->logger->getName());
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
