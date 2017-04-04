-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u947010523_curso
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `alunos`
--

DROP TABLE IF EXISTS `alunos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alunos` (
  `id_` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `curso` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alunos`
--

/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` VALUES (1,'Fernando Camilo',1234567,'Técnico em Redes de Computadores'),(2,'Duda Camilo',654321,'Técnico em Informática'),(3,'José',12,'Técnico em Informática'),(4,'Phelipe',987654321,'Técnico em Informática'),(5,'Maria Clara',7894567,'Técnico em Informática'),(6,'Willy',654321,'Técnico em Redes de Computadores'),(7,'Joao',789456,'Técnico em Informática'),(8,'Felipe Fernandes',987654,'Técnico em Informática'),(9,'Maria Eduarda',897654,'Técnico em Informática'),(10,'Celso',987654,'Técnico em Informática'),(11,'Ana',789654123,'Técnico em Informática'),(12,'Kelvin Soares',321654987,'Técnico em Redes de Computadores'),(13,'Lucas',987654321,'Técnico em Informática'),(17,'Marcos',123456,'Técnico em Informática'),(19,'Marcos',123456,'Técnico em Informática'),(20,'Willy',123456,'TÃ©cnico em InformÃ¡tica');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `tipo` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Fernando Camilo','fernandocamilo','123456','admin'),(11,'Admin','admin','123','admin'),(10,'Edicao','user_edi','123','edi'),(8,'Cadastro','user_cad','123','cad'),(9,'Consulta','user_con','123','con'),(12,'Camilo Fernando','camilofernando','321','admin');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

--
-- Dumping events for database 'u947010523_curso'
--

--
-- Dumping routines for database 'u947010523_curso'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-31 18:34:13
