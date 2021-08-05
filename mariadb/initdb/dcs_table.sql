CREATE TABLE dcs_entrepreneur_reject (
  enr_id int(10) NOT NULL primary key AUTO_INCREMENT,
  enr_admin_reason varchar(100) COLLATE utf8_unicode_ci,
  enr_ent_id int(10),
  enr_adm_id int(10),
   FOREIGN KEY (enr_ent_id) REFERENCES dcs_entrepreneur(ent_id),
   FOREIGN KEY (enr_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_tourist_image (
  tus_img_path varchar(100) NOT NULL,
  tus_img_tus_id int(10),
  FOREIGN KEY (tus_img_tus_id) REFERENCES dcs_tourist(tus_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_reward (
  rew_id int(10) NOT NULL primary key AUTO_INCREMENT,
  rew_name  varchar(100),
  rew_request int(10),
  rew_img_path varchar(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_reward_tourist (
  ret_id int(10) NOT NULL primary key AUTO_INCREMENT,
  ret_rew_id  int(10),
  ret_tus_id int(10),
  FOREIGN KEY (ret_rew_id) REFERENCES dcs_reward(rew_id),
  FOREIGN KEY (ret_tus_id) REFERENCES dcs_tourist(tus_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_eve_category (
  eve_cat_id int(10) NOT NULL primary key AUTO_INCREMENT,
  eve_cat_name varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_event (
  eve_id int(10) NOT NULL primary key AUTO_INCREMENT,
  eve_name varchar(100),
  eve_point int(10),
  eve_num_visitor int(10),
  eve_description varchar (255),
  eve_com_id int(10),
  eve_cat_id int(10),
  eve_status int(10),
  FOREIGN KEY (eve_com_id) REFERENCES dcs_company(com_id),
  FOREIGN KEY (eve_cat_id) REFERENCES dcs_eve_category(eve_cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE dcs_checkin (
  che_id int(10) NOT NULL primary key AUTO_INCREMENT,
  che_tus_id  int(10),
  che_eve_id int(10),
  che_status int(1),
  che_date_time_in TIMESTAMP,
  che_date_time_out TIMESTAMP,
  FOREIGN KEY (che_tus_id) REFERENCES dcs_tourist(tus_id),
  FOREIGN KEY (che_eve_id) REFERENCES dcs_event(eve_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE dcs_eve_image (
  eve_img_path varchar(100),
  eve_img_eve_id int(10),
  FOREIGN KEY (eve_img_eve_id) REFERENCES dcs_event(eve_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_com_image (
  com_img_path varchar(100),
  com_img_com_id int(10),
  FOREIGN KEY (com_img_com_id) REFERENCES dcs_company(com_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE dcs_pro_category (
  pro_cat_id int(10) NOT NULL primary key AUTO_INCREMENT,
  pro_cat_name varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_promotions (
  pro_id int(10) NOT NULL primary key AUTO_INCREMENT,
  pro_name varchar(100),
  pro_point int(10),
  pro_description varchar (255),
  pro_com_id int(10),
  pro_cat_id int(10),
  pro_status int(10),
  pro_img_path varchar(100),
  FOREIGN KEY (pro_com_id) REFERENCES dcs_company(com_id),
  FOREIGN KEY (pro_cat_id) REFERENCES dcs_pro_category(pro_cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE dcs_tou_promotion (
  tou_id int(10) NOT NULL primary key AUTO_INCREMENT,
  tou_pro_id int(10),
  tou_tus_id int(10),
  tou_pro_status int(10),
  FOREIGN KEY (tou_tus_id) REFERENCES dcs_tourist(tus_id),
  FOREIGN KEY (tou_pro_id) REFERENCES dcs_promotions(pro_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



