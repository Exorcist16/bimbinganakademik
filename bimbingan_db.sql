-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 01:55 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbingan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(11) NOT NULL,
  `departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `departemen`) VALUES
(13, 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nip` varchar(32) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `foto_dosen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nip`, `nama_dosen`, `foto_dosen`) VALUES
(' 19831008 201212 2 003', 'Mukarramah Yusuf, S.T.,M.Sc', ''),
('131802900', 'Dr.Ir. Safri Burhanuddin, DEA', ''),
('19490608 197602 1 001', 'Prof.Dr.Ir. Slamet Tri Sutomo, MS', ''),
('19490814 197903 1 002', 'Prof.Ir. Mansyur Hasbullah, M.Eng', ''),
('19520529 198011 1 001', 'Prof.Dr.Ir. Victor Sampebulu, M.Eng', ''),
('19520607 197802 1 001', 'Prof.Dr.Ir. Onny Suryono Sutresman, MT', ''),
('19531111 198003 1 009', 'Prof.Dr.Ir. M. Ramli Rahim, M.Eng', ''),
('19531221 198103 1 002', 'Prof.Dr.Ir. Muhammad Yamin Jinca, MS.Tr', ''),
('19540910 198303 1 003', 'Prof.Dr.Ir. M. Saleh Pallu, M.Eng', ''),
('19550302 198702 1 001', 'Ir. Syahrir Arief, MT', ''),
('19550807 198403 1 002', 'Ir. Achmad Faisal Aboe, MT', ''),
('19550914 198702 1 001', 'Ir. Baharuddin Mire, MT', ''),
('19560101 198603 1 005', 'Ir. Machmud Syam, DEA.', ''),
('19560109 197903 1 001', 'Ir. Thomas Tjandinegara, MS.ME', ''),
('19560412 198703 1 001', 'Ir. Djamaluddin, MT.', ''),
('19560421 198609 1 001', 'Ir. Kaharuddin, MT', ''),
('19560827 198503 1 001', 'Dr.Ir. Luther Sule, MT', ''),
('19561127 198803 1 001', 'Ir. Lukman Bochary, MT', ''),
('19570112 198811 1 001', 'Ir. Zulkifli, MT', ''),
('19570323 198601 1 001', 'Ir. M. Fathien Azmy, M.Si', ''),
('19570405 198802 1 002', 'Ir. Panguriseng', ''),
('19570530 198903 1 001', 'Ir. Dantje Runtulalo, MT', ''),
('19570729 198601 2 001', 'Dr.Ir. Triyatni Martosenjoyo, M.Si.', ''),
('19570906 198203 1 004', 'Dr.Ir. Rhiza Samsoe\'oed Sadjad, MS.EE', ''),
('19570914 198703 1 001', 'Ir. Ilyas Renreng, MT', ''),
('19571013 198703 1 001', 'Ir. Mukhtar, MT', ''),
('19571231 198703 1 020', 'Ir. Mulyadi, MT', ''),
('19580316 198810 1 001', 'Ir. Jamal, MT.', ''),
('19580325 198601 1 001', 'Ir. Syarif, MT', ''),
('19580424 198702 1 001', 'Ir. Syafruddin Rauf, MT', ''),
('19580810 198703 1 006', 'Ir. Agustinus Tupenalay, M.Si', ''),
('19580921 198603 1 003', 'Dr.Ir. Ahmad Yusran Aminy, MT', ''),
('19581203 198601 1 001', 'Dr. Ir. M. Fauzy Arifin, M.Si', ''),
('19581210 198601 2 001', 'Dr.Ir. Rohaya Langkoke, MT', ''),
('19581228 198601 2 001', 'Dr.Ir. Sumarni Hamid, MT', ''),
('19590116 198702 1 001', 'Dr.Ir. Achmad Zubair, MS', ''),
('19590202 198601 2 001', 'Dr. Ir. Ratna Husain, MT', ''),
('19590509 198702 1 001', 'Ir. Muhammad Syavir Latif, M.Si', ''),
('19590708 198802 1 001', 'Ir. Yustinus Upa Sombolayuk, MT', ''),
('19591008 198703 1 001', 'Dr. Ir. Busthan, MT', ''),
('19591010 198703 1 003', 'Dr.Ir. Abdul Rachman, MT', ''),
('19591210 198601 1 002', 'Dr.Ir. Syarifuddin, M.Si', ''),
('19591220 198601 1 001', 'Prof.Dr.Ir.H.Nasaruddin, M.T.', ''),
('19600119 198903 1 002', 'Ir. Muhammad Taufik Ishak, MT', ''),
('19600302 198609 1 001', 'Dr.-Ing.Ir. Wahyu Haryadi Piarah, MSME', ''),
('19600425 198811 1 001', 'Dr.Ir, Dipl.Ing. Ganding Sitepu', ''),
('19600620 198802 2 001', 'Ir. Rosmani, MT.', ''),
('19600716 198702 1 002', 'Ir. Christoforus Yohannes, MT', ''),
('19600720 198702 1 001', 'Ir. Gassing, MT', ''),
('19600730 198603 1 003', 'Dr.Ir. Achmad Bakri Muhiddin, MS', ''),
('19601102 198811 1 001', 'Ir. Hamid Umar, MT.', ''),
('19601106 198601 2 001', 'Dr.Ir. Sri Mawar Said, MT', ''),
('19601231 198609 1 001', 'Dr.Ir. Muhammad Arsyad, MT', ''),
('19601231 198703 1  022', 'Prof.Dr.Ir. Andani, MT', ''),
('19610813 198811 2 001', 'Dr. Ir. Inggrid Nurtanio, MT', ''),
('19610915 198811 2 001', 'Ir. Ria Wikantari Rosalia, M.Arch,Ph.D', ''),
('19611017 198503 1 004', 'Dr. Ir. Nasruddin, M.Si', ''),
('19611113 198702 1 003', 'Prof.Dr.Ir. Syamsul Bahri, M.Si', ''),
('19611125 198802 1 001', 'Prof.Dr. Ir. Syafruddin Syarif, MT', ''),
('19611231 198903 1 019', 'Dr.Ir. Musri, MT', ''),
('19611231 199002 1 003', 'Ir. Andi Mangkau, MT', ''),
('19620304 198811 1 001', 'Ir. Samuel Panggalo, MT', ''),
('19620423 198802 2 001', 'Dr.Ir. Misliah, MS.Tr', ''),
('19620729 198703 1 001', 'Prof.Dr.Ir. Herman Parung,M.Eng.', ''),
('19621231 198903 1 031', 'Ir. Juswan, MT', ''),
('19621231 199003 1 024', 'Prof.Dr.Ir. Salama, MT', ''),
('19630504 199512 1 001', 'Dr.Ir.Arifuddin, MT', ''),
('19630605 198903 1 005', 'Prof.Dr.Ir. rer.nat A.M. Imran', ''),
('19630801 199903 1 001', 'Ir. Akhmad Sumakin, MT', ''),
('19631127 199203 1 001', 'Ir. Mubassirang Pasra, MT', ''),
('19640422 199303 1 001', 'Prof.Ir.Sakti Adji Adisasmita,M.Si.M.Eng.Sc.,Ph.D', ''),
('19640427 198910 1 002', 'Dr.Ir. Zahir Zainuddin, M.Sc', ''),
('19640501 199002 2 001', 'Ir. Serly Klara, MT', ''),
('19640904 199412 2 001', 'Dr.Ir. Nurul Jamala B., MT', ''),
('19641020 199103 1 002', 'Dr.Eng.Ir. Farouk Maricar, MT', ''),
('19641231 199103 1 034', 'Dr.Ir. Hartawan, MT', ''),
('19650318 199103 1 003', 'Dr.Ir. Syamsul Asri, MT', ''),
('19650424 199203 1 003', 'Ir. Tajuddin Waris, MT', ''),
('19650630 199103 1 004', 'Dr. Ir. Zulkifli Djafar, MT', ''),
('19650701 199403 2 001', 'Dr.Ir. Idawarni, MT', ''),
('19650928 200003 1 002', 'Dr. Adi Tonggiroh, ST.,MT', ''),
('19660128 199103 2 003', 'Dr.Ir. Rosmalina Hanafi, M.Eng', ''),
('19660201 199202 2 002', 'Ir. Zaenab, MT', ''),
('19660205 199103 1 003', 'Dr.Ir. Rusdi Usman Latif, MT', ''),
('19660409 199703 1 002', 'Dr.Ir. Irzal Nur, MT', ''),
('19660817 200012 1 001', 'Dr. Sufriadin, ST.,MT', ''),
('19661218 199303 2 001', 'Dr.Ir. Mimi Arifin, M.Si', ''),
('19661231 199403 1 022', 'Ir. Samsuddin, MT', ''),
('19670319 199203 2 001', 'Dr.Eng.Ir. Rita Tahir Lopa, MT', ''),
('19671119 199802 2 001', 'Dr.Ir. Haerany Sirajuddin, M.T', ''),
('19671218 199512 2 001', 'Nurmaida Amri, ST.,MT', ''),
('19671231 199202 1 001', 'Prof.Dr.Ir. Ansar, MT.', ''),
('19680301 199702 2 001', 'Dr.Ir. Zuryati Djafar, MT', ''),
('19680420 199702 1 001', 'Dr.Muhammad Sapri, ST.,M.Eng,PM', ''),
('19680529 200212 1 002', 'Prof.Dr. Muh. Wihardi Tjaronge, ST., M.Eng', ''),
('19680718 199309 1 001', 'Dr.Ir. Muhammad Ramli, MT', ''),
('19681005 199603 1 002', 'Dr. Sapta Asmal, ST., MT', ''),
('19681022 200003 2 001', 'Wiwik Wahidah Osman, ST., MT', ''),
('19690124 199303 1 001', 'Dr.Ir. Zulfajri Basri Hasanuddin, M.Eng', ''),
('19690201 199412 1 001', 'Dr. Elyas, ST., M.Eng', ''),
('19690304 199903 1 004', 'Dr.Eng.Abdul Mufti Radja, ST., MT', ''),
('19690308 199512 1 001', 'Prof. Baharuddin, ST, M.Arch.,Ph.D', ''),
('19690404 200003 1 002', 'Andi Haris Muhammad, ST.,MT.,Ph.D', ''),
('19690407 199603 1 003', 'Dr. Mohammad Mochsen Sir, ST., MT', ''),
('19690612 199802 1 001', 'Dr.Edward Syarif, ST.,MT', ''),
('19690802 199702 1 001', 'Dr. Taufiqur Rachman, ST., MT', ''),
('19690825 199903 1 001', 'Dr. Ilham Alimuddin, ST.,M.GIS.', ''),
('19690924 199802 1 001', 'Dr.Eng. Asri Jaya H.S., ST., MT', ''),
('19691011 199412 1 001', 'Ir. Amrin, MT', ''),
('19691026 199412 2 001', 'Dr.Eng. Ir. Dewiani, MT', ''),
('19700404 199703 1 001', 'M. Yahya, ST.,M.Eng', ''),
('19700426 199412 1 001', 'Farianto Fachruddin L., ST., MT', ''),
('19700606 199412 2 001', 'Dr.Ir. Ulva Ria Irvan, MT', ''),
('19700705 199702 1 002', 'Dr. Sultan, ST., MT', ''),
('19700710 200212 1 001', 'Dr.Eng. Farid Mardin, ST.,MT', ''),
('19700804 199702 2 001', 'Afifah Harisah, ST.MT.,Ph.D', ''),
('19700810 199802 1 001', 'Dr.Eng. Rosady Mulyadi, ST., MT', ''),
('19701001 200012 1 001', 'Dr. Moh. Rizal Firmansyah, ST.,MT', ''),
('19701005 200801 2 026', 'Dr. Aryanti Virtanti Anas, ST., MT.', ''),
('19701108 199412 1 001', 'Prof.Dr. Rudy Djamaluddin,ST.,M.Eng.', ''),
('19701202 199903 1 002', 'Dr. Hady Efendy, ST.,MT', ''),
('19710101 201012 1 001', 'Dr.Phil.nat.Sri Widodo, ST.MT', ''),
('19710207 200012 1 001', 'Surya Hariyanto, ST.,MT', ''),
('19710219 199903 1 002', 'Dr.Eng.Ihsan,  ST.,MT', ''),
('19710316 199702 1 001', 'Dr.Eng. Nasruddin, ST.,MT', ''),
('19710505 200604 1 002', 'Riswal  K., ST.,MT', ''),
('19710512 200812 2 001', 'Meinarni Thamrin, ST.MT', ''),
('19710825 199903 1 002', 'Rahimuddin, ST.,MT.,Ph.D', ''),
('19710925 199903 2 001', 'Dr.Eng. Asniawaty, ST.,MT', ''),
('19711128 200501 1 002', 'Dr.Eng. Purwanto, ST.,MT', ''),
('19711221 199802 1 001', 'Dr.Eng. Andi Erwin Eka Putra, ST., MT', ''),
('19720118 199802 1 001', 'Daeng Paroka, ST.,MT.,Ph.D.', ''),
('19720202 199802 1 001', 'Baharuddin, ST.,MT', ''),
('19720202 199903 1 002', 'Wahyuddin, ST.,MT', ''),
('19720309200003 1 002', 'Dr. Tri Harianto, ST.,MT', ''),
('19720330 199512 1 001', 'Rafiuddin Syam, ST.,M.Eng,Ph.D', ''),
('19720424 200012 2 001', 'Dr.Eng. Muralia Hustim, ST.,MT', ''),
('19720619 200012 2 001', 'Dr.Eng. Rita Irmawaty, ST.,MT', ''),
('19720818 199903 2 002', 'Dr. A.Sitti Chairunnisa M., ST., MT', ''),
('19720825 200003 1 001', 'Dr. Eng.Jalaluddin, ST.,MT', ''),
('19720828 199903 1 003', 'Dr.Eng. Wardi, ST. M.Eng.', ''),
('19720908 199702 2 001', 'Dr. A. Ejah Umraeni Salam, ST.,MT', ''),
('19721010 200003 1 001', 'Silman Pongmanda, ST.,MT', ''),
('19721114 200501 2 001', 'Novy Nur R.A Mokobombang, ST.,Ms.TM', ''),
('19721119 200012 1 001', 'Irwan Ridwan Rahim, Dr.Eng. ST.,MT', ''),
('19730123 200012 1 001', 'M. Rusydi Alwi, ST.,MT', ''),
('19730206 200012 1 002', 'Dr. Eng. Suandar Baso, ST.,MT', ''),
('19730208 200604 2 001', 'Imriyanti, ST.,MT', ''),
('19730306 199802 1 001', 'Dr.Muhammad Asad Abdurrahman, ST.,M.Eng.', ''),
('19730314 200012 1 001', 'Asran Ilyas, ST, MT.,Ph.D', ''),
('19730328 200604 2 001', 'Marly Valenti Patandianan, ST.,MT', ''),
('19730423 200812 1 001', ' Dr.Eng. Firman Husain, ST.MT', ''),
('19730512 199903 1 002', 'Dr.Eng. Mukhsan Putra H., ST.,MT', ''),
('19730530 199802 2 001', 'Dr.Rosmariani Arifuddin, ST.,MT', ''),
('19730709 200003 1 001', 'Dr.Eng.Achmad Yasir Baeda, ST.,MT', ''),
('19730712 200003 2 002', 'Ariningsih Suprapti, ST.,MT', ''),
('19730828 200012 2 001', 'Dr. Wihdat Djafar, ST.,MT', ''),
('19730922 199903 1 001', 'Dr. Muhammad Niswar, ST,MIT.', ''),
('19730926 200012 1 002', 'Dr.Eng. Muhammad Isran Ramli, ST.,MT', ''),
('19731003 200012 2 001', 'Dr.Eng. Meutia Farida, ST.,MT', ''),
('19731010 199802 1 001', 'Amil Ahmad Ilham, ST.,MIT,,Ph.D', ''),
('19731118 199803 2 001', 'Dr. Indar Chaerah Gunadin, ST.,MT', ''),
('19731201 200012 2 001', 'Dr. Kartika Sari, ST.,MT', ''),
('19740318 200604 1 001', 'Azhury, ST.,MT', ''),
('19740415 199903 1 001', 'Dr.Eng. Lukmanul Hakim Arma., ST.,MT', ''),
('19740426 200501 1 002', 'Dr.Eng. Adnan, ST,MT', ''),
('19740530 199903 1 003', 'Prof.Dr. Eng. Syafaruddin, ST., M.Eng.', ''),
('19740810 200012 1 001', 'Abd. Haris Djalante, ST.,MT', ''),
('19741006 200812 1 002', 'Dr.Eng.Abdul Rachman Rasyid, ST.M.Si', ''),
('19741024 200312 1 002', 'Dr.Eng. Muhammad Rusman, ST.,MT', ''),
('19741205 200012 2 001', 'Hasniaty A., ST.,MT', ''),
('19741211 200501 1 001', 'Mukti Ali, ST., MT.,Ph.D', ''),
('19741220 200501 2 001', 'Isfa Sastrawati, ST., MT.', ''),
('19750203 200012 2 002', 'Dr.Eng. Intan Sari Areni, ST.,MT', ''),
('19750313 200912 1 003', 'Ady Wahyudi Paundu, ST.,MT', ''),
('19750322 200212 1 001', 'Dr. Hairul Arsyad, ST.,MT', ''),
('19750404 200012 1 001', 'Dr. Yusran, ST.,MT', ''),
('19750507 200501 2 002', 'Retnari Dian Mudiastuti, ST.,M.Si', ''),
('19750605 200212 1 003', 'Dr. Chairul Paotonan, ST., MT.', ''),
('19750605 200212 1 004', 'Prof.Dr.Ing. Faizal Arya Samman, ST.,MT', ''),
('19750608 200501 1 003', 'Dr. Muhammad Zubair M. Alie, ST,MT', ''),
('19750623 201504 2 001', 'Roslinda Ibrahim, S.P.,M.T', ''),
('19750716 200212 1 004', 'Dr. Indrabayu, ST.,MT', ''),
('19750827 200501 1 002', 'Dr.Rustan Tarakka, ST.,MT', ''),
('19750929 199903 1 002', 'Dr.Eng. Ilham Bakri, ST.,MT', ''),
('19751124 200604 2 032', 'Syahriana Syam, ST.,MT', ''),
('19751205 200501 2 002', 'Dr. Merna Baharuddin, ST, M.Tel.Eng.', ''),
('19751214 201504 1 001', 'Dr.Eng. Ibrahim Djamaluddin', ''),
('19760216 201012 1 002', 'Dr.Eng. Andi Amijoyo Mochtar, ST.,M.Sc', ''),
('19760314 200212 2 005', 'Rahmi Amin Ishak, ST.,MT', ''),
('19760406 200312 1 002', 'M. Bachtiar Nappu, ST.,MT.,Ph.D', ''),
('19760503 200212 1 001', 'Suharman Hamzah,ST.,MT.,Ph.D', ''),
('19760531 200501 1 004', 'Andi Subhan Mustari, ST', ''),
('19760602 200501 1 002', 'Dr.Eng.Irwan Setiawan, ST.,MT', ''),
('19760707 200501 1 002', 'Dr.Eng.Ardy.,ST.,M.Eng', ''),
('19760719 200112 1 001', 'Dr. Sabaruddin Rahman, ST,MT', ''),
('19760904 200212 2 001', 'Dr. Nurul Nadjmi, ST.,MT', ''),
('19760914 200801 1 006', 'Dr. Ikhlas Kitta, ST.,MT', ''),
('19761021 200812 1 002', 'Dr. Syarifuddin M.Parenreng, ST.,MT', ''),
('19770103 200801 1 009', 'Fauzan, ST, MT', ''),
('19770217 200112 1 001', 'Andi Husni Sitepu, ST.,MT', ''),
('19770322 200501 1 001', 'Yusri Syam Akil, ST., MT.,Ph.D', ''),
('19770707 200501 1 001', 'Dr. Muhammad Syahid, ST.,MT', ''),
('19770817 200501 1 003', 'Muh. Anshar, ST.M.Sc..Ph.D', ''),
('19770818 200212 1 002', 'Muhibuddin, ST', ''),
('19771121 200501 2 001', 'Siti Hijraini Nur, ST.MT', ''),
('19771211 200112 2 001', 'Nilda., ST.,MT ', ''),
('19771214 200501 1 002', 'Dr.Eng. Hendra Pachri, ST, M.Eng', ''),
('19780424 200112 2 001', 'Ardiati Arief, ST.,MTM.,Ph.D', ''),
('19780428 200312 2 002', 'Dr. Hasdinar Umar, ST.,MT', ''),
('19780719 200604 2 002', 'Hasnawiyah Hasan, ST.,M.Eng', ''),
('19790117 200112 2 002', 'Dr.Yashinta Kumala Dewi, ST.,MIP.', ''),
('19790225 200212 2 001', 'Haryanti Rivai, ST.,MT.,Ph.D', ''),
('19791112 200812 2 002', 'Dr.Eng. Novriany Amaliyah, ST.MT', ''),
('19791226 200501 1 001', 'Dr.A. Arwin Amiruddin, ST, MT.', ''),
('19800120 200212 2 002', 'Dr.Eng. Asiyanthi T.Lando, ST., MT.', ''),
('19800428 200512 1 001', 'Dr.Eng. Adi Maulana, ST.,M.Phil', ''),
('19800618 200501 1 004', 'Hamzah, ST.,MT', ''),
('19810211 200501 1 003', 'Dr.Eng. Faizal, ST.,M.Inf.,Tech.,M.Eng', ''),
('19810425 200812 1 001', 'Dr.Eng. Bambang Bakri, ST.MT', ''),
('19810606 200604 1 004', 'Dr. Saiful, ST.,MT', ''),
('19811212 201212 2 002', 'Dahniar, ST.,MT', ''),
('19820202 201212 1 003', 'Armin Darmawan, ST.,MT', ''),
('19820216 200812 2 001', 'Elly Warni, ST.MT', ''),
('19820630 201212 2 001', 'Ida Rachmaniar Sahali, S.T.,M.T.', ''),
('19830510 201404 1 001', 'A. Ais Prayogi Alimuddin, S.T.,M.Eng', ''),
('19830714 200604 2 001', 'Fitriyanti Mayasari, ST.,MT', ''),
('19830816 201404 1 001', 'Farid Sitepu, S.T.,M.T.', ''),
('19831114 201404 2 001', 'Rini Novrianti Sutardjo Tui, ST.,MT', ''),
('19831222 201012 2 003', 'Venny Veronica Nataliah, ST.,MT', ''),
('19840126 201212 1 002', 'Azwar Hayat, ST.M.Sc.,Ph.D', ''),
('19840403 201012 1 004', 'Dr.Eng. Zulkifli Tahir, ST.M.Sc', ''),
('19850526 201212 2 002', 'A. Ardianti, S.T., M.T.', ''),
('19850824 201212 2 004', 'Sri Aliah Ekawati, ST.,MT', ''),
('19860119 201404 2 001', 'Pratiwi Mushar, S.T.,M.T.', ''),
('19870425 201903 1 012', 'Habibi, S.T.,M.T.', ''),
('19870719 201903 2 012', 'Andi Karina Deapati, S.Ars.,MT', ''),
('19870824 201903 2 009', 'A. Dian Eka Anggriani, S.T.,M.T', ''),
('19880130 201903 1 005', 'Sahabuddin, S.T.,M.T.', ''),
('19880621 201504 2 003', 'Andini Dani Achmad, S.T.,M.T.', ''),
('19891029 201809 2 001', 'Nadzirah Ikasari. S, S.T.,M.T. ', ''),
('19891201 201903 2 013', 'A. Besse Riyani Indah, ST.,MT ', ''),
('19920226 201903 1 009', 'Gerard Anonini Duma, S.T.,M.T', ''),
('19930309 201903 1 014', 'Laode Muh. Asfan Mujahid, ST.,MT', '');

