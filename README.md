# 🛠 BACK END
---
### 📁 Cara menjalankannya
1. **Buat Database**
- Buat database dengan nama `db_rumahsakit_230102083`
- jalankan query :
```
CREATE DATABASE db_rumahsakit_230102083;
USE db_rumahsakit_230102083;

CREATE TABLE pasien (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  alamat TEXT,
  tanggal_lahir DATE,
  jenis_kelamin ENUM('L', 'P')
);

CREATE TABLE obat (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_obat VARCHAR(100),
  kategori VARCHAR(50),
  stok INT,
  harga DECIMAL(10,2)
);
```
2. **Clone repository**
```
git clone https://github.com/IndraAjiyanto/backend-uas-pbf-230102083
```
3. **Jalankan Comand**
```
cd backend-uas-pdf-230102083
composer update
cp env .env
```
4. **Konfigurasi .env**
```
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8080/'
app_baseURL = ''
app.forceGlobalSecureRequests = false
app.CSPEnabled = false

database.default.hostname = localhost
database.default.database = db_rumahsakit_230102083
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306

session.driver = 'CodeIgniter\Session\Handlers\FileHandler'
session.savePath = null
```
5. **Jalankan Comand**
```
php spark serve
```
---
### 🌐 end point
**pasien** 
- GET/pasien
- GET/pasien/{id}
- POST/pasien
- PUT/pasien/{id}
- DELETE/pasien/{id}
  
**obat** 
- GET/obat
- GET/obat/{id}
- POST/obat
- PUT/obat/{id}
- DELETE/obat/{id}
---
### 👨‍🎓 Author  
Indra Ajiyanto  
Kelas: TI 2D  
NIM: 230102083  
Program Studi: D4 Teknik Informatika  
Politeknik Negeri Cilacap
