---
layout: default
permalink: /docs/adapter/dropbox/
redirect_from: /adapter/dropbox/
title: Dropbox Adapter
---

## Installation

```bash
composer require spatie/flysystem-dropbox
```

## Usage

A token can be generated in the [App Console](https://www.dropbox.com/developers/apps) for any Dropbox API app. You'll find more info at [the Dropbox Developer Blog](https://blogs.dropbox.com/developers/2014/05/generate-an-access-token-for-your-own-account/).

```php
use Mazpaijo\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter;

$client = new Client($authorizationToken);

$adapter = new DropboxAdapter($client);

$filesystem = new Filesystem($adapter);
```
