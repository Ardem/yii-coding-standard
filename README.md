Yii Framework PHP CodeSniffer Coding Standard (official repo)
==============================================

It's an alpha version. For the full matching with Yii standards it's necessary to add just one rule:
- @Doc checking;

You can read about Yii standard here: https://github.com/yiisoft/yii/wiki/Core-framework-code-style

How to install
--------------

1. Install PEAR:

        http://pear.php.net/manual/en/installation.getting.php

2. Install PHP_CodeSniffer:

        pear install PHP_CodeSniffer

3. Install Yii Coding Standard:

        git clone git://github.com/Ardem/yii-coding-standard.git Yii
        sudo ln -sv /path/to/yii-coding-standard/Yii $(pear config-get php_dir)/PHP/CodeSniffer/Standards

4. If you want, you can set Yii as coding standard by default:

        phpcs --config-set default_standard Yii

How to make a simple test
-------------------------

1. Checking a file (if yii-coding-standard is your standard by default)

        phpcs path/to/file.php
        
2. Checking a file (if yii-coding-standard is NOT your standard by default)

        phpcs --standard=Yii /path/to/file.php
        
3. Checking a directory (if yii-coding-standard is your standard by default)

        phpcs /path/to/directory

4. Checking a directory (if yii-coding-standard is NOT your standard by default)

        phpcs --standard=Yii /path/to/directory
        
How to use CS in IDE
--------------------

1. NetBeans:

        http://plugins.netbeans.org/plugin/40282/phpmd-php-codesniffer-plugin

2. PHPStorm

        http://www.jetbrains.com/phpstorm/webhelp/using-php-code-sniffer-tool.html

3. Zend Studio

        http://files.zend.com/help/Zend-Studio/content/working_with_php_codesniffer.htm

How to make a standard coding in the team
-----------------------------------------

Use pre-commit hooks, which will make a code standard check for every commit.

1. For Git
        
        http://git-scm.com/book/en/Customizing-Git-Git-Hooks

2. For SVN

        http://pear.php.net/manual/ru/package.php.php-codesniffer.svn-pre-commit.php

Yii-coding-standard and Composer
--------------------------------

For using "yii-coding-standard" with Composer, include a dependency for "ardem/yii-coding-standard" in your composer.json file:

        {
                "require": {
                        "ardem/yii-coding-standard": "dev-master"
                }
        }
        
