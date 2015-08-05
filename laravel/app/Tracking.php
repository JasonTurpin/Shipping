<?php
namespace app;
use \Illuminate\Database\Eloquent\Model;

class Tracking extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Tracking';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'AutoNumber';
}
/*
+-----------------------+------------------+------+-----+---------------------+-----------------------------+
| Field                 | Type             | Null | Key | Default             | Extra                       |
+-----------------------+------------------+------+-----+---------------------+-----------------------------+
| OrderNum              | varchar(50)      | NO   |     | NULL                |                             |
| AutoNumber            | int(11) unsigned | NO   | PRI | NULL                | auto_increment              |
| PickupDate            | datetime         | NO   |     | NULL                |                             |
| Cost                  | varchar(25)      | NO   |     | NULL                |                             |
| Carrier               | varchar(5)       | NO   |     | NULL                |                             |
| EmailSent             | bit(1)           | NO   |     | NULL                |                             |
| StatusSent            | bit(1)           | NO   |     | NULL                |                             |
| IsVoid                | varchar(5)       | NO   |     | NULL                |                             |
| Notes                 | varchar(255)     | NO   |     | NULL                |                             |
| AZSent                | bit(1)           | NO   |     | NULL                |                             |
| Pounds                | int(10)          | NO   |     | NULL                |                             |
| Ounces                | int(10)          | NO   |     | NULL                |                             |
| ShippersMethod        | varchar(50)      | NO   |     | NULL                |                             |
| RegisteredMail        | bit(1)           | NO   |     | NULL                |                             |
| InsuredMail           | bit(1)           | NO   |     | NULL                |                             |
| CertifiedMail         | bit(1)           | NO   |     | NULL                |                             |
| RestrictedDelivery    | bit(1)           | NO   |     | NULL                |                             |
| CertificateOfMailing  | bit(1)           | NO   |     | NULL                |                             |
| ReturnReceipt         | bit(1)           | NO   |     | NULL                |                             |
| DeliveryConfirmation  | bit(1)           | NO   |     | NULL                |                             |
| SignatureConfirmation | bit(1)           | NO   |     | NULL                |                             |
| COD                   | bit(1)           | NO   |     | NULL                |                             |
| FlatRate              | bit(1)           | NO   |     | NULL                |                             |
| DazzleInsurance       | varchar(20)      | NO   |     | NULL                |                             |
| CODAmount             | float            | NO   |     | NULL                |                             |
| DeclaredValue         | float            | NO   |     | NULL                |                             |
| Details               | text             | NO   |     | NULL                |                             |
| FlatBox               | bit(1)           | NO   |     | NULL                |                             |
| DateAdded             | datetime         | NO   |     | NULL                |                             |
| TrackingID            | varchar(50)      | NO   |     | NULL                |                             |
| NumericKey            | int(11) unsigned | NO   |     | NULL                |                             |
| CostCurrencyType      | varchar(3)       | NO   |     | NULL                |                             |
| ValueCurrencyType     | varchar(3)       | NO   |     | NULL                |                             |
| External              | bit(1)           | NO   |     | NULL                |                             |
| Packer                | varchar(255)     | NO   |     | NULL                |                             |
| Picker                | varchar(255)     | NO   |     | NULL                |                             |
| NumTrees              | varchar(255)     | NO   |     | NULL                |                             |
| Length                | varchar(255)     | NO   |     | NULL                |                             |
| Width                 | varchar(255)     | NO   |     | NULL                |                             |
| Height                | varchar(255)     | NO   |     | NULL                |                             |
| BoxID                 | varchar(255)     | NO   |     | NULL                |                             |
| Location              | varchar(255)     | NO   |     | NULL                |                             |
| TimeStamp             | timestamp        | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
| Status                | varchar(100)     | NO   |     | NULL                |                             |
| UpdatedAt             | datetime         | NO   |     | NULL                |                             |
| SignedBy              | varchar(255)     | NO   |     | NULL                |                             |
| EstDeliveryDate       | datetime         | NO   |     | NULL                |                             |
| created_at            | timestamp        | NO   |     | 0000-00-00 00:00:00 |                             |
| updated_at            | timestamp        | NO   |     | 0000-00-00 00:00:00 |                             |
+-----------------------+------------------+------+-----+---------------------+-----------------------------+
*/
