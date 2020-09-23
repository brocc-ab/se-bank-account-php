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

class Utils
{
    /**
     * Mod-10 validation.
     *
     * @param string $number
     *
     * @return bool
     */
    public static function mod10($number)
    {
        $reversed = str_split(strrev($number));

        $sum = 0;
        foreach ($reversed as $i => $digit) {
            $product = 0 === (int) $i % 2 ? $digit : 2 * $digit;

            $sum += $product > 9 ? $product - 9 : $product;
        }

        return $sum && 0 === $sum % 10;
    }

    /**
     * Mod-11 validation.
     *
     * @param string $number
     *
     * @return bool
     */
    public static function mod11($number)
    {
        $reversed = str_split(strrev($number));

        $sum = 0;
        foreach ($reversed as $i => $digit) {
            $factor = ($i % 10) + 1;

            $sum += (int) $factor * $digit;
        }

        return $sum && 0 === $sum % 11;
    }
}
