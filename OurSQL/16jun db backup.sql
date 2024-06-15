-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2024 at 08:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `job_post_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `applied_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `companyid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `job_post_id`, `email`, `first_name`, `last_name`, `phone_number`, `country`, `resume`, `applied_at`, `companyid`) VALUES
(9, 22, 'k6eirv@outlook.com', 'MD. ATIKUR', 'RAHMAN', '01747858748', 'BANGLADESH', 'uploads/666d8599a721c.pdf', '2024-06-15 06:14:17', 10);

-- --------------------------------------------------------

--
-- Table structure for table `company_details`
--

CREATE TABLE `company_details` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `company_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone_no` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `company_background` text DEFAULT NULL,
  `services` text DEFAULT NULL,
  `expertise` text DEFAULT NULL,
  `img_logo_path` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_details`
--

INSERT INTO `company_details` (`company_id`, `company_name`, `address`, `company_type`, `email`, `phone_no`, `website`, `company_background`, `services`, `expertise`, `img_logo_path`) VALUES
(1, 'Updated Company Name', '456 New Avenue, Townsville', 'Technology', 'updated_info@example.com', '+9876543210', 'http://www.updated-example.com', 'Revised company background information', 'Updated Services', 'New Expertise Areas', '/path/to/updated-logo.png'),
(9, 'Atik Apps', 'Rajshahi, Bangladesh', 'Computer Software', 'aeefvef@gmai.com', '01745898587', 'rakiblte.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'images/65c6695381a70.jpg'),
(10, 'Atik Apps', 'H.785/01 Rajshahi , Bangladesh', 'Computer Software', 'atikvucse@gmail.com', '01748789858', 'atikapps.com', 'Atik Apps is a cutting-edge technology company at the forefront of app development, revolutionizing how businesses and individuals interact with mobile applications. Founded in 2024, Atik Apps has quickly risen to prominence through its commitment to innovation, user-centric design, and seamless functionality.\r\n\r\nDriven by a passionate team of developers, designers, and tech enthusiasts, Atik Apps aims to create intuitive, user-friendly, and visually stunning applications that cater to the diverse needs of modern consumers. Whether it\'s enhancing productivity, facilitating communication, or providing entertainment, Atik Apps delivers tailor-made solutions that exceed expectations.\r\n\r\nAtik Apps has earned a reputation for excellence, earning accolades and recognition for its innovative approach and commitment to quality. As it continues to grow and expand its reach, Atik Apps remains dedicated to pushing the boundaries of possibility and creating transformative digital experiences for users around the globe.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'images/66293c069b213.png'),
(11, 'Sprint', 'Dhaka', 'Clothing', 'info@sprint.com', '0123456789', 'sprint.com', 'domo data', 'domo data', 'domo data', 'images/66293d9170980.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `user_id` int(11) DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`user_id`, `otp`) VALUES
(10, '370056');

-- --------------------------------------------------------

--
-- Table structure for table `job_postings`
--

CREATE TABLE `job_postings` (
  `job_post_id` int(11) NOT NULL,
  `companyid` int(11) DEFAULT NULL,
  `jobTitle` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `jobType` varchar(20) DEFAULT NULL,
  `jobDescription` text DEFAULT NULL,
  `responsibilities` text DEFAULT NULL,
  `eduExperience` text DEFAULT NULL,
  `otherBenefits` text DEFAULT NULL,
  `publishedOn` date DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `jobSalary` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `job_post_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_postings`
--

INSERT INTO `job_postings` (`job_post_id`, `companyid`, `jobTitle`, `location`, `jobType`, `jobDescription`, `responsibilities`, `eduExperience`, `otherBenefits`, `publishedOn`, `vacancy`, `experience`, `gender`, `jobSalary`, `deadline`, `job_post_status`) VALUES
(13, 10, 'Software Developer', 'Anywhere', 'Full Time', 'As a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', 'Bachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-09', 3, 2, 'male', '$80,000 - $100,000', '2024-03-01', 'publish'),
(14, 10, 'Marketing Specialist', 'Anywhere', 'Full Time', '\r\nAs a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-10', 2, 3, 'Any', '$50,000 - $60,000', '2024-03-15', 'publish'),
(15, 10, 'Data Analyst', 'Anywhere', 'Full Time', '\r\nAs a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-11', 2, 2, 'Any', '$70,000 - $90,000', '2024-03-10', 'publish'),
(16, 10, 'Graphic Designer', 'Anywhere', 'Full Time', '\r\nAs a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-12', 1, 3, 'Any', '$60,000 - $75,000', '2024-03-20', 'publish'),
(17, 10, 'Customer Support Representative', 'Anywhere', 'Full Time', '\r\nAs a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-13', 4, 1, 'Any', '$45,000 - $50,000', '2024-03-05', 'publish'),
(18, 10, 'HR Specialist', 'Anywhere', 'Full Time', '\r\nAs a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-14', 2, 4, 'Any', '$55,000 - $70,000', '2024-03-25', 'publish'),
(19, 10, 'Sales Representative', 'Anywhere', 'Full Time', '\r\nAs a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-15', 3, 2, 'Any', '$60,000 - $80,000', '2024-03-15', 'publish'),
(20, 10, 'Network Engineer', 'Anywhere', 'Full Time', '\r\nAs a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-16', 2, 3, 'Any', '$75,000 - $90,000', '2024-03-30', 'publish'),
(21, 10, 'Administrative Assistant', 'Dhaka', 'Full Time', '\r\nAs a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-17', 2, 1, 'Any', '$35,000 - $40,000', '2024-03-10', 'publish'),
(22, 10, 'Quality Assurance Analyst', 'Rajshahi', 'Part Time', 'As a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.\r\n', 'Guide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', 'Bachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-02-18', 1, 2, 'male', '$70,000 - $85,000', '2024-03-20', 'publish'),
(39, 10, 'domo job post', 'Anywhere', 'Full Time', 'test', 'test', 'test', 'test', '2024-02-11', 1, 1, 'female', '1', '2024-02-22', 'unpublish'),
(41, 11, 'Network Engineer', 'Anywhere', 'Full Time', 'As a Customer Experience Specialist, you will play a crucial role in ensuring our customers have a seamless and delightful experience with our products/services. You will be the frontline representative, handling inquiries, resolving issues, and providing top-notch assistance to our valued customers.', '\r\n\r\nGuide new clients through the onboarding process, ensuring a seamless integration of our products into their operations.\r\nCollaborate with the implementation team to customize solutions based on client requirements and objectives.\r\nServe as the primary point of contact for assigned accounts, building strong relationships with key stakeholders.\r\nConduct regular check-ins to assess client satisfaction, address concerns, and identify opportunities for upselling or cross-selling.\r\nIdentify and nurture customer advocates by understanding their success stories and positive experiences.\r\nEncourage satisfied clients to participate in case studies, testimonials, and other marketing initiatives\r\n\r\n', '\r\nBachelor\'s degree in Marketing, Business Administration, or a related field.\r\nRelevant certifications in Digital Marketing or Content Marketing are a plus.\r\nManaged and executed successful digital marketing campaigns, resulting in a 20% increase in online engagement.\r\nProficient in utilizing SEO strategies to enhance website visibility and drive organic traffic.\r\nExecuted social media campaigns across multiple platforms, increasing brand followers by 30%.', 'Competitive salary.\r\nHealth and dental insurance.\r\n401(k) retirement plan.\r\nProfessional development opportunities.\r\nCollaborative and innovative work environment', '2024-04-24', 3, 3, 'male', '50000', '2024-04-30', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `searched_keywords`
--

CREATE TABLE `searched_keywords` (
  `id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `search_count` int(11) DEFAULT 1,
  `search_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `searched_keywords`
--

INSERT INTO `searched_keywords` (`id`, `keyword`, `search_count`, `search_date`) VALUES
(1, 'Data Analyst', 5, '2024-04-24 14:51:03'),
(2, 'Software Developer', 47, '2024-04-24 15:16:22'),
(3, 'Network Engineer', 24, '2024-04-24 15:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(1, '9098atomic@jcnorris.com', '$2y$10$7UAeC3L/Q5nLYlfCfVSLk.UFWMRmzocyhE.t3Jzof8VEaQy2PU1dm', 'company'),
(2, 'robustalbertina@jcnorris.com', '$2y$10$dE0hTsYeW0R06Sjqb74mRuJirwmxgBHK09EGN6bpMVj8uOezdy4/C', 'employee'),
(3, 'cgjcjcd@gmail.com', '$2y$10$e8I51UbLuxCKRCe9/ZQh2ukJ1iAENWWJXmeVAsNLFylCG93pV2nmK', 'employee'),
(4, 'sdfvgds@gmail.com', '$2y$10$d1DC1C2FhRuVwwv9M1bNcu/l8AhAUbNIvR.E2YRAX1J6YFIkgMdrC', 'company'),
(5, 'nessa5459@jcnorris.com', '$2y$10$Yb38eXSUGQtH1e4iEdP/VOoFHcI3HkEqR8hQnlCsuetcw7tUsZj5y', 'company'),
(6, 'atik@gmail.com', '$2y$10$OJE7BuZDoC62alt0it9QDO6PQ3/Vk8alD/syU2/FBSqgOxgZSQfpa', 'company'),
(7, 'atik1@gmail.com', '$2y$10$4MVpooOudtrFvrMQYjZY8uWSMBC0PrasLry99olcy8gsX4JJ6trBG', 'employee'),
(8, '7772anstice@mitico.org', '$2y$10$a5hZrEsMjEAv/e7Db.p6iO85dLaJb5bmcljP7d/i2zde0xbYer56.', 'company'),
(9, 'bluepearle@mitico.org', '$2y$10$dtEy/VMgVytkfzO/.dsNQOpqO2.H5thl4vFmIpSZKLCju9GYvx9FS', 'company'),
(10, 'atikvucse@gmail.com', '$2y$10$Bkb0UJTFh/PxR0B7FBX.Eevl0JEzbe5wK9OBrCmHDup0WK3L2x9re', 'company'),
(11, 'atikzvii@gmail.com', '$2y$10$a673vMgFakEzp0LVrSdQFuYoDoMyxc4gLY/DBD9fb6Uvi7vr.gdr.', 'company'),
(12, 'k6eirv@outlook.com', '$2y$10$XufSXcTb8iP2kRFXLbagSeVtkWX.gze2CuoKHDDHBgBPqbGM2epfi', 'employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `companyid` (`companyid`);

--
-- Indexes for table `company_details`
--
ALTER TABLE `company_details`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD PRIMARY KEY (`job_post_id`),
  ADD KEY `companyid` (`companyid`);

--
-- Indexes for table `searched_keywords`
--
ALTER TABLE `searched_keywords`
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
-- AUTO_INCREMENT for table `job_postings`
--
ALTER TABLE `job_postings`
  MODIFY `job_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `searched_keywords`
--
ALTER TABLE `searched_keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`companyid`) REFERENCES `users` (`id`);

--
-- Constraints for table `company_details`
--
ALTER TABLE `company_details`
  ADD CONSTRAINT `company_details_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD CONSTRAINT `forgot_password_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `job_postings`
--
ALTER TABLE `job_postings`
  ADD CONSTRAINT `job_postings_ibfk_1` FOREIGN KEY (`companyid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
