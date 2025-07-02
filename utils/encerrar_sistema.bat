@echo off
taskkill /F /IM httpd.exe > nul 2>&1
taskkill /F /IM mysqld.exe > nul 2>&1