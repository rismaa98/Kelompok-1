-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2022 pada 10.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `class`
--

CREATE TABLE `class` (
  `id_class` int(11) NOT NULL,
  `name_class` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class`
--

INSERT INTO `class` (`id_class`, `name_class`, `deskripsi`, `id`) VALUES
(1, 'Web-Programming-II', '<p>Web Programming II berisikan materi belajar mengenai dasar-dasar pemrograman web. Pada materi ini menjelaskan bagaimana belajar\r\ndasar-dasar pemrograman web dengan mudah, praktis dan cepat.<br></p>', 1),
(4, 'Pemodelan-Sistem-Berorientasi-Objek', '<p>Materi ini akan mempelajari dasar dari orientasi objek serta pengenalan diagram UML.</p>', 6),
(5, 'Akuntansi-Dasar', '<p>Mempelajari dasar akuntansi, cara membuat adjustment, cara membuat neraca dagang dan neraca industri, serta perbedaan laporan antara neraca dagang dengan neraca insdustri, mempelajari untuk membuat laporan akhir.<br></p>', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `completed_task`
--

CREATE TABLE `completed_task` (
  `id_completed_task` int(11) NOT NULL,
  `name_task` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `poin` varchar(128) NOT NULL,
  `created_at` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_subject_matter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `completed_task`
--

INSERT INTO `completed_task` (`id_completed_task`, `name_task`, `link`, `poin`, `created_at`, `id`, `id_subject_matter`) VALUES
(4, '<p><b>Latihan Soal</b></p><p>Silahkan jawab latihan soal berikut dengan baik dan benar.<br></p><p>1. Jelaskan apa itu Codeigniter!</p><p>2. Apa saja keunggulan dari Codeigniter?</p><p>3. Dari materi yang dibaca, sebutkan 3 website populer di Indonesia yang menggunakan Codeigniter!</p><p>4. Pada tanggal berapa Codeigniter 4 dirilis?</p><p>5. Perusahaan apa yang pertamakali membuat Codeigniter?</p><p>Harap diperhatikan tanggal terakhir pengumpulan tugasnya.<br></p>', 'https://www.hoyolab.com/genshin/home/3', '80', 1640580270, 4, 1),
(5, '<p><b>Tugas</b></p><p>Berikan screenshoot hasil instalasi codeigniter 3 kalian pada file doc!</p><p>Silahkan dikirim tugasnya tidak melewati deadline pengumpulan.</p>', 'https://lucid.app/lucidspark/1970dc95-2f92-4a24-9c00-8103c11b33ca/edit#', '75', 1640590707, 4, 3),
(6, '<p><b>Tugas</b></p><p>Dari materi yang sudah dipelajari, jelaskan apa itu akuntansi dasar!</p><p>Mohon diperhatikan tanggal deadline tugasnya agar tidak diupload melewati deadline.</p>', 'https://www.hoyolab.com/genshin/home/3', '90', 1640603739, 4, 7),
(7, '<p>Buat Penjelasan OOP menurut versi kalian sendiri , dan buat project</p><p>CRUD bahasa php</p>', 'http://mhsonline.bsi.ac.id/', '83', 1640619217, 3, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_user` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `last_education` varchar(128) NOT NULL,
  `place_birth` varchar(128) NOT NULL,
  `date_birth` varchar(20) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `address` text NOT NULL,
  `link` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_user`, `name`, `email`, `last_education`, `place_birth`, `date_birth`, `jk`, `address`, `link`, `image`) VALUES
(1, 'Jaka Fitriansyah,S.Kom', 'jakafitriansyah31@gmail.com', 'S1', 'Jakarta', '1997-01-02', 'Pria', 'Cikarang', '', ''),
(2, 'Rismawati', 'rismawatid09@gmail.com', 'S1', 'Jakarta', '1999-03-05', 'Wanita', 'Cikarang', '', ''),
(3, 'Randi Jm', 'randi0100@gmail.com', 'SMA', 'Sumedang', '2021-02-20', 'Pria', 'Cikarang', '', 'profil_randi.png'),
(4, 'Salman Haafizh', 'salmanxfxa@gmail.com', 'SMA', 'Bekasi', '2000-02-08', 'Pria', 'Cikarang Selatan', 'https://drive.google.com/file/d/1k24X4znAfy8yef3CjcQWOPvZA4TYx0ln/view?usp=sharing', 'IMG-20210701-WA00001.jpg'),
(5, 'Shina Mashiro, S.Kom', 'shinaxfxa@gmail.com', 'S1', 'Bandung', '1999-06-13', 'Wanita', 'Cikarang', '', ''),
(6, 'Riandi Herfansyah S.Kom', 'helper.satush@gmail.com', 'S1', 'Bekasi', '1998-12-31', 'Pria', 'Cikarang', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subject_matter`
--

CREATE TABLE `subject_matter` (
  `id_subject_matter` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `sub_title` varchar(128) NOT NULL,
  `content` text NOT NULL,
  `status` varchar(128) NOT NULL,
  `date_post` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subject_matter`
--

INSERT INTO `subject_matter` (`id_subject_matter`, `title`, `sub_title`, `content`, `status`, `date_post`, `id`, `id_class`) VALUES
(1, 'Codeigniter-3', 'Dasar Codeigniter 3', '<p xss=removed>Pada tutorial ini, kamu akan belajar tentang dasar Codeigniter 3. Mulai dari mengenal Codeigniter hingga membuat project sederhana dan unit testing. Kamu akan sangat terbantu mengikuti tutorial jika memenuhi prasyarat berikut:</p><ul xss=removed><li xss=removed><a href=\"https://www.petanikode.com/tutorial/html/\" xss=removed>Memahami HTML</a>;</li><li xss=removed><a href=\"https://www.petanikode.com/tutorial/javascript/\" xss=removed>Memahami Javascript</a>;</li><li xss=removed><a href=\"https://www.petanikode.com/tutorial/css/\" xss=removed>Memahami CSS</a>;</li><li xss=removed><a href=\"https://www.petanikode.com/tutorial/php/\" xss=removed>Memahami basic PHP</a>;</li><li xss=removed>Mehamami PHP dan MySQL;</li><li xss=removed>Memahami konsep OOP di PHP</li></ul><p xss=removed>Kamu sudah belajar basic PHP dan OOP?</p><p xss=removed>Bagus.</p><p xss=removed>Kini saatnya belajar framework.</p><p xss=removed>Framework telah terbukti banyak membantu web developer dalam mengembangkan web.</p><p xss=removed>Proyek web yang diperkirakan bisa jadi dalam satu bulan, dengan framework..</p><p xss=removed>..mungkin bisa jadi dalam seminggu.</p><p xss=removed>Hebat kan.</p><p xss=removed>Karena itu, kamu harus menggunakan framework agar bisa membuat web lebih cepat dan juga hemat biaya dan tenaga.</p><p xss=removed>Baiklah…</p><p xss=removed>Framework yang akan kita pelajari di tutorial ini adalah Codeigniter.</p><p xss=removed>Codeigniter cukup populer di Indoensia dan juga banyak penggunanya.</p><p xss=removed>Mari kita mulai..</p><h2 id=\"apa-itu-framework\" class=\"h2\" xss=removed>Apa itu Framework?</h2><p xss=removed>Sebelum masuk ke Codeigniter, kita bahas dulu pengertian framework.</p><p xss=removed>Jadi:</p><p xss=removed><strong xss=removed>Framework</strong><span> </span>dalam bahasa indonesia artinya<span> </span><strong xss=removed>kerangka kerja</strong>.</p><p xss=removed>Saya yakin, kamu yang sedang membaca artikel ini sudah pernah membuat web dengan PHP.</p><p xss=removed>Setidaknya membuat web sederhana yang berisi beberapa halaman.</p><p xss=removed>Apa yang akan kamu lakukan jika webnya semakin kompleks?</p><p xss=removed>Ya ditambahin lagi donk kodenya.</p><p xss=removed>Tapi..</p><p xss=removed>Kadang ini tidak berjalan mulus.</p><p xss=removed>Kode website kita akan semakin ribet dan berantakan. Bisa jadi disbeabkan karena kita asal-asalan menambahkan kode.</p><p xss=removed>Belum lagi, kita dituntut menulis kode yang rapi agar bisa dipahami orang lain (misalnya teman satu tim).</p><p xss=removed>Maka di sini kita tidak boleh seenaknya menulis kode yang asal-asalan.</p><p xss=removed>Karena itu, diciptakanlah framework atau kerangka kerja.</p><p xss=removed>Kerangka kerja dibuat agar kita bisa bekerja lebih mudah. Biasanya, framework menyediakan bahan-bahan yang siap pakai, sehingga kita tidak harus membuatnya dari nol.</p><p xss=removed>Selain itu, framework juga memiliki aturan-aturan yang harus diikuti.</p><p xss=removed>Contohnya seperti:</p><ul xss=removed><li xss=removed>Harus menaruh kode yang memiliki fungsi yang sama dalam satu folder;</li><li xss=removed>Harus mengikuti aturan penulisan kode<span> </span><em xss=removed>(writing conventions)</em><span> </span>yang disepakati;</li><li xss=removed>Harus menggunakan pola desain ini, dan itu;</li><li xss=removed>dan lain sebagainya.</li></ul><p xss=removed>Jadi apa itu framework?</p><p xss=removed>Framework adalah sebuah kerangka kerja yang digunakan untuk membantu developer dalam mengembangkan kode aplikasi secara konsisten.</p><p xss=removed>Lalu..</p><h2 id=\"apa-itu-codeigniter\" class=\"h2\" xss=removed>Apa itu Codeigniter?</h2><p xss=removed>Codeigniter adalah salah satu framework untuk membuat website dengan bahasa pemrograman PHP.</p><p xss=removed>Codeigniter terkenal dengan konsep MVC-nya. MVC merupakan singkatan dari<span> </span><em xss=removed>Model</em>–<em xss=removed>View</em>–<em xss=removed>Controller</em>.</p><p xss=removed>Nanti kita akan bahas lebih dalam tentang MVC pada:<span> </span><a href=\"https://www.petanikode.com/codeigniter-mvc\" xss=removed>Konsep dasar Framework Codeigniter</a>.</p><p xss=removed>Codeigniter pernah menapat pujian dari creator PHP:<span> </span><a href=\"https://en.wikipedia.org/wiki/Rasmus_Lerdorf\" target=\"_blank\" xss=removed>Rasmus Lerdorf&lt;svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"11\" height=\"10\" viewBox=\"0 0 11 10\" aria-label=\"External Link\" style=\"margin:0 .15rem\"&gt;<polygon fill=\"#00ad9f\" points=\"12 5.038 6.962 10.066 5.668 8.772 8.502 5.961 0 5.961 0 4.116 8.502 4.116 5.691 1.282 6.984 0\" transform=\"rotate(-40 6 5.033)\"></polygon>&lt;/svg&gt;</a></p><p xss=removed>Ia menyukai Codeigniter karena lebih cepat dan lebih ringan.<span> </span><sup id=\"fnref:1\" xss=removed><a href=\"https://www.petanikode.com/codeigniter-pemula/#fn:1\" class=\"footnote-ref\" role=\"doc-noteref\" xss=removed>1</a></sup></p><figure class=\"mb-3 figure border p-1 rounded-0\" xss=removed><img class=\"lazyload img-fluid lazyloaded\" src=\"https://www.petanikode.com/img/ci/dasar/web-ci.png\" data-src=\"/img/ci/dasar/web-ci.png\" alt=\"Website Codeigniter\" title=\"Website Codeigniter\" xss=removed><figcaption class=\"figure-caption text-center my-2\" xss=removed>Website Codeigniter</figcaption></figure><span xss=removed></span><h4 id=\"keunggulan-codeigniter\" class=\"h4\" xss=removed>Keunggulan Codeigniter</h4><p xss=removed>Ada beberapa kelebihan CodeIgniter (CI) dibandingkan dengan Framework PHP lain,</p><ul xss=removed><li xss=removed><strong xss=removed>Performa cepat</strong>: Codeigniter merupakan framework yang paling cepat dibanding framework yang lain. Karena tidak menggunakan template engine dan ORM yang dapat memperlambat proses.</li><li xss=removed><strong xss=removed>Konfigurasi yang minim</strong><span> </span><em xss=removed>(nearly zero configuration)</em>: tentu saja untuk menyesuaikan dengan database dan keleluasaan routing tetap diizinkan melakukan konfigurasi dengan mengubah beberapa file konfigurasi seperti<span> </span><code xss=removed>database.php</code><span> </span>atau<span> </span><code xss=removed>autoload.php</code>, namun untuk menggunakan codeigniter dengan setting standard, anda hanya perlu mengubah sedikit saja pada file di folder config.</li><li xss=removed><strong xss=removed>Memiliki banyak komunitas</strong>: Komunitas CI di indonesia cukup ramai, tutorialnya pun mudah dicari.</li><li xss=removed><strong xss=removed>Dokumentasi yang lengkap</strong>: Codeigniter disertai dengan<span> </span><code xss=removed>user_guide</code><span> </span>yang berisi dokumentasi yang lengkap.</li><li xss=removed><strong xss=removed>Mudah dipelajari pemula</strong>: Bagi pemula, CI sangat mudah dipelajari. Karena CI tidak terlalu bergantung pada tool tambahan seperti composer, ORM, Template Engine, dll.</li></ul><div class=\"my-5 adsense ads-content\" xss=removed><ins class=\"adsbygoogle\" data-ad-format=\"fluid\" data-ad-layout=\"in-article\" data-ad-client=\"ca-pub-6279325630224392\" data-ad-slot=\"7009414453\" data-adsbygoogle-status=\"done\" data-ad-status=\"filled\" xss=removed><ins id=\"aswift_1_expand\" tabindex=\"0\" title=\"Advertisement\" aria-label=\"Advertisement\" xss=removed><ins id=\"aswift_1_anchor\" xss=removed></ins></ins></ins></div><h4 id=\"contoh-website-yang-dikembangkan-dengan-codeigniter\" class=\"h4\" xss=removed>Contoh Website yang dikembangkan dengan Codeigniter</h4><p xss=removed>Saat ini ada sekitar 753.660 website yang menggunakan Codeigniter di seluruh dunia, dan di indonesia sendiri terdapat sekitar 17.505 website yang menggunakan Codeingiter.<span> </span><sup id=\"fnref:2\" xss=removed><a href=\"https://www.petanikode.com/codeigniter-pemula/#fn:2\" class=\"footnote-ref\" role=\"doc-noteref\" xss=removed>2</a></sup></p><p xss=removed>Berikut ini beberapa website populer di Indonesia yang menggunakan Codeiginter:</p><ul xss=removed><li xss=removed>jakartaglobe.id</li><li xss=removed><a class=\"vglnk\" href=\"http://jawapos.com/\" rel=\"nofollow\" xss=removed><span xss=removed>jawapos</span><span xss=removed>.</span><span xss=removed>com</span></a></li><li xss=removed>itb.ac.id</li><li xss=removed>ipb.ac.id</li><li xss=removed>indihome.co.id</li><li xss=removed>cs.kaskus.co.id</li><li xss=removed>sipma.ui.ac.id</li><li xss=removed>epaper.republika.co.id</li><li xss=removed>ibt.ristekdikti.go.id</li><li xss=removed><a href=\"https://projects.id/petani_kode\" target=\"_blank\" xss=removed>project.co.id&lt;svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"11\" height=\"10\" viewBox=\"0 0 11 10\" aria-label=\"External Link\" style=\"margin:0 .15rem\"&gt;<polygon fill=\"#00ad9f\" points=\"12 5.038 6.962 10.066 5.668 8.772 8.502 5.961 0 5.961 0 4.116 8.502 4.116 5.691 1.282 6.984 0\" transform=\"rotate(-40 6 5.033)\"></polygon>&lt;/svg&gt;</a></li><li xss=removed>pu.go.id</li><li xss=removed>mechanical-rally.petra.ac.id</li><li xss=removed>fo3.garena.co.id</li><li xss=removed>ird.widyatama.ac.id</li><li xss=removed>bkddki.jakarta.go.id</li><li xss=removed>idws.id</li></ul><blockquote xss=removed><p xss=removed>Catatan: website ini bisa saja berubah-ubah dan berganti framework Data ini diambil dari<span> </span><a href=\"https://trends.builtwith.com/websitelist/CodeIgniter/Indonesia\" target=\"_blank\" xss=removed>buildwith.com&lt;svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"11\" height=\"10\" viewBox=\"0 0 11 10\" aria-label=\"External Link\" style=\"margin:0 .15rem\"&gt;<polygon fill=\"#00ad9f\" points=\"12 5.038 6.962 10.066 5.668 8.772 8.502 5.961 0 5.961 0 4.116 8.502 4.116 5.691 1.282 6.984 0\" transform=\"rotate(-40 6 5.033)\"></polygon>&lt;/svg&gt;</a><span> </span>pada tanggal 19 Agustus 2020.</p></blockquote><h2 id=\"sejarah-singkat-codeigniter\" class=\"h2\" xss=removed>Sejarah Singkat Codeigniter</h2><p xss=removed>Codeigniter pertamakali dibuat oleh EllisLab, sebuah perushaan software yang berbasis di Santa Barbara California.<span> </span><sup id=\"fnref:1\" xss=removed><a href=\"https://www.petanikode.com/codeigniter-pemula/#fn:1\" class=\"footnote-ref\" role=\"doc-noteref\" xss=removed>1</a></sup></p><p xss=removed>EllisLab merilis Codeigniter pertamakali pada tanggal<span> </span><strong xss=removed>28 Februari 2006</strong>.</p><p xss=removed>Beberapa tahun kemudian…</p><p xss=removed>Sudah sekian lama tidak dikembangkan. EllisLab akhirnya ingin memberikan proyek Codeigniter kepada orang lain.</p><p xss=removed>Pada tanggal<span> </span><strong xss=removed>9 Juli 2013</strong>, EllisLab mencari pemilik baru Codeigniter. Akhirnya pada tanggal<span> </span><strong xss=removed>6 Oktober 2014</strong><span> </span>pengembangan Codeigniter dialnjutkan dibawa kepengurusan dari<span> </span><strong xss=removed>British Columbia Institute of Technology</strong><span> </span>(BCIT).</p><p xss=removed>Lalu..</p><p xss=removed>Pada tanggal<span> </span><strong xss=removed>23 Oktober 2019</strong>, Codeigniter Foundation mengambil alih proyek ini dan tidak lagi dibawa kepengurusan BCIT.</p><p xss=removed>Codeigniter Foundation adalah yayasan non-profit yang dibentuk untuk pengembangan Codeigniter lebih lanjut.</p><p xss=removed>Proyek Codeigniter 4 pun dimulai dengan<span> </span><a href=\"https://github.com/jim-parry\" target=\"_blank\" xss=removed>Jim Parry&lt;svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" width=\"11\" height=\"10\" viewBox=\"0 0 11 10\" aria-label=\"External Link\" style=\"margin:0 .15rem\"&gt;<polygon fill=\"#00ad9f\" points=\"12 5.038 6.962 10.066 5.668 8.772 8.502 5.961 0 5.961 0 4.116 8.502 4.116 5.691 1.282 6.984 0\" transform=\"rotate(-40 6 5.033)\"></polygon>&lt;/svg&gt;</a><span> </span>sebagai project lead.</p><p xss=removed>…dan akhirnya pada tanggal<span> </span><strong xss=removed>24 Februari 2020</strong><span> </span>Codeigniter 4 resmi dirilis.</p><p xss=removed>Tanggal ini diambil, sebagai penghormatan terakhir kepada Jim Parry yang telah meninggal dunia pada tanggal<span> </span><strong xss=removed>15 Januari 2020</strong>.<span> </span><sup id=\"fnref:3\" xss=removed><a href=\"https://www.petanikode.com/codeigniter-pemula/#fn:3\" class=\"footnote-ref\" role=\"doc-noteref\" xss=removed>3</a></sup></p><figure class=\"mb-3 figure border p-1 rounded-0\" xss=removed><img class=\"lazyload img-fluid lazyloaded\" src=\"https://www.petanikode.com/img/ci/dasar/github-jim.png\" data-src=\"/img/ci/dasar/github-jim.png\" alt=\"Akun Github Jim Parry\" title=\"Akun Github Jim Parry\" xss=removed><figcaption class=\"figure-caption text-center my-2\" xss=removed>Akun Github Jim Parry</figcaption></figure><span xss=removed></span><p xss=removed>R.I.P Jim Parry, terimakasih atas kontribusinya di Codeigniter 4.</p><h2 id=\"versi-dan-perkembangan-codeigntier\" class=\"h2\" xss=removed>Versi dan Perkembangan Codeigntier</h2><ul xss=removed><li xss=removed>Codeigniter 1 oleh EllisLab (sudah tidak dikembangkan)</li><li xss=removed>Codeigniter 2 oleh BCIT (sudah tidak dikembangkan)</li><li xss=removed>Codeigniter 3 oleh BCIT (masih dikembangkan)</li><li xss=removed>Codeigniter 4 oleh Codeingter Foundation (versi saat ini)</li></ul><h2 id=\"codeigniter-versi-berapa-yang-harus-saya-pelajari\" class=\"h2\" xss=removed>Codeigniter Versi Berapa yang Harus saya Pelajari?</h2><p xss=removed>Saya merekomendasikan mempelajari Codeigniter 3 atau Codeigniter 4. Karena kedua versi ini masih dikembangkan hingga saat ini.</p><p xss=removed>Codeigniter 3, adalah codeigniter yang dirilis oleh BCIT dan ditargetkan untuk digunakan pada PHP 5.</p><p xss=removed>Codeigniter 3 juga bisa digunakan di PHP 7.</p><p xss=removed>Meskipun sudah ada Codeigniter 4, versi 3 masih tetap dikembangkan.</p><p xss=removed>Jadi, masih akan ada update terbaru di versi 3 hingga waktu yang belum ditentukan.</p><p xss=removed>Kita tunggu saja, pengumuman resmi kapan Codeigniter 3 akan dihentikan.</p><p xss=removed>Sementara itu Codeigniter 4, ditargetkan untuk digunakan pada PHP 7 ke atas. Versi ini dirilis oleh Codeigniter Foundation dan akan menjadi generasi penerus Codeigniter 4.</p><p xss=removed>Bingung mau belajar yang mana?</p><p xss=removed>Mari kita coba bandingkan secara detail</p><h3 id=\"perbedaan-codeigniter-3-dengan-codeigniter-4\" class=\"h3\" xss=removed>Perbedaan Codeigniter 3 dengan Codeigniter 4</h3><table xss=removed><thead xss=removed><tr xss=removed><th xss=removed>Dari segi</th><th xss=removed>Codeigniter 3</th><th xss=removed>Codeigniter 4</th></tr></thead><tbody xss=removed><tr xss=removed><td xss=removed>Versi PHP</td><td xss=removed>PHP 5.6+</td><td xss=removed>PHP 7.2+</td></tr><tr xss=removed><td xss=removed>Release oleh</td><td xss=removed>BCIT</td><td xss=removed>Codeigniter Foundation</td></tr><tr xss=removed><td xss=removed>Konsep</td><td xss=removed>MVC</td><td xss=removed>MVC</td></tr><tr xss=removed><td xss=removed>Site Root</td><td xss=removed>project root folder</td><td xss=removed><code xss=removed>public</code><span> </span>folder</td></tr><tr xss=removed><td xss=removed>Application folder</td><td xss=removed><code xss=removed>application</code></td><td xss=removed><code xss=removed>app</code></td></tr><tr xss=removed><td xss=removed>Controller Class</td><td xss=removed><code xss=removed>CI_Controller</code></td><td xss=removed><code xss=removed>\\CodeIgniter\\Controller</code></td></tr><tr xss=removed><td xss=removed>Object HTTP req/res</td><td xss=removed>tidak ada</td><td xss=removed><code xss=removed>Request</code><span> </span>dan<span> </span><code xss=removed>Response</code></td></tr><tr xss=removed><td xss=removed>Model Class</td><td xss=removed><code xss=removed>CI_Model</code></td><td xss=removed><code xss=removed>\\CodeIgniter\\Model</code></td></tr><tr xss=removed><td xss=removed>CRUD di Model</td><td xss=removed>Bikin sendiri</td><td xss=removed>Sudah disediakan</td></tr><tr xss=removed><td xss=removed>Entity Class</td><td xss=removed>Tidak ada</td><td xss=removed>Ada</td></tr><tr xss=removed><td xss=removed>View</td><td xss=removed><code xss=removed>$this->load->view(x);</code></td><td xss=removed><code xss=removed>echo view(x);</code></td></tr><tr xss=removed><td xss=removed>View Cell</td><td xss=removed>tidak ada</td><td xss=removed>ada</td></tr><tr xss=removed><td xss=removed>Load Library</td><td xss=removed><code xss=removed>$this->load->library(x);</code></td><td xss=removed><code xss=removed>$this->x = new X();</code></td></tr><tr xss=removed><td xss=removed>Middleware</td><td xss=removed>Tidak ada</td><td xss=removed>Ada Filters</td></tr><tr xss=removed><td xss=removed>FIle<span> </span><code xss=removed>.env</code></td><td xss=removed>Tidak ada</td><td xss=removed>Ada</td></tr><tr xss=removed><td xss=removed>Command Line Tools</td><td xss=removed>Tidak ada</td><td xss=removed>Ada<span> </span><code xss=removed>spark</code></td></tr></tbody></table><p xss=removed>Nah, itulah beberapa perbandingan dari segi teknis. Semoga kamu bisa menentukan versi Codeigniter yang akan dipelajari.</p><p xss=removed>Kalau bedasarkan pilihan pribadi, saya lebih menyarankan belajar yang versi 4, karena punya lebih banyak fitur dan lebih canggih dan juga terupdate.</p>', 'Aktif', 1640535120, 1, 1),
(3, 'Codeigniter-3--Part-2-', 'Tutorial Instalasi Codeigniter', '<p class=\"MsoNormal\" xss=removed><b><span xss=removed>Tutorial Codeigniter #02: Persiapan Belajar Codeigniter</span></b><span xss=removed><o></o></span></p><div class=\"MsoNormal\" align=\"center\" xss=removed><span xss=removed>\r\n\r\n<hr size=\"0\" width=\"100%\" align=\"center\">\r\n\r\n</span></div><p class=\"MsoNormal\" xss=removed><span xss=removed><a href=\"https://www.petanikode.com/topik/php\"><b><span xss=removed>#PHP</span></b></a> <a href=\"https://www.petanikode.com/topik/framework\"><b><span xss=removed>#Framework</span></b></a> <a href=\"https://www.petanikode.com/topik/codeigniter\"><b><span xss=removed>#Codeigniter</span></b></a></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Sebelum mulai belajar Codeigniter lebih lanjut, kita harus meyiapkan alat\r\nyang dibutuhkan untuk coding Codeigniter.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Apa Saja itu?</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>Persiapan Sebelum Belajar CI</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Prasyarat belajar Codeigniter..</span><span xss=removed><o></o></span></p><ul type=\"disc\">\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Memahami basic bahasa pemrograman\r\n     PHP.</span><span xss=removed><o></o></span></li>\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Untuk bisa belajar Codeigniter dengan\r\n     lancar setidaknya kamu sudah paham konsep pemrograman berorientasikan\r\n     objek (OOP) dengan PHP.</span><span xss=removed><o></o></span></li>\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Memahami sintaks dasar SQL;</span><span xss=removed><o></o></span></li>\r\n</ul><p class=\"MsoNormal\" xss=removed><span xss=removed>Nah, setelah prasyarat ini terpenuhi. Selanjutnya silahkan siapkan\r\nalat-alatnya untuk mulai belajar.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Berikut ini beberapa peralatan yang harus kamu siapkan di komputermu:</span><span xss=removed><o></o></span></p><ol start=\"1\" type=\"1\">\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Teks Editor</span><span xss=removed><o></o></span></li>\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Web Browser</span><span xss=removed><o></o></span></li>\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Web Server: PHP, MySQL, Phpmyadmin</span><span xss=removed><o></o></span></li>\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>File Project Codeigniter</span><span xss=removed><o></o></span></li>\r\n</ol><p class=\"MsoNormal\" xss=removed><span xss=removed>Mari kita siapkan satu-per-satu.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>1. Teks Editor</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Teks editor akan kita gunakan untuk menulis kode. Kamu bebas menggunakan\r\nteks editor apa saja untuk <i>coding</i> CI.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Saya merekomendasikan menggunakan <a href=\"https://www.petanikode.com/text-editor-vscode/\"><span xss=removed>VS\r\nCode</span></a>, karena mudah digunakan dan punya banyak fitur.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>2. Web Browser</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Web browser akan kita gunakan untuk melihat hasil dari aplikasi. Kamu juga\r\nbebas menggunakan web browser apapun, asalkan masih mendukung teknologi web\r\nmodern zaman sekarang.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Rekomendasi, gunakan Google Chrome atau Firefox.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed> </span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>3. Web Server</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Codeigniter merupakan framework PHP, karena itu ia pasti membutuhkan web\r\nserver. Berikut ini requirement server untuk Codeigniter 3:</span><span xss=removed><o></o></span></p><ul type=\"disc\">\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>PHP Versi 5.6+</span><span xss=removed><o></o></span></li>\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>MySQL Versi 5.1+</span><span xss=removed><o></o></span></li>\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Phpmyadmin</span><span xss=removed><o></o></span></li>\r\n</ul><p class=\"MsoNormal\" xss=removed><span xss=removed>Jika kamu sudah menginstal XAMPP, maka ketiga aplikasi server ini sudah\r\nterpenuhi. Tapi jika kamu pengguna Linux, maka ini bisa diinstal satu-per-satu.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed> </span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>4. File Project Codeigniter</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>File project Codeigniter dapat di-download di website resmi Codeigniter.\r\nNanti kita akan mendapatkan file berupa ZIP. File inilah yang akan kita gunakan\r\nuntuk mulai membuat proyek Codeigniter.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Silahkan ikuti:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>Cara Membuat Project Codeigniter</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Langkah-langkah yang harus dilakukan untuk membuat project CI:</span><span xss=removed><o></o></span></p><ol start=\"1\" type=\"1\">\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Download Codeigniter;</span><span xss=removed><o></o></span></li>\r\n <li class=\"MsoNormal\" xss=removed><span xss=removed>Ekstrak File ZIP Codeigniter ke\r\n     htdocs.</span><span xss=removed><o></o></span></li>\r\n</ol><p class=\"MsoNormal\" xss=removed><span xss=removed>Silahkan buka <a href=\"https://codeigniter.com/download\" target=\"_blank\"><span xss=removed>website Codeigniter</span></a> untuk\r\nmendownload.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Kita akan mendapatkan sebuah file zip </span><span xss=removed>????</span><span xss=removed> </span><span xss=removed>CodeIgniter-3.x.xx.zip</span><span xss=removed>, ekstrak file tersebut ke dalam </span><span xss=removed>c:\\xampp\\htdocs</span><span xss=removed> (XAMPP) atau </span><span xss=removed>/var/www/html</span><span xss=removed> (di Linux).</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Setelah itu, ubah nama </span><span xss=removed>CodeIgniter-3.x.xx</span><span xss=removed> menjadi </span><span xss=removed>beritacoding</span><span xss=removed>.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Kenapa namanya </span><span xss=removed>beritacoding</span><span xss=removed>?</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Karena kita akan membuat proyek semacam web portal sederhana yang berisi\r\nberita tentang dunia coding. Tujuannya, agar kita paham konsep dasar dari\r\nCodeigniter.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Sekarang coba buka web browser dan buka alamat: </span><span xss=removed><a href=\"http://localhost/beritacoding/\"><span xss=removed>http://localhost/beritacoding/</span></a></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Selamat </span><span xss=removed>????</span><span xss=removed> proyek\r\nCodeigniter berhasil dibuat.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Berikutnya, kita bisa mulai coding..<o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed> </span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>Membuat Domain Virtual Host</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Ini sebenarnya opsional, kamu boleh membuatnya dan boleh tidak. Namun agar\r\nmemudahkan dalam proses development, sebaiknya dibuatkan virtual host untuk\r\ntiap proyek.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Virtual host adalah alamat virtual yang akan digunakan untuk mengakses\r\nwebsite di localhost.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Pada contoh di atas, kita membuka aplikasi melalui alamat </span><span xss=removed><a href=\"http://localhost/beritacoding\"><span xss=removed>http://localhost/beritacoding</span></a></span><span xss=removed> dengan virtual host kita bisa membukanya dari </span><span xss=removed>beritacoding.test</span><span xss=removed>.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Apa domainnya boleh diganti dengan </span><span xss=removed>.com</span><span xss=removed>, misalnya </span><span xss=removed><a href=\"http://beritacoding.com/\"><span xss=removed>beritacoding.com</span></a></span><span xss=removed>.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Bisa, terserah kita mau pakai domain apapun. Soalnya ini kan di localhost.\r\nTapi agar tidak membingungkan, baiknya pakai domain </span><span xss=removed>.test</span><span xss=removed> atau </span><span xss=removed>.local</span><span xss=removed>.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>Membuat Virtual Host di Linux</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Untuk kamu pengguna Linux atau Mac, bisa mengikuti cara berikut. Silahkan\r\nbuka Terminal lalu ketik.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>sudo cp\r\n/etc/apache2/sites-available/000-default.conf\r\n/etc/apache2/sites-available/beritacoding.test.conf</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Perintah ini akan melakukan copy dari konfigurasi default host apache.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Setelah itu, buka file </span><span xss=removed>beritacoding.test.conf</span><span xss=removed> dengan tekes editor. Ketik perintah berikut:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>sudo nano\r\n/etc/apache2/sites-available/beritacoding.test.conf</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Lalu ubah isinya menjadi seperti ini:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed><VirtualHost><span xss=removed> </span><span xss=removed>*:80</span><span xss=removed>></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>ServerAdmin</span></i><span xss=removed> admin@beritacoding.test</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>ServerName</span></i><span xss=removed> beritacoding.test</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>ServerAlias</span></i><span xss=removed> <a href=\"http://www.beritacoding.test/\"><span xss=removed>www.beritacoding.test</span></a></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>DocumentRoot</span></i><span xss=removed> </span><span xss=removed>/var/www/html/beritacoding</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>ErrorLog</span></i><span xss=removed> ${APACHE_LOG_DIR}/error.log</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>CustomLog</span></i><span xss=removed> ${APACHE_LOG_DIR}/access.log\r\ncombined</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed></VirtualHost></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Setelah itu, tekan </span><span xss=removed>Ctrl</span><span xss=removed>+</span><span xss=removed>x</span><span xss=removed> lalu pilih </span><span xss=removed>y</span><span xss=removed> untuk menyimpan.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Berikutnya, buka file </span><span xss=removed>/etc/hosts</span><span xss=removed> ketik perintah berikut:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>sudo nano\r\n/etc/hosts</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Setelah itu, tambahkan:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>127.0.0.1\r\nberitacoding.test</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Ini akan menjadi alamat domain yang akan kita pakai. Kamu juga bisa\r\nmenggantinya dengan yang lain.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Setelah itu, simpan dengan menekan </span><span xss=removed>Ctrl</span><span xss=removed>+</span><span xss=removed>x</span><span xss=removed> lalu pilih </span><span xss=removed>y</span><span xss=removed>.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Berikutnya, kita harus mengaktifkan konfigurasi site apache yang sudah\r\ndibuat. Silahkan ketik perintah berikut:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>sudo\r\na2ensite beritacoding.test.conf</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Terakhir, restart server dengan perintah berikut:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>sudo\r\nservice apache2 restart</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>…dan coba buka alamat </span><span xss=removed>beritacoding.test</span><span xss=removed> dari web browser.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><b><span xss=removed>Membuat Virtual Host di Windows</span></b><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Untuk kamu yang menggunakan XAMPP di Windows, berikut ini cara membuat\r\nvirtual host.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Silahkan buka windows explorer, lalu masuk ke folder </span><span xss=removed>C:/xampp/apache/conf/extra</span><span xss=removed>.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Setelah itu, buka file </span><span xss=removed>httpd.vshosts.conf</span><span xss=removed> dengan pad atau Notepad++.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Selanjutnya tambahkan kode berikut ini pada file </span><span xss=removed>httpd-vhosts.conf</span><span xss=removed>:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed><VirtualHost><span xss=removed> </span><span xss=removed>*:80</span><span xss=removed>></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>ServerAdmin</span></i><span xss=removed> admin@beritacoding.test</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>ServerName</span></i><span xss=removed> beritacoding.test</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>ServerAlias</span></i><span xss=removed> <a href=\"http://www.beritacoding.test/\"><span xss=removed>www.beritacoding.test</span></a></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>DocumentRoot</span></i><span xss=removed> </span><span xss=removed>\"c:\\xampp\\htdocs\\beritacoding\"</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>ErrorLog</span></i><span xss=removed> ${APACHE_LOG_DIR}/error.log</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><i><span xss=removed>CustomLog</span></i><span xss=removed> ${APACHE_LOG_DIR}/access.log\r\ncombined</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>    </span><span xss=removed><Directory><span xss=removed> </span><span xss=removed>\"c:\\xampp\\htdocs\\beritacoding\"</span><span xss=removed>></Directory></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed></VirtualHost></span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Setelah itu, tekan </span><span xss=removed>Windows</span><span xss=removed>+</span><span xss=removed>r</span><span xss=removed>, lalu masukkan..</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>C:</span><i><span xss=removed>\\Windows\\System32\\drivers\\etc\\hosts</span></i><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>pada kolom <b>Open</b>.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Tambahkan kode berikut:</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>127.0.0.1\r\nberitacoding.test</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Setelah itu simpan, dan restart server apache.</span><span xss=removed><o></o></span></p><p class=\"MsoNormal\" xss=removed><span xss=removed>Sekarang coba buka browser dan arahkan ke alamat </span><span xss=removed>beritacoding.test</span></p>', 'Aktif', 1640590491, 1, 1);
INSERT INTO `subject_matter` (`id_subject_matter`, `title`, `sub_title`, `content`, `status`, `date_post`, `id`, `id_class`) VALUES
(6, 'Object-Oriented-Programming', 'Pembelajaran Dasar OOP', '<p class=\"MsoNormal\" xss=removed><b><span xss=removed><a href=\"https://unggulbayupamungkas.wordpress.com/2018/10/09/pemodelan-sistem-berbasis-objek/\"><span xss=removed>Pemodelan\r\nSistem Berbasis Objek</span></a></span></b><b><o></o></b></p><p class=\"MsoNormal\" align=\"center\" xss=removed>&lt;!--[if gte vml 1]><v id=\"_x0000_t75\" coordsize=\"21600,21600\" o:spt=\"75\" o:preferrelative=\"t\" path=\"m@4@5l@4@11@9@11@9@5xe\" filled=\"f\" stroked=\"f\">\r\n <v joinstyle=\"miter\">\r\n <v>\r\n  <v eqn=\"if lineDrawn pixelLineWidth 0\">\r\n  <v eqn=\"sum @0 1 0\">\r\n  <v eqn=\"sum 0 0 @1\">\r\n  <v eqn=\"prod @2 1 2\">\r\n  <v eqn=\"prod @3 21600 pixelWidth\">\r\n  <v eqn=\"prod @3 21600 pixelHeight\">\r\n  <v eqn=\"sum @0 0 1\">\r\n  <v eqn=\"prod @6 1 2\">\r\n  <v eqn=\"prod @7 21600 pixelWidth\">\r\n  <v eqn=\"sum @8 21600 0\">\r\n  <v eqn=\"prod @7 21600 pixelHeight\">\r\n  <v eqn=\"sum @10 21600 0\">\r\n </v>\r\n <v o:extrusionok=\"f\" gradientshapeok=\"t\" o:connecttype=\"rect\">\r\n <o v:ext=\"edit\" aspectratio=\"t\">\r\n</v><v id=\"Picture_x0020_4\" o:spid=\"_x0000_i1028\" type=\"#_x0000_t75\" xss=removed>\r\n <v src=\"file:///C:/Users/SALMAN~1/AppData/Local/Temp/msohtmlclip1/01/clip_image001.jpg\" o:title=\"\">\r\n</v>&lt;![endif]--&gt;&lt;!--[if !vml]--&gt;&lt;!--[endif]--&gt;<o></o></p><p class=\"MsoNormal\" xss=removed><b>Pengertian OOP (Object\r\nOriented Programming) <o></o></b></p><p class=\"MsoNormal\" xss=removed>OOP (Object Oriented Programming)\r\nadalah suatu metode pemrograman yang berorientasi kepada objek. Tujuan dari OOP\r\ndiciptakan adalah untuk mempermudah pengembangan program dengan cara mengikuti\r\nmodel yang telah ada di kehidupan sehari-hari. Jadi setiap bagian dari suatu\r\npermasalahan adalah objek, nah objek itu sendiri merupakan gabungan dari\r\nbeberapa objek yang lebih kecil lagi. Saya ambil contoh Pesawat, Pesawat adalah\r\nsebuah objek. Pesawat itu sendiri terbentuk dari beberapa objek yang lebih\r\nkecil lagi seperti mesin, roda, baling-baling, kursi, dll. Pesawat sebagai\r\nobjek yang terbentuk dari objek-objek yang lebih kecil saling berhubungan,\r\nberinteraksi, berkomunikasi dan saling mengirim pesan kepada objek-objek yang\r\nlainnya. Begitu juga dengan program, sebuah objek yang besar dibentuk dari\r\nbeberapa objek yang lebih kecil, objek-objek itu saling berkomunikasi, dan\r\nsaling berkirim pesan kepada objek yang lain.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<b>1.<span xss=removed>     \r\n</span></b>&lt;!--[endif]--&gt;<b>Pengertian\r\nOOAD<o></o></b></p><p class=\"MsoNormal\" xss=removed>OOAD adalah metode analisis yang memerikasa\r\nrequirements dari sudut pandang kelas kelas dan objek yang ditemui dalam ruang\r\nlingkup permasalahan yang mengarahkan arsitektur software yang didasarkan pada\r\nmanipulasi objek-objek system atau subsistem.<o></o></p><p class=\"MsoNormal\" align=\"center\" xss=removed>&lt;!--[if gte vml 1]><v id=\"Picture_x0020_3\" o:spid=\"_x0000_i1027\" type=\"#_x0000_t75\" alt=\"ooad\" xss=removed>\r\n <v src=\"file:///C:/Users/SALMAN~1/AppData/Local/Temp/msohtmlclip1/01/clip_image001.jpg\" o:title=\"ooad\">\r\n</v>&lt;![endif]--&gt;&lt;!--[if !vml]--&gt;&lt;!--[endif]--&gt;<o></o></p><p class=\"MsoNormal\" xss=removed>OOAD merupakan cara baru dalam memikirkan\r\nsuatu masalah dengan menggunakan model yang dibuat menurut konsep sekitar dunia\r\nnyata. Dasar pembuatan adalah objek,yang merupakan kombinasi antara struktur\r\ndata dan perilaku dalam satu entitas.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<b>2.<span xss=removed>     \r\n</span></b>&lt;!--[endif]--&gt;<b>Konsep\r\nDasar OOAD<o></o></b></p><p class=\"MsoNormal\" xss=removed>OOAD mencakup analisis dan desain sebuah sistem\r\ndengan pendekatan objek, yaiut analisis berorientasi objek (OOA) dan desain\r\nberorientasi objek (OOD). OOA adalah metode analisis yang memerika requirement\r\n(syarat/keperluan) yang harus dipenuhi sebuah sistem) dari sudut pandang\r\nkelas-kelas dan objek-objek yang ditemui dalam ruang lingkup perusahaan.\r\nSedangkan OOD adalah metode untuk mengarahkan arsitektur software yang\r\ndidasarkan pada manipulasi objek-objek sistem atau subsistem.<o></o></p><p class=\"MsoNormal\" xss=removed>Terdapat beberapa konsep dalam OOAD, yaitu :<o></o></p><p class=\"MsoNormal\" xss=removed>– Objek (object)<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if gte vml 1]><v id=\"Picture_x0020_2\" o:spid=\"_x0000_i1026\" type=\"#_x0000_t75\" xss=removed>\r\n <v src=\"file:///C:/Users/SALMAN~1/AppData/Local/Temp/msohtmlclip1/01/clip_image003.png\" o:title=\"\">\r\n</v>&lt;![endif]--&gt;&lt;!--[if !vml]--&gt;&lt;!--[endif]--&gt;<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Objek\r\nadalah benda secara fisik dan konseptual yang ada di sekitar kita. Sebuah objek\r\nmemiliki keadaan sesaat yang disebut state.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;State dari\r\nsebuah objek adalah kondisi dari objek atau himpunan keadaan yang menggambarkan\r\nobjek tersebut. State dinyatakan dengan nilai dari atribut objeknya.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Atribut\r\nadalah nilai internal suatu objek yang mencerminkan karakteristik objek,\r\nkondisi sesaat, koneksi dengan objek lain dan identitas.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Behaviour\r\n(perilaku objek) mendefinisikan bagaimana sebuah objek bertindak dan memberi\r\nreaksi. Behaviour ditentukan oleh himpunan semua atau beberapa operasi yang\r\ndapat dilakukan oleh objek tersebut, yang dicerminkan oleh interface, service,\r\ndan method dari objek tersebut.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Interface\r\nadalah pintu untuk mengakses service dari objek<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Service\r\nadalah fungsi yang dapat dikerjakan oleh sebuah objek<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Method\r\nadalah mekanisme internal objek yang mencerminkan perilaku objek tersebut<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Encapsulation,\r\nyaitu proses menyembunyikan detail implementasi sebuah objek. Untuk mengakses\r\ndata objek tersebut adalah melalui interface. Untuk berkomunikasi dengan objek\r\ndigunakan message.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Message\r\nadalah permintaan agar objek menerima untuk membawa metode yang ditunjukkan\r\noleh perilaku dan mengembalikan result dari aksi tersebut kepada objek pengirim\r\n(sender)<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Asosiasi\r\nadalah hubungan yang mempunyai makna antara sejumlah objek. Asosiasi digambarkan\r\ndengan sebuah garis penghubung diantara objeknya. Contohnya : Asosiasi karyawan\r\ndengan unit kerja. Setiap karyawan bekerja di satu unit kerja, sedangkan unit\r\nkerja dapat memiliki beberapa karyawan.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Agregasi\r\nadalah bentuk khusus sebuah asosiasi yang menggambarkan seluruh bagian pada\r\nsuatu objek merupakan bagian dari objek yang lain. Contohnya : Kopling dan\r\npiston adalah bagian dari mesin, sedangkan mesin, roda, body merupakan bagian\r\ndari sebuah mobil.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Encapsulation<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Inheritence\r\n(turunan)<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Polimorfisme<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Model\r\nobjek Menggambarkan struktur statis dari suatu objek dalam sistem dan relasinya<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Model\r\nobjek berisi diagram objek. Diagram objek adalah graph dimana nodenya adalah\r\nkelas yang mempunyai relasi antar kelas.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Model\r\ndinamik menggambarkan aspek dari sistem yang berubah setiap saat.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Model\r\ndinamik dipergunakan untuk menyatakan aspek kontrol dari sistem.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Model\r\ndinamik berisi state diagram. State diagram adalah graph dimana nodenya adalah\r\nstate dan arc adalah tarnsisi antara state yang disebabkan oleh event.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Model\r\nfungsional menggambrakan transformasi nilai data di dalam sistem.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Model\r\nfungsional berisi data flow diagram. DFD adalah suatu graph dimana nodenya\r\nmenyatakan proses dan arcnya adalah aliran data.<o></o></p><p class=\"MsoNormal\" xss=removed>– Kelas (class)<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if gte vml 1]><v id=\"Picture_x0020_1\" o:spid=\"_x0000_i1025\" type=\"#_x0000_t75\" xss=removed>\r\n <v src=\"file:///C:/Users/SALMAN~1/AppData/Local/Temp/msohtmlclip1/01/clip_image005.jpg\" o:title=\"\">\r\n</v>&lt;![endif]--&gt;&lt;!--[if !vml]--&gt;&lt;!--[endif]--&gt;<o></o></p><p class=\"MsoNormal\" xss=removed>Class adalah himpunan objek yang sejenis yaitu\r\nmempunyai sifat (atribut), perilaku umum (operasi), relasi umum dengan objek\r\nlain dan semantik umum. Class adalah abstraksi dari objek dalam dunia nyata.\r\nClass menetapkan spesifikasi perilaku dan atribut dari objek tersebut.<o></o></p><p class=\"MsoNormal\" xss=removed>– Kotak Hitam (black boxes)<o></o></p><p class=\"MsoNormal\" xss=removed>Sebuah objek adalah kotak hitam. Konsep ini\r\nmenjadi dasar implementasi objek. Dalam operasi OO hanya developer yang dapat\r\nmemahami detail proses yang ada didalam kotak tersebut, sedangkan user tidak\r\nperlu mengetahui apa yang dilakukan yang penting mereka dapat menggunakan objek\r\nuntuk memproses kebutuhan mereka. Kotak hitam berisi kode dan data.<o></o></p><p class=\"MsoNormal\" xss=removed>– Asosiasi dan Agregasi<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;3.<span xss=removed>     \r\n</span>&lt;!--[endif]--&gt;Pengertian\r\nObject<o></o></p><p class=\"MsoNormal\" xss=removed>Obyek  adalah sesuatu yang dapat dilihat, disentuh\r\natau dirasakan dan digunakan pengguna serta akan disimpan data dan perilakunya.\r\nBisa berupa:<o></o></p><p class=\"MsoNormal\" xss=removed>-Orang, tempat, benda atau kejadian<o></o></p><p class=\"MsoNormal\" xss=removed>-Pegawai, pelanggan, guru, dosen, mahasiswa,\r\nmurid.<o></o></p><p class=\"MsoNormal\" xss=removed>-Gudang, kantor, bangunan, ruangan.<o></o></p><p class=\"MsoNormal\" xss=removed>-Kendaraan, produk, konputer, video.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;4.<span xss=removed>     \r\n</span>&lt;!--[endif]--&gt;Karakteristik\r\nObject<o></o></p><p class=\"MsoNormal\" xss=removed>-Identitas berarti bahwa data diukur mempunyai\r\nnilai tertentu yang<o></o></p><p class=\"MsoNormal\" xss=removed>membedakan entitas disebut Objek.<o></o></p><p class=\"MsoNormal\" xss=removed>-Objek dapat kongkrit, seperti halnya arsip\r\ndalam sistem, atau<o></o></p><p class=\"MsoNormal\" xss=removed>konseptual seperti kebijakan penjadualan dalam\r\nmultiprocessing<o></o></p><p class=\"MsoNormal\" xss=removed>pada sistem operasi.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Setiap\r\nobjek mempunyai sifat yang melekat pada identitasnya.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;<span xss=removed>·<span xss=removed>       \r\n</span></span>&lt;!--[endif]--&gt;Dua objek\r\ndapat berbeda walaupun bila semua nilai atributnya identik.<o></o></p><p class=\"MsoNormal\" xss=removed>Kelas Objek<o></o></p><p class=\"MsoNormal\" xss=removed>-Kelas merupakan gambaran sekumpulan Objek yang\r\nterbagi dalam atribut, operasi, metode, hubungan, dan makna yang sama.<o></o></p><p class=\"MsoNormal\" xss=removed>-Suatu kegiatan mengumpulkan data (atribut) dan\r\nperilaku (operasi) yang mempunyai struktur data sama ke dalam satu grup.<o></o></p><p class=\"MsoNormal\" xss=removed>– Kelas Objek merupakan wadah bagi Objek. Dapat\r\ndigunakan untuk menciptakan Objek.<o></o></p><p class=\"MsoNormal\" xss=removed>-Objek mewakili fakta/keterangan dari sebuah\r\nkelas.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;5.<span xss=removed>     \r\n</span>&lt;!--[endif]--&gt;Metedologi \r\npengembangan sistem berbasis object<o></o></p><p class=\"MsoNormal\" xss=removed>Metodologi adalah cara systematis untuk\r\nmengerjakan analisys and design. Dengan metodologi, pihak yang membangun system\r\nsoftware dapat merencanakan dan mengulangi pekerjaan dilain waktu. Metodologi\r\njuga menghilangkan perbedaan notasi untuk suatu hal yang sama karena setiap\r\noarng akan berbicara dalam bahasa yang sama. Metodologi yang paling banyak\r\ndalam OOAD, yaitu : Object Modeling Technique (OMT) dari Rumbaugh, Object\r\nOriented Booch, Responsibility-Driven Design/ Class Responsibility\r\nCalloboration (RDD/CRC) dari Wirf-Broock, Metodologi Coad/ Yourdan dan Jacobson\r\nObject Oriented Software Enginering (OOSE).<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;6.<span xss=removed>     \r\n</span>&lt;!--[endif]--&gt;Yang\r\ndimaksud dengan Encapsulation, Inheritance, Polimorfisme?<br>\r\nAdalah pembungkusan/pengemasan data dan fungsi dalam wadah bernama obyek. atau\r\nmenyembunyikan operasi-operasi dari dunia luar dan dari obyek-obyek lain adalah\r\nkonsep yang menyatakan bahwa metode atau atribut dalam kelas dapat diturunkan\r\natau digunakan kembali oleh kelas lain adalah mempunyai banyak bentuk Merupakan suatu\r\nkonsep yang menyatakan sesuatu yang sama dapat memiliki berbagai bentuk dan\r\nperilaku yang berbeda.<o></o></p><p class=\"MsoNormal\" xss=removed>&lt;!--[if !supportLists]--&gt;7.<span xss=removed>     \r\n</span>&lt;!--[endif]--&gt;Teknik\r\npemodelan yang ada pada OOAD?<o></o></p><p class=\"MsoNormal\" xss=removed>– Model Objek<br>\r\n– Model Dinamik<br>\r\n– Model Fungsional<o></o></p><p>\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n</p><p class=\"MsoNormal\"><o> </o></p>', 'Aktif', 1640592867, 6, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_user`
--

CREATE TABLE `task_user` (
  `id_task` int(11) NOT NULL,
  `name_task` text DEFAULT NULL,
  `start_task` varchar(128) NOT NULL,
  `end_task` varchar(128) NOT NULL,
  `id` int(11) NOT NULL,
  `id_subject_matter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `task_user`
--

INSERT INTO `task_user` (`id_task`, `name_task`, `start_task`, `end_task`, `id`, `id_subject_matter`) VALUES
(1, '<p><b>Latihan Soal</b></p><p>Silahkan jawab latihan soal berikut dengan baik dan benar.<br></p><p>1. Jelaskan apa itu Codeigniter!</p><p>2. Apa saja keunggulan dari Codeigniter?</p><p>3. Dari materi yang dibaca, sebutkan 3 website populer di Indonesia yang menggunakan Codeigniter!</p><p>4. Pada tanggal berapa Codeigniter 4 dirilis?</p><p>5. Perusahaan apa yang pertamakali membuat Codeigniter?</p><p>Harap diperhatikan tanggal terakhir pengumpulan tugasnya.<br></p>', '2021-12-26', '2021-12-29', 1, 1),
(2, NULL, '', '', 1, 2),
(3, '<p><b>Tugas</b></p><p>Berikan screenshoot hasil instalasi codeigniter 3 kalian pada file doc!</p><p>Silahkan dikirim tugasnya tidak melewati deadline pengumpulan.</p>', '2021-12-27', '2021-12-29', 1, 3),
(6, '<p>Buat Penjelasan OOP menurut versi kalian sendiri , dan buat project</p><p>CRUD bahasa php</p>', '2021-12-26', '2021-12-28', 6, 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Jaka Fitriansyah,S.Kom', 'jakafitriansyah31@gmail.com', '', '$2y$10$SUbnJDTpgg9WOwO/JsuiX.pKKGuKkvvhvsXrYZ4l6fWY5pmHp.pa2', 4, 1, 1640534194),
(2, 'Rismawati', 'rismawatid09@gmail.com', '', '$2y$10$q0R5Ogy23qgDX7SrYTerkuMx1k88rqiiV1SlmCR.c9cn6NEAhUWl6', 1, 1, 1640534414),
(3, 'Randi Jm', 'randi0100@gmail.com', '', '$2y$10$Am5f6J0OMWKT7WG790ooy.5GL1lWF2dtuMJJOkGkwn32yeO3G2HBm', 2, 1, 1640535445),
(4, 'Salman Haafizh', 'salmanxfxa@gmail.com', '', '$2y$10$9wAF09GpeLt7IP59B4TMqeIsWKu3MtYFyYYgbvivrPWMcLnv3uc/y', 2, 1, 1640541018),
(5, 'Shina Mashiro, S.Kom', 'shinaxfxa@gmail.com', '', '$2y$10$5xxXmuclJpMvmMtD5ih5gOgMBXg.qfNwNtZfKLvMM9DOaObLZBvh2', 4, 1, 1640575903),
(6, 'Riandi Herfansyah S.Kom', 'helper.satush@gmail.com', '', '$2y$10$DTUP5PdOurXPIe15p7yoH.juzCOsSf1OffbMWiVHWT4W7Rrsx8LmS', 4, 1, 1640592287);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(3, 2, 2),
(7, 1, 3),
(10, 4, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'User'),
(3, 'Menu'),
(4, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(4, 'Guru');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(3, 2, 'Edit Profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(7, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(8, 2, 'Change Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(9, 1, 'Data User', 'admin/data_user', 'fas fa-fw fa-pen', 1),
(11, 1, 'Kelas', 'admin/study', 'fas fa-fw fa-pen', 1),
(13, 4, 'Data Siswa', 'guru/data_user', 'fas fa-fw fa-folder', 1),
(14, 4, 'Materi', 'guru/c_content', 'fas fa-fw fa-pen', 1),
(15, 4, 'Tugas', 'guru/task', 'fas fa-fw fa-folder', 1),
(20, 4, 'Nilai', 'guru/poin', 'fas fa-fw fa-folder', 1),
(21, 1, 'Sertifikat', 'admin/sertifikat', 'fas fa-fw fa-folder', 1),
(22, 4, 'Kelulusan', 'guru/lulus', 'fas fa-fw fa-folder', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(23, '19200497@bsi.ac.id', '4567', 1640488472),
(24, 'tes2@gmail.com', '5486', 1640519970),
(25, '19200497@bsi.ac.id', '6104', 1640520036),
(28, 'randi0100@gmail.com', '5419', 1640535445),
(30, 'shinaxfxa@gmail.com', '5222', 1640575903),
(31, 'helper.satush@gmail.com', '2214', 1640592287);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id_class`);

--
-- Indeks untuk tabel `completed_task`
--
ALTER TABLE `completed_task`
  ADD PRIMARY KEY (`id_completed_task`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `subject_matter`
--
ALTER TABLE `subject_matter`
  ADD PRIMARY KEY (`id_subject_matter`);

--
-- Indeks untuk tabel `task_user`
--
ALTER TABLE `task_user`
  ADD PRIMARY KEY (`id_task`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `class`
--
ALTER TABLE `class`
  MODIFY `id_class` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `completed_task`
--
ALTER TABLE `completed_task`
  MODIFY `id_completed_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `subject_matter`
--
ALTER TABLE `subject_matter`
  MODIFY `id_subject_matter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `task_user`
--
ALTER TABLE `task_user`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
