<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title = 'Agries : Platform Marketplace Industri Perikanan Karya Dua Mahasiswa PENS Raih Juara 3 pada DILo Hackathon Festival 2020';
        $content = 'Surabaya, pens.ac.id – Meski berada ditengah kondisi pandemi seperti ini, tentunya tidak menyurutkan jiwa kompetitif mahasiswa Politeknik Elektronika Negeri Surabaya (PENS). Setelah menjalani serangkaian kegiatan perlombaan selama kurang lebih satu bulan, pada Jumat (18/9), dua mahasiswa Program Studi D3 Teknik Informatika PENS berhasil meraih Juara 3 pada ajang DILo Hackathon Festival 2020. Kompetisi ini diselenggarakan oleh Digital Innovation Lounge (DILo) yang dihelat secara virtual.
        Dengan mengusung tema “Impacting for Indonesia”, kompetisi ini terdiri dari enam kategori yaitu Health, Agriculture/Fishery, Education, Smart City, Adaptasi Kehidupan Baru (AKB) Lifestyle, dan SMB/UMKM. Lewat karyanya yang berjudul “Agries”, Tim Agritech Nusantara tergabung ke dalam kategori Agriculture/Fishery. Tim tersebut beranggotakan Rafly Arief Kanza dan juga Iervan Firdiansyah yang merupakan Founder serta Co-Founder dari Agritech Nusantara. Agries merupakan platform marketplace industri perikanan yang menyediakan fitur auction and bargaining system, bertujuan untuk membantu meningkatkan pemasaran dan perekonomian para nelayan. Selain itu, platform ini juga dilengkapi dengan beberapa fitur menarik lainnya yakni marketplace (jual beli produk), pemberdayaan masyarakat, serta tracking order.
        Kompetisi ini diawali dengan seleksi secara internal guna menemukan 60 tim dengan ide terbaiknya untuk dapat melanjutkan ke babak yang berikutnya. Dari 60 tim yang terpilih, diseleksi kembali pada tahap Hackathon Day yang berlangsung selama kurang lebih tiga minggu dimana pada tahap ini peserta diminta untuk melaporkan progress hariannya secara virtual kepada panitia. Setelah itu, setiap tim berkesempatan untuk mempresentasikan produk mereka pada tahap initial pitching untuk menentukan kembali 6 tim yang dapat lolos ke babak final. Pada tahap ini para peserta dihadapkan dengan 12 juri dari beberapa industri yang ahli dibidangnya.
        Memasuki babak final pitching, Tim Agritech Nusantara berhasil dinobatkan menjadi Juara 3 dan menumbangkan lebih dari 300 tim lainnya. “Awalnya senang dan nggak menyangka juga karena waktu pembuatan aplikasinya yang cenderung singkat dan adanya kendala juga saat presentasi dihadapan juri, tapi untungnya kami masih bisa memberikan yang maksimal,” ujar Iervan. Dengan adanya prestasi ini diharapkan dapat mendobrak semangat mahasiswa PENS untuk juga dapat berprestasi meski berada ditengah kondisi saat ini. (kik/umi)';

        Post::create([
            'user_id' => 2,
            'title' => $title,
            'slug' => str_slug($title),
            'content' => $content
        ]);
    }
}
