@echo off
REM ============================================================================
REM CodeIgniter Upgrade Script - 3.1.10 to 3.1.13
REM For Windows XAMPP
REM ============================================================================

echo.
echo ========================================
echo  CodeIgniter Upgrade to 3.1.13
echo ========================================
echo.

REM Check if running in correct directory
if not exist "system" (
    echo ERROR: Folder 'system' not found!
    echo Please run this script from PPID root directory
    echo Example: C:\xampp81\htdocs\ppidC\
    pause
    exit /b 1
)

echo [Step 1/5] Backing up current system folder...
echo.

REM Create backup with timestamp
for /f "tokens=2 delims==" %%I in ('wmic os get localdatetime /value') do set datetime=%%I
set BACKUP_NAME=system_backup_%datetime:~0,8%_%datetime:~8,6%

if exist "%BACKUP_NAME%" (
    echo Backup folder already exists: %BACKUP_NAME%
    echo Skipping backup...
) else (
    xcopy /E /I /Q system "%BACKUP_NAME%"
    if errorlevel 1 (
        echo ERROR: Failed to backup system folder!
        pause
        exit /b 1
    )
    echo Backup created: %BACKUP_NAME%
)

echo.
echo [Step 2/5] Downloading CodeIgniter 3.1.13...
echo.

REM Download CI 3.1.13
set CI_URL=https://github.com/bcit-ci/CodeIgniter/archive/refs/tags/3.1.13.zip
set CI_ZIP=CodeIgniter-3.1.13.zip

REM Check if already downloaded
if exist "%CI_ZIP%" (
    echo File already exists: %CI_ZIP%
    echo Skipping download...
) else (
    echo Downloading from: %CI_URL%
    powershell -Command "Invoke-WebRequest -Uri '%CI_URL%' -OutFile '%CI_ZIP%'"
    if errorlevel 1 (
        echo ERROR: Failed to download CodeIgniter!
        echo.
        echo Please download manually from:
        echo %CI_URL%
        echo.
        echo Then extract and copy 'system' folder manually.
        pause
        exit /b 1
    )
    echo Download completed!
)

echo.
echo [Step 3/5] Extracting CodeIgniter 3.1.13...
echo.

REM Extract ZIP
if exist "CodeIgniter-3.1.13" (
    echo Folder already extracted: CodeIgniter-3.1.13
    echo Skipping extraction...
) else (
    powershell -Command "Expand-Archive -Path '%CI_ZIP%' -DestinationPath '.' -Force"
    if errorlevel 1 (
        echo ERROR: Failed to extract ZIP file!
        echo Please extract manually: %CI_ZIP%
        pause
        exit /b 1
    )
    echo Extraction completed!
)

echo.
echo [Step 4/5] Replacing system folder...
echo.

REM Remove old system folder
if exist "system_old" (
    rmdir /S /Q "system_old"
)
ren system system_old

REM Copy new system folder
xcopy /E /I /Q "CodeIgniter-3.1.13\system" "system"
if errorlevel 1 (
    echo ERROR: Failed to copy new system folder!
    echo Restoring backup...
    ren system_old system
    pause
    exit /b 1
)

echo System folder updated successfully!

echo.
echo [Step 5/5] Cleanup...
echo.

REM Cleanup
rmdir /S /Q "CodeIgniter-3.1.13"
del /Q "%CI_ZIP%"
rmdir /S /Q "system_old"

echo Cleanup completed!

echo.
echo ========================================
echo  Upgrade Completed Successfully!
echo ========================================
echo.
echo Backup Location: %BACKUP_NAME%
echo.
echo Next Steps:
echo 1. Restart Apache in XAMPP Control Panel
echo 2. Test your application: http://localhost:8080/ppidC/
echo 3. Check error logs for any issues
echo.
echo To verify CI version, create file version_check.php:
echo ^<?php
echo define('BASEPATH', TRUE);
echo require_once 'system/core/CodeIgniter.php';
echo echo "CI Version: " . CI_VERSION;
echo ?^>
echo.
echo If anything goes wrong, restore backup:
echo   1. Delete 'system' folder
echo   2. Rename '%BACKUP_NAME%' to 'system'
echo   3. Restart Apache
echo.

pause
