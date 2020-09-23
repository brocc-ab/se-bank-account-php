<?php

/*
 * This file is part of Brocc\SeBankAccount.
 *
 * (c) Brocc AB <tech@brocc.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brocc\SeBankAccount\Tests;

use Brocc\SeBankAccount\Utils;
use PHPUnit\Framework\TestCase;

class UtilsTest extends TestCase
{
    public function testMod10Method()
    {
        // Check against mod-10 example provided by Bankgirot.
        $this->assertTrue(Utils::mod10('3316812057492'));
        // Check against Swedish ssn.
        $this->assertTrue(Utils::mod10('9906130241'));
    }

    public function testMod11Method()
    {
        // Check against mod-11 example provided by Bankgirot.
        $this->assertTrue(Utils::mod11('1912763608957'));
    }
}
