<?php
namespace app;
use \Illuminate\Database\Eloquent\Model;

class BoxType extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'BoxTypes';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'BoxCode';
}
/*
+------------+-------------+------+-----+---------------------+-----------------------------+
| Field      | Type        | Null | Key | Default             | Extra                       |
+------------+-------------+------+-----+---------------------+-----------------------------+
| BoxCode    | varchar(10) | NO   | PRI | NULL                |                             |
| Length     | varchar(10) | NO   |     | NULL                |                             |
| Width      | varchar(10) | NO   |     | NULL                |                             |
| Height     | varchar(10) | NO   |     | NULL                |                             |
| BoxCost    | varchar(10) | NO   |     | NULL                |                             |
| BoxID      | varchar(10) | NO   |     | NULL                |                             |
| SKU        | varchar(10) | NO   |     | NULL                |                             |
| created_at | timestamp   | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
| updated_at | timestamp   | NO   |     | 0000-00-00 00:00:00 |                             |
+------------+-------------+------+-----+---------------------+-----------------------------+
*/
