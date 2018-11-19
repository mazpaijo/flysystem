---
layout: default
permalink: /docs/adapter/webdav/
redirect_from: /adapter/webdav/
title: WebDAV Adapter
---

## Installation

```bash
composer require Mazpaijo/flysystem-webdav
```

## Usage

```php
$client = new Sabre\DAV\Client($settings);
$adapter = new Mazpaijo\Flysystem\WebDAV\WebDAVAdapter($client, 'optional/path/prefix');
$flysystem = new Mazpaijo\Flysystem\Filesystem($adapter);
```
