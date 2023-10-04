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

use Brocc\SeBankAccount\Account;
use PHPUnit\Framework\TestCase;

class AccountTest extends TestCase
{
    /**
     * @dataProvider accounts
     */
    public function testValidBankAccountNumbers(string $bank, string $number)
    {
        $account = new Account($number);

        // Split clearing and account number.
        $parts = explode('-', $number);

        $this->assertTrue($account->isValid());
        $this->assertEquals($parts[0], $account->clearing());
        $this->assertEquals($parts[1], $account->number());
        $this->assertEquals($bank, $account->bank());
    }

    public function testInvalidBankAccountNumber()
    {
        $account = new Account('0000-0000000');

        $this->assertFalse($account->isValid());
        $this->assertNull($account->clearing());
        $this->assertNull($account->number());
        $this->assertNull($account->bank());
    }

    public function accounts(): array
    {
        return [
            [
                'bank' => 'Svea Bank',
                'number' => '9660-1000010',
            ],
            [
                'bank' => 'Aion Bank SA',
                'number' => '9580-1000100',
            ],
            [
                'bank' => 'Avanza Bank',
                'number' => '9550-0100000',
            ],
            [
                'bank' => 'BlueStep Finans',
                'number' => '9680-0000000',
            ],
            [
                'bank' => 'BNP Paribas SA',
                'number' => '9470-1000010',
            ],
            [
                'bank' => 'Citibank',
                'number' => '9040-1000100',
            ],
            [
                'bank' => 'Danske Bank',
                'number' => '1200-0000010',
            ],
            [
                'bank' => 'DNB Bank',
                'number' => '9190-1000100',
            ],
            [
                'bank' => 'Ekobanken',
                'number' => '9700-1000010',
            ],
            [
                'bank' => 'Erik Penser',
                'number' => '9590-0000100',
            ],
            [
                'bank' => 'Forex Bank',
                'number' => '9400-0001000',
            ],
            [
                'bank' => 'Ica Banken',
                'number' => '9270-0010000',
            ],
            [
                'bank' => 'IKANO Bank',
                'number' => '9170-0001000',
            ],
            [
                'bank' => 'JAK Medlemsbank',
                'number' => '9670-0000000',
            ],
            [
                'bank' => 'Klarna Bank',
                'number' => '9780-0000100',
            ],
            [
                'bank' => 'Landshypotek',
                'number' => '9390-0000001',
            ],
            [
                'bank' => 'Lunar Bank A/S',
                'number' => '9710-0000000',
            ],
            [
                'bank' => 'Lån & Spar Bank Sverige',
                'number' => '9630-0000001',
            ],
            [
                'bank' => 'Länsförsäkringar Bank',
                'number' => '3400-0001000',
            ],
            [
                'bank' => 'Länsförsäkringar Bank',
                'number' => '9020-0100000',
            ],
            [
                'bank' => 'Marginalen Bank',
                'number' => '9230-1000001',
            ],
            [
                'bank' => 'MedMera Bank',
                'number' => '9650-1000000',
            ],
            [
                'bank' => 'Multitude Bank plc',
                'number' => '9070-0000100',
            ],
            [
                'bank' => 'NOBA Bank Group',
                'number' => '9640-0010000',
            ],
            [
                'bank' => 'Nordea',
                'number' => '1100-0000001',
            ],
            [
                'bank' => 'Nordea',
                'number' => '1400-0001000',
            ],
            [
                'bank' => 'Nordea',
                'number' => '3000-1001000',
            ],
            [
                'bank' => 'Nordea',
                'number' => '3410-0100000',
            ],
            [
                'bank' => 'Nordea',
                'number' => '4000-1000000',
            ],
            [
                'bank' => 'Nordnet Bank',
                'number' => '9100-0000100',
            ],
            [
                'bank' => 'Northmill Bank',
                'number' => '9750-1000001',
            ],
            [
                'bank' => 'Resurs Bank',
                'number' => '9280-1000000',
            ],
            [
                'bank' => 'Riksgälden',
                'number' => '9880-0001000',
            ],
            [
                'bank' => 'Santander Consumer Bank',
                'number' => '9460-0010000',
            ],
            [
                'bank' => 'SBAB',
                'number' => '9250-0000001',
            ],
            [
                'bank' => 'SEB',
                'number' => '5000-1001000',
            ],
            [
                'bank' => 'SEB',
                'number' => '9120-0010000',
            ],
            [
                'bank' => 'SEB',
                'number' => '9130-1000000',
            ],
            [
                'bank' => 'Skandiabanken',
                'number' => '9150-0000010',
            ],
            [
                'bank' => 'Swedbank',
                'number' => '7000-1001000',
            ],
            [
                'bank' => 'Ålandsbanken Sverige AB',
                'number' => '2300-0000001',
            ],
            [
                'bank' => 'Danske Bank',
                'number' => '9180-1000000008',
            ],
            [
                'bank' => 'Handelsbanken',
                'number' => '6000-100000010',
            ],
            [
                'bank' => 'Nordea/Plusgirot',
                'number' => '9500-1000000008',
            ],
            [
                'bank' => 'Nordea Personkonto',
                'number' => '3300-7505092556',
            ],
            [
                'bank' => 'Nordea Personkonto',
                'number' => '3782-7505092556',
            ],
            [
                'bank' => 'Riksgälden',
                'number' => '9890-1000000008',
            ],
            [
                'bank' => 'Sparbanken Syd',
                'number' => '9570-1000000008',
            ],
            [
                'bank' => 'Swedbank',
                'number' => '80001-1000000008',
            ],
            [
                'bank' => 'Swedbank fd. Sparbanken Öresund',
                'number' => '9300-1000000008',
            ],
            [
                'bank' => 'Bankgirot',
                'number' => '9900-2000008',
            ],
        ];
    }
}
