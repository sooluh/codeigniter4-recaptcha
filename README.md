# CodeIgniter 4 reCAPTCHA

[![Latest Stable Version](http://poser.pugx.org/sooluh/codeigniter4-recaptcha/v)](https://packagist.org/packages/sooluh/codeigniter4-recaptcha)
[![Total Downloads](http://poser.pugx.org/sooluh/codeigniter4-recaptcha/downloads)](https://packagist.org/packages/sooluh/codeigniter4-recaptcha)
[![Latest Unstable Version](http://poser.pugx.org/sooluh/codeigniter4-recaptcha/v/unstable)](https://packagist.org/packages/sooluh/codeigniter4-recaptcha)
[![License](http://poser.pugx.org/sooluh/codeigniter4-recaptcha/license)](https://packagist.org/packages/sooluh/codeigniter4-recaptcha)

CodeIgniter 4 verifier for Google reCAPTCHA v2 and reCAPTCHA v3.

## Requirements

- PHP >= 7.4
- Composer

## Features

- PSR-4 autoloading compliant structure
- PSR-2 compliant code style
- Useful tools for better code included

## Installation

Install the package with:

```sh
composer require sooluh/codeigniter4-recaptcha
```

## Configuration

Add your reCAPTCHA keys to the `.env` file.

```sh
# --------------------------------------------------------------------
# ReCaptcha 2
# --------------------------------------------------------------------
recaptcha2.key = 'XXXXXXXX-XXXXXXXX'
recaptcha2.secret = 'XXXXXXXX-XXXXXXXX'

# --------------------------------------------------------------------
# ReCaptcha 3
# --------------------------------------------------------------------
recaptcha3.key = 'XXXXXXXX-XXXXXXXX'
recaptcha3.secret = 'XXXXXXXX-XXXXXXXX'
recaptcha3.scoreThreshold = 0.5
```

In the `/app/Config/Validation.php` file, you need to add settings for the validator.

```php
public $ruleSets = [
    ...
    \ReCaptcha\Validation\ReCaptchaRules::class
];
```

## Usage

### Rendering reCAPTCHA v2

```php
helper(['form', 'reCaptcha']);

echo form_open();

echo reCaptcha2('reCaptcha2', ['id' => 'recaptcha_v2'], ['theme' => 'dark']);

echo form_submit('submit', 'Submit');

echo form_close();
```

### Rendering reCAPTCHA v3

```php
helper(['form', 'reCaptcha']);

echo form_open();

echo reCaptcha3('reCaptcha3', ['id' => 'recaptcha_v3'], ['action' => 'contactForm']);

echo form_submit('submit', 'Submit');

echo form_close();
```

### Validation

```php
public $validationRules = [
    'reCaptcha2' => 'required|reCaptcha2[]',
    'reCaptcha3' => 'required|reCaptcha3[contactForm,0.9]'
    ....
];
```

> In the settings of the reCaptcha3 validator, the first parameter you specify is expectedAction,
> this parameter is not required.<br>
> You can override a global scoreThreshold parameter in the second reCaptcha3 rule parameter.

## License

This project is licensed under the MIT License - see the [LICENSE](./LICENSE) file for details.

**Acknowledgements**

This project is built upon the foundation of [codeigniter4-recaptcha repository](https://github.com/denis303/codeigniter4-recaptcha) created by [denis303](https://github.com/denis303). The decision to use this basecode was motivated by its robust architecture and existing functionalities.

**Note**

Please note that the original repository might not have been active for the past 2 years and the original developer's GitHub profile indicates limited recent activity.

**Disclaimer**

This project has been modified to address certain issues and to suit the requirements of this project.
