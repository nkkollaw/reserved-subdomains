# Subdomains
List of subdomains that could be candidates for reservation in a multitenant app.

## Contributing

Pull requests are welcome.

The following \*nix commands might be useful while editing:

    cat reserved-subdomains.yaml | sort # sort entries
    
    awk '{if (++dup[$0] == 1) print $0;}' reserved-subdomains.yaml # remove duplicates
    
    awk '{if (++dup[$0] == 1) print $0;}' reserved-subdomains.yaml | sort # remove duplicates + sort
