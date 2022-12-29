-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 29, 2022 at 12:53 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_pgri`
--

-- --------------------------------------------------------

--
-- Table structure for table `file_pengumuman`
--

CREATE TABLE `file_pengumuman` (
  `id_file` int(11) NOT NULL,
  `gelombang_id` varchar(15) DEFAULT NULL,
  `file_pdf` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_pengumuman`
--

INSERT INTO `file_pengumuman` (`id_file`, `gelombang_id`, `file_pdf`) VALUES
(2, '1', 'CONTOH GELOMBANG 1.pdf'),
(3, '2', 'CONTOH GELOMBANG 2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_ujian`
--

CREATE TABLE `jadwal_ujian` (
  `id_jadwal` int(11) NOT NULL,
  `gelombang_id` int(11) NOT NULL,
  `tanggal_ujian` date NOT NULL,
  `jam_ujian` time NOT NULL,
  `durasi_ujian` int(11) NOT NULL,
  `timer_ujian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_ujian`
--

INSERT INTO `jadwal_ujian` (`id_jadwal`, `gelombang_id`, `tanggal_ujian`, `jam_ujian`, `durasi_ujian`, `timer_ujian`) VALUES
(1, 1, '2022-12-29', '07:30:00', 120, 7200),
(2, 2, '2022-09-30', '07:30:00', 120, 7200);

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_ujian`
--

CREATE TABLE `jawaban_ujian` (
  `id_jawaban` int(11) NOT NULL,
  `id_ppdb` int(11) NOT NULL,
  `id_soal_ujian` int(11) NOT NULL,
  `jawaban` varchar(15) NOT NULL,
  `skor` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban_ujian`
--

INSERT INTO `jawaban_ujian` (`id_jawaban`, `id_ppdb`, `id_soal_ujian`, `jawaban`, `skor`) VALUES
(306, 13, 93, 'C', '1'),
(307, 13, 97, 'B', '1'),
(308, 13, 89, 'E', '1'),
(309, 13, 106, 'E', '1'),
(310, 13, 105, 'C', '1'),
(311, 13, 95, 'A', '1'),
(312, 13, 91, 'B', '1'),
(313, 13, 92, 'E', '1'),
(314, 13, 102, 'E', '1'),
(315, 13, 99, 'D', '1'),
(316, 13, 90, 'D', '1'),
(317, 13, 94, 'C', '1'),
(318, 13, 98, 'C', '1'),
(319, 13, 100, 'D', '1'),
(320, 13, 88, 'B', '1'),
(321, 13, 104, 'C', '1'),
(322, 13, 96, 'A', '1'),
(323, 13, 103, 'B', '1'),
(324, 13, 87, 'A', '1'),
(325, 13, 101, 'D', '1'),
(326, 13, 4, 'A', '1'),
(327, 13, 19, 'B', '1'),
(328, 13, 39, 'D', '1'),
(329, 13, 13, 'C', '1'),
(330, 13, 7, 'A', '1'),
(331, 13, 12, 'C', '1'),
(332, 13, 42, 'A', '1'),
(333, 13, 46, 'B', '1'),
(334, 13, 43, 'B', '1'),
(335, 13, 16, 'B', '1'),
(336, 13, 18, 'B', '1'),
(337, 13, 17, 'D', '1'),
(338, 13, 41, 'C', '1'),
(339, 13, 11, 'D', '1'),
(340, 13, 40, 'A', '1'),
(341, 13, 3, 'E', '1'),
(342, 13, 15, 'D', '1'),
(343, 13, 45, 'A', '1'),
(344, 13, 14, 'A', '1'),
(345, 13, 5, 'A', '1'),
(346, 13, 37, 'C', '1'),
(347, 13, 44, 'B', '1'),
(348, 13, 10, 'B', '1'),
(349, 13, 38, 'D', '1'),
(350, 13, 9, 'C', '1'),
(351, 13, 8, 'D', '1'),
(352, 13, 113, 'B', '1'),
(353, 13, 122, 'E', '1'),
(354, 13, 115, 'D', '1'),
(355, 13, 123, 'E', '1'),
(356, 13, 126, 'D', '1'),
(357, 13, 109, 'D', '1'),
(358, 13, 112, 'A', '1'),
(359, 13, 117, 'D', '1'),
(360, 13, 125, 'D', '1'),
(361, 13, 124, 'B', '1'),
(362, 13, 121, 'E', '1'),
(363, 13, 118, 'A', '1'),
(364, 13, 119, 'C', '1'),
(365, 13, 110, 'B', '1'),
(366, 13, 116, 'D', '1'),
(367, 13, 107, 'B', '1'),
(368, 13, 128, 'D', '1'),
(369, 13, 114, 'E', '1'),
(370, 13, 108, 'E', '1'),
(371, 13, 111, 'D', '1'),
(372, 13, 120, 'E', '1'),
(373, 13, 127, 'A', '1'),
(374, 13, 76, 'B', '0'),
(375, 13, 84, 'D', '0'),
(376, 13, 75, 'C', '0'),
(377, 13, 83, 'B', '0'),
(378, 13, 74, 'C', '0'),
(379, 13, 70, 'C', '0'),
(380, 13, 78, 'C', '1'),
(381, 13, 67, 'D', '0'),
(382, 13, 68, 'E', '0'),
(383, 13, 80, 'D', '0'),
(384, 13, 69, 'C', '1'),
(385, 13, 85, 'A', '1'),
(386, 13, 82, 'A', '0'),
(387, 13, 73, 'D', '0'),
(388, 13, 81, 'E', '1'),
(389, 13, 77, 'B', '0'),
(390, 13, 72, 'A', '0'),
(391, 13, 79, 'C', '0'),
(392, 13, 71, 'A', '0'),
(393, 13, 86, 'B', '0'),
(394, 13, 50, 'A', '1'),
(395, 13, 54, 'C', '0'),
(396, 13, 66, 'E', '1'),
(397, 13, 58, 'B', '0'),
(398, 13, 56, 'D', '1'),
(399, 13, 61, 'C', '1'),
(400, 13, 59, 'C', '0'),
(401, 13, 48, 'A', '0'),
(402, 13, 55, 'A', '0'),
(403, 13, 63, 'C', '0'),
(404, 13, 60, 'D', '1'),
(405, 13, 52, 'A', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_soal`
--

CREATE TABLE `kategori_soal` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori_soal`
--

INSERT INTO `kategori_soal` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Matematika'),
(2, 'Bahasa Indonesia'),
(3, 'Biologi'),
(4, 'Fisika'),
(5, 'Sejarah'),
(6, 'Geografi'),
(7, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `konfigurasi_id` int(11) NOT NULL,
  `nama_web` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `visi` text,
  `misi` text,
  `instagram` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `nama_rek` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`konfigurasi_id`, `nama_web`, `deskripsi`, `visi`, `misi`, `instagram`, `facebook`, `whatsapp`, `email`, `alamat`, `nama_rek`, `no_rek`, `logo`, `icon`) VALUES
(1, 'SMK JUJUTSU 2', 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 'https://instagram.com', 'https://facebook.com', '082266666666', 'smaloremipsum@gmail.com', 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 'BCA', '84357231242', 'Logo-PNG-Download-Image.png', 'Logo-PNG-Download-Image.png');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `ppdb_id` int(11) NOT NULL,
  `nisn` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nama_panggilan` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `jenkel` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `asal_sekolah` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nama_ayah` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nama_ibu` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `jurusan` varchar(25) DEFAULT NULL,
  `foto_siswa` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `foto_ijazah` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `status_pembayaran` varchar(11) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `jenis_tinggal` varchar(25) DEFAULT NULL,
  `transportasi` varchar(10) DEFAULT NULL,
  `kewarganegaraan` varchar(15) DEFAULT NULL,
  `anak_keberapa` varchar(5) DEFAULT NULL,
  `jumlah_kandung` varchar(5) DEFAULT NULL,
  `jumlah_tiri` varchar(5) DEFAULT NULL,
  `jumlah_angkat` varchar(5) DEFAULT NULL,
  `yatim_piatu` varchar(15) DEFAULT NULL,
  `bahasa` varchar(15) DEFAULT NULL,
  `jarak_tempuh` varchar(15) DEFAULT NULL,
  `golongan_darah` varchar(5) DEFAULT NULL,
  `penyakit_diderita` varchar(50) DEFAULT NULL,
  `kelainan_jasmani` varchar(50) DEFAULT NULL,
  `tinggi_berat` varchar(25) DEFAULT NULL,
  `gelombang_id` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `status_ujian_proses` int(11) DEFAULT NULL,
  `status_ujian_selesai` int(11) DEFAULT NULL,
  `benar` varchar(15) DEFAULT NULL,
  `salah` varchar(15) DEFAULT NULL,
  `nilai` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`ppdb_id`, `nisn`, `password`, `nama_lengkap`, `nama_panggilan`, `tgl_lahir`, `tmp_lahir`, `jenkel`, `asal_sekolah`, `nama_ayah`, `nama_ibu`, `alamat`, `no_telp`, `jurusan`, `foto_siswa`, `foto_ijazah`, `bukti_pembayaran`, `status_pembayaran`, `tgl_daftar`, `agama`, `jenis_tinggal`, `transportasi`, `kewarganegaraan`, `anak_keberapa`, `jumlah_kandung`, `jumlah_tiri`, `jumlah_angkat`, `yatim_piatu`, `bahasa`, `jarak_tempuh`, `golongan_darah`, `penyakit_diderita`, `kelainan_jasmani`, `tinggi_berat`, `gelombang_id`, `status`, `status_ujian_proses`, `status_ujian_selesai`, `benar`, `salah`, `nilai`) VALUES
(15, '111111', '$2y$10$iG6i.BMsHpr4xQUEq6fnhOrWShg/EgVmXLjj/BB6HUwNEXERO4FxC', 'Ogeekz', 'Gek', '1992-02-22', 'Jepang', 'Laki-Laki', 'Demo', 'Demo', 'Demo', 'Demo', '082222222222', 'IPA', 'Ogeekz_111111.png', 'Ijazah_111111.png', 'bukti_pembayaran_111111.jpg', '1', '2022-12-29', 'Islam', 'Bersama Orangtua', 'Mobil', 'Indonesia', 'Demo', 'Demo', 'Demo', 'Demo', 'Demo', 'Demo', '3 KM', 'O', 'Demo', 'Demo', 'Demo', 1, 'Proses', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `soal_ujian`
--

CREATE TABLE `soal_ujian` (
  `id_soal_ujian` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `d` text NOT NULL,
  `e` text NOT NULL,
  `kunci_jawaban` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal_ujian`
--

INSERT INTO `soal_ujian` (`id_soal_ujian`, `id_kategori`, `pertanyaan`, `a`, `b`, `c`, `d`, `e`, `kunci_jawaban`) VALUES
(3, 1, 'Berapa 1000 - 7 ?        ', '6', '4', '15', '3', '993', 'E'),
(4, 1, ' Berapa hasil 1 x 4 ? ', '4', '501', '582', '692', '589', 'A'),
(5, 1, 'Berapa hasil 3x3 ?', '9', '4', '1', '6', '2', 'A'),
(7, 1, '  Hasil dari 18 : ?3 adalah ?', '6?3   ', '8?38?3', '. 6/3 ?3', '8/3 ?3', '7?3', 'A'),
(8, 1, '  Hasil dari 3?40 ? ?2 x 2?5 adalah', '40', '50', '55', '60', '65', 'D'),
(9, 1, ' Suku ke-3 dan ke-9 dari suatu barisan aritmetika berturut-turut adalah 15 dan 39. Suku ke-50 dari barisan aritmetika tersebut adalah', '210', '280', '203', '215', '290', 'C'),
(10, 1, ' Seorang peternak sapi mempunyai persediaan makanan untuk 40 ekor sapi selama 15 hari. Jika peternak tersebut membeli 10 ekor sapi lagi, maka persediaan makanan itu akan habis dalam waktu', '10 Hari', '12 hari', '20 hari', '15 hari', '11 hari', 'B'),
(11, 1, '  Parlin dapat menyelesaikan pekerjaan mengecat sebuah gedung dalam waktu 30 hari sementara Yani dapat menyelesaikannya dalam waktu 20 hari. Jika mereka bersama-sama mengerjakan pekerjaan pengecatan gedung itu maka waktu yang diperlukan untuk menyelesaikan pekerjaan tersebut adalah', '10 hari', '15 hari', '20 hari', '12 hari', '25 hari', 'D'),
(12, 1, ' Bentuk sederhana dari 9y²-4xy+5y+7y²+3xy adalah', '13y²-xy+5y', '17y²-xy+5y', '16y²-xy+5y', '15y²-xy+5y', '14y²-xy+5y', 'C'),
(13, 1, ' Diketahui A = { kopi, teh, susu, jahe }. Banyaknya himpunan bagian dari himpunan A adalah ', '4', '8', '16', '32', '48', 'C'),
(14, 1, ' Nilai y dari sistem persamaan 2x + 3y = 11 dan x – y = 3 adalah ', '1', '2', '3', '5', '4', 'A'),
(15, 1, ' Persamaan garis yang melalui titik (-3, 2) dan (1, 10) adalah', '2y – x = 8', '2y – x = 9', '2y – x = 10', 'y + x = 8', 'y – x = 8', 'D'),
(16, 1, ' Jika x – 4 = 11, maka nilai x + 6 adalah', '20', '21', '22', '23', '24', 'B'),
(17, 1, '  Diketahui f (x) fungsi linear. Jika , nilai ƒ(3) adalah', '1', '3', '5', '-1', '8', 'D'),
(18, 1, ' Diketahui rumus fungsi Jika f (1) = 4 dan f (3) = 14, maka nilai f (-2) adalah ', '1', '-11', '10', '7', '5', 'B'),
(19, 1, ' Sebuah kerucut mempunyai jari-jari alas dengan panjang 5 cm dan panjang garis pelukis 13 cm. Tinggi kerucut tersebut adalah', '10cm', '12cm', '15cm', '16cm', '11cm', 'B'),
(20, 2, ' Tujuan dari teks laporan ialah …\n', 'memberikan informasi halusinasi', 'Memberikan informasi secara umum untuk pembaca', 'ntuk memberikan berbagai penjelasan mengenai tentang suatu perisiwa', 'pembukuan dari peristiwa', 'semua benar', 'B'),
(21, 2, ' Salah satu struktur teks laporan yaitu …', 'kesimpulan umum', 'Daftar Isi CEK', 'teori', 'klarifikasi umum', 'Narasi', 'D'),
(22, 2, ' Struktur dalam wawancara dibawah kecuali …', 'awal wanwancara', 'tengah wawancara', 'akhir wawancara', 'waktu wawancara', 'semua salah', 'D'),
(23, 2, ' erhatikan susunan dari kalimat berikut!\nAkibat yang terjatuh dari pohon terjadi 10 tahun yang lalu telah membuatnya buta.\nKata cetak tebal bisa disubtitusikan dengan …\n', ' Kehilangan penglihatannya', 'Kehilangan indra lihat', 'Kehilangan pendengarannya', 'Kehilangan mulut', 'Kehilangan akal', 'A'),
(24, 2, ' Struktur dari teks pidato kecuali …', 'isi pidato', 'pembukaan', 'penutup', 'Daftar Isi', 'Daftar Pustaka', 'D'),
(25, 2, ' Teks deskripsi adalah …', ' teks yang menggambarkan sebuah objek', 'teks yang berisikan riwayat hidup', 'teks yang memiliki sifat laporan', 'teks yang merupakan jalan hidup seseorang', 'Rangkuman', 'A'),
(26, 2, ' Struktur teks deskprisi ialah …', 'indentifikasi dan deskripsi', 'narasi dan komedi', 'narasi dan deskripsi', 'indentifikasi dan narasi', 'Narasi', 'A'),
(27, 2, ' Pantun yang isinya mengeai tentang cerita anak-anak ialah ….', 'pantun jenaka', 'pantun anak-anak', 'pantun kasih sayang', 'pantun adat istiadat', 'Pantun cinta', 'B'),
(28, 2, ' Siapa yang memiliki suatu karya Gurindam Dua Belas yang terkenal yaitu ….', 'Hamjah Fansuri', 'Raja Ali Haji', ' Amir Hamzah', 'Udin', 'Yanto', 'B'),
(29, 2, ' Berikut ini siapa yang akan membuat karya sastra dengan judul syair Dagang …', 'Hamzah Fansuri', 'Roma Irama', 'Hamzah Alya', 'Sugito', 'Rita', 'A'),
(30, 2, ' Kata “banting tulang” maknanya ….', 'kerja keras', 'malas', 'ngantuk', 'pesimis', 'Lemah', 'A'),
(31, 2, ' Apa arti dari kata “meja hijau”…', 'pengadilan', 'pengadilan', 'rumah sakit', 'Klinik', 'Mall', 'A'),
(32, 2, ' Andira naik pitam pada saat tahu Resti telah membohonginya?\nMakna ungkatan naik pitam ialah…', 'Darah tinggi', 'Makan darah', 'Tidak peduli', 'Marah', 'Kesal', 'D'),
(33, 2, ' kata yang memiliki makan menghubungkan kata-kata serta ungkapan-ungkapan kalimat adalah …', 'kalimat konjungsi', ' kalimat tanya', 'kalimat majemuk', 'kalimat pernyataan', 'kalimat Campur', 'A'),
(34, 2, ' Susunan sebuah kalimat yang benar ialah …', 's-p-o-k', 's-k', 'o-s', 'p-k-o-s', 'k-o-p-s', 'A'),
(35, 2, ' Disebut apa kalimat utama di awal kalimat?', 'deduktif', 'Induktif', 'Mix', 'Prakarsa', 'Campur', 'A'),
(36, 2, ' Bersenjata yang keahliannya untuk berbicara didepan orang banyak. Sekarang Bu Sandra Saputri telah berhasil menjadi penyiar terkenal. Dia telah hadir dan muncul di berbagai saluran televisi sebagai pengisi acara. Yang paling membanggakan ialah ketika dia diminta bekerja dengan menjadi moderator di Istana Negara.\nTanda dari dalam kutipan biografi di atas ialah?', 'Keras Kepala', 'Bijaksana', 'dengan Berani', 'Rajin', 'Patuh', 'D'),
(37, 1, ' Sepasang roti dibagi 3 sama besar, maka tiap bagian bernilai …', '1/8', '3', '1/3', '4/8', '3/1', 'C'),
(38, 1, ' 25% jika diubah ke bentuk pecahan biasa menjadi …', '2/5', '1/5', '1/2', '1/4', '5/2', 'D'),
(39, 1, ' Pasangan pecahan yang senilai adalah …', '1/3 dan 2/8', '2/4 dan 4/12', '2/6 dan 3/15', '6/8 dan 9/12', '6/8 dan 4/12', 'D'),
(40, 1, ' Nilai pecahan dari 0,25 adalah …', '1/4', '1/5', '1/2', '2//5', '3/1', 'A'),
(41, 1, ' 25% dari 120 adalah …\n', '20', '40', '30', '50', '60', 'C'),
(42, 1, ' ¾ apabila dijadikan sebagai pecahan decimal yaitu…\n', '0,75', '0,30', '0,40', '0,25', '0,50', 'A'),
(43, 1, ' Hasil dari penjumlahan bilangan pecahan ½ + 3/8 adalah…', '4/10', '7/8', '3/8', '4/8', '5/10', 'B'),
(44, 1, ' Bentuk persen dari 0,5 adalah …', '20%', '50%', '40%', '30%', '60%', 'B'),
(45, 1, ' 9/4, ¾, 5/4, 7,4. Dari pecahan tersebut, manakah yang pecahan terbesar?', '9/4', '5/4', '3/4', '7/4', '4/4', 'A'),
(46, 1, ' Pecahan biasa dari 0,30 yaitu…', '3/100', '30/100', '0/30', '3/4', '1/2', 'B'),
(47, 3, ' Kelompok bakteri yang dikenal dengan ”nenek moyang bakteri” yaitu ….', 'Bakteri biru', 'Archaeobacteria', 'Cyanobacteria', 'Eubacteria', 'Bakteri ungu', 'B'),
(48, 3, ' Golongan bakteri yang umum ditemukan di alam yaitu ….\n', 'bakteri biru', 'Archaeobacteria', 'Cyanobacteria', 'Eubacteria', 'bakteri ungu', 'D'),
(49, 3, ' Bakteri dapat melakukan reproduksi secara seksual dengan cara ….', 'proliferasi', 'membentuk spora', 'pembelahan biner', ' konjugasi', 'fragmentasi', 'D'),
(50, 3, '  Di bawah ini yang bukan termasuk ciri dari kingdom Monera yaitu ….', 'selnya eukariot', 'selnya prokariot', ' tidak mempunyaimembran inti', 'tidak mempunyai organel sel', 'berkembang biak secara mitosis', 'A'),
(51, 3, ' Budi melakukan pengamatan terhadao ganggang biru. Berdasarkan pengamatannya, dia menemukan tanda-tanda ganggang biru antara lain : berbentuk benang, dapat bergerak, dan memiliki sel yang pipih. Jadi, dia berkesimpulan bahwa ganggang biru ini merupakan ….\n', 'Chroococcus', 'Ochromonas', 'Oscillatoria', 'Nostoc', ' Anabaena', 'C'),
(52, 3, ' Bakteri yang bisa menambat nitrogen yang ada di udara yaitu ….', 'Eleocapsa', 'Oscillatoria sp.', 'Rivularia sp.', 'Nostoc linckii', 'Stigonema sp.', 'D'),
(53, 3, ' Persenyawaan antara polisakarida dan protein yang merupakan penyusun dinding sel bakteri dinamakan ….', 'makrobakteriofag', 'mikrobakteri', 'peptidoglikon', 'bakteriofag', 'makrobakteri', 'C'),
(54, 3, ' Proses menempelnya dua sel untuk memindahkan materi genetik antara kedua sel itu dinamakan ….', 'adsorpsi', 'fertililisasi', 'perakitan', 'injeksi', 'konjugasi', 'E'),
(55, 3, ' Bakteri yang dapat mengubah bahan anorganik menjadi bahan organik yang dibutuhkan oleh tubuh dinamakan bakteri ….', 'gram negatif', 'autotrof', 'aerob', 'heterotrof', 'anaerob', 'B'),
(56, 3, ' Makhluk hidup yang tidak mampu membuat makanan sendiri sehingga dia mendapatkan makanan dari makhluk hidup lain atau lingkungannya yaitu ….\n', 'bakteri', 'autotrof', 'aerob', 'heterotrof', 'anaerob', 'D'),
(57, 3, ' Proses pernapasan bakteri yang menggunakan oksigen bebas untuk pernapasannya dilakukan oleh ….', 'bakteri gram negatif', 'autotrof', 'aerob', 'heterotrof', 'anaerob', 'C'),
(58, 3, ' Proses pernapasan bakteri yang tidak memerlukan oksigen bebas untuk pernapasannya dilakukan oleh ….', ' bakteri gram negatif', 'bakteri autotrof', 'bakteri aerob', 'bakteri heterotrof', 'bakteri anaerob', 'E'),
(59, 3, ' Bakteri gram positif merupakan bakteri yang masuk dalam kelompok ….', 'Monera', 'Eubacteria', 'Protista', 'Archaeobacteria', 'Fungi', 'B'),
(60, 3, ' Ganggang biru berkembang biak dengan pembentukan spora dan fragmentasi yang dilakukan dengan cara ….', 'pendinginan', 'pembelahan sel', 'fragmentasi', ' konjugasi', 'pembentukan spora', 'D'),
(61, 3, ' Proses pembebasan alat dan bahan makanan dari mikroorganisme bisa dilakukan melalui ….', 'pendinginan', 'perebusan', 'sterilisasi', 'pencucian', 'pemanasan', 'C'),
(62, 3, ' Di bawah ini yang tidak termasuk dalam kelompok Achaebacteria yaitu ….', 'halobakteriofag', 'bakteri metanogen', ' bakteri termo-asidofil', 'halobakteri', 'bakteriofag', 'E'),
(63, 3, ' Cara reproduksi yang tidak dilakukan oleh ganggang biru yaitu….\n', 'perkawinan', 'fragmentasi', 'pembentukan kuncup', 'membentuk spora', 'pembelahan', 'A'),
(64, 3, ' Salah satu Eubacteria yang dapat hidup di atas tanah, di tempat lembap, tembok, parit, sawah, atau laut, serta memiliki klorofil a untuk fikosianin dan fotosintesis yaitu ganggang ….', 'cokelat', 'merah', 'hijau', 'biru', 'pirang', 'D'),
(65, 3, ' Ciri yang dapat membedakan antara ganggang biru dan bakteri yaitu …', 'ganggang biru bergerak, bakteri tidak bergerak', ' bakteri dapat melakukan pembelahan sel, ganggang biru tidak', ' ganggang biru bersifat autotrof, bakteri umumnya bersifat heterotrof', 'bakteri hidup bersimbiosis, ganggang biru tidak', 'ganggang biru mempunyai membran inti , bakteri tidak mempunyai membran inti', 'C'),
(66, 3, ' Bakteri dengan flagel menyebar di seluruh permukaan sel dinamkan…', 'lisotrik', 'subpolar', 'monorik', ' lofotrik', 'peritrik', 'E'),
(67, 4, ' Pengukuran adalah..', 'Sesuatu yang dapat diukur dan hasilnya selalu dapat dinyatakan dengan angka', 'Proses membandingkan besaran yang diukur dengan besaran sejenis yang digunakan sebagai patokan ', 'Sebuah alat yang digunakan untuk mengukur benda', 'Cara pendekatan untuk memperoleh persamaan garis dari seuah grafik hasil eksperimen', 'Aturan dalam penulisan karya ilmiah', 'B'),
(68, 4, ' Berikut ini yang termasuk dalam macam-macam bentuk grafik, kecuali..', 'Garis lurus', 'Parabola', 'Segitiga', 'Hiperbola', 'Eksponensial', 'C'),
(69, 4, ' Kuintal, ton, hektar adalah contoh nama satuan dari..\n', 'Industri makanan', 'Penerbangan', 'Pertanian', 'Kedokteran', 'Pelayaran', 'C'),
(70, 4, ' Angka ketelitian yang terdapat pada alat ukur jangka sorong ialah..', '0,1 km', '0,1 hm', '01, m', '0,1 cm', '0,1 mm', 'E'),
(71, 4, '  Ada berapa aturan perhitungan angka penting?', '1', '2', '3', '4', '5', 'B'),
(72, 4, ' Bagian utama pada micrometer sekrup adalah..', 'Landasan', 'Skala utama', 'bidal', 'Poros berulir', 'Roda gigi', 'D'),
(73, 4, ' ? adalah symbol..', 'Besaran yang diukur', 'Nilai besaran', 'waktu', 'kalor ', 'massa', 'A'),
(74, 4, ' Semua angka yang bukan angka 0 adalah..', 'Angka penting ', 'Symbol', 'Smartart', 'Chart', 'Shape', 'A'),
(75, 4, ' Yang termasuk dalam bagian jangka sorong adalah..\n', 'Rahang tetap', 'Skala nonius', 'Rahang geser', 'Rahang pengukur diameter dalam', 'benar semua', 'E'),
(76, 4, ' Aturan perhitungan angka penting yang kedua adalah..', 'Semua angka yang bukan angka 0 adalah angka penting', 'Hasil penjumlahan dan pengurangan hanya mempunyai satu angka penting yang diragukan', 'Deretan angka 0 yang terletak di sebelah kanan angka bukan 0 adalah angka penting, kecuali ada penjelasan lain', 'Hasil perkalian atau pembagian bilangan-bilangan penting menghasilkan bilangan penting paling sedikit angka pentingnya dari bilangan yang terlibat pada operasi perkalian atau pembagian ', 'Angka 0 yang terletak di antara dua angka yang tidak 0 adalah angka penting', 'D'),
(77, 4, ' Neraca adalah alat ukur yang digunakan untuk mengukur..', 'Panjang benda', 'Lebar benda', 'Massa benda', ' Waktu', 'Kalori', 'C'),
(78, 4, ' Data hasil pengukuran besaran fisika dapat dinyatakan dalam bentuk..\n', 'Chart', 'Table', 'Grafik', 'Date', 'Symbol', 'C'),
(79, 4, ' Yang termasuk dalam sumber ketidakpastian alat ukur adalah..', 'Kesalahan acak', 'Skala terkecil alat ukur', 'Kesalahan bersistem', ' Keterbatasan pengamat', 'Benar semua', 'E'),
(80, 4, ' Pengukuran yang hasilnya langsung dapat diperoleh melalui pembacaan skala alat ukur adalah..\n', 'Pengukuran besaran', 'Pengukuran langsung ', 'Pengukuran volume benda', 'Pengkuran massa benda', 'Pengukuran panjang benda', 'B'),
(81, 4, ' Sejumlah alat ukur memiliki 2 tipe, yaitu..\n', 'Langsung', 'Analog', 'Digital', ' Virtual', 'Jawaban b dan c benar ', 'E'),
(82, 4, ' Yang tidak termasuk bagian neraca tiga lengan adalah..', 'Lengan belakang', 'Tempat beban', 'Beban gantung', 'Skala nonius ', 'Lengan belakang', 'D'),
(83, 4, ' Nilai besaran pada alat ukur digital dapat diperoleh dengan..\n', 'Tak terbaca', 'Akurat', 'Mudah', 'Sulit', 'Salah semua', 'C'),
(84, 4, ' Alat untuk mengukur massa benda adalah..', 'Timbangan', 'Penggaris', ' Jangka sorong', ' Micrometer sekrup', 'Stopwatch', 'A'),
(85, 4, ' Stopwatch adalah alat ukut untuk mengukur..\n', 'waktu', 'panjang', 'lebar', 'massa', 'benar semua', 'A'),
(86, 4, ' kkal pengertian dari..', 'kilogram', 'kilometer', 'kilo kalori', 'kwintal ', 'knot', 'C'),
(87, 5, ' Kitab Weda ditulis dengan Bahasa Sansekerta yang hanya dipahami oleh kaum', 'Brahmana', 'ksatria', 'waisya', 'sudra', 'pedagang', 'A'),
(88, 5, ' Menurut teori Ksatria, agama Hindu dibawa ke Indonesia oleh kaum…..\n', 'Brahmana', 'ksatria', 'waisya', 'sudra', 'pedagang', 'B'),
(89, 5, ' Orang-orang yang tergolong dalam Kasta Sudra adalah….\n', 'raja', 'bangsawan', 'pedagang', 'prajurit perang', 'kaum buangan', 'E'),
(90, 5, ' Teori arus balik dicetuskan oleh….\n', 'C.C. Berg   ', 'Dr. N. J. Krom   ', 'Van Leur', 'F.D.K Bosch', 'Moens dan Bosch', 'D'),
(91, 5, ' Agama yang memiliki usia terpanjang dan merupakan agama pertama dikenal manusia\nadalah….\n', 'Islam', 'Hindu', 'Budha', 'Kristen', 'Katholik', 'B'),
(92, 5, ' Berikut empat fase perkembangan agama Hindu di India, kecuali….\n', 'Zaman Weda   ', 'Zaman Brahmana   ', 'Zaman Upanisad   ', 'Zaman Buddha   ', 'Zaman Sudra   ', 'E'),
(93, 5, ' Zaman pengembangan dan penyusunan falsafah agama, yaitu zaman orang berfilsafat atasdasar Weda adalah….\n', 'Zaman Weda   ', 'Zaman Brahmana', 'Zaman Upanisad', 'Zaman Buddha   ', 'Zaman sudra', 'C'),
(94, 5, ' Teori Brahamana diprakarsai oleh….\n', 'C.C. Berg   ', 'Dr. N. J. Krom   ', 'Van Leur', 'F.D.K Bosch', 'Moens dan Bosch', 'C'),
(95, 5, ' Agama Hindu muncul di Indonesia pada tahun …. SM.\n', '± 1500   ', '± 500', '± 3500   ', '± 2000', '± 1000   ', 'A'),
(96, 5, ' Hubungan dagang antara masyarakat Nusantara dengan para pedagang dari wilayah HinduBuddha menyebabkan adanya….\n', 'asimilasi budaya   ', 'akulturasi budaya   ', 'konsilidasi budaya   ', 'adaptasi budaya   ', 'koalisi budaya ', 'A'),
(97, 5, ' Berikut raja-raja yang pernah memerintah Kerajaan Mataram Kuno di Jawa Timur, kecuali….\n', 'Sri Isanatunggawijaya   ', 'Purnawarman   ', 'Dharmawangsa   ', 'Airlangga   ', 'Empu Sendok   ', 'B'),
(98, 5, ' Prasasti pertama yang berkaitan erat dengan kerajaan Hindu ditemukan pertama kali di….\n', 'Kalimantan', 'Jawa Barat', 'Kutai', 'Cina', 'Jawa tengah', 'C'),
(99, 5, ' Prasasti Dinoyo yang ditemukan di Jawa Timur dekat Kota Malang memakai huruf Jawa Kuno\nmenggunakan bahasa…..\n', 'Jawa', 'Arab', 'Melayu', 'Sansekerta', 'Indonesia', 'D'),
(100, 5, ' Penyebab kemunduran Kerajaan Sriwijaya adalah….\n', 'Sikap toleransi antara pemeluk agama Hindu dan Buddha   ', 'raja-rajanya yang arif dan bijsaksana   ', 'bantuan dari kerajaan Singasari yang menjalin hubungan dengan kerajaan Melayu   ', 'banyak kerajaan taklukan Sriwijaya yang melepaskan diri dari kekuasaannya.   ', 'kerja sama dengan kerajaan Colamandala dari India.  Halam   ', 'D'),
(101, 5, ' Salah satu kerajaan Hindu di Indonesia adalah….\n', 'Holing', 'Sriwijaya', 'Melayu', 'Tarumanegara', 'Samudera Pasai', 'D'),
(102, 5, ' Prasasti tertua tentang Sriwijaya ditemukan di….\n', 'Kotakapur', 'Talang Tuo', 'Bangka', 'Palas Basemah', 'Kedukan Bukit', 'E'),
(103, 5, ' Kerajaan Hindu tertua di Indonesia adalah….\n', 'Demak', 'Kutai', 'Sriwijaya', 'Samudera Pasai', 'Mataram', 'B'),
(104, 5, ' Kerajaan bercorak Buddha di Indonesia adalah….\n', 'Kahuripan', 'Majapahit', 'Sriwijaya', 'Tarumanegara', 'Kutai', 'C'),
(105, 5, ' Masuknya agama Hindu ke Indonesia terjadi pada abad ke…. Masehi\n', '2', '3', '4', '5', '6', 'C'),
(106, 5, ' Berikut yang bukan merupakan faktor pendorong berkembangnya Kerajaan Mataram Kuno adalah…\n', 'raja-rajanya arif dan bijaksana   ', 'toleransi yang tinggi antara pemeluk agama Hindu dan Buddha   ', 'wilayah yang amat subur   ', 'ada kerja sama yang baik antara raja dan para Brahmana   ', 'semangat kebudayaan raja-raja Mataram Kuno yang rendah    ', 'E'),
(107, 6, ' Beberapa tahun terakhir, wilayah pantai Barat Sumatera telah mengalami beberapa kali gempa tektonik. Apabila dilihat dari struktur geologinya wilayah tersebut berada di zona tumbukan lempeng. Prinsip geografi yang dipakai untuk mengkaji fenomena tersebut yaitu prinsip....', 'Korologi', ' persebaran', 'interelasi', 'distribusi', 'deskripsi', 'B'),
(108, 6, ' Pak Abdul adalah pengusaha dari Surabaya yang mempunyai lahan seluas 2 Ha di aderah Surabaya yang dijadikan sebagai tempat peristirahatan. Sedangkan Pak Budi juga mempunyai lahan 1 ha di samping tanah Pak Seno yang ditanami dengan palawija untuk kebutuhan hari-hari. Salah satu konsep geografi yang digunakan untuk mengkaji fenomena tersebut yaitu konsep ....\n', 'aglomerasi', 'pola ', 'keterjangkauan', 'morfologi', 'nilai kegunaan', 'E'),
(109, 6, ' Banjir yang kerap kali terjadi di pemukiman penduduk daerah perkotaan terjadi karena dasar sungai semakin dangkal. Pendangkalan sungai terjadi akibat adanya penduduk yang membuang sampah ke sungai. Pendekatan geografi untuk mengkaji hal tersebut yaitu pendekatan ....', 'Kompleks wilayah', 'Keruangan', 'Korologi', 'Ekologi', 'Kewilayahan', 'D'),
(110, 6, ' Benua-benua yang ada di Bumi sampai sekarang masih terus bergerak. Hal tersebut dibuktikan dengan....', 'dasar samudera semakin dekat ke permukaan', ' pematang tengah samudera semakin melebar', 'pergeseran magma yang keluar dari gunung api', 'kawasan Kutub semakin melebar', 'adanya gerakan tanah dengan ekshalasi magma', 'B'),
(111, 6, ' Menurut teori Kabut Kant-Laplace, proses pembentukan Tata surya yaitu....', 'adanya gravitasi dari bintang yang meledak di sekeliling Matahari dan membeku', 'terjadinya ledakan yang hebat suatu massa yang besar dan bertenaga tinggi', 'sebuah kabut dengan inti yang dingin berputar secara cepat dan membeku', 'adanya perputaran kabut bola yang panas dan lambat makin lama semakin cepat', 'terjadi gaya tarik menarik antar inti sehingga sebagian terlepas dari inti tersebut', 'D'),
(112, 6, '  Dalam geografi, elemen yang sama menurut para ahli yaitu sebagai berikut, kecuali…', 'makna wilayah bagi manusia', 'bumi sebagai tempat tinggal', 'dimensi ruang dan dimensi historis', 'hubungan manusia dengan lingkungan', 'pendekatan spasial, ekologi, dan regional', 'A'),
(113, 6, '  Indonesia adalah hasil dari pertemuan dari tiga lempeng besar, antara lain ….', 'lempeng Jawa, Sulawesi, dan Pasifik', ' lempeng Samudera Hindia-Australia, Pasifik, dan Asia Tenggara', ' lempeng Papua, Pasifik, dan Australia', 'lempeng Asia Selatan, Pasifik, dan Lempeng Samudera Hindia-Australia', ' lempeng Pasifik, China, dan Australia', 'B'),
(114, 6, ' Ciri bentang alam muka bumi pada lereng perbukitan sebagai akibat proses luncuran batu-batuan (debris avalance) diperlihatkan oleh kenampakan ….', 'dataran nyaris', 'dataran fluvial', 'erosi tebing', 'kipas aluvial', ' longsor lahan', 'E'),
(115, 6, '  Proses pembentukan embun selalu terjadi pada malam dan pagi hari, hal tersebut ada hubungannya dengan kondisi cuaca dan iklim, yaitu…', ' belum ada angin berembus', 'belum ada sinar matahari', 'tekanan udara rendah', 'udara jenuh terlampaui', 'kecepatan angina rendah', 'D'),
(116, 6, '  Suatu tanah luas yang ditumbuhi oleh tumbuh-tumbuhan rumput serta dikelilingi oleh tumbuh-tumbuhan perdu dinamakan…', 'tundra', 'gurun', 'stepa', 'sabana', 'hutan', 'D'),
(117, 6, '  Peristiwa gempa bumi, gunung meletus, dan tanah longsor sering terjadi di daerah Indonesia. Hal tersebut adalah contoh aspek geosfer pada lapisan ….', 'antroposfer', 'atmosfer', 'hidrosfer', 'lithosfer', 'biosfer', 'D'),
(118, 6, ' Daerah pantai sering dilanda banjir pasang atau rob. Kondisi tersebut dimanfaatkan masyarakat untuk usaha pertambakan. Pendekatan geografi untuk menganalisis hal tersebut yaitu pendekatan  ….', 'kewilayahan', 'spasial', 'keruangan', 'ekologi', 'kelingkungan', 'A'),
(119, 6, ' Tanah gersang dalam pertanian kurang bermanfaat karena ….', 'kandungan hara minim dan air banyak', 'curah hujan rendah dan kandungan hara tinggi', ' kandungan hara dan curah hujan sedikit', 'daerah berelief curam dan drainase baik', ' terasering menghambat air dan drainase kurang', 'C'),
(120, 6, ' Perhatikan pernyataan di bawah ini.\n(1) jenis tanaman\n(2) kesuburan tanah\n(3) iklim\n(4) ketinggian tempat\n(5) keadaan air\n(6) pupuk\nFaktor-faktor yang menyebabkan flora dan fauna tumbuh tidak merata di bumi Indonesia adalah ….', '(2), (4), (5), (6)', '(1), (2), (3), (4)', '(1), (3), (5), (6)', '(1), (3), (4), (6)', '(2), (3), (4), (5)', 'E'),
(121, 6, ' Berdasarkan gambar pergerakan lempeng tektonik yang akan membentuk benua Asia yaitu nomor ….', 'I', 'II', 'III', 'IV', 'V', 'E'),
(122, 6, ' Perhatikan pernyataan di bawah ini!\n(1) adanya pegunungan Himalaya\n(2) bentuk pantai Amerika Selatan sama dengan pantai barat Afrika\n(3) adanya pegunungan Sirkum Pasifik\n(4) adanya pantai laut dalam\n(5) Greenland bergerak menjauhi Eropa\nBukti teori apungan oleh Wegener ditunjukkan nomor ….', '(1) dan (2)', '(3) dan (4)', '(1) dan (5)', '(4) dan (5)', '(2) dan (5)', 'E'),
(123, 6, '  Perhatikan pernyataan di bawah ini!\n(1) reboisasi\n(2) ekstensifikasi\n(3) diversifikasi\n(4) penghijauan\n(5) intensifikasi\nUsaha pemanfaatan lingkungan hidup yang bisa dilakukan untuk meningkatkan produksi di bidang pertanian yaitu nomor ….', ' (1), (2), dan (3)', '(2), (4), dan (5)', '(1), (3), dan (4)', '(3), (4), dan (5)', '(2), (3), dan (5)', 'E'),
(124, 6, '  Lapiasan atmosfer yang mempunyai peran dalam memancarkan gelombang pendek radio terjadi pada lapisan yang ditunjukkan nomor ….', '1', '4', '2', '5', '3', 'B'),
(125, 6, ' Perhatikan pernyataan di bawah ini!\n(1) menggunakan teknologi yang tidak ramah pada lingkungan\n(2) menggunakan bahan tambang sebanyak-banyaknya\n(3) reklamasi dan rehabilitasi lahan kritis\n(4) pengembangan dan pengelolaan keanekaragaman hayati\nTindakan yang mencerminkan pem-bangunan berkelanjutan adalah nomor ….', '(1) dan (2)', ' (2) dan (4)', '(1) dan (3)', '(3) dan (4)', ' (2) dan (3)', 'D'),
(126, 6, '  Pabrik minuman yang berlokasi di Ungaran mengalami perkembangan yang pesat. Hal tersebut dikarenakan oleh faktor-faktor pendorong industri utama yaitu ….\n', 'otonomi daerah, pegunungan, dan sarana yang cukup', 'tenaga kerja, modal, dan daya beli rendah', 'modal, tenaga ahli, dan relief tanah', 'bahan mentah, tenaga kerja, dan pemasaran', 'iklim sejuk, kesuburan tanah, dan kebudayaan', 'D'),
(127, 6, ' Ciri iklim Koppen yang terdiri dari : rata-rata curah hujan tahunan > 60 mm, temperatur bulan terdingin tidak kurang dari 180C, dan tumbuhan beraneka ragam. Jenis iklim yang sesuai dengan ciri-ciri tersebut yaitu ….\n', 'iklim A', 'iklim D ', 'iklim B', 'iklim E', 'iklim C', 'A'),
(128, 6, ' Desa Spasial merupakan data grafis yang mengidentifikasi kenampakan yang menunjukkan keruangan, lokasi, atau tempat-tempat di permukaan bumi. Model data yang dibentuk oleh kemampuan sel atau piksel (picture element) dengan bentuk grid dan setiap piksel mempunyai referensi. Model data tersebut dinamakan ….', 'data vektor', 'data kuantitatif', 'data atribut', 'data raster', 'data kualitatif', 'D'),
(129, 7, ' Aprilia : Can you help me to do my English home work?\nJodi : ...English is my favorite subject.\nAprilia : Thank you.', 'Let\'s go', 'I\'m sorry, I can\'t', 'I\'d love to, but I dislike English', 'With pleasure', 'with love', 'D'),
(130, 7, ' Fani : Can you help me, Andi?\nAndi : Sorry,...', 'you\'re welcome', 'you look very busy', ' I\'m busy myself', 'I\'m happy you are busy', 'I\'am so happy', 'C'),
(131, 7, ' Marry :...to Lina\'s birthday party?\nPutri : Of course. I\'ll go there with Raka\nMarry : Thanks a lot', 'Will you come', 'Can you come', 'May you come', 'Don\'t you come', 'Don\'t coming', 'A'),
(132, 7, ' Lina : I want to come to my birthday party tonight.\nAliana : ...I have a lot of of homework.', 'Very good', 'That is a good idea', ' Sorry, I can not', 'I agree with you', 'yes, i agree', 'C'),
(133, 7, ' Mr. Heri : Attention, please!\nArif : Yes, sir.\nThe underline word is expression of...', 'asking opinion', 'giving opinion', 'responding attention', 'Showing appreciation', 'coming on', 'C'),
(134, 7, ' Mrs Rina : May I have your attention, please?\nStudents : ...\nThe best response to complete dialogue above is...', 'Yes, please', 'Yes, Ma\'am', ' Yes, Sir', 'Thank you', 'No, Thank you', 'B'),
(135, 7, ' There are expression of asking attention...', 'Excuse me', 'I know', 'You are amazing', 'I don\'t know', 'No', 'A'),
(136, 7, ' The room is too dark. Please...the lamp.', 'turn down', 'turn on', 'turn over', 'turn off', 'turn in', 'B'),
(137, 7, ' The expressions of ability below is true, except...', 'I could speak English fluency when I was in Australia', ' I am able to sing a asong', ' I am able to read Qur\'an now', 'I can drive a car 2 years ago before got accident', 'i don\'t know', 'D'),
(138, 7, ' Alex : What do you think about the film?\nBram : I think...\nComplete the dialogue above...', 'thank you', 'you forget it', 'I like it', 'I can\'t hear you', 'don\'t forget it', 'C'),
(139, 7, ' This ____ My Brother. ____ name is Ary', ' is / My', 'his / His', 'is / His', 'are / His', 'are/her', 'C'),
(140, 7, ' How old is your uncle ? ” “____ is 20', 'His', 'He', 'He is', 'She is', 'He are', 'B'),
(141, 7, ' They ____ Dika & Jordy. They ____ from Palembang', 'are / Are', ' is / Is', 'are / Is', 'is / Are', 'are/is', 'A'),
(142, 7, ' What ____ your name ? My name ____ Rian', ' is / Your', ' your / Is', ' her / Are', 'his / is', 'his/are', 'B'),
(143, 7, ' This ____ my brother. ____ name is Jhonny\n', 'is / His', ' is / Her', 'are / Her', 'is / Your', 'your / is', 'A'),
(144, 7, ' I have ____ sister. ____name is Nia', 'a / Her', 'an / His', 'a / His', 'a / Our', 'a / her', 'A'),
(145, 7, ' ____ Samuel ____ Brother ?', 'are / Your', 'is / Your', ' are / You are', 'are / Is', 'is / are', 'B'),
(146, 7, ' We ____ Teacher.', 'is', 'am', 'are a', 'are', 'a', 'D'),
(147, 7, ' I ____ ____ Student.', 'am / a', 'are / a', 'is / a', 'am / the', 'is / the', 'A'),
(148, 7, ' Hay! My ____ ____ Siska. I ____ ____ Medan.', 'name is / I am', ' name is / am from', 'name are / am from', 'name are / I from', 'name is/ are', 'B'),
(149, 7, ' He ___ six years old now.', 'are', 'am', 'they', 'is', 'a', 'D'),
(150, 7, ' Hello ____ is your name ?', 'what', 'he', 'him', 'her', 'his', 'A'),
(151, 7, ' ____ name is Samuel. And my ____ is Alex.', 'my / Surname', ' i / Surname', ' i / Name', ' your / Surname', 'your / name', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `nama`, `email`, `password`, `foto`, `active`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$Eio7wfhcRrGwZDE/4D/ehuYw48EG8bjBeHkD137wPcLIodNAvtxhS', 'Fa2H2diXgAA9-kj (1).jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file_pengumuman`
--
ALTER TABLE `file_pengumuman`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jawaban_ujian`
--
ALTER TABLE `jawaban_ujian`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indexes for table `kategori_soal`
--
ALTER TABLE `kategori_soal`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`konfigurasi_id`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`ppdb_id`);

--
-- Indexes for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  ADD PRIMARY KEY (`id_soal_ujian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_pengumuman`
--
ALTER TABLE `file_pengumuman`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jadwal_ujian`
--
ALTER TABLE `jadwal_ujian`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jawaban_ujian`
--
ALTER TABLE `jawaban_ujian`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=406;

--
-- AUTO_INCREMENT for table `kategori_soal`
--
ALTER TABLE `kategori_soal`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `konfigurasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `ppdb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `soal_ujian`
--
ALTER TABLE `soal_ujian`
  MODIFY `id_soal_ujian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
