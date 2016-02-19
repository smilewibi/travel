-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 28. Februari 2012 jam 14:23
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tour`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE IF NOT EXISTS `berita` (
  `ID_berita` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `sinopsis` text COLLATE latin1_general_ci NOT NULL,
  `judul` text COLLATE latin1_general_ci NOT NULL,
  `isi` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`ID_berita`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`ID_berita`, `tanggal`, `sinopsis`, `judul`, `isi`) VALUES
('B-001', '2007-02-01 13:21:11', 'Demi menggairahkan kembali dunia pariwisata bali yang sempat terpuruk pemerintah Indonesia lewat menteri Kebudayaan dan Pariwisata, meresmikan sebuah slogan baru untuk pariwisata Bali, bertajuk " Bali is My Life"', 'Bali is My Life', 'Demi menggairahkan kembali dunia pariwisata bali yang sempat terpuruk Pemerintah Indonesia lewat menteri Kebudayaan dan Pariwisata, meresmikan sebuah slogan baru untuk promosi pariwisata Bali, bertajuk " Bali is My Life". Slogan ini ditujukan untuk memperbaiki citra Bali sebagai destinasi pariwisata yang sempat terancam dengan ulah oknum yang tak bertanggung jawab, dengan meledakkan bom di legian dan Kuta tahun 2002 dan 2005.\r\nSlogan baru ini juga mengangkat Bali, dengan tidak hanya menjual keindahan alam yang ada, namun lebih menitikberatkan pada kehidupan sehari masyarakat Bali yang dilandasi dengan konsep Tri Hita Karana. '),
('B-002', '2007-02-07 13:05:34', 'Berdasarkan data kedatangan (arrival) di Bandara Ngurah Rai, kunjungan wisatwan ke Bali awal tahun 2007 mengalami peningkatan yang cukup signifikan dibanding tahun sebelumnya.', 'Peningkatan Kunjungan Wisatawan ke Bali', 'Berdasarkan data kedatangan (arrival) di Bandara Ngurah Rai, kunjungan wisatwan ke Bali awal tahun 2007 mengalami peningkatan yang cukup signifikan dibanding tahun sebelumnya. Hal ini lebih banyak disebabkan mulai tumbuh kepercayaan terhadap bali sebagai destiansi pariwisata.\r\nMusim dingin di Eropa dan beberapa belahan dunia, juga membawa efek peningkatan yang cukup tajam bagi kedatangan wisatawan.'),
('B-000', '2007-02-08 15:13:25', 'Pemerintah Australia mengeluarkan travel warning sehubungan dengan adanya DBD.', 'Travel Warning pemerintah Asutralia', 'Demam Berdarah dangue telah mewabah di Berbagai daerah di Indonesia. Sehubungan hal ini pemerintah autralia mengeluarkan travel warning "Not go to Indonesia on this month"'),
('dhGDJ', '0000-00-00 00:00:00', 'guigkjhbuikj', 'guijkghn', 'uguikjh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `kode_booking` bigint(5) NOT NULL AUTO_INCREMENT,
  `tanggal` datetime NOT NULL,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(70) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `telepon` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `kode_paket` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `jumlah_orang` bigint(20) NOT NULL,
  `Note` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`kode_booking`),
  UNIQUE KEY `kode_booking` (`kode_booking`),
  KEY `kode_booking_2` (`kode_booking`),
  KEY `kode_booking_3` (`kode_booking`),
  FULLTEXT KEY `Note` (`Note`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=177 ;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`kode_booking`, `tanggal`, `nama`, `alamat`, `email`, `telepon`, `kode_paket`, `jumlah_orang`, `Note`) VALUES
(1, '2007-02-07 00:00:00', 'Diana nasution', 'Jakarta ', 'jakmania@yahoo.com', '081338024287', 'T-001', 3, 'pesan tempat ya...');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontak`
--

