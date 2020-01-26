## Dynamic Suite Implementation of PHPMailer

This is a Dynamic Suite package implementing the PHPMailer class for sending
emails from a Dynamic Suite instance.

The PHPMailer project can be followed [here](https://github.com/PHPMailer/PHPMailer).

You can create a new email as such:

```
<?php

namespace DynamicSuite\Pkg\Test;
use DynamicSuite\Core\DynamicSuite;
use DynamicSuite\Pkg\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/** @var $ds DynamicSuite */
/** @var $mail PHPMailer */
$mail = DynamicSuite::getPkgClass('DynamicSuite\Pkg\PHPMailer\PHPMailer');
try {
    $email = $mail->create();
    $email->addAddress('email@example.com', 'Example Account');
    $email->Subject = 'Test Email';
    $email->Body = 'This is a test!';
    $email->send();
    echo 'Mail sent';
} catch (Exception $exception) {
    echo $exception->getMessage();
}
```

The line `$mail = DynamicSuite::getPkgClass('DynamicSuite\Pkg\PHPMailer\PHPMailer');` sets `$email` to a new PHPMailer instance
with common parameters set such as host and port.

A config may be created at `config/phpmailer.json` with the following parameters:

```
{
  "smtp_debug": 0,
  "smtp_host": "mail.example.com",
  "smtp_port": 587,
  "smtp_username": "noreply@example.com",
  "smtp_password": "12345",
  "smtp_secure": "tls",
  "default_from_addr": "noreply@example.com",
  "default_from_name": "My Name"
}
```

If a parameter is not given, a the default (shown above) value will be used.