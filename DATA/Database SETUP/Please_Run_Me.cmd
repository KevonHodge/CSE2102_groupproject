echo off
sqlcmd -E -S SQLSVRBOSTON1\MyDB1 -i database_creation.sql
set /p delExit=Press the ENTER key to exit...: