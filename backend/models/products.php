<?php
    namespace backend\models;

    use Illuminate\Database\Eloquent\Model;

    class products extends Model {

        protected $table = "products";

        protected $fillable = [
            "name",
            "description",
            "pricing"
        ];

    }
?>