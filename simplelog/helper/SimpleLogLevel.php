<?php

# * ********************************************************************* *
# *   Copyright (C) 2018 by xmz                                           *
# * ********************************************************************* *

/**
 * @author: Marcin Zelek (marcin.zelek@gmail.com)
 *          Copyright (C) xmz. All Rights Reserved.
 */

################################################################################
# Namespace                                                                    #
################################################################################

namespace xmz\simplelog;

################################################################################
# Class(es)                                                                    #
################################################################################

class SimpleLogLevel
{

    const OFF = 0;
    const FATAL = 1;
    const ERROR = 2;
    const WARN = 3;
    const INFO = 4;
    const DEBUG = 5;

    private $level = self::DEBUG;
    private static $instance;

    private function __construct()
    {
    }

    private function __clone()
    {
    }

    private function __wakeup()
    {
    }

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new SimpleLogLevel();
        }

        return self::$instance;
    }

    public static function set($level)
    {
        SimpleLogLevel::getInstance()->level = $level;
    }

    public static function get()
    {
        return SimpleLogLevel::getInstance()->level;
    }

    public static function levelToString($level)
    {
        switch ($level) {
            case self::OFF:
                return 'OFF';
            case self::FATAL:
                return 'FATAL';
            case self::ERROR:
                return 'ERROR';
            case self::WARN:
                return 'WARN';
            case self::INFO:
                return 'INFO';
            case self::DEBUG:
                return 'DEBUG';
        }

        return null;
    }

    public static function levelToId($level)
    {
        $levelString = self::levelToString($level);
        if (!empty($levelString)) {
            return substr($levelString, 0, 1);
        }

        return null;
    }
}

################################################################################
#                                End of file                                   #
################################################################################
