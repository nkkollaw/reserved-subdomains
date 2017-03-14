<?php
namespace nkkollaw\Multitenancy\Validators;
class Subdomain
{

    public static function readYAML($yaml_file)
    {
        $yaml = file_get_contents($yaml_file);
        if (!$yaml) {
            throw new \Exception('unable to find YAML file');
        }

        $reserved_subdomains = \Symfony\Component\Yaml\Yaml::parse($yaml);
        if (!$reserved_subdomains) {
            throw new \Exception('unable to parse YAML');
        }

        return $reserved_subdomains;
    }

    public static function isRegex($str)
    {
        return strpos($str, '/') !== false;
    }

    public static function isReserved($subdomain, $yaml_file = __DIR__ . '/../../../../../reserved-subdomains.yaml')
    {
        $reserved_subdomains = self::readYAML($yaml_file);

        $is_reserved = false;
        foreach ($reserved_subdomains as $reserved_subdomain) {
            if (self::isRegex($reserved_subdomain)) {
                if (preg_match($reserved_subdomain, $subdomain)) {
                    $is_reserved = true;

                    break;
                }
            } else {
                if ($reserved_subdomain == $subdomain) {
                    $is_reserved = true;

                    break;
                }
            }
        }

        return $is_reserved;
    }
}