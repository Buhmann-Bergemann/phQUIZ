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

### Automatisierte Setup-Routine

Dieses Projekt verfügt über ein automatisches Setup-Skript, das bei der ersten Ausführung der Anwendung aktiviert wird. Dieses Skript ist entscheidend für das korrekte Setup der Anwendungsumgebung.

#### Funktionen des Setup-Skripts:
- **Erstellung notwendiger Ressourcen**: Das Skript erstellt alle erforderlichen Ordner und initialisiert `.csv`-Dateien, die für das Funktionieren der Anwendung notwendig sind.
- **Sicherheitsorientiert**: Wichtige Dateien, insbesondere `.csv`-Dateien, werden außerhalb des `htdocs`-Ordners angelegt. Dies schützt sie vor direktem Webzugriff und bietet zusätzliche Sicherheit gegen unautorisierten Zugang.

#### Wichtige Hinweise zur CSV-Dateien:
- **Manuelles Befüllen erforderlich**: Nachdem das Setup-Skript die `.csv`-Dateien initialisiert hat, müssen diese manuell mit den entsprechenden Daten befüllt werden. Dies umfasst typischerweise das Einfügen von Benutzerdaten, Quizfragen und anderen relevanten Informationen, die für die Anwendung benötigt werden.
- **Anleitung zum Befüllen**: Bitte befolgen Sie die vorgegebene Struktur und das Format beim Befüllen der `.csv`-Dateien, um sicherzustellen, dass die Anwendung korrekt funktioniert.
  
---

## Struktur der CSV-Dateien

Die Anwendung verwendet verschiedene `.csv`-Dateien, um Daten zu speichern. Nachfolgend finden Sie die erforderlichen Formate und Strukturen für jede dieser Dateien.

### Leaderboard (leaderboard.csv)

Die `leaderboard.csv`-Datei speichert die Informationen des Leaderboards. Anfänglich ist diese Datei leer und wird mit den Daten der Spieler gefüllt, während sie die Anwendung nutzen.

**Format**: Da diese Datei dynamisch gefüllt wird, gibt es kein festes Anfangsformat.

### Fragepakete (questionpacks.csv)

Die `questionpacks.csv`-Datei enthält die Quizfragen und deren Antworten. Sie benötigt einen speziellen Header, der nicht von der Anwendung gelesen wird, aber zur Strukturierung der Daten dient.

**Format**:
- ID,Question,Answer1,Answer2,Answer3,Answer4,CorrectAnswerID
- 1,Beispielfrage?,Antwort A,Antwort B,Antwort C,Antwort D,3
- 2,Andere Frage?,Option 1,Option 2,Option 3,Option 4,1


### Administratoren (admin.csv)
Die `admin.csv`-Datei speichert die Login-Daten für Administratoren. Diese Datei sollte initialisiert werden, um mindestens einen Admin-Benutzer zu enthalten.

**Format**:
- 1,admin,pass
---

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


### Flussdiagramm des Spiels

![Flussdiagramm](https://imgur.com/suvuoKz.png)

## Lizenz
Dieses Projekt ist unter der MIT-Lizenz veröffentlicht.
