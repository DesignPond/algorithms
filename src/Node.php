<?php namespace src;

class Node
{
    public $parent, $value, $left, $right;

    public function __construct($value, $parent = null)
    {
        $this->value  = $value;
        $this->parent = $parent;
    }

    public function min()
    {
        $node = $this;

        while ($node->left) {
            if (!$node->left) {
                break;
            }

            $node = $node->left;
        }

        return $node;
    }

    public function max()
    {
        $node = $this;

        while ($node->right) {
            if (!$node->right) {
                break;
            }

            $node = $node->right;
        }

        return $node;
    }

    public function delete()
    {
        // both branches then go left and find min and delete
        if ($this->left && $this->right) {
            $min = $this->right->min();
            $this->value = $min->value;
            $min->delete();
        } elseif ($this->right) {
            // only right
            if ($this->parent->left === $this) {
                $this->parent->left = $this->right;
                $this->right->parent = $this->parent->left;
            } elseif ($this->parent->right === $this) {
                $this->parent->right = $this->right;
                $this->right->parent = $this->parent->right;
            }

            $this->parent = null;
            $this->right  = null;
        } elseif ($this->left) {

            if ($this->parent->left === $this) {
                $this->parent->left = $this->left;
                $this->left->parent = $this->parent->left;
            } elseif ($this->parent->right === $this) {
                $this->parent->right = $this->left;
                $this->left->parent = $this->parent->right;
            }
            $this->parent = null;
            $this->left   = null;

        } else {
            if ($this->parent->right === $this) {
                $this->parent->right = null;
            } elseif ($this->parent->left === $this) {
                $this->parent->left = null;
            }

            $this->parent = null;
        }
    }

    public function findSecondMinimumValue($root){
        if($root == null){
            return -1;
        }

        $val = $this->helper($root, $root->value);

        if($val == $this->min()){
            return -1;
        }

        return $val;
    }

    public function helper($node, $minVal){
        if($node == null){
            return $this->min();
        }
        if( $node->value > $minVal){
            return $node->value;
        }

        $left  = $this->helper($node->left, $minVal);
        $right = $this->helper($node->right, $minVal);

        return min($left, $right)   ;
    }
}