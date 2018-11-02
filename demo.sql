

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE TABLE IF NOT EXISTS `odersdetail` (
  `productid` int(11) NOT NULL,
  `ordersid` int(11) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `odersdetail` (`productid`, `ordersid`, `price`, `quantity`) VALUES
(1, 37, 100, 3),
(2, 36, 200, 1),
(3, 39, 300, 4),
(4, 40, 400, 4);

-- --------------------------------------------------------

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(100) NOT NULL,
  `datecreation` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;


INSERT INTO `orders` (`id`, `name`, `datecreation`, `status`, `username`) VALUES
(16, 'New Order', '2016-03-03', 0, 'acc2'),
(17, 'New Order', '2016-03-03', 0, 'acc2'),
(18, 'New Order', '2016-03-03', 0, 'acc2'),
(19, 'New Order', '2016-03-03', 0, 'acc2'),
(20, 'New Order', '2016-03-03', 0, 'acc2'),
(21, 'New Order', '2016-03-03', 0, 'acc2'),
(22, 'New Order', '2016-03-03', 0, 'acc2'),
(23, 'New Order', '2016-03-03', 0, 'acc2'),
(24, 'New Order', '2016-03-03', 0, 'acc2'),
(25, 'New Order', '2016-03-03', 0, 'acc2'),
(26, 'New Order', '2016-03-03', 0, 'acc2'),
(27, 'New Order', '2016-03-03', 0, 'acc2'),
(28, 'New Order', '2016-03-03', 0, 'acc2'),
(29, 'New Order', '2016-03-03', 0, 'acc2'),
(30, 'New Order', '2016-03-03', 0, 'acc2'),
(31, 'New Order', '2016-03-03', 0, 'acc2'),
(32, 'New Order', '2016-03-03', 0, 'acc2'),
(33, 'New Order', '2016-03-03', 0, 'acc2'),
(34, 'New Order', '2016-03-03', 0, 'acc2'),
(35, 'New Order', '2016-03-03', 0, 'acc2'),
(36, 'New Order', '2016-03-03', 0, 'acc2'),
(37, 'New Order', '2016-03-03', 0, 'acc2'),
(38, 'New Order', '2016-03-03', 0, 'acc2'),
(39, 'New Order', '2016-03-03', 0, 'acc2'),
(40, 'New Order', '2016-03-03', 0, 'acc2');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;


INSERT INTO `product` (`id`, `name`, `price`, `quantity`, `description`) VALUES
(1, 'Sony1', 100, 2, 'good'),
(2, 'Apple1', 200, 3, 'good'),
(3, 'Samsung1', 300, 4, 'good'),
(4, 'Apple2', 400, 5, 'good');


ALTER TABLE `odersdetail`
  ADD PRIMARY KEY (`productid`);

ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;

ALTER TABLE `product`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
