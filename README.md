## Overview
This project is an interactive quiz website that offers a collection of various quiz games. It was part of my education and was programmed in JS and PHP.

## Technologies
- PHP
- JavaScript
- CSS

## Functionalities
- **Quiz Game**: 4 multiple-choice questions similar to the format of "Who Wants to Be a Millionaire".
- **Time Limit**: There is a time limit for each question. Answering brings additional time.
- **Scoring System**: Points are calculated based on the remaining time and the number of correct answers.
- **Admin Area**: Ability to create new quizzes and add questions.
- **Leaderboard**: Display of top players.
- **Result Evaluation**: After completing a quiz, players receive feedback in the form of a rank and the percentage of correct answers.

## Installation
1. **Download and install XAMPP**: [XAMPP Download Link](https://www.apachefriends.org/download.html)
2. **Place project files**: Copy the project into the `htdocs` folder of XAMPP.
3. **Run Setup:** Start Setup.bat to create the correct folder structure outside of `htdocs`.
4. **Start XAMPP**: Start the Apache server via the XAMPP Control Panel.
5. **Access the Quiz**: Open a web browser and navigate to `http://localhost` to start the quiz.

### Automated Setup Routine

This project has a setup script that should be activated upon first execution of the application. This script is crucial for the correct setup of the application environment.

#### Functions of the Setup Script:
- **Creation of necessary resources**: The script creates all required folders and initializes `.csv` files needed for the application to function.
- **Note**: Important files, especially `.csv` files, are created outside the `htdocs` folder. This protects them from direct web access and provides additional security against unauthorized access.

#### Important Notes on CSV Files:
- **Manual filling required**: After the setup script has initialized the `.csv` files, they must be manually filled with the appropriate data. This typically involves inserting user data, quiz questions, and other relevant information needed for the application.
- **Instructions for filling**: Please follow the given structure and format when filling the `.csv` files to ensure the application functions correctly.
  
---

## Structure of the CSV Files

The application uses various `.csv` files to store data. Below are the required formats and structures for each of these files.

### Leaderboard (leaderboard.csv)

The `leaderboard.csv` file stores the leaderboard information. Initially, this file is empty and gets filled with player data as they use the application.

**Format**: Since this file is dynamically filled, there is no fixed initial format.

### Question Packs (questionpacks.csv)

The `questionpacks.csv` file contains the quiz questions and their answers. It requires a special header that is not read by the application but serves to structure the data.

**Format**:
- ID,Question,Answer1,Answer2,Answer3,Answer4,CorrectAnswerID
- 1,Example Question?,Answer A,Answer B,Answer C,Answer D,3
- 2,Another Question?,Option 1,Option 2,Option 3,Option 4,1

### Administrators (admin.csv)
The `admin.csv` file stores login data for administrators. This file should be initialized to contain at least one admin user.

**Format**:
- 1,admin,pass
---

## User Roles
- **Regular Users**: Can participate in the quizzes and see their results on the leaderboard.
- **Admins**: Have the ability to create new quizzes and questions and manage the quiz.

## Application Guide

### User Panel

Upon entering the application, users are first greeted by the **User Panel**. Here you have two options:

1. **User Login**: Log in as a regular user to access the quiz

games.
2. **Admin Login**: Specifically for administrators to manage questions and perform other administrative tasks.

### Dashboard

After logging in, you reach the main dashboard, which offers the following elements:

- **Play Button**: Choose your quiz stack and start the game.
- **Config Field**: Here you can adjust the volume of sound effects (SFX) and background music. Enjoy soothing jazz music 🎷 while you play.
- **GitHub Repo**: Access to the source code of the project. Visit the repository to learn more about the development.

### Footer Area

In the lower area of the application, you will find the **Footer**, which displays useful information:

- **Current User**: See under which username you are logged in. Hovering over the username with the mouse brings up an option to log out and return to the main menu.

---

## License
This project is published under the MIT license.
