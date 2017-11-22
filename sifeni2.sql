-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Nov 2017 pada 09.07
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifeni`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sf_fenomena`
--

CREATE TABLE `sf_fenomena` (
  `id` int(11) NOT NULL,
  `tanggal_fenomena` date NOT NULL,
  `sumber_id` int(11) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `isi_fenomena` text NOT NULL,
  `lapangan_usaha` int(11) NOT NULL,
  `pengaruh_id` int(11) NOT NULL,
  `tanggal_entri` date DEFAULT NULL,
  `upload_foto_dokumen` text NOT NULL,
  `isVerified` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sf_kecamatan`
--

CREATE TABLE `sf_kecamatan` (
  `id` int(7) NOT NULL,
  `nama` varchar(72) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sf_kecamatan`
--

INSERT INTO `sf_kecamatan` (`id`, `nama`) VALUES
(7403, 'KABUPATEN KONAWE (pilih ini jika tidak diketahui kecamatannya)'),
(7412, 'KABUPATEN KONAWE KEPULAUAN (pilih ini jika tidak diketahui kecamatannya)'),
(7403090, 'SOROPIA'),
(7403091, 'LALONGGASUMEETO'),
(7403100, 'SAMPARA'),
(7403101, 'BONDOALA'),
(7403102, 'BESULUTU'),
(7403103, 'KAPOIALA'),
(7403104, 'ANGGALOMOARE'),
(7403105, 'MOROSI'),
(7403130, 'LAMBUYA'),
(7403131, 'UEPAI'),
(7403132, 'PURIALA'),
(7403133, 'ONEMBUTE'),
(7403140, 'PONDIDAHA'),
(7403141, 'WONGGEDUKU'),
(7403142, 'AMONGGEDO'),
(7403143, 'WONGGEDUKU BARAT'),
(7403150, 'WAWOTOBI'),
(7403151, 'MELUHU'),
(7403152, 'KONAWE'),
(7403170, 'UNAAHA'),
(7403171, 'ANGGABERI'),
(7403180, 'ABUKI'),
(7403181, 'LATOMA'),
(7403182, 'TONGAUNA'),
(7403183, 'ASINUA'),
(7403184, 'PADANGGUNI'),
(7403185, 'TONGAUNA UTARA'),
(7403193, 'ROUTA'),
(7412010, 'WAWONII TENGGARA'),
(7412020, 'WAWONII TIMUR'),
(7412030, 'WAWONII TIMUR LAUT'),
(7412040, 'WAWONII UTARA'),
(7412050, 'WAWONII SELATAN'),
(7412060, 'WAWONII TENGAH'),
(7412070, 'WAWONII BARAT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sf_lapangan_usaha`
--

CREATE TABLE `sf_lapangan_usaha` (
  `id` int(2) NOT NULL,
  `kategori` varchar(7) DEFAULT NULL,
  `keterangan` varchar(63) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sf_lapangan_usaha`
--

INSERT INTO `sf_lapangan_usaha` (`id`, `kategori`, `keterangan`) VALUES
(1, 'A', 'Pertanian, Kehutanan, dan Perikanan'),
(2, 'B', 'Pertambangan dan Penggalian'),
(3, 'C', 'Industri Pengolahan'),
(4, 'D', 'Pengadaan Listrik dan Gas'),
(5, 'E', 'Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang'),
(6, 'F', 'Konstruksi'),
(7, 'G', 'Perdagangan Besar dan Eceran; Reparasi Mobil dan Sepeda Motor'),
(8, 'H', 'Transportasi dan Pergudangan'),
(9, 'I', 'Penyediaan Akomodasi dan Makan Minum'),
(10, 'J', 'Informasi dan Komunikasi'),
(11, 'K', 'Jasa Keuangan dan Asuransi'),
(12, 'L', 'Real Estat'),
(13, 'M,N', 'Jasa Perusahaan'),
(14, 'O', 'Administrasi Pemerintahan, Pertahanan, dan Jaminan Sosial Wajib'),
(15, 'P', 'Jasa Pendidikan '),
(16, 'Q', 'Jasa Kesehatan dan Kegiatan Sosial'),
(17, 'R,S,T,U', 'Jasa Lainnya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sf_pengaruh`
--

CREATE TABLE `sf_pengaruh` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sf_pengaruh`
--

INSERT INTO `sf_pengaruh` (`id`, `nama`) VALUES
(1, 'pertumbuhan'),
(2, 'implisit'),
(3, 'keduanya (pertumbuhan dan implisit)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sf_sumber`
--

CREATE TABLE `sf_sumber` (
  `id` int(11) NOT NULL,
  `nama` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sf_sumber`
--

INSERT INTO `sf_sumber` (`id`, `nama`) VALUES
(1, 'laporan suplemen'),
(2, 'media');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sf_user`
--

CREATE TABLE `sf_user` (
  `id` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `password` varchar(120) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sf_user`
--

INSERT INTO `sf_user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 1),
(2, 'asra', 'asra', 2),
(4, 'wayan', 'wayan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sf_fenomena`
--
ALTER TABLE `sf_fenomena`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kecamatan_id` (`kecamatan_id`),
  ADD UNIQUE KEY `lapangan_usaha` (`lapangan_usaha`),
  ADD KEY `sumber` (`sumber_id`),
  ADD KEY `sumber_2` (`sumber_id`),
  ADD KEY `pengaruh` (`pengaruh_id`);

--
-- Indexes for table `sf_kecamatan`
--
ALTER TABLE `sf_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_lapangan_usaha`
--
ALTER TABLE `sf_lapangan_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_pengaruh`
--
ALTER TABLE `sf_pengaruh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_sumber`
--
ALTER TABLE `sf_sumber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_user`
--
ALTER TABLE `sf_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sf_fenomena`
--
ALTER TABLE `sf_fenomena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sf_pengaruh`
--
ALTER TABLE `sf_pengaruh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sf_sumber`
--
ALTER TABLE `sf_sumber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `sf_user`
--
ALTER TABLE `sf_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sf_fenomena`
--
ALTER TABLE `sf_fenomena`
  ADD CONSTRAINT `sf_fenomena_ibfk_1` FOREIGN KEY (`sumber_id`) REFERENCES `sf_sumber` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sf_fenomena_ibfk_2` FOREIGN KEY (`kecamatan_id`) REFERENCES `sf_kecamatan` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sf_fenomena_ibfk_3` FOREIGN KEY (`lapangan_usaha`) REFERENCES `sf_lapangan_usaha` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sf_fenomena_ibfk_4` FOREIGN KEY (`pengaruh_id`) REFERENCES `sf_pengaruh` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
