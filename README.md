# Light-Blog

A blog system based on [Light Framework](https://github.com/zeyuec/light).

# Features

1. Using [Smarty](http://www.smarty.net) as template engine.
2. Using [Disqus](http://disqus.com) to manage comments.
3. Using [PHP-Markdown](http://michelf.ca/projects/php-markdown/) to parse Markdown syntax.

# How to Install

1. Config nginx like [Light Framwork](https://github.com/zeyuec/light).
2. Dump light_blog.sql to your MySQL Database.
3. Unzip all files.
4. Run "grep -ri '!YOUR' ." to find configs you need to fill, like database name, Disqus account name and so on
5. Write your firt blog with Markdown syntax in 'Post' table in database.

# Demo

See my blog [here](http://obcerver.com).
