# For IWM 

# How to deploy for developpers 

1 - install <a href="https://getcomposer.org/">composer</a> <br>
2 - Create a copy of `.env.exemple`, rename the copy to `.env`  
2 - Execute the next commandes 

```sh
cd ./iwm
composer install
php artisan key:generate
```
3 - create a vhost in your local server for the domaine 

```sh
iwm.com
```

4 - if you can't find the public storage execute the next commandes

```sh
cd ./iwm
php artisan storage:link
```
