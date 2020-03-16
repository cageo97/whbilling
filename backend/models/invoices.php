<?php
    namespace backend\models;

    use Illuminate\Database\Eloquent\Model;

    class invoices extends Model {

        protected $table = "invoices";

        protected $fillable = [
            "uid",
            "pid",
            "price"
        ];

    }
?>