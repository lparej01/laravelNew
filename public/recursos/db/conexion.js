const sqlite3 = require('sqlite3').verbose();


class DB {
  static #db;

  static open() {
      if (this.#db == undefined) {
          this.#db = new sqlite3.Database('./database/db/seasc.db', sqlite3.OPEN_READWRITE | sqlite3.OPEN_FULLMUTEX, (err) => {
              if (err) {
                  console.error(err.message); 
                  console.log('Estas Cerrando SQLite3!');       
              } else {
                  console.log('Estas Conectado A SQLite3!');
              }}
          );
      }
      return this.#db;
  }

  static close() {
      if (this.#db != undefined) {
          this.#db.close();
          this.#db = undefined;
          console.log('Estas Cerrando SQLite3!');
      }
  }
}

module.exports = DB;

