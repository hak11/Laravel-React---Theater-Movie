<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movies;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = [
          [
            'title' => 'THE SECRET GARDEN',
            'image' => 'https://img.youtube.com/vi/45rQDOQvCkQ/0.jpg',
            'duration' => 120,
            'description' => 'Persembahan produser pembuat HARRY POTTER dan PADDINGTON.
Mary Lennox (Dixie Egerickx), anak bangsawan Inggris berusia 10 tahun yang lahir di India. Saat orang tuanya meninggal, ia kembali ke Inggris untuk tinggal bersama pamannya Archibald Craven (Peraih Oscar - Colin Firth) di Misselthwaite Manor, pedesaan terpencil jauh di pedalaman Yorkshire. Ia diasuh oleh Ny. Medlock (pemenang BAFTA - Julie Walters) & pembantu bernama Martha (Isis Davis). Rahasia keluarga mulai terkuak saat Mary bertemu Colin (Edan Hayhurst) sepupunya yang sakit & dikurung di sayap rumah. Suatu hari Hector si anjing liar melesat ke dalam tembok pepohonan, Mary menemukan sebuah taman menakjubkan, terkunci, & tersembunyi. Iapun bertemu Dickon (Amir Wilson) seorang anak desa setempat. Melalui kekuatan memulihkan taman mereka menjalin persahabatan dan berusaha menyembuhkan Hector yang cedera. Mary, Colin, & Dickon bersatu dan saling menyembuhkan saat mereka menggali lebih dalam misteri taman - tempat petualangan ajaib yang mengubah hidup mereka selamanya.'
          ],
          [
            'title' => 'DIGIMON ADVENTURE',
            'image' => 'https://img.youtube.com/vi/uU9zjlV4y2E/0.jpg',
            'duration' => 120,
            'description' => 'Berkisah lima tahun setelah Digimon Adventure tri. Taichi & teman-temannya mencapai usia dewasa. Mereka dikejutkan dengan berita bahwa kemitraan dengan Digimon mereka akan segera berakhir karena mereka bukan anak-anak lagi. Sementara itu, Digimon yang kuat bernama Eosmon muncul merampas DigiDestined. Taichi, Agumon dan semua teman mereka untuk bertarung bersama untuk terakhir kalinya menyelamatkan dunia.
The film is set five years after Digimon Adventure tri., taking place in 2010. With Taichi and his friends reaching adulthood, they are struck with the news that the partnership with their Digimon will soon end, as they are not children anymore. Meanwhile, a powerful Digimon called Eosmon appears, robbing other DigiDestined of their counsciousness, and its up to Taichi, Agumon and all their friends to fight together one last time to save the world.'
          ],
          [
            'title' => 'TARUNG SARUNG',
            'image' => 'https://img.youtube.com/vi/V48qhATHklc/0.jpg',
            'duration' => 120,
            'description' => 'DENI RUSO (Panji Zoni) terlahir dari salah satu keluarga terkaya di Indonesia. Bagi Deni uang adalah segalanya, ia bahkan kehilangan kepercayaan terhadap Tuhan. Semuanya berubah ketika ia ke Makassar mengurus bisnis keluarga, dan bertemu TENRI (Maizura) gadis Makassar aktivis yang membenci RUSO CORP sebagai kapitalis perusak lingkungan. Deni pun menyembunyikan identitas demi mendapatkan cinta Tenri.
Masalah muncul ketika SANREGO (Cemal Faruk) juara bela diri TARUNG SARUNG, tidak terima! Deni dihajar oleh Sanrego. Akhirnya, Deni berguru kepada Pak KHALID (Yayan Ruhian) seorang penjaga Masjid. Dari Pak Khalid, Deni tidak hanya belajar TARUNG SARUNG juga belajar mengenal Tuhannya lagi.
Apakah Deni mampu mengalahkan Sanrego dan mendapatkan cinta Tenri ?'
          ],
          [
            'title' => 'EYES ON ME : THE MOVIE',
            'image' => 'https://img.youtube.com/vi/WEQAlHdktOQ/0.jpg',
            'duration' => 120,
            'description' => 'Setiap saat menjadi sorotan berkat Wiz *one !! 12 gadis dari IZ * ONE, grup K-Pop hits yang memecahkan setiap rekor sejak debut mereka pada bulan Oktober 2018, termasuk Best New Artist dan mencapai nomor 1 di tangga lagu Korea dan internasional, kini akan hadir di layar lebar! Kenangan tak terlupakan dari rekaman konser IZ * ONE dan dari Wiz * One, konser pembuatan VCR, rekaman lagu-lagu baru, latihan tari, dan rekaman di belakang layar, termasuk latihan, akan ditampilkan dalam film ini! Hadiah dan memori istimewa untuk Wiz * One, Eyes on Me: The movie segera hadir di bioskop!

Every moment is a HIGHLIGHT thanks to Wiz*one!!
The 12 girls of IZ*ONE, the hottest K-Pop group who is breaking every record since their debut in October 2018, including Best New Artist and reaching 1st on Korean and international music charts, will now be on the big screen! The unforgettable memories of the concert footage of IZ*ONE and from Wiz*One, concert VCR making, recording new songs, dance practice, and behind-the-scenes footage, including rehearsals, will be featured in this movie! A special gift and memory for Wiz*One, Eyes on Me: The movie is coming cinemas soon!'
          ],
        ];

        foreach ($movies as $movie) {
          Movies::create($movie);
        }
    }
}
