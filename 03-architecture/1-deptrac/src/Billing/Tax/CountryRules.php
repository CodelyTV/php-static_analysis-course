<?php

declare(strict_types=1);

/*
 * Copyright Humbly Arrogant Software Limited 2020-2023.
 *
 * Use of this software is governed by the Business Source License included in the LICENSE file and at https://getparthenon.com/docs/next/license.
 *
 * Change Date: 26.06.2026 ( 3 years after 2.2.0 release )
 *
 * On the date above, in accordance with the Business Source License, use of this software will be governed by the open source license specified in the LICENSE file.
 */

namespace Parthenon\Billing\Tax;

use Parthenon\Common\Address;

class CountryRules implements CountryRulesInterface
{
    protected array $rates = [
        // EU
        'AT' => 20,
        'BE' => 21,
        'BG' => 20,
        'HR' => 25,
        'CY' => 19,
        'CZ' => 21,
        'DK' => 25,
        'EE' => 20,
        'FI' => 24,
        'FR' => 20,
        'DE' => 19,
        'GR' => 24,
        'HU' => 27,
        'IE' => 23,
        'IT' => 22,
        'LV' => 21,
        'LT' => 21,
        'LU' => 17,
        'MT' => 18,
        'NL' => 21,
        'PL' => 23,
        'PT' => 23,
        'RO' => 19,
        'SK' => 20,
        'SI' => 22,
        'ES' => 21,
        'SE' => 25,

        'IS' => 24,

        // UK
        'GB' => 20,

        // Swiss
        'CH' => 7.7,

        // North America
        'US' => 0,
        'CA' => 5,
        'MX' => 16,

        // Down under
        'AU' => 18,
        'NZ' => 15,

        // Russia
        'RU' => 20,
        'CN' => 13,
    ];

    public function getDigitalVatPercentage(Address $address): int|float
    {
        if (!isset($this->rates[$address->getCountry()])) {
            return 0;
        }

        return $this->rates[$address->getCountry()];
    }
}
