@ECHO OFF
ECHO.
ECHO This is a batch file
ECHO.
%A=Invoke-WebRequest -URI "http://localhost/busapp/View/UI/admin.php
%admin = %A.Forms[0]
%admin.fields
%admin.Fields["loginID"] = "admin"
%admin.Fields["password"] = "H@nnah1215"
%A = Invoke-WebRequest -URI ("http://localhost/busapp/Controller/login_admin.php) -Method POST -Body %admin.Fields
%A.StatusDescription
PAUSE
EXIT