<?php
namespace app;
use \Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'ShoppingCarts';

    /**
     * Hidden fields we do not want exported to JSON
     *
     * @var string
     */
    protected $hidden = ['Password', 'ServerPwd'];

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'CartName';
}
/*
+----------------+--------------+------+-----+---------------------+-----------------------------+
| Field          | Type         | Null | Key | Default             | Extra                       |
+----------------+--------------+------+-----+---------------------+-----------------------------+
| CartName       | varchar(75)  | NO   | PRI | NULL                |                             |
| CartType       | varchar(50)  | NO   |     | NULL                |                             |
| CartID         | varchar(50)  | NO   |     | NULL                |                             |
| URL            | varchar(255) | NO   |     | NULL                |                             |
| id             | int(10)      | NO   |     | NULL                |                             |
| ServerID       | varchar(50)  | NO   |     | NULL                |                             |
| CustomFunction | varchar(100) | NO   |     | NULL                |                             |
| SynchInv       | bit(1)       | NO   |     | NULL                |                             |
| Token          | text         | NO   |     | NULL                |                             |
| ExpDate        | datetime     | NO   |     | NULL                |                             |
| ImportTemplate | int(10)      | NO   |     | NULL                |                             |
| GlobalCartID   | varchar(255) | NO   |     | NULL                |                             |
| DKey           | text         | NO   |     | NULL                |                             |
| UseKey         | bit(1)       | NO   |     | NULL                |                             |
| Password       | varchar(255) | NO   |     | NULL                |                             |
| ServerPwd      | varchar(255) | NO   |     | NULL                |                             |
| TimeStamp      | timestamp    | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
| CartSubType    | varchar(255) | NO   |     | NULL                |                             |
| created_at     | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at     | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
+----------------+--------------+------+-----+---------------------+-----------------------------+
*/
