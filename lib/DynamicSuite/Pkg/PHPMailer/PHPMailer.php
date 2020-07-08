<?php
/*
 * PHPMailer Package
 * Copyright (C) 2020 Dynamic Suite Team
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation version 3.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software Foundation,
 * Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
 */

/** @noinspection PhpUnused */

namespace DynamicSuite\Pkg\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class PHPMailer.
 *
 * @package DynamicSuite\Pkg\PHPMailer
 */
final class PHPMailer
{

    /**
     * PHPMailer configuration.
     *
     * @var Config
     */
    protected static ?Config $cfg = null;

    /**
     * Initialize the class configuration.
     *
     * @return void
     */
    public static function init(): void
    {
        $hash = md5(__DIR__);
        if (DS_CACHING && apcu_exists($hash)) {
            self::$cfg = apcu_fetch($hash);
        } else {
            self::$cfg = new Config('phpmailer');
            if (DS_CACHING) {
                apcu_store($hash, self::$cfg);
            }
        }
    }

    /**
     * Create a new PHPMailer instance with common headers set.
     *
     * @return \PHPMailer\PHPMailer\PHPMailer
     * @throws Exception
     */
    public static function create()
    {
        if (!self::$cfg) {
            self::init();
        }
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mail->SMTPDebug = self::$cfg->debug;
        $mail->isSMTP();
        $mail->Host = self::$cfg->smtp_host;
        $mail->SMTPAuth = true;
        $mail->Username = self::$cfg->smtp_username;
        $mail->Password = self::$cfg->smtp_password;
        $mail->SMTPSecure = self::$cfg->smtp_secure;
        $mail->Port = self::$cfg->smtp_port;
        $mail->setFrom(self::$cfg->default_from_addr, self::$cfg->default_from_name);
        return $mail;
    }

}
