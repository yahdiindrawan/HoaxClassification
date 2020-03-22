-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Feb 2020 pada 13.32
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klasifikasi_hoax`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`) VALUES
(1, 'yahdi', '123', 'Yahdi Indrawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cek_hoax`
--

CREATE TABLE `cek_hoax` (
  `id_cek` int(11) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `akurasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cek_hoax`
--

INSERT INTO `cek_hoax` (`id_cek`, `konten`, `tanggal`, `id_kategori`, `akurasi`) VALUES
(1, 'Pemerintah melarang adzan', '2020-01-01', 1, 90),
(2, 'Banjir di daerah jakarta pada tahun baru 2020', '2020-01-01', 2, 87),
(4, 'Indramayu terjadi pembegalan yang sadis', '2020-01-03', 1, 56);

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `disclaimer` text NOT NULL,
  `about` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `whatsapp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`disclaimer`, `about`, `email`, `whatsapp`) VALUES
('Semua prediksi yang dihasilkan belum bisa menjamin kebenaran', 'Sebuah website yang dibuat untuk memprediksi suatu berita apakah berita tersebut masuk berita hoax atau tidak.', 'stophoax@gmail.com', '089670707070');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Hoax'),
(2, 'Fakta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kumpulan_berita`
--

CREATE TABLE `kumpulan_berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `link_berita` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_partner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kumpulan_berita`
--

INSERT INTO `kumpulan_berita` (`id_berita`, `judul`, `link_berita`, `tanggal`, `id_partner`) VALUES
(1, '[DISINFORMASI] Air Liur dari Terompet Dapat Sebarkan Penyakit Berbahaya', 'https://www.kominfo.go.id/content/detail/23576/disinformasi-air-liur-dari-terompet-dapat-sebarkan-penyakit-berbahaya/0/laporan_isu_hoaks', '2019-12-31', 1),
(2, '[DISINFORMASI] Penampakan Langit Bercahaya Aneh di Sleman', 'https://www.kominfo.go.id/content/detail/23575/disinformasi-penampakan-langit-bercahaya-aneh-di-sleman/0/laporan_isu_hoaks', '2019-12-31', 1),
(3, '[HOAKS] Surat Undangan Bantuan Dana Hibah 2020 Kemenkop UKM', 'https://www.kominfo.go.id/content/detail/23574/hoaks-surat-undangan-bantuan-dana-hibah-2020-kemenkop-ukm/0/laporan_isu_hoaks', '2019-12-31', 1),
(6, '[HOAKS] Akun Palsu Mengatasnamakan Bupati Blitar', 'https://www.kominfo.go.id/content/detail/23573/hoaks-akun-palsu-mengatasnamakan-bupati-blitar/0/laporan_isu_hoaks', '2019-12-31', 1),
(7, '[HOAKS] Surat Undangan Interview PT Pupuk Indonesia (Persero) pada 24-25 Desember 2019', 'https://www.kominfo.go.id/content/detail/23570/hoaks-surat-undangan-interview-pt-pupuk-indonesia-persero-pada-24-25-desember-2019/0/laporan_isu_hoaks', '2019-12-25', 1),
(8, '[HOAKS] Tarif Parkir Mahal di Lokasi Gerhana Matahari Kabupaten Siak', 'https://www.kominfo.go.id/content/detail/23569/hoaks-tarif-parkir-mahal-di-lokasi-gerhana-matahari-kabupaten-siak/0/laporan_isu_hoaks', '2019-12-25', 1),
(9, '[DISINFORMASI] Anak PAUD Dituduh Terlibat Teroris oleh Densus', 'https://www.kominfo.go.id/content/detail/23568/disinformasi-anak-paud-dituduh-terlibat-teroris-oleh-densus/0/laporan_isu_hoaks', '2019-12-25', 1),
(11, '[DISINFORMASI] Pembangunan Jembatan Lengkung di Utan Kota Kemayoran Seharga 5 Miliar', 'https://www.kominfo.go.id/content/detail/23567/disinformasi-pembangunan-jembatan-lengkung-di-utan-kota-kemayoran-seharga-5-miliar/0/laporan_isu_hoaks', '2019-12-25', 1),
(12, '[DISINFORMASI] Foto Selfie Diduga Pengemudi Pajero Maut di Tegal', 'https://www.kominfo.go.id/content/detail/23566/disinformasi-foto-selfie-diduga-pengemudi-pajero-maut-di-tegal/0/laporan_isu_hoaks', '2019-12-25', 1),
(13, '[DISINFORMASI] Ibu Hamil Harus Batasi Konsumsi Hati Ayam', 'https://www.kominfo.go.id/content/detail/23565/disinformasi-ibu-hamil-harus-batasi-konsumsi-hati-ayam/0/laporan_isu_hoaks', '2019-12-25', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapor_hoax`
--

CREATE TABLE `lapor_hoax` (
  `id_lapor` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `konten` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lapor_hoax`
--

INSERT INTO `lapor_hoax` (`id_lapor`, `nama_depan`, `nama_belakang`, `email`, `judul`, `konten`, `tanggal`) VALUES
(8, 'Yahdi', 'Indrawan', 'yahdiindrawan11@gmail.com', 'Daging babi beracun', 'ada daging babi beracun di pasar', '2020-01-02'),
(10, 'Diah', 'Trie', 'diahtrie23@gmail.com', 'Indramayu Banjir', 'Terjadi bencana banjir di daerah Indramayu dan sekitarnya', '2020-01-09'),
(11, 'a', 'a', 'diahtrie23@gmail.com', 'a', 'a', '2020-01-09'),
(12, 'a', 'a', 'yahdiindrawan11@gmail.com', 'a', 'a', '2020-01-09'),
(13, 'ya', 'ya', 'nurfadhillah98@gmail.com', 'asaaad', 'aadd', '2020-01-09'),
(14, 'Yahdi', 'Trie', 'yahdiindrawan11@gmail.com', 'About TVRI Jogja', 'aaa', '2020-01-09'),
(15, 'Yahdi', 'Indrawan', 'yahdiindrawan11@gmail.com', 'Kiamat 2020', 'akan terjadi kiamat pada tahun 2020', '2020-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `partner`
--

CREATE TABLE `partner` (
  `id_partner` int(11) NOT NULL,
  `nama_partner` varchar(50) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `partner`
--

INSERT INTO `partner` (`id_partner`, `nama_partner`, `logo`, `bidang`, `link`, `deskripsi`) VALUES
(1, 'Kominfo', 'kominfo.png', 'Kementerian', 'https://www.kominfo.go.id/', 'Lembaga Kementerian Komunikasi dan Informasi'),
(2, 'Mafindo', 'mafindo.png', 'Komunitas', 'http://turnbackhoax.id/', 'Masyarakat Anti Fitnah dan Hoax Indonesia'),
(3, 'Indramayu', 'accuracy_han.png', 'Kabupaten', 'https://facebook.com', 'Suatu daerah di Jawa Barat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `cek_hoax`
--
ALTER TABLE `cek_hoax`
  ADD PRIMARY KEY (`id_cek`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kumpulan_berita`
--
ALTER TABLE `kumpulan_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_partner` (`id_partner`);

--
-- Indeks untuk tabel `lapor_hoax`
--
ALTER TABLE `lapor_hoax`
  ADD PRIMARY KEY (`id_lapor`);

--
-- Indeks untuk tabel `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id_partner`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cek_hoax`
--
ALTER TABLE `cek_hoax`
  MODIFY `id_cek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kumpulan_berita`
--
ALTER TABLE `kumpulan_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `lapor_hoax`
--
ALTER TABLE `lapor_hoax`
  MODIFY `id_lapor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `partner`
--
ALTER TABLE `partner`
  MODIFY `id_partner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cek_hoax`
--
ALTER TABLE `cek_hoax`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `kumpulan_berita`
--
ALTER TABLE `kumpulan_berita`
  ADD CONSTRAINT `id_partner` FOREIGN KEY (`id_partner`) REFERENCES `partner` (`id_partner`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
