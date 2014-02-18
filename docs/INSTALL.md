# Installing Powergate PHP Client

The best way to install the library is quickly and easily with [Composer](http://getcomposer.org).

Powergate PHP Client is available via [Packagist](http://packagist.org).

Require the package via Composer in your `composer.json` like so:

```json
"ballen/powergate-client": "dev-master"
```

Then we need to run Composer to install or update the new requirements.

```shell
$ php composer.phar install
```

or

```shell
$ php composer.phar update
```

Now you are able to require the `vendor/autoload.php` file to have the library autoloaded.

Here is a PHP example of how you can autoload the package into your script(s):

```php

// We include the composer autoload file...
require 'vendor/autoload.php';

// Lets 'import' the Powergate PHP Client class
use Ballen\PowergateClient\Domain; // Used for management of Domains and SOA's
use Ballen\PowergateClient\Record; // Used for management of Domain Records

// You can now access information about all your domains like so:
$domains = new Domain('http://api.yourdnserver.com/', 'api_user_here', 'api_key_here');

// As an example we'll just dump out all the domains configured on the server...
var_dump($domains->all());

// If you need to work with individual records, create a record handler object like so:
$record = new Record('http://api.yourdnserver.com/', 'api_user_here', 'api_key_here');

// Lets update a record's name, IP address and set the TTL (time to live) value for the record...
$update = $record->update(12, [
	'name' => 'www.mydomain.com'
	'content' => '80.2.33.198'
	'ttl' => 3600,
	]);

// We should also commit a new SOA serial to the domain's SOA record to trigger PowerDNS's slave server propagation, the SOA serial incrementation is automatic and adhears to the RFC standard format 'YYYYMMDDnn'!
$domains->commitSerialUpdate($update->id);

```

This library also has optional Laravel 4 support. The integration into the framework can be achieved in seconds, if this tickles your fancy feel free to [read more about Laravel 4 integration](docs/LARAVEL-INTEGRATION.md).