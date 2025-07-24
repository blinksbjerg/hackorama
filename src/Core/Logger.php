<?php
namespace Hackorama\Core;

/**
 * Simple logger for Hackorama
 */
class Logger
{
    private $logFile;
    
    public function __construct($logFile = null)
    {
        if (!$logFile) {
            $logFile = dirname(dirname(__DIR__)) . '/logs/hackorama.log';
        }
        $this->logFile = $logFile;
        
        // Create log directory if it doesn't exist
        $logDir = dirname($this->logFile);
        if (!is_dir($logDir)) {
            mkdir($logDir, 0777, true);
        }
    }
    
    public function log($message, $level = 'INFO')
    {
        $timestamp = date('Y-m-d H:i:s');
        $logMessage = "[$timestamp] [$level] $message\n";
        file_put_contents($this->logFile, $logMessage, FILE_APPEND);
    }
    
    public function error($message)
    {
        $this->log($message, 'ERROR');
    }
    
    public function warning($message)
    {
        $this->log($message, 'WARNING');
    }
    
    public function info($message)
    {
        $this->log($message, 'INFO');
    }
    
    public function debug($message)
    {
        $this->log($message, 'DEBUG');
    }
}