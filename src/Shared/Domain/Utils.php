<?php

declare(strict_types = 1);

namespace Myfinance\Shared\Domain;

use DateTimeImmutable;
use DateTimeInterface;
use RuntimeException;
use function Lambdish\Phunctional\filter;

final class Utils
{
    public static function endsWith(string $needle, string $haystack): bool
    {
        $length = strlen($needle);
        if ($length === 0) {
            return true;
        }

        return (substr($haystack, -$length) === $needle);
    }

    public static function dateToString(DateTimeInterface $date): string
    {
        return $date->format(DateTimeInterface::ATOM);
    }

    public static function stringToDate(string $date): DateTimeImmutable
    {
        return new DateTimeImmutable($date);
    }

    public static function stringToBool(string $value): bool
    {
        return $value === 'true' || $value === '1';
    }

    public static function jsonEncode(array $values): string
    {
        return json_encode($values);
    }

    public static function jsonDecode(string $json): array
    {
        $data = json_decode($json, true);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new RuntimeException('Unable to parse response body into JSON: ' . json_last_error());
        }

        return $data;
    }

    public static function toSnakeCase(string $text): string
    {
        return ctype_lower($text) ? $text : strtolower(preg_replace('/([^A-Z\s])([A-Z])/', "$1_$2", $text));
    }

    public static function toCamelCase(string $text): string
    {
        return lcfirst(str_replace('_', '', ucwords($text, '_')));
    }

    public static function dot($array, $prepend = ''): array
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value) && ! empty($value)) {
                $results = array_merge($results, static::dot($value, $prepend.$key.'.'));
            } else {
                $results[$prepend.$key] = $value;
            }
        }
        return $results;
    }

    public static function directoriesIn(string $path): array
    {
        return filter(
            static function (string $possibleModule) {
                return !in_array($possibleModule, ['.', '..']);
            },
            scandir($path)
        );
    }

    public static function filesIn(string $path, $fileType): array
    {
        return filter(
            static function (string $possibleModule) use ($fileType) {
                return strstr($possibleModule, $fileType);
            },
            scandir($path)
        );
    }

    public static function checkIBAN($iban)
    {
        $iban      = strtolower(str_replace(' ', '', $iban));
        $Countries =
            [
                'al' => 28,
                'ad' => 24,
                'at' => 20,
                'az' => 28,
                'bh' => 22,
                'be' => 16,
                'ba' => 20,
                'br' => 29,
                'bg' => 22,
                'cr' => 21,
                'hr' => 21,
                'cy' => 28,
                'cz' => 24,
                'dk' => 18,
                'do' => 28,
                'ee' => 20,
                'fo' => 18,
                'fi' => 18,
                'fr' => 27,
                'ge' => 22,
                'de' => 22,
                'gi' => 23,
                'gr' => 27,
                'gl' => 18,
                'gt' => 28,
                'hu' => 28,
                'is' => 26,
                'ie' => 22,
                'il' => 23,
                'it' => 27,
                'jo' => 30,
                'kz' => 20,
                'kw' => 30,
                'lv' => 21,
                'lb' => 28,
                'li' => 21,
                'lt' => 20,
                'lu' => 20,
                'mk' => 19,
                'mt' => 31,
                'mr' => 27,
                'mu' => 30,
                'mc' => 27,
                'md' => 24,
                'me' => 22,
                'nl' => 18,
                'no' => 15,
                'pk' => 24,
                'ps' => 29,
                'pl' => 28,
                'pt' => 25,
                'qa' => 29,
                'ro' => 24,
                'sm' => 27,
                'sa' => 24,
                'rs' => 22,
                'sk' => 24,
                'si' => 19,
                'es' => 24,
                'se' => 24,
                'ch' => 21,
                'tn' => 24,
                'tr' => 26,
                'ae' => 23,
                'gb' => 22,
                'vg' => 24
            ];
        $Chars     =
            [
                'a' => 10,
                'b' => 11,
                'c' => 12,
                'd' => 13,
                'e' => 14,
                'f' => 15,
                'g' => 16,
                'h' => 17,
                'i' => 18,
                'j' => 19,
                'k' => 20,
                'l' => 21,
                'm' => 22,
                'n' => 23,
                'o' => 24,
                'p' => 25,
                'q' => 26,
                'r' => 27,
                's' => 28,
                't' => 29,
                'u' => 30,
                'v' => 31,
                'w' => 32,
                'x' => 33,
                'y' => 34,
                'z' => 35
            ];

        if (isset($Countries[substr($iban, 0, 2)]) && strlen($iban) == $Countries[substr($iban, 0, 2)]) {

            $MovedChar      = substr($iban, 4) . substr($iban, 0, 4);
            $MovedCharArray = str_split($MovedChar);
            $NewString      = "";

            foreach ($MovedCharArray as $key => $value) {
                if (!is_numeric($MovedCharArray[$key])) {
                    $MovedCharArray[$key] = $Chars[$MovedCharArray[$key]];
                }
                $NewString .= $MovedCharArray[$key];
            }

            if (bcmod($NewString, '97') == 1) {
                return true;
            }
        }
        return false;
    }
}
