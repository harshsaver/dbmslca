<?php

require_once 'DbConnect.php';

$response = array();

if (isset($_GET['apicall']))
{

    switch ($_GET['apicall'])
    {

        case 'add':
            if (isTheseParametersAvailable(array(
                'uname',
                'salary'
            )))
            {
                $username = $_POST['uname'];
                $salary = $_POST['salary'];

                $stmt = $conn->prepare("INSERT INTO Emp (ename, salary) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $salary);

                if ($stmt->execute())
                {

                }

            }
            else
            {
                $response['error'] = true;
                $response['message'] = 'Required parameters are not available';
            }

        break;

        default:
            $response['error'] = true;
            $response['message'] = 'Invalid Operation Called';
    }

}
else
{
    $response['error'] = true;
    $response['message'] = 'Invalid API Call';
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

