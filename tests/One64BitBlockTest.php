<?php

/*
 * The MIT License (MIT)
 *
 * Copyright (c) 2014-2015 Spomky-Labs
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

use AESKW\A128KW;
use AESKW\A192KW;
use AESKW\A256KW;

/**
 * These tests come from the RFC3394.
 *
 * @see https://www.ietf.org/rfc/rfc3394.txt#4
 */
class One64BitBlockTest extends \PHPUnit_Framework_TestCase
{
    public function testWrap64BitsKeyDataWith128BitKEK()
    {
        $kek = hex2bin('000102030405060708090A0B0C0D0E0F');
        $data = hex2bin('0011223344556677');

        $wrapped = A128KW::wrap($kek, $data);
        $this->assertEquals(hex2bin('F4740052E82A225174CE86FBD7B805E7'), $wrapped);
        $unwrapped = A128KW::unwrap($kek, $wrapped);
        $this->assertEquals($data, $unwrapped);
    }

    public function testWrap64BitsKeyDataWith192BitKEK()
    {
        $kek = hex2bin('000102030405060708090A0B0C0D0E0F1011121314151617');
        $data = hex2bin('0011223344556677');

        $wrapped = A192KW::wrap($kek, $data);
        $this->assertEquals(hex2bin('DFE8FD5D1A3786A7351D385096CCFB29'), $wrapped);
        $unwrapped = A192KW::unwrap($kek, $wrapped);
        $this->assertEquals($data, $unwrapped);
    }

    public function testWrap64BitsKeyDataWith256BitKEK()
    {
        $kek = hex2bin('000102030405060708090A0B0C0D0E0F101112131415161718191A1B1C1D1E1F');
        $data = hex2bin('0011223344556677');

        $wrapped = A256KW::wrap($kek, $data);
        $this->assertEquals(hex2bin('794314D454E3FDE1F661BD9F31FBFA31'), $wrapped);
        $unwrapped = A256KW::unwrap($kek, $wrapped);
        $this->assertEquals($data, $unwrapped);
    }
}
