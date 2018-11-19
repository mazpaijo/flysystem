---
layout: default
permalink: /docs/adapter/rackspace/
redirect_from: /adapter/rackspace/
title: Rackspace Adapter
---

## Installation

```bash
composer require Mazpaijo/flysystem-rackspace
```

## Usage

```php
use OpenCloud\OpenStack;
use OpenCloud\Rackspace;
use Mazpaijo\Flysystem\Filesystem;
use Mazpaijo\Flysystem\Rackspace\RackspaceAdapter;

$client = new OpenStack(Rackspace::UK_IDENTITY_ENDPOINT, [
    'username' => ':username',
    'password' => ':password',
]);

$store = $client->objectStoreService('cloudFiles', 'LON');
$container = $store->getContainer('flysystem');

$filesystem = new Filesystem(new RackspaceAdapter($container, 'optional/path/prefix'));
```
