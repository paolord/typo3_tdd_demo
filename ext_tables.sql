#
# Table structure for table 'tx_tdddemo_domain_model_user'
#
CREATE TABLE tx_tdddemo_domain_model_users (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	        
	username varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_tdddemo_domain_model_post'
#
CREATE TABLE tx_tdddemo_domain_model_post (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	        
	content varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);

#
# Table structure for table 'tx_tdddemo_domain_model_postrating'
#
CREATE TABLE tx_tdddemo_domain_model_postrating (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,
	        
	post_id int(11) DEFAULT '0' NOT NULL,
	user_id int(11) DEFAULT '0' NOT NULL,
	like int(11) DEFAULT '0' NOT NULL,
	dislike int(11) DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid)
);