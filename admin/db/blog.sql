-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Abr-2024 às 02:15
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext DEFAULT NULL,
  `meta_keyword` mediumtext DEFAULT NULL,
  `navbar_status` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0 COMMENT '0=visible, 1=hidden, 2=deleted',
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `meta_title`, `meta_description`, `meta_keyword`, `navbar_status`, `status`, `created_at`) VALUES
(2, 'HTML', 'html-tutorial', 'Html is a scripting language', 'HTML Tutorial', 'Html is a scripting language', 'html tutorials, html crash course', 0, 0, '2024-04-21 20:15:05'),
(4, 'PHP', 'php-tutorial', 'php is a server side language', 'PHP Tutorial', 'php is a server side language', 'php, php crash course', 0, 0, '2024-04-21 20:30:12'),
(5, 'Laravel', 'laravel-tutorial', 'Laravel is a php framework', 'Laravel Tutorial', 'Laravel is a php framework', 'laravel course, laravel', 0, 0, '2024-04-22 20:40:22'),
(6, 'React', 'react-tutorial', 'React is a javaScript framework', 'React Tutorial', 'React is a javaScript framework', 'react, js framework react, reactjs', 0, 0, '2024-04-22 20:41:47'),
(7, 'VueJs', 'Vue-tutorial', 'Vue is a javaScript framework', 'Vue Tutorial', 'Vue is a javaScript framework', 'vue tutorial, vue', 0, 0, '2024-04-22 20:42:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `meta_keyword` mediumtext NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `name`, `slug`, `description`, `image`, `meta_title`, `meta_description`, `meta_keyword`, `status`, `created_at`) VALUES
(2, 2, 'HTML course', 'html-course', '<p><b>Html tutorial Course</b></p><p>html is a scripting language</p><p>&lt;div&gt;Hello World&lt;/div&gt;</p><p>How you can see here!</p>', '1713799004.com', 'html tutorial', 'html 5 course', 'html', 0, '2024-04-22 01:34:04'),
(5, 2, 'HTML Docs', 'html-docs', '<p>something here</p>', '1713818774.com', 'HTML tutorial', 'something here', 'HTML tutorial', 0, '2024-04-22 20:46:14'),
(6, 4, 'PHP course', 'php-tutorial', '<p>something here</p>', '1713819289.png', 'PHP Tutorial', 'something here', 'PHP Tutorial', 0, '2024-04-22 20:48:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(191) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin, 2=super_admin',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=no_blocked, 1=blocked',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`, `role_as`, `status`, `created_at`) VALUES
(5, 'super', 'admin', 'superadmin@gmail.com', '$2y$10$pAYIbsZDS8G17XJUcm3Yu.ePTOddEpzGS4ATSiZ0KxeVu/hiGO.rq', 2, 0, '2024-04-20 18:30:20'),
(6, 'admin', 'admin', 'paquete@gmail.com', '$2y$10$/m6vFnZ36bWKOpo90LeykeJJ3RREXVltHEkRcOwvF3IGZ0Gg6mO6y', 1, 0, '2024-04-20 23:06:34'),
(9, 'user', 'user', 'user@gmail.com', '$2y$10$m7pY6CuWamAPmBfvpMT14uYRyvF8zuSPFZjOE.x3/rzub.qrITtYC', 0, 0, '2024-04-25 00:11:42');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
