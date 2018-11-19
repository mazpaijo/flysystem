---
layout: default
permalink: /docs/adapter/null-test/
redirect_from: /adapter/null-test/
title: Null Adapter
---

## Installation

Comes with the main Flysystem package.

## Usage

Acts like `/dev/null`

```php
$adapter = new Mazpaijo\Flysystem\Adapter\NullAdapter;
$filesystem = new Mazpaijo\Flysystem\Filesystem($adapter);
```
