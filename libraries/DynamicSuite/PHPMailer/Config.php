<?php
/**
 * This file is part of the Dynamic Suite PHPMailer package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package DynamicSuite\PHPMailer
 * @author Grant Martin <commgdog@gmail.com>
 * @copyright 2021 Dynamic Suite Team
 * @noinspection PhpUnused
 */

namespace DynamicSuite\PHPMailer;
use DynamicSuite\JSONConfig;
use PHPMailer\PHPMailer\SMTP;

/**
 * Class Config.
 *
 * @package DynamicSuite\PHPMailer
 * @property int $debug
 * @property string $smtp_host
 * @property int $smtp_port
 * @property string $smtp_username
 * @property string $smtp_password
 * @property string $smtp_secure
 * @property string $default_from_addr
 * @property string $default_from_name
 */
class Config extends JSONConfig
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