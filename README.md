run all command first

(first time) php artisan migrate:fresh --seed
1. php artisan serve
2. composer run dev


admin id : admin@local.com:password
user id : user@local.com:password


rm public/storage  # Remove existing symlink if it's broken
php artisan storage:link  # Create fresh symlink