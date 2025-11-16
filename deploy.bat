@echo off
echo ========================================
echo Restaurant Demo - GitHub Deployment
echo ========================================
echo.

REM Initialize git if not already initialized
if not exist .git (
    echo Initializing Git repository...
    git init
    echo.
)

REM Add all files
echo Adding files to Git...
git add .
echo.

REM Commit changes
echo Committing changes...
set /p commit_message="Enter commit message (or press Enter for default): "
if "%commit_message%"=="" set commit_message=Initial commit - Restaurant ordering system

git commit -m "%commit_message%"
echo.

REM Add remote if not exists
git remote get-url origin >nul 2>&1
if errorlevel 1 (
    echo Adding remote repository...
    git remote add origin https://github.com/guardiansofit360-spec/rdemo.git
    echo.
)

REM Push to GitHub
echo Pushing to GitHub...
git branch -M main
git push -u origin main
echo.

echo ========================================
echo Deployment Complete!
echo ========================================
echo.
echo Your project has been pushed to:
echo https://github.com/guardiansofit360-spec/rdemo
echo.
pause
