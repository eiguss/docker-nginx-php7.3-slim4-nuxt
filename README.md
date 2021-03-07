# Docker skeleton for nginx, slim4 (PHP7) and nuxt


![Node](https://img.shields.io/badge/node-12.21.0-brightgreen)
![npm](https://img.shields.io/badge/npm-6.14.11-blue)
![php](https://img.shields.io/badge/php-7.3-9cf)
![nuxt](https://img.shields.io/badge/nuxt.js-v2.14.11-04C690.svg)
![slim](https://img.shields.io/badge/slim-4-green)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](https://opensource.org/licenses/MIT)

## Docker services

This project have three services:
1. nginx: load balancer
2. php: docker wher we will have the server code
3. node: dockeer where we will generate the assets for the app

## Installation

You need to have doker in you computer to install it. To run the dockers execute:

```sh
# docker up
make du
```

This will make available a nuxt dev server in localhost:3000 to develop the frontend application, this is a hotreloading to make easy the development.

PHP will run in localhost:8080. The PHP docker will get the static nuxt HTML getting the static assets if they generated, to generate it execute:
```sh
# docker up
make node-build
```

This script will generate the assets with the html and move them to the server folder.

## Usage
The folder /server have the php code using slim4 for more information about this framework go to https://www.slimframework.com/docs/v4/. The code in the skeleton is to have a /api endpoint that the frontend will call.

The folder /node have the nuxt code. For more information about this framework go to https://nuxtjs.org/

## Test

In the php and node docker we have a folder to make the tests called "/tests".
The test are prepared to be executed using:

```sh
make test
```

The php coverage will be available in http://localhost:8080/coverage/index.html
