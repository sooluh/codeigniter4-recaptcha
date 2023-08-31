<?php

namespace ReCaptcha\Config;

use Exception;
use ReCaptcha\Libraries\ReCaptcha;
use ReCaptcha\RequestMethod\CurlPost;

class Services extends \CodeIgniter\Config\Services
{
    public static function reCaptcha2($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance(__FUNCTION__);
        }

        $config = config(ReCaptcha2::class);

        if (!$config) {
            throw new Exception(ReCaptcha2::class . ' not found.');
        }

        if (!$config->secret) {
            throw new Exception('The secret parameter is missing.');
        }

        $return = new ReCaptcha($config->secret, new CurlPost());

        if ($config->expectedHostname !== null) {
            $return->setExpectedHostname($config->expectedHostname);
        }

        if ($config->challengeTimeout !== null) {
            $return->setChallengeTimeout($config->challengeTimeout);
        }

        return $return;
    }

    public static function reCaptcha3($getShared = true)
    {
        if ($getShared) {
            return static::getSharedInstance(__FUNCTION__);
        }

        $config = config(ReCaptcha3::class);

        if (!$config) {
            throw new Exception(ReCaptcha3::class . ' not found.');
        }

        if (!$config->secret) {
            throw new Exception('The secret parameter is missing.');
        }

        $return = new ReCaptcha($config->secret, new CurlPost());

        if ($config->scoreThreshold !== null) {
            $return->setScoreThreshold($config->scoreThreshold);
        }

        if ($config->expectedHostname !== null) {
            $return->setExpectedHostname($config->expectedHostname);
        }

        if ($config->challengeTimeout !== null) {
            $return->setChallengeTimeout($config->challengeTimeout);
        }

        return $return;
    }
}
