# Community-Needs-Assessment-app
To help government know your needs directly using Yii2 advanced template

Yii2 Advanced Template Customization for Addon Domains

## LINKS

- https://www.yiiframework.com/download
- https://www.yiiframework.com/extension/yiisoft/yii2-app-advanced/doc/guide/2.0/en/start-installation

## INSTALL

`composer create-project yiisoft/yii2-app-advanced advanced`

`php init`

> *... Create and config db \environments\dev\common\config\main-local.php*

`php yii migrate`


## PRETTY URL
1. Copy .htacces file into web root folder
2. In web.php or main.php uncomment the following

```php
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
```

## SEPERATE APP FROM WEB ROOT

1. Copy the `web` folder out of the project
2. Re-configure the `index.php` inside `web` to point back to the files in the project/app folder

```php
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../application/vendor/autoload.php';
require __DIR__ . '/../application/vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../application/common/config/bootstrap.php';
require __DIR__ . '/../application/frontend/config/bootstrap.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../application/common/config/main.php',
    require __DIR__ . '/../application/common/config/main-local.php',
    require __DIR__ . '/../application/frontend/config/main.php',
    require __DIR__ . '/../application/frontend/config/main-local.php'
);

(new yii\web\Application($config))->run();
```

