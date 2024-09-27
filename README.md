<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">"Orders List" Yii 2 application</h1>
    <br>
</p>

Application based on [Yii 2](http://www.yiiframework.com/) and provides filterable list of Orders in 2 languages.

REQUIREMENTS
------------

- non-root user with sudo privileges
- Docker and docker-compose should be installed. 
Minimum required Docker engine version `17.04` for development (see [Performance tuning for volume mounts](https://docs.docker.com/docker-for-mac/osxfs-caching/)). 


|       | v.   |
|-------|------|
| PHP   | 7.4+ |
| MySQL | 8.0+ |

INSTALLATION
------------

### Install with Docker

- Clone project from git repository to some folder (`yii2orderslist`):
~~~
    git clone https://github.com/saint-father/newbetesttask -b feature/PP-test-task yii2orderslist
~~~
- Goto project directory:
~~~
    cd yii2orderslist/
~~~
- Build up downloaded containers:
~~~
    docker-compose up -d --build
~~~
- When you get 
~~~
[+] Running 3/3
 ⠿ Container orderslist-php    Started
 ⠿ Container orderslist-nginx  Started
 ⠿ Container orderslist-db     Started
~~~
run Shell instance to be able execute composer and yii CLI commands:
~~~
docker-compose exec php bash
~~~
- In **php** environment run composer update and install to update/install vendor packages and run the installation triggers (creating cookie validation code & etc.):
~~~
user@b58ddb0ba84e:/var/www$ composer update --prefer-dist
user@b58ddb0ba84e:/var/www$ composer install
~~~
then run **Yii** migrations
~~~
user@b58ddb0ba84e:/var/www$ php yii migrate
~~~
with `yes` answer:
~~~ 
Apply the above migration? (yes|no) [no]:yes 
~~~
- You can then access the application through the following URL:
~~~
  http://127.0.0.1:8080
~~~

## Troubleshooting

### Docker building exception.

For instance:
~~~
⠋ Container orderslist-php           Creating                                                                                      0.1s
Error response from daemon: Conflict. 
The container name "/orderslist-php" is already in use by container "e196c8113ca333f486b13571f347fb96bc8d70904690007731cf017318e99db2". 
You have to remove (or rename) that container to be able to reuse that name.
~~~
Creating `orderslist-php` container exception.

Try to delete other containers or check what the container has name `"/orderslist-php"` and rename it.