<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2015 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace AESKW;

class A256KW
{
    use AESKW;

    /**
     * @param string $kek The Key Encryption Key
     */
    protected static function checkKEKSize($kek)
    {
        Assertion::eq(strlen($kek), 32, 'Bad KEK size');
    }
}