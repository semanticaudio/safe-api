## SAFE API

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

A micro API for the SAFE project

## Lumen Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

## SAFE API Documentation

So, this is pretty simple...For now we only have 3 endpoints:

```php
/v1/{plugin}/{format}

/v1/{plugin}/term-list.json

/v1/{plugin}/{datatype}/{id}/{format}
```

## /v1/{plugin}/{format}
This endpoint retrieves the userdata for the requested terms

You can use the IDs we return to get more info on that specific term
#### GET Parameters
`{plugin}`
+ SAFECompressor
+ SAFEDistortion
+ SAFEEqualiser
+ SAFEReverb

`{{format}}`
+ json
+ csv
+ xml
+ we're working on adding more output format like MATLab, if you want to help us feel free to make a pull request

#### POST Parameters
`terms=[<term>,<term>,...]` or `terms=all`

The parameter above can be either an array to get the userdata from specific terms or just a string `all` to retrieve all the terms we have on the requested plugin.

`sneakpeek=true`

This parameter will do 2 things, the first thing is it will only retrieve 5 entries of the requested terms. The second thing is it will give you all the other data we have on that specific entry on that term.

**Warning:** When using sneakpeek the response can take several seconds as we need to process all the data we're giving out to you.

## /v1/{plugin}/term-list.json
This endpoint lists all the terms available on the plugin requested in a JSON format

This is ussually used to feed autocomplete inputs 
#### GET Parameters
`{plugin}`
+ SAFECompressor
+ SAFEDistortion
+ SAFEEqualiser
+ SAFEReverb

## /v1/{plugin}/{datatype}/{id}/{format}
This endpoint retrieves all the information for a specific term ID 

You can get the IDs on [/v1/{plugin}/{format}](#v1pluginformat)

#### GET Parameters
`{plugin}`
+ SAFECompressor
+ SAFEDistortion
+ SAFEEqualiser
+ SAFEReverb

`{datatype}`
+ userdata
+ deltas
+ deltadeltas
+ audiofeaturedata
+ all

`id`

`{{format}}`
+ json
+ csv
+ xml
+ we're working on adding more output format like MATLab, if you want to help us feel free to make a pull request



