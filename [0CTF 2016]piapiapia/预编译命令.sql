SET @tn = 'hahaha';/*#存储表名 */  
SET @sql = concat('select * from ', @tn);/*#存储SQL语句 */    
PREPARE name from @sql;   #预定义SQL语句
EXECUTE name;  #执行预定义SQL语句
(DEALLOCATE || DROP) PREPARE sqla;  #删除预定义SQL语句