-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2025 at 01:33 PM
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
-- Database: `370dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(10) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `last_name`, `password`, `email`, `phone`) VALUES
('A001', 'John', 'Doe', 'password123', 'john.doe@example.com', '01710000001'),
('A002', 'Jane', 'Smith', 'securepass456', 'jane.smith@example.com', '01710000002'),
('A003', 'Mark', 'Taylor', 'pass789mark', 'mark.taylor@example.com', '01710000003'),
('A004', 'Emily', 'Davis', 'emilysecure123', 'emily.davis@example.com', '01710000004'),
('A005', 'Chris', 'Brown', 'chrispass321', 'chris.brown@example.com', '01710000005');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donation_1`
--

CREATE TABLE `blood_donation_1` (
  `donation_Id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `area` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_donation_1`
--

INSERT INTO `blood_donation_1` (`donation_Id`, `student_id`, `area`, `role`) VALUES
('DN001', 'S001', 'Dhaka Medical College', 'Donor'),
('DN002', 'S002', 'Bangladesh Red Crescent Society', 'Volunteer'),
('DN003', 'S003', 'Square Hospital', 'Donor'),
('DN004', 'S004', 'United Hospital', 'Volunteer'),
('DN005', 'S005', 'Evercare Hospital', 'Donor'),
('DN006', 'S006', 'BRACU Medical Camp', 'Coordinator'),
('DN007', 'S007', 'Dhaka Medical College', 'Donor'),
('DN008', 'S008', 'Bangladesh Red Crescent Society', 'Volunteer'),
('DN009', 'S009', 'Square Hospital', 'Coordinator'),
('DN010', 'S010', 'United Hospital', 'Donor'),
('DN011', 'S011', 'Evercare Hospital', 'Volunteer'),
('DN012', 'S012', 'BRACU Medical Camp', 'Donor'),
('DN013', 'S013', 'Dhaka Medical College', 'Volunteer'),
('DN014', 'S014', 'Bangladesh Red Crescent Society', 'Donor'),
('DN015', 'S015', 'Square Hospital', 'Volunteer'),
('DN016', 'S016', 'United Hospital', 'Coordinator'),
('DN017', 'S017', 'Evercare Hospital', 'Donor'),
('DN018', 'S018', 'BRACU Medical Camp', 'Volunteer'),
('DN019', 'S019', 'Dhaka Medical College', 'Coordinator'),
('DN020', 'S020', 'Bangladesh Red Crescent Society', 'Donor');

-- --------------------------------------------------------

--
-- Table structure for table `blood_donation_2`
--

CREATE TABLE `blood_donation_2` (
  `student_id` varchar(10) NOT NULL,
  `blood_group` varchar(5) NOT NULL,
  `positive_negative` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `extra_info` varchar(255) NOT NULL,
  `available_YN` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_donation_2`
--

INSERT INTO `blood_donation_2` (`student_id`, `blood_group`, `positive_negative`, `date`, `extra_info`, `available_YN`) VALUES
('S001', 'A+', 'Positive history, recently donated', '2024-01-15', 'Regular donor', 'Y'),
('S002', 'O-', 'Negative history, rare blood type', '2023-12-20', 'Requires recovery period', 'N'),
('S003', 'B+', 'Positive history, donated at Square Hospital', '2023-11-05', 'Willing to donate anytime', 'Y'),
('S004', 'AB-', 'Negative history, rare blood type', '2023-09-10', 'Available on weekends', 'Y'),
('S005', 'A-', 'Negative history, recently donated', '2023-10-25', 'Available on short notice', 'Y'),
('S006', 'O+', 'Positive history, university blood drive donor', '2023-08-30', 'Coordinator of local drives', 'Y'),
('S007', 'B-', 'Negative history, rare type, limited donations', '2023-07-20', 'Willing to travel', 'N'),
('S008', 'A+', 'Positive history, BRACU blood donation event', '2023-06-15', 'Available occasionally', 'N'),
('S009', 'AB+', 'Positive history, last donated at Evercare', '2023-05-10', 'Active volunteer', 'Y'),
('S010', 'O+', 'Positive history, active donor', '2023-04-05', 'Available for emergencies', 'Y'),
('S011', 'A-', 'Negative history, last donation in January', '2024-01-01', 'Willing to donate', 'Y'),
('S012', 'B+', 'Positive history, donated in December', '2023-12-10', 'Regular donor', 'Y'),
('S013', 'AB-', 'Negative history, rare type', '2023-08-25', 'Requires advance notice', 'N'),
('S014', 'O-', 'Negative history, donated at Bashundhara camp', '2023-10-15', 'Available in evenings', 'Y'),
('S015', 'A+', 'Positive history, eager to donate', '2023-09-30', 'Regular donor', 'Y'),
('S016', 'B-', 'Negative history, rare type, limited availability', '2023-07-12', 'Needs planning', 'N'),
('S017', 'O+', 'Positive history, willing donor', '2023-12-05', 'Ready to help', 'Y'),
('S018', 'A-', 'Negative history, BRACU camp donor', '2023-06-25', 'Available after exams', 'N'),
('S019', 'B+', 'Positive history, active participant in drives', '2024-01-10', 'Regular contributor', 'Y'),
('S020', 'AB+', 'Positive history, donated at Tejgaon', '2023-09-15', 'Willing to donate again', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `donates`
--

CREATE TABLE `donates` (
  `donation_Id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donates`
--

INSERT INTO `donates` (`donation_Id`, `student_id`) VALUES
('DN002', 'S010'),
('DN006', 'S006'),
('DN006', 'S018'),
('DN008', 'S004'),
('DN008', 'S014'),
('DN012', 'S005'),
('DN016', 'S009'),
('DN016', 'S014'),
('DN020', 'S020');

-- --------------------------------------------------------

--
-- Table structure for table `house_rent`
--

CREATE TABLE `house_rent` (
  `rent_id` varchar(10) NOT NULL,
  `pref_area` varchar(20) DEFAULT NULL,
  `avail_seat` varchar(5) DEFAULT NULL,
  `rent` varchar(10) DEFAULT NULL,
  `from_month` varchar(10) DEFAULT NULL,
  `max_seat` varchar(5) DEFAULT NULL,
  `availability` varchar(5) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `room_type` varchar(30) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `house_rent`
--

INSERT INTO `house_rent` (`rent_id`, `pref_area`, `avail_seat`, `rent`, `from_month`, `max_seat`, `availability`, `description`, `room_type`, `phone`) VALUES
('', 'Downtown', '2', '6000', 'april', '2', 'Yes', 'contact for detrails', 'Single Room', '01915788965'),
('2633', 'Downtown', '3', '6000', 'april', '3', 'Yes', 'None', 'Single Room', '01915766413'),
('3495', 'frdsrf', '4', '6000', 'april', '4', 'Yes', 'tfgergter ', 'Single Room', '01915766423'),
('4544', 'frdsrf', '2', '6000', 'april', '2', 'Yes', 'FGHJG', 'Single Room', '01915766412'),
('rent_01', 'Downtown', '2', '5000', 'January', '4', 'Yes', 'Close to market and school', 'Single Room', '9876543210'),
('rent_02', 'City Center', '1', '7000', 'February', '3', 'No', 'Fully furnished, near bus stop', 'Shared Room', '8765432109'),
('rent_03', 'Suburbs', '3', '4500', 'March', '5', 'Yes', 'Quiet neighborhood', 'Single Room', '7654321098'),
('rent_04', 'Old Town', '2', '4000', 'April', '4', 'Yes', 'Great view of the city', 'Studio', '6543210987'),
('rent_05', 'Beachside', '1', '8000', 'May', '2', 'No', 'Sea-facing property', 'Luxury Room', '5432109876'),
('rent_06', 'Green Valley', '2', '3500', 'June', '3', 'Yes', 'Close to park and trails', 'Shared Room', '4321098765'),
('rent_07', 'Mountain View', '1', '6000', 'July', '2', 'No', 'Perfect for nature lovers', 'Single Room', '3210987654'),
('rent_08', 'Riverside', '3', '5000', 'August', '4', 'Yes', 'Waterfront property', 'Studio', '2109876543'),
('rent_09', 'Tech Park', '1', '5500', 'September', '2', 'Yes', 'Near IT hubs and offices', 'Luxury Room', '1098765432'),
('rent_10', 'City Outskirts', '2', '3000', 'October', '3', 'Yes', 'Affordable and spacious', 'Shared Room', '1987654321'),
('rent_11', 'Historic District', '1', '7500', 'November', '2', 'No', 'Antique-style rooms', 'Studio', '2876543210'),
('rent_12', 'Industrial Zone', '2', '4000', 'December', '3', 'Yes', 'Close to factories', 'Single Room', '3765432109'),
('rent_13', 'Countryside', '3', '2500', 'January', '5', 'Yes', 'Peaceful environment', 'Shared Room', '4654321098'),
('rent_14', 'Urban Heights', '1', '9500', 'February', '1', 'No', 'Premium city view', 'Luxury Room', '5543210987'),
('rent_15', 'Lakeside', '2', '6500', 'March', '3', 'Yes', 'Calm and scenic', 'Studio', '6432109876'),
('rent_16', 'Metro Area', '1', '6000', 'April', '2', 'Yes', 'Easy transport access', 'Single Room', '7321098765'),
('rent_17', 'Business Bay', '2', '5500', 'May', '4', 'No', 'Perfect for professionals', 'Shared Room', '8210987654'),
('rent_18', 'Garden Estate', '3', '7000', 'June', '3', 'Yes', 'Beautiful garden surroundings', 'Luxury Room', '9109876543'),
('rent_19', 'Hilltop', '2', '8000', 'July', '2', 'No', 'Exclusive hilltop property', 'Studio', '1098765430'),
('rent_20', 'Cultural Hub', '1', '4000', 'August', '2', 'Yes', 'Surrounded by museums', 'Single Room', '2098765431');

-- --------------------------------------------------------

--
-- Table structure for table `rent_house`
--

CREATE TABLE `rent_house` (
  `student_id` varchar(10) NOT NULL,
  `rent_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rent_house`
--

INSERT INTO `rent_house` (`student_id`, `rent_id`) VALUES
('S001', 'rent_01'),
('S002', 'rent_03'),
('S003', 'rent_17'),
('S004', 'rent_02'),
('S005', 'rent_09'),
('S006', 'rent_11'),
('S007', 'rent_10'),
('S008', 'rent_07'),
('S009', 'rent_20'),
('S010', 'rent_16'),
('S011', 'rent_12'),
('S012', 'rent_05'),
('S013', 'rent_18'),
('S014', 'rent_14'),
('S015', 'rent_13'),
('S016', 'rent_08'),
('S017', 'rent_04'),
('S018', 'rent_19'),
('S019', 'rent_06'),
('S020', 'rent_15');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `review_Id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `complain_student_id` varchar(10) NOT NULL,
  `review_for` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`review_Id`, `student_id`, `complain_student_id`, `review_for`, `description`) VALUES
('R001', 'S001', 'S002', 'Behavior', 'Good team player but needs better punctuality.'),
('R002', 'S002', 'S003', 'Commitment', 'Showed consistent dedication to the tasks assigned.'),
('R003', 'S003', 'S004', 'Performance', 'Efficient and effective during the blood donation event.'),
('R004', 'S004', 'S005', 'Teamwork', 'Coordinated well with other volunteers.'),
('R005', 'S005', 'S006', 'Reliability', 'Highly dependable and proactive during events.'),
('R006', 'S006', 'S007', 'Professionalism', 'Demonstrated a professional approach during meetings.'),
('R007', 'S007', 'S008', 'Collaboration', 'Worked well with fellow volunteers on tasks.'),
('R008', 'S008', 'S009', 'Behavior', 'Friendly and approachable towards new members.'),
('R009', 'S009', 'S010', 'Availability', 'Always available to assist during emergency events.'),
('R010', 'S010', 'S001', 'Communication', 'Clearly communicated event details to participants.'),
('R011', 'S002', 'S001', 'Performance', 'Contributed significantly to event planning.'),
('R012', 'S004', 'S003', 'Teamwork', 'A great example of teamwork and collaboration.'),
('R013', 'S006', 'S005', 'Reliability', 'Took responsibility for handling critical tasks.'),
('R014', 'S008', 'S007', 'Collaboration', 'Supported the team with creative solutions.'),
('R015', 'S010', 'S009', 'Professionalism', 'Maintained a professional demeanor throughout.'),
('R016', 'S001', 'S004', 'Behavior', 'Highly respectful towards others.'),
('R017', 'S003', 'S002', 'Commitment', 'Demonstrated exceptional dedication to roles.'),
('R018', 'S005', 'S008', 'Performance', 'Delivered excellent results in a high-pressure environment.'),
('R019', 'S007', 'S010', 'Teamwork', 'Displayed strong leadership in group settings.'),
('R020', 'S009', 'S006', 'Communication', 'Provided clear and concise updates during events.'),
('R6145', 's12378', 's12311', 'Availability', 'Something ');

-- --------------------------------------------------------

--
-- Table structure for table `ride_sharing`
--

CREATE TABLE `ride_sharing` (
  `ride_id` varchar(10) NOT NULL,
  `from_dest` varchar(15) DEFAULT NULL,
  `to_dest` varchar(15) DEFAULT NULL,
  `at_time` time DEFAULT NULL,
  `at_day` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ride_sharing`
--

INSERT INTO `ride_sharing` (`ride_id`, `from_dest`, `to_dest`, `at_time`, `at_day`) VALUES
('ride_0001', 'Dhaka', 'Bagerhat', '10:00:00', 'monday'),
('ride_01', 'BRACU', 'Banani', '08:00:00', 'Monday'),
('ride_02', 'BRACU', 'Gulshan', '09:30:00', 'Tuesday'),
('ride_03', 'BRACU', 'Dhanmondi', '07:45:00', 'Wednesday'),
('ride_04', 'BRACU', 'Uttara', '10:15:00', 'Thursday'),
('ride_05', 'BRACU', 'Mirpur', '12:00:00', 'Friday'),
('ride_06', 'BRACU', 'Mohakhali', '08:30:00', 'Saturday'),
('ride_07', 'BRACU', 'Bashundhara', '09:00:00', 'Sunday'),
('ride_08', 'BRACU', 'Farmgate', '07:15:00', 'Monday'),
('ride_09', 'BRACU', 'Khilgaon', '06:45:00', 'Tuesday'),
('ride_10', 'BRACU', 'Tejgaon', '08:50:00', 'Wednesday'),
('ride_11', 'BRACU', 'Shahbagh', '10:30:00', 'Thursday'),
('ride_12', 'BRACU', 'Mohammadpur', '11:45:00', 'Friday'),
('ride_1222', 'Dhaka', 'Bagerhat', '23:44:00', 'monday'),
('ride_12399', 'Dhaka', 'Bagerhat', '10:35:00', 'monday'),
('ride_13', 'BRACU', 'Banasree', '07:00:00', 'Saturday'),
('ride_14', 'BRACU', 'Rampura', '09:15:00', 'Sunday'),
('ride_15', 'BRACU', 'Malibagh', '06:30:00', 'Monday'),
('ride_16', 'BRACU', 'Kawran Bazar', '10:00:00', 'Tuesday'),
('ride_17', 'BRACU', 'Kalabagan', '08:10:00', 'Wednesday'),
('ride_18', 'BRACU', 'Shyamoli', '09:50:00', 'Thursday'),
('ride_19', 'BRACU', 'Baridhara', '07:20:00', 'Friday'),
('ride_20', 'BRACU', 'Paltan', '06:55:00', 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ride_id` varchar(10) NOT NULL,
  `rent_id` varchar(10) NOT NULL,
  `admin_id` varchar(10) NOT NULL,
  `thesis_id` varchar(10) NOT NULL,
  `student_id` varchar(10) NOT NULL,
  `donation_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`ride_id`, `rent_id`, `admin_id`, `thesis_id`, `student_id`, `donation_id`) VALUES
('ride_01', 'rent_01', 'A001', 'thesis_01', 'S001', 'DN001'),
('ride_02', 'rent_02', 'A002', 'thesis_02', 'S002', 'DN002'),
('ride_03', 'rent_03', 'A003', 'thesis_03', 'S003', 'DN003'),
('ride_04', 'rent_04', 'A004', 'thesis_04', 'S004', 'DN004'),
('ride_05', 'rent_05', 'A005', 'thesis_05', 'S005', 'DN005');

-- --------------------------------------------------------

--
-- Table structure for table `shares_ride`
--

CREATE TABLE `shares_ride` (
  `student_id` varchar(10) NOT NULL,
  `ride_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shares_ride`
--

INSERT INTO `shares_ride` (`student_id`, `ride_id`) VALUES
('S001', 'ride_14'),
('S003', 'ride_02'),
('S003', 'ride_16'),
('S005', 'ride_19'),
('S006', 'ride_05'),
('S006', 'ride_07'),
('S006', 'ride_09'),
('S006', 'ride_20'),
('S007', 'ride_13'),
('S008', 'ride_14'),
('S011', 'ride_08'),
('S013', 'ride_09'),
('S013', 'ride_10'),
('S014', 'ride_16'),
('S014', 'ride_18'),
('S016', 'ride_06'),
('S016', 'ride_09'),
('S017', 'ride_04'),
('S018', 'ride_02'),
('S019', 'ride_20');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` varchar(10) NOT NULL,
  `first_name` varchar(10) DEFAULT NULL,
  `last_name` varchar(10) DEFAULT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `blood_group` varchar(10) DEFAULT NULL,
  `thesis` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `last_name`, `password`, `gender`, `email`, `blood_group`, `thesis`) VALUES
('S001', 'John', 'Doe', 'password123', 'Male', 'john.doe@example.com', 'A+', '1'),
('S002', 'Jane', 'Smith', 'password456', 'Female', 'jane.smith@example.com', 'O-', '1'),
('S003', 'Mike', 'Brown', 'secure789', 'Male', 'mike.brown@example.com', 'B+', NULL),
('S004', 'Emily', 'Davis', 'pass1234', 'Female', 'emily.davis@example.com', 'AB-', NULL),
('S005', 'Chris', 'Wilson', 'mypassword', 'Male', 'chris.wilson@example.com', 'A-', NULL),
('S006', 'Sarah', 'Taylor', 'securepass', 'Female', 'sarah.taylor@example.com', 'O+', NULL),
('S007', 'James', 'Anderson', 'simplepass', 'Male', 'james.anderson@example.com', 'B-', NULL),
('S008', 'Emma', 'Thomas', 'complexpass', 'Female', 'emma.thomas@example.com', 'A+', NULL),
('S009', 'Daniel', 'Harris', 'passwordxyz', 'Male', 'daniel.harris@example.com', 'AB+', NULL),
('S010', 'Sophia', 'Clark', 'mypass987', 'Female', 'sophia.clark@example.com', 'O+', NULL),
('S011', 'Liam', 'Lewis', 'passme123', 'Male', 'liam.lewis@example.com', 'A-', NULL),
('S012', 'Olivia', 'Walker', 'mypassword321', 'Female', 'olivia.walker@example.com', 'B+', NULL),
('S013', 'Noah', 'Hall', 'secured111', 'Male', 'noah.hall@example.com', 'AB-', NULL),
('S014', 'Isabella', 'Allen', 'simple321', 'Female', 'isabella.allen@example.com', 'O-', NULL),
('S015', 'Mason', 'Young', 'password999', 'Male', 'mason.young@example.com', 'A+', NULL),
('S016', 'Mia', 'King', 'secure456', 'Female', 'mia.king@example.com', 'B-', NULL),
('S017', 'Ethan', 'Scott', 'complex111', 'Male', 'ethan.scott@example.com', 'O+', NULL),
('S018', 'Ava', 'Green', 'mypassword789', 'Female', 'ava.green@example.com', 'AB+', NULL),
('S019', 'Lucas', 'Adams', 'secure222', 'Male', 'lucas.adams@example.com', 'B+', NULL),
('S020', 'Charlotte', 'Baker', 'mypassword123', 'Female', 'charlotte.baker@example.com', 'A-', '1111'),
('s123', '0101', 'awd a', 'asasas', 'M', 'repiliy790@marchub.com', 'a+', NULL),
('s1230', '0101', 'awd a', 'asasa', 'M', 'repiliy790@marchub.com', 'a+', NULL),
('s12303', '0101', 'awd a', 'asasa', 'M', 'repiliy790@marchub.com', 'a+', NULL),
('s123031', '0101', 'awd a', 'asa', 'M', 'repiliy790@marchub.com', 'a+', NULL),
('s12304', 's0101', 'awd a', 'asa', 'M', 'repiliy790@marchub.com', 'a+', NULL),
('s1230x', 'dsfgdg', 'dfgrdfg', 'sdfsd', 'M', 'example@example.com', 'a+', NULL),
('s1231', '0101', 'awd a', 'ghj', 'M', 'repiliy790@marchub.com', 'a+', NULL),
('s12311', 'dgd', 'drgg', '0000', 'M', 'sdsds@gmail.com', 'a+', NULL),
('s123456', 'aAA', 'BBB', '1234', 'M', 'example@example.com', 'a+', '1'),
('s12378', 'tasnim', 'ahmed', '0000', 'M', 'example@example.com', 'a+', '2'),
('s202511', 'asa', 'asa', '1234', 'M', 'sdsds@gmail.com', 'a+', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `thesis_id` varchar(10) NOT NULL,
  `mem_needed` varchar(5) DEFAULT NULL,
  `from_semester` varchar(10) DEFAULT NULL,
  `pref_topic` varchar(30) DEFAULT NULL,
  `pref_faculty` varchar(20) DEFAULT NULL,
  `vacancy` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`thesis_id`, `mem_needed`, `from_semester`, `pref_topic`, `pref_faculty`, `vacancy`) VALUES
('1', '3', 'spring2025', 'LLM', 'DPU', '5'),
('111', '-1', 'spring2025', 'IoT- Embedded system', 'DPU', '3'),
('1111', '1', 'spring2025', 'IoT- Embedded system', 'DPU', '3'),
('11111', '1', 'spring2025', 'IoT- Embedded system', 'DPU', '3'),
('2', '3', 'spring2025', 'LLM', 'DPU', '5'),
('21255', '2', 'spring2025', 'Astronautical engineering', 'DPU', '3'),
('3', '4', 'spring2025', 'LLM', 'DPU', '5'),
('4', '5', 'spring2025', 'IoT', 'DPU', '6'),
('thesis_01', '3', 'Spring 24', 'Artificial Intelligence in Hea', 'Dr. Smith', '2'),
('thesis_02', '2', 'Summer 25', 'Blockchain for Secure Voting', 'Dr. Taylor', '1'),
('thesis_03', '4', 'Fall 25', 'Quantum Computing Algorithms', 'Dr. Brown', '3'),
('thesis_04', '1', 'Spring 24', 'Renewable Energy Optimization', 'Dr. Green', '1'),
('thesis_05', '3', 'Summer 25', 'IoT in Smart Cities', 'Dr. Johnson', '2'),
('thesis_06', '2', 'Fall 25', 'Cybersecurity in Cloud Computi', 'Dr. Wilson', '1'),
('thesis_07', '4', 'Spring 24', 'Deep Learning in Autonomous Ve', 'Dr. Adams', '3'),
('thesis_08', '1', 'Summer 25', 'Natural Language Processing', 'Dr. Lee', '1'),
('thesis_09', '3', 'Fall 25', 'Data Science Applications', 'Dr. White', '2'),
('thesis_10', '2', 'Spring 24', 'Bioinformatics and Genomics', 'Dr. Harris', '1'),
('thesis_11', '4', 'Summer 25', 'Advanced Robotics Systems', 'Dr. Martin', '3'),
('thesis_111', NULL, 'spring2025', 'IoT- Embedded system', 'DPU', '3'),
('thesis_12', '1', 'Fall 25', 'Climate Change Modeling', 'Dr. Garcia', '1'),
('thesis_13', '3', 'Spring 24', 'AR and VR in Education', 'Dr. Clark', '2'),
('thesis_14', '2', 'Summer 25', 'Edge Computing for IoT', 'Dr. Rodriguez', '1'),
('thesis_15', '4', 'Fall 25', 'Predictive Analytics in Sports', 'Dr. Walker', '3'),
('thesis_16', '1', 'Spring 24', 'AI for Social Good', 'Dr. Hall', '1'),
('thesis_17', '3', 'Summer 25', 'Digital Twins Technology', 'Dr. Young', '2'),
('thesis_18', '2', 'Fall 25', 'Human-Computer Interaction', 'Dr. King', '1'),
('thesis_19', '4', 'Spring 24', 'Smart Agriculture Systems', 'Dr. Wright', '3'),
('thesis_20', '1', 'Summer 25', 'Wireless Sensor Networks', 'Dr. Lopez', '1'),
('thesis_204', NULL, 'spring2025', 'IoT-', 'DPU', '3'),
('thesis_222', '2', 'spring2025', 'IoT- Embedded system', 'DPU', '3'),
('t_999', '4', 'spring2025', 'AI', 'DPU', '5');

-- --------------------------------------------------------

--
-- Table structure for table `thesis_mem`
--

CREATE TABLE `thesis_mem` (
  `student_id` varchar(10) NOT NULL,
  `thesis_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thesis_mem`
--

INSERT INTO `thesis_mem` (`student_id`, `thesis_id`) VALUES
('S001', 'thesis_06'),
('S002', 'thesis_03'),
('S003', 'thesis_03'),
('S003', 'thesis_20'),
('S004', 'thesis_06'),
('S006', 'thesis_09'),
('S007', 'thesis_12'),
('S007', 'thesis_13'),
('S008', 'thesis_07'),
('S008', 'thesis_08'),
('S008', 'thesis_16'),
('S012', 'thesis_19'),
('S013', 'thesis_09'),
('S014', 'thesis_03'),
('S015', 'thesis_14'),
('S016', 'thesis_11'),
('S019', 'thesis_02'),
('S019', 'thesis_20'),
('S020', 'thesis_04'),
('S020', 'thesis_12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `blood_donation_1`
--
ALTER TABLE `blood_donation_1`
  ADD PRIMARY KEY (`donation_Id`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `blood_donation_2`
--
ALTER TABLE `blood_donation_2`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `donates`
--
ALTER TABLE `donates`
  ADD PRIMARY KEY (`donation_Id`,`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `house_rent`
--
ALTER TABLE `house_rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `rent_house`
--
ALTER TABLE `rent_house`
  ADD PRIMARY KEY (`student_id`,`rent_id`),
  ADD KEY `rent_id` (`rent_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`review_Id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `complain_student_id` (`complain_student_id`);

--
-- Indexes for table `ride_sharing`
--
ALTER TABLE `ride_sharing`
  ADD PRIMARY KEY (`ride_id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ride_id`,`rent_id`,`admin_id`,`thesis_id`,`student_id`,`donation_id`),
  ADD KEY `rent_id` (`rent_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `thesis_id` (`thesis_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `donation_id` (`donation_id`);

--
-- Indexes for table `shares_ride`
--
ALTER TABLE `shares_ride`
  ADD PRIMARY KEY (`student_id`,`ride_id`),
  ADD KEY `ride_id` (`ride_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`thesis_id`);

--
-- Indexes for table `thesis_mem`
--
ALTER TABLE `thesis_mem`
  ADD PRIMARY KEY (`student_id`,`thesis_id`),
  ADD KEY `thesis_id` (`thesis_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_donation_1`
--
ALTER TABLE `blood_donation_1`
  ADD CONSTRAINT `blood_donation_1_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `blood_donation_2`
--
ALTER TABLE `blood_donation_2`
  ADD CONSTRAINT `blood_donation_2_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `donates`
--
ALTER TABLE `donates`
  ADD CONSTRAINT `donates_ibfk_1` FOREIGN KEY (`donation_Id`) REFERENCES `blood_donation_1` (`donation_Id`),
  ADD CONSTRAINT `donates_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `blood_donation_2` (`student_id`);

--
-- Constraints for table `rent_house`
--
ALTER TABLE `rent_house`
  ADD CONSTRAINT `rent_house_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `rent_house_ibfk_2` FOREIGN KEY (`rent_id`) REFERENCES `house_rent` (`rent_id`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`complain_student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`ride_id`) REFERENCES `ride_sharing` (`ride_id`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`rent_id`) REFERENCES `house_rent` (`rent_id`),
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `service_ibfk_4` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`thesis_id`),
  ADD CONSTRAINT `service_ibfk_5` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `service_ibfk_6` FOREIGN KEY (`donation_id`) REFERENCES `blood_donation_1` (`donation_Id`);

--
-- Constraints for table `shares_ride`
--
ALTER TABLE `shares_ride`
  ADD CONSTRAINT `shares_ride_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `shares_ride_ibfk_2` FOREIGN KEY (`ride_id`) REFERENCES `ride_sharing` (`ride_id`);

--
-- Constraints for table `thesis_mem`
--
ALTER TABLE `thesis_mem`
  ADD CONSTRAINT `thesis_mem_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `thesis_mem_ibfk_2` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`thesis_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
