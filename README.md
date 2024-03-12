# PHP-Array-Test

## Prerequisite

`PHP: version 7.3+`

## The Task

### Develop a script to build a company tree with associated travel cost from two API endpoints

- Company List: https://5f27781bf5d27e001612e057.mockapi.io/webprovise/companies
- Travel List: https://5f27781bf5d27e001612e057.mockapi.io/webprovise/travels

## Requirements:

### Process data from the two endpoints to have a nested array of companies with travel cost

### Travel cost of a particular company is the total travel price of employees in that company and its child companies

### Output of nested array should look like below:

```
[
  {
    "id": "uuid-1",
    "createdAt": "2021-02-26T00:55:36.632Z",
    "name": "Webprovise Corp",
    "parentId": "0",
    "cost": 66888,
    "children": [
      {
        "id": "uuid-2",
        "createdAt": "2021-02-25T10:35:32.978Z",
        "name": "Stamm LLC",
        "parentId": "uuid-1",
        "cost": 5199,
        "children": []
      }
    ]
  }
]

```

### Complete your code by using this template:

```
<?php

class Travel
{
// Enter your code here
}

class Company
{
// Enter your code here
}

class TestScript
{
    public function execute()
    {
        $start = microtime(true);
        // Enter your code here
        // echo json_encode($result);
        echo 'Total time: '.  (microtime(true) - $start);
    }
}

(new TestScript())->execute();
```

## How to Test

1. Clone or download this repository to your local machine.
2. Navigate to the directory containing the script.
3. Run the script using the command line.

```bash
php test_script.php
```
