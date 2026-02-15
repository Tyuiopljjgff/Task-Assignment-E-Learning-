
##angular 21.1.4  ,node v25.2.1  ,php 8.4  ,xampp v3.3.0  ,Laravel Framework 12.51.0  

---

##**Admin login credentials
 _'email' = 'admin@elearning.com'
 _'password' = password123'
---


###**Backend
---
_composer create-project --prefer-dist laravel/laravel my-laravel-project
_"Please replace the files in the following directories created by running the command composer create-project --prefer-dist laravel/laravel my-laravel-project with my files from GitHub:
-C:\xampp\htdocs\backend\app
-C:\xampp\htdocs\backend\resources
-C:\xampp\htdocs\backend\config
-C:\xampp\htdocs\backend\database
C:\xampp\htdocs\backend\routes"
npm install
php artisan migrate:fresh
php artisan db:seed
php artisan storage:link
php -S 127.0.0.1:12345 -t public

##Admindashboard run in:
http://localhost:12345/admin/
---


##**Frontend
npm install -g @angular/cli
"Please replace the "src" folder generated after running the npm install -g @angular/cli command with my src folder from GitHub."
npm install
ng serve 

##frontend run in:
http://localhost:4200/
---

