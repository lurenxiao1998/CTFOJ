

```php
return preg_match("/set|prepare|alter|rename|select|update|delete|drop|insert|where|\./i",$inject);
```

`1' or '1'='1`显示

```php
array(2) {
  [0]=>
  string(1) "1"
  [1]=>
  string(7) "hahahah"
}
array(2) {
  [0]=>
  string(1) "2"
  [1]=>
  string(12) "miaomiaomiao"
}
array(2) {
  [0]=>
  string(6) "114514"
  [1]=>
  string(2) "ys"
}
```