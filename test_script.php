<?php

class Travel
{
  public static function getTravelData()
  {
    $url = "https://5f27781bf5d27e001612e057.mockapi.io/webprovise/travels";
    $data = file_get_contents($url);
    return json_decode($data, true);
  }
}

class Company
{
  public static function getCompanyData()
  {
    $url = "https://5f27781bf5d27e001612e057.mockapi.io/webprovise/companies";
    $data = file_get_contents($url);
    return json_decode($data, true);
  }

  public static function buildCompanyTree(array $companies, array $travels, $parentId = "0")
  {
    $branch = array();

    foreach ($companies as $company) {
      if ($company['parentId'] == $parentId) {
        $children = self::buildCompanyTree($companies, $travels, $company['id']);
        $childTotalCosts = 0;
        $childTotalCosts = array_sum(array_column($children, 'cost'));
        $company['cost'] = self::calculateTotalCost($company['id'], $travels) + $childTotalCosts;
        $company['children'] = $children;

        $branch[] = $company;
      }
    }

    return $branch;
  }

  private static function calculateTotalCost($companyId, $travels)
  {
    $totalCost = 0;
    foreach ($travels as $travel) {
      if ($travel['companyId'] == $companyId) {
        $totalCost += $travel['price'];
      }
    }
    return $totalCost;
  }
}

class TestScript
{
  public function execute()
  {
    $start = microtime(true);

    $companies = Company::getCompanyData();
    $travels = Travel::getTravelData();
    $companyTree = Company::buildCompanyTree($companies, $travels);

    echo json_encode($companyTree, JSON_PRETTY_PRINT);
    echo "\nTotal time: " . (microtime(true) - $start);
  }
}

(new TestScript())->execute();
