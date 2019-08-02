-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 02, 2019 at 08:40 AM
-- Server version: 5.7.22
-- PHP Version: 7.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `majorprojectapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `members` int(11) NOT NULL,
  `distance` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `author_id`, `name`, `cover_image`, `description`, `members`, `distance`) VALUES
(1, 4, 'Three Peaks Challenge', 'mountain.jpeg', 'This challenge involves climbing three of the largest mountains in the UK in a 24hour period.\r\n              These are Ben Nevis (Scotland), Scafell Pike (England) & Snowdon (Wales).', 3, '37.01'),
(6, 4, 'Inca Trail - Machu Picchu', 'machupicchu.jpeg', 'The Inca Trail to Machu Picchu is a hiking trail in Peru that terminates at Machu Picchu. It consists of three overlapping trails: Mollepata, Classic, and One Day.', 1, '88.51');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_leaderboard`
--

CREATE TABLE `challenge_leaderboard` (
  `id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `challenge_time` time(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `challenge_leaderboard`
--

INSERT INTO `challenge_leaderboard` (`id`, `challenge_id`, `user_id`, `user_email`, `username`, `challenge_time`) VALUES
(15, 1, 7, 'steve@davies.com', 'SDavies', '36:45:32.000000'),
(21, 1, 4, 'ash.roberts121@gmail.com', 'ARoberts123', '01:01:01.000000'),
(23, 6, 4, 'ash.roberts121@gmail.com', 'ARoberts123', '01:01:01.000000'),
(24, 1, 13, 'jamieheath1996@icloud.com', 'Jamie Beef bro', '42:11:45.000000');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_members`
--

CREATE TABLE `challenge_members` (
  `id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `challenge_members`
--

INSERT INTO `challenge_members` (`id`, `challenge_id`, `user_id`, `user_email`) VALUES
(12, 1, 7, 'steve@davies.com'),
(18, 1, 4, 'ash.roberts121@gmail.com'),
(20, 6, 4, 'ash.roberts121@gmail.com'),
(21, 1, 13, 'jamieheath1996@icloud.com');

-- --------------------------------------------------------

--
-- Table structure for table `challenge_posts`
--

CREATE TABLE `challenge_posts` (
  `id` int(11) NOT NULL,
  `challenge_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_time` varchar(255) NOT NULL,
  `display_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `challenge_posts`
--

INSERT INTO `challenge_posts` (`id`, `challenge_id`, `author_id`, `title`, `message`, `post_image`, `username`, `post_time`, `display_picture`) VALUES
(1, 1, 4, 'New personal best!', 'Can\'t believe we beat our record!', 'threepeaks.jpeg', 'ARoberts123', '15/07/2019 @ 14:15', 'ashpic.jpeg'),
(5, 6, 4, 'Amazing time!', 'Great trail to do and in record time!!', 'hike_girl.jpeg', 'ARoberts123', '17/07/19 @ 01:18', 'ashpic.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cover_image` varchar(255) NOT NULL,
  `description` varchar(1024) NOT NULL,
  `members` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `author_id`, `name`, `cover_image`, `description`, `members`) VALUES
(1, 4, 'Running', 'runner_woman.jpeg', 'Post Content here. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic.', 3),
(2, 4, 'Yoga', 'yoga_woman.jpeg', 'A group for all yoga lovers!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE `group_members` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `group_id`, `user_id`, `user_email`) VALUES
(29, 1, 7, 'steve@davies.com'),
(32, 2, 4, 'ash.roberts121@gmail.com'),
(37, 1, 10, 'john@smith.com'),
(44, 1, 4, 'ash.roberts121@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `group_posts`
--

CREATE TABLE `group_posts` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `post_time` varchar(255) NOT NULL,
  `display_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `group_posts`
--

INSERT INTO `group_posts` (`id`, `group_id`, `author_id`, `title`, `message`, `post_image`, `username`, `post_time`, `display_picture`) VALUES
(1, 1, 4, 'Ran 5 miles today!', 'Post Content here. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic.', 'running.jpeg', 'ARoberts121', '10/07/19 @ 13:04', 'ashpic.jpeg'),
(2, 1, 7, 'Loving the group', 'Post Content here. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic.', 'man_runner.jpeg', 'SDavies', '10/07/19 @ 13:28', 'steve.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` varchar(1024) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `display_picture` varchar(255) NOT NULL,
  `post_time` varchar(255) NOT NULL,
  `likes` int(11) NOT NULL,
  `comments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `message`, `tags`, `image`, `email`, `username`, `display_picture`, `post_time`, `likes`, `comments`) VALUES
(14, 'Leg Day Done!', 'Post Content here. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic.', 'Health, Gains, Lifting, LegDay', 'gym.jpeg', 'steve@davies.com', 'SDavies', 'steve.jpeg', '03/07/19 @ 12:40', 0, 2),
(19, 'Summer 2019', 'Post Content here. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor sequi fuga quia quaerat cum, obcaecati hic.', 'Summer,Fitness,Gains,2019,Healthy', 'summer.jpeg', 'ash.roberts121@gmail.com', 'ARoberts123', 'ashpic.jpeg', '05/07/19 @ 05:38', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `comment_time` varchar(255) NOT NULL,
  `comment` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`id`, `post_id`, `user_id`, `username`, `comment_time`, `comment`) VALUES
(11, 21, 4, 'ARoberts123', '09/07/19 @ 15:16', 'Brilliant!! :)'),
(13, 21, 7, 'SDavies', '09/07/19 @ 15:17', 'Well done!'),
(15, 21, 7, 'SDavies', '09/07/19 @ 16:25', 'Fantastic!'),
(21, 19, 7, 'SDavies', '09/07/19 @ 16:55', 'So excited!!'),
(22, 21, 4, 'ARoberts123', '10/07/19 @ 15:26', 'Good going!'),
(23, 0, 0, '', '', 'No comments yet :('),
(24, 14, 13, 'Jamie Beef bro', '22/07/19 @ 15:12', 'well done'),
(25, 14, 4, 'ARoberts123', '23/07/19 @ 13:42', 'Nice one!');

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `user_id`) VALUES
(10, 14, 7),
(11, 15, 7),
(12, 14, 4),
(13, 16, 4),
(14, 15, 4),
(15, 19, 4),
(16, 14, 8),
(17, 19, 8),
(18, 19, 13);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `display_picture` varchar(1024) NOT NULL,
  `background_picture` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `email`, `firstname`, `surname`, `username`, `gender`, `location`, `job_title`, `display_picture`, `background_picture`) VALUES
(1, 'ash.roberts121@gmail.com', 'Ashley', 'Roberts', 'ARoberts123', 'Male', 'Tamworth, UK', 'Student', 'ashpic.jpeg', 'ashbg.jpeg'),
(5, 'steve@davies.com', 'Steve', 'Davies', 'SDavies', 'Male', 'London, UK', 'Teacher', 'steve.jpeg', 'ashbg.jpeg'),
(10, 'john@smith.com', 'John', 'Smith', 'JSmith', '(Gender)', '(Location)', '(Job Title)', 'defaultdp.jpg', 'defaultbgp.jpeg'),
(11, 'jamieheath1996@icloud.com', 'Jamie', 'Heath', 'Jamie Beef bro', 'Male', 'Tamworth, UK', 'Teacher', '23416841_1581779185248785_302645420268453888_n.jpg', '674d72be2435498906f2bba0335be4ca.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `surname`, `username`, `email`, `password`, `token`) VALUES
(4, 'Ashley', 'Roberts', 'ARoberts123', 'ash.roberts121@gmail.com', '$2y$10$Y743DdF9gxWDLmDUzlzgdejtxHJyzKhWkvT9itQpXsyYrfEOeT5DO', 'xcad9w3k4h'),
(7, 'Steve', 'Davies', 'SDavies', 'steve@davies.com', '$2y$10$ZLRujkwThj/SG/0ktVjf.O9.2EmLqggCs2vRcpXsYGpGV/In8NkZm', ''),
(12, 'John', 'Smith', 'JSmith', 'john@smith.com', '$2y$10$Tm5pFIVaKlPlo3E5VqkvZu4mLsbVVJzHWev/Zmd3WViZAet2TZvUq', ''),
(13, 'Jamie', 'Heath', 'Jamie Beef bro', 'jamieheath1996@icloud.com', '$2y$10$dVff7pTCeEADXMKd9MmtCOJ5wE.lCvMPRi9sUTf2BxkPfwZa5FNP.', 'lyzap7d052');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_leaderboard`
--
ALTER TABLE `challenge_leaderboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_members`
--
ALTER TABLE `challenge_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `challenge_posts`
--
ALTER TABLE `challenge_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_posts`
--
ALTER TABLE `group_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `challenge_leaderboard`
--
ALTER TABLE `challenge_leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `challenge_members`
--
ALTER TABLE `challenge_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `challenge_posts`
--
ALTER TABLE `challenge_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `group_posts`
--
ALTER TABLE `group_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
