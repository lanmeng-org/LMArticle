### LMArticle 
一个轻量的文章发布系统，可自定义配置各页面的 标题 关键词 描述 来定制SEO优化

### 环境要求
`PHP >= 5.6.4`

### 安装

执行
```
git clone git@github.com:lanmeng-org/LMArticle.git
cd LMArticle
composer install
```

编辑 `.env` 配置数据库等相关信息(如未生成`.env`文件, 可手动复制`.env.example`为`.env`文件)

执行 `./artisan migrate` 迁移数据库信息

### 默认信息
*后台地址*
`/admin`

*账号*
`admin@lanmeng.org`

*密码*
`lanmeng.org`

### 案例
- http://www.qiu5.cc
- http://www.lzpian.com
