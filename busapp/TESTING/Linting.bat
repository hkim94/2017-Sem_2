@ECHO OFF
ECHO.
ECHO This is a batch file
ECHO.
Get-ChildItem -Path C:\xampp\htdocs\busapp *.php -Recurse -Force do (C:\xampp\php\php.exe -l)
PAUSE
EXIT