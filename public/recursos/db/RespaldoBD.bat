@echo off
for /f "tokens=2 delims==" %%a in ('wmic OS Get localdatetime /value') do set "dt=%%a"
set "AA=%dt:~2,2%"
set "AAAA=%dt:~0,4%"
set "MM=%dt:~4,2%"
set "DD=%dt:~6,2%"
set "HH=%dt:~8,2%"
set "Min=%dt:~10,2%"
 
set "dia_hora=%AAAA%_%MM%_%DD%_%HH%_%Min%"

C:\sqlite\sqlite3 "C:\SEASC Prod\SAPIServer v1.0\dbrepos\db\seasc.db" ".backup D:\\RespaldoBD_Seasc\\Seasc_%dia_hora%.bak"