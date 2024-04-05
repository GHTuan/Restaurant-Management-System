-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 05, 2024 lúc 04:52 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `restaurant`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `Name` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `Avatar` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`AdminID`, `Name`, `password`, `Avatar`) VALUES
(1, 'admin', 'admin', 'avatar1.jpg'),
(2, 'Admin2', 'adminpassword2', 'avatar2.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `ExportDate` date DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`CartID`, `ExportDate`, `UserID`) VALUES
(1, NULL, 1),
(2, '2024-04-05', 2),
(3, '2024-04-05', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cartitem`
--

CREATE TABLE `cartitem` (
  `ProductID` int(11) NOT NULL,
  `CartID` int(11) NOT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cartitem`
--

INSERT INTO `cartitem` (`ProductID`, `CartID`, `Amount`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `CommentID` int(11) NOT NULL,
  `Time` date DEFAULT NULL,
  `data` varchar(5000) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`CommentID`, `Time`, `data`, `UserID`, `ProductID`) VALUES
(1, '2024-04-05', 'This product is amazing!', 1, 1),
(2, '2024-04-05', 'Great service and fast delivery!', 2, 2),
(3, '2024-04-05', 'The quality of this item exceeded my expectations.', 3, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member`
--

CREATE TABLE `member` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phoneno` varchar(255) DEFAULT NULL,
  `Avatar` varchar(500) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `Phoneno`, `Avatar`, `AccessLevel`) VALUES
(1, 'john', '123', 'John Doe', '123-456-7890', '', 1),
(2, 'smith', 'abc', 'Jane Smith', '987-654-3210', '', 1),
(3, 'bob_jackson', '123', 'Bob Jackson', '555-555-5555', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `Header` varchar(256) DEFAULT NULL,
  `Data` varchar(500) DEFAULT NULL,
  `Pic` varchar(500) DEFAULT NULL,
  `RestaurantID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`ID`, `Header`, `Data`, `Pic`, `RestaurantID`) VALUES
(1, 'Grand Opening Event', 'Join us for the grand opening event on April 10th!', 'grand_opening.jpg', 1),
(2, 'Special Menu Addition', 'Introducing our new seasonal menu items!', 'special_menu.jpg', 2),
(3, 'Live Music Night', 'Enjoy live music every Friday evening at our restaurant!', 'live_music.jpg', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Description` varchar(5000) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Price`, `Description`, `Type`) VALUES
(1, 'Pizza', '12.99', 'Delicious pepperoni pizza with mozzarella cheese and tomato sauce.', 'Food'),
(2, 'Burger', '9.99', 'Classic beef burger with lettuce, tomato, onion, and cheese.', 'Food'),
(3, 'Cola', '1.99', 'Test có dấu', 'Drink');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `restaurantinfo`
--

CREATE TABLE `restaurantinfo` (
  `ID` int(11) NOT NULL,
  `Location` varchar(256) DEFAULT NULL,
  `Phone` varchar(256) DEFAULT NULL,
  `Picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `restaurantinfo`
--

INSERT INTO `restaurantinfo` (`ID`, `Location`, `Phone`, `Picture`) VALUES
(1, '123 Main St, City A', '123-456-7890', 'restaurant1.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `fk_user_cart` (`UserID`);

--
-- Chỉ mục cho bảng `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`ProductID`,`CartID`),
  ADD KEY `fk_cart_cartitem` (`CartID`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `fk_user_comment` (`UserID`),
  ADD KEY `fk_product_comment` (`ProductID`);

--
-- Chỉ mục cho bảng `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`UserID`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`);

--
-- Chỉ mục cho bảng `restaurantinfo`
--
ALTER TABLE `restaurantinfo`
  ADD PRIMARY KEY (`ID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_user_cart` FOREIGN KEY (`UserID`) REFERENCES `member` (`UserID`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `fk_cart_cartitem` FOREIGN KEY (`CartID`) REFERENCES `cart` (`CartID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_product_cartitem` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_product_comment` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE SET NULL,
  ADD CONSTRAINT `fk_user_comment` FOREIGN KEY (`UserID`) REFERENCES `member` (`UserID`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
