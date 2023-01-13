<?php
header('Content-Type: application/json');
header('Acess-Control-Allow-Origin: *');

function contactusTableSearch()
{
    register_rest_route('kamalapi/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'contactUsResults'
    ));
}
add_action('rest_api_init', 'contactusTableSearch');
function contactUsResults()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hirerekrut";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM hierrekruttable";
    $result = $conn->query($sql);
    $rows = array();
    // if(mysqli_num_rows($result)>0){
    //     $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // }
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return json_encode($rows);
}

function custom_table_api_endpoint()
{
    register_rest_route('kamalputapi/v1', '/search', array(
        'methods' => 'POST',
        'callback' => 'custom_table_api_callback',
    ));
}
add_action('rest_api_init', 'custom_table_api_endpoint');
function custom_table_api_callback($request)
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hirerekrut";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Get the data from the request payload
    $data = $request->get_json_params();

    // Insert the data into the table
    $table_name = $conn->prefix . 'hierrekruttable';
    $conn->insert($table_name, $data);

    // Return a success response
    return rest_ensure_response(array('status' => 'success'));
}

// function custom_get_api_endpoint_handler($request)
// {
//     // Process the request and return the response.
//     $response = new WP_REST_Response('Hello World GET');
//     return $response;
// }
// add_action('rest_api_init', 'contactusTableSearchtwo');

// function contactusTableSearchtwo()
// {
//     register_rest_route('myplugin/v1', '/custom-endpoint', array(
//         'methods' => 'GET',
//         'callback' => 'custom_get_api_endpoint_handler',
//     ));
// }

// function custom_post_api_endpoint_handler($request)
// {
//     // Process the request and return the response.
//     $response = new WP_REST_Response('Hello World POST');
//     return $response;
// }
// add_action('rest_api_init', 'contactusTableSearchtwo');

// function contactusTableSearchtwo()
// {
//     register_rest_route('myplugin/v1', '/custom-endpoint', array(
//         'methods' => 'POST',
//         'callback' => 'custom_post_api_endpoint_handler',
//     ));
// }


