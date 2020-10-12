<?php namespace src;

class BST
{
    public $root;
    public $result = PHP_INT_MAX;

    public function __construct($value = null)
    {
        if ($value !== null) {
            $this->root = new Node($value);
        }
    }

    public function search($value)
    {
        $node = $this->root;

        while($node) {
            if ($value > $node->value) {
                $node = $node->right;
            } elseif ($value < $node->value) {
                $node = $node->left;
            } else {
                break;
            }
        }

        return $node;
    }

    public function dfs($root, $m) {
        if ($root == null) {
            return PHP_INT_MAX;
        }

        if ($root->value > $m) {
            return $root->value;
        }

        $min1 = $this->dfs($root->left, $m);
        $min2 = $this->dfs($root->right, $m);

        return min($min1, $min2);
    }

    function findSecondMinimumValue($root) {

        if($root == null) return -1;

        $min1 = $root->val;
        $min2 = -1;

        $this->help($root,$min1,$min2); // min2 change in place

        return $min2;
    }

    function help($root,$min1,&$min2){

        if($root == null) return;

        // if new node passed value is bigger than min1
        if($root->val > $min1){
            // it's the first passe put value in min2
            if($min2 == -1){
                $min2 = $root->val;
            }else{
                // get the minimum between the value and min2
                $min2 = min($root->val,$min2);
            }
        }

        $this->help($root->left,$min1,$min2);
        $this->help($root->right,$min1,$min2);
    }

    public function insert($value)
    {
        $node = $this->root;

        // insert node here if subtree is empty
        if (!$node) {
            return $this->root = new Node($value);
        }

        while($node) {
            if ($value > $node->value) {
                // keep trying to insert right
                if ($node->right) {
                    $node = $node->right;
                } else {
                    $node = $node->right = new Node($value);
                    break;
                }
            } elseif ($value < $node->value) {
                // keep trying to insert left
                if ($node->left) {
                    $node = $node->left;
                } else {
                    $node = $node->left = new Node($value);
                    break;
                }
            } else {
                break;
            }
        }
        return $node;
    }

    public function BFT() {

        $node = $this->root;

        $node->level = 1;

        $queue = array($node);

        $out = array("<br/>");

        $current_level = $node->level;

        while(count($queue) > 0) {

            $current_node = array_shift($queue);

            if($current_node->level > $current_level) {
                $current_level++;
                array_push($out,"<br/>");
            }

            array_push($out,$current_node->value. " ");

            if($current_node->left) {
                $current_node->left->level = $current_level + 1;
                array_push($queue,$current_node->left);
            }

            if($current_node->right) {
                $current_node->right->level = $current_level + 1;
                array_push($queue,$current_node->right);
            }
        }

        return join("",$out);
    }

    public function min()
    {
        if (!$this->root) {
            throw new Exception('Tree root is empty!');
        }

        $node = $this->root;

        return $node->min();
    }

    public function max()
    {
        if (!$this->root) {
            throw new Exception('Tree root is empty!');
        }

        $node = $this->root;
        return $node->max();
    }

    public function delete($value)
    {
        $node = $this->search($value);
        if ($node) {
            $node->delete();
        }
    }

    public function walk($node = null,$minVal = 0)
    {
        if (!$node) {
            $node = $this->root;
        }

        if (!$node) {
            return false;
        }

        if($node->value < $minVal){
            $minVal = $node->value;
        }

        if ($node->left) {
            $this->walk($node->left,$minVal);
        }

        if ($node->right) {
           $this->walk($node->right,$minVal);
        }

        return $minVal;
    }
}