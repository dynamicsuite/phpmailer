## Dynamic Suite Implementation of PHPMailer

This is a Dynamic Suite package implementing the PHPMailer class for sending
emails from a Dynamic Suite instance.

The PHPMailer project can be followed [here](https://github.com/PHPMailer/PHPMailer).

Configure via `config/phpmailer.json` with the following parameters:

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

Missing parameters will be replaced with the default (shown above).

Official documentation [here](https://dynamicsuite.io/official-packages/phpmailer).