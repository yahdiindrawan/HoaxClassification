-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2020 pada 08.08
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
-- Struktur dari tabel `dataset`
--

CREATE TABLE `dataset` (
  `id_dataset` int(11) NOT NULL,
  `konten` text NOT NULL,
  `label` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dataset`
--

INSERT INTO `dataset` (`id_dataset`, `konten`, `label`) VALUES
(1, 'Astaghfirullah haladzhim.\r\nSalah satu tanda kiamat adalah bila sudah tidak ada lagi yg Thawaf mengelilingi Ka’bah. Dulu kita mungkin pernah berpikir, “masa sih, Ka’bah sepi dari yang Thawaf.” Tapi kini, seiring waktu, kejadian demi kejadian, akhirnya kita bisa mengerti dan memahami, bahwa hanya dengan satu kasus saja yaitu: virus corona yang berasal dari Wuhan-China, pemerintah Arab Saudi menutup pintu masuk bandaranya untuk seluruh negara yang terinfeksi dengan virus corona, termasuk pada jamaah yang akan malaksanakan ibadah umroh.Pertanyaannya bagaimana jika kasus tersebut terjadi di sana? Apa yang akan terjadi, tentu tidak ada orang yang berani keluar rumah? Dan ahirnya mungkin tak ada yang Thawaf lagi, hal ini mebuktikan bahwa kiamat memang sudah dekat saudara2 ku, dan fenomena Allah akan mengangkat Al quran sehingga huruf huruf nya sudah tidak ada lagi yg bisa kita baca ..\r\nkarena itu mari kita bertaubat dan perbanyak\r\n1. Istighfar dengan تبوا توبة نصوحا\r\n2.Sholawat\r\n3.Dzikrullah…\r\n#copas\r\numi dinar tazkia.semoga masih di beri waktu untuk memperbaiki diri & bertobat.semoga Orang orang Islam selalu Allah jaga dari segala musibah', 'Hoax'),
(2, 'Petugas Bea Cukai Bandara Internasional Juanda mengamankan seorang warga Surabaya yang kedapatan membawa 400 butir proyektil amunisi, Sabtu (23/2/2019) pukul 23.00. Dia adalah Stephen Partowidjojo, 36, warga Bukit Pakis Utara III/TA-19, Surabaya.\r\n\r\n“Pelaku menumpang pesawat China Airlines CI-751 dari negara Taiwan, transit di Singapura, sebelum kemudian mendarat di Bandara Internasional Juanda, pukul 23.00 WIB,” kata Kepala Bidang Hubungan Masyarakat Kepolisian Daerah Jawa Timur Komisaris Besar Frans Barung Mangera seperti dikutip Antara, Minggu (24/2/2019).\r\n\r\nSP dalam penerbangan China Airlines CI-751 tidak sendirian. Dia bersama tiga anggota keluarganya, masing-masing berinisial SoP, TV, dan SIP, yang semuanya terdata sebagai warga negara Indonesia.\r\n\r\n“Mereka mengaku pulang liburan dari Oregon, Amerika Serikat. Dari sanalah ratusan proyektil senjata api berbagai jenis ini didapat,” ucap Barung.\r\n\r\nSP dalam penyelidikan sempat menunjukkan kartu anggota Persatuan Penembak Indonesia (Perbakin) Nomor 1177/13/B/2017 atas namanya sendiri. Barung menandaskan sampai sekarang penyelidikan masih berlangsung.\r\n\r\n“Kami menduga ratusan amunisi proyektil dan beberapa bagian senjata api itu dibawanya masuk ke Indonesia secara ilegal,” kata Frans.\r\n\r\nSP (36) warga Bukit Pakis Utara, Surabaya ditetapkan sebagai tersangka atas kepemilikan ratusan amunisi senjata api berbagai jenis tanpa izin. Tersangka dijerat UU Darurat Nomor 12 Tahun 1951.\r\n\r\n“Sejauh ini yang tersangka hanya SP. Dia yang membawa dengan barang bukti melekat. Tersangka membelinya saat liburan di Amerika,” kata Kepala Biro Penerangan Masyarakat (Karo Penmas) Divisi Humas Polri, Brigjen Dedi Prasetyo.\r\n\r\nPolisi menyatakan apa yang dibawa SP (36), salah satu penumpang China Airlines bukanlah amunisi, namun merupakan bagian dari amunisi. Yang dibawa SP adalah proyektil.\r\n\r\n“Orang tersebut membawa salah satu komponen amunisi. Jadi amunisi itu ada satu, bahan ledak. Dua, selongsong, ada hulu ledak dan kemudian ada proyektilnya. Yang dibawa oleh yang bersangkutan adalah bagian dari pada amunisi yaitu proyektil saja,” ujar Kabid Humas Polda Jatim Kombes Frans Barung Mangera di Polda Jatim Jalan Ahmad Yani Surabaya, Senin (25/2/2019).\r\n\r\nBarung mengatakan pihaknya masih melakukan penyelidikan bersama Polresta Sidoarjo. Penyelidikan akan berfokus kepada untuk apa pelaku membawa proyektil sebanyak itu.\r\n\r\n“Poyektil akan dirakit kembali untuk dipergunakan saat berburu. Itu saja,” ucap dia.', 'Fakta'),
(3, 'TERJAWAB SUDAH KENAPA JOKOWI SEORANG PRESIDEN MEMINTA MAAF KEPADA KELUARGA PKI KOMUNIS , DARI KEMERDEKAAN RI 1945 BELUM PERNAH SEORANG PRESIDEN RI MEMINTA MAAF KEPADA PKI , BARU JOKOWI , TERNYATA PERMAINAN POLITIK BAPAK MEMINTA MAAF KE PADA ANAK2 NYA, MALING TERIAK MALING', 'Hoax'),
(4, 'Cepat atau lambat program rezim utk pengetesan covid 19 ke para kyai sudh di lakukan…rezim memaksa para kyai utk di suntik dgn dalih utk ketahanan tubuh dari virus..kyai di banten ini tegas menolak!!.', 'Hoax'),
(5, 'Sebanyak tiga penumpang kereta rel listrik (KRL) perjalanan Jakarta-Bogor yang dinyatakan positif Covid-19 setelah menjalani tes swab PCR di Stasiun Bogor, Jawa Barat pada 27 April 2020 lalu.\r\n\r\nTerkait hal itu, VP Corporate Communications PT Kereta Commuter Indonesia (KCI), Anne Purba berujar, pihaknya akan mengajak Pemprov Jawa Barat untuk mencari solusi terbaik atas ditemukannya tiga penumpang di kereta rel listrik (KRL) perjalanan Jakarta-Bogor positif Covid-19. Diharapkan, nantinya ditemukan formula terbaik atas masalah ini.\r\n\r\n\r\n\"KCI juga sangat terbuka untuk bekerjasama dengan Pemerintah Provinsi Jawa Barat dan Pemerintah Kota/Kabupaten terkait untuk menemukan solusi guna bersama-sama menyaring masyarakat yang akan naik KRL,\" kata Anne dalam keterangan tertulisnya di Jakarta, Senin (4/5/2020).', 'Fakta'),
(6, 'Hari ke-7 PSBB di Surabaya, arus lalu lintas di check point Bundaran Waru terpantau lancar. Arus tetap lancar meski banyak kendaraan yang masuk ke Surabaya\r\n\"Cukup padat pada hari ketujuh. Sepertinya orang-orang masih beraktivitas. Tapi tidak sepadat hari Senin kemarin,\" ujar Kabid Pengawasan dan Pengendalian (Wasdal) Dishub Kota Surabaya Tundjung Iswandaru kepada detikcom, Senin (4/5/2020).\r\n\r\n\"Jadi kesimpulannya pergerakan atau aktivitas di dalam kota masih ada. Rata-rata mereka bawa surat tugas semua untuk bekerja,\" lanjut Tundjung.', 'Fakta'),
(8, 'Virus Corona Covid-19 kian lama semakin bermutasi, sehingga banyak ciri-ciri baru yang mungkin belum Anda kenali. Bahkan pasien yang baru-baru ini terinfeksi Sars Cov 2 ini pun merasakannya.\r\n\r\nJika pada awalnya virus ini menyebar di berbagai negara, umumnya hanya menunjukkan ciri-ciri berupa batuk, demam atau sesak napas saja, kini tidak lagi. Karena pasien yang terkena corona merasakan gejala yang beragam, bahkan ada yang tak sama seperti dulu.\r\n\r\n\r\nAtau bahkan orang yang terkena corona COVID-19 tidak mengalami gejala sama sekali atau disebut dengan Orang Tanpa Gejala (OTG). Kondisi seperti ini jelas sangat berbahaya, karena tanpa disadari dapat menularkan virus corona ke orang lain. Baik itu lewat droplets atau sentuhan yang pasti tak disadari.', 'Fakta'),
(9, 'Begini cara pertolongan Emergency Covid 19 .. pasang Ventilator + jalan terakhir suction utk mengangkat dahak/lendir di paru2, kalo semua gagal, *Good Bye* jangan main~main, lebih baik *Stay at Home*', 'Hoax'),
(10, '“Lagi lagi corona tka cina makasih banyak yang datang ke Indonesia,,, trs bawa amunisi segala buat apa bambang??? Buat nyerang kaum Muslim kah??”\r\n\r\nPostingan Kristin Hadija yang dibagikan adalah gambar dengan narasi sebagai berikut:\r\n\r\n“Penyelundupan amunisi jelas lebih tinggi grade-nya daripada narkoba. Sudah level ketahanan negara Semua yakin pelaku nggak sendirian, pasti punya sindikat yang sangat solid. Bukan cuma kelas bandar judi atau ekstasi.\r\nPenyelundupan amunisi (komponen senjata), semestinya menteri pertahanan dilibatkan dalam investigasi. Jika ini terjadi, seru. Jika berhenti atau dipetieskan, nggak kaget juga. Udah biasa.\r\nRakyat akan melihat apakah kasus ini akan berhenti hanya menangkap satu orang pelaku atau akan dijadikan petunjuk awal menggulung sindikat senjata.\r\nBiasanya begini tergantung harga kesepakatan, antara big bos sindikat penyelundup dengan mafia birokrat.\r\nNegeri para bebedah!”', 'Hoax'),
(11, 'Wakil Ketua Komisi VIII DPR, Ace Hasan Syadzily meminta Kementerian Agama (Kemenag) menyiapkan tenggat waktu yang jelas, soal kepastian penyelenggaraan ibadah Haji 2020. Hal itu diperlukan agar calon jamaah haji bisa mempersiapkan diri jika sudah ada keputusan dari Kerajaan Arab Saudi.\r\n\r\nSejauh ini, belum ada keputusan dari Arab Saudi yang diterima DPR maupun Pemerintah, terkait penyelenggaraan Haji 2020. Kerajaan Arab Saudi masih mempertimbangkan penyelenggaraan ibadah haji karena adanya pandemi Covid-19.\r\n\r\n\r\n\"Saya menyarankan agar Kementerian Agama harus memiliki tenggat waktu yang jelas. Langkah ini penting agar kita juga memiliki persiapan yang cukup untuk memastikan kesiapan jamaah haji untuk menunaikan ibadah haji,\" kata Ace saat dikonfirmasi Okezone, Rabu (29/4/2020).\r\n\r\nAce mengingatkan kepada Pemerintah, yang harus diutamakan saat ini terkait penyelenggaraan ibadah haji adalah keselamatan dan kesehatan calon jamaah haji. Keselamatan dan kesehatan itu penting selama berada di Indonesia, maupun adanya jaminan jamaah haji Indonesia tidak tertular Covid-19 selama berada di Tanah Suci. ', 'Fakta');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dataset`
--
ALTER TABLE `dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dataset`
--
ALTER TABLE `dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
