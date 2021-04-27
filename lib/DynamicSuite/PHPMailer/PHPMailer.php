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
use PHPMailer\PHPMailer\Exception;

/**
 * Class PHPMailer.
 *
 * @package DynamicSuite\PHPMailer
 */
final class PHPMailer
{

    /**
     * PHPMailer configuration.
     *
     * @var Config|null
     */
    protected static ?Config $cfg = null;

    /**
     * Initialize the class configuration.
     *
     * @return void
     */
    public static function init(): void
    {
        $hash = md5(__FILE__);
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
    public static function create(): \PHPMailer\PHPMailer\PHPMailer
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
