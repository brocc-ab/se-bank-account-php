<?php

/*
 * This file is part of Brocc\SeBankAccount.
 *
 * (c) Brocc AB <tech@brocc.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Brocc\SeBankAccount;

class Account
{
    /**
     * @var bool
     */
    private $isValid;

    /**
     * @var null|string
     */
    private $bank;

    /**
     * @var null|string
     */
    private $clearing;

    /**
     * @var null|string
     */
    private $number;

    /**
     * @param int|string $number
     */
    public function __construct($number)
    {
        $this->isValid = $this->init(preg_replace('/\D/i', '', $number));
    }

    /**
     * Returns the name of the bank.
     */
    public function bank(): ?string
    {
        return $this->bank;
    }

    /**
     * Returns the account clearing number, 4-5 digits.
     */
    public function clearing(): ?string
    {
        return $this->clearing;
    }

    /**
     * Returns the actual account number excl. clearing number.
     */
    public function number(): ?string
    {
        return $this->number;
    }

    /**
     * Check if given account number is valid.
     */
    public function isValid(): bool
    {
        return $this->isValid;
    }

    /**
     * Validates account number against all available banks.
     */
    private function init(string $number): bool
    {
        $banks = require __DIR__.'/banks.php';

        foreach ($banks as $bank) {
            if (preg_match($bank['regex'], $number)) {
                return $this->validate($number, $bank);
            }
        }

        return false;
    }

    /**
     * Validates account number against one bank.
     */
    private function validate(string $number, array $bank): bool
    {
        $clen = $bank['clen'] ?? 4;

        $clearing = substr($number, 0, $clen);
        $account = substr($number, $clen);

        // Only check type 1 with comment 1 & 2, for remaining combinations full account number excl. clearing is checked.
        $digits = 1 === $bank['type'] && 1 === $bank['comment']
            ? substr($clearing, 1).$account
            : (1 === $bank['type'] && 2 === $bank['comment'] ? $clearing.$account : $account);

        $valid = isset($bank['mod10']) && true === $bank['mod10'] ? Utils::mod10($digits) : Utils::mod11($digits);

        if (!$valid) {
            return false;
        }

        $this->bank = $bank['name'];
        $this->clearing = $clearing;
        $this->number = $account;

        return true;
    }
}
