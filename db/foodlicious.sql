-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2023 a las 22:25:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foodlicious`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Hamburguesas'),
(2, 'Pizzas'),
(3, 'Bebidas'),
(4, 'Postres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `order_id` varchar(36) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `complaint_date` datetime DEFAULT NULL,
  `complaint_text` text DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'En proceso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `complaints`
--

INSERT INTO `complaints` (`id`, `order_id`, `name`, `lastname`, `email`, `complaint_date`, `complaint_text`, `status`) VALUES
(4, '045f91b4-d4b6-459d-a3bc-c450424a3256', 'asdasdas', 'asdasdas', 'asdasdsda1@gmail.com', '2023-12-05 21:27:58', 'asdasdadas', 'Revisado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frequent_questions`
--

CREATE TABLE `frequent_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(50) NOT NULL,
  `answer` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `frequent_questions`
--

INSERT INTO `frequent_questions` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, '¿Cuánto es el precio de envío??', 'El precio de envío varía según la localidad.', '2023-11-08 07:12:11', '2023-11-24 00:04:01'),
(2, 'Hice un orden, pero me gustaría cancelarlo', 'Por favor comunícate directamente con la sucursal en la que realizaste tu orden. Si no logras comunicarte con la sucursal por favor comunícate con nuestro equipo de soporte para revisar tu caso y poder ayudarte.', '2023-11-08 07:12:11', '2023-11-08 07:12:11'),
(3, 'Recibí mi orden equivocada', 'Lamentamos mucho el inconveniente. Por favor comunícate con nuestro equipo de soporte para revisar tu caso y poder ayudarte.', '2023-11-08 07:13:06', '2023-11-08 07:13:06'),
(4, '¿Cuál es el horario de atención?', 'L - V 9:00 am a 10:00 pm / S - D 8:00 am a 9:00 pm', '2023-11-08 07:13:20', '2023-11-08 07:13:20'),
(5, '¿Cuáles son los métodos de pago aceptados?', 'Tarjetas de crédito o débito (Visa, MasterCard, etc.) / Efectivo a la entrega (en áreas habilitadas).', '2023-11-08 07:13:56', '2023-11-08 07:13:56'),
(6, '¿Cómo puedo realizar un orden en línea?', 'Visita nuestro sitio web o la aplicación móvil. / Explora nuestro menú y selecciona los productos que deseas. / Agrega los productos al carrito de compra. / Revisa tu orden en el carrito y procede a la página de pago. / Selecciona tu método de pago y proporciona la información requerida. / Confirma el orden y recibirás una confirmación por correo electrónico. ¡Listo!', '2023-11-08 07:14:24', '2023-11-08 07:14:24'),
(7, '¿Cómo puedo hacer un seguimiento de mi orden?', 'Una vez que hayas realizado tu orden, recibirás una confirmación con un enlace de seguimiento que te permitirá ver el estado actual de tu orden. También puedes ver el estado de tu orden en la sección de ordenes de tu cuenta.', '2023-11-08 07:15:00', '2023-11-08 07:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` varchar(36) NOT NULL,
  `user_dni` varchar(8) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `total` float(10,2) DEFAULT NULL,
  `total_sold` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `user_dni`, `order_date`, `address`, `total`, `total_sold`, `status`) VALUES
