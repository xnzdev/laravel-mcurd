# laravel-mcurd
CURD for ant design 
模版构建器

## Laravel中使用

### 安装
```
composer install xnzdev/laravel-mcurd

# 指定版本
composer require "xnzdev/laravel-mcurd:v1.1"
```
### 使用
```
# 1.发布
> 该操作会发布assets静态文件，到public目录下
php artisan vendor:publish  --tag xnz-api

# 2.启动laravel，例如
php artisan serve   #8000端口

# 3.访问地址，进行使用CURD中的功能
http://127.0.0.1:8000/xnzdev/model

```

### 卸载
```
composer remove xnzdev/laravel-mcurd
```
