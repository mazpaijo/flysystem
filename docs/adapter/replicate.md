---
layout: default
permalink: /docs/adapter/replicate/
redirect_from: /adapter/replicate/
title: Replicate Adapter
---

## Installation

```bash
composer require Mazpaijo/flysystem-replicate-adapter
```

## Usage

The `ReplicateAdapter` facilitates smooth transitions between adapters, allowing an application to stay functional and migrate its files from one adapter to another. The adapter takes two other adapters, a source and a replica. Every change is delegated to both adapters, while all the read operations are passed onto the source only.

```php
$source = new Mazpaijo\Flysystem\AwsS3V3\AwsS3Adapter(...);
$replica = new Mazpaijo\Flysystem\Adapter\Local(...);
$adapter = new Mazpaijo\Flysystem\Replicate\ReplicateAdapter($source, $replica);
$filesystem = new Filesystem($adapter);
```