('00be4931-493d-43c4-88ef-8b8d6302f138', '87654321', '2023-11-19 17:44:40', 'Av. Los Alamos 123', 39.00, 3, 'En Proceso'),
('045f91b4-d4b6-459d-a3bc-c450424a3256', '22345678', '2023-11-19 18:05:15', 'Av. Los Alamos 123', 26.00, 2, 'En Proceso'),
('058cd0f0-2bc6-4d7e-b5ee-22ce70b0bbac', '74610635', '2023-11-19 18:22:44', 'Av. Los Alamos 123', 19.90, 1, 'En Proceso'),
('08036530-8e3f-40af-98fb-720009f39c73', '87654321', '2023-11-19 17:55:06', 'Av. Los Alamos 123', 60.00, 2, 'En Proceso'),
('0b92b852-4bd2-46a2-b8ab-81a043ea2581', '87654321', '2023-11-19 17:41:38', 'Av. Los Alamos 123', 74.00, 2, 'En Proceso'),
('20765b3c-4cd7-4df3-bf29-e6912e7e8e1e', '22345678', '2023-11-19 18:08:01', 'Av. Los Alamos 123', 12.90, 1, 'En Proceso'),
('22d087f5-3afc-4e07-bad8-7e4b21afe978', '87654321', '2023-11-19 17:37:44', 'Av. Los Alamos 123', 74.00, 2, 'En Proceso'),
('23fd1647-f721-4ba4-83b2-939319b78ed9', '74610635', '2023-11-19 18:40:37', 'Av. Los Alamos 123', 29.00, 1, 'En Proceso'),
('26b63589-d14b-4d27-8854-5ca99833fdeb', '87654321', '2023-11-19 17:44:11', 'Av. Los Alamos 123', 37.00, 1, 'En Proceso'),
('2c53bbd2-4984-4ddf-887a-f2df568c0f13', '87654321', '2023-11-20 17:44:48', 'Av. Los Alamos 123', 26.80, 2, 'En Proceso'),
('2cbd691d-be75-46f1-a930-dabbab4d32c2', '87654321', '2023-11-20 17:37:38', 'Av. Los Alamos 123', 66.00, 2, 'En Proceso'),
('350526f8-dde4-4df8-8ed8-700f25eb936d', '87654321', '2023-11-20 17:46:12', 'Av. Los Alamos 123', 41.80, 2, 'En Proceso'),
('388a630f-bb37-4219-8230-5ca22bb2c748', '74610635', '2023-11-20 18:13:45', 'Av. Los Alamos 123', 20.90, 1, 'En Proceso'),
('3d7e9f51-6ef3-44ba-bfbc-feaf02c20cbc', '74610635', '2023-11-20 18:13:04', 'Av. Los Alamos 123', 54.60, 4, 'En Proceso'),
('4035afae-c7c9-4067-9048-95f1ef81d9f2', '74610635', '2023-11-20 18:09:52', 'Av. Los Alamos 123', 37.80, 4, 'En Proceso'),
('41a84bbc-ef38-4b2f-8655-fedbe17797b0', '22345678', '2023-11-20 17:18:19', 'Av. Los Alamos 123', 143.30, 7, 'En Proceso'),
('4201c538-5c2a-4b06-a107-f34a228e46b6', '22345678', '2023-11-20 18:04:05', 'Av. Los Alamos 123', 53.60, 4, 'En Proceso'),
('42aef4ea-ad44-4623-884e-33e16f754810', '74610635', '2023-11-20 18:14:09', 'Av. Los Alamos 123', 40.00, 1, 'En Proceso'),
('44b9e20d-1f6b-4db4-9f17-34381a61fb6c', '22345678', '2023-11-20 18:05:09', 'Av. Los Alamos 123', 26.00, 2, 'En Proceso'),
('470111e3-d0ab-4caa-8d47-f59e1f58af81', '87654321', '2023-11-20 17:34:34', 'Av. Los Alamos 123', 13.80, 2, 'En Proceso'),
('47a8371f-12ab-4c95-89fe-88fd8ef31afd', '74610635', '2023-11-20 18:13:17', 'Av. Los Alamos 123', 37.00, 1, 'En Proceso'),
('4c1bf8ef-4b1f-4cbb-91c3-52056cc55fac', '74610635', '2023-11-21 18:09:35', 'Av. Los Alamos 123', 41.80, 2, 'En Proceso'),
('4fa445a8-0c37-441c-bdaa-674dd9d34228', '74610635', '2023-11-21 18:14:00', 'Av. Los Alamos 123', 23.90, 1, 'En Proceso'),
('5a6dc630-1992-44e2-9dcb-7ab8c4e18f34', '74610635', '2023-11-21 18:25:40', 'Av. Los Alamos 123', 18.90, 1, 'En Proceso'),
('69d3e7c2-293a-4a4c-b5e3-f39a65979a2c', '74610635', '2023-11-21 18:15:45', 'Av. Los Alamos 123', 26.00, 2, 'En Proceso'),
('6fd6eaba-3185-4fbf-83a6-cb33eeca54a0', '22345678', '2023-11-21 18:03:41', 'Av. Los Alamos 123', 51.80, 2, 'En Proceso'),
('783104dd-045f-4637-9a3e-7061073def4c', '87654321', '2023-11-21 17:37:47', 'Av. Los Alamos 123', 74.00, 2, 'En Proceso'),
('81f4f3d6-fd7a-4921-b07b-b05d0a3724b7', '74610635', '2023-11-21 18:13:49', 'Av. Los Alamos 123', 20.90, 1, 'En Proceso'),
('828dfcf4-0614-4dda-bfb0-101a7cdd2a0f', '87654321', '2023-11-21 17:55:29', 'Av. Los Alamos 123', 41.80, 2, 'En Proceso'),
('8348c292-9a34-4ea9-b54d-bc7b6d5f777b', '22345678', '2023-11-21 17:18:35', 'Av. Los Alamos 123', 174.00, 5, 'En Proceso'),
('837410bb-6f07-489e-89a5-15fba5a7865b', '87654321', '2023-11-21 17:34:28', 'Av. Los Alamos 123', 108.00, 3, 'En Proceso'),
('84af92d4-c795-4f2e-a0dd-0ee35bdf1d12', '22345678', '2023-11-22 17:18:28', 'Av. Los Alamos 123', 69.70, 4, 'En Proceso'),
('85390dc2-365c-4879-8f99-234183327adc', '74610635', '2023-11-22 18:41:15', 'Av. Los Alamos 123', 104.50, 5, 'En Proceso'),
('85ce8711-7c55-4090-814c-7a9ceeac7f53', '22345678', '2023-11-22 18:07:53', 'Av. Los Alamos 123', 87.80, 4, 'En Proceso'),
('86f0a256-42ed-4c9c-a169-3772007bb7bc', '74610635', '2023-11-22 18:12:46', 'Av. Los Alamos 123', 51.80, 2, 'En Proceso'),
('8a9ee51d-eb26-4ab2-8071-336251afda72', '74610635', '2023-11-22 18:13:22', 'Av. Los Alamos 123', 37.00, 1, 'En Proceso'),
('8ec97eec-7de6-4ea9-bb23-9b912093aa66', '74610635', '2023-11-22 18:20:53', 'Av. Los Alamos 123', 37.00, 1, 'En Proceso'),
('94f9eb46-c359-45d9-8571-9e8467eab1f5', '22345678', '2023-11-22 18:03:49', 'Av. Los Alamos 123', 118.00, 3, 'En Proceso'),
('95ac2e7c-ee20-4b9d-8dfa-07910a46274f', '74610635', '2023-11-22 18:16:03', 'Av. Los Alamos 123', 33.80, 2, 'En Proceso'),
('9c807a38-7f90-4a18-aeee-e927da7c1d3e', '74610635', '2023-11-22 18:25:00', 'Av. Los Alamos 123', 33.80, 2, 'En Proceso'),
('9e527065-c854-4a06-b653-d06f1d76660e', '74610635', '2023-11-22 18:18:44', 'Av. Los Alamos 123', 37.80, 4, 'En Proceso'),
('a2c1385b-9c17-4708-ac83-80b07d1612e0', '22345678', '2023-11-22 18:05:01', 'Av. Los Alamos 123', 50.80, 3, 'En Proceso'),
('a2e1f0e1-3edb-4079-a414-6eb592a58b69', '87654321', '2023-11-22 17:44:33', 'Av. Los Alamos 123', 26.70, 3, 'En Proceso'),
('a428315b-47cb-4a2f-94f8-cba202c9b308', '74610635', '2023-11-22 18:09:43', 'Av. Los Alamos 123', 37.00, 1, 'En Proceso'),
('a4c19c0a-468f-430f-9eb0-a4cbd20ae653', '22345678', '2023-11-22 17:18:46', 'Av. Los Alamos 123', 23.90, 1, 'En Proceso'),
('a56efc09-1b3b-4378-b4c7-712410d0b0f1', '74610635', '2023-11-23 18:13:12', 'Av. Los Alamos 123', 87.80, 4, 'En Proceso'),
('a5c41581-4d11-495e-8e7f-df4c589298e1', '74610635', '2023-11-23 18:22:40', 'Av. Los Alamos 123', 19.90, 1, 'En Proceso'),
('a692d002-ddf7-4502-ab54-df38122c015f', '74610635', '2023-11-23 18:41:07', 'Av. Los Alamos 123', 47.70, 3, 'En Proceso'),
('a796276c-a6fd-4452-a553-122287e36df7', '22345678', '2023-11-23 17:18:42', 'Av. Los Alamos 123', 33.80, 2, 'En Proceso'),
('af58f30d-4678-4e4b-8d48-6590cfc5d527', '87654321', '2023-11-23 17:41:54', 'Av. Los Alamos 123', 101.80, 4, 'En Proceso'),
('b9020def-a149-45b1-a2d3-08802b1a45b3', '74610635', '2023-11-23 18:15:37', 'Av. Los Alamos 123', 47.80, 2, 'En Proceso'),
('baa1145b-3cac-426c-b1f4-8a1a2575d165', '22345678', '2023-11-23 17:19:46', 'Av. Los Alamos 123', 26.00, 2, 'En Proceso'),
('c55777cf-12c8-41d2-8388-349084964db6', '74610635', '2023-11-23 18:18:38', 'Av. Los Alamos 123', 53.40, 6, 'En Proceso'),
('c7942092-6056-4f24-9945-7275b14b81bc', '22345678', '2023-11-23 18:08:12', 'Av. Los Alamos 123', 40.80, 2, 'En Proceso'),
('ca5bd10a-5542-4e64-b766-32a31c5abdcc', '74610635', '2023-11-19 15:52:46', 'Av. Los Alamos 123', 118.30, 7, 'En Proceso'),
('cb0901e1-1c9f-44ad-a8c5-988ad419e596', '74610635', '2023-11-23 18:24:45', 'Av. Los Alamos 123', 44.00, 1, 'En Proceso'),
('cb468da2-fc56-42ce-808f-ee8d52c0c71a', '74610635', '2023-11-23 18:12:54', 'Av. Los Alamos 123', 44.70, 3, 'En Proceso'),
('cd9cc763-5b68-4ba3-b836-d3ad65677c76', '22345678', '2023-11-24 18:06:20', 'Av. Los Alamos 123', 29.00, 1, 'En Proceso'),
('cdf76803-443b-4900-a499-b114ed875d29', '22345678', '2023-11-24 17:19:29', 'Av. Los Alamos 123', 20.90, 1, 'En Proceso'),
('cf746467-9c21-44b6-8207-55b1a82cfd19', '87654321', '2023-11-24 17:41:46', 'Av. Los Alamos 123', 87.00, 3, 'En Proceso'),
('d0d75720-45fb-4f57-a247-29b05b268c1e', '22345678', '2023-11-24 18:04:51', 'Av. Los Alamos 123', 52.80, 3, 'En Proceso'),
('d796c51a-ea3d-431e-853d-70f544bf713a', '87654321', '2023-11-24 17:41:30', 'Av. Los Alamos 123', 74.00, 2, 'En Proceso'),
('d97ec67e-aae2-4dd0-b870-bd6bdb4fdd09', '74610635', '2023-11-19 15:16:40', 'Av. Los Alamos 123', 176.10, 9, 'En Proceso'),
('dc88a3da-4f57-4dbb-a1e9-9a08a29c9089', '87654321', '2023-11-24 17:42:02', 'Av. Los Alamos 123', 55.80, 4, 'En Proceso'),
('dff1e8da-9560-4120-a111-65690aaf0f1f', '22345678', '2023-11-24 17:19:38', 'Av. Los Alamos 123', 25.80, 2, 'En Proceso'),
('e5729262-48e1-4ab0-bc77-f0355e863ad2', '74610635', '2023-11-24 18:23:18', 'Av. Los Alamos 123', 53.80, 3, 'En Proceso'),
('ea8cb98e-5faa-4ebf-b9e3-86e10a1bc59d', '87654321', '2023-11-24 17:34:40', 'Av. Los Alamos 123', 47.80, 2, 'En Proceso'),
('f014424a-fdb6-4e95-a25f-125e4ac9ad23', '87654321', '2023-11-25 17:55:21', 'Av. Los Alamos 123', 111.00, 3, 'En Proceso'),
('f1f1b9ee-1ede-4b0c-88b2-27e9a7c92fae', '74610635', '2023-11-25 18:40:56', 'Av. Los Alamos 123', 210.00, 5, 'En Proceso'),
('f497c698-3fff-4cb1-8cbd-d96d47bbc6bc', '87654321', '2023-11-25 17:21:06', 'Av. Los Alamos 123', 68.80, 3, 'En Proceso'),
('f5114e12-a1cc-4628-99c0-88c3e4c90e8b', '74610635', '2023-11-25 18:10:17', 'Av. Los Alamos 123', 59.80, 4, 'En Proceso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `order_id` varchar(36) DEFAULT NULL,
  `product_id` varchar(36) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `qty`, `subtotal`) VALUES
