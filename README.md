Yii2 Framework PHP CodeSniffer Coding Standard
==============================================

!!! Alpha version. Don't use it in production !!!

You can read about Yii standard here: https://github.com/yiisoft/yii/wiki/Core-framework-code-style

How to install
--------------

1. Install PEAR:

        http://pear.php.net/manual/en/installation.getting.php

2. Install PHP_CodeSniffer:

        pear install PHP_CodeSniffer

3. Install Yii2 Coding Standard:

        pear config-show | grep php_dir
        cd /path/to/pear/PHP/CodeSniffer/Standards
        git clone git://github.com/Ardem/yii2-coding-standard.git Yii2

4. If you want, you can set Yii2 as coding standard by default:

        phpcs --config-set default_standard Yii2

How to make a simple test
-------------------------

1. Checking a file

        phpcs path/to/file.php
        
2. Checking a directory

        phpcs /path/to/directory
        
How to use in IDE
-----------------

1. NetBeans:

        http://plugins.netbeans.org/plugin/40282/phpmd-php-codesniffer-plugin

2. PHPStorm

        http://www.jetbrains.com/phpstorm/webhelp/using-php-code-sniffer-tool.html

3. Zend Studio

        http://files.zend.com/help/Zend-Studio/content/working_with_php_codesniffer.htm

How to be sure, that it works for everybody in the team
------------------------------------------------------

Use pre-commit hooks, which will make a code standard check for every commit.

1. For Git
        
        http://git-scm.com/book/en/Customizing-Git-Git-Hooks

2. For SVN

        http://pear.php.net/manual/ru/package.php.php-codesniffer.svn-pre-commit.php
        
