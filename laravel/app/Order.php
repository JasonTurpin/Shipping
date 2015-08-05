<?php
namespace app;
use \Illuminate\Database\Eloquent\Model;

class Order extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'Orders';

    /**
     * Primary key
     *
     * @var string
     */
    protected $primaryKey = 'OrderNumber';

    // Source Order Number Condition
    public function scopeSourceOrderNumber($query, $sourceOrderNumber) {
        return $query->where('SourceOrderNumber', '=', $sourceOrderNumber)->first();
    }

    // Creates relationship with shopping cart
    public function cart() {
        return $this->hasOne('App\ShoppingCart', 'ID', 'CartID');
    }
}
/*
+-----------------------+------------------+------+-----+---------------------+-----------------------------+
| Field                 | Type             | Null | Key | Default             | Extra                       |
+-----------------------+------------------+------+-----+---------------------+-----------------------------+
| OrderNumber           | int(11) unsigned | NO   | PRI | NULL                | auto_increment              |
| OrderSource           | varchar(2)       | NO   |     | NULL                |                             |
| SourceOrderNumber     | int(11) unsigned | NO   |     | NULL                |                             |
| OrderDate             | datetime         | NO   |     | NULL                |                             |
| OrderTime             | datetime         | NO   |     | NULL                |                             |
| CustomerID            | int(11) unsigned | NO   |     | NULL                |                             |
| Name                  | varchar(255)     | NO   |     | NULL                |                             |
| Company               | varchar(255)     | NO   |     | NULL                |                             |
| Email                 | varchar(255)     | NO   |     | NULL                |                             |
| Address               | varchar(255)     | NO   |     | NULL                |                             |
| Address2              | varchar(255)     | NO   |     | NULL                |                             |
| City                  | varchar(255)     | NO   |     | NULL                |                             |
| State                 | varchar(255)     | NO   |     | NULL                |                             |
| Country               | varchar(255)     | NO   |     | NULL                |                             |
| Zip                   | varchar(255)     | NO   |     | NULL                |                             |
| Phone                 | varchar(255)     | NO   |     | NULL                |                             |
| ShipName              | varchar(255)     | NO   |     | NULL                |                             |
| ShipCompany           | varchar(255)     | NO   |     | NULL                |                             |
| ShipAddress           | varchar(255)     | NO   |     | NULL                |                             |
| ShipAddress2          | varchar(255)     | NO   |     | NULL                |                             |
| ShipCity              | varchar(255)     | NO   |     | NULL                |                             |
| ShipState             | varchar(255)     | NO   |     | NULL                |                             |
| ShipZip               | varchar(255)     | NO   |     | NULL                |                             |
| ShipCountry           | varchar(255)     | NO   |     | NULL                |                             |
| ShipPhone             | varchar(255)     | NO   |     | NULL                |                             |
| PayType               | int(10)          | NO   |     | NULL                |                             |
| pay1                  | varchar(255)     | NO   |     | NULL                |                             |
| pay2                  | varchar(255)     | NO   |     | NULL                |                             |
| pay3                  | varchar(255)     | NO   |     | NULL                |                             |
| pay4                  | varchar(255)     | NO   |     | NULL                |                             |
| CCInfo                | varchar(250)     | NO   |     | NULL                |                             |
| ShipOn                | varchar(255)     | NO   |     | NULL                |                             |
| OrderInst             | text             | NO   |     | NULL                |                             |
| Comments              | text             | NO   |     | NULL                |                             |
| ProductTotal          | float            | NO   |     | NULL                |                             |
| TaxTotal              | float            | NO   |     | NULL                |                             |
| ShippingTotal         | float            | NO   |     | NULL                |                             |
| GrandTotal            | float            | NO   |     | NULL                |                             |
| NumItems              | int(10)          | NO   |     | NULL                |                             |
| Viewed                | varchar(255)     | NO   |     | NULL                |                             |
| Shipping              | varchar(255)     | NO   |     | NULL                |                             |
| Discount              | float            | NO   |     | NULL                |                             |
| RevisedDiscount       | float            | NO   |     | NULL                |                             |
| Coupon                | varchar(50)      | NO   |     | NULL                |                             |
| CouponDiscount        | float            | NO   |     | NULL                |                             |
| CouponOk              | bit(1)           | NO   |     | NULL                |                             |
| Surcharge             | float            | NO   |     | NULL                |                             |
| RevisedSurcharge      | float            | NO   |     | NULL                |                             |
| RefName               | varchar(50)      | NO   |     | NULL                |                             |
| GiftMessage           | text             | NO   |     | NULL                |                             |
| Approved              | bit(1)           | NO   |     | NULL                |                             |
| Cancelled             | bit(1)           | NO   |     | NULL                |                             |
| FinalProductTotal     | float            | NO   |     | NULL                |                             |
| FinalTaxTotal         | float            | NO   |     | NULL                |                             |
| FinalShippingTotal    | float            | NO   |     | NULL                |                             |
| FinalGrandTotal       | float            | NO   |     | NULL                |                             |
| BalanceDue            | float            | NO   |     | NULL                |                             |
| CreditIssued          | bit(1)           | NO   |     | NULL                |                             |
| ReviewReason          | varchar(50)      | NO   |     | NULL                |                             |
| BackOrdersToFill      | bit(1)           | NO   |     | NULL                |                             |
| ShippedWeight         | float            | NO   |     | NULL                |                             |
| FinalTaxRate          | float            | NO   |     | NULL                |                             |
| Notes                 | text             | NO   |     | NULL                |                             |
| RevisedCouponDiscount | float            | NO   |     | NULL                |                             |
| NoteToCustomer        | text             | NO   |     | NULL                |                             |
| DiscountsActive       | bit(1)           | NO   |     | NULL                |                             |
| Taxable               | bit(1)           | NO   |     | NULL                |                             |
| TaxNumber             | varchar(50)      | NO   |     | NULL                |                             |
| ActualShippedWeight   | float            | NO   |     | NULL                |                             |
| DiscountType          | int(10)          | NO   |     | NULL                |                             |
| DiscountPercentage    | int(10)          | NO   |     | NULL                |                             |
| SurchargeDetails      | varchar(200)     | NO   |     | NULL                |                             |
| DropShipsAny          | bit(1)           | NO   |     | NULL                |                             |
| DropShipsDone         | bit(1)           | NO   |     | NULL                |                             |
| LocalSortText1        | varchar(50)      | NO   |     | NULL                |                             |
| LocalSortText2        | varchar(50)      | NO   |     | NULL                |                             |
| LocalSortText3        | varchar(50)      | NO   |     | NULL                |                             |
| LocalSortText4        | varchar(50)      | NO   |     | NULL                |                             |
| LocalSortText5        | varchar(50)      | NO   |     | NULL                |                             |
| LocalSortInteger1     | int(10)          | NO   |     | NULL                |                             |
| LocalSortInteger2     | int(10)          | NO   |     | NULL                |                             |
| LocalSortInteger3     | int(10)          | NO   |     | NULL                |                             |
| LocalSortInteger4     | int(10)          | NO   |     | NULL                |                             |
| LocalSortInteger5     | int(10)          | NO   |     | NULL                |                             |
| LocalSortDate1        | datetime         | NO   |     | NULL                |                             |
| LocalSortDate2        | datetime         | NO   |     | NULL                |                             |
| LocalSortDate3        | datetime         | NO   |     | NULL                |                             |
| LocalSortDate4        | datetime         | NO   |     | NULL                |                             |
| LocalSortDate5        | datetime         | NO   |     | NULL                |                             |
| TaxByPOS              | bit(1)           | NO   |     | NULL                |                             |
| DateCreated           | datetime         | NO   |     | NULL                |                             |
| SourceOrderID         | varchar(50)      | NO   |     | NULL                |                             |
| LocalSortCurrency1    | float            | NO   |     | NULL                |                             |
| LocalSortCurrency2    | float            | NO   |     | NULL                |                             |
| LocalSortCurrency3    | float            | NO   |     | NULL                |                             |
| LocalSortCurrency4    | float            | NO   |     | NULL                |                             |
| LocalSortCurrency5    | float            | NO   |     | NULL                |                             |
| EmailCC               | varchar(100)     | NO   |     | NULL                |                             |
| ImportID              | int(10)          | NO   |     | NULL                |                             |
| AddToEmailList        | bit(1)           | NO   |     | NULL                |                             |
| PaymentString         | varchar(255)     | NO   |     | NULL                |                             |
| CustomerIP            | varchar(255)     | NO   |     | NULL                |                             |
| OrderStatus           | varchar(50)      | NO   |     | NULL                |                             |
| OrderStatusChanged    | bit(1)           | NO   |     | NULL                |                             |
| OrdStatDetail         | varchar(255)     | NO   |     | NULL                |                             |
| Exported              | bit(1)           | NO   |     | NULL                |                             |
| CartID                | int(10)          | NO   |     | NULL                |                             |
| created_at            | timestamp        | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
| updated_at            | timestamp        | NO   |     | 0000-00-00 00:00:00 |                             |
+-----------------------+------------------+------+-----+---------------------+-----------------------------+
*/
