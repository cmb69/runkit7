--TEST--
runkit7_method_add() function with closure and flags
--SKIPIF--
<?php
	if(!extension_loaded("runkit7") || !RUNKIT7_FEATURE_MANIPULATION) print "skip";
?>
--INI--
display_errors=on
--FILE--
<?php
class runkit_class {
}
runkit7_method_add('runkit_class','runkit_method',function() {});
runkit7_method_add('runkit_class','runkitMethod',function() {}, RUNKIT7_ACC_PRIVATE);
runkit7_method_add('runkit_class','runkitMethod1',function () {}, RUNKIT7_ACC_STATIC, 'new doc_comment2');
$r1 = new ReflectionMethod('runkit_class', 'runkit_method');
echo $r1->getDocComment(), "\n";
$r2 = new ReflectionMethod('runkit_class', 'runkitMethod');
echo $r2->getDocComment(), "\n";
$r3 = new ReflectionMethod('runkit_class', 'runkitMethod1');
echo $r3->getDocComment(), "\n";

echo $r2->isPrivate(), "\n";
echo $r3->isStatic();
?>
--EXPECT--


new doc_comment2
1
1
