@echo off
cd test
start php artisan serve
start npm run dev
start http://127.0.0.1:8000
