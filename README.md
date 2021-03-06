BIG-Register Symfony2 bundle
----------------------------
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/waarneembemiddeling/bigregister-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/waarneembemiddeling/bigregister-bundle/?branch=master)

This bundle integrates the [BIG-register SOAP client](https://github.com/waarneembemiddeling/bigregister-soap).

## Configuration

There is no configration required by default. 

### Change the WSDL

If you want to override the WSDL:

    wb_big_register:
        wsdl: http://comapny.tld/soap?wsdl

### Use DoctrineCacheBundle or LiipDoctrineCacheBundle

You can easily pass in a Cache instance:

    wb_big_register:
        cache:
            service_id: liip_doctrine_cache.ns.your_cache_id
            ttl: 86400

### Overriding native SoapClient constructor configuration options

In case you want to tweak the behaviour of the native SoapClient, you override the $options array like this:

    parameters:
        wb_big_register.client.user_params: {'trace': true}

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
