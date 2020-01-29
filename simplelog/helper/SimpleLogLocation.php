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

class SimpleLogLocation
{

    private $loggers = [];
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
            self::$instance = new SimpleLogLocation();
        }

        return self::$instance;
    }

    public static function register($loggerName, $logFile)
    {
        SimpleLogLocation::getInstance()->loggers[$loggerName] = $logFile;
    }

    public static function get($loggerName)
    {
        if (!empty(SimpleLogLocation::getInstance()->loggers[$loggerName])) {
            return SimpleLogLocation::getInstance()->loggers[$loggerName];
        }

        return null;
    }
}

################################################################################
#                                End of file                                   #
################################################################################
