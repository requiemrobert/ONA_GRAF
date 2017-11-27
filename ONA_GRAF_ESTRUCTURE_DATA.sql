/*
Navicat MySQL Data Transfer

Source Server         : MULTI_ONA_GRAF
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : ona_graf

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-27 14:45:39
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
INSERT INTO `autorizacion` VALUES ('10', '1', '10', '0');
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
  `direccion_cliente` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cliente
-- ----------------------------
INSERT INTO `cliente` VALUES ('juan', 'llerena', '20914731', 'V', '04143830695', '02128626341', 'rpaniagua@gmail.com', 'normal', 'robertsoft', 'la pastora');
INSERT INTO `cliente` VALUES ('Daniel', 'Nolasco', '2288968', 'V', '04143830695', '', 'dnolasco@gmail.com', 'fijo', '', 'la hoyada');
INSERT INTO `cliente` VALUES ('luis', 'perez|', '123456', 'V', '02128626341', '', 'lperez@gmail.com', 'fijo', 'lperezventas', 'av baralt');
INSERT INTO `cliente` VALUES ('robert', 'perez', '20915744', 'V', '02128626344', '', 'rperez@gmail.com', 'almayor', 'robert ', 'la pastora');

-- ----------------------------
-- Table structure for material
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `id_material` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_material` varchar(50) NOT NULL,
  `descripcion_material` varchar(50) DEFAULT NULL,
  `cantidad_disponible` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of material
-- ----------------------------
INSERT INTO `material` VALUES ('1', 'rollo', 'Rollo de semi cuero', '87');
INSERT INTO `material` VALUES ('2', 'carton', 'Cartón calibre de un kilo ', '54');
INSERT INTO `material` VALUES ('3', 'goma', 'Goma espuma ', '15');
INSERT INTO `material` VALUES ('4', 'resma', 'Resma de papel', '23');

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
INSERT INTO `modulo` VALUES ('4', '0', 'productos', '0', '3', null);
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
-- Table structure for orden_produccion
-- ----------------------------
DROP TABLE IF EXISTS `orden_produccion`;
CREATE TABLE `orden_produccion` (
  `cod_orden` int(10) NOT NULL AUTO_INCREMENT,
  `producto` varchar(20) DEFAULT NULL,
  `cantidad_producto` int(10) DEFAULT NULL,
  `fecha_orden` date DEFAULT NULL,
  PRIMARY KEY (`cod_orden`)
) ENGINE=InnoDB AUTO_INCREMENT=1306 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orden_produccion
-- ----------------------------
INSERT INTO `orden_produccion` VALUES ('1303', 'ejecutiva', '405', '2017-11-25');
INSERT INTO `orden_produccion` VALUES ('1304', 'gerencial', '20', '2017-11-25');
INSERT INTO `orden_produccion` VALUES ('1305', 'perpetua', '270', '2017-11-25');

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
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) DEFAULT NULL,
  `costo` decimal(10,0) DEFAULT NULL,
  `precio_venta` decimal(10,0) DEFAULT NULL,
  `stock_disponible` int(10) DEFAULT NULL,
  `stock_fisico` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of productos
-- ----------------------------

-- ----------------------------
-- Table structure for proveedor
-- ----------------------------
DROP TABLE IF EXISTS `proveedor`;
CREATE TABLE `proveedor` (
  `cod_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social_proveedor` varchar(50) DEFAULT NULL,
  `nombre_contacto` varchar(50) DEFAULT NULL,
  `pre_rif` varchar(5) DEFAULT NULL,
  `rif` varchar(11) DEFAULT NULL,
  `telf` varchar(11) DEFAULT NULL,
  `otro_telf` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `tipo_proveedor` varchar(50) DEFAULT NULL,
  `tipo_actividad` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of proveedor
-- ----------------------------
INSERT INTO `proveedor` VALUES ('1', 'inversiones papel y mas', 'juan garcia', 'J', '00387874', '02128574877', '02128574877', 'papelymas@gmail.com', 'la pastora', 'fijo', '3');
INSERT INTO `proveedor` VALUES ('2', 'carton y papel san martin', 'maria', 'J', '00387744', '02128574873', '02128574876', 'cartonpapelsanmartin@gmail.com', 'san martin', 'fijo', '3');
INSERT INTO `proveedor` VALUES ('3', 'Distribuidora Ofipaca', 'carla', 'J', '03866520', '02128626341', '', 'ofipaca@gmail.com', 'Esq. Tracabordo, Edificio Guanare, Local 84, La Candelaria', 'mayorista', '3');

-- ----------------------------
-- Table structure for stock
-- ----------------------------
DROP TABLE IF EXISTS `stock`;
CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL AUTO_INCREMENT,
  `cod_proveedor_fk` int(10) DEFAULT NULL,
  `id_material_fk` int(11) NOT NULL,
  `tipo_material` varchar(50) DEFAULT NULL,
  `cantidad_material` decimal(50,0) NOT NULL,
  `unidades` int(50) NOT NULL,
  `precio` int(11) DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `producto` varchar(50) DEFAULT NULL,
  `fecha_proceso` date DEFAULT NULL,
  `tiempo_proceso` int(10) DEFAULT NULL,
  `status_material` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_stock`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stock
-- ----------------------------
INSERT INTO `stock` VALUES ('3', null, '0', 'carton', '100', '4', '150000', '2017-11-15', 'prueba 001', null, null, null, null);
INSERT INTO `stock` VALUES ('4', null, '0', 'rollo', '100', '3', '1580000', '2017-11-20', '', null, null, null, null);
INSERT INTO `stock` VALUES ('5', '1', '0', 'carton', '100', '2', '350000', '2017-11-25', '', null, null, null, null);
INSERT INTO `stock` VALUES ('6', '1', '0', 'rollo', '50', '4', '150000', '2017-11-25', '', null, null, null, null);
INSERT INTO `stock` VALUES ('8', '1', '0', 'carton', '100', '3', '0', '2017-11-25', '', null, null, null, null);
INSERT INTO `stock` VALUES ('9', '1', '0', 'rollo', '70', '4', '0', '2017-11-25', '', null, null, null, null);
INSERT INTO `stock` VALUES ('11', '0', '0', 'rollo', '100', '1', '0', '2017-11-25', '', null, null, null, null);

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
