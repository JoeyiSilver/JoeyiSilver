import mysql.connector

# Verbindung zur MySQL-Datenbank herstellen
mydb = mysql.connector.connect(
    host="db-mysql-fra1-44104-do-user-15108968-0.c.db.ondigitalocean.com",
    user="Cornelius",
    password="AVNS_VlFRvzOy2dSzV8U4dP4 ",
    database="defaultdb"
)

# Beispielabfrage ausführen
mycursor = mydb.cursor()

# Beispiel: Daten abrufen
mycursor.execute("SELECT * FROM einzelteile")

# Ergebnis der Abfrage abrufen
myresult = mycursor.fetchall()

# Die Daten ausgeben
for row in myresult:
    print(row)

# Verbindung zur Datenbank schließen
mydb.close()
