-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 03:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdev`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `ProductDescription` text NOT NULL,
  `ProductPrice` decimal(10,0) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `ProductImage` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `ProductName`, `ProductDescription`, `ProductPrice`, `Quantity`, `ProductImage`) VALUES
(2222, 'S8\r\nDeﬁbrillator\r\nMonitor', 'The most convenient and effective lifesaving.\r\nAs the most important part of CPR, time is of the essence with the defibrillator monitor. \r\nHigher and Greater for Better Rescue\r\nEnergy selection up to 360J.\r\nCovers an impedance range from 20-300 Ω, suitable for various patients.\r\nHigher efficiency with advanced biphasic truncated exponential (BTE) waveform technology and automatic impedance compensation.\r\nAs first aid equipment, defibrillators are often used in extreme environments, so their reliability is emphasized in all situations.', '4500', 2, 'myApp/img/S8.jpg'),
(3333, 'C60\r\nNeonatal Patient Monitor', 'ExNeo Neonatal ECG Technology\r\nMotion interference is greatly filtered out, while the integrity of the ECG signal is retained to the greatest extent,improving the accuracy of heart rate detection.\r\nImprove anti-interference performance in motion, optimize the low blood pressure measurement algorithm, faster, more accurate, and safer, obtain results in one measurement, reduce repeated measurements, and improve efficiency.\r\nEnsures accurate newborn measurements even with very low perfusion and body motion.\r\n8.4-inch TFT touch screen, touch and jog dial dual operation.', '1500', 5, 'myApp/img/img5.jpg'),
(4444, 'C30\r\nMulti-parameter\r\nPatient Monitor', 'Specialized monitoring for various challenging environments.\r\nStrong, stable, waterproof, dustproof, anti-fall and shockproof.\r\nSmall and lightweight, easy to carry\r\nSuitable for emergency scene, out-of-hospital transport, intra-hospital transport, bedside monitoring in the emergency department.\r\nConnected to C70 and C90 as a plug-in module to achieve the integrated. management of monitoring information for patient admission and discharge.', '810', 1, 'myApp/img/C30.jpg'),
(5555, 'NV6\nNeonatal/Pediatric Continuous\nPositive Pressure Ventilation System', 'Simple and reliable bubble CPAP\r\nNV6 integrates the medical air-oxygen blender/humidifier/pressure generating device to provide bubble NCPAP ventilation therapy for clinical use. PEEP output is 0-10cmH2O, which can improve children\'s respiratory function, reduce carbon dioxide retention, promote sputum elimination, and accelerate recovery.\r\nNV6 also has HFNC high flow oxygen therapy function, which is easier to operate and reduces the risk of nasal injury in children.\r\n\r\n\r\n', '15000', 2, 'myApp/img/NV6.jpg'),
(6666, 'BD-DF\r\nReusable Video Laryngoscope\r\n', 'Video Laryngoscope BD-DF Besdata uses an optimized CMOS camera, to make the intubation process much easier.\r\nThe smart anti-fog LED, with white light, as well as the CMOS camera offer an improved field of view of 60°. \r\nErgonomic design, easy to tube and hold;\r\nEquipped with blade and anti-fogging chamber.\r\n6 sizes of blades for difficult intubations.\r\nEquipped with a 1024*720 resolution monitor, for better visualization during intubation.', '860', 3, 'myApp/img/BDDF.jpg'),
(7777, 'M300/M500\r\nSyringe Pump', 'High precision, stable and reliable\r\nMulti-CPU monitoring, high-precision injection, stable and reliable.\r\nInjection modes to meet clinical needs\r\nUp to 10 injection modes, including time, weight, sequence, cascade mode, etc.\r\n6.2 Large touch screen operation Intuitive numerical display with vivid color, lifelike injection curve display\r\nFoldable screen within reach\r\n6.2 Large touch screen operation Intuitive numerical display with vivid color, lifelike injection curve display.', '400', 6, 'myApp/img/M300.jpg'),
(8888, 'ME600 \r\nInfusion Pump', 'Strive for perfection, accurate infusion\r\nHigh quality motor with dual sensor detection accuracy.\r\nBubble detection: reducing the risk of air embolism caused by bubbles entering the body. Patented anti-bolus system, one hand operation, with linkage mechanism and self-locking function.\r\nHigh-precision pressure sensors with sensitive alarms. Dual monitoring of infusion flow with standard drop sensor\r\nSensitive ultrasound probe to prevent bubbles from entering the body Provides lighting when door is opened, for night use', '600', 5, 'myApp/img/img2.jpg'),
(9999, 'NC5 \r\nVital Signs Monitor', 'Applied to outpatient, emergency and general wards. As a spot check monitor and bed side monitor, it integrates NIBP, SpO2, ECG, Ear Temp. It is simple, tasteful, compact and lightweight, a perfect combination of technology and aesthetics.\r\nSpot Check Mode：\r\nApplied to the outpatient and emergency wards for quick measurement of physiological parameters. \r\nMonitoring Mode：\r\nUsed as a bedside monitor in general wards to measure patiant’s patient\'s physiological parameters (NIBP, SpO2, ECG, etc.) in real time.\r\n', '1200', 2, 'myApp/img/NC5.jpg'),
(11111, 'NC3\r\nVital signs monitor\r\n', 'Convenient and accurate measurement\r\nNon-contact infrared pyroelectric measurements.\r\nBuilt-in RF communication, wireless data transmission.\r\nRapid blood pressure measurement technique.\r\nQuick switch between patient types\r\nRapid Masimo SPO2 measurement.\r\nQuality products in line with your expectations.\r\n50 sets of blood pressure measurement datastorage.\r\nLithium battery with 12+ hours of continuous operation\r\nSmall, lightweight and durable\r\nThe whole machine weighs only 1.25kg\r\n6-inch ultra-high-resolution color LED screen.', '920', 4, 'myApp/img/NC3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11113;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
