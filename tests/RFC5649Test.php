<?php

declare(strict_types=1);

namespace AESKW\Tests;

use AESKW\A192KW;
use PHPUnit\Framework\TestCase;

/**
 * These tests come from the RFCRFC5649Test.
 *
 * @see https://tools.ietf.org/html/rfc5649#section-6
 *
 * @internal
 */
final class RFC5649Test extends TestCase
{
    /**
     * @test
     */
    public function wrap20BytesKeyDataWith192BitKEK(): void
    {
        $kek = hex2bin('5840df6e29b02af1ab493b705bf16ea1ae8338f4dcc176a8');
        $key = hex2bin('c37b7e6492584340bed12207808941155068f738');

        $wrapped = A192KW::wrap($kek, $key, true);
        static::assertSame(hex2bin('138bdeaa9b8fa7fc61f97742e72248ee5ae6ae5360d1ae6a5f54f373fa543b6a'), $wrapped);
        $unwrapped = A192KW::unwrap($kek, $wrapped, true);
        static::assertSame($key, $unwrapped);
    }

    /**
     * @test
     */
    public function wrap7BytesKeyDataWith192BitKEK(): void
    {
        $kek = hex2bin('5840df6e29b02af1ab493b705bf16ea1ae8338f4dcc176a8');
        $key = hex2bin('466f7250617369');

        $wrapped = A192KW::wrap($kek, $key, true);
        static::assertSame(hex2bin('afbeb0f07dfbf5419200f2ccb50bb24f'), $wrapped);
        $unwrapped = A192KW::unwrap($kek, $wrapped, true);
        static::assertSame($key, $unwrapped);
    }
}
