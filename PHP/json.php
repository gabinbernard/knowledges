<?php

#
# PHP Core Json Extension
# As of PHP 8.0.0, this is a core extension
#
# https://www.php.net/manual/en/book.json.php
#

$json = '{"Values":["A", "B", "C"]}, "Number1": 1, "Number2": 1';

if (!json_validate($json)) {
    echo (is_null(json_decode($json)) ? "Error :(" : "Success :)") . PHP_EOL;
    echo json_last_error() . ': ' . json_last_error_msg() . PHP_EOL;
    # Following line throws error
    # json_decode($json, flags: JSON_THROW_ON_ERROR);
}

$json = '{"Values":["A", "B", "C"], "Number1": -10, "Number2": 1}';
$decoded_json = json_decode($json);
print_r($decoded_json);

$encoded_json = json_encode($decoded_json, JSON_PRETTY_PRINT | JSON_FORCE_OBJECT);
echo $encoded_json . PHP_EOL;

// JsonSerializable interface

class Student implements JsonSerializable
{
    public function __construct(
        public int $id,
        public string $first_name,
        public string $last_name
    ) {
    }

    public function jsonSerialize(): mixed
    {
        return [$this->first_name, $this->last_name];
    }
}

$student = new Student(1, "John", "Doe");
echo json_encode(["Data", $student], JSON_PRETTY_PRINT) . PHP_EOL;