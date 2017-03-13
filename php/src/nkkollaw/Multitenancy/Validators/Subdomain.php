<?php
namespace nkkollaw\Multitenancy\Validators;

class Subdomain
{
    public static function isReserved($subdomain) {
        $yaml = file_get_contents(__DIR__ . '/../reserved-subdomains.yaml');
        if (!$yaml) {
            throw new \Exception('unable to find YAML with subdomains');
        }

        $reserved_subdomains = \Symfony\Component\Yaml\Yaml::parse($yaml);

        foreach ($reserved_subdomains as $reserved_subdomain) {
            if (strpos($reserved_subdomain, '/') !== false) { // is regex ?
                if (preg_match($reserved_subdomain, $subdomain)) {
                    return true;
                }
            } else {
                if (strpos($reserved_subdomain, $subdomain) !== false) {
                    return true;
                }
            }
        }

        return false;
    }
}