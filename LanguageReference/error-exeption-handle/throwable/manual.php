<?php

if (!function_exists('interface_exists')) {
    die('PHP version too old');
}
$throwables = listThrowableClasses();
$throwablesPerParent = splitInParents($throwables);
printTree($throwablesPerParent);
if (0 !== count($throwablesPerParent)) {
    die('ERROR!!!');
}

function listThrowableClasses()
{
    $result = array();
    if (interface_exists('Throwable')) {
        foreach (get_declared_classes() as $cn) {
            $implements = class_implements($cn);
            if (isset($implements['Throwable'])) {
                $result[] = $cn;
            }
        }
    } else {
        foreach (get_declared_classes() as $cn) {
            if ('Exception' === $cn || is_subclass_of($cn, 'Exception')) {
                $result[] = $cn;
            }
        }
    }

    return $result;
}

function splitInParents($classes)
{
    $result = array();
    foreach ($classes as $cn) {
        $parent = (string) get_parent_class($cn);
        if (isset($result[$parent])) {
            $result[$parent][] = $cn;
        } else {
            $result[$parent] = array($cn);
        }
    }

    return $result;
}

function printTree(&$tree)
{
    if (!isset($tree[''])) {
        die('No root classes!!!');
    }
    
    printLeaves($tree, '', 0);
}

function printLeaves(&$tree, $parent, $level)
{
    if (isset($tree[$parent])) {
        $leaves = $tree[$parent];
        unset($tree[$parent]);
        natcasesort($leaves);
        $leaves = array_values($leaves);
        $count = count($leaves);

        for ($i = 0; $i < $count; ++$i) {
            $leaf = $leaves[$i];
            echo str_repeat('  ', $level), $leaf, "\n";
            printLeaves($tree, $leaf, $level + 1);
        }
    }
}
