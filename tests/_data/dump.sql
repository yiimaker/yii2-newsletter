PRAGMA foreign_keys = off;
BEGIN TRANSACTION;

-- Table: newsletter_client
DROP TABLE IF EXISTS newsletter_client;

CREATE TABLE newsletter_client(
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  contacts STRING(255) NOT NULL,
  created_at INTEGER NOT NULL,
  updated_at INTEGER NOT NULL
);

COMMIT TRANSACTION;
PRAGMA foreign_keys = on;