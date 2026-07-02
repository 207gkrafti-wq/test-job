@echo off
cd "test"
start /b php com
start /b php artisan serve
start /b npm run dev
start http://127.0.0.1:8000
