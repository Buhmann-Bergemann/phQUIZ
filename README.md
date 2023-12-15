[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-24ddc0f5d75046c5622901739e7c5dd533143b0c8e959d652212380cedb1ea36.svg)](https://classroom.github.com/a/uTZu5Ndq)
# Quizwebsite-Projekt

## Überblick
Dieses Projekt ist eine interaktive Quizwebsite, die eine Sammlung verschiedener Quizspiele bietet. Die Quizfragen werden zufällig ausgewählt, sodass bei jedem Spielstart eine einzigartige Sequenz von Fragen präsentiert wird. Zusätzlich gibt es einen Admin-Bereich für die Verwaltung, wo neue Quizzes und Fragen hinzugefügt werden können. Besondere Features sind ein Leaderboard und eine Auswertung der Quizergebnisse, einschließlich eines Rangs und der Anzeige des prozentualen Anteils der korrekten Antworten.

## Technologien
- PHP
- JavaScript
- CSS
- XAMPP für die lokale Hosting-Umgebung

## Funktionalitäten
- **Quiz-Spiel**: 4 Multiple-Choice-Fragen ähnlich dem Format von "Wer wird Millionär".
- **Zeitlimit**: Für jede Frage gibt es ein Zeitlimit. Korrekte Antworten bringen zusätzliche Zeit.
- **Punktesystem**: Punkte werden auf Basis der verbleibenden Zeit und der Anzahl der korrekten Antworten berechnet.
- **Admin-Bereich**: Möglichkeit zur Erstellung neuer Quizspiele und Hinzufügen von Fragen.
- **Leaderboard**: Anzeige der Top-Spieler.
- **Ergebnisauswertung**: Spieler erhalten nach Abschluss eines Quizzes ein Feedback in Form eines Rangs und der Prozentzahl richtiger Antworten.

## Installation
1. **XAMPP herunterladen und installieren**: [XAMPP Download-Link](https://www.apachefriends.org/download.html)
2. **Projektdateien platzieren**: Kopieren Sie das Projekt in den `htdocs` Ordner von XAMPP.
3. **XAMPP starten**: Starten Sie den Apache-Server über das XAMPP Control Panel.
4. **Zugriff auf das Quiz**: Öffnen Sie einen Webbrowser und navigieren Sie zu `http://localhost`, um das Quiz zu starten.

## Benutzerrollen
- **Normale Benutzer**: Können an den Quizzes teilnehmen und ihre Ergebnisse auf dem Leaderboard sehen.
- **Admins**: Haben die Möglichkeit, neue Quizzes und Fragen zu erstellen und das Quiz zu verwalten.

## Anwendungsführung

### Benutzerpanel

Bei Betreten der Anwendung werden die Nutzer zunächst vom **Benutzerpanel** begrüßt. Hier haben Sie zwei Optionen:

1. **User Login**: Melden Sie sich als normaler User an, um Zugriff auf die Quizspiele zu erhalten.
2. **Admin Login**: Speziell für Administratoren, um Fragen zu verwalten und andere administrative Aufgaben durchzuführen.

### Dashboard

Nach dem Einloggen gelangen Sie zum Haupt-Dashboard, das folgende Elemente bietet:

- **Play Button**: Wählen Sie Ihren Quiz-Stapel aus und starten Sie das Spiel.
- **Config Feld**: Passen Sie hier die Lautstärke der Soundeffekte (SFX) und der Hintergrundmusik an. Genießen Sie beruhigende Jazzmusik 🎷 während Sie spielen.
- **GitHub Repo**: Zugriff auf den Quellcode des Projekts. Besuchen Sie das Repository, um mehr über die Entwicklung zu erfahren.

### Footer-Bereich

Im unteren Bereich der Anwendung finden Sie den **Footer**, der nützliche Informationen anzeigt:

- **Aktueller Benutzer**: Sehen Sie, unter welchem Benutzernamen Sie eingeloggt sind. Durch Überfahren des Benutzernamens mit der Maus erscheint eine Option, um sich auszuloggen und zum Hauptmenü zurückzukehren.

---

*Diese Anleitung soll Ihnen helfen, sich in der Anwendung zu orientieren und die verfügbaren Funktionen optimal zu nutzen.*

## Lizenz
Dieses Projekt ist unter der MIT-Lizenz veröffentlicht. Weitere Details finden Sie in der [LIZENZ](LICENSE)-Datei.