-- --------------------------------------------------------

--
-- Table structure for table `judul`
--

CREATE TABLE `judul` (
  `id_judul` int(11) NOT NULL,
  `nim` varchar(32) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pembimbing1` varchar(64) NOT NULL,
  `pembimbing2` varchar(64) NOT NULL,
  `penguji1` varchar(64) NOT NULL,
  `penguji2` varchar(64) NOT NULL,
  `penguji3` varchar(64) NOT NULL,
  `judul_departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kps`
--

CREATE TABLE `kps` (
  `username` varchar(64) NOT NULL,
  `departemen` varchar(64) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kps`
--

INSERT INTO `kps` (`username`, `departemen`, `foto`) VALUES
('informatika', 'Teknik Informatika', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `strata` varchar(2) NOT NULL,
  `angkatan` int(4) NOT NULL,
  `departemen` varchar(50) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `request_hasil` tinyint(1) NOT NULL,
  `hasil` tinyint(1) NOT NULL,
  `request_tutup` tinyint(1) NOT NULL,
  `alumni` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `strata`, `angkatan`, `departemen`, `foto`, `request_hasil`, `hasil`, `request_tutup`, `alumni`) VALUES
('D121171001', 'RIEKA ZALZABILLAH PUTRI', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171002', 'GIYANI RAYANI ', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171003', 'NURINA RAHAYU', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171004', 'AMIRUDDIN', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171005', 'MUHAMMAD GHALIB S.M', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171006', 'AHMAD REZA SYAHBANA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171007', 'YUSRIL', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171008', 'IRMA JUFRI ', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171009', 'HERLINA ANWAR', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171010', 'TASLINDA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171011', 'IRFAN RIFAT', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171012', 'FITRIANI NASIR', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171013', 'JUMRAINI J. JAMALUDDIN', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171014', 'DEVY NOVIANI BADJARAD', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171015', 'MUHAMMAD YUSUF', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171301', 'RINI FEBRIANTI RIAL', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171304', 'MUHAMMAD AKIB', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171305', 'HAIRUL QALAM HAKIM', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171306', 'GILBERT HYMAN GOES', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171307', 'A. MUHAMMAD GHAZY AYMAN', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171308', 'MUHAMMAD IRZAM KASYFILLAH', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171309', 'ILHAM', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171310', 'PRASETYA ABDI PUTRA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171312', 'MUH. ANDAR SUGIANTO', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171313', 'ANNAS CASMAWAN AHMAD', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171314', 'ANUGERAH SEPTIANSYAH', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171316', 'MUHAMMAD ZUL FAHMI SADRAH', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171317', 'MUH IKBAL', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171319', 'A.PRISKA SASKIA SINRANG', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171320', 'MUHAMMAD ILHAM ASKARI', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171321', 'MUH. ODY ALIFKA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171322', 'DWIJATO GAMAS PURWOATMOJO', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171323', 'ANDI MUH. RIZKY', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171325', 'A. MUH. IRSYAD BASO', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171501', 'KHAIRUL HIDAYAT', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171502', 'MUHAMMAD WAHYUDI R SUMARA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171503', 'MUHAMMAD NAUFAL FALIQ', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171504', 'IRFANDI KURNIAWAN ANWAR', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171505', 'MUHAMMAD ABDUH. MF', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171506', 'MUHAMMAD BISHRAM YASHIR ALFARIZI AMINUDDIN', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171507', 'IKHSAN JIHADI', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171508', 'IRMANSYAH SAAD', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171509', 'SUCI AMALIYAH MUZAKKIR', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171510', 'MUH. ALFARABI ALIF PUTRA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171511', 'ZULKIFLI AL-AMIN LOTHIAN', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171512', 'MUHAMMAD IKHWAN RAMADHANI', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171513', 'MUHAMMAD RIDHO RAMADHAN', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171514', 'FAUZAN ALIF ANWAR', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171515', 'ILMI NURRAHMA ISMAIL', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171516', 'MOCH. WAHYU FAISAL', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171517', 'ADY AHMADI SUWARDI', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171518', 'MUHAMMAD HIDAYAT', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171519', 'GLENN CLAUDIO IVAN PETRUS', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171520', 'SAPHIRA NOER SAKINA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171521', 'NUBLAN AZQALANI MUIS', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171522', 'BILLY CHEN', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171523', 'MUHAMMAD FADHIL BIN BAHRUNNIDA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171525', 'AL AZHAR DP', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171526', 'EUGENIUS WAHYUDIARTO', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171527', 'ANDI SUNGKURUWIRA BATARA UNRU', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171528', 'ARIES WAHYU SYAPUTRA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171701', 'HERRYTS TIMISELA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171702', 'MUHAMMAD RIDWAN KAMBORI', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171703', 'MUHAMMAD KAISAR AGUNG DAENG MARAJA', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121171704', 'ACHMAD ASJAR BAARI MILLANG', 'S1', 2017, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181001', 'ALFIAN ALDY HAMDANI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181002', 'NUR HASANA ABUNAWAS', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181003', 'MUHAMMAD ALWI KAYYUM', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181004', 'NURUL UTAMI RUSLI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181005', 'SYAHRIL SAPUTRA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181006', 'FRANSYA BELLA JACOB PADUDUNG', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181007', 'MUHAMMAD SHALEH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181008', 'DEA IVANKA MALAHA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181009', 'ARIAN WICAKSONO', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181010', 'SYAHRIL RAMADHAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181011', 'SRI RAHAYU INDAL FATRA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181012', 'PIRDA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181014', 'KAMTINA MUSYFIRAH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181015', 'NUR HIKMAH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181016', 'REZA ARISANDY SAFRUDDIN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181017', 'DARUL IKHSAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181018', 'MUH. FAUZUL ICHWAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181019', 'MUHAMMAD ISHAK RAMADHAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181020', 'ICHSANUL ALIFWAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181021', 'MUH. NAUFAL FEBRIANTAMA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181022', 'TIARA YANIA IFANI LAKITA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181023', 'TAMARA AULIANI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181024', 'AINUN ANNISA KAHAR', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181025', 'ANDI IFFAT AINIYYAH HAMKA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181026', 'INDAH MULYA RAUF MANDE', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181027', 'AYU ADHE PUTRI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181301', 'NURUL FAUZAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181302', 'MUH IRZAN ILYAS', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181303', 'MUHAMMAD RIDHOI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181304', 'KURNIA MALIK', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181305', 'AKHMAD AINUL FIQRAN ROSADY', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181306', 'ALBERTO', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181307', 'MUHAMMAD SABRI S', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181308', 'DEA NURHIKMA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181309', 'AHMAD AFFANDY', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181310', 'M. NURIDHAM RIFANDY WILDAM', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181311', 'ARYANTI KASIM', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181312', 'MUHAMMAD FAUZAN AMZAR', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181313', 'JABALNUR', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181314', 'TATYA LATIFA KARIMA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181315', 'FADILAH RAMADHANI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181316', 'SURIANI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181317', 'PUTRI ALISSYAH SABRINA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181318', 'YANUARSYAH FITRAH INDRA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181319', 'WAHYU AHMAD HASAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181322', 'NUR IMAM MASRI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181323', 'M. RIZKY MAULANA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181324', 'WIRA SATYA TRI ALMI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181325', 'FIQRI ABDULLAH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181326', 'IRHAM ABDULLAH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181327', 'SALAHUDDIN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181328', 'RAHMADANI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181329', 'RACHMAT MAULANA NUR', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181330', 'RYAN TERRY THAHIR', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181331', 'RIVALDO TIKU ALI SULLE', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181333', 'MUH AMDAR FEBRIANSYAH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181334', 'IGNATHIUS RAHARDIANTO PATIUNG', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181336', 'RENDY JUNIARTA TODINGBUA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181337', 'NURFADILLAH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181338', 'TRY REZKI RAHMAWATI TAMRIN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181339', 'NURFAIDAH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181340', 'MARDIANI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181341', 'WILLIAM WIJAYA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181342', 'A.MEIDIAN HADI MACHMUD', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181501', 'IRFADIANA NURHASANAH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181503', 'MUHAMMAD NUR FAISI S', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181504', 'RICHARD CHRISTOPHER SUWANDI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181505', 'ADRIAN YONAM LOVARI MINGGU', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181506', 'DANDY GARDA DIRGANTARA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181507', 'ANDI ENDANG ADININSI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181508', 'ROFIFAH NURUL ANNISA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181509', 'A. M. ICHSAN NOER ABUSTAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181510', 'MUH. DZULFIQAR DHIYA`ULHAQ M.', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181511', 'ANDI ANDHIKA PANGERANG PALLAMPA', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181512', 'MUHAMMAD SYAFAAT SUJARMAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181513', 'MUH.NAUFAL AKRAM', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181514', 'MUHAMMAD GUSTI DIMAS', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181515', 'WA ODE ARUM PUTRI WAHIDAH DANI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181516', 'M. EMIRAT MILLENIUM TRY', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181517', 'SERWIL HAN YON PIRADE', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181518', 'MUHAMMAD FIKRI KHAIKAL', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181519', 'NOAH ROFSAN TIRAYOH', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181520', 'MAGHFIRAH TENRI SUMPALA ZANI', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181701', 'MUHAMMAD FANDLY FADLURACHMAN', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121181702', 'FITRAH NURUL LATIFA SUYOTO', 'S1', 2018, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191001', 'MUHAMMAD HIJIR ISMAIL', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191003', 'ALIFAH NUR FADILA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191004', 'MUHAMMAD IZZUDDIN GASSING', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191005', 'PUTRI MENGGA POLI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191006', 'AFIFAH MARDHIYAH RAMLAN', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191007', 'MUH. YOGA TRIATMOJO HW', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191008', 'IYAD RAMADHAN ZULFIKAR', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191009', 'ANDI AFWAN ALI DAMOPOLII', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191010', 'MUH. ZUHAIR ROBBANI M. NAI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191012', 'HAFIZ MOHAMMAD ISKANDAR', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191013', 'ANDI WIDAD SUCITRA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191014', 'SAYYID SHIDDIQ MASAGENA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191015', 'ALI BABA ASRIL MAKMUR', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191016', 'DEBI RIZKY RAMADHANA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191017', 'WIRA DRANA WASISTHA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191018', 'ANNISA FITRI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191019', 'ANDI BESSE ADYA FEBRYANA ADIAS POETRI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191020', 'PAHRUL', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191021', 'ABDUL KHALIK', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191022', 'MUH.NURFAIS RAMADHAN', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191024', 'MUHAMMAD ZAKI ZAIM ZHAFIRIN', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191025', 'ALI SAKIR AMAR AMRI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191026', 'MOH. ABIB SAFAQDILLAH', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191027', 'DANY PRIHADI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191029', 'AZZAHRA ZALZABILA AR', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191030', 'LUTFIAH SALIM', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191031', 'RODHIYAT NUR FAUZI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191032', 'NURDITA FAHIRA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191033', 'WILLIAM ADAM', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191034', 'NOVRINDA AGIL TANDIERA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191035', 'MUH.RAJAB ISRAFIL', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191036', 'GERALDO MONANG RAJA SIHOTANG', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191037', 'SABDA ANSARI BAKE', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191038', 'ABD KADIR BUA RAMADHAN', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191039', 'ARFANDY ADIMURFIQ', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191041', 'MUHAMMAD REZALDI YANATA PUTRA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191042', 'ARTIA AUDRIAN ARYATAMA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191043', 'MIRZA ZHULHAM AHMAD', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191044', 'MARCELLINO PIRONO', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191045', 'SILA FARSIDIA PUTRI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191046', 'NURUL PUTERI RAMADHANI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191047', 'BRILLIANITA REZKI HIJNUR', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191048', 'AHMAD FATHANAH M.ADIL', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191049', 'FADHIL KHUSNUL HAKIM', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191050', 'SITTI RAHMA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191051', 'REINHART WIBISONO SOPLANTILA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191052', 'JUAN JIMMY DWIANGGA AL', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191053', 'DIRQA HARAKA PUTRA NURSADIH', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191054', 'ANDI GIGATERA HALIL MAKKASAU', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191055', 'ANUGRAH THEOSYAF WILLY ADJI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191056', 'NUR ANNISA YUSRAH PUTRA DJAYA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191057', 'A. DIATRI NURAZKIYAH', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191058', 'SATRIA WIRATAMA SANGGA BUANA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191059', 'SEPRIANTO', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191060', 'ANDRE PEMBRIAN SOEAN', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191064', 'MUHAMMAD ZULFIKAR ARIS', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191065', 'ARIF PUTERA WIJAYA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191066', 'AHMAD WALID JAMAL', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191067', 'YUSUF A MANSUR', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191068', 'MUHAMMAD IJLAL NURHADI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191070', 'PUTRI AYU NENGSIH', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191071', 'MUHAMMAD ARFANI ASRA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191072', 'MUHAMMAD FAUZAN ABRAR', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191074', 'A. MUH RAYYAN EKA PUTRA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191075', 'MIRNAWATI DARWIS', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191077', 'BRIEL RICHICHO ALAMAKO', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191078', 'ALFIAN ARYA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191079', 'ANDI RUSMIATI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191081', 'MUHAMMAD FATURRAHMAN ABDULLAH', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191082', 'FARHAN ADYATAMA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191083', 'DEA WAHSA SAPUTRI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191084', 'ILHAM', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191085', 'ARYA SONA IKMALATUL HUDA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191086', 'RESKITA AMELIA', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191087', 'SADLY HERMANTO', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191088', 'LEONIC FERDY ARDIANSYAH', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191089', 'KHAEDAR SYAIFULLAH AHMAD', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D121191090', 'JAVIER YOHANES PALINGGI ANGGUI', 'S1', 2019, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113001', 'MOHAMMAD FADIL AKBAR AMPERANTO', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113004', 'MUHAMMAD IDMARIL AMRI', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113014', 'MULIANI', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113029', 'NURDIANSYAH ALIMUDDIN', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113033', 'ZANDY RIZALDY', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113034', 'MUHAMMAD ARYA SURYA P.', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113037', 'AHMAD RIDWAN S.', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113303', 'ZALDY EKA PUTRA', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113305', 'ANDI PAWILOI', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113319', 'MUH ARYA RUMANGA', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113504', 'FADHIL AFIF', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113510', 'MUH ILHAM AKBAR R', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113518', 'ARMAN SYAM', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42113521', 'RUSDIANSYAR HAERUS', 'S1', 2013, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114005', 'MUH. RIZKY EKA ARLIN', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114007', 'IRFAN ALAMSYAH', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114010', 'FITRIANI IDRUS', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114015', 'WINDA ASTIYANTI AZIS', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114018', 'RAHMAT FIRMAN', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114303', 'MUH. ARDIANSYAH AR', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114305', 'ANISAH MAYANG SARI', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114308', 'YAKIP', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114311', 'JAMALUDDIN', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114312', 'M. ZULFIKRI AL QOWY YUSRING', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114313', 'MUHAMMAD KAHFI FAJRI KUDDUS', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114314', 'HERMAWAN SAFRIN', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114318', 'ANASTASIA YUKI A.', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114319', 'MUHAMMAD SHADIQ', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114505', 'NUR ABDULRAHMAN', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114506', 'AHMAD SETIADI', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114509', 'CINDY O LOLO BULAN', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114512', 'ULFAH ROJIYYAH', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114513', 'MUH. NUR ALAMSYAH', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114514', 'SYARIF HIDAYATULLAH', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114517', 'INKA GUSTIANY MALLISA', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42114518', 'AHMAD KURNIAWAN SYARIF', 'S1', 2014, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115002', 'SAID SYAMIL AMAS', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115004', 'AINUN MARDIAH', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115006', 'KHUSNUL KHATIMA', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115007', 'ANDI NURUL SRI UTAMI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115008', 'SABTIAN JULIANA', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115010', 'RYAN RAFLI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115011', 'ARDYA DWI RAHMASARI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115012', 'CHARINA', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115013', 'DEWI KURNIA SAFITRI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115016', 'UMNIYAH NUR APRILYAH', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115017', 'BEATRIX WANDA', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115018', 'DIAN INDANI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115020', 'LAURA NATALIA NAINGGOLAN', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115022', 'JUSMIATI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115023', 'MARJONO UMAR', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115304', 'FIQAR APRIALIM', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115305', 'ROSIHAN ARDIANSYAH', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115307', 'DILA AMALIA', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115308', 'KELVIN', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115309', 'ABDUL RASYID KADIR', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115310', 'ACHMAD CHAEDAR', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115312', 'FATHUR RIZQI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115316', 'MUHAMMAD ZULFACHRIL ASIARI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115317', 'AHMAD JENAR', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115318', 'REKA REGINA', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115319', 'CHRISTINE Y PHANDI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115320', 'FADEL REZKY RAMADHAN', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115321', 'WAHID AFGHANI RASYID ASSYKIN', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115322', 'BAYAZID SUSTAMI MOHAMMAD NASIR', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115501', 'MUHAMMAD AINAL MUNZIR', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115502', 'ANDI MUHAMMAD FATHURRACHMAN', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115508', 'ARTAMEVIA KHAIRUNNISA EKA AMRULLAH', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115509', 'NUR ARIFA ISNAENI NAWIR', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115510', 'A. ARDIANSYAH YUSUF', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115511', 'SITTI HARVIYANTHI RAHAYU SAKTI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115512', 'RIZKY NADYA FATMA', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115513', 'MUHAMMAD FUAD', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115515', 'MUH.MUHTASAN', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115516', 'A. ERAS ACHMAD MARZOEKI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115519', 'KASMIRA SARI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115520', 'A. MUH. OGIE RAHMAT', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115521', 'GIYAN WIRAYUDA PRATAMA', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42115701', 'ZULKIFLI', 'S1', 2015, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116002', 'RYA DITA PURNAMA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116003', 'ASTUTI MAYANGSARI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116004', 'SITTI NUR FADILLAH', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116005', 'AYU LESTARI RAMADANI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116006', 'STEVE LUKIS', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116007', 'RIZKY ALFIANSYAH', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116008', 'MUH. KHAERIL SYAM', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116009', 'IBNU GAURY', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116010', 'RINY YUSTICA DEWI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116011', 'SAFINA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116012', 'LUTFI QADRI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116014', 'TUTI AMALIA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116015', 'ELBERT TIMOTHY THOMAS', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116016', 'ISMAYANTI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116017', 'MUH FATHIN ABDILLAH HALIK', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116019', 'YOHANES KASI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116020', 'GHINA SYUKRIYAH RANIA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116022', 'ANDI MUHAMMAD RIFKI AL QADRI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116301', 'MALYANA ARIANI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116302', 'NISHRINA NURUL AMIRAH', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116303', 'ANDI MARIMAR MUCHTAMAR', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116304', 'MUHAMMAD RAEDI RADIFAN', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116305', 'MUH. IRSYAD ASHARI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116306', 'AFIFAH ILHAM', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116307', 'MUTHALIA ANNISA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116309', 'AHMAD DARTIAN AGUM PRADANA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116311', 'KEVIN CHANDRA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116312', 'DIRGA UTAMA KAMAL', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116314', 'CICI PURNAMASARI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116315', 'MUHAMMAD YUSRIL ADRI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116316', 'DIKI SISWANTO', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116501', 'DHINDA FITRI WILUDJENG', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116502', 'ANDI MUH. AGUNG ALIF HIDAYAT', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116503', 'ASRI OKTIANAWATI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116504', 'ALIF TRI HANDOYO', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116505', 'MUHAMMAD MUSYAWIR', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116506', 'PUTRI ANGRIANI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116507', 'A.FIQRAM ABDILLAH ASTRI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116508', 'TEDI SETIADY PAKIDING BA`KA`', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116509', 'ANDI BATARA PARENRENGI ISMAIL', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116510', 'FABYOLA LARASATI MASYITA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116511', 'KEVIN JORDI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116512', 'DANDI WISNU SHOREANDI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116513', 'IRHAM SAHBANA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116514', 'PATRICIA VHIOLA PALADA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116515', 'MUHAMMAD ARIF MAHANI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116516', 'ANDI WIJAYA', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116518', 'ANDI AMELIA RAMADANTI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116520', 'MUHAMMAD FACHRUL ALAM', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116521', 'NURUL MUSFIRAH', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116522', 'ANDRIAWAN SUDRAJAT RAMLI', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116523', 'SULTHAN ABDULLAH NURDAM', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0),
('D42116524', 'SAYYID MUHAMMAD ILHAM ASSEGAF', 'S1', 2016, 'Teknik Informatika', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `seminar`
--

CREATE TABLE `seminar` (
  `seminar_id` int(11) NOT NULL,
  `seminar_nim` varchar(32) NOT NULL,
  `seminar_tanggal` varchar(32) NOT NULL,
  `seminar_waktu` int(11) NOT NULL,
  `seminar_tempat` varchar(64) NOT NULL,
  `seminar_pembimbing1_nama` varchar(64) NOT NULL,
  `seminar_pembimbing1_status` varchar(16) NOT NULL,
  `seminar_pembimbing2_nama` varchar(64) NOT NULL,
  `seminar_pembimbing2_status` varchar(16) NOT NULL,
  `seminar_penguji1_nama` varchar(64) NOT NULL,
  `seminar_penguji1_status` varchar(16) NOT NULL,
  `seminar_penguji2_nama` varchar(64) NOT NULL,
  `seminar_penguji2_status` varchar(16) NOT NULL,
  `seminar_jenis` varchar(32) NOT NULL,
  `seminar_status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_ujian`
--

CREATE TABLE `tempat_ujian` (
  `tempat_ujian_id` int(11) NOT NULL,
  `tempat_ujian_nama` varchar(100) NOT NULL,
  `tempat_ujian_departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(30) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `role`, `status`, `departemen`) VALUES
(4, 'superadmin', '21232f297a57a5a743894a0e4a801fc3', 'superadmin', 'superadmin', '', ''),
(56, 'informatika', '21232f297a57a5a743894a0e4a801fc3', '', 'kps', '', 'Teknik Informatika'),
(57, '19531221 198103 1 002', 'f095c9c5887ade211692ea33f2067924', 'Prof.Dr.Ir. Muhammad Yamin Jinca, MS.Tr', 'dosen', '', ''),
(58, '19531111 198003 1 009', 'e809096162b6a48e4c8530491211795b', 'Prof.Dr.Ir. M. Ramli Rahim, M.Eng', 'dosen', '', ''),
(59, '19540910 198303 1 003', 'e0bd1fef71de55dc84b3a87e79899067', 'Prof.Dr.Ir. M. Saleh Pallu, M.Eng', 'dosen', '', ''),
(60, '19620729 198703 1 001', '0957d1656d2a1012cfcff153b84aa669', 'Prof.Dr.Ir. Herman Parung,M.Eng.', 'dosen', '', ''),
(61, '19490608 197602 1 001', '539244b4fcb5f399d880a79c63b51640', 'Prof.Dr.Ir. Slamet Tri Sutomo, MS', 'dosen', '', ''),
(62, '19671231 199202 1 001', '30bc40413838bba0769525847689d9ae', 'Prof.Dr.Ir. Ansar, MT.', 'dosen', '', ''),
(63, '19490814 197903 1 002', '7bc8eea50a03b591b264e344c2a599f9', 'Prof.Ir. Mansyur Hasbullah, M.Eng', 'dosen', '', ''),
(64, '19630605 198903 1 005', '863b2f0aefb05dde61ffd81e65f32804', 'Prof.Dr.Ir. rer.nat A.M. Imran', 'dosen', '', ''),
(65, '19680529 200212 1 002', '16b4b557630360f12f9bdc47f6625397', 'Prof.Dr. Muh. Wihardi Tjaronge, ST., M.Eng', 'dosen', '', ''),
(66, '19621231 199003 1 024', '50afd27219d1246d337d01d233a57b11', 'Prof.Dr.Ir. Salama, MT', 'dosen', '', ''),
(67, '19611113 198702 1 003', 'a0e6c338b85f928f59bdfafce7aea970', 'Prof.Dr.Ir. Syamsul Bahri, M.Si', 'dosen', '', ''),
(68, '19611125 198802 1 001', '4924e14d52b4a513e90c4d390bcb77cd', 'Prof.Dr. Ir. Syafruddin Syarif, MT', 'dosen', '', ''),
(69, '19601231 198703 1  022', '9618e9f3c68d2abf268468fb0f9b6ad7', 'Prof.Dr.Ir. Andani, MT', 'dosen', '', ''),
(70, '19591220 198601 1 001', '1dda4b704d815f2f9beb49bf55ffd7e2', 'Prof.Dr.Ir.H.Nasaruddin, M.T.', 'dosen', '', ''),
(71, '19560827 198503 1 001', 'b670a59e2b7fa42c1b670c3afe77dc13', 'Dr.Ir. Luther Sule, MT', 'dosen', '', ''),
(72, '19550914 198702 1 001', '75c696c56b79ffd3431c9e1be79246b1', 'Ir. Baharuddin Mire, MT', 'dosen', '', ''),
(73, '19560421 198609 1 001', '7be06f37f956fcb8af6ac35d7d0f0bc6', 'Ir. Kaharuddin, MT', 'dosen', '', ''),
(74, '19591210 198601 1 002', '28c30d114970972c6e4ba6064d8baee2', 'Dr.Ir. Syarifuddin, M.Si', 'dosen', '', ''),
(75, '19601102 198811 1 001', 'e674bdb5c4e4b55b6d60df9d891500b6', 'Ir. Hamid Umar, MT.', 'dosen', '', ''),
(76, '19581203 198601 1 001', '31a3dc6394afc99d904e0863a2665629', 'Dr. Ir. M. Fauzy Arifin, M.Si', 'dosen', '', ''),
(77, '19650630 199103 1 004', '760ab6259be95c7fe66079f13281b34a', 'Dr. Ir. Zulkifli Djafar, MT', 'dosen', '', ''),
(78, '19591008 198703 1 001', 'd4f3dc5ca898b630f39b24e5cecfea01', 'Dr. Ir. Busthan, MT', 'dosen', '', ''),
(79, '19581210 198601 2 001', '5b5007e704e051121df648e322da8aa1', 'Dr.Ir. Rohaya Langkoke, MT', 'dosen', '', ''),
(80, '19520607 197802 1 001', 'd297e6d34a3923f2a5201e2b3c512d87', 'Prof.Dr.Ir. Onny Suryono Sutresman, MT', 'dosen', '', ''),
(81, '19570323 198601 1 001', '13ea60b6472d16aa9ed69ad4962b30aa', 'Ir. M. Fathien Azmy, M.Si', 'dosen', '', ''),
(82, '19520529 198011 1 001', 'e110b0e12846795a482053ce1b9e96ff', 'Prof.Dr.Ir. Victor Sampebulu, M.Eng', 'dosen', '', ''),
(83, '19690308 199512 1 001', '9a81e41436a5f98d23cd1f51d13c9c6c', 'Prof. Baharuddin, ST, M.Arch.,Ph.D', 'dosen', '', ''),
(84, '19640422 199303 1 001', '477b5f7d4ca91718386187c59cad3732', 'Prof.Ir.Sakti Adji Adisasmita,M.Si.M.Eng.Sc.,Ph.D', 'dosen', '', ''),
(85, '19581228 198601 2 001', '30f0aa368602e9756203a0ec06d1d4ba', 'Dr.Ir. Sumarni Hamid, MT', 'dosen', '', ''),
(86, '19620423 198802 2 001', 'd58fbd798472bd184df061abf98b8180', 'Dr.Ir. Misliah, MS.Tr', 'dosen', '', ''),
(87, '19580316 198810 1 001', '0c2c5b9559ff8c6fcc3072323bb5c6c4', 'Ir. Jamal, MT.', 'dosen', '', ''),
(88, '19600425 198811 1 001', '39aa43f6f2a28c5ebaf45534c496960a', 'Dr.Ir, Dipl.Ing. Ganding Sitepu', 'dosen', '', ''),
(89, '19560109 197903 1 001', '699e29e9c32b13206a5a9e662492f5e8', 'Ir. Thomas Tjandinegara, MS.ME', 'dosen', '', ''),
(90, '19600620 198802 2 001', '06d0f7d4957f1f2c6a4e9475db19d65a', 'Ir. Rosmani, MT.', 'dosen', '', ''),
(91, '19601231 198609 1 001', '5ada37f4991837585c83dcfe8b03ebb3', 'Dr.Ir. Muhammad Arsyad, MT', 'dosen', '', ''),
(92, '19640501 199002 2 001', '1046fb0954a84407e32b2d8973f53264', 'Ir. Serly Klara, MT', 'dosen', '', ''),
(93, '19660201 199202 2 002', '6714364674b8d834715ce76f93e11c19', 'Ir. Zaenab, MT', 'dosen', '', ''),
(94, '19601106 198601 2 001', 'd4792ea8d00277d12845522aeb4cf8c1', 'Dr.Ir. Sri Mawar Said, MT', 'dosen', '', ''),
(95, '19580810 198703 1 006', '057b3dd0812dfa19c126875ea7bc20af', 'Ir. Agustinus Tupenalay, M.Si', 'dosen', '', ''),
(96, '19670319 199203 2 001', '27fcfb0583e1ac13f7c6f110e11eea78', 'Dr.Eng.Ir. Rita Tahir Lopa, MT', 'dosen', '', ''),
(97, '19570914 198703 1 001', 'f86a0119c9273a08134adf4bb57da6b4', 'Ir. Ilyas Renreng, MT', 'dosen', '', ''),
(98, '19660128 199103 2 003', 'bf0eaf4a3a41f0d4b2bce255d2c07321', 'Dr.Ir. Rosmalina Hanafi, M.Eng', 'dosen', '', ''),
(99, '19690201 199412 1 001', 'ba7c892793db4e63111122f178961786', 'Dr. Elyas, ST., M.Eng', 'dosen', '', ''),
(100, '19591010 198703 1 003', '9667ce1df413771e6ab0c52dee3724c3', 'Dr.Ir. Abdul Rachman, MT', 'dosen', '', ''),
(101, '19621231 198903 1 031', '4f3dd09ce9bc53dea2e9cdab7df6e3c9', 'Ir. Juswan, MT', 'dosen', '', ''),
(102, '19600720 198702 1 001', '2f2ba3dfece6067e8f66528e10d26839', 'Ir. Gassing, MT', 'dosen', '', ''),
(103, '19690124 199303 1 001', '0e405571601ec23437f1aa448e411c87', 'Dr.Ir. Zulfajri Basri Hasanuddin, M.Eng', 'dosen', '', ''),
(104, '19660205 199103 1 003', '4b95c103853cda016994e2130367e254', 'Dr.Ir. Rusdi Usman Latif, MT', 'dosen', '', ''),
(105, '19580424 198702 1 001', 'eec10c16f22dab09b52a9236586aa5eb', 'Ir. Syafruddin Rauf, MT', 'dosen', '', ''),
(106, '19680718 199309 1 001', '4039a789a05e4583067a40963fb129c2', 'Dr.Ir. Muhammad Ramli, MT', 'dosen', '', ''),
(107, '19570906 198203 1 004', '983ea38903b9275b5c4bdfdbda68e681', 'Dr.Ir. Rhiza Samsoe\'oed Sadjad, MS.EE', 'dosen', '', ''),
(108, '19701108 199412 1 001', '6c6979eb09b4698b4876d5f7fdcb5471', 'Prof.Dr. Rudy Djamaluddin,ST.,M.Eng.', 'dosen', '', ''),
(109, '131802900', 'c523e9bfce85c1b80cf6cd9e99a60489', 'Dr.Ir. Safri Burhanuddin, DEA', 'dosen', '', ''),
(110, '19571231 198703 1 020', '37ccadb6efca621c4aff52b201b23ff6', 'Ir. Mulyadi, MT', 'dosen', '', ''),
(111, '19600302 198609 1 001', 'd994f1baa389532319146508bdceff62', 'Dr.-Ing.Ir. Wahyu Haryadi Piarah, MSME', 'dosen', '', ''),
(112, '19711221 199802 1 001', '7b77306c4852850f7efc9585fc0f9195', 'Dr.Eng. Andi Erwin Eka Putra, ST., MT', 'dosen', '', ''),
(113, '19700426 199412 1 001', '05b07ad821bb1f944100aecbf4eaf215', 'Farianto Fachruddin L., ST., MT', 'dosen', '', ''),
(114, '19650318 199103 1 003', '6857d31a2f47fdfe74f53cc9cd1b72ff', 'Dr.Ir. Syamsul Asri, MT', 'dosen', '', ''),
(115, '19640427 198910 1 002', '323c70f2b4cd38cb1d4c042269c15dc6', 'Dr.Ir. Zahir Zainuddin, M.Sc', 'dosen', '', ''),
(116, '19650701 199403 2 001', '1751ce03f80604606f7092df598d4b21', 'Dr.Ir. Idawarni, MT', 'dosen', '', ''),
(117, '19590202 198601 2 001', '7402b82d56c6b4dde2d450555393cb84', 'Dr. Ir. Ratna Husain, MT', 'dosen', '', ''),
(118, '19690924 199802 1 001', '8c0d85895bc567980dfc8e6a8ab27159', 'Dr.Eng. Asri Jaya H.S., ST., MT', 'dosen', '', ''),
(119, '19580325 198601 1 001', 'f9f478580f64ff933e58f24e85dc94a9', 'Ir. Syarif, MT', 'dosen', '', ''),
(120, '19570112 198811 1 001', 'ae45081d9bb4aa4df862038c9b5e388c', 'Ir. Zulkifli, MT', 'dosen', '', ''),
(121, '19720818 199903 2 002', 'a70a4282570bd38ed6838b0bfbf73a75', 'Dr. A.Sitti Chairunnisa M., ST., MT', 'dosen', '', ''),
(122, '19690407 199603 1 003', '2a24a12c5d53c890b1e727a443159fe7', 'Dr. Mohammad Mochsen Sir, ST., MT', 'dosen', '', ''),
(123, '19630504 199512 1 001', 'ae0f05d304f3cf98a4e6ad54505dd2ee', 'Dr.Ir.Arifuddin, MT', 'dosen', '', ''),
(124, '19700705 199702 1 002', 'ffcbfc172798b3a30b41c0816c8987e0', 'Dr. Sultan, ST., MT', 'dosen', '', ''),
(125, '19640904 199412 2 001', '522b1911403c8f4dc395442e4e301708', 'Dr.Ir. Nurul Jamala B., MT', 'dosen', '', ''),
(126, '19700810 199802 1 001', '35b0b513058a87761e2544d0829435ea', 'Dr.Eng. Rosady Mulyadi, ST., MT', 'dosen', '', ''),
(127, '19680301 199702 2 001', '8e0ca5ff250ef62ce3072de206a98947', 'Dr.Ir. Zuryati Djafar, MT', 'dosen', '', ''),
(128, '19700606 199412 2 001', '34bd50eadfd47896bd60e0429cf6da49', 'Dr.Ir. Ulva Ria Irvan, MT', 'dosen', '', ''),
(129, '19650928 200003 1 002', '8b234c1e815fbcbbd4f8d748692745aa', 'Dr. Adi Tonggiroh, ST.,MT', 'dosen', '', ''),
(130, '19730123 200012 1 001', '2f1e9e0bc0d6a47fcce84d4d3d1bcd15', 'M. Rusydi Alwi, ST.,MT', 'dosen', '', ''),
(131, '19731118 199803 2 001', '3739397e72e0a0a33b163f1a1552b1e3', 'Dr. Indar Chaerah Gunadin, ST.,MT', 'dosen', '', ''),
(132, '19620304 198811 1 001', 'de26ea4e3bec2d851431241ea82ae08b', 'Ir. Samuel Panggalo, MT', 'dosen', '', ''),
(133, '19740810 200012 1 001', 'cca723eecc48a86ebca5aa2433b2501b', 'Abd. Haris Djalante, ST.,MT', 'dosen', '', ''),
(134, '19641020 199103 1 002', 'd92585b8583731dd829ecbac736e8dd6', 'Dr.Eng.Ir. Farouk Maricar, MT', 'dosen', '', ''),
(135, '19730926 200012 1 002', '4e35fc8cd0c389b63d37a955be2e36fc', 'Dr.Eng. Muhammad Isran Ramli, ST.,MT', 'dosen', '', ''),
(136, '19750404 200012 1 001', '6f082bfdc96ff74293e4b7f872c050cb', 'Dr. Yusran, ST.,MT', 'dosen', '', ''),
(137, '19720309200003 1 002', '2284f9f0f5af1c1a5d41dcd5aab8e743', 'Dr. Tri Harianto, ST.,MT', 'dosen', '', ''),
(138, '19720330 199512 1 001', 'd487c5759d86ad327b2a670a3a6b0be6', 'Rafiuddin Syam, ST.,M.Eng,Ph.D', 'dosen', '', ''),
(139, '19661218 199303 2 001', '96e60f58ccfc6c4c5263b35cf0e8f304', 'Dr.Ir. Mimi Arifin, M.Si', 'dosen', '', ''),
(140, '19570729 198601 2 001', '81ef74e307479e09211bfa372cc852d8', 'Dr.Ir. Triyatni Martosenjoyo, M.Si.', 'dosen', '', ''),
(141, '19671218 199512 2 001', '2121b42deedace43fc505658ae5ba0b3', 'Nurmaida Amri, ST.,MT', 'dosen', '', ''),
(142, '19750203 200012 2 002', '3c4d23feb31b644e1cd949de55a51c2d', 'Dr.Eng. Intan Sari Areni, ST.,MT', 'dosen', '', ''),
(143, '19710316 199702 1 001', '6ac8574967b64ccd7287e84e9e994644', 'Dr.Eng. Nasruddin, ST.,MT', 'dosen', '', ''),
(144, '19730206 200012 1 002', '564a95e8513265e4c6c18edf350459bc', 'Dr. Eng. Suandar Baso, ST.,MT', 'dosen', '', ''),
(145, '19610915 198811 2 001', 'aab3a25c7c8a6b1401afa2e82f55cc84', 'Ir. Ria Wikantari Rosalia, M.Arch,Ph.D', 'dosen', '', ''),
(146, '19740530 199903 1 003', 'be492269002559a24aa7982fe8b19f7e', 'Prof.Dr. Eng. Syafaruddin, ST., M.Eng.', 'dosen', '', ''),
(147, '19561127 198803 1 001', '5be92de1f0e46fd2d16928450a47fdbb', 'Ir. Lukman Bochary, MT', 'dosen', '', ''),
(148, '19720118 199802 1 001', 'a141d9567515744d6c998ef6a2af98d2', 'Daeng Paroka, ST.,MT.,Ph.D.', 'dosen', '', ''),
(149, '19700804 199702 2 001', '393affb91aab8228a311c9550d98e3fb', 'Afifah Harisah, ST.MT.,Ph.D', 'dosen', '', ''),
(150, '19720619 200012 2 001', '9edd4c5a7879abe6f0a3df75cd29078f', 'Dr.Eng. Rita Irmawaty, ST.,MT', 'dosen', '', ''),
(151, '19720825 200003 1 001', '04cd51b77137ff4e3791f6346957e7c0', 'Dr. Eng.Jalaluddin, ST.,MT', 'dosen', '', ''),
(152, '19691026 199412 2 001', '851fbde0fbbb5aa54512d5b6ddb8684a', 'Dr.Eng. Ir. Dewiani, MT', 'dosen', '', ''),
(153, '19731010 199802 1 001', '232f8846d9e2481717ee4c6f33e040de', 'Amil Ahmad Ilham, ST.,MIT,,Ph.D', 'dosen', '', ''),
(154, '19720202 199903 1 002', '8c7a075b3c0b34d25f361c7094cad306', 'Wahyuddin, ST.,MT', 'dosen', '', ''),
(155, '19690802 199702 1 001', 'cee7273c8e81dc9d32aee5df853d455d', 'Dr. Taufiqur Rachman, ST., MT', 'dosen', '', ''),
(156, '19750716 200212 1 004', '9f07d34fd54dc4509084ab3e5c39caa8', 'Dr. Indrabayu, ST.,MT', 'dosen', '', ''),
(157, '19691011 199412 1 001', '9428f04903ec9b0d97de47a8298f302e', 'Ir. Amrin, MT', 'dosen', '', ''),
(158, '19720202 199802 1 001', '2b3677c6edb7f4d5883794120eea2d39', 'Baharuddin, ST.,MT', 'dosen', '', ''),
(159, '19800428 200512 1 001', 'ad4e6b57a45c150804d6884eb9670adc', 'Dr.Eng. Adi Maulana, ST.,M.Phil', 'dosen', '', ''),
(160, '19600730 198603 1 003', 'e6c53b12b0813345f30453c50322e433', 'Dr.Ir. Achmad Bakri Muhiddin, MS', 'dosen', '', ''),
(161, '19611017 198503 1 004', 'bef3b8dbc918de894b12541082d0517b', 'Dr. Ir. Nasruddin, M.Si', 'dosen', '', ''),
(162, '19550302 198702 1 001', 'bfc9e023fb2293239c3f757443c68fcd', 'Ir. Syahrir Arief, MT', 'dosen', '', ''),
(163, '19580921 198603 1 003', 'c8b5682703f05246ec8c41e083410e1b', 'Dr.Ir. Ahmad Yusran Aminy, MT', 'dosen', '', ''),
(164, '19571013 198703 1 001', 'fc2114a5dac052af6e581887beceb2c8', 'Ir. Mukhtar, MT', 'dosen', '', ''),
(165, '19681005 199603 1 002', 'a811c2cea566b37b8004f9682dd90bee', 'Dr. Sapta Asmal, ST., MT', 'dosen', '', ''),
(166, '19590708 198802 1 001', 'af8375b29403a02a3cde18d3afcd23f5', 'Ir. Yustinus Upa Sombolayuk, MT', 'dosen', '', ''),
(167, '19590509 198702 1 001', 'fd8a7d8604bd47fbadea7a971b1689d1', 'Ir. Muhammad Syavir Latif, M.Si', 'dosen', '', ''),
(168, '19661231 199403 1 022', '86f359839a7a5f0a12961632774be7c5', 'Ir. Samsuddin, MT', 'dosen', '', ''),
(169, '19560412 198703 1 001', 'e283af1d901f0c986ac1eb18ff18af10', 'Ir. Djamaluddin, MT.', 'dosen', '', ''),
(170, '19611231 198903 1 019', '7e3058f497c1a38106574e1586713c5b', 'Dr.Ir. Musri, MT', 'dosen', '', ''),
(171, '19720424 200012 2 001', '88a32fe7ac7b834bf10577d12867b7ea', 'Dr.Eng. Muralia Hustim, ST.,MT', 'dosen', '', ''),
(172, '19730512 199903 1 002', 'd120e990cbb4434cece1ae2e10e1312e', 'Dr.Eng. Mukhsan Putra H., ST.,MT', 'dosen', '', ''),
(173, '19641231 199103 1 034', '36f2791263013a39f7e17ed0a8cc794c', 'Dr.Ir. Hartawan, MT', 'dosen', '', ''),
(174, '19690304 199903 1 004', '3a7dc46b20265360db67dc720b5e6a7b', 'Dr.Eng.Abdul Mufti Radja, ST., MT', 'dosen', '', ''),
(175, '19660409 199703 1 002', '13200a089b785f32b25d78bc2fed379c', 'Dr.Ir. Irzal Nur, MT', 'dosen', '', ''),
(176, '19671119 199802 2 001', 'fe9703665fc94e51220a4d81304c4bbf', 'Dr.Ir. Haerany Sirajuddin, M.T', 'dosen', '', ''),
(177, '19760503 200212 1 001', 'bd372433914045d48f13f6a7af63b504', 'Suharman Hamzah,ST.,MT.,Ph.D', 'dosen', '', ''),
(178, '19750929 199903 1 002', '286e59da0ef94a95a5eb5587f8673d98', 'Dr.Eng. Ilham Bakri, ST.,MT', 'dosen', '', ''),
(179, '19710825 199903 1 002', 'd5a96c97f295f542a539626f3e339589', 'Rahimuddin, ST.,MT.,Ph.D', 'dosen', '', ''),
(180, '19550807 198403 1 002', 'bd5b975f3ea15c0d8b62f547d17671cc', 'Ir. Achmad Faisal Aboe, MT', 'dosen', '', ''),
(181, '19590116 198702 1 001', '49d08eaba9eddd4448e1803071b69723', 'Dr.Ir. Achmad Zubair, MS', 'dosen', '', ''),
(182, '19600119 198903 1 002', '55b0902187280f4b0f04d84f2730c187', 'Ir. Muhammad Taufik Ishak, MT', 'dosen', '', ''),
(183, '19740415 199903 1 001', 'ded2d88d11d095cf498496fa2d1092d8', 'Dr.Eng. Lukmanul Hakim Arma., ST.,MT', 'dosen', '', ''),
(184, '19780428 200312 2 002', '5e71819160e02bb46240602e9802b6c8', 'Dr. Hasdinar Umar, ST.,MT', 'dosen', '', ''),
(185, '19600716 198702 1 002', '3ac4562d512c94e0826b3bbd9b877b26', 'Ir. Christoforus Yohannes, MT', 'dosen', '', ''),
(186, '19760314 200212 2 005', '4092764e2456fabb4273d87680462eb8', 'Rahmi Amin Ishak, ST.,MT', 'dosen', '', ''),
(187, '19730208 200604 2 001', '0096cd3402b90b27a7f6d7785d851c38', 'Imriyanti, ST.,MT', 'dosen', '', ''),
(188, '19740426 200501 1 002', '634505f5b7df8b99a298170dd50129f1', 'Dr.Eng. Adnan, ST,MT', 'dosen', '', ''),
(189, '19810211 200501 1 003', '2e5e0e0ba7073662afd7f6a0bffa2d01', 'Dr.Eng. Faizal, ST.,M.Inf.,Tech.,M.Eng', 'dosen', '', ''),
(190, '19690404 200003 1 002', '15dc1a6fa5d2acfa25988f3e1476f956', 'Andi Haris Muhammad, ST.,MT.,Ph.D', 'dosen', '', ''),
(191, '19810606 200604 1 004', 'ab2164a9b4cd4d51ac861c014645edae', 'Dr. Saiful, ST.,MT', 'dosen', '', ''),
(192, '19631127 199203 1 001', '5f97d12e9833bf27a8674b99208e40b7', 'Ir. Mubassirang Pasra, MT', 'dosen', '', ''),
(193, '19721119 200012 1 001', '28cc62aee9f4397d3540c8757dc16295', 'Irwan Ridwan Rahim, Dr.Eng. ST.,MT', 'dosen', '', ''),
(194, '19570405 198802 1 002', '94a6a3180e071c48c786c26d5d5d9702', 'Ir. Panguriseng', 'dosen', '', ''),
(195, '19560101 198603 1 005', '03e1f943b8ef4c0dd08a7961b947cee0', 'Ir. Machmud Syam, DEA.', 'dosen', '', ''),
(196, '19650424 199203 1 003', 'f4f58b337d0085e045d35a003d47fd6b', 'Ir. Tajuddin Waris, MT', 'dosen', '', ''),
(197, '19720828 199903 1 003', '62162786842fedf67a00913ff6c4ce40', 'Dr.Eng. Wardi, ST. M.Eng.', 'dosen', '', ''),
(198, '19730922 199903 1 001', 'ce2af87fb55c5ebc72db78e9d7678dc1', 'Dr. Muhammad Niswar, ST,MIT.', 'dosen', '', ''),
(199, '19681022 200003 2 001', '90493c6ab4823a8cec25af368c0d787a', 'Wiwik Wahidah Osman, ST., MT', 'dosen', '', ''),
(200, '19710925 199903 2 001', '410aabff5e8901afedf81348158b945b', 'Dr.Eng. Asniawaty, ST.,MT', 'dosen', '', ''),
(201, '19731003 200012 2 001', '980471686b86e027ebaf5d9bff0452ce', 'Dr.Eng. Meutia Farida, ST.,MT', 'dosen', '', ''),
(202, '19710505 200604 1 002', '6c657a7b4a76535fa35a3aae88a440e7', 'Riswal  K., ST.,MT', 'dosen', '', ''),
(203, '19710207 200012 1 001', 'cbe877baa37fe48067469eec5b35cd1b', 'Surya Hariyanto, ST.,MT', 'dosen', '', ''),
(204, '19690825 199903 1 001', 'b10061db4856dc919dacaec999f49c7b', 'Dr. Ilham Alimuddin, ST.,M.GIS.', 'dosen', '', ''),
(205, '19770217 200112 1 001', 'ef4ae59a8ab57897aa52185806d0e0a9', 'Andi Husni Sitepu, ST.,MT', 'dosen', '', ''),
(206, '19610813 198811 2 001', 'c5034f759b438c3111b9cbb0c9d4f235', 'Dr. Ir. Inggrid Nurtanio, MT', 'dosen', '', ''),
(207, '19750827 200501 1 002', '808f4d2d7c94bb6584d988350332dc30', 'Dr.Rustan Tarakka, ST.,MT', 'dosen', '', ''),
(208, '19710101 201012 1 001', '648caee384c1f64f1a6eec153074d52d', 'Dr.Phil.nat.Sri Widodo, ST.MT', 'dosen', '', ''),
(209, '19730828 200012 2 001', 'f1bf64d2cf1202f3a067a255840fd0ba', 'Dr. Wihdat Djafar, ST.,MT', 'dosen', '', ''),
(210, '19701001 200012 1 001', 'c05d01cf6bbcc6bf0a0b5a066ad96fa5', 'Dr. Moh. Rizal Firmansyah, ST.,MT', 'dosen', '', ''),
(211, '19730709 200003 1 001', '5f12885e8ad05a605f6b71a2ea53e9ac', 'Dr.Eng.Achmad Yasir Baeda, ST.,MT', 'dosen', '', ''),
(212, '19690612 199802 1 001', '0f23eca61cea5e2a61d9f2a651d30233', 'Dr.Edward Syarif, ST.,MT', 'dosen', '', ''),
(213, '19611231 199002 1 003', '8693176ca463076ab95a84759ea9fed0', 'Ir. Andi Mangkau, MT', 'dosen', '', ''),
(214, '19750322 200212 1 001', 'a4f6644a30a515879b967f3c7de9675f', 'Dr. Hairul Arsyad, ST.,MT', 'dosen', '', ''),
(215, '19700404 199703 1 001', '6ddbaa4807a2d979c5c7406fdd53e469', 'M. Yahya, ST.,M.Eng', 'dosen', '', ''),
(216, '19771121 200501 2 001', '6809202819d7cf6adb004c16e753256d', 'Siti Hijraini Nur, ST.MT', 'dosen', '', ''),
(217, '19720908 199702 2 001', 'e40514acc9001df52a9b94fbe9851bea', 'Dr. A. Ejah Umraeni Salam, ST.,MT', 'dosen', '', ''),
(218, '19750605 200212 1 004', 'e74fb3fdc6b4e9813217e272d2b9861d', 'Prof.Dr.Ing. Faizal Arya Samman, ST.,MT', 'dosen', '', ''),
(219, '19741024 200312 1 002', '5fbf8db833616aa81467a859515684a9', 'Dr.Eng. Muhammad Rusman, ST.,MT', 'dosen', '', ''),
(220, '19741220 200501 2 001', '89c762469719cddbe49b96c441821ae3', 'Isfa Sastrawati, ST., MT.', 'dosen', '', ''),
(221, '19751124 200604 2 032', 'a787e9cef2fa1e8c85043b477c2c9f79', 'Syahriana Syam, ST.,MT', 'dosen', '', ''),
(222, '19791226 200501 1 001', '9eafce688339894da1e18d27320f8ccf', 'Dr.A. Arwin Amiruddin, ST, MT.', 'dosen', '', ''),
(223, '19750608 200501 1 003', 'a1850ae8522a4f15d128fb3e2269219b', 'Dr. Muhammad Zubair M. Alie, ST,MT', 'dosen', '', ''),
(224, '19730423 200812 1 001', 'f3dfab8c3d2e1d2c1faa84cffcdf4b1f', ' Dr.Eng. Firman Husain, ST.MT', 'dosen', '', ''),
(225, '19730328 200604 2 001', '4496d2d651668a1afb14630947a66324', 'Marly Valenti Patandianan, ST.,MT', 'dosen', '', ''),
(226, '19770322 200501 1 001', 'ad5bbe5edfadd440f3297fa565cfe34d', 'Yusri Syam Akil, ST., MT.,Ph.D', 'dosen', '', ''),
(227, '19780424 200112 2 001', '7f5578b36acc5a0e97f3569c40de14dc', 'Ardiati Arief, ST.,MTM.,Ph.D', 'dosen', '', ''),
(228, '19660817 200012 1 001', '2266ee6ab79fa3222fcd4e61dd5fb3a8', 'Dr. Sufriadin, ST.,MT', 'dosen', '', ''),
(229, '19800618 200501 1 004', 'b3ccd225f644870645f85fc02bead965', 'Hamzah, ST.,MT', 'dosen', '', ''),
(230, '19760719 200112 1 001', '261b4ff9264992fb516a5edda08505ff', 'Dr. Sabaruddin Rahman, ST,MT', 'dosen', '', ''),
(231, '19750507 200501 2 002', 'ab5b3a47c6bc6b851215c79dc38f6818', 'Retnari Dian Mudiastuti, ST.,M.Si', 'dosen', '', ''),
(232, '19760602 200501 1 002', 'c45d097afe1875e91eaf406507f0c282', 'Dr.Eng.Irwan Setiawan, ST.,MT', 'dosen', '', ''),
(233, '19800120 200212 2 002', '26f5573b197dbd7fa087dfe5cf3d85a7', 'Dr.Eng. Asiyanthi T.Lando, ST., MT.', 'dosen', '', ''),
(234, '19740318 200604 1 001', 'bab3cbac6865d97ee0fefe9ada83cc80', 'Azhury, ST.,MT', 'dosen', '', ''),
(235, '19760914 200801 1 006', '388650ae701f015da42fe40d7d6164a3', 'Dr. Ikhlas Kitta, ST.,MT', 'dosen', '', ''),
(236, '19780719 200604 2 002', 'c0981ad86ee519ba36a8833655a259b7', 'Hasnawiyah Hasan, ST.,M.Eng', 'dosen', '', ''),
(237, '19751205 200501 2 002', '5ad98a49a8a46801616c2ae5c08d3ac8', 'Dr. Merna Baharuddin, ST, M.Tel.Eng.', 'dosen', '', ''),
(238, '19751214 201504 1 001', 'decbb09cc37a2ea093c09ae5e1fa4c6d', 'Dr.Eng. Ibrahim Djamaluddin', 'dosen', '', ''),
(239, '19721114 200501 2 001', '0eaa0a052224d3bef44bbfc8476aedf7', 'Novy Nur R.A Mokobombang, ST.,Ms.TM', 'dosen', '', ''),
(240, '19810425 200812 1 001', 'b2cd94394d4450a9f0286d1a339cda5a', 'Dr.Eng. Bambang Bakri, ST.MT', 'dosen', '', ''),
(241, '19741211 200501 1 001', '2c3a477d25ed56d095795fb39dcac280', 'Mukti Ali, ST., MT.,Ph.D', 'dosen', '', ''),
(242, '19820216 200812 2 001', '203c20a508e100750ff04427c315d2e9', 'Elly Warni, ST.MT', 'dosen', '', ''),
(243, '19770817 200501 1 003', '683354d0381f9ca83dea9ec493954448', 'Muh. Anshar, ST.M.Sc..Ph.D', 'dosen', '', ''),
(244, '19700710 200212 1 001', '22b40ba28d8f6f46cf574e7dbce50f8e', 'Dr.Eng. Farid Mardin, ST.,MT', 'dosen', '', ''),
(245, '19791112 200812 2 002', 'de632e5aa3b8de4df2355666f1b6cef5', 'Dr.Eng. Novriany Amaliyah, ST.MT', 'dosen', '', ''),
(246, '19750605 200212 1 003', '7cf70d7251d7837ba7de727d201682b3', 'Dr. Chairul Paotonan, ST., MT.', 'dosen', '', ''),
(247, '19701005 200801 2 026', '7d3e21738c3d4d9e94eebdb0fc0b34d9', 'Dr. Aryanti Virtanti Anas, ST., MT.', 'dosen', '', ''),
(248, '19790225 200212 2 001', 'a23372c64f13263284edfc5405bc48c7', 'Haryanti Rivai, ST.,MT.,Ph.D', 'dosen', '', ''),
(249, '19711128 200501 1 002', '5c6afd8d95672d36e02921bdc2b6eee0', 'Dr.Eng. Purwanto, ST.,MT', 'dosen', '', ''),
(250, '19730314 200012 1 001', 'b45e394510db4d807a363a54f9e31237', 'Asran Ilyas, ST, MT.,Ph.D', 'dosen', '', ''),
(251, '19770707 200501 1 001', '8107071004feab0ec0b0b87c1044bd2f', 'Dr. Muhammad Syahid, ST.,MT', 'dosen', '', ''),
(252, '19760707 200501 1 002', '4f1ad3bc1be680d0fdae5295b8453567', 'Dr.Eng.Ardy.,ST.,M.Eng', 'dosen', '', ''),
(253, '19730530 199802 2 001', '70487782649672e35190e5a4b3930a76', 'Dr.Rosmariani Arifuddin, ST.,MT', 'dosen', '', ''),
(254, '19680420 199702 1 001', '0a26394485274132d0bcc137ca02336d', 'Dr.Muhammad Sapri, ST.,M.Eng,PM', 'dosen', '', ''),
(255, '19721010 200003 1 001', '98cdd9de344ed4dbfdc071acd4e974b3', 'Silman Pongmanda, ST.,MT', 'dosen', '', ''),
(256, '19701202 199903 1 002', 'a12d7b39d40c560b59c2d993720fa15f', 'Dr. Hady Efendy, ST.,MT', 'dosen', '', ''),
(257, '19770103 200801 1 009', '4ab79f9d05e462bcaa0da7dcaa07fc2c', 'Fauzan, ST, MT', 'dosen', '', ''),
(258, '19761021 200812 1 002', '48d40b6769410c9c9e1f8213bd707438', 'Dr. Syarifuddin M.Parenreng, ST.,MT', 'dosen', '', ''),
(259, '19760406 200312 1 002', '84e4da334e80d7e30e46b3dfd9f5c341', 'M. Bachtiar Nappu, ST.,MT.,Ph.D', 'dosen', '', ''),
(260, '19741205 200012 2 001', 'a5c57a7dc835fd089833195d5f2d0a56', 'Hasniaty A., ST.,MT', 'dosen', '', ''),
(261, '19790117 200112 2 002', '04702daabd664c0305acd94ef0ab0114', 'Dr.Yashinta Kumala Dewi, ST.,MIP.', 'dosen', '', ''),
(262, '19741006 200812 1 002', '29ecf01139b8874883281d199907d832', 'Dr.Eng.Abdul Rachman Rasyid, ST.M.Si', 'dosen', '', ''),
(263, '19710512 200812 2 001', '7d8b6a1901599dd870868eb6acec0913', 'Meinarni Thamrin, ST.MT', 'dosen', '', ''),
(264, '19760531 200501 1 004', 'aa0fab96f95b30bf4dc730b6251d54f0', 'Andi Subhan Mustari, ST', 'dosen', '', ''),
(265, '19840403 201012 1 004', 'd682f1eed8176ad071fe1e626f31289a', 'Dr.Eng. Zulkifli Tahir, ST.M.Sc', 'dosen', '', ''),
(266, '19831222 201012 2 003', 'a93ba70a25b06c9077db01ada8eb4dc1', 'Venny Veronica Nataliah, ST.,MT', 'dosen', '', ''),
(267, '19830714 200604 2 001', 'a0ef9f19aa6c76fe72ad94c7eb5783dc', 'Fitriyanti Mayasari, ST.,MT', 'dosen', '', ''),
(268, '19730712 200003 2 002', '050243b84c31e27d315122e6ad4692f7', 'Ariningsih Suprapti, ST.,MT', 'dosen', '', ''),
(269, '19771214 200501 1 002', 'a955f91c5188ed26b573d63fc66a0f5c', 'Dr.Eng. Hendra Pachri, ST, M.Eng', 'dosen', '', ''),
(270, '19750313 200912 1 003', '1108e0f240233556b43aec93365acc70', 'Ady Wahyudi Paundu, ST.,MT', 'dosen', '', ''),
(271, '19760216 201012 1 002', 'bc54a770dd717c6505ccf754d053d20d', 'Dr.Eng. Andi Amijoyo Mochtar, ST.,M.Sc', 'dosen', '', ''),
(272, '19820630 201212 2 001', 'a8567185bf51a09fc3c46ae1846dd7a2', 'Ida Rachmaniar Sahali, S.T.,M.T.', 'dosen', '', ''),
(273, '19850526 201212 2 002', '7e866ed2dea717777c96c2c43ea23d0d', 'A. Ardianti, S.T., M.T.', 'dosen', '', ''),
(274, '19811212 201212 2 002', 'c652c3882b5d59318515287fe8d5b07d', 'Dahniar, ST.,MT', 'dosen', '', ''),
(275, '19850824 201212 2 004', 'e3ba66bb6c128efd313ea33aaeb35375', 'Sri Aliah Ekawati, ST.,MT', 'dosen', '', ''),
(276, '19820202 201212 1 003', '1e3d5e9a9e46db6c35867ac4dd7efe44', 'Armin Darmawan, ST.,MT', 'dosen', '', ''),
(277, '19840126 201212 1 002', '5231d480e9420a9b770d9eab983ecb16', 'Azwar Hayat, ST.M.Sc.,Ph.D', 'dosen', '', ''),
(278, ' 19831008 201212 2 003', '2901aaa323c0456d7704b1308d71e67a', 'Mukarramah Yusuf, S.T.,M.Sc', 'dosen', '', ''),
(279, '19831114 201404 2 001', 'c0a5889c5569dbeaf2a959492642df67', 'Rini Novrianti Sutardjo Tui, ST.,MT', 'dosen', '', ''),
(280, '19830510 201404 1 001', '126c242b7dc84517d0d89e003adc5c07', 'A. Ais Prayogi Alimuddin, S.T.,M.Eng', 'dosen', '', ''),
(281, '19860119 201404 2 001', '488843410a3455ddd72467f4eb71d098', 'Pratiwi Mushar, S.T.,M.T.', 'dosen', '', ''),
(282, '19830816 201404 1 001', '406a0b5a113bf3c3256e6509b8fcfff9', 'Farid Sitepu, S.T.,M.T.', 'dosen', '', ''),
(283, '19880621 201504 2 003', 'b3d86a21ddca0eae41b0fc9dd3c82b88', 'Andini Dani Achmad, S.T.,M.T.', 'dosen', '', ''),
(284, '19750623 201504 2 001', 'a031cacba0d1217dba35c928c7895142', 'Roslinda Ibrahim, S.P.,M.T', 'dosen', '', ''),
(285, '19570530 198903 1 001', 'b200cc3e8282267a9f25e5c10791b4c9', 'Ir. Dantje Runtulalo, MT', 'dosen', '', ''),
(286, '19730306 199802 1 001', 'fd15a15c421b3910a6086582412c4f60', 'Dr.Muhammad Asad Abdurrahman, ST.,M.Eng.', 'dosen', '', ''),
(287, '19710219 199903 1 002', '21c61eee45f21b7cf91d6a4efce1e3c9', 'Dr.Eng.Ihsan,  ST.,MT', 'dosen', '', ''),
(288, '19731201 200012 2 001', '258709dc7ad3db98bf6cc7c97786bb7a', 'Dr. Kartika Sari, ST.,MT', 'dosen', '', ''),
(289, '19771211 200112 2 001', '1fd4a742a940d9e541cb5468eb1fa60a', 'Nilda., ST.,MT ', 'dosen', '', ''),
(290, '19760904 200212 2 001', 'cca23834a874db1843c516f355e662ff', 'Dr. Nurul Nadjmi, ST.,MT', 'dosen', '', ''),
(291, '19630801 199903 1 001', '93984e960f6b0cd9b9c771d61fe31546', 'Ir. Akhmad Sumakin, MT', 'dosen', '', ''),
(292, '19770818 200212 1 002', '8c3fa44e088db8f7d9f2b7b4b94d7f02', 'Muhibuddin, ST', 'dosen', '', ''),
(293, '19891029 201809 2 001', '242b8d69b6ed0cbc3fd01a869f2e1053', 'Nadzirah Ikasari. S, S.T.,M.T. ', 'dosen', '', ''),
(294, '19870425 201903 1 012', '16a5841d87552a8b27a258ea0e807b0e', 'Habibi, S.T.,M.T.', 'dosen', '', ''),
(295, '19920226 201903 1 009', '80eb3b129594801508932c2ac47848fd', 'Gerard Anonini Duma, S.T.,M.T', 'dosen', '', ''),
(296, '19880130 201903 1 005', 'f26fe951d15ff6dabdd95cf4cb2dae00', 'Sahabuddin, S.T.,M.T.', 'dosen', '', ''),
(297, '19870824 201903 2 009', '5ed519b840b4e971f55a1bab4e93c5f0', 'A. Dian Eka Anggriani, S.T.,M.T', 'dosen', '', ''),
(298, '19891201 201903 2 013', '2c903e388fa5e636971bdf54caedfeaf', 'A. Besse Riyani Indah, ST.,MT ', 'dosen', '', ''),
(299, '19870719 201903 2 012', 'fcd8edf36ff649e0fdf02ad9d3df8c07', 'Andi Karina Deapati, S.Ars.,MT', 'dosen', '', ''),
(300, '19930309 201903 1 014', 'b0cfce60e6e6a47e10e728d757ff3693', 'Laode Muh. Asfan Mujahid, ST.,MT', 'dosen', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `waktu_ujian`
--

CREATE TABLE `waktu_ujian` (
  `waktu_ujian_id` int(16) NOT NULL,
  `waktu_mulai` varchar(11) NOT NULL,
  `waktu_selesai` varchar(11) NOT NULL,
  `waktu_departemen` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waktu_ujian`
--

INSERT INTO `waktu_ujian` (`waktu_ujian_id`, `waktu_mulai`, `waktu_selesai`, `waktu_departemen`) VALUES
(9, '09.00', '10.30', 'Teknik Informatika'),
(10, '10.30', '12.00', 'Teknik Informatika'),
(11, '13.00', '14.30', 'Teknik Informatika'),
(12, '14.30', '16.00', 'Teknik Informatika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `judul`
--
ALTER TABLE `judul`
  ADD PRIMARY KEY (`id_judul`);

--
-- Indexes for table `kps`
--
ALTER TABLE `kps`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `seminar`
--
ALTER TABLE `seminar`
  ADD PRIMARY KEY (`seminar_id`);

--
-- Indexes for table `tempat_ujian`
--
ALTER TABLE `tempat_ujian`
  ADD PRIMARY KEY (`tempat_ujian_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  ADD PRIMARY KEY (`waktu_ujian_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `judul`
--
ALTER TABLE `judul`
  MODIFY `id_judul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seminar`
--
ALTER TABLE `seminar`
  MODIFY `seminar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tempat_ujian`
--
ALTER TABLE `tempat_ujian`
  MODIFY `tempat_ujian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `waktu_ujian`
--
ALTER TABLE `waktu_ujian`
  MODIFY `waktu_ujian_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
