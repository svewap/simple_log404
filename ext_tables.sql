CREATE TABLE tx_simplelog404_domain_model_logentry (
	requesturl text NOT NULL DEFAULT '',
	statuscode int(11) NOT NULL DEFAULT '0',
	message varchar(255) NOT NULL DEFAULT '',
	lasthit int(11) NOT NULL DEFAULT '0',
	hitcount int(11) NOT NULL DEFAULT '0'
);
