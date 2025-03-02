<?php
class Validation {
    private $data = [];
    private $errors = [];

    public function __set($name, $value) {
        $this->data[$name] = $value;
    }

    public function __get($name) {
        return $this->data[$name] ?? null;
    }

    public function validate($rules) {
        foreach ($rules as $field => $fieldRules) {
            foreach ($fieldRules as $rule) {
                if ($rule === 'required' && empty($this->$field)) {
                    $this->errors[$field][] = "$field is required.";
                }
            }
        }
    }

    public function getErrors() {
        return $this->errors;
    }
}

// Example usage
$validator = new Validation();
$validator->name = $_POST['name'] ?? '';
$validator->email = $_POST['email'] ?? '';

$validator->validate([
    'name' => ['required'],
    'email' => ['required']
]);

if (empty($validator->getErrors())) {
    echo "Validation passed.";
} else {
    var_dump($validator->getErrors());
}
?>
