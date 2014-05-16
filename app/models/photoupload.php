<?php

/**
 * CREATE TABLE `beatrice4`.`marketproducts` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL,
  `vendor_id` INT NULL,
  `season_id` INT NULL,
  `tags` TEXT NULL,
  PRIMARY KEY (`id`));

 * @author ivan
 *
 */
class Photoupload extends ActiveRecord {
	
	const UPLOAD_DIR = 'uploads/';

	public function destroy()
	{
		$filename = self::UPLOAD_DIR . $this->name;
		unlink($filename);
	
		return parent::destroy();
	}

}
