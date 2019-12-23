<?php
/*
 * PHPMailer Package
 * Copyright (C) 2019 Dynamic Suite Team
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

namespace DynamicSuite\Package\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class PHPMailer.
 *
 * @package DynamicSuite\Package\Time
 * @property Config $cfg
 */
class PHPMailer
{

    /**
     * PHPMailer configuration.
     *
     * @var Config
     */
    protected $cfg;

    /**
     * PHPMailer constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->cfg = new Config('phpmailer');
    }

    /**
     * Create a new PHPMailer instance with common headers set.
     *
     * @return \PHPMailer\PHPMailer\PHPMailer
     * @throws Exception
     */
    public function create()
    {
        $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
        $mail->SMTPDebug = $this->cfg->debug;
        $mail->isSMTP();
        $mail->Host = $this->cfg->smtp_host;
        $mail->SMTPAuth = true;
        $mail->Username = $this->cfg->smtp_username;
        $mail->Password = $this->cfg->smtp_password;
        $mail->SMTPSecure = $this->cfg->smtp_secure;
        $mail->Port = $this->cfg->smtp_port;
        $mail->setFrom($this->cfg->default_from_addr, $this->cfg->default_from_name);
        return $mail;
    }

}
