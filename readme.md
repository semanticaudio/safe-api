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

## Examples

Example usage for the `agressive` term: 

http://api.semanticaudio.co.uk/SAFEEqualiser/json
#### POST
`terms=['agressive']`

##### curl Example
```bash
curl --request POST 'http://api.semanticaudio.co.uk/v1/SAFEEqualiser/json' --data 'terms=["agressive"]'
```

#### Response

```json	
[
  {
    "ID": "226",
    "userdata": {
      "ID": "226",
      "Descriptors": "agressive",
      "numInputs": "1",
      "numOutputs": "1",
      "Param_Band1Gain": "1.2190476655960083",
      "Param_Band1Frequency": "236.3627471923828",
      "Param_Band2Gain": "0",
      "Param_Band2Frequency": "560",
      "Param_Band2QFactor": "0.7099999785423279",
      "Param_Band3Gain": "-12",
      "Param_Band3Frequency": "867.53076171875",
      "Param_Band3QFactor": "0.7099999785423279",
      "Param_Band4Gain": "12",
      "Param_Band4Frequency": "6155.52685546875",
      "Param_Band4QFactor": "0.7099999785423279",
      "Param_Band5Gain": "0",
      "Param_Band5Frequency": "8200",
      "Metadata_Genre": "reggae",
      "Metadata_Instrument": "",
      "Metadata_Location": "birmingham",
      "Metadata_Experience": "8 years",
      "Metadata_Age": "45",
      "Metadata_Language": "english",
      "FeatureChecksum": "b9421b0ff0addddf4ceaa75800f90e52"
    }
  },
  {
    "ID": "236",
    "userdata": {
      "ID": "236",
      "Descriptors": "agressive",
      "numInputs": "1",
      "numOutputs": "1",
      "Param_Band1Gain": "7.009523868560791",
      "Param_Band1Frequency": "227.9779052734375",
      "Param_Band2Gain": "-4.876190662384033",
      "Param_Band2Frequency": "513.8471069335938",
      "Param_Band2QFactor": "0.7099999785423279",
      "Param_Band3Gain": "0",
      "Param_Band3Frequency": "1000",
      "Param_Band3QFactor": "0.7099999785423279",
      "Param_Band4Gain": "11.580952644348145",
      "Param_Band4Frequency": "2831.45947265625",
      "Param_Band4QFactor": "0.7099999785423279",
      "Param_Band5Gain": "6.400000095367432",
      "Param_Band5Frequency": "9158.287109375",
      "Metadata_Genre": "reggae",
      "Metadata_Instrument": "",
      "Metadata_Location": "birmingham",
      "Metadata_Experience": "8 years",
      "Metadata_Age": "45",
      "Metadata_Language": "english",
      "FeatureChecksum": "dbdd5c31a0e06dcf278a88314cb8e381"
    }
  }
]
```

Now let's get all the data for one of these entries for the `agressive` descriptor

http://api.semanticaudio.co.uk/v1/SAFEEqualiser/all/226/json

```bash
curl --request GET 'http://api.semanticaudio.co.uk/v1/SAFEEqualiser/all/226/json'
```

##### Response

```json
{
  "userdata": {
    "ID": "226",
    "Descriptors": "agressive",
    "numInputs": "1",
    "numOutputs": "1",
    "Param_Band1Gain": "1.2190476655960083",
    "Param_Band1Frequency": "236.3627471923828",
    "Param_Band2Gain": "0",
    "Param_Band2Frequency": "560",
    "Param_Band2QFactor": "0.7099999785423279",
    "Param_Band3Gain": "-12",
    "Param_Band3Frequency": "867.53076171875",
    "Param_Band3QFactor": "0.7099999785423279",
    "Param_Band4Gain": "12",
    "Param_Band4Frequency": "6155.52685546875",
    "Param_Band4QFactor": "0.7099999785423279",
    "Param_Band5Gain": "0",
    "Param_Band5Frequency": "8200",
    "Metadata_Genre": "reggae",
    "Metadata_Instrument": "",
    "Metadata_Location": "birmingham",
    "Metadata_Experience": "8 years",
    "Metadata_Age": "45",
    "Metadata_Language": "english",
    "FeatureChecksum": "b9421b0ff0addddf4ceaa75800f90e52"
  },
  "deltas": {
    "processed": [...],
    "unprocessed": [...]
  },
  "deltadeltas": {
    "processed": [...],
    "unprocessed": [...]
  },
  "audiofeaturedata": {
    "processed": [...],
    "unprocessed": [...]
  }
}
```

And there you have, some semantic audio data :)