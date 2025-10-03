SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `automoveis` (
  `codigo` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `chassi` varchar(50) NOT NULL,
  `montadora` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `automoveis` (`codigo`, `nome`, `placa`, `chassi`, `montadora`) VALUES
(1, 'golf', 'GEW2218', '84719324878743', 1),
(2, 'prisma', 'klp0400', '93847237424', 4);


CREATE TABLE `montadoras` (
  `codigo` int NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


INSERT INTO `montadoras` (`codigo`, `nome`) VALUES
(1, 'Volkswagen'),
(2, 'Ford'),
(3, 'Fiat'),
(4, 'Chevrolet');


ALTER TABLE `automoveis`
  ADD PRIMARY KEY (`codigo`);


ALTER TABLE `automoveis`
  MODIFY `codigo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

