--TEST--
runkit7_function_add() function and doc_comment
--SKIPIF--
<?php if(!extension_loaded("runkit7") || !RUNKIT7_FEATURE_MANIPULATION) print "skip"; ?>
--INI--
display_errors=on
--FILE--
<?php
runkit7_function_add('runkit_function','$b', 'echo "b is $b\n";', NULL, 'new doc_comment');
$r1 = new ReflectionFunction('runkit_function');
echo $r1->getDocComment(), "\n";
?>
--EXPECT--
new doc_comment
