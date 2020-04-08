<?php

// define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
// require_once DVWA_WEB_PAGE_TO_ROOT . 'api/includes/dvwaPage.inc.php';

// require_once('config.inc.php');
class Product
{

    private $conn;
    private $table_name = "products";

    // object properties
    public $id;
    public $name;
    public $description;
    public $price;
    public $category_id;
    public $category_name;
    public $created;

    // constructor with $db as database connection
    public function __construct($db)
    {
        $this->conn = $db;
    }

    // create product
    function create()
    {

        // query to insert record
        $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, price=:price, description=:description, category_id=:category_id, created=:created";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->created = htmlspecialchars(strip_tags($this->created));

        // bind values
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":category_id", $this->category_id);
        $stmt->bindParam(":created", $this->created);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // read products
    function read()
    {

        // select all query
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY
                p.created DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // used when filling up the update product form
    function readOne()
    {

        // query to read single record
        $query = "SELECT
           c.name as category_name, p.id_event, p.event, p.event_description, p.price, p.category_id, p.created
       FROM
           " . $this->table_name . " p
           LEFT JOIN
               categories c
                   ON p.category_id = c.id
       WHERE
           p.id_event = ?
       LIMIT
           0,1";


        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['event'];
        $this->price = $row['price'];
        $this->description = $row['event_description'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }



    function sqlInjection()
    {
        global $_DVWA;
        global $DBMS;
        //global $DBMS_connError;
        global $db;

        if ($DBMS == 'MySQL') {
            $DBMS = htmlspecialchars(strip_tags($DBMS));
            $DBMS_errorFunc = 'mysqli_error()';
        } elseif ($DBMS == 'PGSQL') {
            $DBMS = htmlspecialchars(strip_tags($DBMS));
            $DBMS_errorFunc = 'pg_last_error()';
        } else {
            $DBMS = "No DBMS selected.";
            $DBMS_errorFunc = '';
        }

        if ($DBMS == 'MySQL') {
            if (
                !@($GLOBALS["___mysqli_ston"] = mysqli_connect($_DVWA['db_server']))
                || !@((bool) mysqli_query($GLOBALS["___mysqli_ston"], "USE " . $_DVWA['db_database']))
            ) {
                //die( $DBMS_connError );
                dvwaLogout();
                dvwaMessagePush('Unable to connect to the database.<br />' . $DBMS_errorFunc);
                dvwaRedirect(DVWA_WEB_PAGE_TO_ROOT . 'setup.php');
            }
            // MySQL PDO Prepared Statements (for impossible levels)
            $db = new PDO('mysql:host=' . $_DVWA['db_server'] . ';dbname=' . $_DVWA['db_database'] . ';charset=utf8', $_DVWA['db_user'], $_DVWA['db_password']);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } elseif ($DBMS == 'PGSQL') {
            //$dbconn = pg_connect("host={$_DVWA[ 'db_server' ]} dbname={$_DVWA[ 'db_database' ]} user={$_DVWA[ 'db_user' ]} password={$_DVWA[ 'db_password' ])}"
            //or die( $DBMS_connError );
            dvwaMessagePush('PostgreSQL is not yet fully supported.');
            dvwaPageReload();
        } else {
            die("Unknown {$DBMS} selected.");
        }

        $query  = "SELECT c.name, p.id, p.name, p.description, p.price, p.category_id, p.created
        FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";
        $___mysqli_ston = null;
        $result = mysqli_query($GLOBALS["___mysqli_ston"],  $query) or die('<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>');
        // query to read single record
        // $query = "SELECT
        //         c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
        //     FROM
        //         " . $this->table_name . " p
        //         LEFT JOIN
        //             categories c
        //                 ON p.category_id = c.id
        //     WHERE
        //         p.id = ?
        //     LIMIT
        //         0,1";


        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        // $row = $stmt->fetch(PDO::FETCH_ASSOC);

        while ($row = mysqli_fetch_assoc($result)) {
            // Get values
            $first = $row["name"];
            $last  = $row["description"];

            // Feedback for end user
            // $html .= "<pre>ID: {$id}<br />First name: {$first}<br />Surname: {$last}</pre>";
        }

        mysqli_close($GLOBALS["___mysqli_ston"]);

        // set values to object properties
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }
    // update the product
    function update()
    {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                price = :price,
                description = :description,
                category_id = :category_id
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // delete the product
    function delete()
    {

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    // search products
    function search($keywords)
    {

        // select all query
        // $query = "SELECT
        //         c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
        //     FROM
        //         " . $this->table_name . " p
        //         LEFT JOIN
        //             categories c
        //                 ON p.category_id = c.id
        //     WHERE
        //         p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ?
        //     ORDER BY
        //         p.created DESC";

        // select all query
        //--------------------------------------->
        //     $query = "SELECT
        //        c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
        //    FROM
        //        " . $this->table_name . " p
        //        LEFT JOIN
        //            categories c
        //                ON p.category_id = c.id
        //    WHERE
        //        p.name LIKE ? OR p.description LIKE ? OR c.name LIKE ?
        //    ORDER BY
        //        p.created DESC";

        //     // prepare query statement
        //     $stmt = $this->conn->prepare($query);

        //     // sanitize
        //     $keywords = htmlspecialchars(strip_tags($keywords));
        //     $keywords = "%{$keywords}%";

        //     // bind
        //     $stmt->bindParam(1, $keywords);
        //     $stmt->bindParam(2, $keywords);
        //     $stmt->bindParam(3, $keywords);

        //     // execute query
        //     $stmt->execute();

        //     return $stmt;
        // New Function Addd----------------------------------------------------------------------------------->
        $host = "localhost";
        $dbname = "api_db";
        $username = "root";
        $password = "";

        $GLOBALS["___mysqli_ston"] = mysqli_connect($host, $username, $password, $dbname);


        if ($id = $_REQUEST['id']) { //kerentanan yang ada pad website request tidak di encode

            // Check database

            $query  = "SELECT * FROM products LEFT JOIN  categories c ON p.category_id = c.id JOIN user WHERE id_event = '$id';";
            $result = mysqli_query($GLOBALS["___mysqli_ston"],  $query) or die('<pre>' . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) . '</pre>');
            (exit);
            // Get results
            while ($row = mysqli_fetch_assoc($result)) {
                // Get values
                $first = $row["name"];
                $last  = $row["description"];
                $price = $row["price"];

                $products_arr = array(
                    "name" => $first,
                    "price" => $price,
                    "description" => $last,
                    // "description" => html_entity_decode($description),
                    // "category_id" => $category_id,
                    // "category_name" => $category_name
                );


                // set response code - 200 OK
                http_response_code(200);

                // show products data
                echo json_encode($products_arr);
            }

            mysqli_close($GLOBALS["___mysqli_ston"]);
        } else {
            // set response code - 404 Not found
            http_response_code(404);

            // tell the user no products found
            echo json_encode(
                array("message" => "No products found.")
            );
        }
    }

    // read products with pagination
    public function readPaging($from_record_num, $records_per_page)
    {

        // select query
        $query = "SELECT
                c.name as category_name, p.id_event, p.event, p.event_description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            ORDER BY p.created DESC
            LIMIT ?, ?";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind variable values
        $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
        $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);

        // execute query
        $stmt->execute();

        // return values from database
        return $stmt;
    }

    // used for paging products
    public function count()
    {
        $query = "SELECT COUNT(*) as total_rows FROM " . $this->table_name . "";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['total_rows'];
    }
}
