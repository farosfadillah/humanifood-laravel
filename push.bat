@echo off
cd /d C:\xampp\htdocs\humanifood\humanifood-laravel
git remote add origin https://github.com/farosfadillah/humanifood-laravel.git 2>nul || echo Remote already exists
git branch -M main
git push -u origin main
pause
