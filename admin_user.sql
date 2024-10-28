CREATE TABLE `admin_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `emp_id` varchar(100) NOT NULL,
  `menus` varchar(100) NOT NULL,
  `currentdate` datetime NOT NULL,
  `auth_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_admin_user_1` (`emp_id`);

ALTER TABLE `admin_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
