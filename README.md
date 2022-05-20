# KNOD - API

## Pre-required 📲

* [Git](https://git-scm.com/downloads)
* [Node.js](https://nodejs.org/en/download/)
* [Composer](https://getcomposer.org/download/) 
* [Docker](https://www.docker.com/get-started/), [Docker-compose](https://docs.docker.com/compose/install/)
* [Symfony CLI](https://symfony.com/download)
* PHP ^8.0 by Servers like : 
  * [WampServer | Xampp](https://www.wampserver.com/en/)
  * [MAMP](https://www.mamp.info/en/downloads/)

## 1. DEPOT GITLAB

### IF YOU HAVE RIGHT TO USE SSH 😎
```
git clone git@gitlab.com:knod1/knod-admin.git
```
### OR 🤔
```
git clone https://gitlab.com/knod1/knod-admin.git

git clone git@gitlab.com:knod1/knod-admin.git
cd knod-admin
```
### IF LINUX & MACOS 😎
```
make install
make runWithDocker
```
### ELSE 🤔
```
docker-compose up --build -d
composer install
symfony server:start -d
```
### ENDIF

## 2. DEPOT GITHUB

```
Comming soon
```
