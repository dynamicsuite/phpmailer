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
use DynamicSuite\Base\DSConfig;
use PHPMailer\PHPMailer\SMTP;

/**
 * Class Config.
 *
 * @package DynamicSuite\Pkg\PHPMailer
 * @property int $debug
 * @property string $smtp_host
 * @property int $smtp_port
 * @property string $smtp_username
 * @property string $smtp_password
 * @property string $smtp_secure
 * @property string $default_from_addr
 * @property string $default_from_name
 */
class Config extends DSConfig
{

    /**
     * Debugging state.
     *
     * @var int
     */
    protected int $debug = SMTP::DEBUG_OFF;

    /**
     * Host for outgoing mail server.
     *
     * @var string
     */
    protected string $smtp_host = 'mail.example.com';

    /**
     * Port for outgoing mail server.
     *
     * @var int
     */
    protected int $smtp_port = 587;

    /**
     * Username for outgoing mail server.
     *
     * @var string
     */
    protected string $smtp_username = 'noreply@example.com';

    /**
     * Password for outgoing mail server.
     *
     * @var string
     */
    protected string $smtp_password = '';

    /**
     * Security for outgoing mail server (tls, ssl, etc).
     *
     * @var string
     */
    protected string $smtp_secure = 'tls';

    /**
     * Default from address for sent mail.
     *
     * @var string
     */
    protected string $default_from_addr = 'noreply@example.com';

    /**
     * Default from name for sent mail.
     *
     * @var string
     */
    protected string $default_from_name = 'My Name';

    /**
     * Config constructor.
     *
     * @param string $package_id
     * @return void
     */
    public function __construct(string $package_id)
    {
        parent::__construct($package_id);
    }

}