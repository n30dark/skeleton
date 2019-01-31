<?php

namespace tfc\PDOLogger;

class PDOLogger
{

    private $conn;

    /**
     * Create a new Skeleton Instance
     */
    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    /**
     * Log a successful action
     * @param  string  $message Message to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return boolean          True if log save was successful
     */
    public function logSuccess(string $message, string $apiUser) : boolean
    {
        try {

            $sql = "CALL LogSuccess(:message, :user)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":message", $message, PDO::PARAM_STR);
            $stmt->bindValue(":user", $apiUser, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            throw $e;
        }

    }

    /**
     * Log an Alert action
     * @param  string  $err     Json Error data to be logged
     * @param  string  $message Message to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return boolean          True if log save was successful
     */
    public function logAlert(string $err, string $message, string $apiUser) : boolean
    {
        try {

            $sql = "CALL LogAlert(:err, :message, :user)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":err", $err, PDO::PARAM_STR);
            $stmt->bindValue(":message", $message, PDO::PARAM_STR);
            $stmt->bindValue(":user", $apiUser, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Log an Error
     * @param  string  $err     Json Error data to be logged
     * @param  string  $message Message to be logged
     * @param  string  $apiUser Api User requesting the log save
     * @return boolean          True if log save was successful
     */
    public function logError(string $err, string $message, string $apiUser) : boolean
    {
        try {

            $sql = "CALL LogError(:err, :message, :user)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":err", $err, PDO::PARAM_STR);
            $stmt->bindValue(":message", $message, PDO::PARAM_STR);
            $stmt->bindValue(":user", $apiUser, PDO::PARAM_STR);
            $stmt->execute();

            return true;
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Get all logs according to a filter
     * @param  string  $filter Filter to gather log info
     * @return array           The array of logs that were requested
     */
    public function getLogs(string $filter = null) : array
    {
        try {

            $sql = "CALL getLogs(:filter)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":filter", $filter, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Get a Log according to a filter
     * @param  string  $filter Filter to gather log info
     * @return array           The log that was requested
     */
    public function getLog(string $filter) : array
    {
        try {

            $sql = "CALL getLog(:filter)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":filter", $filter, PDO::PARAM_STR);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * Friendly welcome
     *
     * @param string $phrase Phrase to return
     *
     * @return string Returns the phrase passed in
     */
    public function echoPhrase($phrase)
    {
        return $phrase;
    }
}