CREATE TABLE IF NOT EXISTS `kontak` (
  `no` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `komentar` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=19 ;

--
-- Dumping data untuk tabel `kontak`
--

INSERT INTO `kontak` (`no`, `nama`, `alamat`, `email`, `komentar`) VALUES
(4, '55677', '55567', 'hhhh', '55555'),
(5, '55677', '55567', 'hhhh', '55555'),
(6, ',dsmmdsk', 'dss', 'aku@ymail.com', 'dskns'),
(7, 'ndknd', 'ksn', 'dml@jm.com', 'nks'),
(8, 'mlsmml', 'dnks', 'aku@ymail.com', 'kskml'),
(9, 'knkd', 'msl', 'dml@jm.com', 'msm'),
(10, 'dsknk', 'nknw', 'jowj@y.com', 'nksn'),
(11, 'gjjg', 'dgd', 'aku@ymail.com', 'hfufy'),
(12, 'nksn', 'nksn', 'aku@ymail.com', 'nknsdkn'),
(13, 'khdsk', 'dknkd', 'aku@ymail.com', 'dnsn'),
(14, 'mbsjab', 'jdsjb', 'aku@ymail.com', 'dnsknks'),
(15, ',nds', 'jajk', 'aku@ymail.com', 'dsds'),
(18, 'nkdns`', 'jajk', 'aku@ymail.com', 'ds');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_tur`
--

CREATE TABLE IF NOT EXISTS `paket_tur` (
  `Kode_paket` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `Nama` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `Deskripsi` text COLLATE latin1_general_ci NOT NULL,
  `Harga` bigint(50) NOT NULL,
  `gambar` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`Kode_paket`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `paket_tur`
--

INSERT INTO `paket_tur` (`Kode_paket`, `Nama`, `Deskripsi`, `Harga`, `gambar`) VALUES
('T-014', 'Komodo tour', '2 hari di Pulau Komodo, melihat Komodo Dragon. Berangkat dari Denpasar. Harga sudah termasuk akomodasi, transpor, breakfast dan dinner saya.', 800000, ''),
('T-001', 'Besakih Tour', 'Ke pura terbesar di Bali, Pura Besakih. Berangkat dari Denpasar. Harga sudah termasuk transport.saaas', 400000, 'besakih.jpg'),
('T-012', 'Kalimantan tour', 'ke Kalimantan mengunjungi penangkaran orangutan.Berangkat dari Denpasar. Harga sudah termasuk akomodasi, transpor, breakfast dan dinner.', 1500000, 'kalimantan.jpg'),
('T-008', 'Barong Show', 'Melihat pertunjukan tarian barong dan tarian lain. Berangkat dari Denpasar. Harga sudah termasuk akomodasi dan  transport.', 400000, 'barong.jpg'),
('T-005', 'Tanah Lot Tour', 'Menikmati sunset di Tanah Lot, dengan hidangan kopi hangat dan pisang goreng', 40000, 'tanah lot.jpg'),
('T-009', 'Bedugul Tour', 'Mengunjungi danau Beratan dan kebun raya Bedugul. Berangkat dari Denpasar. Harga sudah termasuk akomodasi dan transport.', 400000, 'danau_beratan.jpg'),
('T-013', 'Kintamani Tour', 'Menikmati matahari terbit di Kintamani.Berangkat dari Denpasar. Harga sudah termasuk akomodasi, transport.', 350000, 'kintamani.jpg'),
('T-016', 'Papua tour', 'Mengunjungi lembah baliem dan suku yang ada pada daerah tersebut. Berangkat dari Denpasar. Harga sudah termasuk akomodasi, transpor, breakfast dan dinner.', 3000000, 'papua.jpg'),
('T-887', 'Jimbaran Sea Food', 'Menikmati Makan malam di tepi pantai Jimbaran dengan hidangan seafood. Berangkat dari Denpasar. Harga sudah termasuk akomodasi, transpor.Harga tidak termasuk harga makanan dan minuman.', 300000, 'jimbaran.jpg'),
('T-988', 'Pedesaan tour', 'Menikmati suasana desa dan pemandangan yang masih asli ', 150000, 'sawah.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `kode_pengguna` varchar(30) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  PRIMARY KEY (`kode_pengguna`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`kode_pengguna`, `nama_pengguna`, `password`, `nama_lengkap`) VALUES
('nkdnk', 'ndksnk', 'dnksnk', 'aku');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(3) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `Password` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  `NamaLengkap` varchar(50) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`UserId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`UserId`, `UserName`, `Password`, `NamaLengkap`) VALUES
(1, 'adhie', 'green1981', 'Ketut Adhie'),
(2, 'bjoe', 'badboy81', 'Billie Joe Amstrong'),
(3, 'admin', 'admin', 'Ketut Kiwil  o1'),
(4, 'admin', 'admin', 'Admin Tersayang'),
(5, 'pkoke', 'asss', 'akuw'),
(6, 'uuuuu', 'tomorrrow', 'again'),
(7, 'uhiukjhn', 'huiokj', 'hijnkhn'),
(8, NULL, NULL, NULL),
(9, NULL, NULL, NULL),
(10, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
