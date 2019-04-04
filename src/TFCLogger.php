<?php

namespace TFCLog;

interface TFCLogger
{

    public function __construct($conn);
    public function logSuccess(string $content, string $apiUser) : boolean;
    public function logInfo(string $content, string $apiUser) : boolean;
    public function logAlert(string $err, string $content, string $apiUser) : boolean;
    public function logError(string $err, string $content, string $apiUser) : boolean;

}
