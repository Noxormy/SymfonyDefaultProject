# SymfonyDefaultProject
This project can be used like basis of your Symfony project. <br/>
With default routes: getAction, createAction, updateAction, deleteAction and getMultipleAction
with filters.

##### Instructions for use:
1. Press a green button "Clone or Download" and copy link.
2. Clone the project. If you use PhpStorm:<br/> 
    a) Press "Check out from version control" -> "Git" <br/>
    b) Paste the link into the url field <br/>
    c) Click "Clone project"
3. Install php ([Manual][http://php.net/manual/ru/install.php], [Manual_rus][http://iantonov.me/page/ustanovka-php-71-v-windows-komandnaja-stroka]) And add php in system PATH variable.<br/>
4. Install Composer. ([Manual][https://getcomposer.org/download/])
5. Enter the command `composer install` in the terminal and wait until all dependencies are downloaded. <br/>
    a) If you have a problem with framework.router option "utf8" - edit config/packages/routing.yml, delete utf8 option.
6. Enter the command: `php bin/console server:start`.<br/>
    a) If you get a answer 
    >This command needs the pcntl extension to run.<br/>
    You can either install it or use the "server:run" command instead."<br/>
    Enter the command:<br/>
    `php bin/console server:start`


[http://php.net/manual/ru/install.php]: http://php.net/manual/ru/install.windows.tools.php
[http://iantonov.me/page/ustanovka-php-71-v-windows-komandnaja-stroka]: http://iantonov.me/page/ustanovka-php-71-v-windows-komandnaja-stroka
[https://getcomposer.org/download/]: https://getcomposer.org/download/