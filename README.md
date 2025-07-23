# DJ Blackout – Event Song Request & Music List System

Dieses Projekt erweitert die DJ Blackout Website (Yii2) um ein vollständiges Musik- und Song-Request-System für unterschiedliche Szenarien.

---

## **Ziele des Features**

### 1. **Szenario 1 – Event-Host (Kunde)**
- Benutzer kann ein Event hosten (z. B. Hochzeit, Geburtstag).
- Für sein Event kann er in der **Musikübersicht** (`music_list`) eine eigene Playlist anlegen:
  - Wunschlieder, die während des Events gespielt werden sollen.
- Diese Musiklisten sind Event-gebunden und nur für den User selbst sichtbar.

### 2. **Szenario 2 – Gast (Song Requests)**
- Gäste eines Events können per **QR-Code** direkt auf ein Wunschformular zugreifen.
- Dort können sie spontan Songs einreichen (Song Requests).
- Jeder Request wird gespeichert mit:
  - `event_id` → zu welchem Event gehört der Wunsch
  - `user_id` (falls der Gast eingeloggt ist)

---

## **Bisher umgesetzte Schritte**

### **1. Datenbank**
#### Event-Tabelle
```sql
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
