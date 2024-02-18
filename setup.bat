@echo off

REM Create the directories
mkdir ..\phQUIZ
mkdir ..\phQUIZ\question_packs

REM Create the CSV files
echo. > ..\phQUIZ\leaderboard.csv
echo. > ..\phQUIZ\admin.csv

REM Create the sample question pack with the specified header
echo ID,Question,Answers1,Answer2,Answer3,Answer4,Correct_Answer_ID > ..\phQUIZ\question_packs\sample.csv