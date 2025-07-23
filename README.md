DJ Blackout – Event Song Request & Music List System

Dieses Projekt erweitert die DJ Blackout Website (Yii2) um ein vollständiges Musik- und Song-Request-System für unterschiedliche Szenarien.

⸻

Ziele des Features

1. Szenario 1 – Event-Host (Kunde)
	•	Benutzer kann ein Event hosten (z. B. Hochzeit, Geburtstag).
	•	Für sein Event kann er in der Musikübersicht (music_list) eine eigene Playlist anlegen:
	•	Wunschlieder, die während des Events gespielt werden sollen.
	•	Diese Musiklisten sind Event-gebunden und nur für den User selbst sichtbar.

2. Szenario 2 – Gast (Song Requests)
	•	Gäste eines Events können per QR-Code direkt auf ein Wunschformular zugreifen.
	•	Dort können sie spontan Songs einreichen (Song Requests).
	•	Jeder Request wird gespeichert mit:
	•	event_id → zu welchem Event gehört der Wunsch
	•	user_id (falls der Gast eingeloggt ist)

⸻

Bisher umgesetzte Schritte

1. Datenbank

Event-Tabelle

CREATE TABLE `event` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT DEFAULT NULL,
  `name` VARCHAR(255) NOT NULL,
  `slug` VARCHAR(255) NOT NULL UNIQUE,
  `date` DATE DEFAULT NULL,
  `location` VARCHAR(255) DEFAULT NULL,
  `is_active` TINYINT(1) DEFAULT 1,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Music List Tabelle

CREATE TABLE `music_list` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT,
  `event_id` INT,
  `title` VARCHAR(255) NOT NULL,
  `artist` VARCHAR(255) DEFAULT NULL,
  `duration` VARCHAR(50) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

Song Requests (bestehend, erweitert)

ALTER TABLE `song_request`
ADD COLUMN `event_id` INT DEFAULT NULL,
ADD CONSTRAINT `fk_song_request_event`
    FOREIGN KEY (`event_id`) REFERENCES `event`(`id`)
    ON DELETE SET NULL ON UPDATE CASCADE;


⸻

2. Models
	•	Event.php → Enthält Event-Daten und Relations.
	•	MusicList.php → Enthält Musiklisten pro User und Event.
	•	SongRequest.php → Enthält Songwünsche von Gästen.

⸻

3. Views & Controller

Musikübersicht (User-Ansicht)
	•	Route: /site/my-music-list
	•	Zeigt alle eigenen Musiklisten-Einträge an.
	•	Aktionen:
	•	Add (neuen Song hinzufügen)
	•	Update (Song bearbeiten)
	•	Delete (Song löschen)

Formular für neue Musik
	•	Route: /site/add-music
	•	Felder:
	•	Songtitel
	•	Artist
	•	Dauer
	•	Event-Auswahl (Dropdown)
	•	Nach dem Absenden: Speichert den Eintrag in music_list.

Update & Delete
	•	actionUpdateMusic($id) → Bearbeitet einen Eintrag.
	•	actionDeleteMusic($id) → Löscht einen Eintrag.

⸻

4. Song Requests (Gastansicht)
	•	Route: /song-request/<event-slug>
	•	Formular:
	•	Name (optional)
	•	Songtitel (Pflicht)
	•	Artist (optional)
	•	Genre (optional)
	•	Kommentar (optional)
	•	Speichert Request mit event_id.

⸻

5. Navbar
	•	Dynamisches Dropdown für Song Requests:
	•	Alle aktiven Events des eingeloggten Users werden aufgelistet.
	•	Jeder Eintrag führt direkt zum jeweiligen Song Request Formular.
	•	Code:

$userEvents = \app\models\Event::find()
    ->where(['user_id' => Yii::$app->user->id, 'is_active' => 1])
    ->orderBy(['date' => SORT_DESC])
    ->all();

[
    'label' => 'Song Requests',
    'items' => array_map(function ($event) {
        return [
            'label' => $event->name,
            'url' => ['/site/song-request', 'slug' => $event->slug],
        ];
    }, $userEvents)
],


⸻

6. QR-Code Integration (geplant)
	•	Geplant: Pro Event wird ein QR-Code generiert, der direkt auf /song-request/<slug> führt.
	•	Library: endroid/qr-code (Composer)

⸻

Nächste Schritte (ToDo)

Datenbank & Models
	•	Event user_id verknüpfen (bereits Spalte angelegt, prüfen ob Foreign Key gesetzt).
	•	Sicherstellen, dass bei Event-Erstellung automatisch user_id gesetzt wird.

Frontend / Views
	•	Event-Create-Formular für User → damit er Events anlegen kann.
	•	Event-Übersicht (für User): Liste aller eigenen Events + Buttons:
	•	Musikübersicht öffnen
	•	QR-Code anzeigen
	•	MusicList CRUD → UI optisch aufhübschen (Bootstrap Cards/Table).

Song Requests
	•	User-Dashboard „Meine Song Requests“ → User sieht alle eigenen Wünsche (mit Events).
	•	Admin-Ansicht „Song Requests pro Event“.

QR-Code
	•	composer require endroid/qr-code
	•	Action & View für QR-Code pro Event.

Allgemein
	•	Pretty URLs konfigurieren:

'urlManager' => [
  'enablePrettyUrl' => true,
  'showScriptName' => false,
  'rules' => [
    'song-request/<slug>' => 'site/song-request',
    'my-music-list' => 'site/my-music-list',
  ],
],

	•	README bei jedem neuen Feature aktualisieren (dieses Dokument ist der Startpunkt).

⸻

Setup Hinweis
	1.	Datenbankmigrationen ausführen / SQL einfügen.
	2.	Models & Controller anlegen.
	3.	Views für MusicList und SongRequest anlegen.
	4.	Composer installieren für QR-Codes:

composer require endroid/qr-code


⸻

Lizenz

Nur interner Entwicklungsstand (DJ Blackout).
