<?php

require_once 'DbConnect.php';
$response = array();

if (isTheseParametersAvailable(array(
    'currID'
)))
{

    $currID = $_POST['currID'];
    $currSalary = 0;
    $stmt = $conn->prepare("SELECT salary FROM Emp WHERE empno = ?");
    $stmt->bind_param("i", $currID);
    $stmt->execute();
    $stmt->bind_result($currSalary);
    $stmt->fetch();
    $stmt->close();
    if ($currSalary < 200000)
    {
        $response['error'] = false;
        $response['Taxed Amount'] = "You are excempted from tax";
    }
    else if ($currSalary < 500000 && $currSalary >= 200000)
    {
        $response['error'] = false;
        $response['Taxed Amount'] = $currSalary * (5 / 100);
    }
    else if ($currSalary > 500001 && $currSalary < 1000000)
    {
        $response['error'] = false;
        $response['Taxed Amount'] = $currSalary * (20 / 100);
    }
    else if ($currSalary > 1000001)
    {
        $response['error'] = false;
        $response['Taxed Amount'] = $currSalary * (30 / 100);
    }

}
echo json_encode($response);

function isTheseParametersAvailable($params)
{

    foreach ($params as $param)
    {
        if (!isset($_POST[$param]))
        {
            return false;
        }
    }
    return true;
}

