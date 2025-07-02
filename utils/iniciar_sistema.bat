@echo off
cd /d "D:\editores_de_codigo\xampp"
start "" /B apache\bin\httpd.exe
start "" /B mysql\bin\mysqld.exe
timeout /t 5 > nul
start "" http://localhost/acdv/view
