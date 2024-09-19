<?php

namespace App\Logging;

use Monolog\Logger;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Formatter\LineFormatter;

class ApplicationLogging
{
    public function __invoke()
    {
        // Tạo một logger mới với tên 'application'
        $logger = new Logger('application');

        // Thiết lập handler cho logger, sử dụng RotatingFileHandler để log theo ngày
        $handler = new RotatingFileHandler(storage_path('logs/application.log'), 0, Logger::DEBUG, true, 0664);
        $logger->pushHandler($handler);

        // Thiết lập formatter cho handler
        $handler->setFormatter(new LineFormatter(null, null, true, true));

        return $logger;
    }
}
