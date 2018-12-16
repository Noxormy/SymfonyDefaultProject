# SymfonyDefaultProject
This project can be used like basis of your Symfony project. <br/>
With default routes: getAction, createAction, updateAction, deleteAction and getMultipleAction
with filters.

##### Instructions for install:
1. Press a green button "Clone or Download" and copy link.
2. Clone the project. If you use PhpStorm:<br/> 
    a) Press **Check out from version control** -> **Git** <br/>
    b) Paste the link into the url field <br/>
    c) Click **Clone project**
3. Install php ([Manual][http://php.net/manual/ru/install.php], [Manual_rus][http://iantonov.me/page/ustanovka-php-71-v-windows-komandnaja-stroka]) And add php in system PATH variable.<br/>
    a) Open php.ini (In php installed folder) <br/>
    b) Find string **";extension=pdo_mysql"** <br/>
    c) You need delete semicolon, to make the row become like **"extension=pdo_mysql"**
4. Install Composer. ([Manual][https://getcomposer.org/download/])
5. Enter the command `composer install` in the terminal and wait until all dependencies are downloaded. <br/>
    a) If you have a problem with "framework.router" option "utf8" - edit config/packages/routing.yml, delete utf8 option.
6. Enter the command: `php bin/console server:run`. <br/>
7. Create database server.
8. Create database. Enter the command: `php bin/console doctrine:database:create`


[http://php.net/manual/ru/install.php]: http://php.net/manual/ru/install.windows.tools.php
[http://iantonov.me/page/ustanovka-php-71-v-windows-komandnaja-stroka]: http://iantonov.me/page/ustanovka-php-71-v-windows-komandnaja-stroka
[https://getcomposer.org/download/]: https://getcomposer.org/download/

##### Instructions for use:

1. Create entities, that you need with help doctrine. Enter the command: <br/>
 `php bin/console make:entity` <br/>
 a) You need to extend entity from **SampleEntity**, for this, write near name of your class **extends SampleEntity**
2. After you create entities, make migration. Enter the command: <br/>
  `php bin/console doctrine:migrations:diff`
3. And use migrate with command:
  `php bin/console doctrine:migrations:migrate`


#### Thanks for use!

###### you can contact me for email noxormy@gmail.com
