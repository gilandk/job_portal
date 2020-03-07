-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 12:32 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job_post`
--

CREATE TABLE `apply_job_post` (
  `id_apply` int(11) NOT NULL,
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_job_post`
--

INSERT INTO `apply_job_post` (`id_apply`, `id_jobpost`, `id_company`, `id_user`, `status`) VALUES
(1, 1, 1, 200000, 2),
(2, 2, 1, 200000, 0),
(3, 2, 1, 200004, 2),
(4, 5, 2, 200004, 2),
(5, 3, 1, 200000, 0),
(6, 3, 1, 200004, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `aboutme` text DEFAULT NULL,
  `mission` text NOT NULL,
  `vision` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `active` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `name`, `companyname`, `country`, `state`, `city`, `contactno`, `website`, `email`, `password`, `aboutme`, `mission`, `vision`, `logo`, `createdAt`, `active`) VALUES
(1, 'Mr. Testing', 'JDM Tech', 'Philippines', 'NCR', 'Quezon City', '123456789', 'jdm-tech.com', 'asdasd@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dignissim sodales ut eu sem. Montes nascetur ridiculus mus mauris vitae ultricies leo. Massa massa ultricies mi quis hendrerit. Fam', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dignissim sodales ut eu sem. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dignissim sodales ut eu sem. ', '5e5f12cd3b095.png', '2019-12-12 04:45:45', 1),
(2, 'Ruby Pantallion', 'RP Works', 'Philippines', 'Bulacan', 'Bocaue', '999999999', 'rp-works.com', 'rpantallion@gmail.com', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'lorem ipsum', 'lorem ipsum', 'lorem ipsum', '5e625848e1a3d.png', '2020-02-29 13:43:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

CREATE TABLE `job_post` (
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `jobtype` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `requirements` text NOT NULL,
  `minimumsalary` varchar(255) NOT NULL,
  `maximumsalary` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `createdat` timestamp NOT NULL DEFAULT current_timestamp(),
  `applyBy` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `jobtype`, `description`, `requirements`, `minimumsalary`, `maximumsalary`, `experience`, `position`, `createdat`, `applyBy`) VALUES
(1, 1, 'Web Developer', 'Full-Time', '<p>Web Design</p>', '<p>asdasdasasdasd</p>', '15000', '20000', '1', 2, '2020-02-22 14:52:16', '2020-03-28'),
(2, 1, 'Graphic Artist', 'Project-Based', '<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">Job Responsibilities:</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- Designs and creates graphics that meet the specific guidelines of marketing needs</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- Coordinates with accounts to align graphic design</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- Conceptualize designs for online retail sales</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- Will be involved in all lay-outing and final artworks</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- Will use both visual art and technical computer skills to design computer graphics</p>', '<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">Job Qualifications:</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- Candidate must possess at least a Bachelor&rsquo;s/College degree, ARTS/Design/Creative Multimedia/Advertising or equivalent.</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- At least 1 year(s) of working experience in the related field</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- Proficient in Adobe Illustrator and Photoshop</p>\r\n<p style=\"margin: 0px 0px 1em; -webkit-font-smoothing: antialiased; box-sizing: border-box; font-family: \'Noto Sans\', \'Helvetica Neue\', Helvetica, Arial, sans-serif; color: #2d2d2d; font-size: 13.3333px;\">- With experience in Retail industry as Graphic Artist</p>', '18000', '23000', '2', 2, '2020-03-05 12:28:02', '2020-04-10'),
(3, 1, 'IT STAFF', 'Full-Time', '<p><span style=\\\"color: #666666; font-family: Montserrat-Regular; background-color: #f9f9ff;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat</span></p>', '<p><span style=\\\"color: #666666; font-family: Montserrat-Regular; background-color: #f9f9ff;\\\">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis ', '18000', '20000', '2', 2, '2020-03-05 12:29:18', '2020-04-10'),
(4, 2, 'Graphic Designer', 'Internship', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '10000', '15000', '3', 1, '2020-03-06 12:55:17', '2020-03-13'),
(5, 2, 'Sales Representative', 'Full-Time', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '15000', '18000', '1', 1, '2020-03-06 13:06:18', '2020-03-13'),
(6, 2, 'Programmer', 'Project-Based', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '25000', '35000', '4', 2, '2020-03-06 13:12:23', '2020-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `mailbox`
--

CREATE TABLE `mailbox` (
  `id_mailbox` int(11) NOT NULL,
  `id_fromuser` varchar(150) NOT NULL,
  `fromuser` varchar(255) NOT NULL,
  `id_touser` varchar(150) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `AmsgRead` int(11) NOT NULL,
  `CmsgRead` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailbox`
--

INSERT INTO `mailbox` (`id_mailbox`, `id_fromuser`, `fromuser`, `id_touser`, `subject`, `message`, `createdAt`, `AmsgRead`, `CmsgRead`) VALUES
(1, '1', 'company', '200000', 'SCHEDULED INTERVIEW', '<p>come by to our office</p>', '2020-02-27 11:26:40', 1, 1),
(2, '1', 'company', '200000', 'notfi test', '<p>asdasd</p>', '2020-03-01 14:46:33', 1, 1),
(3, '2', 'company', '200004', 'SCHEDULED INTERVIEW', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '2020-03-06 13:19:24', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reply_mailbox`
--

CREATE TABLE `reply_mailbox` (
  `id_reply` int(11) NOT NULL,
  `id_mailbox` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply_mailbox`
--

INSERT INTO `reply_mailbox` (`id_reply`, `id_mailbox`, `id_user`, `usertype`, `message`, `createdAt`) VALUES
(1, 1, 200000, 'user', '<p>okay</p>', '2020-02-27 11:26:40'),
(2, 2, 200000, 'user', '<p>asdasdasdasda</p>', '2020-02-27 11:26:46'),
(3, 2, 1, 'company', '<p>try</p>', '2020-02-27 11:51:52'),
(4, 2, 200000, 'user', '', '2020-03-01 14:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `sno` varchar(250) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `civilstatus` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `fos` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `yearAt` varchar(255) NOT NULL,
  `passingyear` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `company_add` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `emp_type` varchar(255) NOT NULL,
  `datejoined` varchar(255) NOT NULL,
  `dateleft` varchar(255) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 2,
  `aboutme` text DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `profile` varchar(250) NOT NULL,
  `joindate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `sno`, `fname`, `email`, `contactno`, `address`, `city`, `state`, `dob`, `age`, `gender`, `civilstatus`, `nationality`, `fos`, `course`, `yearAt`, `passingyear`, `qualification`, `company_name`, `industry`, `company_add`, `position`, `emp_type`, `datejoined`, `dateleft`, `reason`, `resume`, `password`, `hash`, `active`, `aboutme`, `skills`, `profile`, `joindate`) VALUES
(200000, '0418100409', 'Aron Ramirez', 'asdasd@gmail.com', '09199569072', 'Tabang', 'Guiguinto', 'Bulacan', '1995-11-19', '24', 'Male', 'Single', 'Filipino', 'Information Technology', 'BSIT', '2017-07', '2021-05', 'Bachelor\'s Degree', 'Convergys', 'Call Center', 'UP TechnoHub', 'TSR', 'Contractual', '2015-01', '2016-01', 'End of Contract', '5e60da9208c1d.', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'b2e8170217d4233f38ce0ecd9b0eeed7', 1, 'Gamer', 'PHP, Photoshop', '5e5bbacca1609.png', '2020-03-05 10:55:14'),
(200001, '041720040701', 'Ruby Pantallion', 'rpantallion@gmail.com', '999999999', 'Bamgumbayan', 'Bocaue', 'Bulacan', '1995-07-31', '24', '', '', '', 'College of Information Technology', 'Computer Science', '', '2023-06', 'Bachelor\'s/College Degree', '', '', '', '', '0', '', '', '', '5e301a16be1a5.', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', '04f09a75232376616c018c2536787884', 1, 'testing', 'Database Management, Java, C# and Project Management', '', '2020-02-25 12:16:57'),
(200004, '95645613213', 'Alondra Bunag', 'alondra_bunag@gmail.com', '11111111111', '', 'Bocaue', 'Bulacan', '1999-01-01', '', '', '', '', 'Computer Studies', 'BSIT', '', '2021-05', 'Bachelor\'s Degree', '', '', '', '', '0', '', '', '', '5e5bb1aaee544.', 'ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=', 'b7b6a305c6cace7b64be3e548f236260', 1, '', 'PHP, VB.net, Java', '', '2020-03-01 13:10:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  ADD PRIMARY KEY (`id_apply`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `job_post`
--
ALTER TABLE `job_post`
  ADD PRIMARY KEY (`id_jobpost`);

--
-- Indexes for table `mailbox`
--
ALTER TABLE `mailbox`
  ADD PRIMARY KEY (`id_mailbox`);

--
-- Indexes for table `reply_mailbox`
--
ALTER TABLE `reply_mailbox`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apply_job_post`
--
ALTER TABLE `apply_job_post`
  MODIFY `id_apply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `job_post`
--
ALTER TABLE `job_post`
  MODIFY `id_jobpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mailbox`
--
ALTER TABLE `mailbox`
  MODIFY `id_mailbox` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reply_mailbox`
--
ALTER TABLE `reply_mailbox`
  MODIFY `id_reply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
