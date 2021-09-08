## 创建用户注册表格
php bin/console make:registration-form

## Generating the Login Form
php bin/console make:auth

## 给密码编码
php bin/console security:encode-password

## 第一步，创建User实体
php bin/console make:user

## 运行webpack debug
npm run watch

## 安装webpack
composer require webpack-encore

## Update an entity in Symfony 4?
php bin/console doctrine:cache:clear-metadata
php bin/console doctrine:migrations:diff
php bin/console doctrine:migrations:migrate --all-or-nothing

## 更新 entity 数据关系
php bin/console make:entity --regenerate

## 根据entity 更新数据库
php bin/console doctrine:schema:update --force
php bin/console doctrine:schema:update --dump-sql
php bin/console doctrine:schema:drop --dump-sql

## 创建 Entity
php bin/console make:entity

composer clear-cache

## composer 中国镜像
composer config -g repo.packagist composer https://packagist.phpcomposer.com

## So if you just want to rebuild your bootstrap cache file then I suggest you run the post-update-cmd command.
composer run-script post-update-cmd

## composer require --no-unpack ... option to disable unpacking.
## 一键安装 var_dump 及相关包 (3.4以上的版本自带dump)
composer require --dev debug

## 检查环境 开启symfony自带server http://localhost:8000/
symfony server:start

## 检查环境
symfony check:requirements
symfony check:security
symlink from vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/public/ to web/bundles/framework

## 检查说明
php bin/console about

## 用composer建立symfony新项目
composer create-project symfony/framework-standard-edition sf3 "3.0.0"

## 安装3.4网页预装框架
symfony new my_project_name --full --version=3.4
symfony new my_project_name --full
symfony new my_project_name

# Creating a new Symfony Demo project with Composer
symfony new my_project_name --demo
