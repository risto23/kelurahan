-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2017 at 07:33 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kec-panggarangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_balasan_bukutamu`
--

CREATE TABLE `tb_balasan_bukutamu` (
  `id_balasan_bukutamu` int(11) NOT NULL,
  `id_bukutamu` int(11) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  `pesan_balasan` text,
  `date_balasan` date DEFAULT NULL,
  `time_balasan` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_balasan_bukutamu`
--

INSERT INTO `tb_balasan_bukutamu` (`id_balasan_bukutamu`, `id_bukutamu`, `id_login`, `pesan_balasan`, `date_balasan`, `time_balasan`) VALUES
(1, 2, 1, 'Jadilah warga yang baik', '2017-09-18', '17:04:10'),
(2, 3, NULL, NULL, NULL, NULL),
(3, 4, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bukutamu`
--

CREATE TABLE `tb_bukutamu` (
  `id_bukutamu` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `pesan` text,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bukutamu`
--

INSERT INTO `tb_bukutamu` (`id_bukutamu`, `nama`, `pesan`, `date`, `time`) VALUES
(2, 'Sutina', 'Bagaimana menjadi warga yang baik dan benar?', '2017-09-15', '05:00:00'),
(3, 'Zikri', 'Hari ini sangat indah ya?', '2017-09-23', '19:32:27'),
(4, 'Zakir', 'anybody home?', '2017-09-23', '19:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftargarapan`
--

CREATE TABLE `tb_daftargarapan` (
  `id_daftargarapan` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `date_daftargarapan` date NOT NULL,
  `nama_daftargarapan` varchar(150) DEFAULT NULL,
  `sawah_daftargarapan` float DEFAULT NULL,
  `darat_daftargarapan` float DEFAULT NULL,
  `jumlah_daftargarapan` float DEFAULT NULL,
  `status_garapan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftargarapan`
--

INSERT INTO `tb_daftargarapan` (`id_daftargarapan`, `id_login`, `date_daftargarapan`, `nama_daftargarapan`, `sawah_daftargarapan`, `darat_daftargarapan`, `jumlah_daftargarapan`, `status_garapan`) VALUES
(1, 1, '2017-09-23', 'Jain', 1.5, 2, 3.5, 'TANAH MILIK'),
(2, 1, '2017-09-23', 'Mardiat', 1, 1, 2, 'TANAH MILIK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_gallery`
--

CREATE TABLE `tb_gallery` (
  `id_gallery` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `date_gallery` date DEFAULT NULL,
  `img_gallery` varchar(100) DEFAULT NULL,
  `title_gallery` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gallery`
--

INSERT INTO `tb_gallery` (`id_gallery`, `id_login`, `date_gallery`, `img_gallery`, `title_gallery`) VALUES
(1, 1, '2017-09-23', 'Pemerintah Bangun Jembatan Gantung.jpeg', 'Foto 1'),
(2, 1, '2017-09-23', 'Digital NexIcorn.jpeg', 'Foto 2'),
(3, 1, '2017-09-23', 'SEMINAR NASIONAL FINTECH.jpeg', 'Foto 3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hubkami`
--

CREATE TABLE `tb_hubkami` (
  `id_hubkami` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama_hubkami` varchar(100) NOT NULL,
  `date_hubkami` date NOT NULL,
  `alamat_hubkami` text NOT NULL,
  `telp_hubkami` varchar(50) NOT NULL,
  `email_hubkami` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_hubkami`
--

INSERT INTO `tb_hubkami` (`id_hubkami`, `id_login`, `nama_hubkami`, `date_hubkami`, `alamat_hubkami`, `telp_hubkami`, `email_hubkami`) VALUES
(1, 1, 'Kecamatan Panggarangan', '2017-09-23', 'Kecamatan Panggarangan', '02155742560', 'adming@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kajianlaporan`
--

CREATE TABLE `tb_kajianlaporan` (
  `id_rencana` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `date_rencana` date DEFAULT NULL,
  `judul_rencana` varchar(100) DEFAULT NULL,
  `pdf_rencana` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_kajianlaporan`
--

INSERT INTO `tb_kajianlaporan` (`id_rencana`, `id_login`, `date_rencana`, `judul_rencana`, `pdf_rencana`) VALUES
(1, 1, '2017-09-23', 'Tampil Kajian Laporan', '243792527.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `status`, `username`, `password`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `id_news` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `img_news` varchar(100) DEFAULT NULL,
  `judul_news` varchar(50) DEFAULT NULL,
  `date_news` date DEFAULT NULL,
  `news` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`id_news`, `id_login`, `img_news`, `judul_news`, `date_news`, `news`) VALUES
(3, 1, 'Pemerintah Bangun Jembatan Gantung.jpeg', 'Tahun Depan Pemerintah Targetkan Pembangunan 300 J', '2017-09-23', '<p>\n\n</p><p>Sebelum bertolak menuju Kota Cirebon, Presiden Joko Widodo terlebih dahulu meninjau jembatan gantung Mangunsuko, di Desa Mangunsuko, Kecamatan Dukun, Kabupaten Magelang, Senin (18/09/2017). Jembatan sepanjang 120 meter tersebut menghubungkan Desa Mangunsuko dengan Desa Sumber, Kabupaten Magelang.</p><p>Setelah melihat sendiri bagaimana konstruksi dan jembatan tersebut dibangun, Presiden yang didampingi Menteri PU dan Perumahan Rakyat Basuki Hadimuljono mengaku puas dengan pekerjaan yang dilakukan oleh Kementerian Pekerjaan Umum dan Perumahan Rakyat ini. Ia menyebut bahwa jembatan-jembatan serupa itu sangat diperlukan di banyak daerah.</p><p>\"Kebutuhannya ribuan, baik di Jawa atau luar Jawa. Tahun ini kita memang hanya membangun 70-an, tapi tahun depan kita targetkan minimal 300, tahun depannya lagi kita tingkatkan lagi. Karena data yang masuk ke kita ada ribuan permintaan membuat jembatan seperti ini,\" ia menerangkan.</p><p>Pembangunan jembatan-jembatan tersebut memang harus digalakkan. Sebab, wilayah-wilayah yang tadinya terpisahkan kini dapat terhubung dan mendukung mobilitas orang maupun barang dengan lebih efektif dan efisien.</p><p>\"Ini bisa dilewati kendaraan, tentu saja mobilitas orang maupun barang bisa cepat. Kalau tidak kan mutar ke sana berapa puluh kilometer,\" kata Presiden.</p><p>Selain meninjau jembatan gantung Mangunsuko, Presiden juga mendapatkan penjelasan mengenai proyek rumah susun di Kabupaten Magelang. Ia juga menandatangani prasasti pembangunan jembatan gantung Mangunsuko, jembatan gantung Krinjing, ruamh susun di Desa Tanggul Rejo, Desa Gunung Pring, serta Desa Gulon Kabupaten Magelang.</p>\n\n<br><p></p>'),
(4, 1, 'SEMINAR NASIONAL FINTECH.jpeg', 'Menkominfo: Tugas Saya Pastikan Masa Depan Ekonomi', '2017-09-23', '<p>\n<strong>Jakarta, Kominfo</strong>&nbsp;- Menteri Komunikasi dan Informatika Rudiantara menyatakan saat ini di Indonesia terjadi percepatan ekonomi digital. Di tengah percepatan itu, ia menyebut tugas Kementerian Kominfo adalah memastikan arah masa depan dan infrastruktur TIK untuk menopang perkembangan ekonomi digital di Indonesia. \"Tugas saya memastikan masa depan ekonomi digital Indonesia dan infrastruktur TIK tersedia,\" ungkapnya dalam Seminar Nasional bertema Masa Depan Pengembangan Fintech Indonesia, di Bursa Efek Indonesia Jakarta, Rabu (20/9/2017).<div>Menurut Menteri Kominfo saat ini terjadi perpindahan penggunaan jaringan telekomunikasi dari barang ke layanan. \"Secara makro kita sudah berpindah dari goods ke services. Terjadi shifting, dimana saat ini anak muda lebih banyak makan di luar, belanja daring, jalan-jalan ke daerah dan membuat vlog. Inilah kondisi kekinian Indonesia,\" katanya.</div><div>Ditambahkan Menteri Rudiantara tanpa infrastruktur broadband mau bikin aplikasi atau fintech tidak bisa. \"Pemerintah hitung potensi dari bisnis digital yang potensial. Digital ekonomi sendiri didefinisikan sebagai semua aktivitas yang proses bisnisnya berubah menjadi digital dan mempunyai nilai tambah. Ini yang akan mengubah ekonomi Indonesia,\" tambahnya.</div></div><div>Dihadapan peserta seminar, Menteri Kominfo mengajak generasi muda untuk mengubah mindset agar beradaptasi dengan era digital. \"Sebagai anak muda, harus melihat bagaimana mengisi ruang ekonomi digital melalui fintech. Kominfo tidak membuat aturan mengenai fintech, pemerintah hanya memberi koridor. Kalau atur retail pusing, tinta belum kering dinamika sudah berubah,\" katanya.</div><div>Berkaitan dengan Fintech, Menteri Rudiantara mengajak Bank Indonesia (BI) dan Otoritas Jasa Keuangan (OJK) untuk duduk bersama jika terdapat masalah dalam implementasi di lapangan. Fintech sendiri dikatakan oleh Menkominfo sangat bagus bagi Usaha Kecil Menengah (UKM) dan bentuknya bermacam-macam.</div><div>&nbsp;</div><div><strong>Peta Jalan E-Commerce Indonesia</strong></div><div>Menteri Kominfo juga memamparkan  peta jalan e-commrece Indonesia. Dengan Peraturan Presiden Nomor 74 Tahun 2017 tentang Peta Jalan Sistem Perdagangan Nasional Berbasis Elektronik (SPNBE) atau Roadmap e-Commerce, Menteri Rudiantara menyebutnya sebagai regulasi paling transparan. \"Perpres e-commerce ini menjadi regulasi paling transparan karena di dalamnya terlihat kewenangan dan kewajiban KL yang terkait. Ini untuk pastikan aktivitas digital. Pada perpres ini terdapat tujuh isu dan 31 inisiatif,\" ujarnya seraya memerinci tujuh isu tersebut antara lain talent (sumber daya manusia), funding, pajak, &nbsp;logistik, perlindungan konsumen, dan infrastuktur TIK.</div><div>Pada tahun 2030 nanti Indonesia akan menikmati puncak bonus demografi dimana jumlah penduduk usia produktif 2 (dua) kali lebih besar dari yang tidak produktif. \"Untuk itu harus ada keberanian dari pemerintah untuk membuat keputusan dan memastikan masa depan ekonomi digital Indonesia bagi generasi mendatang,\" pungkas Rudiantara. (VE)</div>\n\n<br><p></p>'),
(5, 1, 'Digital NexIcorn.jpeg', 'Menkominfo Targetkan Lahir Satu Unicorn Startup Ti', '2017-09-23', '<p>\r\n\r\n</p><p><strong>Jakarta, Kominfo</strong>&nbsp;- Menteri Komunikasi dan Informatika Rudiantara berharap pertemuan antara komunitas e-commerce Indonesia dan Investor Jepang akan mendorong kelahiran unicorn startup baru di Indonesia. \"Kali ini yang menjadi showcase Tokopedia dan Gojek. Siang ini akan ada meeting antara 45 perusahaan startup Indonesia dengan venture capital Jepang. Target kita tiap tahun akan ada unicorn baru,\" paparnya dalam acara Indonesia-Japan Digital NexICorn Meet Up di Ayana Mid Plaza Jakarta, Selasa (12/9/2017).</p><p>Pertemuan itu diharapkan Menteri Kominfo akan dapat menghasilkan kesepakatan kerjasama bisnis. \"Kita ingin serius dan terstruktur dalam berinvestasi. Pihak Jetro yang koordinir 50 investor dari Jepang akan berhadapan dengan perusahan startup yang potensial dari Indonesia untuk dilatih agar bisa menjual dan menghasilkan investasi,\" harapnya.</p><p>Event ini dijelaskan oleh Menkominfo menjadi langkah awal pemerintah dalam mengundang investor luar. \"Ini langkah awal pemerintah, players dan unicorn untuk membangun ekosistem digital. Kami juga akan datang ke negara-negara yang dinilai memiliki potensi untuk berinvestasi di Indonesia. Kita tidak bisa pasif tapi perlu pro aktif untuk menjual Indonesia secara positif.\" jelas Chief RA.</p><p>Saat ini telah terjadi perpindahan dalam pola investasi di Jepang, dimana investasi beralih dari goods ke manufaktur. Untuk itu Menkominfo mengajak para investor Jepang untuk melakukan investasi di Indonesia. \"Banyak alasan untuk investasi di Indonesia, selain pemerintah melakukan perbaikan untuk kepentingan bisnis seperti kemudahan dari sisi perizinan. Kita juga lakukan reformasi hukum untuk pengembangan iklim bisnis dan investasi. Indonesia juga meraih peringkat pertama dalam tingkat kepercayaan masyarakat terhadap pemerintah.\" kata Rudiantara. (VE)</p>\r\n\r\n<br><p></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `tmpt_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `id_login`, `nama_lengkap`, `tmpt_lahir`, `tgl_lahir`, `no_telp`, `email`) VALUES
(1, 1, 'Administrator', 'Tangerang', '1995-01-14', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profilkec`
--

CREATE TABLE `tb_profilkec` (
  `id_profilkec` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `date_profil` date DEFAULT NULL,
  `judul_profil` varchar(100) DEFAULT NULL,
  `img_profil` varchar(100) DEFAULT NULL,
  `desc_profil` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_profilkec`
--

INSERT INTO `tb_profilkec` (`id_profilkec`, `id_login`, `date_profil`, `judul_profil`, `img_profil`, `desc_profil`) VALUES
(1, 1, '2017-09-23', 'Profil KOMINFO', 'web kominfo masa ke masa.png', '<p>\r\n\r\nKementerian Komunikasi dan Informatika (sebelumnya bernama \"Departemen Penerangan\" (1945-1999), \"Kementerian Negara Komunikasi dan Informasi\" (2001-2005), dan Departemen Komunikasi dan Informatika (2005-2009), disingkat Depkominfo) adalah Departemen/kementerian dalam Pemerintah Indonesia yang membidangi urusan komunikasi dan informatika. Kementerian Kominfo dipimpin oleh seorang Menteri Komunikasi dan Informatika (Menkominfo) yang sejak tanggal 27 Oktober 2014 dijabat oleh Rudiantara.\r\n\r\n<br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rencanakerja`
--

CREATE TABLE `tb_rencanakerja` (
  `id_rencana_kerja` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `date_rencana_kerja` date DEFAULT NULL,
  `judul_rencana_kerja` varchar(100) DEFAULT NULL,
  `pdf_rencana_kerja` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rencanakerja`
--

INSERT INTO `tb_rencanakerja` (`id_rencana_kerja`, `id_login`, `date_rencana_kerja`, `judul_rencana_kerja`, `pdf_rencana_kerja`) VALUES
(1, 1, '2017-09-23', 'Rencana Kerja Tahun 2017 - 2018', '5.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_strukturorganisasi`
--

CREATE TABLE `tb_strukturorganisasi` (
  `id_struktur` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `date_struktur` date DEFAULT NULL,
  `judul_struktur` varchar(100) DEFAULT NULL,
  `pdf_struktur` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_strukturorganisasi`
--

INSERT INTO `tb_strukturorganisasi` (`id_struktur`, `id_login`, `date_struktur`, `judul_struktur`, `pdf_struktur`) VALUES
(1, 1, '2017-09-23', 'Struktur Organisasi Tahun 2017', '110-352-1-PB.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

CREATE TABLE `tb_video` (
  `id_video` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `judul_video` varchar(100) DEFAULT NULL,
  `url_video` text,
  `date_video` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id_video`, `id_login`, `judul_video`, `url_video`, `date_video`) VALUES
(1, 1, 'Megah, Wajah Baru Perbatasan Indonesia di Era Pemerintahan Jokowi', 'https://www.youtube.com/embed/VWmJb9BIEps', '2017-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_visimisi`
--

CREATE TABLE `tb_visimisi` (
  `id_visimisi` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `date_visimisi` date DEFAULT NULL,
  `desc_visimisi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_visimisi`
--

INSERT INTO `tb_visimisi` (`id_visimisi`, `id_login`, `date_visimisi`, `desc_visimisi`) VALUES
(1, 1, '2017-09-23', '<p>Visi</p><ul><li><strong>\" Terwujudnya Kecamatan Tangerang Terbaik dalam Pelayanan Menuju Masyarakat Mandiri, Dinamis, Sejahtera dan Berakhlakul Karimah</strong><strong>&nbsp;\"</strong>&nbsp;</li></ul>Misi<p></p><p>\n\n</p><ul><li>Terbaik dalam Pelayanan artinya Kecamatan Tangerang mampu memberikan pelayanan yang prima dengan tingkat kepuasan publik yang tinggi;</li><li>Masyarakat yang Mandiri &nbsp;artinya masyarakat yang dapat membangun wilayahnya dengan memaksimalkan segenap potensi yang dimiliki maka akan mendorong bertumbuhnya rasa percaya dalam diri segenap masyarakat dan seluruh aparatur Kecamatan;</li><li>Masyarakat yang dinamis&nbsp;artinya, masyarakat yang mencerminkan kehidupan wilayah Kecamtan Tangerang, meski berbeda latar belakang etnis dan budaya serta perbedaan kultur, namun muncul semangat kebersamaan dan rasa nasionalisme dengan mengikuti era perkembangan zaman dan harus terus berjalan sinergi dan linier;&nbsp;</li><li>Masyarakat sejahtera artinya masyarakat yang sudah cukup pangan, sandang dan Papan, Kesehatan yang baik, pendidikan yang baik, lingkungan yang sehat, cukup air bersih dan rasa aman;</li><li>Masyarakat yang berakhakul karimah artinya masyarakat yang mempunyai akhlak yang baik dan terpuji.</li></ul><p></p>');

-- --------------------------------------------------------

--
-- Table structure for table `tb_visitor`
--

CREATE TABLE `tb_visitor` (
  `id_visitor` int(11) NOT NULL,
  `ip_visitor` varchar(20) DEFAULT NULL,
  `date_visitor` date DEFAULT NULL,
  `time_visitor` time DEFAULT NULL,
  `nilai_visitor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_visitor`
--

INSERT INTO `tb_visitor` (`id_visitor`, `ip_visitor`, `date_visitor`, `time_visitor`, `nilai_visitor`) VALUES
(0, '::1', '2017-09-18', '14:39:51', 1),
(8, '::1', '2017-09-15', '21:03:18', 1),
(9, '::1', '2017-09-16', '21:03:18', 1),
(10, '::1', '2017-09-16', '10:24:29', 1),
(11, '::1', '2017-09-16', '10:24:45', 1),
(12, '::1', '2017-09-16', '10:52:56', 1),
(13, '::1', '2017-09-16', '21:00:05', 1),
(14, '::1', '2017-09-16', '21:03:12', 1),
(15, '::1', '2017-09-16', '21:04:58', 1),
(16, '::1', '2017-09-16', '21:08:10', 1),
(17, '::1', '2017-09-16', '21:20:22', 1),
(18, '::1', '2017-09-16', '22:57:54', 1),
(19, '::1', '2017-09-17', '23:30:18', 1),
(20, '::1', '2017-09-17', '23:50:48', 1),
(21, '::1', '2017-09-17', '23:52:26', 1),
(22, '::1', '2017-09-17', '23:52:27', 1),
(23, '::1', '2017-09-17', '23:52:29', 1),
(24, '::1', '2017-09-18', '15:51:47', 1),
(25, '::1', '2017-09-18', '17:01:25', 1),
(26, '::1', '2017-09-18', '17:01:55', 1),
(27, '::1', '2017-09-20', '21:42:15', 1),
(28, '::1', '2017-09-21', '23:18:45', 1),
(29, '::1', '2017-09-23', '00:46:40', 1),
(30, '::1', '2017-09-24', '00:00:43', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_balasan_bukutamu`
--
ALTER TABLE `tb_balasan_bukutamu`
  ADD PRIMARY KEY (`id_balasan_bukutamu`);

--
-- Indexes for table `tb_bukutamu`
--
ALTER TABLE `tb_bukutamu`
  ADD PRIMARY KEY (`id_bukutamu`);

--
-- Indexes for table `tb_daftargarapan`
--
ALTER TABLE `tb_daftargarapan`
  ADD PRIMARY KEY (`id_daftargarapan`);

--
-- Indexes for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `tb_hubkami`
--
ALTER TABLE `tb_hubkami`
  ADD PRIMARY KEY (`id_hubkami`);

--
-- Indexes for table `tb_kajianlaporan`
--
ALTER TABLE `tb_kajianlaporan`
  ADD PRIMARY KEY (`id_rencana`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`id_news`);

--
-- Indexes for table `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `tb_profilkec`
--
ALTER TABLE `tb_profilkec`
  ADD PRIMARY KEY (`id_profilkec`);

--
-- Indexes for table `tb_rencanakerja`
--
ALTER TABLE `tb_rencanakerja`
  ADD PRIMARY KEY (`id_rencana_kerja`);

--
-- Indexes for table `tb_strukturorganisasi`
--
ALTER TABLE `tb_strukturorganisasi`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id_video`);

--
-- Indexes for table `tb_visimisi`
--
ALTER TABLE `tb_visimisi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- Indexes for table `tb_visitor`
--
ALTER TABLE `tb_visitor`
  ADD PRIMARY KEY (`id_visitor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_balasan_bukutamu`
--
ALTER TABLE `tb_balasan_bukutamu`
  MODIFY `id_balasan_bukutamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_bukutamu`
--
ALTER TABLE `tb_bukutamu`
  MODIFY `id_bukutamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_daftargarapan`
--
ALTER TABLE `tb_daftargarapan`
  MODIFY `id_daftargarapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_gallery`
--
ALTER TABLE `tb_gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_hubkami`
--
ALTER TABLE `tb_hubkami`
  MODIFY `id_hubkami` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_kajianlaporan`
--
ALTER TABLE `tb_kajianlaporan`
  MODIFY `id_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `id_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_profilkec`
--
ALTER TABLE `tb_profilkec`
  MODIFY `id_profilkec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_rencanakerja`
--
ALTER TABLE `tb_rencanakerja`
  MODIFY `id_rencana_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_strukturorganisasi`
--
ALTER TABLE `tb_strukturorganisasi`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_video`
--
ALTER TABLE `tb_video`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_visimisi`
--
ALTER TABLE `tb_visimisi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_visitor`
--
ALTER TABLE `tb_visitor`
  MODIFY `id_visitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
