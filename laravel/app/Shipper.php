<?php
namespace app;
use \Illuminate\Database\Eloquent\Model;

class Shipper extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Shippers';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'Code';
}
/*
+---------------+--------------+------+-----+---------------------+-----------------------------+
| Field         | Type         | Null | Key | Default             | Extra                       |
+---------------+--------------+------+-----+---------------------+-----------------------------+
| Code          | varchar(100) | NO   | PRI | NULL                |                             |
| Carrier       | varchar(50)  | NO   |     | NULL                |                             |
| EmailTemplate | varchar(50)  | NO   |     | NULL                |                             |
| ButtonPrefix  | varchar(250) | NO   |     | NULL                |                             |
| ButtonSuffix  | varchar(250) | NO   |     | NULL                |                             |
| TimeStamp     | timestamp    | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
| created_at    | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at    | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
+---------------+--------------+------+-----+---------------------+-----------------------------+
*/