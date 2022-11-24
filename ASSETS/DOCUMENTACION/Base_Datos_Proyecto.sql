-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db_mysql
-- Generation Time: Nov 11, 2022 at 03:15 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Base_Datos_Proyecto`
--

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_pk_rol` tinyint(1) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_pk_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_pk_usuario` bigint(100) NOT NULL,
  `user_usuario` varchar(100) NOT NULL,
  `pass_usuario` varchar(100) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `apellido_usuario` varchar(100) NOT NULL,
  `edad_usuario` int(2) NOT NULL,
  `genero_usuario` varchar(100) NOT NULL,
  `telefono_usuario` varchar(100) NOT NULL,
  `direccion_usuario` varchar(100) NOT NULL,
  `ciudad_usuario` varchar(100) NOT NULL,
  `cargo_usuario` varchar(100) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `fecha_registro_usuario` date NOT NULL,
  `permiso_usuario` int(2) NOT NULL,
  `estado_usuario` tinyint(1) NOT NULL,
  `id_pk_rol_fk` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_pk_usuario`, `user_usuario`, `pass_usuario`, `nombre_usuario`, `apellido_usuario`, `edad_usuario`, `genero_usuario`, `telefono_usuario`, `direccion_usuario`, `ciudad_usuario`, `cargo_usuario`, `correo_usuario`, `fecha_registro_usuario`, `permiso_usuario`, `estado_usuario`, `id_pk_rol_fk`) VALUES
(9874548, 'Administrador', 'PeMPLaBqGSYMKDIeM2KYAA==', 'Victor', 'Hernandez', 35, 'masculino', '3113893040', 'calle 11 # 2-69', 'Cartago', 'Administrador', 'vhhernandezp@gmail.com', '2022-11-10', 19, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_pk_rol`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_pk_usuario`),
  ADD KEY `id_pk_rol_fk` (`id_pk_rol_fk`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_pk_rol_fk`) REFERENCES `rol` (`id_pk_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
