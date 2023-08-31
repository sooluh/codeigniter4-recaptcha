<?php

namespace ReCaptcha\Cells;

use ReCaptcha\Config\ReCaptcha2;

class ReCaptcha
{
    public function initv2(array $params)
    {
        static $num = 0;

        $num++;

        $params['num'] = $num;

        $config = config(ReCaptcha2::class);

        assert($config ? true : false, ReCaptcha2::class);

        $params['key'] = $config->key;

        return view('ReCaptcha\Views\initv2', $params);
    }

    public function initv3(array $params)
    {
        static $inited = [];

        if (array_search($params['key'], $inited) === false) {
            $params['init'] = true;

            $inited[] = $params['key'];
        } else {
            $params['init'] = false;
        }

        return view('ReCaptcha\Views\initv3', $params);
    }
}
