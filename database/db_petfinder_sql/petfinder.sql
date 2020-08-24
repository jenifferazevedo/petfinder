-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Ago-2020 às 01:14
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- CRIAR BANCO DE DADOS;
-- Banco de dados: `petfinder`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pet`
--

CREATE TABLE `pet` (
  `pet_id` int(11) NOT NULL,
  `pet_name` varchar(100) NOT NULL,
  `pet_image` text NOT NULL DEFAULT '\'n/a\'',
  `user_id` int(11) NOT NULL,
  `status` set('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `pet_type` int(11) NOT NULL DEFAULT 3,
  `sexo` set('m','f') NOT NULL,
  `description` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pet`
--

INSERT INTO `pet` (`pet_id`, `pet_name`, `pet_image`, `user_id`, `status`, `pet_type`, `sexo`, `description`, `create_at`, `update_at`) VALUES
(1, 'Rex', 'https://i.pinimg.com/originals/ff/ff/86/ffff868e1a1a87763545d34e32a3f97e.jpg', 3, 'ativo', 2, 'f', 'Super fofa, ama carinho! ', '2020-08-23 18:12:58', '2020-08-24 00:13:57'),
(2, 'Flor', 'https://blog.catclub.com.br/wp-content/uploads/2018/04/gato-abandonado-620x410.jpg', 4, 'inativo', 1, 'm', 'Vacinada', '2020-08-23 18:14:41', '2020-08-24 00:14:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `type_pet`
--

CREATE TABLE `type_pet` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `type_pet`
--

INSERT INTO `type_pet` (`type_id`, `type_name`) VALUES
(1, 'gato'),
(2, 'cachorro'),
(3, 'outros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  `image` text NOT NULL DEFAULT 'n/a',
  `contact` varchar(12) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `post_code` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `tipo` enum('0','1') NOT NULL DEFAULT '0',
  `status` set('ativo','inativo') NOT NULL DEFAULT 'ativo',
  `create_at` datetime NOT NULL DEFAULT current_timestamp(),
  `update_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `image`, `contact`, `adress`, `post_code`, `city`, `tipo`, `status`, `create_at`, `update_at`) VALUES
(1, 'Admin', 'admin@email.com', '123456', 'https://st2.depositphotos.com/2343527/6903/v/450/depositphotos_69031131-stock-illustration-modern-businessman-hipster-conceptual-infographics.jpg', '900900900', 'Rua Sobe e Desce', '9000000', 'Braga', '1', 'ativo', '2020-08-23 18:03:08', NULL),
(2, 'Jeniffer', 'jeniffer@email.com', '123456', 'n/a', '999999999', 'Rua Sobe E Desce', '4444117', 'Porto', '1', 'ativo', '2020-08-21 00:35:26', '2020-08-23 18:01:00'),
(3, 'Gilmar Freitas', 'gilmarpt@gmail.com', '123456', 'https://scontent.fopo1-1.fna.fbcdn.net/v/t31.0-8/27628601_1883030305042003_1574064750041286583_o.jpg?_nc_cat=103&_nc_sid=09cbfe&_nc_ohc=0CFDKelPwE4AX8nVvVM&_nc_ht=scontent.fopo1-1.fna&oh=bcb04f1614ef3ea1a63ef232453d8ebb&oe=5F593BD0', '900000001', 'Rua Sobe E Desce', '8000-999', 'aveiro', '0', 'ativo', '2020-08-20 17:29:16', '2020-08-23 18:00:55'),
(4, 'Julia', 'ju@email.com', '123456', 'n/a', '900000000', 'Rua Sobe E Desce', '9000000', 'Aveiro', '', 'inativo', '2020-08-23 18:13:37', '2020-08-23 19:05:33');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pet_type` (`pet_type`);

--
-- Índices para tabela `type_pet`
--
ALTER TABLE `type_pet`
  ADD PRIMARY KEY (`type_id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pet`
--
ALTER TABLE `pet`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `type_pet`
--
ALTER TABLE `type_pet`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `pet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `pet_ibfk_2` FOREIGN KEY (`pet_type`) REFERENCES `type_pet` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
