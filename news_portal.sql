-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 09:48 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(11) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Language` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category`, `Language`) VALUES
(1, 'Afghanistan', 'English'),
(2, 'World', 'English'),
(3, 'Science', 'English'),
(4, 'Technology', 'English'),
(5, 'Health', 'English'),
(6, 'Food', 'English'),
(9, 'افغانستان', 'Pashto'),
(10, 'نړۍ', 'Pashto'),
(11, 'لوبي', 'Pashto'),
(12, 'ټکنالوژي', 'Pashto'),
(13, 'ساینس', 'Pashto'),
(15, 'روغتیا', 'Pashto'),
(16, 'Sports', 'English'),
(18, 'کلتور', 'Pashto'),
(24, 'فرهنګ', 'Pashto'),
(26, 'China', 'English'),
(27, 'india', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `Comment_ID` int(11) NOT NULL,
  `News_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Comment` varchar(600) NOT NULL,
  `Comment_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`Comment_ID`, `News_ID`, `User_ID`, `Comment`, `Comment_Date`) VALUES
(1, 1, 1, 'This is a good sign of development countries.', '2020-09-28 09:46:33'),
(2, 1, 1, 'sfsdfgsdfg', '2021-10-05 07:16:12'),
(3, 1, 1, 'sfsdfgsdfg', '2021-10-05 07:16:12'),
(4, 1, 1, 'sfsdfgsdfg', '2021-10-05 07:17:01'),
(5, 1, 1, 'sfsdfgsdfg', '2021-10-05 07:17:01'),
(6, 1, 1, 'asd', '2021-10-05 07:18:43'),
(7, 1, 1, 'asd', '2021-10-05 07:18:43'),
(8, 1, 1, 'asd', '2021-10-05 07:18:59'),
(9, 1, 1, 'asd', '2021-10-05 07:18:59'),
(10, 1, 1, 'nasratullah Shafiq Has added this comment.', '2021-10-05 07:19:50'),
(11, 1, 1, 'nasratullah Shafiq Has added this comment.', '2021-10-05 07:19:50'),
(12, 1, 1, 'Samiullah Added This comment', '2021-10-05 07:23:29'),
(13, 1, 1, 'sssssssssssssssssssssss', '2021-10-05 07:35:03'),
(14, 1, 1, 'jkjkkkkkkkk', '2021-10-05 07:36:45'),
(15, 1, 1, 'this is added from ahmaed', '2021-10-05 07:40:29'),
(16, 1, 1, 'you and me added this comment', '2021-10-05 07:42:26'),
(18, 11, 1, 'THis is for Testing', '2021-10-05 13:14:39'),
(19, 14, 1, 'someone has done this comment', '2021-10-05 14:47:42'),
(20, 14, 1, 'this is the time to go with me.....', '2021-10-05 14:55:13'),
(21, 14, 1, 'please you can go nowwwwww', '2021-10-05 14:56:54'),
(22, 14, 1, 'some one did this', '2021-10-05 15:00:48'),
(23, 21, 1, 'This is the best home i ever seen', '2021-10-09 08:47:54'),
(24, 21, 1, 'What is the price of this Home', '2021-10-09 08:49:55'),
(25, 11, 1, 'It is a fake news', '2021-10-09 09:47:32'),
(26, 14, 1, 'this is not a good picture', '2021-10-09 14:38:03'),
(27, 7, 1, 'Well Done Congratulations to afganistan team', '2021-10-09 16:20:10'),
(28, 20, 1, 'THis is the best Place i have ever seen this', '2021-10-09 16:57:33'),
(29, 2, 1, 'Ashraf Ghani Has escaped from afghanistan', '2021-10-10 09:02:10'),
(30, 22, 1, 'This is the first Explosion in lahore', '2021-10-11 07:40:43');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `User_ID` int(11) NOT NULL,
  `Full_Name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_No` int(11) NOT NULL,
  `Message` text NOT NULL,
  `Language` varchar(12) NOT NULL,
  `Date` date NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `News_ID` int(11) NOT NULL,
  `Heading` varchar(355) NOT NULL,
  `Body` text NOT NULL,
  `Source` varchar(150) NOT NULL,
  `File` varchar(250) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Language` varchar(10) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Visits` int(11) NOT NULL DEFAULT '0',
  `Status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`News_ID`, `Heading`, `Body`, `Source`, `File`, `Date`, `Language`, `Category_ID`, `Visits`, `Status`) VALUES
