1.  [CMD] Jalankan perintah berikut untuk menginstal dependency PHP:

    composer install

2.  [CMD] Jalankan perintah berikut untuk menginstal dependency Node:

    npm install

3.  [FILE EXPLORER] Copy file ".env.example" menjadi ".env" dan ubah nilai beberapa variabel berikut:

    APP_NAME="Manajemen Pengiriman Barang"
    APP_TIMEZONE="Asia/Jakarta"
    APP_LOCALE=id
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=manajemen_pengiriman_barang
    DB_USERNAME=root
    DB_PASSWORD=

    Ubah "manajemen_pengiriman_barang" menjadi nama database yang akan digunakan.

4.  [CMD] Jalankan perintah berikut untuk penyiapan aplikasi Laravel:

    php artisan key:generate
    php artisan storage:link
    php artisan migrate --seed

    Apabila database tidak kosong:

    php artisan migrate:fresh --seed

5.  [CMD] Jalankan perintah berikut untuk membundle aset:

    npm run build

6.  [CMD] Jalankan perintah berikut untuk menjalan aplikasi Laravel (langkah ini hanya perlu dilakukan apabila aplikasi berjalan tanpa local server seperti XAMPP dan Laragon):

    php artisan serve