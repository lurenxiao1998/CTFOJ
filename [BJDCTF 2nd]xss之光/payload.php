<?php
$a = serialize(new Exception("<script>document.cookie</script>"));
echo urlencode($a);
echo urldecode("flag%7B920eb542-451b-44b2-ae16-ffe158e5c38b%7D%0A");