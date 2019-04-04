<?php

namespace TFCLog;

use Monolog\Logger;

interface TFCLoggerInterface
{

    public function __get(string $var);
    public function logSuccess(string $content, string $apiUser) : bool;
    public function logInfo(string $content, string $apiUser) : bool;
    public function logNotice(string $content, string $apiUser) : bool;
    public function logWarning(string $err, string $content, string $apiUser) : bool;
    public function logAlert(string $err, string $content, string $apiUser) : bool;
    public function logError(string $err, string $content, string $apiUser) : bool;
    public function logCritical(string $err, string $content, string $apiUser) : bool;
    public function logEmergency(string $err, string $content, string $apiUser) : bool;

}
