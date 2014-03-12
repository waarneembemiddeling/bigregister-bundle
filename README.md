BIG-Register Symfony2 bundle
----------------------------

This bundle integrates the [BIG-register SOAP client](https://github.com/waarneembemiddeling/bigregister-soap).

## Configuration

Preferred configutation (this will use the acceptance environment when working in debug mode):

    wb_big_register:
        use_acceptance: %kernel.debug%

### Change the WSDL

If you want to override the WSDL:

    wb_big_register:
        wsdl: http://comapny.tld/soap?wsdl

## Usage

To get the service from the container:

```php

$service = $container->get('wb_big_register.service');

```

To get the client:

```php

$service = $container->get('wb_big_register.client');

```

For more examples checkout the [client documentation](https://github.com/waarneembemiddeling/bigregister-soap).
