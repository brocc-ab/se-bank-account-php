# Swedish Bank Account for PHP

[![Build Status](https://travis-ci.org/brocc-ab/se-bank-account-php.svg?branch=master)](https://travis-ci.org/brocc-ab/se-bank-account-php)
[![Latest Version](https://img.shields.io/github/release/brocc-ab/se-bank-account-php.svg?style=flat-square)](https://github.com/brocc-ab/se-bank-account-php/releases)
![License: MIT](https://img.shields.io/badge/License-MIT-green.svg)

This package easily validates and returns details about Swedish bank account numbers using PHP. The details and validation rules are based on the documentation provided by Bankgirot, which can be found [here](https://www.bankgirot.se/globalassets/dokument/anvandarmanualer/bankernaskontonummeruppbyggnad_anvandarmanual_sv.pdf).

## Installation

Installing the Swedish Bank Account for PHP can be done using Composer.

```bash
composer require brocc/se-bank-account
```

## Usage

Usage is very straight forward, just create a new instance of `Brocc\SeBankAccount\Account` which takes a string or an integer as argument and returns the details about the given number such as clearing number, account number and the name of the bank (if valid).

```php
<?php

require 'vendor/autoload.php';

use Brocc\SeBankAccount\Account;

// Instantiate using full account number incl. clearing number.
// Note: the number can be in any format, only digits are validated and used.
$account = new Account('3300-7505092556');

// Check if valid, returns true or false.
$account->isValid(); // true

// Returns the clearing number.
$account->clearing(); // 3300

// Returns the account number excl. clearing number, null if not valid.
$account->number(); // 7505092556

// Returns the name of the bank.
$account->bank(); // Nordea Personkonto
```

If an account is not valid `$account->isValid()` will return `false` and the other methods will return `null`.

## Supported Banks

Following Swedish banks are currently supported:

* Avanza Bank
* BNP Paribas SA
* Bankgirot
* BlueStep Finans
* DNB Bank
* Danske Bank
* Ekobanken
* Erik Penser
* Forex Bank
* Handelsbanken
* IKANO Bank
* Ica Banken
* JAK Medlemsbank
* Klarna Bank
* Landshypotek
* Länsförsäkringar Bank
* Lån & Spar Bank Sverige
* Marginalen Bank
* MedMera Bank
* Nordax Bank
* Nordea
* Nordea Personkonto
* Nordea/Plusgirot
* Nordnet Bank
* Northmill Bank
* Resurs Bank
* Riksgälden
* SBAB
* SEB
* Santander Consumer Bank
* Skandiabanken
* Sparbanken Syd
* Svea Bank
* Swedbank
* Swedbank fd. Sparbanken Öresund
* Ålandsbanken Sverige AB

## Contributing

If you find a bug or a bank that might not be supported, please submit an issue on Github directly under [issues](https://github.com/brocc-ab/se-bank-account-php/issues).

Any contributions are welcome!