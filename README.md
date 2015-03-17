Not ready yet

require __DIR__ . '/../vendor/autoload.php';

use Desarrolla2\Timer\Timer;

$timer = new Timer();

echo 'doing something ....' . PHP_EOL;
$iterations = 10000;
$t = 1;
$a = array();
for ($i = 1; $i <= $iterations; $i++) {
    $t = $t * $i;
    $a[] = $t;
}
$timer->mark('task 1');
echo 'doing something ....' . PHP_EOL;
for ($i = 1; $i <= $iterations; $i++) {
    $t = $t / $i;
    $a[] = $t;
}
$timer->mark('task 2');
var_dump($timer->get());