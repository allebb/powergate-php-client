# Laravel 4 Integration

Powergate PHP client has optional support for Laravel 4 and comes bundled with a **Service Provider** and **Facades** for easy integration.

Firstly you need to add the Powergate API client to your `composer.json` file found in the root of your Laravel 4 application, then run the `composer install` or `composer update` to pull in the new package.

 Next we need to add the service provider, to do this open up the `config/app.php` file and add the following line to the `$providers`:

```php
'Ballen\PowergateClient\PowergateServiceProvider',
```

Then add the new facades to the `$aliases` array like to:

```php
'Domain' => 'Ballen\PowergateClient\Facades\Domain',
'Record' => 'Ballen\PowergateClient\Facades\Record',
```

You should now also create a configuration file for Powergate, this contains your API server URL, API user and key. Create a new configuration file in `app/confg/powergate.php` with the following content:

```php
<?php

return array(
    'api' => array(
        'baseUrl' => 'http://api.yourserver.com/',
        'user' => 'api',
        'key' => '__KEY_GOES_HERE__',
    ));
```

Obviously, you should update the values in the above example with your own Powergate Server credentials.

Congratulations, the Powergate Client should now be auto-loaded by Laravel!

## Example usage

Once you have configured the Powergate Client for Laravel you can access your DNS Domain and Records like so:-

You can get a list of all of your configured domains like this:

```php
$all_domains = Domains::all();
```

Once you have obtained the Domain ID you can then request that domain including all records, this then enables you to retrieve the required record ID in order to push an update as shown in the exmaple below.

```php
$domain = Domain::find(1);

```

You can update an IP address of an 'A' record like so:

```php
$updated_ip = '188.23.12.90';

$updated = Record::update(1, array('content' => $updated_ip));

if(!$updated->errors)
{
    echo "Record updated successfully!";
    // We'll increment the SOA serial
    Domain::commitSerialUpdate($updated->record->domain_id);
} else {
    echo "Something went wrong, the API responded with the following error: $updated->message." ;
}
```

For more information with regards to the available class methods please see the [documentation](INDEX.md).