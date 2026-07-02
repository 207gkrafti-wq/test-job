@echo off
cd "test"
start /b php composer.phar install
start /b npm install
start /b npm install bootstrap