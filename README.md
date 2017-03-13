# Subdomains
List of subdomains that could be candidates for reservation in multitenant app/ subdomain validator for multitenant apps

## YAML list

This is a simple list of subdomains in YAML (I picked YAML over JSON because you can easily add comments).

## Validators

### PHP implementation

Subdomain validator for multitenant apps written in PHP. Simply checks if a subdomain is in the list.

#### Installation

    composer require nkkollaw/reserved-subdomains
    
#### Usage

    Bool \nkkollaw\Multitenancy\Validators\Subdomain::isReserved($subdomain[, $yaml_file]);

Example:

    $subdomain = 'www2';
    if (\nkkollaw\Multitenancy\Validators\Subdomain::isReserved($subdomain)) {
        throw new Exception('Sorry, subdomain is reserved');
    }

## Contributing

Pull requests are welcome.

It would  be nice to implement a validator in different languages (Node, Ruby? PHP is in /php)

The following \*nix commands might be useful while editing the list:

    cat reserved-subdomains.yaml | sort # sort entries
    
    awk '{if (++dup[$0] == 1) print $0;}' reserved-subdomains.yaml # remove duplicates
    
    awk '{if (++dup[$0] == 1) print $0;}' reserved-subdomains.yaml | sort # remove duplicates + sort
