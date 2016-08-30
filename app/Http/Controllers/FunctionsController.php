<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FunctionsController extends Controller
{
     public static function buildTree(array $elements, $parentId = 0) {
        $branch = array();
        foreach ($elements as $element) {
            if ($element['parent'] == $parentId) {
                $children = buildTree($elements, $element['id']);
                if ($children) {
                    $element['id'] = $children;
                }
                $branch[] = $element;
            }
        }

        return $branch;
    }
}
