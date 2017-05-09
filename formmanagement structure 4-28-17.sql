-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 28, 2017 at 07:27 PM
-- Server version: 5.5.52-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `doorschedule`
--

CREATE TABLE IF NOT EXISTS `doorschedule` (
  `ID` int(11) NOT NULL,
  `instructor` varchar(250) NOT NULL,
  `employee_email` varchar(250) NOT NULL,
  `semester` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `schedule_form` varchar(250) NOT NULL,
  `instructor_signature` varchar(250) NOT NULL,
  `instructor_date` date NOT NULL,
  `chair_signature` varchar(250) NOT NULL,
  `chair_date` date NOT NULL,
  `vp_signature` varchar(250) NOT NULL,
  `vp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employeeleave`
--

CREATE TABLE IF NOT EXISTS `employeeleave` (
  `ID` int(11) NOT NULL,
  `employee` varchar(250) NOT NULL,
  `employee_email` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `date_filed` date NOT NULL,
  `al_date1` date NOT NULL,
  `al_date1_timeout` varchar(250) NOT NULL,
  `al_date1_timein` varchar(250) NOT NULL,
  `al_date2` date NOT NULL,
  `al_date2_timeout` varchar(250) NOT NULL,
  `al_date2_timein` varchar(250) NOT NULL,
  `al_date3` date NOT NULL,
  `al_date3_timeout` varchar(250) NOT NULL,
  `al_date3_timein` varchar(250) NOT NULL,
  `al_date4` date NOT NULL,
  `al_date4_timeout` varchar(250) NOT NULL,
  `al_date4_timein` varchar(250) NOT NULL,
  `al_date5` date NOT NULL,
  `al_date5_timeout` varchar(250) NOT NULL,
  `al_date5_timein` varchar(250) NOT NULL,
  `al_date6` date NOT NULL,
  `al_date6_timeout` varchar(250) NOT NULL,
  `al_date6_timein` varchar(250) NOT NULL,
  `al_total_time` double NOT NULL,
  `bl_date1` date NOT NULL,
  `bl_date1_timeout` varchar(250) NOT NULL,
  `bl_date1_timein` varchar(250) NOT NULL,
  `bl_date2` date NOT NULL,
  `bl_date2_timeout` varchar(250) NOT NULL,
  `bl_date2_timein` varchar(250) NOT NULL,
  `bl_total_time` double NOT NULL,
  `fl_date1` date NOT NULL,
  `fl_date1_timeout` varchar(250) NOT NULL,
  `fl_date1_timein` varchar(250) NOT NULL,
  `fl_date2` date NOT NULL,
  `fl_date2_timeout` varchar(250) NOT NULL,
  `fl_date2_timein` varchar(250) NOT NULL,
  `fl_total_time` double NOT NULL,
  `fl_relationship` varchar(250) NOT NULL,
  `sl_date1` date NOT NULL,
  `sl_date1_timeout` varchar(250) NOT NULL,
  `sl_date1_timein` varchar(250) NOT NULL,
  `sl_date2` date NOT NULL,
  `sl_date2_timeout` varchar(250) NOT NULL,
  `sl_date2_timein` varchar(250) NOT NULL,
  `total_hours_before` double NOT NULL,
  `sl_total_time` double NOT NULL,
  `sl_multiplier` varchar(250) NOT NULL,
  `sl_type` varchar(250) NOT NULL,
  `applicant_signature` varchar(250) NOT NULL,
  `applicant_date` date NOT NULL,
  `chair_signature` varchar(250) NOT NULL,
  `chair_date` date NOT NULL,
  `vp_signature` varchar(250) NOT NULL,
  `vp_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fieldtrip`
--

CREATE TABLE IF NOT EXISTS `fieldtrip` (
  `ID` int(11) NOT NULL,
  `instructor` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `course_number` varchar(250) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `class_meeting_date` date NOT NULL,
  `class_meeting_time` varchar(250) NOT NULL,
  `class_meeting_location` varchar(250) NOT NULL,
  `program_area` varchar(250) NOT NULL,
  `employee_email` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `mode_travel` varchar(250) NOT NULL,
  `trip_destination` varchar(250) NOT NULL,
  `trip_purpose` varchar(250) NOT NULL,
  `departure_date` date NOT NULL,
  `departure_time` varchar(250) NOT NULL,
  `return_date` date NOT NULL,
  `return_time` varchar(250) NOT NULL,
  `costs` varchar(3) NOT NULL,
  `costs_explanation` varchar(250) NOT NULL,
  `instructor_signature` varchar(250) NOT NULL,
  `instructor_date` date NOT NULL,
  `chair_signature` varchar(250) NOT NULL,
  `chair_date` date NOT NULL,
  `vp_signature` varchar(250) NOT NULL,
  `vp_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guestlecturer`
--

CREATE TABLE IF NOT EXISTS `guestlecturer` (
  `ID` int(11) NOT NULL,
  `instructor` varchar(250) NOT NULL,
  `employee_email` varchar(250) NOT NULL,
  `date_submitted` date NOT NULL,
  `course_number` varchar(250) NOT NULL,
  `course_title` varchar(250) NOT NULL,
  `course_date` date NOT NULL,
  `course_time` varchar(250) NOT NULL,
  `course_location` varchar(250) NOT NULL,
  `guest_lecturer` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `costs` varchar(250) NOT NULL,
  `costs_explanation` varchar(250) NOT NULL,
  `topic_presented` longtext NOT NULL,
  `additional_form` varchar(250) NOT NULL,
  `instructor_signature` varchar(250) NOT NULL,
  `instructor_date` date NOT NULL,
  `chair_signature` varchar(250) NOT NULL,
  `chair_date` date NOT NULL,
  `vp_signature` varchar(250) NOT NULL DEFAULT '',
  `vp_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `makeupplan`
--

CREATE TABLE IF NOT EXISTS `makeupplan` (
  `ID` int(11) NOT NULL,
  `instructor` varchar(250) NOT NULL,
  `employee_email` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `class_missed` varchar(250) NOT NULL,
  `date_missed` date NOT NULL,
  `time_missed` decimal(10,2) NOT NULL,
  `additional_time` varchar(250) NOT NULL,
  `additional_date` varchar(255) NOT NULL,
  `additional_met` decimal(10,2) NOT NULL,
  `additional_total` decimal(10,2) NOT NULL,
  `moodle_assignment` varchar(250) NOT NULL,
  `moodle_description` longtext NOT NULL,
  `extra_assignment` varchar(250) NOT NULL,
  `extra_assignment_time` decimal(10,2) NOT NULL,
  `extra_assignment_madeup` decimal(10,2) NOT NULL,
  `extra_assignment_description` longtext NOT NULL,
  `other` varchar(250) NOT NULL,
  `other_assignment` varchar(250) NOT NULL,
  `other_time` decimal(10,2) NOT NULL,
  `other_description` longtext NOT NULL,
  `additional_form` varchar(250) NOT NULL,
  `cancellation_cause` varchar(250) NOT NULL,
  `other_cause_description` longtext NOT NULL,
  `instructor_signature` varchar(250) NOT NULL,
  `instructor_date` date NOT NULL,
  `chair_signature` varchar(250) NOT NULL,
  `chair_date` date NOT NULL,
  `vp_signature` varchar(250) NOT NULL,
  `vp_date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `ID` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perfobj1`
--

CREATE TABLE IF NOT EXISTS `perfobj1` (
  `ID` int(11) NOT NULL,
  `employee` varchar(250) NOT NULL,
  `date_submitted` date NOT NULL,
  `obj_setting_period` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `section_1` longtext NOT NULL,
  `section_2` longtext NOT NULL,
  `employee_signature` varchar(250) NOT NULL,
  `supervisor_signature` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perfobj2`
--

CREATE TABLE IF NOT EXISTS `perfobj2` (
  `ID` int(11) NOT NULL,
  `employee` varchar(250) NOT NULL,
  `date_submitted` date NOT NULL,
  `obj_setting_period` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `section_1_employee` longtext NOT NULL,
  `section_1_supervisor` longtext NOT NULL,
  `section_2_employee` longtext NOT NULL,
  `section_2_supervisor` longtext NOT NULL,
  `evaluation_summary` longtext NOT NULL,
  `employee_signature` varchar(250) NOT NULL,
  `supervisor_signature` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perfobj3`
--

CREATE TABLE IF NOT EXISTS `perfobj3` (
  `ID` int(11) NOT NULL,
  `employee` varchar(250) NOT NULL,
  `date_submitted` date NOT NULL,
  `obj_setting_period` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `section_1_employee` longtext NOT NULL,
  `section_1_supervisor` longtext NOT NULL,
  `section_2_employee` longtext NOT NULL,
  `section_2_supervisor` longtext NOT NULL,
  `evaluation_summary` longtext NOT NULL,
  `employee_signature` varchar(250) NOT NULL,
  `supervisor_signature` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personalleave`
--

CREATE TABLE IF NOT EXISTS `personalleave` (
  `ID` int(100) NOT NULL,
  `date_requested` date NOT NULL,
  `time_increment` varchar(250) NOT NULL,
  `date_submitted` date NOT NULL,
  `employee` varchar(250) NOT NULL,
  `employee_email` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `employee_signature` varchar(250) NOT NULL,
  `chair_signature` varchar(250) NOT NULL,
  `vp_signature` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prodevlog`
--

CREATE TABLE IF NOT EXISTS `prodevlog` (
  `ID` int(11) NOT NULL,
  `employee` varchar(250) NOT NULL,
  `academic_year` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `workshop_1` longtext NOT NULL,
  `workshop_1_hours` decimal(5,1) NOT NULL,
  `workshop_2` longtext NOT NULL,
  `workshop_2_hours` decimal(5,1) NOT NULL,
  `workshop_3` longtext NOT NULL,
  `workshop_3_hours` decimal(5,1) NOT NULL,
  `workshop_4` longtext NOT NULL,
  `workshop_4_hours` decimal(5,1) NOT NULL,
  `workshop_5` longtext NOT NULL,
  `workshop_5_hours` decimal(5,1) NOT NULL,
  `workshop_6` longtext NOT NULL,
  `workshop_6_hours` decimal(5,1) NOT NULL,
  `workshop_7` longtext NOT NULL,
  `workshop_7_hours` decimal(5,1) NOT NULL,
  `workshop_8` longtext NOT NULL,
  `workshop_8_hours` decimal(5,1) NOT NULL,
  `workshop_9` longtext NOT NULL,
  `workshop_9_hours` decimal(5,1) NOT NULL,
  `workshop_10` longtext NOT NULL,
  `workshop_10_hours` decimal(5,1) NOT NULL,
  `workshop_11` longtext NOT NULL,
  `workshop_11_hours` decimal(5,1) NOT NULL,
  `workshop_12` longtext NOT NULL,
  `workshop_12_hours` decimal(5,1) NOT NULL,
  `workshop_13` longtext NOT NULL,
  `workshop_13_hours` decimal(5,1) NOT NULL,
  `workshop_14` longtext NOT NULL,
  `workshop_14_hours` decimal(5,1) NOT NULL,
  `workshop_15` longtext NOT NULL,
  `workshop_15_hours` decimal(5,1) NOT NULL,
  `requirement_met` varchar(250) NOT NULL,
  `reason_not_met` longtext NOT NULL,
  `employee_signature` varchar(250) NOT NULL,
  `employee_date` date NOT NULL,
  `supervisor_signature` varchar(250) NOT NULL,
  `supervisor_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `travelrequest`
--

CREATE TABLE IF NOT EXISTS `travelrequest` (
  `ID` int(11) NOT NULL,
  `employee` varchar(250) NOT NULL,
  `date_submitted` date NOT NULL,
  `employee_email` varchar(250) NOT NULL,
  `destination` varchar(250) NOT NULL,
  `supervisor` varchar(250) NOT NULL,
  `period_begins` date NOT NULL,
  `period_ends` date NOT NULL,
  `purpose` varchar(250) NOT NULL,
  `mode_transportation` varchar(250) NOT NULL,
  `air_fare` varchar(250) NOT NULL,
  `registration_fee` varchar(250) NOT NULL,
  `total_expenditures` varchar(250) NOT NULL,
  `in_state` varchar(4) NOT NULL,
  `out_of_state` varchar(4) NOT NULL,
  `excess_lodging` varchar(4) NOT NULL,
  `excess_lodging_amount` varchar(250) NOT NULL,
  `excess_registration` varchar(4) NOT NULL,
  `excess_registration_amount` varchar(250) NOT NULL,
  `additional_form` varchar(250) NOT NULL,
  `chair_signature` varchar(250) NOT NULL,
  `vp_signature` varchar(250) NOT NULL,
  `president_signature` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doorschedule`
--
ALTER TABLE `doorschedule`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `employeeleave`
--
ALTER TABLE `employeeleave`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fieldtrip`
--
ALTER TABLE `fieldtrip`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guestlecturer`
--
ALTER TABLE `guestlecturer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `makeupplan`
--
ALTER TABLE `makeupplan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `perfobj1`
--
ALTER TABLE `perfobj1`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `perfobj2`
--
ALTER TABLE `perfobj2`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `perfobj3`
--
ALTER TABLE `perfobj3`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `personalleave`
--
ALTER TABLE `personalleave`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `prodevlog`
--
ALTER TABLE `prodevlog`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `travelrequest`
--
ALTER TABLE `travelrequest`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doorschedule`
--
ALTER TABLE `doorschedule`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employeeleave`
--
ALTER TABLE `employeeleave`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fieldtrip`
--
ALTER TABLE `fieldtrip`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guestlecturer`
--
ALTER TABLE `guestlecturer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `makeupplan`
--
ALTER TABLE `makeupplan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perfobj1`
--
ALTER TABLE `perfobj1`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perfobj2`
--
ALTER TABLE `perfobj2`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perfobj3`
--
ALTER TABLE `perfobj3`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `personalleave`
--
ALTER TABLE `personalleave`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prodevlog`
--
ALTER TABLE `prodevlog`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `travelrequest`
--
ALTER TABLE `travelrequest`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
