-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-09-2020 a las 16:32:11
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crud`
--
CREATE DATABASE IF NOT EXISTS `crud` 
USE crud;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS productos;

CREATE TABLE productos (
  id int(11) NOT NULL AUTO_INCREMENT,
  codigo varchar(20) NOT NULL,
  producto varchar(255) NOT NULL,
  precio decimal(10,2) NOT NULL,
  cantidad int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO productos (id, codigo, producto, precio, cantidad) VALUES
(10, '8523', 'televisor lg', 85.00, 9),
(11, '963', 'laptop hp', 56.00, 9),
(18, '7897685', 'nuevo', 896.00, 6),
(19, '75545', 'probando', 96344.00, 8),
(20, '78799', 'impresora epson', 45.00, 4);