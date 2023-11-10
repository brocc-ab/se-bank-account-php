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
    /**
     * @dataProvider mod10TestCases
     */
    public function testMod10Method(string $input, bool $valid)
    {
        $this->assertEquals($valid, Utils::mod10($input));
    }

    /**
     * @dataProvider mod11TestCases
     */
    public function testMod11Method(string $input, bool $valid)
    {
        $this->assertEquals($valid, Utils::mod11($input));
    }

    public function mod10TestCases(): array
    {
        return [
            [
                # Example from Bankgirot.
                'input' => '3316812057492',
                'valid' => true,
            ],
            [
                # Example from Bankgirot.
                'input' => '55555551',
                'valid' => true,
            ],
            [
                # Example from Bankgirot.
                'input' => '9912346',
                'valid' => true,
            ],
            [
                'input' => '3316812057490',
                'valid' => false,
            ],
            [
                'input' => '55555550',
                'valid' => false,
            ],
            [
                'input' => '9912340',
                'valid' => false,
            ],
            [
                # Swedish ssn.
                'input' => '9906130241',
                'valid' => true,
            ],
            [
                'input' => '9906130240',
                'valid' => false,
            ],
        ];
    }

    public function mod11TestCases(): array
    {
        return [
            [
                # Example from Bankgirot.
                'input' => '1912763608957',
                'valid' => true,
            ],
            [
                # Example from Bankgirot.
                'input' => '241350',
                'valid' => true,
            ],
            [
                # Example from Bankgirot.
                'input' => '324558',
                'valid' => true,
            ],
            [
                'input' => '1912763608950',
                'valid' => false,
            ],
            [
                'input' => '241351',
                'valid' => false,
            ],
            [
                'input' => '324550',
                'valid' => false,
            ],
        ];
    }
}
