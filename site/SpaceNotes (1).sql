-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2023 at 08:02 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SpaceNotes`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `content` text COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(22) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `user_id`, `title`, `content`, `color`, `created_at`, `updated_at`) VALUES
(145, 6, '123', '<p>12asdasdasd12</p>', '#FFC971', '2023-05-26 08:28:42', '2023-05-26 08:28:46'),
(146, 6, '1\r\n                                                                            ', '<p>1</p>', '#FFC971', '2023-05-26 08:30:18', '2023-05-26 08:30:20'),
(147, 6, '12', '<p>12</p>', '#10E6FF', '2023-05-26 08:30:27', '2023-05-26 08:30:27'),
(149, 6, '\r\n                                        312', '<pre class=\"ql-syntax\" spellcheck=\"false\">var quill = new Quill(\"#text-editor\", {\r\n&nbsp; &nbsp; modules: {\r\n&nbsp; &nbsp; &nbsp; &nbsp; syntax: true, \r\n&nbsp; &nbsp; &nbsp; &nbsp; toolbar: {\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; container: [\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [{ \'header\': 1 }, { \'header\': 2 }], \r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [\"bold\", \"italic\", \"underline\"],\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [{ \'color\': [] }, { \'background\': [] }],\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [\"link\", \"blockquote\", \"code-block\"],\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [{ list: &nbsp;\"ordered\" }, { list: &nbsp;\"bullet\" }],\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [{ \'align\': [] }],\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; [ \'link\', \'image\', \'video\', \'formula\' ],\r\n\r\n\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ],\r\n&nbsp; &nbsp; &nbsp; &nbsp; },\r\n&nbsp; &nbsp; },\r\n&nbsp; &nbsp; placeholder: \'Введите текст...\',\r\n&nbsp; &nbsp; theme: \'snow\',\r\n}); \r\nvar inputColor = document.getElementById(\'inputColor\');\r\nvar colorHidden = document.getElementById(\'color-hidden\');\r\nvar inputTitle = $(\"#inputTitle\")[0];\r\nvar inputContent = $(\"#inputContent\")[0];\r\nvar divTitle = $(\"#divTitle\")[0];\r\nvar divContent = document.getElementById(\"text-editor\").firstChild;\r\nvar saveBtn = document.getElementsByClassName(\"save-btn\")[0];\r\nvar count = document.getElementById(\"count\");\r\nvar symbolCount = document.getElementById(\"symbolCount\");\r\nvar wordCount = document.getElementById(\"wordCount\");\r\n\r\n\r\ninputColor.value = colorHidden.innerText;\r\n\r\n\r\nif(colorHidden.innerText != \'#E4F691\'){\r\n&nbsp; &nbsp; count.style.color = colorHidden.innerText;\r\n&nbsp; &nbsp; saveBtn.style.backgroundColor = colorHidden.innerText;\r\n}else{\r\n&nbsp; &nbsp; count.style.color = \"#C0C775\";\r\n&nbsp; &nbsp; saveBtn.style.backgroundColor = \"#DBE385\";\r\n}\r\n\r\n\r\ndivTitle.addEventListener(\'input\', function() {\r\n&nbsp; &nbsp; inputTitle.value = divTitle.innerHTML;\r\n});\r\nquill.on(\'text-change\', function() {\r\n&nbsp; &nbsp; var html = quill.root.innerHTML;\r\n&nbsp; &nbsp; inputContent.value = html;\r\n&nbsp; &nbsp; if(quill.root.innerText.length){\r\n&nbsp; &nbsp; &nbsp; &nbsp; $(\"#count\").fadeIn();\r\n&nbsp; &nbsp; &nbsp; &nbsp; symbolCount.innerText = quill.root.innerText.length;\r\n&nbsp; &nbsp; }\r\n&nbsp; &nbsp; if(countWords(quill.root.innerText)){\r\n&nbsp; &nbsp; &nbsp; &nbsp; $(\"#count\").fadeIn();\r\n&nbsp; &nbsp; &nbsp; &nbsp; wordCount.innerText = countWords(quill.root.innerText);\r\n&nbsp; &nbsp; }\r\n&nbsp; &nbsp; if (quill.root.innerHTML.length &gt; 60000) {\r\n&nbsp; &nbsp; &nbsp; &nbsp; alert(\'Вы превысили максимального количества символов\');\r\n&nbsp; &nbsp; &nbsp; &nbsp; saveBtn.disabled = true;\r\n&nbsp; &nbsp; &nbsp; } else {\r\n&nbsp; &nbsp; &nbsp; &nbsp; saveBtn.disabled = false;\r\n&nbsp; &nbsp; &nbsp; }\r\n});\r\n\r\n\r\n$(\".back\").on(\"click\", function(){\r\n&nbsp; &nbsp; location.href = \"../main.php\";\r\n})\r\n\r\n\r\n</pre>', '#FF9A76', '2023-05-26 08:32:10', '2023-05-30 16:37:55'),
(150, 6, '123', '<p>qwe </p>', '#FFC971', '2023-05-30 16:37:21', '2023-05-30 16:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersPass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersPass`) VALUES
(6, 'daty2', 'te26092004@gmail.com', '$2y$10$vV2QFlbFCarpxw8W45Lp7OAOY0yk1ijr58c.ZTqU62pYYTBsJIBUG'),
(7, 'Daty', 'temirlanaltaev26092004@gmail.com', '$2y$10$XbsWq9U9lVICcf7ifdrP3.zp9yuXU1Otm5L2Ggp77bL116ppv7ode'),
(8, 'Check', 'datyd26092004@gmail.com', '$2y$10$1e2qnn2yGbwcmd6DFve6D.3I52NltoiEZC7G5dG6VpkGFx4MEh/k2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
