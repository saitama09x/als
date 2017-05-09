-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2017 at 09:32 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alternative_learning_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `_id` int(11) NOT NULL,
  `_account_id` varchar(255) NOT NULL,
  `_personal_id` varchar(255) NOT NULL,
  `_email` varchar(255) NOT NULL,
  `_password` varchar(255) NOT NULL,
  `_fn` text NOT NULL,
  `_sn` text NOT NULL,
  `_mn` text NOT NULL,
  `_account_access` int(11) NOT NULL,
  `_account_date_registered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`_id`, `_account_id`, `_personal_id`, `_email`, `_password`, `_fn`, `_sn`, `_mn`, `_account_access`, `_account_date_registered`) VALUES
(1, '121003787', 'klklkl', 'wqeqw@gmail.conm', 'dasd', 'kl', 'kl', 'kl', 1, '2017-01-05'),
(2, '1zyztk7dvTa9QBcsGiaKKkw7h', '121003787', 'marlonbartonico@gmail.com', 'e416f226532d16f5722f47696cfe133b', 'marlon', 'bartonico', 'urdaneta', 0, '2017-01-05'),
(4, 'MwBqhk3Mr9RpuQYS9KRiDHufF', '121003712', 'czarina@gmail.com', 'e416f226532d16f5722f47696cfe133b', 'Czarina', 'Ganancial', 'Rumbines', 1, '2017-01-31'),
(6, 'MihdNkTNyU2Mx7XZHxmMwit0X', '121003913', 'Romeo@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Romeo', 'Rosendo', 'Ros', 1, '2017-01-31'),
(7, '271paZs1b9Jfo6YiEOJSjI7fd', '121003999', 'joven@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Joven', 'Suobiron', 'Toer', 1, '2017-01-31'),
(8, 'Z0uC9C5TFcdRLzP695qJ3BWlc', '121032901', 'Julius@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 'Julius', 'Alejandro', 'Buaya', 1, '2017-01-31'),
(9, 'ERH13ANB3DV', '11692223799', 'lacus.Quisque@Nullam.com', 'VXJ59NOV2VI', 'Aphrodite', 'Fowler', 'Idona', 1, '2016-11-05'),
(10, 'YIP11MSE3FX', '60622192699', 'ullamcorper.magna.Sed@ametultricies.ca', 'LBR31KAR6MS', 'Hasad', 'White', 'Phillip', 1, '2017-11-11'),
(11, 'POX70RIN6MW', '18502055099', 'rutrum@eu.net', 'BKO76NDB7NV', 'Dominique', 'Knox', 'Jaquelyn', 1, '2017-06-29'),
(12, 'MKR62CDO4BY', '55799551899', 'erat.eget.ipsum@egetlacus.ca', 'DOK82VMI4JV', 'Logan', 'Farrell', 'Adara', 1, '2016-03-18'),
(13, 'GOO06VXJ8VK', '12823026799', 'enim.Suspendisse@conguea.net', 'KYE53JWD9OM', 'Alana', 'Tillman', 'Grant', 1, '2018-02-02'),
(14, 'XJN53WFO6DB', '94498826299', 'tempor.est@Donecfringilla.edu', 'USU49ILS6GR', 'Bernard', 'Camacho', 'Luke', 1, '2016-07-13'),
(15, 'JZV34NTQ2BO', '41919879899', 'luctus.aliquet@tincidunttempusrisus.co.uk', 'RGA42DXL2KB', 'Kelly', 'Lowe', 'Lester', 1, '2017-05-22'),
(16, 'YMF75XMB2FC', '45604565699', 'ullamcorper@afacilisisnon.com', 'NWR08GND2YS', 'Fletcher', 'Dyer', 'Berk', 1, '2017-06-13'),
(17, 'ECT88TWA6EC', '94414424499', 'nec.luctus@Aliquamornarelibero.com', 'BET14JYY8TD', 'Colleen', 'Vazquez', 'Fulton', 1, '2017-08-28'),
(18, 'FHB23FSO7IL', '03923499599', 'adipiscing.elit@mi.ca', 'PFT13LJA8LW', 'Clio', 'Mcfadden', 'Hedwig', 1, '2017-01-04'),
(19, 'WID99XWL7WV', '06376479099', 'venenatis@sedconsequat.org', 'AWO22ZGD4IA', 'August', 'Vincent', 'Patrick', 1, '2017-08-03'),
(20, 'HEC03WTV8DN', '77937491799', 'metus@egestas.co.uk', 'ZKG23FMY2WF', 'Sage', 'Good', 'Cadman', 1, '2018-02-24'),
(21, 'BAL65VLM9TG', '17938560899', 'Donec.tempus@suscipitnonummy.net', 'YUA47NEJ8CV', 'Renee', 'Kelly', 'Felicia', 1, '2017-10-04'),
(22, 'ZHX77QPU2YK', '75357870699', 'est.Mauris@consectetuer.org', 'MCI23ROB8VY', 'Xena', 'Lang', 'Sebastian', 1, '2017-07-24'),
(23, 'BPI33XBG2ND', '83758424399', 'erat.Etiam.vestibulum@erosNam.org', 'NSP78HBN8UC', 'Theodore', 'Sosa', 'Bree', 1, '2017-05-13'),
(24, 'XCL49MYI0JO', '39912902799', 'nulla.ante.iaculis@convallisconvallis.co.uk', 'SBU31PZO2VZ', 'Curran', 'Dodson', 'Richard', 1, '2017-07-09'),
(25, 'OCC43XWH0HK', '62848083299', 'egestas@dolor.ca', 'PPY05FIO8VN', 'Pandora', 'Cox', 'Ali', 1, '2018-02-08'),
(26, 'HYF85IOW6WM', '77897284799', 'tellus.Suspendisse@Aliquameratvolutpat.co.uk', 'UCK04FXA2UB', 'Walter', 'Boone', 'Rhonda', 1, '2017-08-01'),
(27, 'OMI20XXD9ZM', '96461269299', 'lacinia.Sed.congue@necante.com', 'EUY99OCJ1HA', 'Kimberly', 'Hodges', 'Mary', 1, '2017-10-02'),
(28, 'CRD77FMI1ZY', '60974874599', 'ligula@ornare.com', 'YSL39MFE0MK', 'Nash', 'Bowen', 'Tanya', 1, '2017-07-16'),
(29, 'GCU52TRX1RO', '65988520499', 'Aliquam@Curabituregestas.co.uk', 'TQR20TJX7RV', 'Belle', 'Baker', 'Rhiannon', 1, '2017-11-28'),
(30, 'IOP12TTH6ZE', '20435482499', 'molestie@nonleoVivamus.net', 'NHJ41HPF3IQ', 'Shelley', 'Buchanan', 'Naomi', 1, '2018-03-05'),
(31, 'APA13CAL4UT', '55557580299', 'arcu.Sed.eu@dictumPhasellusin.edu', 'HQL68WYB9OW', 'Genevieve', 'Figueroa', 'Jillian', 1, '2016-09-01'),
(32, 'ONG56EID4JI', '40747567899', 'elementum.purus@VivamusrhoncusDonec.org', 'EQC37YQE0YF', 'Velma', 'Day', 'Macon', 1, '2017-12-10'),
(33, 'MNM79YBM5DP', '65207354999', 'laoreet@dignissimpharetraNam.com', 'KWV93JPZ1RO', 'Harrison', 'Hopkins', 'Unity', 1, '2018-02-13'),
(34, 'QHO15LUW1EG', '03784198499', 'ornare.egestas.ligula@ipsum.co.uk', 'UAM86QVX6SH', 'Caesar', 'Patterson', 'Georgia', 1, '2017-10-30'),
(35, 'TTZ25WRJ8FM', '32743829799', 'purus@dapibusquam.com', 'VRM90EIP2VK', 'Leroy', 'Charles', 'Jaquelyn', 1, '2017-03-27'),
(36, 'RYA60RLI5ZU', '71348023399', 'feugiat@velconvallis.ca', 'ZNU25VSM6FI', 'Jasmine', 'Benton', 'Ferdinand', 1, '2016-07-24'),
(37, 'CYH64CKL6VV', '07935393299', 'risus.Nulla.eget@diam.org', 'BDN19TWN7MB', 'Ezekiel', 'Schmidt', 'Oren', 1, '2016-12-31'),
(38, 'OLF95MVN6TI', '75356972199', 'aliquet.metus@velitdui.net', 'QQX62PWY2FP', 'Sylvester', 'Bridges', 'Hillary', 1, '2016-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `_id` varchar(255) NOT NULL,
  `_account_id` varchar(255) NOT NULL,
  `_assessment_name` text NOT NULL,
  `_data_time_start` datetime NOT NULL,
  `_data_time_end` datetime NOT NULL,
  `_duration` int(11) NOT NULL,
  `_random_numbers` tinyint(1) NOT NULL,
  `_random_choices` tinyint(1) NOT NULL,
  `message` longtext NOT NULL,
  `date_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`_id`, `_account_id`, `_assessment_name`, `_data_time_start`, `_data_time_end`, `_duration`, `_random_numbers`, `_random_choices`, `message`, `date_registered`) VALUES
('assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', '1zyztk7dvTa9QBcsGiaKKkw7h', 'Hamilton Cooper', '2013-01-02 00:30:00', '2013-01-02 01:00:00', 60, 1, 1, 'Aut quis maiores repudiandae aperiam distinctio. Aliquip est, excepturi itaque deserunt vel dolorum tempore.', '2017-03-10 01:11:36'),
('assessment_1489080851_dmIAhjxeIMnP8twOCCRbLWInF', '1zyztk7dvTa9QBcsGiaKKkw7h', 'Zoe Harrell', '2013-01-02 00:30:00', '2013-01-02 00:30:00', 120, 1, 1, 'Ducimus, ut fuga. Id et enim obcaecati et molestiae veritatis est suscipit reprehenderit, sit ea aut deserunt illum, tenetur sit.', '2017-03-10 01:34:11'),
('assessment_1489081154_Hka2hpZcio4WOwhgpvWBdzUWO', '1zyztk7dvTa9QBcsGiaKKkw7h', 'Allen Gonzales', '2013-01-02 00:30:00', '2013-01-02 01:00:00', 120, 1, 1, 'Facilis corporis animi, et est eligendi nesciunt, sunt amet, dolore eiusmod.', '2017-03-10 01:39:14'),
('assessment_1489081761_kfbvjGO0qobcg4DyUX11ZLF5y', '1zyztk7dvTa9QBcsGiaKKkw7h', 'Aphrodite Hubbard', '2013-01-02 00:30:00', '2013-01-02 01:00:00', 120, 1, 1, 'Velit, non accusamus aliqua. Similique velit, tenetur culpa dolor molestiae quis alias lorem sint, et exercitation autem anim placeat, consequatur.', '2017-03-10 01:49:21'),
('assessment_1489082533_EWoVtSHCBmemNJudfRrOG3xdj', '1zyztk7dvTa9QBcsGiaKKkw7h', 'Uma Vargas', '2013-01-02 00:30:00', '2013-01-02 00:30:00', 180, 1, 1, 'Aut est, amet, dicta sed eum corporis nobis voluptatem adipisci est, magni nihil numquam pariatur. Tenetur.', '2017-03-10 02:02:13'),
('assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', '1zyztk7dvTa9QBcsGiaKKkw7h', 'Vaughan Cline', '2013-01-02 01:00:00', '2013-01-02 01:00:00', 210, 1, 1, 'Error excepteur dolores incidunt, accusantium est incidunt, sit quia non ducimus, nulla quas hic et dignissimos nisi aliquip enim.', '2017-03-10 02:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_examinees`
--

CREATE TABLE `assessment_examinees` (
  `_id` int(11) NOT NULL,
  `_student_id` varchar(255) NOT NULL,
  `_subject_enrolled` varchar(255) NOT NULL,
  `_assessment_id` varchar(255) NOT NULL,
  `_date_time_start` datetime NOT NULL,
  `_date_time_end` datetime NOT NULL,
  `_duration` int(11) NOT NULL,
  `_random_numbers` int(11) NOT NULL,
  `_random_choices` int(11) NOT NULL,
  `_message` longtext NOT NULL,
  `_status` text NOT NULL,
  `_score` int(11) NOT NULL,
  `_date_submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_examinees`
--

INSERT INTO `assessment_examinees` (`_id`, `_student_id`, `_subject_enrolled`, `_assessment_id`, `_date_time_start`, `_date_time_end`, `_duration`, `_random_numbers`, `_random_choices`, `_message`, `_status`, `_score`, `_date_submitted`) VALUES
(5, 'MwBqhk3Mr9RpuQYS9KRiDHufF', '37', 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', '2017-03-10 01:00:00', '2017-03-11 01:00:00', 120, 1, 1, 'test', 'ANSWERED', 10, '2017-03-10 02:23:57'),
(6, 'MihdNkTNyU2Mx7XZHxmMwit0X', '37', 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', '2017-03-11 01:00:00', '2017-03-15 01:30:00', 120, 1, 1, 'test', 'pending', 0, '2017-03-11 04:09:12'),
(7, 'MwBqhk3Mr9RpuQYS9KRiDHufF', '40', 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', '2017-03-19 01:00:00', '2017-03-21 01:00:00', 120, 1, 1, 'Please bla bla bla', 'ANSWERED', 11, '2017-03-20 00:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_examinies_metadata`
--

CREATE TABLE `assessment_examinies_metadata` (
  `meta_id` int(11) NOT NULL,
  `examinees_id` varchar(255) NOT NULL,
  `meta_date_started` datetime NOT NULL,
  `meta_date_ended` datetime NOT NULL,
  `status` text NOT NULL,
  `logs` longtext NOT NULL,
  `date_submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_examinies_metadata`
--

INSERT INTO `assessment_examinies_metadata` (`meta_id`, `examinees_id`, `meta_date_started`, `meta_date_ended`, `status`, `logs`, `date_submitted`) VALUES
(1, '5', '2017-03-10 02:32:27', '2017-03-10 02:33:11', 'ANSWERED', '', '2017-03-10 02:32:27'),
(2, '7', '2017-03-20 00:45:38', '2017-03-20 00:46:54', 'ANSWERED', '', '2017-03-20 00:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_examinies_metadata_answer`
--

CREATE TABLE `assessment_examinies_metadata_answer` (
  `answer_id` int(11) NOT NULL,
  `examinees_id` varchar(255) NOT NULL,
  `question_meta_id` text NOT NULL,
  `answer` longtext NOT NULL,
  `status` varchar(4) DEFAULT NULL,
  `remarks` longtext NOT NULL,
  `points` int(11) DEFAULT NULL,
  `date_submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_examinies_metadata_answer`
--

INSERT INTO `assessment_examinies_metadata_answer` (`answer_id`, `examinees_id`, `question_meta_id`, `answer`, `status`, `remarks`, `points`, `date_submitted`) VALUES
(1, '5', '46', 'dsdqwesadas', '1', 'test', 5, '2017-04-15 18:46:03'),
(2, '5', '45', 'dasfqweasd', '1', 'test', 3, '2017-04-15 18:46:03'),
(3, '5', '42', 'FALSE', '1', '', 1, '2017-04-15 18:46:03'),
(4, '5', '36', 'b', '1', '', 1, '2017-04-15 18:46:03'),
(5, '5', '41', 'd', '1', '', 1, '2017-04-15 18:46:03'),
(6, '5', '47', 'afsaseqwe', '0', 'test', 0, '2017-04-15 18:46:03'),
(7, '5', '32', 'a', '1', '', 1, '2017-04-15 18:46:03'),
(8, '5', '35', 'b', '1', '', 1, '2017-04-15 18:46:03'),
(10, '5', '49', '3', '1', 'test', 5, '2017-04-15 18:46:03'),
(11, '5', '39', 'c', '1', '', 1, '2017-04-15 18:46:03'),
(12, '5', '43', 'FALSE', '1', '', 1, '2017-04-15 18:46:03'),
(13, '5', '33', 'd', '1', '', 1, '2017-04-15 18:46:03'),
(14, '5', '40', 'c', '1', '', 1, '2017-04-15 18:46:03'),
(15, '5', '34', 'a', '1', '', 1, '2017-04-15 18:46:03'),
(16, '5', '37', 'a', '0', '', 0, '2017-04-15 18:46:03'),
(17, '7', '37', 'b', '0', '', 0, '2017-04-15 18:46:03'),
(18, '7', '39', 'c', '1', '', 1, '2017-04-15 18:46:03'),
(19, '7', '46', 'test test', '1', 'test', 5, '2017-04-15 18:46:03'),
(20, '7', '43', 'FALSE', '1', '', 1, '2017-04-15 18:46:03'),
(21, '7', '47', 'testt test', '0', 'test', 0, '2017-04-15 18:46:03'),
(22, '7', '41', 'a', '1', '', 1, '2017-04-15 18:46:03'),
(23, '7', '32', 'a', '1', '', 1, '2017-04-15 18:46:03'),
(24, '7', '33', 'd', '1', '', 1, '2017-04-15 18:46:03'),
(25, '7', '45', 'test', '1', 'test', 3, '2017-04-15 18:46:03'),
(26, '7', '38', 'd', '1', '', 1, '2017-04-15 18:46:03'),
(27, '7', '35', 'b', '1', '', 1, '2017-04-15 18:46:03'),
(28, '7', '36', 'c', '1', '', 1, '2017-04-15 18:46:03'),
(29, '7', '42', 'FALSE', '1', '', 1, '2017-04-15 18:46:03'),
(30, '7', '49', '1', '1', 'test', 5, '2017-04-15 18:46:03'),
(31, '7', '48', '1', '1', 'test', 5, '2017-04-15 18:46:03'),
(32, '7', '44', 'test test', '1', 'test', 5, '2017-04-15 18:46:03'),
(33, '7', '40', 'c', '1', '', 1, '2017-04-15 18:46:03'),
(34, '7', '34', 'a', '1', '', 1, '2017-04-15 18:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_meta`
--

CREATE TABLE `assessment_meta` (
  `meta_id` int(11) NOT NULL,
  `assessment_id` varchar(255) NOT NULL,
  `_type` varchar(255) NOT NULL,
  `_answer` text NOT NULL,
  `_question` text NOT NULL,
  `_choice_a` text NOT NULL,
  `_choice_b` text NOT NULL,
  `_choice_c` text NOT NULL,
  `_choice_d` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_meta`
--

INSERT INTO `assessment_meta` (`meta_id`, `assessment_id`, `_type`, `_answer`, `_question`, `_choice_a`, `_choice_b`, `_choice_c`, `_choice_d`) VALUES
(1, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'A', 'Corrupti, illum, quo nisi doloribus enim quo magna voluptas recusandae. Ab ut dolor facere aut voluptate aut cumque aut praesentium.', 'ANSWER', 'Exercitationem reprehenderit commodi delectus sequi eius laborum eveniet sed sapiente tempor nostrud vero', 'Excepteur aliquam eum qui dolor accusantium impedit qui fugit omnis labore iure consequuntur non totam corrupti impedit placeat ea aut', 'Fugiat minim ipsa cumque commodo odio et similique aut ex aut illo atque veniam odio nesciunt'),
(2, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'C', 'Deserunt vero fuga. Quaerat blanditiis placeat, laborum vero ea aut dolore cillum voluptatem. Quaerat fugiat, eos.', 'Doloribus optio excepturi error sed velit id reiciendis architecto in magnam cillum voluptatem voluptatem Autem officiis', 'ANSWER', 'Dolores mollitia dolore ea ipsam ullamco incidunt culpa molestiae sit in at corrupti natus et et accusamus', 'Inventore nesciunt culpa saepe consectetur est'),
(3, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'A', 'Reprehenderit nulla itaque aliquid doloremque et aut incidunt, ad sit, officia ex.', 'ANSWER', 'Mollitia praesentium duis sapiente ipsum totam sunt nisi nobis', 'Atque dolor voluptatem tempor ullam magnam perferendis ab omnis qui aperiam temporibus enim corporis corporis quaerat', 'Ut deserunt voluptas velit autem reprehenderit consequatur'),
(4, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'A', 'Consequat. Enim eaque dolorem duis est corrupti, consectetur eos totam adipisicing cupidatat magna.', 'ANSWER', 'Corporis esse perferendis quibusdam deserunt quae iusto anim distinctio Similique porro exercitationem doloribus est id voluptate officiis excepturi', 'Non ut enim sed dolor recusandae In cumque et voluptatem pariatur Quibusdam libero', 'Sed eu sunt mollit suscipit consectetur ex accusantium aut reiciendis ut optio'),
(5, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'C', 'Ut ipsum praesentium fugit, ratione optio, impedit, ea quo odit asperiores enim Nam at tenetur.', 'Cillum ut dolor soluta voluptatibus ea excepteur optio', 'ANSWER', 'Ut natus id excepturi quas quos', 'Eaque aut autem explicabo Cum aute et veritatis id optio nostrum aliquip'),
(6, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'C', 'Consequatur voluptates placeat, inventore non ut commodi non ut quis ea earum aut.', 'Odio ex sint aut consequatur', 'ANSWER', 'Laudantium in ratione quia repellendus Aliquip alias aliquam', 'Non quidem quasi assumenda sit'),
(7, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'C', 'Pariatur. Cumque consequatur? Pariatur. Ullam esse, commodi id minima cupiditate totam officia saepe earum.', 'Labore sint dolorem at sequi qui rerum', 'ANSWER', 'Quos veniam aut vero labore quia omnis cumque', 'Et dolor dolore eum accusamus a et qui nihil Nam'),
(8, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'C', 'Sit qui quo nisi quibusdam aut voluptatum nostrud maiores aliquip magna nostrum laborum.', 'Aute inventore officiis praesentium dolores', 'ANSWER', 'Tempora ullamco aut qui sunt exercitationem ipsum ex voluptatibus debitis asperiores laudantium', 'Laborum quod dolores aspernatur inventore ipsum voluptate cum hic assumenda et consectetur voluptatem Sint sequi esse et dolore iusto accusamus'),
(9, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'D', 'Aut enim nihil sapiente laboris ea rerum ut qui id.', 'Saepe laboris beatae ea ut ullamco ullamco nulla deserunt aut sit', 'Et fuga Labore dolores voluptate dicta qui quia expedita cumque', 'Saepe dolorem iusto maxime omnis quia culpa eum aut', 'ANSWER'),
(10, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'B', 'Qui nesciunt, ad quisquam et reprehenderit aut ea enim anim dolores optio, sunt optio, expedita.', 'Voluptate inventore eligendi dicta voluptates beatae et ad dolorem odit eligendi delectus dolore ratione voluptates veniam', 'Voluptas et corporis laborum Adipisci deserunt ea autem officia incididunt aut atque ex doloremque in ex amet earum iure inventore', 'ANSWER', 'Nihil consectetur laudantium numquam quis delectus laudantium'),
(11, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'B', 'Cumque sed inventore eligendi aliquam proident, facilis illo at aut aliquip ipsa, est.', 'Eveniet voluptate quasi mollitia eligendi', 'Eos quisquam accusantium nulla vitae dolores architecto nulla aut et', 'ANSWER', 'Animi voluptate distinctio Elit aut quod ducimus ab'),
(12, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'm_c', 'C', 'Est provident, esse, sit, id, eum occaecat hic qui fugiat, occaecat voluptatem vitae qui molestiae dolor suscipit iste quibusdam.', 'Cupidatat quo quia quo et consequatur itaque qui quis repellendus Dolor similique facere duis rerum facere consectetur rerum', 'ANSWER', 'Eum quia ipsum fugiat quasi mollit aliquam nobis aut sunt hic ea ipsum in facilis', 'Magna aliqua Quibusdam cumque optio'),
(13, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 't_f', 'true', 'Temporibus corrupti, impedit, ullam id quibusdam cupiditate consectetur nulla excepteur provident, et dolores non quod itaque. true', 'N/A', 'N/A', 'N/A', 'N/A'),
(14, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 't_f', 'false', 'Nam nobis aut aspernatur eos, consequatur? Non dicta possimus, architecto. false', 'N/A', 'N/A', 'N/A', 'N/A'),
(15, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'f_b', 'N/A', 'Est, mollit aliquam ullamco rerum dolor dicta ea @BLANK rerum odit esse, tempor saepe porro veritatis et.', 'N/A', 'N/A', 'N/A', 'N/A'),
(16, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'f_b', 'N/A', '@BLANK Dolor dolore aliqua. Et rerum voluptatem, incidunt, minus veniam, quia cum similique.', 'N/A', 'N/A', 'N/A', 'N/A'),
(17, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'essay', 'N/A', 'Asperiores id fugit, provident, dolor qui ex consectetur, lorem saepe atque earum at ea blanditiis veniam, aut quis.', 'N/A', 'N/A', 'N/A', 'N/A'),
(18, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'essay', 'N/A', 'Minim laborum lorem voluptates harum quasi amet, eiusmod illum, vel maiores deserunt fugit, saepe consequatur, enim est minus animi, nostrud.', 'N/A', 'N/A', 'N/A', 'N/A'),
(19, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'activity', 'N/A', 'Tempor voluptatibus possimus, tempora ipsam culpa, nostrum dolore proident, adipisicing aperiam sequi doloribus.', 'N/A', 'N/A', 'N/A', 'N/A'),
(20, 'assessment_1489079496_Wb6dOQrvWoC7Uy1vPxtEh4k0m', 'activity', 'N/A', 'Asperiores cum accusantium molestiae consequatur autem nostrud corporis enim eos, voluptatibus voluptatem quis iure aut.', 'N/A', 'N/A', 'N/A', 'N/A'),
(21, 'assessment_1489080851_dmIAhjxeIMnP8twOCCRbLWInF', 'm_c', 'D', 'Sed dolore vel tempore, optio, porro qui dolorem ratione a facere accusamus vero et ipsa, occaecat non quibusdam.', 'Answer', 'Illum omnis et velit sed saepe provident', 'Iste id dolore quo voluptatibus velit voluptatem et enim dignissimos autem reiciendis', 'Ratione minim qui inventore do consequatur debitis sed'),
(22, 'assessment_1489080851_dmIAhjxeIMnP8twOCCRbLWInF', 'm_c', 'C', 'Quidem doloribus et voluptas itaque aut tempora quia sint ad mollit sit, aliquip.', 'Facere velit eaque voluptas ut voluptatibus qui rem est a quas mollitia unde esse officia voluptas quis qui culpa dolores', 'Answer', 'Voluptatem veniam reprehenderit qui a aut rerum nobis consectetur asperiores commodi molestiae corporis sed voluptatem aut ad in autem', 'Est accusamus molestiae accusantium incidunt'),
(23, 'assessment_1489081154_Hka2hpZcio4WOwhgpvWBdzUWO', 'm_c', 'B', 'click A but answer B', 'Similique libero architecto consectetur aliqua Similique dignissimos elit ut', 'Sit aliquam delectus impedit tempora praesentium error ex molestiae delectus molestiae eos ad corporis nostrud', 'ANSWER', 'Labore dicta est proident tempora do quia similique nulla esse laudantium eius veritatis aute veniam'),
(24, 'assessment_1489081154_Hka2hpZcio4WOwhgpvWBdzUWO', 'm_c', 'A', 'click C then D but answer A', 'click A but answer B', 'Iste eum blanditiis deserunt voluptatem Ex alias totam doloribus voluptatum reprehenderit eos exercitation laborum exercitationem nesciunt necessitatibus rem dolorum', 'Aut numquam ut non recusandae Nobis non omnis enim enim sint iste pariatur', 'In aut aliqua Dolore consectetur neque quo nemo quia necessitatibus blanditiis'),
(25, 'assessment_1489081154_Hka2hpZcio4WOwhgpvWBdzUWO', 'm_c', 'A', 'click D then A but answer C', 'Soluta esse doloremque placeat neque autem explicabo Soluta sequi', 'click A but answer B', 'Aut aut illo fugit qui id voluptate et cillum quidem ut eum dolorem sit doloribus aut', 'Ab autem ea neque ratione ducimus anim'),
(26, 'assessment_1489081761_kfbvjGO0qobcg4DyUX11ZLF5y', 'm_c', 'C', 'Click A then B answer C', 'Commodi ipsum sit et consequatur repellendus Architecto mollitia libero animi blanditiis in provident quia et', 'answer', 'Iste delectus non saepe fuga At ut laborum', 'Qui ut autem exercitationem at quibusdam ipsa et ut non dolorem et laboris qui nesciunt'),
(27, 'assessment_1489081761_kfbvjGO0qobcg4DyUX11ZLF5y', 'm_c', 'C', 'Click D then A answer C', 'Aut nemo autem sed id labore culpa veritatis neque aut mollit neque sit non qui eiusmod molestias quia sit', 'answer', 'Magni enim at vel et exercitation dolore numquam illo quidem aspernatur vel ipsam nisi tenetur vero dolore magna dolor ullam', 'Expedita rerum magni sint enim lorem quo dolor voluptas eaque nesciunt ipsam quisquam nulla proident quasi'),
(28, 'assessment_1489081761_kfbvjGO0qobcg4DyUX11ZLF5y', 'm_c', 'C', 'Click A then B answer C', 'Sit cupidatat commodo ipsam reprehenderit deleniti iure sapiente molestiae quisquam corporis fuga Exercitationem', 'answer', 'Aut id elit ex repudiandae', 'Ab mollitia nostrum non est aliqua Quibusdam facere suscipit et facere exercitationem'),
(29, 'assessment_1489082533_EWoVtSHCBmemNJudfRrOG3xdj', 'm_c', 'D', 'Click A then B answer D', 'Exercitationem dolores nulla magna quia fugit voluptate est illo doloribus ad quis quia dolore possimus in rerum', 'Nihil necessitatibus consectetur commodo qui quibusdam aut minus voluptatem consequat Rerum omnis et maxime pariatur Et id qui', 'Doloremque veniam incididunt in quidem aspernatur id omnis qui in ratione', 'ANSWER'),
(30, 'assessment_1489082533_EWoVtSHCBmemNJudfRrOG3xdj', 'm_c', 'C', 'Click D then A answer C', 'Magnam ea mollitia impedit officiis magni minima quia aspernatur', 'Ullamco quis labore sunt pariatur Incididunt atque mollit deserunt do laborum Non', 'ANSWER', 'Sint hic iste eaque et eos sint qui distinctio'),
(31, 'assessment_1489082533_EWoVtSHCBmemNJudfRrOG3xdj', 'm_c', 'A', 'Click C then D answer A', 'Answer', 'Ea nihil neque aut aliquam qui quia sequi itaque aut aliquid', 'Mollit molestias tempore ut et ipsam voluptatum dolore debitis est eos id sapiente', 'Repudiandae quos numquam rerum totam exercitation ex Nam voluptatem nisi minim in nisi dolor voluptas qui minim nihil voluptates'),
(32, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'A', 'Accusamus magni omnis odit dolores eos quibusdam hic cillum perspiciatis, eius nesciunt.', 'Answer', 'Nostrud officiis fugit repudiandae soluta', 'Qui incididunt voluptatem Quis consequatur velit labore accusantium autem autem qui magni deserunt est', 'Repellendus Dolore sit iste ea'),
(33, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'D', 'Ea eveniet, at in consequatur? Quis praesentium qui porro ab anim atque unde veniam, do nihil suscipit qui.', 'Nulla nostrum voluptatem ipsam numquam quis velit beatae expedita est quam ipsum mollit dolore fugiat dolor eos voluptate cumque', 'Dolor nesciunt impedit quasi tempor molestias quasi cupiditate voluptatem aut rem sint ut iste sint occaecat totam nisi cumque', 'Aut expedita tenetur aliqua Eveniet non veritatis fugiat sed sit pariatur Qui proident harum sequi molestias voluptatem Veniam', 'Answer'),
(34, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'A', 'Ad ipsum dolorem lorem velit dolor a et voluptas ipsum, iusto aut odio cupiditate voluptatibus quis ea.', 'Answer', 'Dolorem temporibus quo atque do irure amet ea elit accusantium maiores odio possimus', 'Ratione tempora eligendi deserunt nesciunt sit itaque molestiae laboriosam sunt repudiandae unde consequat', 'Reprehenderit veniam eum quod ea molestias ea ut ut accusamus voluptas sint est deserunt commodo et quia dolores'),
(35, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'B', 'Sunt, enim accusamus ut quidem optio, velit necessitatibus aute mollitia qui Nam.', 'Nihil occaecat ea ab magni velit quia excepturi officia dolorum magna veniam qui blanditiis', 'Answer', 'Excepturi tenetur occaecat dolorem perspiciatis odio est aut voluptas dolore vel cumque soluta vero quidem ipsum', 'Aliqua Sit recusandae Iste rerum facilis proident quo vel sunt dolores aut et deleniti irure deleniti exercitation'),
(36, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'C', 'Omnis doloremque est aliquam reiciendis perspiciatis, vel repudiandae sunt laborum minim qui dolor excepturi recusandae. Reiciendis aperiam occaecat ea qui.', 'Ipsa quia id et omnis vel sint excepteur incidunt ut in nulla eos', 'Accusamus labore autem laboris veritatis', 'Answer', 'Do sequi non et deserunt nemo id eligendi et eum fuga'),
(37, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'A', 'Ut voluptas laboriosam, ex aut et commodi est, quis ut in veniam, sequi vel consequatur? Nesciunt, doloremque.', 'Answer', 'Sed sed duis soluta rerum natus dolor necessitatibus vitae eos veniam maiores maxime alias quam et', 'Et omnis aliquip quis non eum pariatur Temporibus iste et quae irure', 'Labore ad eligendi eum porro eum quis omnis eos id'),
(38, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'D', 'Dolor ea culpa quis ea voluptatum quia dolor at quis aut voluptas molestiae autem.', 'Non consequatur consectetur nulla exercitation et provident quas est reprehenderit itaque est eaque aut nobis accusantium explicabo', 'Voluptate voluptate id culpa est est ut harum ipsa reprehenderit ut', 'Aperiam veritatis aut elit officiis amet soluta nostrud eaque distinctio Tempora dolor consequatur deserunt aspernatur Nam odio aliquip commodo enim', 'Answer'),
(39, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'C', 'Quo doloremque dolores id reprehenderit, sunt et consequat. Rerum non eligendi sint.', 'Ut et quaerat in obcaecati', 'Maiores cum id aut dignissimos nisi et commodi tempor', 'Answer', 'Quo sed ipsum minus temporibus'),
(40, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'C', 'Eos id voluptas iusto rerum magni non distinctio. Doloribus tempore, dolorem esse, est, est.', 'Nam eaque nihil similique praesentium sapiente dicta perferendis ipsam nulla quibusdam veniam sunt voluptas neque cillum ut', 'Accusamus hic ipsam aute aut est delectus provident doloremque inventore consequatur velit laborum Praesentium tempor nisi', 'Answer', 'Veniam dignissimos culpa in harum est eu eum id proident aliquid'),
(41, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'm_c', 'A', 'Ut ab id inventore et quis reiciendis quia quia libero quo ipsum, quae cupidatat consequatur.', 'Answer', 'Ab dolor adipisicing sapiente eu', 'Fugiat sit aut cupiditate ipsam vel sint rerum', 'Rerum nostrum illum eum adipisci beatae eu sunt est qui'),
(42, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 't_f', 'false', 'Veniam, unde enim illo repudiandae soluta quis tenetur unde sequi ut perferendis omnis maiores a excepteur eum consectetur.f', 'N/A', 'N/A', 'N/A', 'N/A'),
(43, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 't_f', 'false', 'Nam minima magnam ea eveniet, enim omnis placeat, dolore eaque tenetur sit voluptas consequat. Minima ut quo adipisci laborum.f', 'N/A', 'N/A', 'N/A', 'N/A'),
(44, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'f_b', 'N/A', 'Architecto @BLANK sint, aliquip qui quis accusantium voluptatem dolor ut mollitia pariatur. Doloremque nulla debitis reprehenderit, officia sunt beatae eius.', 'N/A', 'N/A', 'N/A', 'N/A'),
(45, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'f_b', 'N/A', 'Qui ea dolor @BLANK eius in autem id eligendi inventore fugiat voluptate suscipit debitis voluptas sed fugiat, mollit.', 'N/A', 'N/A', 'N/A', 'N/A'),
(46, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'essay', 'N/A', 'Consequatur et exercitationem laborum. Sit, et nihil aut corporis error.', 'N/A', 'N/A', 'N/A', 'N/A'),
(47, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'essay', 'N/A', 'Expedita deserunt nostrum lorem ut animi, dolor deserunt ipsa, cupidatat dolorum natus.', 'N/A', 'N/A', 'N/A', 'N/A'),
(48, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'activity', 'N/A', 'Ipsa, dolor consectetur aut laboris qui sit, perferendis sequi quasi debitis saepe.', 'N/A', 'N/A', 'N/A', 'N/A'),
(49, 'assessment_1489082785_crXLiBnE90YMuZedwo7zZA5V5', 'activity', 'N/A', 'Amet, delectus, in molestiae odit in non neque soluta vel quaerat.', 'N/A', 'N/A', 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `calendar`
--

CREATE TABLE `calendar` (
  `_cal_id` varchar(255) NOT NULL,
  `_account_id` varchar(255) NOT NULL,
  `_text` text NOT NULL,
  `_description` longtext NOT NULL,
  `_share_with` text,
  `_start_date` datetime NOT NULL,
  `_end_date` datetime NOT NULL,
  `_date_submitted` datetime NOT NULL,
  `_cal_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calendar`
--

INSERT INTO `calendar` (`_cal_id`, `_account_id`, `_text`, `_description`, `_share_with`, `_start_date`, `_end_date`, `_date_submitted`, `_cal_count`) VALUES
('1486408101012', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New event', '', '', '2018-01-02 00:00:00', '2018-01-02 00:05:00', '2017-04-22 04:40:15', 1),
('1486408101017', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New event 2', '', '', '2018-01-10 00:00:00', '2018-01-10 04:00:00', '2017-04-22 04:40:15', 2),
('1486409285250', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New event', '', '', '2018-01-02 00:00:00', '2018-01-02 00:05:00', '2017-04-22 04:40:15', 3),
('1486409285255', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New eventdasdasdasd', '', '', '2018-01-02 00:00:00', '2018-01-02 00:05:00', '2017-04-22 04:40:15', 4),
('1486411021304', '1zyztk7dvTa9QBcsGiaKKkw7h', 'exam', '', '', '2018-01-03 07:30:00', '2018-01-04 09:00:00', '2017-04-22 04:40:15', 5),
('1486412167351', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New event', '', '', '2018-01-11 00:00:00', '2018-01-11 00:05:00', '2017-04-22 04:40:15', 6),
('1486412514075', '1zyztk7dvTa9QBcsGiaKKkw7h', 'asdasd', '', '', '2018-01-17 00:00:00', '2018-01-17 00:05:00', '2017-04-22 04:40:15', 7),
('1486412520583', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New event', '', 'ITE 001 - Foundation of Information Technology', '2018-01-06 00:00:00', '2018-01-07 00:00:00', '2017-04-22 04:40:15', 8),
('1486412750014', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New event', 'dasdasdsadasdas', '', '2018-01-18 00:00:00', '2018-01-18 00:05:00', '2017-04-22 04:40:15', 9),
('1486412799435', '1zyztk7dvTa9QBcsGiaKKkw7h', 'teadsadas', 'asdasdasd', '', '2018-01-12 00:00:00', '2018-01-12 00:05:00', '2017-04-22 04:40:15', 10),
('1487268649005', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New event', '', '', '2018-01-13 00:00:00', '2018-01-13 00:05:00', '2017-04-22 04:40:15', 11),
('1492715039877', '1zyztk7dvTa9QBcsGiaKKkw7h', 'testtest', '', 'Anaheim Ducks', '2018-01-10 00:00:00', '2018-01-10 00:05:00', '2017-04-22 04:40:15', 12),
('1492807103169', '1zyztk7dvTa9QBcsGiaKKkw7h', 'New event', '', '', '2017-04-12 00:00:00', '2017-04-12 00:05:00', '2017-04-22 04:40:15', 13),
('1492807120207', '1zyztk7dvTa9QBcsGiaKKkw7h', 'Meeting', 'Adipisci cubilia commodi! Dignissimos irure non fames provident scelerisque maxime minim ullamco? Unde eleifend do primis ullamco, incididunt, incidunt accusantium? Dolorum excepteur eligendi vestibulum quam quia sed, dolor, officiis ipsum, explicabo temporibus nonummy magnis, sint quo aperiam, eiusmod turpis', 'ITE 008 - DBMS using Foxpro', '2017-04-03 06:50:00', '2017-04-04 17:45:00', '2017-04-22 04:40:15', 14);

-- --------------------------------------------------------

--
-- Table structure for table `gradebook`
--

CREATE TABLE `gradebook` (
  `gradebook_id` int(11) NOT NULL,
  `gradebook_generated_id` varchar(255) NOT NULL,
  `gradebook_owner` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `school_year` text NOT NULL,
  `prelim_span` text NOT NULL,
  `midterm_span` text NOT NULL,
  `final_span` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradebook`
--

INSERT INTO `gradebook` (`gradebook_id`, `gradebook_generated_id`, `gradebook_owner`, `course_id`, `school_year`, `prelim_span`, `midterm_span`, `final_span`, `date_created`) VALUES
(2, 'jAaR6xABMmjc3nPJas5OPVzwf', '1zyztk7dvTa9QBcsGiaKKkw7h', 39, '2016 - 2017', '2017-03-16 - 2017-03-31', '2017-04-01 - Present', 'NOT AVAILABLE', '2017-03-16 00:21:16'),
(3, 'jAaR6xABMmjc3nPJas5OPVzwf', '1zyztk7dvTa9QBcsGiaKKkw7h', 40, '2016 - 2017', '2017-03-16 - 2017-03-31', '2017-04-01 - Present', 'NOT AVAILABLE', '2017-03-16 00:21:16'),
(4, 'L70cbPF858ZoGRVyIlXIns3uo', '1zyztk7dvTa9QBcsGiaKKkw7h', 37, '2016 - 2017', '2017-01-01 - 2017-05-31', 'NOT AVAILABLE', 'NOT AVAILABLE', '2017-03-16 23:18:56');

-- --------------------------------------------------------

--
-- Table structure for table `gradebook_meta`
--

CREATE TABLE `gradebook_meta` (
  `_id` int(11) NOT NULL,
  `meta_id` text NOT NULL,
  `meta_key` text NOT NULL,
  `meta_value` text NOT NULL,
  `meta_extra` text,
  `_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gradebook_meta`
--

INSERT INTO `gradebook_meta` (`_id`, `meta_id`, `meta_key`, `meta_value`, `meta_extra`, `_datetime`) VALUES
(1, 'PARENT-T4Tn1489874192', 'subject_id', '37', '2', '2017-03-19 05:56:32'),
(2, 'PARENT-T4Tn1489874192', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-03-19 05:56:32'),
(3, 'PARENT-T4Tn1489874192', 'gradebook_id', '4', '2', '2017-03-19 05:56:32'),
(4, 'PARENT-T4Tn1489874192', 'student_id', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'CHILD-3Qab1489874192-0', '2017-03-19 05:56:32'),
(5, 'PARENT-T4Tn1489874192', 'student_id', 'MihdNkTNyU2Mx7XZHxmMwit0X', 'CHILD-R5kZ1489874192-1', '2017-03-19 05:56:32'),
(6, 'PARENT-T4Tn1489874192', 'student_id', '271paZs1b9Jfo6YiEOJSjI7fd', 'CHILD-9LXw1489874192-2', '2017-03-19 05:56:32'),
(7, 'PARENT-T4Tn1489874192', 'student_id', 'ERH13ANB3DV', 'CHILD-hla11489874192-3', '2017-03-19 05:56:32'),
(8, 'PARENT-T4Tn1489874192', 'student_id', 'YIP11MSE3FX', 'CHILD-5Oxb1489874192-4', '2017-03-19 05:56:32'),
(9, 'PARENT-T4Tn1489874192', 'student_id', 'POX70RIN6MW', 'CHILD-UB9e1489874192-5', '2017-03-19 05:56:32'),
(10, 'PARENT-T4Tn1489874192', 'student_id', 'MKR62CDO4BY', 'CHILD-BICT1489874192-6', '2017-03-19 05:56:32'),
(11, 'PARENT-T4Tn1489874192', 'student_id', 'GOO06VXJ8VK', 'CHILD-uB2n1489874192-7', '2017-03-19 05:56:32'),
(12, 'PARENT-T4Tn1489874192', 'student_id', 'XJN53WFO6DB', 'CHILD-rfZp1489874192-8', '2017-03-19 05:56:32'),
(13, 'PARENT-T4Tn1489874192', 'student_id', 'JZV34NTQ2BO', 'CHILD-N5zc1489874192-9', '2017-03-19 05:56:32'),
(14, 'PARENT-T4Tn1489874192', 'student_id', 'YMF75XMB2FC', 'CHILD-o8nu1489874192-10', '2017-03-19 05:56:32'),
(15, 'PARENT-T4Tn1489874192', 'student_id', 'ECT88TWA6EC', 'CHILD-yPvs1489874192-11', '2017-03-19 05:56:32'),
(16, 'PARENT-T4Tn1489874192', 'student_id', 'FHB23FSO7IL', 'CHILD-a8xR1489874192-12', '2017-03-19 05:56:32'),
(17, 'PARENT-T4Tn1489874192', 'student_id', 'WID99XWL7WV', 'CHILD-xyAT1489874192-13', '2017-03-19 05:56:32'),
(18, 'PARENT-T4Tn1489874192', 'student_id', 'HEC03WTV8DN', 'CHILD-w1eh1489874192-14', '2017-03-19 05:56:32'),
(19, 'PARENT-T4Tn1489874192', 'student_id', 'BAL65VLM9TG', 'CHILD-t1zg1489874192-15', '2017-03-19 05:56:32'),
(20, 'PARENT-T4Tn1489874192', 'student_id', 'ZHX77QPU2YK', 'CHILD-dvbw1489874192-16', '2017-03-19 05:56:32'),
(21, 'PARENT-T4Tn1489874192', 'student_id', 'BPI33XBG2ND', 'CHILD-7Yci1489874192-17', '2017-03-19 05:56:32'),
(22, 'PARENT-T4Tn1489874192', 'student_id', 'XCL49MYI0JO', 'CHILD-0naj1489874192-18', '2017-03-19 05:56:32'),
(23, 'PARENT-T4Tn1489874192', 'student_id', 'OCC43XWH0HK', 'CHILD-dbdL1489874192-19', '2017-03-19 05:56:32'),
(24, 'PARENT-T4Tn1489874192', 'student_id', 'HYF85IOW6WM', 'CHILD-CmVp1489874192-20', '2017-03-19 05:56:32'),
(25, 'PARENT-T4Tn1489874192', 'student_id', 'OMI20XXD9ZM', 'CHILD-xnoq1489874192-21', '2017-03-19 05:56:32'),
(26, 'PARENT-T4Tn1489874192', 'student_id', 'CRD77FMI1ZY', 'CHILD-Ocdy1489874192-22', '2017-03-19 05:56:33'),
(27, 'PARENT-T4Tn1489874192', 'student_id', 'GCU52TRX1RO', 'CHILD-Ojt01489874193-23', '2017-03-19 05:56:33'),
(28, 'PARENT-T4Tn1489874192', 'student_id', 'IOP12TTH6ZE', 'CHILD-mFLv1489874193-24', '2017-03-19 05:56:33'),
(29, 'PARENT-T4Tn1489874192', 'student_id', 'APA13CAL4UT', 'CHILD-NJbg1489874193-25', '2017-03-19 05:56:33'),
(30, 'PARENT-T4Tn1489874192', 'student_id', 'ONG56EID4JI', 'CHILD-Zul01489874193-26', '2017-03-19 05:56:33'),
(31, 'PARENT-T4Tn1489874192', 'student_id', 'MNM79YBM5DP', 'CHILD-fpjX1489874193-27', '2017-03-19 05:56:33'),
(32, 'PARENT-T4Tn1489874192', 'student_id', 'QHO15LUW1EG', 'CHILD-rrGP1489874193-28', '2017-03-19 05:56:33'),
(33, 'PARENT-4zPu1489874228', 'subject_id', '39', '2', '2017-03-19 05:57:08'),
(34, 'PARENT-4zPu1489874228', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-03-19 05:57:08'),
(35, 'PARENT-4zPu1489874228', 'gradebook_id', '2', '2', '2017-03-19 05:57:08'),
(36, 'PARENT-4zPu1489874228', 'student_id', 'MihdNkTNyU2Mx7XZHxmMwit0X', 'CHILD-fzGx1489874228-0', '2017-03-19 05:57:08'),
(37, 'PARENT-4zPu1489874228', 'student_id', 'Z0uC9C5TFcdRLzP695qJ3BWlc', 'CHILD-tKDS1489874228-1', '2017-03-19 05:57:08'),
(38, 'PARENT-GImR1489874263', 'subject_id', '39', '1', '2017-03-19 05:57:43'),
(39, 'PARENT-GImR1489874263', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-03-19 05:57:43'),
(40, 'PARENT-GImR1489874263', 'gradebook_id', '2', '1', '2017-03-19 05:57:43'),
(41, 'PARENT-GImR1489874263', 'student_id', 'MihdNkTNyU2Mx7XZHxmMwit0X', 'CHILD-my6l1489874263-0', '2017-03-19 05:57:43'),
(42, 'PARENT-GImR1489874263', 'student_id', 'Z0uC9C5TFcdRLzP695qJ3BWlc', 'CHILD-uSAF1489874263-1', '2017-03-19 05:57:43'),
(43, 'PARENT-cVIN1489874290', 'subject_id', '37', '1', '2017-03-19 05:58:10'),
(44, 'PARENT-cVIN1489874290', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-03-19 05:58:10'),
(45, 'PARENT-cVIN1489874290', 'gradebook_id', '4', '1', '2017-03-19 05:58:10'),
(46, 'PARENT-cVIN1489874290', 'student_id', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'CHILD-A1TI1489874290-0', '2017-03-19 05:58:10'),
(47, 'PARENT-cVIN1489874290', 'student_id', 'MihdNkTNyU2Mx7XZHxmMwit0X', 'CHILD-qiri1489874290-1', '2017-03-19 05:58:10'),
(48, 'PARENT-cVIN1489874290', 'student_id', '271paZs1b9Jfo6YiEOJSjI7fd', 'CHILD-q5PD1489874290-2', '2017-03-19 05:58:10'),
(49, 'PARENT-cVIN1489874290', 'student_id', 'ERH13ANB3DV', 'CHILD-Pf2k1489874290-3', '2017-03-19 05:58:10'),
(50, 'PARENT-cVIN1489874290', 'student_id', 'YIP11MSE3FX', 'CHILD-k7ws1489874290-4', '2017-03-19 05:58:10'),
(51, 'PARENT-cVIN1489874290', 'student_id', 'POX70RIN6MW', 'CHILD-9xfD1489874290-5', '2017-03-19 05:58:10'),
(52, 'PARENT-cVIN1489874290', 'student_id', 'MKR62CDO4BY', 'CHILD-1RHV1489874290-6', '2017-03-19 05:58:10'),
(53, 'PARENT-cVIN1489874290', 'student_id', 'GOO06VXJ8VK', 'CHILD-aUPX1489874290-7', '2017-03-19 05:58:10'),
(54, 'PARENT-cVIN1489874290', 'student_id', 'XJN53WFO6DB', 'CHILD-h37N1489874290-8', '2017-03-19 05:58:10'),
(55, 'PARENT-cVIN1489874290', 'student_id', 'JZV34NTQ2BO', 'CHILD-B7w31489874290-9', '2017-03-19 05:58:10'),
(56, 'PARENT-cVIN1489874290', 'student_id', 'YMF75XMB2FC', 'CHILD-QtwO1489874290-10', '2017-03-19 05:58:10'),
(57, 'PARENT-cVIN1489874290', 'student_id', 'ECT88TWA6EC', 'CHILD-eV5G1489874290-11', '2017-03-19 05:58:10'),
(58, 'PARENT-cVIN1489874290', 'student_id', 'FHB23FSO7IL', 'CHILD-sQGJ1489874290-12', '2017-03-19 05:58:10'),
(59, 'PARENT-cVIN1489874290', 'student_id', 'WID99XWL7WV', 'CHILD-M3gA1489874290-13', '2017-03-19 05:58:10'),
(60, 'PARENT-cVIN1489874290', 'student_id', 'HEC03WTV8DN', 'CHILD-TVki1489874291-14', '2017-03-19 05:58:11'),
(61, 'PARENT-cVIN1489874290', 'student_id', 'BAL65VLM9TG', 'CHILD-0hOv1489874291-15', '2017-03-19 05:58:11'),
(62, 'PARENT-cVIN1489874290', 'student_id', 'ZHX77QPU2YK', 'CHILD-Rtdg1489874291-16', '2017-03-19 05:58:11'),
(63, 'PARENT-cVIN1489874290', 'student_id', 'BPI33XBG2ND', 'CHILD-Fkuc1489874291-17', '2017-03-19 05:58:11'),
(64, 'PARENT-cVIN1489874290', 'student_id', 'XCL49MYI0JO', 'CHILD-9d6n1489874291-18', '2017-03-19 05:58:11'),
(65, 'PARENT-cVIN1489874290', 'student_id', 'OCC43XWH0HK', 'CHILD-vY1p1489874291-19', '2017-03-19 05:58:11'),
(66, 'PARENT-cVIN1489874290', 'student_id', 'HYF85IOW6WM', 'CHILD-tWIo1489874291-20', '2017-03-19 05:58:11'),
(67, 'PARENT-cVIN1489874290', 'student_id', 'OMI20XXD9ZM', 'CHILD-hXaU1489874291-21', '2017-03-19 05:58:11'),
(68, 'PARENT-cVIN1489874290', 'student_id', 'CRD77FMI1ZY', 'CHILD-CmP31489874291-22', '2017-03-19 05:58:11'),
(69, 'PARENT-cVIN1489874290', 'student_id', 'GCU52TRX1RO', 'CHILD-J1Gp1489874291-23', '2017-03-19 05:58:11'),
(70, 'PARENT-cVIN1489874290', 'student_id', 'IOP12TTH6ZE', 'CHILD-jfb61489874291-24', '2017-03-19 05:58:11'),
(71, 'PARENT-cVIN1489874290', 'student_id', 'APA13CAL4UT', 'CHILD-BUjH1489874291-25', '2017-03-19 05:58:11'),
(72, 'PARENT-cVIN1489874290', 'student_id', 'ONG56EID4JI', 'CHILD-jlxj1489874291-26', '2017-03-19 05:58:11'),
(73, 'PARENT-cVIN1489874290', 'student_id', 'MNM79YBM5DP', 'CHILD-FoOw1489874291-27', '2017-03-19 05:58:11'),
(74, 'PARENT-cVIN1489874290', 'student_id', 'QHO15LUW1EG', 'CHILD-mpDp1489874291-28', '2017-03-19 05:58:11'),
(165, 'PARENT-T4Tn1489874192', 'column_total_val', '100', '1', '2017-03-19 06:46:15'),
(166, 'CHILD-3Qab1489874192-0', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(167, 'CHILD-R5kZ1489874192-1', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(168, 'CHILD-9LXw1489874192-2', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(169, 'CHILD-hla11489874192-3', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(170, 'CHILD-5Oxb1489874192-4', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(171, 'CHILD-UB9e1489874192-5', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(172, 'CHILD-BICT1489874192-6', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(173, 'CHILD-uB2n1489874192-7', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(174, 'CHILD-rfZp1489874192-8', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(175, 'CHILD-N5zc1489874192-9', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(176, 'CHILD-o8nu1489874192-10', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(177, 'CHILD-yPvs1489874192-11', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(178, 'CHILD-a8xR1489874192-12', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(179, 'CHILD-xyAT1489874192-13', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(180, 'CHILD-w1eh1489874192-14', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(181, 'CHILD-t1zg1489874192-15', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(182, 'CHILD-dvbw1489874192-16', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(183, 'CHILD-7Yci1489874192-17', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(184, 'CHILD-0naj1489874192-18', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(185, 'CHILD-dbdL1489874192-19', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(186, 'CHILD-CmVp1489874192-20', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(187, 'CHILD-xnoq1489874192-21', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(188, 'CHILD-Ocdy1489874192-22', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(189, 'CHILD-Ojt01489874193-23', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(190, 'CHILD-mFLv1489874193-24', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(191, 'CHILD-NJbg1489874193-25', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(192, 'CHILD-Zul01489874193-26', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(193, 'CHILD-fpjX1489874193-27', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(194, 'CHILD-rrGP1489874193-28', 'column_val', '0', '1', '2017-03-19 06:46:15'),
(228, 'PARENT-4zPu1489874228', 'column_total_val', '15', '1', '2017-03-19 07:05:10'),
(229, 'CHILD-fzGx1489874228-0', 'column_val', '15', '1', '2017-03-19 07:05:10'),
(230, 'CHILD-tKDS1489874228-1', 'column_val', '10', '1', '2017-03-19 07:05:10'),
(1101, 'PARENT-Iz4I1489940647', 'subject_id', '37', '3', '2017-03-20 00:24:07'),
(1102, 'PARENT-Iz4I1489940647', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-03-20 00:24:07'),
(1103, 'PARENT-Iz4I1489940647', 'gradebook_id', '4', '3', '2017-03-20 00:24:07'),
(1104, 'PARENT-Iz4I1489940647', 'student_id', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'CHILD-5ekZ1489940647-0', '2017-03-20 00:24:07'),
(1105, 'PARENT-Iz4I1489940647', 'student_id', 'MihdNkTNyU2Mx7XZHxmMwit0X', 'CHILD-r7VF1489940647-1', '2017-03-20 00:24:07'),
(1106, 'PARENT-Iz4I1489940647', 'student_id', '271paZs1b9Jfo6YiEOJSjI7fd', 'CHILD-SsHI1489940647-2', '2017-03-20 00:24:07'),
(1107, 'PARENT-Iz4I1489940647', 'student_id', 'ERH13ANB3DV', 'CHILD-XXZC1489940647-3', '2017-03-20 00:24:07'),
(1108, 'PARENT-Iz4I1489940647', 'student_id', 'YIP11MSE3FX', 'CHILD-NREj1489940647-4', '2017-03-20 00:24:07'),
(1109, 'PARENT-Iz4I1489940647', 'student_id', 'POX70RIN6MW', 'CHILD-ZR1i1489940647-5', '2017-03-20 00:24:07'),
(1110, 'PARENT-Iz4I1489940647', 'student_id', 'MKR62CDO4BY', 'CHILD-CbWw1489940647-6', '2017-03-20 00:24:07'),
(1111, 'PARENT-Iz4I1489940647', 'student_id', 'GOO06VXJ8VK', 'CHILD-hyLt1489940647-7', '2017-03-20 00:24:07'),
(1112, 'PARENT-Iz4I1489940647', 'student_id', 'XJN53WFO6DB', 'CHILD-5ck61489940647-8', '2017-03-20 00:24:07'),
(1113, 'PARENT-Iz4I1489940647', 'student_id', 'JZV34NTQ2BO', 'CHILD-COXT1489940647-9', '2017-03-20 00:24:07'),
(1114, 'PARENT-Iz4I1489940647', 'student_id', 'YMF75XMB2FC', 'CHILD-XDxO1489940647-10', '2017-03-20 00:24:07'),
(1115, 'PARENT-Iz4I1489940647', 'student_id', 'ECT88TWA6EC', 'CHILD-Innj1489940647-11', '2017-03-20 00:24:07'),
(1116, 'PARENT-Iz4I1489940647', 'student_id', 'FHB23FSO7IL', 'CHILD-Ygkn1489940647-12', '2017-03-20 00:24:07'),
(1117, 'PARENT-Iz4I1489940647', 'student_id', 'WID99XWL7WV', 'CHILD-lZKs1489940647-13', '2017-03-20 00:24:07'),
(1118, 'PARENT-Iz4I1489940647', 'student_id', 'HEC03WTV8DN', 'CHILD-TOsy1489940647-14', '2017-03-20 00:24:07'),
(1119, 'PARENT-Iz4I1489940647', 'student_id', 'BAL65VLM9TG', 'CHILD-epP61489940647-15', '2017-03-20 00:24:07'),
(1120, 'PARENT-Iz4I1489940647', 'student_id', 'ZHX77QPU2YK', 'CHILD-s2G61489940647-16', '2017-03-20 00:24:07'),
(1121, 'PARENT-Iz4I1489940647', 'student_id', 'BPI33XBG2ND', 'CHILD-9onZ1489940647-17', '2017-03-20 00:24:07'),
(1122, 'PARENT-Iz4I1489940647', 'student_id', 'XCL49MYI0JO', 'CHILD-qHJL1489940647-18', '2017-03-20 00:24:07'),
(1123, 'PARENT-Iz4I1489940647', 'student_id', 'OCC43XWH0HK', 'CHILD-QF7S1489940647-19', '2017-03-20 00:24:07'),
(1124, 'PARENT-Iz4I1489940647', 'student_id', 'HYF85IOW6WM', 'CHILD-xxni1489940647-20', '2017-03-20 00:24:07'),
(1125, 'PARENT-Iz4I1489940647', 'student_id', 'OMI20XXD9ZM', 'CHILD-40Qv1489940647-21', '2017-03-20 00:24:07'),
(1126, 'PARENT-Iz4I1489940647', 'student_id', 'CRD77FMI1ZY', 'CHILD-xjmr1489940647-22', '2017-03-20 00:24:07'),
(1127, 'PARENT-Iz4I1489940647', 'student_id', 'GCU52TRX1RO', 'CHILD-y9gC1489940647-23', '2017-03-20 00:24:07'),
(1128, 'PARENT-Iz4I1489940647', 'student_id', 'IOP12TTH6ZE', 'CHILD-cLqX1489940647-24', '2017-03-20 00:24:07'),
(1129, 'PARENT-Iz4I1489940647', 'student_id', 'APA13CAL4UT', 'CHILD-4Q9Y1489940647-25', '2017-03-20 00:24:07'),
(1130, 'PARENT-Iz4I1489940647', 'student_id', 'ONG56EID4JI', 'CHILD-gDjB1489940647-26', '2017-03-20 00:24:07'),
(1131, 'PARENT-Iz4I1489940647', 'student_id', 'MNM79YBM5DP', 'CHILD-mQfk1489940647-27', '2017-03-20 00:24:07'),
(1132, 'PARENT-Iz4I1489940647', 'student_id', 'QHO15LUW1EG', 'CHILD-tHO61489940647-28', '2017-03-20 00:24:07'),
(1133, 'PARENT-vCxI1490286058', 'subject_id', '40', '2', '2017-03-24 00:20:58'),
(1134, 'PARENT-vCxI1490286058', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-03-24 00:20:58'),
(1135, 'PARENT-vCxI1490286058', 'gradebook_id', '3', '2', '2017-03-24 00:20:58'),
(1136, 'PARENT-vCxI1490286058', 'student_id', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'CHILD-zatB1490286058-0', '2017-03-24 00:20:58'),
(1137, 'PARENT-vCxI1490286058', 'student_id', '271paZs1b9Jfo6YiEOJSjI7fd', 'CHILD-mxi31490286058-1', '2017-03-24 00:20:58'),
(1138, 'PARENT-vCxI1490286058', 'student_id', 'Z0uC9C5TFcdRLzP695qJ3BWlc', 'CHILD-6A0F1490286058-2', '2017-03-24 00:20:58'),
(2129, 'PARENT-cVIN1489874290', 'column_total_val', '100', '1', '2017-03-24 03:13:57'),
(2130, 'PARENT-cVIN1489874290', 'column_total_val', '25', '2', '2017-03-24 03:13:57'),
(2131, 'PARENT-cVIN1489874290', 'column_total_val', '75', '3', '2017-03-24 03:13:57'),
(2132, 'CHILD-A1TI1489874290-0', 'column_val', '25', '1', '2017-03-24 03:13:57'),
(2133, 'CHILD-A1TI1489874290-0', 'column_val', '23', '2', '2017-03-24 03:13:57'),
(2134, 'CHILD-A1TI1489874290-0', 'column_val', '73', '3', '2017-03-24 03:13:57'),
(2135, 'CHILD-qiri1489874290-1', 'column_val', '35', '1', '2017-03-24 03:13:57'),
(2136, 'CHILD-qiri1489874290-1', 'column_val', '15', '2', '2017-03-24 03:13:57'),
(2137, 'CHILD-qiri1489874290-1', 'column_val', '35', '3', '2017-03-24 03:13:57'),
(2138, 'CHILD-q5PD1489874290-2', 'column_val', '10', '1', '2017-03-24 03:13:57'),
(2139, 'CHILD-q5PD1489874290-2', 'column_val', '23', '2', '2017-03-24 03:13:57'),
(2140, 'CHILD-q5PD1489874290-2', 'column_val', '40', '3', '2017-03-24 03:13:57'),
(2141, 'CHILD-Pf2k1489874290-3', 'column_val', '20', '1', '2017-03-24 03:13:57'),
(2142, 'CHILD-Pf2k1489874290-3', 'column_val', '15', '2', '2017-03-24 03:13:57'),
(2143, 'CHILD-Pf2k1489874290-3', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2144, 'CHILD-k7ws1489874290-4', 'column_val', '60', '1', '2017-03-24 03:13:57'),
(2145, 'CHILD-k7ws1489874290-4', 'column_val', '25', '2', '2017-03-24 03:13:57'),
(2146, 'CHILD-k7ws1489874290-4', 'column_val', '60', '3', '2017-03-24 03:13:57'),
(2147, 'CHILD-9xfD1489874290-5', 'column_val', '80', '1', '2017-03-24 03:13:57'),
(2148, 'CHILD-9xfD1489874290-5', 'column_val', '6', '2', '2017-03-24 03:13:57'),
(2149, 'CHILD-9xfD1489874290-5', 'column_val', '6', '3', '2017-03-24 03:13:57'),
(2150, 'CHILD-1RHV1489874290-6', 'column_val', '36', '1', '2017-03-24 03:13:57'),
(2151, 'CHILD-1RHV1489874290-6', 'column_val', '1', '2', '2017-03-24 03:13:57'),
(2152, 'CHILD-1RHV1489874290-6', 'column_val', '4', '3', '2017-03-24 03:13:57'),
(2153, 'CHILD-aUPX1489874290-7', 'column_val', '77', '1', '2017-03-24 03:13:57'),
(2154, 'CHILD-aUPX1489874290-7', 'column_val', '7', '2', '2017-03-24 03:13:57'),
(2155, 'CHILD-aUPX1489874290-7', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2156, 'CHILD-h37N1489874290-8', 'column_val', '98', '1', '2017-03-24 03:13:57'),
(2157, 'CHILD-h37N1489874290-8', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2158, 'CHILD-h37N1489874290-8', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2159, 'CHILD-B7w31489874290-9', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2160, 'CHILD-B7w31489874290-9', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2161, 'CHILD-B7w31489874290-9', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2162, 'CHILD-QtwO1489874290-10', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2163, 'CHILD-QtwO1489874290-10', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2164, 'CHILD-QtwO1489874290-10', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2165, 'CHILD-eV5G1489874290-11', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2166, 'CHILD-eV5G1489874290-11', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2167, 'CHILD-eV5G1489874290-11', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2168, 'CHILD-sQGJ1489874290-12', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2169, 'CHILD-sQGJ1489874290-12', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2170, 'CHILD-sQGJ1489874290-12', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2171, 'CHILD-M3gA1489874290-13', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2172, 'CHILD-M3gA1489874290-13', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2173, 'CHILD-M3gA1489874290-13', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2174, 'CHILD-TVki1489874291-14', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2175, 'CHILD-TVki1489874291-14', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2176, 'CHILD-TVki1489874291-14', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2177, 'CHILD-0hOv1489874291-15', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2178, 'CHILD-0hOv1489874291-15', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2179, 'CHILD-0hOv1489874291-15', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2180, 'CHILD-Rtdg1489874291-16', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2181, 'CHILD-Rtdg1489874291-16', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2182, 'CHILD-Rtdg1489874291-16', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2183, 'CHILD-Fkuc1489874291-17', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2184, 'CHILD-Fkuc1489874291-17', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2185, 'CHILD-Fkuc1489874291-17', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2186, 'CHILD-9d6n1489874291-18', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2187, 'CHILD-9d6n1489874291-18', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2188, 'CHILD-9d6n1489874291-18', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2189, 'CHILD-vY1p1489874291-19', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2190, 'CHILD-vY1p1489874291-19', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2191, 'CHILD-vY1p1489874291-19', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2192, 'CHILD-tWIo1489874291-20', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2193, 'CHILD-tWIo1489874291-20', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2194, 'CHILD-tWIo1489874291-20', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2195, 'CHILD-hXaU1489874291-21', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2196, 'CHILD-hXaU1489874291-21', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2197, 'CHILD-hXaU1489874291-21', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2198, 'CHILD-CmP31489874291-22', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2199, 'CHILD-CmP31489874291-22', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2200, 'CHILD-CmP31489874291-22', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2201, 'CHILD-J1Gp1489874291-23', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2202, 'CHILD-J1Gp1489874291-23', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2203, 'CHILD-J1Gp1489874291-23', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2204, 'CHILD-jfb61489874291-24', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2205, 'CHILD-jfb61489874291-24', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2206, 'CHILD-jfb61489874291-24', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2207, 'CHILD-BUjH1489874291-25', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2208, 'CHILD-BUjH1489874291-25', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2209, 'CHILD-BUjH1489874291-25', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2210, 'CHILD-jlxj1489874291-26', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2211, 'CHILD-jlxj1489874291-26', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2212, 'CHILD-jlxj1489874291-26', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2213, 'CHILD-FoOw1489874291-27', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2214, 'CHILD-FoOw1489874291-27', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2215, 'CHILD-FoOw1489874291-27', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2216, 'CHILD-mpDp1489874291-28', 'column_val', '0', '1', '2017-03-24 03:13:57'),
(2217, 'CHILD-mpDp1489874291-28', 'column_val', '0', '2', '2017-03-24 03:13:57'),
(2218, 'CHILD-mpDp1489874291-28', 'column_val', '0', '3', '2017-03-24 03:13:57'),
(2219, 'PARENT-gYcZ1490296461', 'subject_id', '39', '3', '2017-03-24 03:14:21'),
(2220, 'PARENT-gYcZ1490296461', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-03-24 03:14:21'),
(2221, 'PARENT-gYcZ1490296461', 'gradebook_id', '2', '3', '2017-03-24 03:14:21'),
(2222, 'PARENT-gYcZ1490296461', 'student_id', 'MihdNkTNyU2Mx7XZHxmMwit0X', 'CHILD-37Od1490296461-0', '2017-03-24 03:14:21'),
(2223, 'PARENT-gYcZ1490296461', 'student_id', 'Z0uC9C5TFcdRLzP695qJ3BWlc', 'CHILD-qKzx1490296461-1', '2017-03-24 03:14:21'),
(2224, 'PARENT-0RUJ1492239468', 'subject_id', '39', '4', '2017-04-15 14:57:48'),
(2225, 'PARENT-0RUJ1492239468', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-04-15 14:57:48'),
(2226, 'PARENT-0RUJ1492239468', 'gradebook_id', '2', '4', '2017-04-15 14:57:48'),
(2227, 'PARENT-0RUJ1492239468', 'student_id', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'CHILD-dne81492239468-0', '2017-04-15 14:57:48'),
(2228, 'PARENT-ZG2O1492239486', 'subject_id', '40', '1', '2017-04-15 14:58:06'),
(2229, 'PARENT-ZG2O1492239486', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-04-15 14:58:06'),
(2230, 'PARENT-ZG2O1492239486', 'gradebook_id', '3', '1', '2017-04-15 14:58:06'),
(2231, 'PARENT-ZG2O1492239486', 'student_id', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'CHILD-49OT1492239486-0', '2017-04-15 14:58:06'),
(2232, 'PARENT-Br5d1492534250', 'subject_id', '37', '4', '2017-04-19 00:50:50'),
(2233, 'PARENT-Br5d1492534250', 'owner_id', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', '2017-04-19 00:50:50'),
(2234, 'PARENT-Br5d1492534250', 'gradebook_id', '4', '4', '2017-04-19 00:50:50'),
(2235, 'PARENT-Br5d1492534250', 'student_id', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'CHILD-JiwP1492534250-0', '2017-04-19 00:50:50'),
(2236, 'PARENT-Br5d1492534250', 'student_id', 'MihdNkTNyU2Mx7XZHxmMwit0X', 'CHILD-JtN31492534250-1', '2017-04-19 00:50:50'),
(2237, 'PARENT-Br5d1492534250', 'student_id', 'Z0uC9C5TFcdRLzP695qJ3BWlc', 'CHILD-Xq161492534250-2', '2017-04-19 00:50:50'),
(2238, 'PARENT-Br5d1492534250', 'student_id', 'ERH13ANB3DV', 'CHILD-d7NH1492534250-3', '2017-04-19 00:50:50'),
(2239, 'PARENT-Br5d1492534250', 'student_id', 'POX70RIN6MW', 'CHILD-S2b31492534250-4', '2017-04-19 00:50:50'),
(2240, 'PARENT-Br5d1492534250', 'student_id', 'MKR62CDO4BY', 'CHILD-M8OT1492534250-5', '2017-04-19 00:50:50'),
(2241, 'PARENT-Br5d1492534250', 'student_id', 'GOO06VXJ8VK', 'CHILD-gTKq1492534250-6', '2017-04-19 00:50:50'),
(2242, 'PARENT-Br5d1492534250', 'student_id', 'XJN53WFO6DB', 'CHILD-bgBo1492534250-7', '2017-04-19 00:50:50'),
(2243, 'PARENT-Br5d1492534250', 'student_id', 'JZV34NTQ2BO', 'CHILD-RKsZ1492534250-8', '2017-04-19 00:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `learning_materials`
--

CREATE TABLE `learning_materials` (
  `_id` int(11) NOT NULL,
  `_account_id` varchar(255) NOT NULL,
  `_name` text NOT NULL,
  `_description` longtext NOT NULL,
  `_file_name` varchar(255) NOT NULL,
  `_file_size` bigint(20) NOT NULL,
  `_file_extension` varchar(10) NOT NULL,
  `_file_url` text NOT NULL,
  `_date_upload` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learning_materials`
--

INSERT INTO `learning_materials` (`_id`, `_account_id`, `_name`, `_description`, `_file_name`, `_file_size`, `_file_extension`, `_file_url`, `_date_upload`) VALUES
(1, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Excel Activity', 'Tempore fuga feugiat faucibus dolores erat, amet nec quam laoreet lectus luctus eos vitae senectus fugit tristique! Vero, tortor doloribus nesciunt ex.', '97dff20623291ab6e5de0c3cf31c1037.csv', 38293, 'csv', '2017/02', '2017-02-17 03:54:26'),
(2, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Lesson 1 Activity', 'Modi exercitationem tempore sint rem et montes sed iure eros, reprehenderit ratione, eget maecenas eleifend mollitia similique, dolore autem amet illum, consequatur metus explicabo asperiores!', 'def3c4eeb13bfd2d1ea6f22c20f11724.pdf', 28364, 'pdf', '2017/02', '2017-02-17 23:24:57'),
(4, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Cinema-Stock-1.lrtemplate', 'asdas', 'a741d6c3e9c0e368e805a7926c8e6670.zip', 855, 'zip', '2017/02', '2017-02-17 23:25:13'),
(5, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Sample Video', 'Ligula rerum eveniet gravida illum purus, irure minima, soluta hac, purus semper proident aptent adipisci, mollit! Ullamco conubia, fugit, molestiae?', 'd122e2d96325361aa4ca81e8c8569856.mp4', 33231, 'mp4', '2017/02', '2016-04-13 23:25:27'),
(7, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Chap1', '', '5cbb3c7a00b56d6317018cd2e71f27d0.docx', 9285, 'docx', '2017/02', '2016-12-20 01:00:10'),
(9, '1zyztk7dvTa9QBcsGiaKKkw7h', 'ai', 'test', '22c5d68e539e6e9626e599482d3a0ed7.png', 10687, 'png', '2017/02', '2017-02-18 01:59:15'),
(10, '1zyztk7dvTa9QBcsGiaKKkw7h', 'DSC_1872', '', 'daf0c272d0abf25a623467ccd56264ea.NEF', 80427, 'NEF', '2017/02', '2017-02-18 03:02:07'),
(11, '1zyztk7dvTa9QBcsGiaKKkw7h', '15942125_2037084026518140_310768054_n', 'test', 'f543e0fd828b9bbb68ee008d47e15cd3.jpg', 22094, 'jpg', '2017/02', '2017-02-18 03:02:20'),
(12, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Sample Image', 'Mollit, laudantium impedit leo dolor vehicula. Nostra fringilla quae, consequatur, ullamco scelerisque, auctor, volutpat, ante, architecto, leo nunc', '0b6d878c73b3beeab66406122cc47807.jpg', 47723, 'jpg', '2017/02', '2017-02-18 03:31:39');

-- --------------------------------------------------------

--
-- Table structure for table `learning_materials_access`
--

CREATE TABLE `learning_materials_access` (
  `_id` int(11) NOT NULL,
  `_material_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `date_submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learning_materials_access`
--

INSERT INTO `learning_materials_access` (`_id`, `_material_id`, `subject_id`, `date_submitted`) VALUES
(2, '3', '39', '2017-04-20 02:09:09'),
(3, '6', '39', '2017-04-20 02:12:48'),
(4, '6', '39', '2017-04-20 02:12:53'),
(5, '3', '37', '2017-04-20 02:13:33'),
(6, '3', '40', '2017-04-20 02:14:37'),
(8, '3', '43', '2017-04-20 02:18:26'),
(9, '3', '43', '2017-04-20 02:18:26'),
(10, '10', '37', '2017-04-20 02:20:39'),
(11, '12', '40', '2017-04-22 04:48:58'),
(12, '2', '40', '2017-04-22 04:59:01'),
(13, '1', '40', '2017-04-22 04:59:07'),
(16, '5', '40', '2017-04-22 05:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `_id` int(11) NOT NULL,
  `_id_generated` varchar(255) NOT NULL,
  `_from_id` text NOT NULL,
  `_to_id` text NOT NULL,
  `_to_string` text NOT NULL,
  `_subject` text NOT NULL,
  `_message` longtext NOT NULL,
  `_attached_id` varchar(255) NOT NULL,
  `_date_send` datetime NOT NULL,
  `_message_type` int(11) NOT NULL,
  `_reply_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`_id`, `_id_generated`, `_from_id`, `_to_id`, `_to_string`, `_subject`, `_message`, `_attached_id`, `_date_send`, `_message_type`, `_reply_id`, `status`) VALUES
(1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', '1zyztk7dvTa9QBcsGiaKKkw7h', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'Czarina Ganancial', 'test', '&nbsp;test', 'NULL', '2017-03-26 05:20:56', 0, 'NULL', 1),
(2, 'message_1490476918_7lSY4VjbalWjo9uIctbfzUJdY', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'dasdasdas', 'NULL', '2017-03-26 05:21:58', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(3, 'message_1490476928_6o0j8kX8hP0NSmfyMTh6lSbFn', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'dasdasdas', 'NULL', '2017-03-26 05:22:08', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(4, 'message_1490476980_zXgEwcORE6op1UPgejtUoybh6', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'afadsdasd', 'NULL', '2017-03-26 05:23:00', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(5, 'message_1490477023_khTrSCGZUx7RDTbEM1lrzKzQI', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'asdasdas', 'NULL', '2017-03-26 05:23:43', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(6, 'message_1490477053_Jyyz5DlIcM8vW0wEDKCm80ZnM', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'dasdasd', 'NULL', '2017-03-26 05:24:13', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(7, 'message_1490477081_gWYwLOsEAebOsxD7BBL9IK3Z2', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'sadasdasd', 'NULL', '2017-03-26 05:24:41', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(8, 'message_1490477157_qXyirBM3YeVMJctAWlo2k1af6', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'dasdasdadsdasdasdasd', 'NULL', '2017-03-26 05:25:57', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(9, 'message_1490477163_3KOYNBPb5ISqhw3Wd2XreHF8b', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'dasdas', 'NULL', '2017-03-26 05:26:03', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(10, 'message_1490477442_NKoRrvJNa7wL6NCJPhlaqMA1u', '1zyztk7dvTa9QBcsGiaKKkw7h', 'MihdNkTNyU2Mx7XZHxmMwit0X', 'Romeo Rosendo', 'qweqwe', 'qweqwe', 'NULL', '2017-03-26 05:30:42', 0, 'NULL', 1),
(11, 'message_1490477782_vTbK8PH9zgwR9FH4JZSwDJ6qI', '1zyztk7dvTa9QBcsGiaKKkw7h', 'NULL', 'NULL', 'NULL', 'dasdasdas', 'NULL', '2017-03-26 05:36:22', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0),
(12, 'message_1490477784_sfh9s0FC1SUwCVdKcLkBgurXK', 'MwBqhk3Mr9RpuQYS9KRiDHufF', 'NULL', 'NULL', 'NULL', 'sdafdsfdasdas', 'NULL', '2017-03-26 05:36:24', 1, 'message_1490476856_r5d80ik2zQHQ1HVgFl5unJNgt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `_id` int(11) NOT NULL,
  `_student_id` varchar(255) NOT NULL,
  `_subject_id` varchar(255) NOT NULL,
  `_status` int(11) NOT NULL,
  `_date_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`_id`, `_student_id`, `_subject_id`, `_status`, `_date_registered`) VALUES
(1, 'MihdNkTNyU2Mx7XZHxmMwit0X', '37', 1, '2017-03-26 00:41:37'),
(2, 'Z0uC9C5TFcdRLzP695qJ3BWlc', '37', 1, '2017-03-26 00:41:37'),
(3, 'ERH13ANB3DV', '37', 1, '2017-03-26 00:41:38'),
(4, 'POX70RIN6MW', '37', 1, '2017-03-26 00:41:38'),
(5, 'MKR62CDO4BY', '37', 1, '2017-03-26 00:41:38'),
(6, 'GOO06VXJ8VK', '37', 1, '2017-03-26 00:41:38'),
(7, 'XJN53WFO6DB', '37', 1, '2017-03-26 00:41:38'),
(8, 'JZV34NTQ2BO', '37', 1, '2017-03-26 00:41:38'),
(9, 'MwBqhk3Mr9RpuQYS9KRiDHufF', '37', 1, '2017-03-26 04:11:15'),
(10, 'MwBqhk3Mr9RpuQYS9KRiDHufF', '39', 1, '2017-03-26 04:11:15'),
(11, 'MwBqhk3Mr9RpuQYS9KRiDHufF', '40', 1, '2017-03-26 04:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `_id` int(11) NOT NULL,
  `_owners_id` varchar(255) NOT NULL,
  `_code` text NOT NULL,
  `_name` text NOT NULL,
  `_schedule` text NOT NULL,
  `_description` text NOT NULL,
  `_registration_code` varchar(255) NOT NULL,
  `_status` int(11) NOT NULL,
  `_date_added` datetime NOT NULL,
  `_max_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`_id`, `_owners_id`, `_code`, `_name`, `_schedule`, `_description`, `_registration_code`, `_status`, `_date_added`, `_max_student`) VALUES
(37, '1zyztk7dvTa9QBcsGiaKKkw7h', 'ITE 001', 'Foundation of Information Technology', 'Unavailble', 'Asperiores saepe excepturi? Saepe nisi egestas at tenetur? Voluptates duis deserunt, class, atque quidem accumsan ratione nobis montes iusto montes vivamus minima', 'SUBJECT-4OKNEQ3IPO', 1, '2017-01-16 00:59:38', 255),
(39, '1zyztk7dvTa9QBcsGiaKKkw7h', 'ITE 010', 'Advanced C and Data Structure', 'Saepe cum quia reprehenderit reprehenderit laboriosam velit quis', 'Aut fugit, sed dolore id elit, perferendis pariatur? Molestias reiciendis repellendus.', 'SUBJECT-30936TXWSL', 2, '2017-01-16 01:00:57', 255),
(40, '1zyztk7dvTa9QBcsGiaKKkw7h', 'ITE 008', 'DBMS using Foxpro', 'Dolore accusamus nobis fugiat et voluptatem aut exercitation deserunt omnis blanditiis quasi accusantium sed lorem consequatur voluptatem', 'Voluptatem molestiae quaerat id, quasi qui non animi, voluptatem eiusmod.', 'SUBJECT-0LMWHSKX1V', 1, '2017-01-16 01:01:25', 60),
(42, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Aut totam', 'Myles Mcgee', 'Corrupti tempore minus cupiditate animi ut eveniet eaque obcaecati est est', 'Ipsam tempora sunt, commodo sit, reprehenderit, impedit, cupiditate incididunt in voluptatum neque quasi sed quos.', 'SUBJECT-CTGCCEA7PI', 3, '2017-01-16 03:35:05', 17),
(43, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Distinctio ', 'Kasimir Dudley', 'Dignissimos nihil totam totam eiusmod ad esse facere aute pariatur Delectus adipisci aspernatur doloribus sit pariatur Est', 'Laboris aut sit, at distinctio. Temporibus inventore minim quo molestiae magni autem sit.', 'SUBJECT-EERXEKC3MX', 4, '2017-01-16 03:36:05', 74),
(44, '1zyztk7dvTa9QBcsGiaKKkw7h', 'A sedro', 'Otto Watkins', 'Et tempora incidunt dolore aliquid est', 'Ea est, corporis excepturi velit, adipisci pariatur. Veniam, illum, ipsum, quia libero quia in et ex corrupti, incididunt.', 'SUBJECT-SLY1DTZL3A', 1, '2017-01-16 03:37:45', 63),
(45, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Pariatur Dolor', 'Micah Peters', 'Necessitatibus fuga Assumenda et eum ab molestias dolor', 'Veniam, adipisci a velit, unde et est dolor sapiente sit maiores nemo Nam aute nihil.', 'SUBJECT-E1FB7DDXD0', 1, '2017-01-16 03:43:46', 23);

-- --------------------------------------------------------

--
-- Table structure for table `worksheet`
--

CREATE TABLE `worksheet` (
  `_id` int(11) NOT NULL,
  `_account_id` varchar(255) NOT NULL,
  `_name` text NOT NULL,
  `_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worksheet`
--

INSERT INTO `worksheet` (`_id`, `_account_id`, `_name`, `_date`) VALUES
(1, '1zyztk7dvTa9QBcsGiaKKkw7h', 'test', '2017-04-15 18:10:44'),
(2, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Cupiditate perferendis', '2017-04-15 18:37:07'),
(3, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Magnam aliquip', '2017-04-15 21:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `worksheet_access`
--

CREATE TABLE `worksheet_access` (
  `_id` int(11) NOT NULL,
  `_account_id` varchar(255) NOT NULL,
  `_student_id` varchar(255) NOT NULL,
  `_student_enrolled` varchar(255) NOT NULL,
  `_sheet_id` int(11) NOT NULL,
  `_date_time_start` datetime NOT NULL,
  `_date_time_end` datetime NOT NULL,
  `date_submitted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worksheet_access`
--

INSERT INTO `worksheet_access` (`_id`, `_account_id`, `_student_id`, `_student_enrolled`, `_sheet_id`, `_date_time_start`, `_date_time_end`, `date_submitted`) VALUES
(1, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MihdNkTNyU2Mx7XZHxmMwit0X', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(2, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Z0uC9C5TFcdRLzP695qJ3BWlc', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(3, '1zyztk7dvTa9QBcsGiaKKkw7h', 'ERH13ANB3DV', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(4, '1zyztk7dvTa9QBcsGiaKKkw7h', 'POX70RIN6MW', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(5, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MKR62CDO4BY', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(6, '1zyztk7dvTa9QBcsGiaKKkw7h', 'GOO06VXJ8VK', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(7, '1zyztk7dvTa9QBcsGiaKKkw7h', 'XJN53WFO6DB', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(8, '1zyztk7dvTa9QBcsGiaKKkw7h', 'JZV34NTQ2BO', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(9, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MwBqhk3Mr9RpuQYS9KRiDHufF', '37', 7, '2017-04-15 00:00:00', '2017-04-15 02:00:00', '2017-04-15 21:18:45'),
(10, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MihdNkTNyU2Mx7XZHxmMwit0X', '37', 9, '2017-04-19 01:00:00', '2017-04-19 02:00:00', '2017-04-19 00:10:04'),
(11, '1zyztk7dvTa9QBcsGiaKKkw7h', 'XJN53WFO6DB', '37', 7, '2017-04-20 01:00:00', '2017-04-20 03:00:00', '2017-04-20 01:06:13'),
(12, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MihdNkTNyU2Mx7XZHxmMwit0X', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(13, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Z0uC9C5TFcdRLzP695qJ3BWlc', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(14, '1zyztk7dvTa9QBcsGiaKKkw7h', 'ERH13ANB3DV', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(15, '1zyztk7dvTa9QBcsGiaKKkw7h', 'POX70RIN6MW', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(16, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MKR62CDO4BY', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(17, '1zyztk7dvTa9QBcsGiaKKkw7h', 'GOO06VXJ8VK', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(18, '1zyztk7dvTa9QBcsGiaKKkw7h', 'XJN53WFO6DB', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(19, '1zyztk7dvTa9QBcsGiaKKkw7h', 'JZV34NTQ2BO', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(20, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MwBqhk3Mr9RpuQYS9KRiDHufF', '37', 4, '2017-04-22 07:00:00', '2017-04-22 10:00:00', '2017-04-22 05:07:18'),
(21, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MihdNkTNyU2Mx7XZHxmMwit0X', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40'),
(22, '1zyztk7dvTa9QBcsGiaKKkw7h', 'Z0uC9C5TFcdRLzP695qJ3BWlc', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40'),
(23, '1zyztk7dvTa9QBcsGiaKKkw7h', 'ERH13ANB3DV', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40'),
(24, '1zyztk7dvTa9QBcsGiaKKkw7h', 'POX70RIN6MW', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40'),
(25, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MKR62CDO4BY', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40'),
(26, '1zyztk7dvTa9QBcsGiaKKkw7h', 'GOO06VXJ8VK', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40'),
(27, '1zyztk7dvTa9QBcsGiaKKkw7h', 'XJN53WFO6DB', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40'),
(28, '1zyztk7dvTa9QBcsGiaKKkw7h', 'JZV34NTQ2BO', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40'),
(29, '1zyztk7dvTa9QBcsGiaKKkw7h', 'MwBqhk3Mr9RpuQYS9KRiDHufF', '37', 5, '2017-04-23 07:00:00', '2017-04-23 10:00:00', '2017-04-22 05:07:40');

-- --------------------------------------------------------

--
-- Table structure for table `worksheet_meta`
--

CREATE TABLE `worksheet_meta` (
  `_id` int(11) NOT NULL,
  `_account_id` varchar(255) NOT NULL,
  `_parent_id` int(11) NOT NULL,
  `_name` text NOT NULL,
  `_description` longtext NOT NULL,
  `_files` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worksheet_meta`
--

INSERT INTO `worksheet_meta` (`_id`, `_account_id`, `_parent_id`, `_name`, `_description`, `_files`, `status`, `_date`) VALUES
(4, '1zyztk7dvTa9QBcsGiaKKkw7h', 1, 'Day 1', 'test test', 'mkwVryGoM7DWcMKXPEUn', 'VISIBLE', '2017-04-15 17:52:01'),
(5, '1zyztk7dvTa9QBcsGiaKKkw7h', 1, 'Day 2', 'test', 'T5wqdns2p3VLbGZeF7YC', 'VISIBLE', '2017-04-15 18:16:41'),
(6, '1zyztk7dvTa9QBcsGiaKKkw7h', 1, 'Day 3', 'test', 'IX9w9iiXCL4nF8eOxYa4', 'VISIBLE', '2017-04-15 18:36:44'),
(7, '1zyztk7dvTa9QBcsGiaKKkw7h', 2, 'Day 1', 'test', 'dodgMu3Nu5Qx9BVs8eiP', 'VISIBLE', '2017-04-15 18:37:30'),
(8, '1zyztk7dvTa9QBcsGiaKKkw7h', 2, 'Day 1', 'test', 'Z9aviMQ2XDxWDmeYDTVZ', 'VISIBLE', '2017-04-15 18:40:30'),
(9, '1zyztk7dvTa9QBcsGiaKKkw7h', 2, 'test', 'test', 'rqRrbEOCm9WJGb6U2kED', 'VISIBLE', '2017-04-15 18:42:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `assessment_examinees`
--
ALTER TABLE `assessment_examinees`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `assessment_examinies_metadata`
--
ALTER TABLE `assessment_examinies_metadata`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `assessment_examinies_metadata_answer`
--
ALTER TABLE `assessment_examinies_metadata_answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assessment_meta`
--
ALTER TABLE `assessment_meta`
  ADD PRIMARY KEY (`meta_id`);

--
-- Indexes for table `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`_cal_count`);

--
-- Indexes for table `gradebook`
--
ALTER TABLE `gradebook`
  ADD PRIMARY KEY (`gradebook_id`);

--
-- Indexes for table `gradebook_meta`
--
ALTER TABLE `gradebook_meta`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `learning_materials`
--
ALTER TABLE `learning_materials`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `learning_materials_access`
--
ALTER TABLE `learning_materials_access`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `_id_generated` (`_id_generated`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `worksheet`
--
ALTER TABLE `worksheet`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `worksheet_access`
--
ALTER TABLE `worksheet_access`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `worksheet_meta`
--
ALTER TABLE `worksheet_meta`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `assessment_examinees`
--
ALTER TABLE `assessment_examinees`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `assessment_examinies_metadata`
--
ALTER TABLE `assessment_examinies_metadata`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `assessment_examinies_metadata_answer`
--
ALTER TABLE `assessment_examinies_metadata_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `assessment_meta`
--
ALTER TABLE `assessment_meta`
  MODIFY `meta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `calendar`
--
ALTER TABLE `calendar`
  MODIFY `_cal_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `gradebook`
--
ALTER TABLE `gradebook`
  MODIFY `gradebook_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `gradebook_meta`
--
ALTER TABLE `gradebook_meta`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2244;
--
-- AUTO_INCREMENT for table `learning_materials`
--
ALTER TABLE `learning_materials`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `learning_materials_access`
--
ALTER TABLE `learning_materials_access`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `worksheet`
--
ALTER TABLE `worksheet`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `worksheet_access`
--
ALTER TABLE `worksheet_access`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `worksheet_meta`
--
ALTER TABLE `worksheet_meta`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