('d97ec67e-aae2-4dd0-b870-bd6bdb4fdd09', '056ac000-66be-11ee-98c2-e0d55e271135', 4, 83.60),
('d97ec67e-aae2-4dd0-b870-bd6bdb4fdd09', '112271f9-66bb-11ee-98c2-e0d55e271135', 2, 41.80),
('d97ec67e-aae2-4dd0-b870-bd6bdb4fdd09', '056ab21f-66be-11ee-98c2-e0d55e271135', 3, 50.70),
('ca5bd10a-5542-4e64-b766-32a31c5abdcc', '056ab21f-66be-11ee-98c2-e0d55e271135', 7, 118.30),
('41a84bbc-ef38-4b2f-8655-fedbe17797b0', '056ab21f-66be-11ee-98c2-e0d55e271135', 1, 16.90),
('41a84bbc-ef38-4b2f-8655-fedbe17797b0', '056ac000-66be-11ee-98c2-e0d55e271135', 3, 62.70),
('41a84bbc-ef38-4b2f-8655-fedbe17797b0', '112271f9-66bb-11ee-98c2-e0d55e271135', 1, 20.90),
('41a84bbc-ef38-4b2f-8655-fedbe17797b0', '17eff162-66bd-11ee-98c2-e0d55e271135', 1, 23.90),
('41a84bbc-ef38-4b2f-8655-fedbe17797b0', '17f00023-66bd-11ee-98c2-e0d55e271135', 1, 18.90),
('84af92d4-c795-4f2e-a0dd-0ee35bdf1d12', '3811d405-66be-11ee-98c2-e0d55e271135', 1, 25.90),
('84af92d4-c795-4f2e-a0dd-0ee35bdf1d12', 'ab84bdbb-66c1-11ee-98c2-e0d55e271135', 1, 30.00),
('84af92d4-c795-4f2e-a0dd-0ee35bdf1d12', 'eed5145e-66c9-11ee-98c2-e0d55e271135', 2, 13.80),
('8348c292-9a34-4ea9-b54d-bc7b6d5f777b', '4387ec21-66c2-11ee-98c2-e0d55e271135', 1, 29.00),
('8348c292-9a34-4ea9-b54d-bc7b6d5f777b', '815c035f-66c2-11ee-98c2-e0d55e271135', 1, 42.00),
('8348c292-9a34-4ea9-b54d-bc7b6d5f777b', '815c165c-66c2-11ee-98c2-e0d55e271135', 1, 37.00),
('8348c292-9a34-4ea9-b54d-bc7b6d5f777b', '1ed8b58e-66c2-11ee-98c2-e0d55e271135', 1, 37.00),
('8348c292-9a34-4ea9-b54d-bc7b6d5f777b', '4387dbef-66c2-11ee-98c2-e0d55e271135', 1, 29.00),
('a796276c-a6fd-4452-a553-122287e36df7', '056ab21f-66be-11ee-98c2-e0d55e271135', 2, 33.80),
('a4c19c0a-468f-430f-9eb0-a4cbd20ae653', '17eff162-66bd-11ee-98c2-e0d55e271135', 1, 23.90),
('cdf76803-443b-4900-a499-b114ed875d29', 'a1a23a7a-66ba-11ee-98c2-e0d55e271135', 1, 20.90),
('dff1e8da-9560-4120-a111-65690aaf0f1f', 'ea08c8f1-29f4-4e96-81a0-b998bc7497be', 2, 25.80),
('baa1145b-3cac-426c-b1f4-8a1a2575d165', 'f67a1a73-66cc-11ee-98c2-e0d55e271135', 2, 26.00),
('f497c698-3fff-4cb1-8cbd-d96d47bbc6bc', '17f00023-66bd-11ee-98c2-e0d55e271135', 1, 18.90),
('f497c698-3fff-4cb1-8cbd-d96d47bbc6bc', '056ac000-66be-11ee-98c2-e0d55e271135', 1, 20.90),
('f497c698-3fff-4cb1-8cbd-d96d47bbc6bc', '4387ec21-66c2-11ee-98c2-e0d55e271135', 1, 29.00),
('837410bb-6f07-489e-89a5-15fba5a7865b', '4387ec21-66c2-11ee-98c2-e0d55e271135', 1, 29.00),
('837410bb-6f07-489e-89a5-15fba5a7865b', '1ed8b58e-66c2-11ee-98c2-e0d55e271135', 1, 37.00),
('837410bb-6f07-489e-89a5-15fba5a7865b', '815c035f-66c2-11ee-98c2-e0d55e271135', 1, 42.00),
('470111e3-d0ab-4caa-8d47-f59e1f58af81', '3de73b0c-66ca-11ee-98c2-e0d55e271135', 1, 6.90),
('470111e3-d0ab-4caa-8d47-f59e1f58af81', '28b43218-66ca-11ee-98c2-e0d55e271135', 1, 6.90),
('ea8cb98e-5faa-4ebf-b9e3-86e10a1bc59d', '17eff162-66bd-11ee-98c2-e0d55e271135', 2, 47.80),
('2cbd691d-be75-46f1-a930-dabbab4d32c2', '1ed8b58e-66c2-11ee-98c2-e0d55e271135', 1, 37.00),
('2cbd691d-be75-46f1-a930-dabbab4d32c2', '4387dbef-66c2-11ee-98c2-e0d55e271135', 1, 29.00),
('22d087f5-3afc-4e07-bad8-7e4b21afe978', 'ed7e1ff4-66bf-11ee-98c2-e0d55e271135', 2, 74.00),
('783104dd-045f-4637-9a3e-7061073def4c', 'eb51fa39-66c2-11ee-98c2-e0d55e271135', 2, 74.00),
('d796c51a-ea3d-431e-853d-70f544bf713a', 'ed7e1ff4-66bf-11ee-98c2-e0d55e271135', 2, 74.00),
('0b92b852-4bd2-46a2-b8ab-81a043ea2581', '9a1d72fb-66bf-11ee-98c2-e0d55e271135', 2, 74.00),
('cf746467-9c21-44b6-8207-55b1a82cfd19', '4387ec21-66c2-11ee-98c2-e0d55e271135', 3, 87.00),
('af58f30d-4678-4e4b-8d48-6590cfc5d527', '1ed89e88-66c2-11ee-98c2-e0d55e271135', 2, 88.00),
('af58f30d-4678-4e4b-8d48-6590cfc5d527', '4c2202ff-66c3-11ee-98c2-e0d55e271135', 2, 13.80),
('dc88a3da-4f57-4dbb-a1e9-9a08a29c9089', 'eed5145e-66c9-11ee-98c2-e0d55e271135', 2, 13.80),
('dc88a3da-4f57-4dbb-a1e9-9a08a29c9089', 'f67a1a73-66cc-11ee-98c2-e0d55e271135', 1, 13.00),
('dc88a3da-4f57-4dbb-a1e9-9a08a29c9089', '4387ec21-66c2-11ee-98c2-e0d55e271135', 1, 29.00),
('26b63589-d14b-4d27-8854-5ca99833fdeb', 'ab84c9d9-66c1-11ee-98c2-e0d55e271135', 1, 37.00),
('a2e1f0e1-3edb-4079-a414-6eb592a58b69', 'ae9886c7-66cc-11ee-98c2-e0d55e271135', 3, 26.70),
('00be4931-493d-43c4-88ef-8b8d6302f138', '14ce2085-66cd-11ee-98c2-e0d55e271135', 1, 13.00),
('00be4931-493d-43c4-88ef-8b8d6302f138', 'f67a1a73-66cc-11ee-98c2-e0d55e271135', 1, 13.00),
('00be4931-493d-43c4-88ef-8b8d6302f138', 'f67a2742-66cc-11ee-98c2-e0d55e271135', 1, 13.00),
('2c53bbd2-4984-4ddf-887a-f2df568c0f13', '4c2202ff-66c3-11ee-98c2-e0d55e271135', 1, 6.90),
('2c53bbd2-4984-4ddf-887a-f2df568c0f13', 'dbba434b-66be-11ee-98c2-e0d55e271135', 1, 19.90),
('350526f8-dde4-4df8-8ed8-700f25eb936d', '112271f9-66bb-11ee-98c2-e0d55e271135', 2, 41.80),
('08036530-8e3f-40af-98fb-720009f39c73', '9a1d6029-66bf-11ee-98c2-e0d55e271135', 2, 60.00),
('f014424a-fdb6-4e95-a25f-125e4ac9ad23', '815c165c-66c2-11ee-98c2-e0d55e271135', 3, 111.00),
('828dfcf4-0614-4dda-bfb0-101a7cdd2a0f', 'a1a23a7a-66ba-11ee-98c2-e0d55e271135', 2, 41.80),
('6fd6eaba-3185-4fbf-83a6-cb33eeca54a0', '3811d405-66be-11ee-98c2-e0d55e271135', 2, 51.80),
('94f9eb46-c359-45d9-8571-9e8467eab1f5', 'ed7e1ff4-66bf-11ee-98c2-e0d55e271135', 2, 74.00),
('94f9eb46-c359-45d9-8571-9e8467eab1f5', '1ed89e88-66c2-11ee-98c2-e0d55e271135', 1, 44.00),
('4201c538-5c2a-4b06-a107-f34a228e46b6', '3de73b0c-66ca-11ee-98c2-e0d55e271135', 1, 6.90),
('4201c538-5c2a-4b06-a107-f34a228e46b6', '28b4201c-66ca-11ee-98c2-e0d55e271135', 1, 6.90),
('4201c538-5c2a-4b06-a107-f34a228e46b6', 'aa6cde9c-66bc-11ee-98c2-e0d55e271135', 1, 15.90),
('4201c538-5c2a-4b06-a107-f34a228e46b6', '17eff162-66bd-11ee-98c2-e0d55e271135', 1, 23.90),
('d0d75720-45fb-4f57-a247-29b05b268c1e', '3811c693-66be-11ee-98c2-e0d55e271135', 1, 16.90),
('d0d75720-45fb-4f57-a247-29b05b268c1e', '4387ec21-66c2-11ee-98c2-e0d55e271135', 1, 29.00),
('d0d75720-45fb-4f57-a247-29b05b268c1e', '4c2202ff-66c3-11ee-98c2-e0d55e271135', 1, 6.90),
('a2c1385b-9c17-4708-ac83-80b07d1612e0', '9a1d72fb-66bf-11ee-98c2-e0d55e271135', 1, 37.00),
('a2c1385b-9c17-4708-ac83-80b07d1612e0', 'eed5145e-66c9-11ee-98c2-e0d55e271135', 2, 13.80),
('44b9e20d-1f6b-4db4-9f17-34381a61fb6c', 'f67a1a73-66cc-11ee-98c2-e0d55e271135', 1, 13.00),
('44b9e20d-1f6b-4db4-9f17-34381a61fb6c', 'f67a2742-66cc-11ee-98c2-e0d55e271135', 1, 13.00),
('045f91b4-d4b6-459d-a3bc-c450424a3256', '14ce2085-66cd-11ee-98c2-e0d55e271135', 1, 13.00),
('045f91b4-d4b6-459d-a3bc-c450424a3256', 'f67a1a73-66cc-11ee-98c2-e0d55e271135', 1, 13.00),
('cd9cc763-5b68-4ba3-b836-d3ad65677c76', 'e4aa1a73-66c1-11ee-98c2-e0d55e271135', 1, 29.00),
('85ce8711-7c55-4090-814c-7a9ceeac7f53', '3de73b0c-66ca-11ee-98c2-e0d55e271135', 1, 6.90),
('85ce8711-7c55-4090-814c-7a9ceeac7f53', '28b4201c-66ca-11ee-98c2-e0d55e271135', 1, 6.90),
('85ce8711-7c55-4090-814c-7a9ceeac7f53', '9a1d72fb-66bf-11ee-98c2-e0d55e271135', 2, 74.00),
('20765b3c-4cd7-4df3-bf29-e6912e7e8e1e', 'ea08c8f1-29f4-4e96-81a0-b998bc7497be', 1, 12.90),
('c7942092-6056-4f24-9945-7275b14b81bc', '17eff162-66bd-11ee-98c2-e0d55e271135', 1, 23.90),
('c7942092-6056-4f24-9945-7275b14b81bc', '3811c693-66be-11ee-98c2-e0d55e271135', 1, 16.90),
('4c1bf8ef-4b1f-4cbb-91c3-52056cc55fac', '112271f9-66bb-11ee-98c2-e0d55e271135', 2, 41.80),
('a428315b-47cb-4a2f-94f8-cba202c9b308', 'ed7e1ff4-66bf-11ee-98c2-e0d55e271135', 1, 37.00),
('4035afae-c7c9-4067-9048-95f1ef81d9f2', 'ae9896e4-66cc-11ee-98c2-e0d55e271135', 2, 11.80),
('4035afae-c7c9-4067-9048-95f1ef81d9f2', 'f67a2742-66cc-11ee-98c2-e0d55e271135', 2, 26.00),
('f5114e12-a1cc-4628-99c0-88c3e4c90e8b', '14ce2085-66cd-11ee-98c2-e0d55e271135', 2, 26.00),
('f5114e12-a1cc-4628-99c0-88c3e4c90e8b', '056ab21f-66be-11ee-98c2-e0d55e271135', 2, 33.80),
('86f0a256-42ed-4c9c-a169-3772007bb7bc', '3811d405-66be-11ee-98c2-e0d55e271135', 2, 51.80),
('cb468da2-fc56-42ce-808f-ee8d52c0c71a', 'aa6cec7a-66bc-11ee-98c2-e0d55e271135', 3, 44.70),
('3d7e9f51-6ef3-44ba-bfbc-feaf02c20cbc', 'a1a23a7a-66ba-11ee-98c2-e0d55e271135', 1, 20.90),
('3d7e9f51-6ef3-44ba-bfbc-feaf02c20cbc', 'dbba434b-66be-11ee-98c2-e0d55e271135', 1, 19.90),
('3d7e9f51-6ef3-44ba-bfbc-feaf02c20cbc', '28b43218-66ca-11ee-98c2-e0d55e271135', 2, 13.80),
('a56efc09-1b3b-4378-b4c7-712410d0b0f1', '28b43218-66ca-11ee-98c2-e0d55e271135', 2, 13.80),
('a56efc09-1b3b-4378-b4c7-712410d0b0f1', '9a1d72fb-66bf-11ee-98c2-e0d55e271135', 2, 74.00),
('47a8371f-12ab-4c95-89fe-88fd8ef31afd', 'ab84c9d9-66c1-11ee-98c2-e0d55e271135', 1, 37.00),
('8a9ee51d-eb26-4ab2-8071-336251afda72', '815c165c-66c2-11ee-98c2-e0d55e271135', 1, 37.00),
('388a630f-bb37-4219-8230-5ca22bb2c748', '8b5930d5-66be-11ee-98c2-e0d55e271135', 1, 20.90),
('81f4f3d6-fd7a-4921-b07b-b05d0a3724b7', '8b5930d5-66be-11ee-98c2-e0d55e271135', 1, 20.90),
('4fa445a8-0c37-441c-bdaa-674dd9d34228', '17eff162-66bd-11ee-98c2-e0d55e271135', 1, 23.90),
('42aef4ea-ad44-4623-884e-33e16f754810', 'ed7e34e2-66bf-11ee-98c2-e0d55e271135', 1, 40.00),
('b9020def-a149-45b1-a2d3-08802b1a45b3', '17eff162-66bd-11ee-98c2-e0d55e271135', 2, 47.80),
('69d3e7c2-293a-4a4c-b5e3-f39a65979a2c', 'f67a2742-66cc-11ee-98c2-e0d55e271135', 2, 26.00),
('95ac2e7c-ee20-4b9d-8dfa-07910a46274f', '3811c693-66be-11ee-98c2-e0d55e271135', 2, 33.80),
('c55777cf-12c8-41d2-8388-349084964db6', 'ae9886c7-66cc-11ee-98c2-e0d55e271135', 6, 53.40),
('9e527065-c854-4a06-b653-d06f1d76660e', '14ce2085-66cd-11ee-98c2-e0d55e271135', 2, 26.00),
('9e527065-c854-4a06-b653-d06f1d76660e', 'ae9896e4-66cc-11ee-98c2-e0d55e271135', 2, 11.80),
('8ec97eec-7de6-4ea9-bb23-9b912093aa66', '9a1d72fb-66bf-11ee-98c2-e0d55e271135', 1, 37.00),
('a5c41581-4d11-495e-8e7f-df4c589298e1', 'dbba434b-66be-11ee-98c2-e0d55e271135', 1, 19.90),
('058cd0f0-2bc6-4d7e-b5ee-22ce70b0bbac', 'dbba347b-66be-11ee-98c2-e0d55e271135', 1, 19.90),
('e5729262-48e1-4ab0-bc77-f0355e863ad2', '28b43218-66ca-11ee-98c2-e0d55e271135', 2, 13.80),
('e5729262-48e1-4ab0-bc77-f0355e863ad2', 'ed7e34e2-66bf-11ee-98c2-e0d55e271135', 1, 40.00),
('cb0901e1-1c9f-44ad-a8c5-988ad419e596', '1ed89e88-66c2-11ee-98c2-e0d55e271135', 1, 44.00),
('9c807a38-7f90-4a18-aeee-e927da7c1d3e', '056ab21f-66be-11ee-98c2-e0d55e271135', 2, 33.80),
('5a6dc630-1992-44e2-9dcb-7ab8c4e18f34', '17f00023-66bd-11ee-98c2-e0d55e271135', 1, 18.90),
('23fd1647-f721-4ba4-83b2-939319b78ed9', '4387ec21-66c2-11ee-98c2-e0d55e271135', 1, 29.00),
('f1f1b9ee-1ede-4b0c-88b2-27e9a7c92fae', '815c035f-66c2-11ee-98c2-e0d55e271135', 5, 210.00),
('a692d002-ddf7-4502-ab54-df38122c015f', 'aa6cde9c-66bc-11ee-98c2-e0d55e271135', 3, 47.70),
('85390dc2-365c-4879-8f99-234183327adc', '112271f9-66bb-11ee-98c2-e0d55e271135', 5, 104.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` varchar(36) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `sold` int(11) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sold`, `img_url`, `category_id`) VALUES
('056ab21f-66be-11ee-98c2-e0d55e271135', 'Hamburguesa Chicken Grill', 16.90, 17, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809613/hamburguesa-chicken-grill_fkxxb8.webp', 1),
('056ac000-66be-11ee-98c2-e0d55e271135', 'Hamburguesa Churrita', 20.90, 8, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809614/hamburguesa-churrita_yrvk1r.webp', 1),
('112271f9-66bb-11ee-98c2-e0d55e271135', 'Hamburguesa A Lo Pobre', 20.90, 12, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809612/hamburguesa-a-lo-pobre-base_xe1hln.webp', 1),
('14ce2085-66cd-11ee-98c2-e0d55e271135', 'Milkshake Oreo De Vainilla', 13.00, 6, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809817/SHAKE_OREO_VAINILLA_V6_pn4ynk.png', 4),
('17eff162-66bd-11ee-98c2-e0d55e271135', 'Hamburguesa Carretillera', 23.90, 9, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809613/hamburguesa-carretillera_gqofj1.webp', 1),
('17f00023-66bd-11ee-98c2-e0d55e271135', 'Hamburguesa Cheese', 18.90, 3, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809613/hamburguesa-cheese_p3i5wl.webp', 1),
('1ed89e88-66c2-11ee-98c2-e0d55e271135', 'Pizza Lomo', 44.00, 4, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809740/pizza-lomo_qpdzgn.webp', 2),
('1ed8b58e-66c2-11ee-98c2-e0d55e271135', 'Pizza Maíz', 37.00, 3, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809741/pizza-maiz_nmcdgt.webp', 2),
('28b4201c-66ca-11ee-98c2-e0d55e271135', 'Inca Kola Sin Azúcar 500ml', 6.90, 2, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809805/inca-kola-sin-azucar_owq7a8.webp', 3),
('28b43218-66ca-11ee-98c2-e0d55e271135', 'San Luis Sin Gas 750ml', 6.90, 7, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809806/san-luis-sin-gas_hkvgzq.webp', 3),
('3811c693-66be-11ee-98c2-e0d55e271135', 'Hamburguesa Clásica', 16.90, 4, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809614/hamburguesa-clasica_stzcgw.webp', 1),
('3811d405-66be-11ee-98c2-e0d55e271135', 'Hamburguesa Extrema', 25.90, 5, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809615/hamburguesa-extrema_ij05x2.webp', 1),
('3de73b0c-66ca-11ee-98c2-e0d55e271135', 'Sprite 500ml', 6.90, 3, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809806/sprite_kmfyq6.webp', 3),
('4387dbef-66c2-11ee-98c2-e0d55e271135', 'Pizza Margarita', 29.00, 2, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809741/pizza-margarita_yzv1hm.webp', 2),
('4387ec21-66c2-11ee-98c2-e0d55e271135', 'Pizza Pepperoni', 29.00, 9, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809742/pizza-pepperoni_ntfh2m.webp', 2),
('4c2202ff-66c3-11ee-98c2-e0d55e271135', 'Coca Cola 500ml', 6.90, 4, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809807/coca-cola-original_btccxl.webp', 3),
('4c22135c-66c3-11ee-98c2-e0d55e271135', 'Coca Cola Sin Azúcar 500ml', 6.90, 0, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809807/coca-cola-sin-azucar_ffsowr.webp', 3),
('815c035f-66c2-11ee-98c2-e0d55e271135', 'Pizza Sabor Italiano', 42.00, 7, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809742/popolo_yhzm30.webp', 2),
('815c165c-66c2-11ee-98c2-e0d55e271135', 'Pizza Suprema', 37.00, 5, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809742/suprema_it2p8c.webp', 2),
('8b5923de-66be-11ee-98c2-e0d55e271135', 'Hamburguesa Parrillera', 23.90, 0, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809615/hamburguesa-parrillera_l7fxnv.webp', 1),
('8b5930d5-66be-11ee-98c2-e0d55e271135', 'Hamburguesa La Delicia Mixta', 20.90, 2, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809615/hamburguesa-queabuso_ljiep4.webp', 1),
('9a1d6029-66bf-11ee-98c2-e0d55e271135', 'Pizza Americana', 30.00, 2, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809737/pizza-amricana_n5wesv.webp', 2),
('9a1d72fb-66bf-11ee-98c2-e0d55e271135', 'Pizza Artichoke', 37.00, 8, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809737/pizza-artichoke_yzu3rk.webp', 2),
('a1a23a7a-66ba-11ee-98c2-e0d55e271135', 'Hamburguesa Alemana', 20.90, 4, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809611/hamburguesa-alemana_kzmzmo.webp', 1),
('aa6cde9c-66bc-11ee-98c2-e0d55e271135', 'Hamburguesa Broaster Queso y Tocino', 15.90, 4, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809612/hamburguesa-broster-queso-tocino_qch3nn.webp', 1),
('aa6cec7a-66bc-11ee-98c2-e0d55e271135', 'Hamburguesa Broaster Tártara', 14.90, 3, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809612/hamburguesa-broster-tartara_hbrwxu.webp', 1),
('ab84bdbb-66c1-11ee-98c2-e0d55e271135', 'Pizza Capresse', 30.00, 1, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809739/pizza-capresse_kivkop.webp', 2),
('ab84c9d9-66c1-11ee-98c2-e0d55e271135', 'Pizza Caprina', 37.00, 2, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809739/pizza-caprina_msuqx7.webp', 2),
('ae9886c7-66cc-11ee-98c2-e0d55e271135', 'Helado Supremo Oreo', 8.90, 9, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809815/KING_FUSION_OREO_V7_ls74zp.png', 4),
('ae9896e4-66cc-11ee-98c2-e0d55e271135', 'Pie De Manzana', 5.90, 4, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809815/PIE_DE_MANZANA_V1_mgsp5d.png', 4),
('dbba347b-66be-11ee-98c2-e0d55e271135', 'Hamburguesa Queso y Tocino', 19.90, 1, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809616/hamburguesa-queso-tocino_ldbtrn.webp', 1),
('dbba434b-66be-11ee-98c2-e0d55e271135', 'Hamburguesa Royal', 19.90, 3, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809613/hamburguesa-royal_wyg31g.webp', 1),
('e4aa0e07-66c1-11ee-98c2-e0d55e271135', 'Pizza Cuatro Estaciones', 30.00, 0, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809739/pizza-cuatro-estaciones_xauyzs.webp', 2),
('e4aa1a73-66c1-11ee-98c2-e0d55e271135', 'Pizza Hawaiana', 29.00, 1, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809740/pizza-hawaiana_lihch4.webp', 2),
('ea08c8f1-29f4-4e96-81a0-b998bc7497be', 'Hamburguesa Broaster Clásica', 12.90, 3, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809612/hamburguesa-broster-clasica-regular_zbhipk.webp', 1),
('eb51eb03-66c2-11ee-98c2-e0d55e271135', 'Pizza Al Limón', 37.00, 0, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809743/tribeca_jqnien.webp', 2),
('eb51fa39-66c2-11ee-98c2-e0d55e271135', 'Pizza Mediterránea de Zucchini y Feta', 37.00, 2, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809744/zucchini_ck66dc.webp', 2),
('ed7e1ff4-66bf-11ee-98c2-e0d55e271135', 'Pizza Burger', 37.00, 7, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809738/pizza-burguer_tskgtp.webp', 2),
('ed7e34e2-66bf-11ee-98c2-e0d55e271135', 'Pizza Calabresa', 40.00, 2, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809738/pizza-calabresa_ilyvw9.webp', 2),
('eed4ffe1-66c9-11ee-98c2-e0d55e271135', 'Fanta 500ml', 6.90, 0, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809804/fanta_ugfter.webp', 3),
('eed5145e-66c9-11ee-98c2-e0d55e271135', 'Inca Kola 500ml', 6.90, 6, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809805/inca-kola-original_cz3pzk.webp', 3),
('f67a1a73-66cc-11ee-98c2-e0d55e271135', 'Milkshake Oreo De Chocolate', 13.00, 6, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809816/SHAKE_OREO_CHOCOLATE_V6_oqhqsa.png', 4),
('f67a2742-66cc-11ee-98c2-e0d55e271135', 'Milkshake Oreo De Fresa', 13.00, 6, 'https://res.cloudinary.com/djnds34i8/image/upload/v1696809816/SHAKE_OREO_FRESA_V6_1_pwxxgj.png', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `suggestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `dni` varchar(8) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `genre` varchar(9) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `phone` varchar(9) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`dni`, `name`, `lastname`, `genre`, `email`, `password`, `phone`, `role`) VALUES
('12345678', 'Joseph', 'Apumayta Chero', 'Masculino', 'admin@gmail.com', 'aa8b302e6bb464ea55491ab4d1ef4ae879a46df61ebe465fb46019400ef90a43', '987654321', 'Admin'),
('22345678', 'Erika', 'Tocra Vega', 'Femenino', 'erika@gmail.com', '53fb9f1d00903c25dfa91f463355b47f0712ce52fcb3853f8b9ef295e824f8ce', '987544321', 'Client'),
('74610635', 'Joseph', 'Apumayta Chero', 'Masculino', 'josephchero.jc@gmail.com', '53fb9f1d00903c25dfa91f463355b47f0712ce52fcb3853f8b9ef295e824f8ce', '987654231', 'Client'),
('87654321', 'David', 'Juipa Natividad', 'Masculino', 'David@gmail.com', '53fb9f1d00903c25dfa91f463355b47f0712ce52fcb3853f8b9ef295e824f8ce', '987654321', 'Client');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indices de la tabla `frequent_questions`
--
ALTER TABLE `frequent_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_dni` (`user_dni`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indices de la tabla `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `frequent_questions`
--
ALTER TABLE `frequent_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_dni`) REFERENCES `users` (`dni`);

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
