<?php

namespace Tests\Unit;

use App\Services\CurrencyService;
use PHPUnit\Framework\TestCase;

class CurrencyTest extends TestCase
{
    public function test_convert_usd_to_eur_successful()
    {
        $this->assertEquals(90, (new CurrencyService())->convert(100, 'usd', 'eur'));
    }
}
