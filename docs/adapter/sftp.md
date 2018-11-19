---
layout: default
permalink: /docs/adapter/sftp/
redirect_from: /adapter/sftp/
title: SFTP Adapter
---

## Installation

```bash
composer require Mazpaijo/flysystem-sftp
```

## Usage

```php
use Mazpaijo\Flysystem\Filesystem;
use Mazpaijo\Flysystem\Sftp\SftpAdapter;

$filesystem = new Filesystem(new SftpAdapter([
    'host' => 'example.com',
    'port' => 22,
    'username' => 'username',
    'password' => 'password',
    'privateKey' => 'path/to/or/contents/of/privatekey',
    'root' => '/path/to/root',
    'timeout' => 10,
]));
```
