/*
Navicat MySQL Data Transfer

Source Server         : global_system
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ona_graf

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-23 16:59:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for autorizacion
-- ----------------------------
DROP TABLE IF EXISTS `autorizacion`;
CREATE TABLE `autorizacion` (
  `id_autorizacion` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil_fk` int(11) NOT NULL,
  `id_modulo_fk` int(11) NOT NULL,
  `acceso` tinyint(10) NOT NULL,
  PRIMARY KEY (`id_autorizacion`),
  KEY `id_perfil_fk` (`id_perfil_fk`),
  KEY `id_modulo_fk` (`id_modulo_fk`),
  CONSTRAINT `autorizacion_ibfk_1` FOREIGN KEY (`id_perfil_fk`) REFERENCES `perfil` (`id_perfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `autorizacion_ibfk_2` FOREIGN KEY (`id_modulo_fk`) REFERENCES `modulo` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of autorizacion
-- ----------------------------
INSERT INTO `autorizacion` VALUES ('1', '1', '1', '1');
INSERT INTO `autorizacion` VALUES ('2', '1', '2', '1');
INSERT INTO `autorizacion` VALUES ('3', '1', '3', '1');
INSERT INTO `autorizacion` VALUES ('4', '1', '4', '1');
INSERT INTO `autorizacion` VALUES ('5', '1', '5', '1');
INSERT INTO `autorizacion` VALUES ('6', '1', '6', '1');
INSERT INTO `autorizacion` VALUES ('7', '1', '7', '1');
INSERT INTO `autorizacion` VALUES ('9', '1', '9', '1');
INSERT INTO `autorizacion` VALUES ('10', '1', '10', '1');
INSERT INTO `autorizacion` VALUES ('11', '1', '11', '1');
INSERT INTO `autorizacion` VALUES ('13', '1', '13', '1');
INSERT INTO `autorizacion` VALUES ('14', '1', '14', '1');
INSERT INTO `autorizacion` VALUES ('15', '1', '15', '1');
INSERT INTO `autorizacion` VALUES ('16', '1', '16', '1');
INSERT INTO `autorizacion` VALUES ('17', '1', '17', '1');
INSERT INTO `autorizacion` VALUES ('18', '1', '18', '1');

-- ----------------------------
-- Table structure for cliente
-- ----------------------------
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `nombre_cliente` varchar(20) NOT NULL,
  `apellido_cliente` varchar(20) DEFAULT NULL,
  `doc_cliente` varchar(11) NOT NULL,
  `pre_doc_cliente` varchar(5) NOT NULL,
  `telf_cliente` varchar(11) DEFAULT NULL,
  `otro_telf_cliente` varchar(11) DEFAULT NULL,
  `email_cliente` varchar(50) DEFAULT NULL,
  `tipo_cliente` varchar(10) DEFAULT NULL,
  `rason_social_cliente` varchar(50) DEFAULT NULL,
  `direccion_cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('juan', 'llerena', '20914731', 'V', '04143830695', '02128626341', 'rpaniagua@gmail.com', 'normal', 'robertsoft', 'la pastora');
INSERT INTO `cliente` VALUES ('carlos', 'rojas', '25889784', 'V', '04143830695', '02128626341', 'crojas@gmail.com', '123', '', 'nueva direccion');
INSERT INTO `cliente` VALUES ('Daniel', 'Nolasco', '2288968', 'V', '04143830695', '', 'dnolasco@gmail.com', 'fijo', '', 'la hoyada');
INSERT INTO `cliente` VALUES ('luis', 'perez|', '123456', 'V', '02128626341', '', 'lperez@gmail.com', 'fijo', 'lperezventas', 'av baralt');

-- ----------------------------
-- Table structure for material
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_material` varchar(50) DEFAULT NULL,
  `medidas` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of material
-- ----------------------------

-- ----------------------------
-- Table structure for modulo
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `id_modulo` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo_fk` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL,
  `activo` tinyint(10) NOT NULL,
  `id_order_modulo` int(10) DEFAULT NULL,
  `id_order_sub` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_modulo`,`id_modulo_fk`),
  KEY `id_modulo` (`id_modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', '0', 'operaciones', '1', '2', null);
INSERT INTO `modulo` VALUES ('2', '0', 'clientes', '1', '4', null);
INSERT INTO `modulo` VALUES ('3', '0', 'proveedores', '1', '1', null);
INSERT INTO `modulo` VALUES ('4', '0', 'productos', '1', '3', null);
INSERT INTO `modulo` VALUES ('5', '1', 'produccion', '1', '0', null);
INSERT INTO `modulo` VALUES ('6', '1', 'ventas', '1', '0', '6');
INSERT INTO `modulo` VALUES ('7', '1', 'stock_MP', '1', '0', '1');
INSERT INTO `modulo` VALUES ('9', '4', 'listos', '1', '0', null);
INSERT INTO `modulo` VALUES ('10', '2', 'modificar', '1', '0', null);
INSERT INTO `modulo` VALUES ('11', '3', 'pagos_proveedores', '1', '0', null);
INSERT INTO `modulo` VALUES ('13', '12', 'nuevo', '1', '0', null);
INSERT INTO `modulo` VALUES ('14', '12', 'historial', '1', '0', null);
INSERT INTO `modulo` VALUES ('15', '2', 'registro', '1', '0', null);
INSERT INTO `modulo` VALUES ('16', '2', 'consulta', '1', '0', null);
INSERT INTO `modulo` VALUES ('17', '1', 'stock_Fisico', '1', '0', '2');
INSERT INTO `modulo` VALUES ('18', '1', 'stock_Disponible', '1', '0', '3');
INSERT INTO `modulo` VALUES ('19', '3', 'registro_proveedores', '1', '0', null);
INSERT INTO `modulo` VALUES ('20', '3', 'modificar_proveedores', '1', '0', null);
INSERT INTO `modulo` VALUES ('21', '3', 'consulta_proveedores', '1', '0', null);

-- ----------------------------
-- Table structure for perfil
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(30) NOT NULL,
  `status` tinyint(20) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES ('1', 'administrador', '1');
INSERT INTO `perfil` VALUES ('2', 'usuario', '1');

-- ----------------------------
-- Table structure for pieza
-- ----------------------------
DROP TABLE IF EXISTS `pieza`;
CREATE TABLE `pieza` (
  `id_pieza` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_pieza` varchar(50) NOT NULL,
  `fabricante` varchar(50) DEFAULT NULL,
  `precio_pieza` varchar(15) DEFAULT NULL,
  `numero_pieza` varchar(10) DEFAULT NULL,
  `descripcion_pieza` varchar(150) DEFAULT NULL,
  `fec_produccion` date DEFAULT NULL,
  PRIMARY KEY (`id_pieza`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of pieza
-- ----------------------------
INSERT INTO `pieza` VALUES ('5', 'Retrovisor', 'toyota', '150000', 'ret322', 'retrovisor', '2017-11-07');
INSERT INTO `pieza` VALUES ('6', 'Parachoques', 'toyota', '350000', 'pc3322', 'para choques delantero ', '2017-11-07');
INSERT INTO `pieza` VALUES ('7', 'Capo', 'toyota', '450000', 'c2333', '', '2017-10-30');
INSERT INTO `pieza` VALUES ('8', 'Techo', 'toyota', '1500000', 't1125', '', '2017-10-31');
INSERT INTO `pieza` VALUES ('16', 'Retrovisor', 'toyota', '123302', 'ret213', 'retrovisor clÃ¡sico', '2017-10-10');
INSERT INTO `pieza` VALUES ('17', 'Retrovisor', 'toyota', '25000', 'ret214', 'retrovisor ', '2017-10-12');
INSERT INTO `pieza` VALUES ('18', 'Retrovisor', 'toyota', '25000', 'ret21465', 'retrovisor ', '2017-10-24');
INSERT INTO `pieza` VALUES ('19', 'Retrovisor', 'toyota', '50000', 'ret21433', 'retrovisor ', '2017-10-20');
INSERT INTO `pieza` VALUES ('20', 'Retrovisor', 'toyota', '350000', 'ret21433', 'retrovisor ', '2017-10-19');
INSERT INTO `pieza` VALUES ('21', 'Retrovisor', 'toyota', '350000', 'ret21433', 'retrovisor ', '2017-10-25');
INSERT INTO `pieza` VALUES ('22', 'Retrovisor', 'toyota', '350000', 'ret21433', 'retrovisor ', '2017-11-08');
INSERT INTO `pieza` VALUES ('23', 'Retrovisor', 'toyota', '350000', 'ret21432', 'retrovisor ', '2017-11-09');
INSERT INTO `pieza` VALUES ('24', 'Retrovisor', 'toyota', '350000', 'ret21435', 'retrovisor ', '2017-11-10');
INSERT INTO `pieza` VALUES ('25', 'Capo', 'toyota', '450000', 'c23333', '', '2017-09-20');
INSERT INTO `pieza` VALUES ('26', 'Capo', 'toyota', '450000', 'c23342', '', '2017-10-09');
INSERT INTO `pieza` VALUES ('27', 'Capo', 'toyota', '450000', 'c23123', '', '2017-09-27');
INSERT INTO `pieza` VALUES ('28', 'Capo', 'toyota', '450000', 'c23353', '', '2017-10-12');
INSERT INTO `pieza` VALUES ('29', 'Parachoques', 'toyota', '1400000', 'pch1233', 'parachoques 1', '2017-10-09');
INSERT INTO `pieza` VALUES ('30', 'Parachoques', 'toyota', '1400000', 'pch1233', 'parachoques 1', '2017-10-04');
INSERT INTO `pieza` VALUES ('31', 'Parachoques', 'toyota', '1400000', 'pch1233', 'parachoques 1', '2017-11-06');
INSERT INTO `pieza` VALUES ('32', 'Parachoques', 'toyota', '1400000', 'pch1233', 'parachoques 1', '2017-11-14');
INSERT INTO `pieza` VALUES ('33', 'Parachoques', 'toyota', '1400000', 'pch123311', 'parachoques 1', '2017-10-16');
INSERT INTO `pieza` VALUES ('34', 'Parachoques', 'toyota', '1400000', 'pch123311', 'parachoques 123456', '2017-10-25');
INSERT INTO `pieza` VALUES ('35', 'Parachoques', 'toyota', '1400000', 'pch123311', 'parachoques 123456', '2017-09-26');
INSERT INTO `pieza` VALUES ('36', 'Parachoques', 'toyota', '1400000', 'pch123311', 'parachoques 123456', '2017-11-05');
INSERT INTO `pieza` VALUES ('37', 'Techo', 'toyota', '500000', 't1233', 'techo verde', '2017-11-14');
INSERT INTO `pieza` VALUES ('38', 'Capo', 'toyota', '1500000', 'ca1022', '', '2017-11-10');
INSERT INTO `pieza` VALUES ('39', 'Techo', 'toyota', '500000', 'te422', '', '2017-11-09');
INSERT INTO `pieza` VALUES ('42', 'Retrovisor', 'toyota', '1340000', '1223', '', '2017-09-19');
INSERT INTO `pieza` VALUES ('43', 'Retrovisor', 'toyota', '1340000', '1223', '', '2017-09-19');
INSERT INTO `pieza` VALUES ('44', 'Retrovisor', 'toyota', '1340000', '1223', '', '2017-09-19');
INSERT INTO `pieza` VALUES ('53', 'Parachoques', 'toyota', '400000', '1233', '12121', '0000-00-00');
INSERT INTO `pieza` VALUES ('54', 'Retrovisor', 'toyota', '350000', 'hu123', '', '2017-10-11');
INSERT INTO `pieza` VALUES ('58', 'Parachoques', 'toyota', '350000', 'hu123', '', '2017-10-11');
INSERT INTO `pieza` VALUES ('59', 'Parachoques', 'toyota', '350000', 'hu123', '', '2017-10-11');
INSERT INTO `pieza` VALUES ('60', 'Parachoques', 'toyota', '350000', 'hu123', '', '2017-10-11');
INSERT INTO `pieza` VALUES ('63', 'Retrovisor', 'toyota', '2500000', 'de123', '', '2017-12-20');
INSERT INTO `pieza` VALUES ('64', 'Retrovisor', 'toyota', '15000', '122', '', '2017-12-08');
INSERT INTO `pieza` VALUES ('65', 'Retrovisor', 'toyota', '', '123', '', '2017-12-06');
INSERT INTO `pieza` VALUES ('66', 'Retrovisor', 'toyota', '180000', 'retro3222', '', '2017-10-18');

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_proveedor` varchar(50) DEFAULT NULL,
  `apellido_proveedor` varchar(50) DEFAULT NULL,
  `pref_doc_proveedor` varchar(5) DEFAULT NULL,
  `doc_proveedor` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `razon_social_proveedor` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telf_proveedor` varchar(11) DEFAULT NULL,
  `otro_telf_proveedor` varchar(11) DEFAULT NULL,
  `tipo_proveedor` varchar(50) DEFAULT NULL,
  `tipo_actividad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proveedor
-- ----------------------------

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `id_material_fk` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock
-- ----------------------------

-- ----------------------------
-- Table structure for usuario
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` tinyint(20) NOT NULL,
  `id_perfil_fk` int(20) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `FK_id_perfil` (`id_perfil_fk`),
  CONSTRAINT `FK_id_perfil` FOREIGN KEY (`id_perfil_fk`) REFERENCES `perfil` (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('2', 'dnolasco', 'daniel', 'nolasco', 'dnolasco@gmail.com', '123', '1', '1');
INSERT INTO `usuario` VALUES ('3', 'rpaniagua', 'robert', 'paniagua', 'rpaniagua@gmail.com', '1234', '1', '2');
