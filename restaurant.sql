-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 03, 2024 lúc 09:56 AM
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
  `Address` varchar(500) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `AccessLevel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `member`
--

INSERT INTO `member` (`UserID`, `Username`, `Password`, `Name`, `Phoneno`, `Avatar`, `Address`, `LastName`, `Email`, `Gender`, `AccessLevel`) VALUES
(1, 'john', '123', 'John', '1234567890', 'https://wallpapers.com/images/featured/picture-en3dnh2zi84sgt3t.jpg', '123 Main St, City, Country', 'Doe', 'john.doe@example.com', 'male', 1),
(2, 'jane_smith', 'smithy456', 'Jane', '0987654321', 'https://media.wired.com/photos/598e35fb99d76447c4eb1f28/master/pass/phonepicutres-TA.jpg', '456 Elm St, City, Country', 'Smith', 'jane.smith@example.com', 'female', 1),
(3, 'sam_jones', 'jonespass', 'Sam', '5551234567', 'https://static.vecteezy.com/system/resources/thumbnails/025/181/412/small/picture-a-captivating-scene-of-a-tranquil-lake-at-sunset-ai-generative-photo.jpg', '789 Oak St, City, Country', 'Jones', 'sam.jones@example.com', 'male', 0);

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
  `Type` varchar(255) DEFAULT NULL,
  `Picture` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Price`, `Description`, `Type`, `Picture`) VALUES
(1, 'Pizza Margherita', '9.99', 'Classic Italian pizza with tomato sauce, mozzarella cheese, and basil leaves', 'MainDish', 'https://thucphamsieuthi.vn/wp-content/uploads/2021/08/banh-pizza-hai-san-dong-lanh.jpg'),
(2, 'Grilled Salmon', '14.99', 'Fresh Atlantic salmon fillet grilled to perfection, served with steamed vegetables', 'MainDish', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzOmEEO-FcFa2WUDXUq-m-x49pWBO2aVj9-kO3fAAhFw&s'),
(3, 'Caesar Salad', '8.99', 'Crisp romaine lettuce, garlic croutons, Parmesan cheese, and Caesar dressing', 'Breakfast', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjO0K6U0swheNli58EkhuQYzriPQEW965RmBKN-fvwtQ&s'),
(4, 'Chicken Pad Thai', '11.99', 'Stir-fried rice noodles with chicken, eggs, tofu, bean sprouts, and peanuts in a tangy sauce', 'MainDish', 'chicken_pad_thai.jpg'),
(5, 'Chocolate Cake', '6.99', 'Rich and moist chocolate cake topped with chocolate ganache and chocolate shavings', 'Desert', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRUURUvVbbWXKEQ5wYxO2znhv6MmNuMdnumGH1Txq__8g&s'),
(6, 'Iced Coffee', '3.99', 'Cold-brewed coffee served over ice, with optional milk and sweetener', 'Drink', 'https://images.immediate.co.uk/production/volatile/sites/30/2022/04/Iced-Caramel-Macchiato-f4a10f9.jpg?quality=90&resize=556,505'),
(7, 'Mojito', '7.99', 'Classic Cuban cocktail made with white rum, fresh mint, lime juice, sugar, and soda water', 'Drink', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcREh2596vQ31wQAJQr9ZMwScMoBSPTiNijHEb7dm0CnjA&s'),
(8, 'Green Smoothie', '5.99', 'Blend of spinach, kale, banana, pineapple, and coconut water, packed with nutrients', 'Drink', 'https://cdn.loveandlemons.com/wp-content/uploads/2022/12/green-smoothie-recipes.jpg'),
(9, 'Craft Beer Sampler', '12.99', 'Selection of locally brewed craft beers, perfect for tasting different styles', 'Drink', 'https://m.media-amazon.com/images/I/91bB21LiEML._AC_UF350,350_QL80_.jpg');

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `CommentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `member`
--
ALTER TABLE `member`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

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
