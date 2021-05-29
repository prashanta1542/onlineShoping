-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2021 at 08:51 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_order_details`
--

CREATE TABLE `admin_order_details` (
  `Admin_name` varchar(25) DEFAULT NULL,
  `Customer_name` varchar(25) DEFAULT NULL,
  `Customer_NID` varchar(25) DEFAULT NULL,
  `Customer_email` varchar(25) DEFAULT NULL,
  `Select_pid` varchar(25) DEFAULT NULL,
  `Select_pname` varchar(25) DEFAULT NULL,
  `Select_ptype` varchar(25) DEFAULT NULL,
  `Select_bname` varchar(30) DEFAULT NULL,
  `Product_price` varchar(30) DEFAULT NULL,
  `Quantity_of_product` varchar(30) DEFAULT NULL,
  `Total_amount` varchar(30) DEFAULT NULL,
  `Payment_option` varchar(30) DEFAULT NULL,
  `Order_time` varchar(30) DEFAULT NULL,
  `filname` varchar(100) DEFAULT NULL,
  `filtype` varchar(100) DEFAULT NULL,
  `filsize` varchar(100) DEFAULT NULL,
  `Customer_rate` varchar(30) DEFAULT NULL,
  `confirm_status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_order_details`
--

INSERT INTO `admin_order_details` (`Admin_name`, `Customer_name`, `Customer_NID`, `Customer_email`, `Select_pid`, `Select_pname`, `Select_ptype`, `Select_bname`, `Product_price`, `Quantity_of_product`, `Total_amount`, `Payment_option`, `Order_time`, `filname`, `filtype`, `filsize`, `Customer_rate`, `confirm_status`) VALUES
('Prashanta Chowdhury', 'Md Ahasan Uddin', '312 423 7898', 'ah2@gmail.com', 'Pras50', 'Samsung galuxy S%', 'Andriod phone', 'Samsung', '16000', '4', '64000', 'bkash', '2021-04-15', '89584-8.jpg', 'image/jpeg', '36117', 'Null', 'No'),
('Md Shariful Islam', 'Md Ahasan Uddin', '312 423 7898', 'ah2@gmail.com', 'Md32', 'Sony Ultra Mega HD TV', 'Television', 'Sony Ultra', '42990', '2', '85980', 'bkash', '2021-04-15', '26989-8.jpg', 'image/jpeg', '36117', 'Null', 'No'),
('Prashanta Chowdhury', 'Md Ahasan Uddin', '312 423 7898', 'ah2@gmail.com', 'Pr79', 'Hp Laptop Core i3', 'Laptop', 'HP', '38000', '6', '193800', 'bkash', '2021-04-15', '99453-8.jpg', 'image/jpeg', '36117', 'Gold', 'No'),
('Prashanta Chowdhury', 'Md Ahasan Uddin', '123456789', 'ah2@gmail.com', 'Pr79', 'Hp Laptop Core i3', 'Laptop', 'HP', '38000', '4', '76000', 'bkash', '2021-05-11', '49013-joba-2.jpg', 'image/jpeg', '6829', 'Silver', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `log1`
--

CREATE TABLE `log1` (
  `Name` varchar(25) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Contact_number` varchar(25) DEFAULT NULL,
  `Bkash_Number` varchar(25) DEFAULT NULL,
  `Nogod_Number` varchar(25) DEFAULT NULL,
  `Bank_Acc_details` varchar(25) DEFAULT NULL,
  `Bank_Acc_number` varchar(25) DEFAULT NULL,
  `Password` varchar(25) DEFAULT NULL,
  `Biography` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log1`
--

INSERT INTO `log1` (`Name`, `Email`, `Contact_number`, `Bkash_Number`, `Nogod_Number`, `Bank_Acc_details`, `Bank_Acc_number`, `Password`, `Biography`) VALUES
('Prashanta Chowdhury', 'prashant12a@gmail.com', '01888888888', '01888888888', '01888888888', 'Asia Bank', 'P/S_01010101010101', '123456', 'I am an Buisnessmen'),
('Md Shariful Islam', 'Sharif12@gmail.com', '018988888', '018988888', '018988888', 'Bangladesh Bank', 'BL_Per872837387492', '123456', 'I am an buisnessmen');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ad_name` varchar(80) DEFAULT NULL,
  `pid` varchar(25) DEFAULT NULL,
  `pname` varchar(25) DEFAULT NULL,
  `ptype` varchar(25) DEFAULT NULL,
  `bname` varchar(30) DEFAULT NULL,
  `price` varchar(30) DEFAULT NULL,
  `filname` varchar(100) DEFAULT NULL,
  `filtype` varchar(100) DEFAULT NULL,
  `filsize` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ad_name`, `pid`, `pname`, `ptype`, `bname`, `price`, `filname`, `filtype`, `filsize`) VALUES
('Prashanta Chowdhury', 'Pras50', 'Samsung galuxy S%', 'Andriod phone', 'Samsung', '16000', '28209-product-6.jpg', 'image/jpeg', '30528'),
('Prashanta Chowdhury', 'Pr79', 'Hp Laptop Core i3', 'Laptop', 'HP', '38000', '61293-product-2.jpg', 'image/jpeg', '24375'),
('Md Shariful Islam', 'Md32', 'Sony Ultra Mega HD TV', 'Television', 'Sony Ultra', '42990', '20172-product-1.jpg', 'image/jpeg', '32384');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `U_Name` varchar(25) DEFAULT NULL,
  `A_Name` varchar(25) DEFAULT NULL,
  `NID` varchar(25) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Pid` varchar(25) DEFAULT NULL,
  `Pname` varchar(25) DEFAULT NULL,
  `Ptype` varchar(25) DEFAULT NULL,
  `Bname` varchar(30) DEFAULT NULL,
  `Price` varchar(30) DEFAULT NULL,
  `Quantity` varchar(30) DEFAULT NULL,
  `Total_amount` varchar(30) DEFAULT NULL,
  `Amount_after_offer` varchar(30) DEFAULT NULL,
  `Payment_option` varchar(30) DEFAULT NULL,
  `Order_time` varchar(30) DEFAULT NULL,
  `filname` varchar(100) DEFAULT NULL,
  `filtype` varchar(100) DEFAULT NULL,
  `filsize` varchar(100) DEFAULT NULL,
  `Payment_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`U_Name`, `A_Name`, `NID`, `Email`, `Pid`, `Pname`, `Ptype`, `Bname`, `Price`, `Quantity`, `Total_amount`, `Amount_after_offer`, `Payment_option`, `Order_time`, `filname`, `filtype`, `filsize`, `Payment_status`) VALUES
('Md Ahasan Uddin', 'Prashanta Chowdhury', '312 423 7898', 'ah2@gmail.com', 'Pras50', 'Samsung galuxy S%', 'Andriod phone', 'Samsung', '16000', '4', '64000', '64000', 'bkash', '2021-04-15', '89584-8.jpg', 'image/jpeg', '36117', 'No'),
('Md Ahasan Uddin', 'Md Shariful Islam', '312 423 7898', 'ah2@gmail.com', 'Md32', 'Sony Ultra Mega HD TV', 'Television', 'Sony Ultra', '42990', '2', '85980', '85980', 'bkash', '2021-04-15', '26989-8.jpg', 'image/jpeg', '36117', 'No'),
('Md Ahasan Uddin', 'Prashanta Chowdhury', '312 423 7898', 'ah2@gmail.com', 'Pr79', 'Hp Laptop Core i3', 'Laptop', 'HP', '38000', '6', '228000', '193800', 'bkash', '2021-04-15', '99453-8.jpg', 'image/jpeg', '36117', 'No'),
('Md Ahasan Uddin', 'Prashanta Chowdhury', '123456789', 'ah2@gmail.com', 'Pr79', 'Hp Laptop Core i3', 'Laptop', 'HP', '38000', '4', '152000', '76000', 'bkash', '2021-05-11', '49013-joba-2.jpg', 'image/jpeg', '6829', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `Name` varchar(25) DEFAULT NULL,
  `Email` varchar(25) DEFAULT NULL,
  `Password` varchar(25) DEFAULT NULL,
  `Biography` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`Name`, `Email`, `Password`, `Biography`) VALUES
('Md Ahasan Uddin', 'ah2@gmail.com', '123456', 'I am an user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
