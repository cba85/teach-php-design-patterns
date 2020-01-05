<?php

class Validator
{
    public $rules = [];

    protected $input;

    public function __call($method, $arguments)
    {
        $this->rules[] = [
            'object' => $this->getRule($method),
            'arguments' => $arguments
        ];

        //echo $method;
        //print_r($arguments);

        return $this;
    }

    public function withInput($input)
    {
        $this->input = $input;
        return $this;
    }

    public function isValid()
    {
        foreach($this->rules as $rule)
        {
            if (!$rule['object']->isSatisfiedBy($this->input, $rule['arguments'])) {
                return false;
            }
            return true;
        }
    }

    protected function getRule($rule)
    {
        return new $rule;
    }
}

class IsString
{
    public function isSatisfiedBy($input)
    {
        return is_string($input);
    }
}

class isGreaterThan
{
    public function isSatisfiedBy($input, $argument)
    {
        return strlen($input) > $argument[0];
    }
}

$validator = new Validator;
$validator->isString()->isGreaterThan(10)->withInput('clement')->isValid();

echo "<pre>";
print_r($validator->isValid());
echo "</pre>";

//$validator->isString()->isGreaterThan(10)->withInput('clement')->isValid();