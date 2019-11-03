<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii2 Micro Service Template</h1>
    <br>
</p>

Yii 2 Micro Service is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web Service with RBAC feature. it is suitable for backend mobile application.


DIRECTORY STRUCTURE
-------------------

```
components/         contains Web components classes
controllers/        contains Web controller classes
models/             contains model classes
modules/            contains modules classes
tests/              contains various tests for the basic application
vendor/             contains dependent 3rd-party packages
web/                contains the entry script and Web resources
console/            contains Console app to help you build model with gii console
```

USAGE
-----

1. Clone this repo
2. Edit file /console/config/main.php for DB connection
3. Run migration
    ```
    ./yii migration
    ```
4. Create RBAC table
    ```
    ./yii migrate --migrationPath=@yii/rbac/migrations/
    ```
2. rename env-example to .env
3. Edit .env to configure your environment
5. Run your application


RUNNING
-------
You can run it from the micro-app/ directory via:
```
./yii serve --docroot=./web

```

CREATING MODEL WITH GII CONSOLE
-------------------------------
Because no web UI in this framework, we can use gii console. First one first edit console app in /console/config/main.php to connect to DB source. and run this command:

```
./yii gii/model --tableName=table_name --modelClass=class_name

```
Model Class will exist in /console/models directory. You can find detail about gii [here](https://www.yiiframework.com/extension/yiisoft/yii2-gii)