(1, 'Museum and films planned for Thai cave', 'The rescue gripped the world and now has the attention of film producers and the tourist board.\r\nThe rescue gripped the world and now has the attention of film producers and the tourist board.\r\nThe rescue gripped the world and now has the attention of film producers and the tourist board The rescue gripped the world and now has the attention of film producers and the tourist board.\r\nThe rescue gripped the world and now has the attention of film producers and the tourist board.', 'From Nasratullah Shafiq', '', '2019-04-16 05:29:15', 'English', 1, 1, 'Publish'),
(2, 'Ashraf Ghani suspend 01 special forces operation', 'this is for testing to show whether the information is seemed in main page or not.', 'me', '', '2019-11-03 00:00:00', 'English', 1, 2, 'Publish'),
(3, 'Explosion in Lahore', 'There were bomb explosion in Lahore city of Pakistan\nThere were bomb explosion in Lahore city of Pakistan \nThere were bomb explosion in Lahore city of Pakistan \nThere were bomb explosion in Lahore city of Pakistan There were bomb explosion in Lahore city of Pakistan \nThere were bomb explosion in Lahore city of Pakistan \nThere were bomb explosion in Lahore city of Pakistan', 'From Nasratullah Shafiq', '', '2019-11-16 02:48:00', 'English', 2, 1, 'Publish'),
(5, 'This is for Testing', 'I Will test this news for first time which is going to show wheater its working or not  ', 'From Me', '087294.jpg', '2019-11-23 08:12:41', 'English', 1, 0, 'Publish'),
(7, 'Afghanistan Cricket Team won T20 Series from West indies', 'This series was between Afghanistan and West indies Team which was three T20 match.\r\nFirst match has won by west indies and the second and third match won by Afghanistan.\r\nin the second match Karim Jannat done very well and got five wickets.\r\nin third match Rahmanullah Gurbaz\'s performance was amazing. and become man of the match for Afghanistan team.', 'From Nasratullah Shafiq', 'VideoCapture_20191124-110416.jpg', '2019-11-23 22:39:12', 'English', 16, 0, 'Publish'),
(8, 'England Women won T20 Blast', 'England Women Cricket team has won T20 blast matches against Australia. \r\nHost of these matches was England. and were held on Lords Cricket Ground\r\nMan of the match was Timmy Beamont  by a wonderful knock to get his 19 ODI Century.\r\nEngland won the series 4/1.', 'From Nasratullah Shafiq', 'VideoCapture_20191124-110130.jpg', '2019-11-24 09:56:16', 'English', 16, 0, 'Publish'),
(10, 'China government held Peace Negotiation', 'China government held peace Negotiation in Bejeng City. in this negotiation Afghanistan government will directly speak to taliban. Reporters says this peace conference will be held on 29th of November. this conference will be for tow days. Taliban and Afghan Government will talk face to face about peace and will find the best result for solution of peace.', 'From Ahmad', 'Thems90.png', '2019-11-26 02:36:54', 'English', 1, 0, 'Publish'),
(11, 'Pakistan Won his First Series', 'Pakistan Won his First Series\r\nPakistan Won his First SeriesPakistan Won his First Series\r\nPakistan Won his First Series\r\nPakistan Won his First Series\r\nPakistan Won his First Series\r\nPakistan Won his First Series\r\nPakistan Won his First Series\r\nPakistan Won his First Series Pakistan Won his First Series', 'From Ahmad', '17cricket-600.jpg', '2019-11-26 02:41:12', 'English', 16, 0, 'Publish'),
(13, 'Afghanistan Election Commission got announced first result of President election', 'Afghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election\r\nAfghanistan Election Commission got announced first result of President election', 'From Mukhtar Ahmad Shafiq', '20190728_061330.jpg', '2019-11-28 09:54:46', 'English', 1, 0, 'Publish'),
(14, 'Election Commission got announced first result of President election', 'Election Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President electionElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President electionElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nv\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election\r\nElection Commission got announced first result of President election', 'from Nasratullah Shafiq', 'lkpjkd.png', '2019-11-28 10:00:46', 'English', 1, 0, 'Publish'),
(15, 'I Phone 11 got Released', 'Apple company got released their first I Phone 11 on 14th of November. Apple company says this is the first unbreakable and waterproof phone where no company of phone were anable to make phone like this\nApple company got released their first I Phone 11 on 14th of November. Apple company says this is the first unbreakable and waterproof phone where no company of phone were anable to make phone like this\nApple company got released their first I Phone 11 on 14th of November. Apple company says this is the first unbreakable and waterproof phone where no company of phone were anable to make phone like this', 'From Mukhtar Ahmad Shafiq', 'Tow Computers.jpg', '2019-11-28 10:21:07', 'English', 4, 0, 'Publish'),
(16, 'موج چهارم کورونا در کشور های ایران و بررازیل آغاز شده است', 'این در حالی است که موج سوم کورونا بیشتر از کشورهای ایران ، هند ، امریکا و برازیل قربانی ګرفتند. ګزارش ها میګویند که روزانه حدود ۵۰۰۰ مریض مصاب به کوید ۱۹ در کشور ایران جان خود را از دست می دهد. اما این آمار حدود ۴۴۰۰ اشخاص مصاب به بیماری کوید ۱۹ در کشور برازیل جان خود را از دست می دهد. سازمان جهانی صحت هشدار داده است که اګر به این معضل رسیدګی نشود ما شاهد یک فاجعه انسانی خواهم بود. سازمان جهانی صحت می افزاید که مردم باید فاصله های اجتماعی رامراعات نموده دست های خود را با آب و صابون ششته و در تجمعات اشتراک نکنند.', 'کریم امینی', '', '2021-09-20 21:40:25', 'Pashto', 9, 0, 'Publish'),
(17, 'مقام ابراهیم', 'در کنار کعبه امیدها و رمز پیوستن به خالق یکتا مقام ابراهیم یادګار دیګری از ابراهیم است.\nمقام ابراهیم بیانګر خاطره های است بس عمیق در تاریخ ایمان دعوتی است ګویا و روشن.\nجای پای ابراهیم ګویا قدر با حفظ اثر قدم های امام موحدان تاریخ خواسته پیام او را به زایران خانه ملکوتی حق تزریق کند.\nمقام ابراهیم یا جای قدم های مباشرک او به صراحت به مهمانان خانه حق می ګوید: ره سعادت تنها در ګام نهادن بر جای پای ابراهیم است.\nچون ابراهیم باید تبر بدست ګیری و بت های شهوت و آز و طمع و دل بستن به غیر الله را بشکنی.\nو چون ابراهیم باید زاد همت بدست ګرفته در راه رسیدن به حقیقت و رساندن پیام حق در زمین الله قدم زنی.\nو چون ابراهیم ساتور تیزت را بدست ګرفته هر آنچه محبتش ممکن است در دلت با محبت حق جای ګیرد چون مال و منال و منصب و عیال، و دل بستن به دنیای فانی را سر ببری', 'فضایل حج', '', '2021-09-20 23:42:12', 'Pashto', 9, 0, 'Publish'),
(18, 'اشرف غنی له افغانستان نه و تښتید !', 'اشرف غنی له افغانستان نه و تښتید', 'سمیع الله', 'ssss', '2021-09-25 00:33:36', 'Pashto', 9, 0, 'Pending'),
(19, 'Beryani is good food for health', 'this is for testing this is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testingthis is for testing', 'some one', 'harissa_lamb_with_92207_16x9.jpg', '2021-09-28 00:17:28', 'English', 6, 0, 'Publish'),
(20, 'Galaxy Note 12 got released', 'Galaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got released Galaxy Note 12 got released Galaxy Note 12 got released Galaxy Note 12 got released Galaxy Note 12 got released Galaxy Note 12 got released Galaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got releasedGalaxy Note 12 got released', 'from some one', '87d6b69f-5e92-40f9-9dee-21c716afb707.jpg', '2021-09-28 00:43:59', 'English', 3, 0, 'Publish'),
(21, 'Explore Your New Home', 'Explore Your New Home Explore Your New Home Explore Your New Home Explore Your New Home', 'jhgjhj', '3.png', '2021-10-02 00:16:18', 'English', 1, 0, 'Publish'),
(22, 'Explosion In Lahore', 'There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore There were bomb Explosion in Lahore ', 'From Nasratullah Shafiq', '05.jpg', '2021-10-09 10:06:44', 'English', 2, 0, 'Publish'),
(23, 'Special Forces operation got baned', 'Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned Special Forces operation got baned ', 'From Noorullah', 'uh60colombiapolice_policia.jpg', '2021-10-10 23:38:11', 'English', 1, 0, 'Publish'),
(24, 'Over 50 Million of people are going to live in mars in 205', 'Over 50 Million of people are going to live in mars in 205 0Over 50 Million of people are going to live in mars in 2050Over 50 Million of people are going to live in mars in 2050 Over 50 Million of people are going to live in mars in 205 0Over 50 Million of people are going to live in mars in 205 0 Over 50 Million of people are going to live in mars in 2050', 'From Noorullah', '', '2021-10-13 01:48:26', 'English', 4, 0, 'Publish'),
(25, 'Over 50 Million of people are going to live in mars in 205', 'Over 50 Million of people are going to live in mars in 205 Over 50 Million of people are going to live in mars in 205 Over 50 Million of people are going to live in mars in 205 Over 50 Million of people are going to live in mars in 205 Over 50 Million of people are going to live in mars in 205 Over 50 Million of people are going to live in mars in 205 Over 50 Million of people are going to live in mars in 205', '', '', '2021-10-13 01:50:06', 'English', 3, 0, 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `news_like`
--

CREATE TABLE `news_like` (
  `Like_ID` int(11) NOT NULL,
  `News_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `news_like`
--

INSERT INTO `news_like` (`Like_ID`, `News_ID`, `User_ID`, `Date`) VALUES
(4, 20, 1, '2021-10-06 10:18:49'),
(5, 20, 1, '2021-10-06 11:02:03'),
(6, 20, 1, '2021-10-06 11:12:12'),
(7, 19, 1, '2021-10-06 11:19:11'),
(14, 14, 1, '2021-10-07 17:53:44'),
(15, 11, 1, '2021-10-07 18:00:43'),
(18, 3, 1, '2021-10-07 18:06:24'),
(21, 21, 1, '2021-10-09 08:49:35'),
(22, 7, 1, '2021-10-09 16:19:42'),
(23, 23, 1, '2021-10-11 06:39:48'),
(24, 22, 1, '2021-10-11 07:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `Role_ID` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Language` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`Role_ID`, `Role`, `Language`) VALUES
(1, 'Administrator', 'English'),
(2, 'Author', 'English'),
(3, 'Standard', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Full_Name` varchar(30) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Language` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Phone_No` int(11) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Role_ID` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Full_Name`, `Username`, `Password`, `Email`, `Language`, `Gender`, `Phone_No`, `Image`, `Role_ID`, `Status`) VALUES
(1, 'Nasratullah', 'Nasratullah', '924c2a1866f0d4ee9b69e4d5af48243a', 'nasratullah.shafiq@gmail.com', 'English', 'Male', 77898765, '', 1, 1),
(2, 'Mukhtar Ahmad', 'Mukhtar Ahmad', 'bc6ed692dd28b4860b19789b59f330b1', 'mukhtar.shafiq@gmail.com', 'English', 'Male', 78978765, 'team1.jpg', 2, 1),
(3, 'Samiullah', 'Samiullah', '02b68e8504da564a23388b829d7fcd94', 'samiullah@gmail.com', 'English', 'Male', 756543564, 'C:akepathDawlat Zadran.jpg', 2, 1),
(4, 'aaa', 'aa', '4124bc0a9335c27f086f24ba207a4912', 'a@gmail.com', 'English', 'Male', 897866, '', 2, 1),
(5, 'aaa', 'aas', 'd41d8cd98f00b204e9800998ecf8427e', 'as@gmail.com', 'English', 'Male', 897866, 'C:akepath	eam8.jpg', 2, 1),
(6, 'aaas', 'aasd', '3691308f2a4c2f6983f2880d32e29c84', 'ass@gmail.com', 'English', 'Male', 897866, 'C:akepath (3).jpg', 2, 1),
(7, 'zz', 'zz', '25ed1bcb423b0b7200f485fc5ff71c8e', 'z@gmail.com', 'English', 'Male', 56756743, 'Tow Computers.jpg', 2, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_news`
-- (See below for the actual view)
--
CREATE TABLE `view_news` (
`News_ID` int(11)
,`Heading` varchar(355)
,`Body` text
,`Source` varchar(150)
,`File` varchar(250)
,`Date` datetime
,`Language` varchar(10)
,`Category` varchar(50)
,`Visits` int(11)
,`Status` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viw_comment`
-- (See below for the actual view)
--
CREATE TABLE `viw_comment` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `viw_news`
-- (See below for the actual view)
--
CREATE TABLE `viw_news` (
`News_ID` int(11)
,`Heading` varchar(355)
,`Body` text
,`Source` varchar(150)
,`File` varchar(250)
,`Date` datetime
,`Language` varchar(10)
,`Category` varchar(50)
,`Visits` int(11)
,`Status` varchar(10)
);

-- --------------------------------------------------------

--
-- Structure for view `view_news`
--
DROP TABLE IF EXISTS `view_news`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_news`  AS  select `news`.`News_ID` AS `News_ID`,`news`.`Heading` AS `Heading`,`news`.`Body` AS `Body`,`news`.`Source` AS `Source`,`news`.`File` AS `File`,`news`.`Date` AS `Date`,`news`.`Language` AS `Language`,`category`.`Category` AS `Category`,`news`.`Visits` AS `Visits`,`news`.`Status` AS `Status` from (`category` join `news` on((`category`.`Category_ID` = `news`.`Category_ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viw_comment`
--
DROP TABLE IF EXISTS `viw_comment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viw_comment`  AS  select `comment`.`Comment_ID` AS `Comment_ID`,`users`.`Username` AS `Username`,`news`.`Body` AS `body`,`comment`.`Comment_Text` AS `Comment_Text`,`comment`.`Comment_Date` AS `Comment_Date` from ((`comment` join `news` on((`comment`.`News_ID` = `news`.`News_ID`))) join `users` on((`comment`.`User_ID` = `users`.`User_ID`))) ;

-- --------------------------------------------------------

--
-- Structure for view `viw_news`
--
DROP TABLE IF EXISTS `viw_news`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viw_news`  AS  select `news`.`News_ID` AS `News_ID`,`news`.`Heading` AS `Heading`,`news`.`Body` AS `Body`,`news`.`Source` AS `Source`,`news`.`File` AS `File`,`news`.`Date` AS `Date`,`news`.`Language` AS `Language`,`category`.`Category` AS `Category`,`news`.`Visits` AS `Visits`,`news`.`Status` AS `Status` from (`category` join `news` on((`category`.`Category_ID` = `news`.`Category_ID`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`Comment_ID`),
  ADD KEY `fk_User_User_ID` (`User_ID`),
  ADD KEY `fk_Coment_News_ID` (`News_ID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`News_ID`),
  ADD KEY `FK_Category_ID` (`Category_ID`);

--
-- Indexes for table `news_like`
--
ALTER TABLE `news_like`
  ADD PRIMARY KEY (`Like_ID`),
  ADD KEY `fk_News_ID` (`News_ID`),
  ADD KEY `fk_User_ID` (`User_ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`Role_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD KEY `fk_Role_ID` (`Role_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `Comment_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `News_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `news_like`
--
ALTER TABLE `news_like`
  MODIFY `Like_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `Role_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_Coment_News_ID` FOREIGN KEY (`News_ID`) REFERENCES `news` (`News_ID`),
  ADD CONSTRAINT `fk_User_User_ID` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `FK_Category_ID` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`Category_ID`);

--
-- Constraints for table `news_like`
--
ALTER TABLE `news_like`
  ADD CONSTRAINT `fk_News_ID` FOREIGN KEY (`News_ID`) REFERENCES `news` (`News_ID`),
  ADD CONSTRAINT `fk_User_ID` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_Role_ID` FOREIGN KEY (`Role_ID`) REFERENCES `role` (`Role_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
